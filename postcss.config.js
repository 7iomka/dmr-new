module.exports = {
  plugins: {
    'tailwindcss/nesting': {},
    tailwindcss: {}, // ✅ Standard v3 plugin
    autoprefixer: {}, // ✅ Automatically adds browser prefixes
    'postcss-inset': {},
    '@csstools/postcss-is-pseudo-class': {
      preserve: true, // preserve new :is syntax alongside with fallback one
    },
    'postcss-pxtorem': {
      // we use 1rem = 16px (browser's default)
      rootValue: 16,
      unitPrecision: 5,
      propList: ['*', '!letter-spacing'],
      /**
       * ignore html,body {} rule - fixes issue with min-width: 375px
       * ignore scrollbar styles - fixes big scrollbars
       */
      selectorBlackList: [/^html[^body]+body$/, /^\.container/, /::-webkit-scrollbar/, /:export/],
      // Replace px with rem instead of adding fallback declarations.
      replace: true,
      mediaQuery: false,
      // Keep 1px borders/dividers crisp.
      minPixelValue: 2,
      // exclude: /node_modules/i
      exclude: () => {
        return false;
      },
    },
  },
};
