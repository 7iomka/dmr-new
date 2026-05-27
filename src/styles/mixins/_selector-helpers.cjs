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

const combineSelectors = (parentSelector, childSelector) => {
  const childSelectors = splitArgs(childSelector);

  if (!parentSelector) {
    return childSelectors.join(', ');
  }

  const parentSelectors = splitArgs(parentSelector);
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

const appendSelectorDarkVariant = (selector) => {
  const pseudoElementMatches = Array.from(selector.matchAll(/::(?!ng-deep\b)[a-zA-Z-]+(?:\([^)]*\))?/g));
  const pseudoElement = pseudoElementMatches.at(-1);

  if (!pseudoElement || pseudoElement.index === undefined) {
    return `${selector}:where(.dark, .dark *)`;
  }

  return `${selector.slice(0, pseudoElement.index)}:where(.dark, .dark *)${selector.slice(pseudoElement.index)}`;
};

const createDarkSelector = (selectorPrefix, selector) => {
  const selectors = splitArgs(selector);

  if (selectorPrefix === '.dark') {
    return selectors.map((item) => appendSelectorDarkVariant(item)).join(', ');
  }

  return selectors
    .map((item) => {
      return `${selectorPrefix} ${item}`;
    })
    .join(', ');
};

const insertRuleAfterAnchor = (atRule, rule) => {
  const anchor = getTopLevelAnchor(atRule);
  anchor.parent.insertAfter(anchor, rule);
};

const removeEmptyRuleAncestors = (node) => {
  let current = node;

  while (current && current.type === 'rule' && (!current.nodes || current.nodes.length === 0)) {
    const parent = current.parent;
    current.remove();
    current = parent && parent.type === 'rule' ? parent : null;
  }
};

const replaceWithDarkRule = (atRule, selectorPrefix) => {
  if (!atRule.nodes) {
    throw atRule.error(`@mixin ${atRule.params} requires a declaration block`);
  }

  const parent = atRule.parent;
  insertRuleAfterAnchor(atRule, createRule(createDarkSelector(selectorPrefix, getFullSelector(atRule)), atRule.nodes));
  atRule.remove();
  removeEmptyRuleAncestors(parent);
};

const replaceLightDark = (atRule, selectorPrefix, params) => {
  const args = splitArgs(params);

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

module.exports = {
  replaceLightDark,
  replaceWithDarkRule,
};
