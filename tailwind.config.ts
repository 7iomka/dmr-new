import type { Config } from 'tailwindcss';
import aspectRatioPlugin from '@tailwindcss/aspect-ratio';
import defaultTheme from 'tailwindcss/defaultTheme';
import PrimeUI from 'tailwindcss-primeui';

import {
  appPrimitivePaletteNames,
  colorSteps,
  hslFlatScale,
  hslPalettes,
  hslToken,
  surfaceSteps,
} from './src/app/core/theme/theme-token.helpers';

const withAlpha = { alpha: true } as const;

/**
 * CSS variable token helper.
 *
 * token('text-sm') -> var(--text-sm)
 * token('radius-lg') -> var(--radius-lg)
 */
const token = (name: string) => `var(--${name})`;

const textSize = (name: string): [string, { lineHeight: string }] => [
  token(`text-${name}`),
  { lineHeight: token(`text-${name}--line-height`) },
];

const opacityScale = Object.fromEntries(
  Array.from({ length: 101 }, (_, value) => [String(value), String(value / 100)]),
);

export default {
  // darkMode: ['variant', '.dark &'],
  darkMode: 'selector',

  content: ['./src/**/*.{html,ts}'],

  theme: {
    fontFamily: {
      sans: token('font-sans'),
      serif: token('font-serif'),
      mono: token('font-mono'),
    },

    fontSize: {
      xs: textSize('xs'),
      sm: textSize('sm'),
      base: textSize('base'),
      lg: textSize('lg'),
      xl: textSize('xl'),
      '2xl': textSize('2xl'),
      '3xl': textSize('3xl'),
      '4xl': textSize('4xl'),
      '5xl': textSize('5xl'),
      '6xl': textSize('6xl'),
      '7xl': textSize('7xl'),
      '8xl': textSize('8xl'),
      '9xl': textSize('9xl'),
    },

    letterSpacing: {
      tighter: token('tracking-tighter'),
      tight: token('tracking-tight'),
      normal: token('tracking-normal'),
      wide: token('tracking-wide'),
      wider: token('tracking-wider'),
      widest: token('tracking-widest'),
    },

    lineHeight: {
      ...defaultTheme.lineHeight,
      none: '1',
      tight: token('leading-tight'),
      snug: token('leading-snug'),
      normal: token('leading-normal'),
      relaxed: token('leading-relaxed'),
      loose: token('leading-loose'),
    },

    borderRadius: {
      none: '0px',
      xs: token('radius-xs'),
      sm: token('radius-sm'),
      DEFAULT: token('radius-sm'),
      md: token('radius-md'),
      lg: token('radius-lg'),
      xl: token('radius-xl'),
      '2xl': token('radius-2xl'),
      '3xl': token('radius-3xl'),
      '4xl': token('radius-4xl'),
      full: '9999px',
    },

    boxShadow: {
      '2xs': token('shadow-2xs'),
      xs: token('shadow-xs'),
      sm: token('shadow-sm'),
      DEFAULT: token('shadow-sm'),
      md: token('shadow-md'),
      lg: token('shadow-lg'),
      xl: token('shadow-xl'),
      '2xl': token('shadow-2xl'),

      // Keep the default Tailwind v3 inner shadow utility.
      inner: 'inset 0 2px 4px 0 rgb(0 0 0 / 0.05)',
      none: 'none',
    },

    blur: {
      none: '0',
      0: '0',
      xs: token('blur-xs'),
      sm: token('blur-sm'),
      DEFAULT: token('blur-sm'),
      md: token('blur-md'),
      lg: token('blur-lg'),
      xl: token('blur-xl'),
      '2xl': token('blur-2xl'),
      '3xl': token('blur-3xl'),
    },

    screens: {
      min: '375px',
      xs: '414px',
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      lp: '1366px',
      '2xl': '1536px',
    },

    extend: {
      opacity: opacityScale,
      colors: {
        // Neutral HSL channel colors.
        white: hslToken('white', withAlpha),
        black: hslToken('black', withAlpha),

        // Palette colors defined in colors.css.
        ...hslPalettes(appPrimitivePaletteNames, withAlpha),

        // PrimeUI-compatible semantic aliases.
        primary: hslToken('primary-color', withAlpha),
        'primary-emphasis': hslToken('primary-hover-color', withAlpha),
        'primary-emphasis-alt': hslToken('primary-active-color', withAlpha),
        'primary-contrast': hslToken('primary-contrast-color', withAlpha),

        // Flat PrimeUI-compatible color names:
        // bg-primary-500, text-surface-700, border-surface-200/50, etc.
        ...hslFlatScale('primary', colorSteps, withAlpha),
        ...hslFlatScale('surface', surfaceSteps, withAlpha),

        // Custom app colors.
        card: hslToken('app-color-card', withAlpha),
        dark: hslToken('app-color-dark', withAlpha),
      },
    },
  },

  plugins: [aspectRatioPlugin, PrimeUI],

  corePlugins: {
    aspectRatio: false,
    container: false,
  },
} satisfies Config;
