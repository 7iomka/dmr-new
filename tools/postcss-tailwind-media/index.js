// tools/postcss-tailwind-media/index.js
const path = require('path');
const jiti = require('jiti')(__filename);
const resolveConfig = require('tailwindcss/resolveConfig.js');

module.exports = (opts = {}) => {
  return {
    postcssPlugin: 'postcss-tailwind-media',
    Once(root) {
      try {
        // 1. Resolve Tailwind configuration safely from the workspace root
        const tailwindConfigPath = path.resolve(process.cwd(), 'tailwind.config.ts');
        const tailwindConfigTS = jiti(tailwindConfigPath).default;
        const fullConfig = resolveConfig(tailwindConfigTS);
        const screens = fullConfig.theme.screens;

        const customMediaEntries = {};
        const keys = Object.keys(screens);

        /**
         * Helper to safely convert any breakpoint value (px or em) into a clean numeric EM float
         */
        const getEmValue = (val) => {
          if (typeof val === 'string') {
            if (val.endsWith('px')) {
              return parseFloat(val) / 16;
            }
            if (val.endsWith('em') || val.endsWith('rem')) {
              return parseFloat(val);
            }
          }
          return parseFloat(val) / 16;
        };

        // 2. Map all breakpoints from tailwind.config.ts to native CSS media formats
        keys.forEach((key, index) => {
          const currentEm = getEmValue(screens[key]);

          // Base min-width aliases (e.g., `--md` -> `(min-width: 48em)`)
          customMediaEntries[`--${key}`] = `(min-width: ${currentEm}em)`;

          // Strict max-width aliases (e.g., `--max-md` -> `(max-width: 47.99em)`)
          customMediaEntries[`--max-${key}`] = `(max-width: ${(currentEm - 0.01).toFixed(2)}em)`;

          // Range intervals aliases (e.g., `--md-lg` -> `(min-width: 48em) and (max-width: 63.99em)`)
          if (index < keys.length - 1) {
            const nextKey = keys[index + 1];
            const nextEm = getEmValue(screens[nextKey]);

            customMediaEntries[`--${key}-${nextKey}`] =
              `(min-width: ${currentEm}em) and (max-width: ${(nextEm - 0.01).toFixed(2)}em)`;
          }
        });

        // 3. Scan and manually transform @media rules inside Angular standalone components
        root.walkAtRules('media', (atRule) => {
          const params = atRule.params.trim();

          // Clean parentheses context from rules like @media (--md)
          const cleanParam = params.replace(/^\((.+)\)$/, '$1').trim();

          if (customMediaEntries[cleanParam]) {
            atRule.params = customMediaEntries[cleanParam];
          }
        });
      } catch (error) {
        console.error('❌ [postcss-tailwind-media] Error processing stylesheet:', error);
      }
    },
  };
};

// Explicit PostCSS 8+ plugin flag registration
module.exports = Object.assign(module.exports, { postcss: true });
