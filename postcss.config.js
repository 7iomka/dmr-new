export default {
  plugins: {
    'tailwindcss/nesting': {},
    tailwindcss: {}, // ✅ Standard v3 plugin
    autoprefixer: {}, // ✅ Automatically adds browser prefixes
    'postcss-inset': {},
    '@csstools/postcss-is-pseudo-class': {
      preserve: true, // preserve new :is syntax alongside with fallback one
    },
  },
};
