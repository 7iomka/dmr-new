const postcss = require('postcss');

const splitArgs = (params) => {
  const args = [];
  let current = '';
  let depth = 0;

  for (const char of params) {
    if (char === '(') {
      depth += 1;
    } else if (char === ')') {
      depth = Math.max(0, depth - 1);
    }

    if (char === ',' && depth === 0) {
      args.push(current.trim());
      current = '';
      continue;
    }

    current += char;
  }

  if (current.trim()) {
    args.push(current.trim());
  }

  return args;
};

const splitSelectors = (selector) => splitArgs(selector);

const combineSelectors = (parentSelector, childSelector) => {
  const childSelectors = splitSelectors(childSelector);

  if (!parentSelector) {
    return childSelectors.join(', ');
  }

  const parentSelectors = splitSelectors(parentSelector);
  const selectors = [];

  parentSelectors.forEach((parent) => {
    childSelectors.forEach((child) => {
      selectors.push(child.includes('&') ? child.replaceAll('&', parent) : `${parent} ${child}`);
    });
  });

  return selectors.join(', ');
};

const getRuleAncestors = (node) => {
  const ancestors = [];
  let current = node.parent;

  while (current) {
    if (current.type === 'rule') {
      ancestors.unshift(current);
    }

    current = current.parent;
  }

  return ancestors;
};

const getFullSelector = (node) =>
  getRuleAncestors(node).reduce((selector, rule) => combineSelectors(selector, rule.selector), '');

const getTopLevelAnchor = (node) => {
  const ancestors = getRuleAncestors(node);
  return ancestors[0] || node;
};

const createRule = (selector, nodes) => postcss.rule({ selector }).append(nodes.map((node) => node.clone()));

const insertRuleAfterAnchor = (atRule, rule) => {
  const anchor = getTopLevelAnchor(atRule);
  anchor.parent.insertAfter(anchor, rule);
};

const createDarkSelector = (selectorPrefix, selector) => {
  if (selectorPrefix === ':host-context(.dark)' && selector === ':host') {
    return selectorPrefix;
  }

  return `${selectorPrefix} ${selector}`;
};

const replaceWithDeclarations = (atRule, declarations) => {
  declarations.forEach(([prop, value]) => {
    atRule.parent.insertBefore(atRule, postcss.decl({ prop, value }));
  });
  atRule.remove();
};

const replaceWithDarkRule = (atRule, selectorPrefix) => {
  if (!atRule.nodes) {
    throw atRule.error(`@mixin ${atRule.params} requires a declaration block`);
  }

  insertRuleAfterAnchor(atRule, createRule(createDarkSelector(selectorPrefix, getFullSelector(atRule)), atRule.nodes));
  atRule.remove();
};

const replaceRootDark = (atRule) => {
  if (!atRule.nodes) {
    throw atRule.error('@mixin root-dark requires a declaration block');
  }

  const rule = createRule('.dark', atRule.nodes);
  atRule.parent.parent.insertAfter(atRule.parent, rule);
  atRule.remove();
};

const replaceLightDark = (atRule, selectorPrefix) => {
  const args = splitArgs(atRule.params.replace(/^(host-)?light-dark\s+/, ''));

  if (args.length !== 3) {
    throw atRule.error(`@mixin ${atRule.params} expects: property, light-value, dark-value`);
  }

  const [prop, lightValue, darkValue] = args;
  atRule.parent.insertBefore(atRule, postcss.decl({ prop, value: lightValue }));
  insertRuleAfterAnchor(
    atRule,
    createRule(createDarkSelector(selectorPrefix, getFullSelector(atRule)), [postcss.decl({ prop, value: darkValue })]),
  );
  atRule.remove();
};

const replaceStructuralMixin = (atRule, name, rest) => {
  if (name === 'truncate') {
    replaceWithDeclarations(atRule, [
      ['overflow', 'hidden'],
      ['text-overflow', 'ellipsis'],
      ['white-space', 'nowrap'],
    ]);
    return true;
  }

  if (name === 'line-clamp') {
    const lines = rest.trim();

    if (!lines) {
      throw atRule.error('@mixin line-clamp requires a line count');
    }

    replaceWithDeclarations(atRule, [
      ['display', '-webkit-box'],
      ['overflow', 'hidden'],
      ['-webkit-box-orient', 'vertical'],
      ['-webkit-line-clamp', lines],
    ]);
    return true;
  }

  if (name === 'square') {
    const size = rest.trim();

    if (!size) {
      throw atRule.error('@mixin square requires a size');
    }

    replaceWithDeclarations(atRule, [
      ['width', size],
      ['height', size],
    ]);
    return true;
  }

  if (name === 'divide-y') {
    const borderColor = rest.trim() || 'currentColor';
    insertRuleAfterAnchor(
      atRule,
      createRule(`${getFullSelector(atRule)} > :not([hidden]) ~ :not([hidden])`, [
        postcss.decl({ prop: 'border-top', value: `1px solid ${borderColor}` }),
      ]),
    );
    atRule.remove();
    return true;
  }

  if (name === 'space-y') {
    const margin = rest.trim();

    if (!margin) {
      throw atRule.error('@mixin space-y requires a margin value');
    }

    insertRuleAfterAnchor(
      atRule,
      createRule(`${getFullSelector(atRule)} > :not([hidden]) ~ :not([hidden])`, [
        postcss.decl({ prop: 'margin-top', value: margin }),
      ]),
    );
    atRule.remove();
    return true;
  }

  return false;
};

module.exports = () => ({
  postcssPlugin: 'postcss-dmr-mixins',
  OnceExit(root) {
    root.walkRules((rule) => {
      if (!rule.nodes || rule.nodes.length === 0) {
        rule.remove();
      }
    });
  },
  AtRule: {
    mixin(atRule) {
      const [name, ...restParts] = atRule.params.trim().split(/\s+/);
      const rest = restParts.join(' ');

      if (name === 'dark') {
        replaceWithDarkRule(atRule, '.dark');
        return;
      }

      if (name === 'host-dark') {
        replaceWithDarkRule(atRule, ':host-context(.dark)');
        return;
      }

      if (name === 'root-dark') {
        replaceRootDark(atRule);
        return;
      }

      if (name === 'light-dark') {
        replaceLightDark(atRule, '.dark');
        return;
      }

      if (name === 'host-light-dark') {
        replaceLightDark(atRule, ':host-context(.dark)');
        return;
      }

      if (replaceStructuralMixin(atRule, name, rest)) {
        return;
      }

      throw atRule.error(`Unsupported @mixin ${name}`);
    },
  },
});

module.exports.postcss = true;
