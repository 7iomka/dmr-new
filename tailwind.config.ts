import type { Config } from 'tailwindcss';
import aspectRatioPlugin from '@tailwindcss/aspect-ratio';
import PrimeUI from 'tailwindcss-primeui';

const hslVar = (name: string) => `hsl(var(${name}) / <alpha-value>)`;

const colorSteps = ['50', '100', '200', '300', '400', '500', '600', '700', '800', '900', '950'] as const;

const hslScale = (name: string) =>
  Object.fromEntries(colorSteps.map((step) => [step, hslVar(`--hsl-${name}-${step}`)]));

const hslPalettes = (...names: string[]) => Object.fromEntries(names.map((name) => [name, hslScale(name)]));

export default {
  darkMode: ['class', '[data-theme="dark"]'],
  content: ['./{src}/**/*.{html,ts}'],
  theme: {
    extend: {
      colors: {
        primary: hslVar('--hsl-primary-color'),
        'primary-emphasis': hslVar('--hsl-primary-hover-color'),
        'primary-emphasis-alt': hslVar('--hsl-primary-active-color'),
        'primary-contrast': hslVar('--hsl-primary-contrast-color'),

        'primary-50': hslVar('--hsl-primary-50'),
        'primary-100': hslVar('--hsl-primary-100'),
        'primary-200': hslVar('--hsl-primary-200'),
        'primary-300': hslVar('--hsl-primary-300'),
        'primary-400': hslVar('--hsl-primary-400'),
        'primary-500': hslVar('--hsl-primary-500'),
        'primary-600': hslVar('--hsl-primary-600'),
        'primary-700': hslVar('--hsl-primary-700'),
        'primary-800': hslVar('--hsl-primary-800'),
        'primary-900': hslVar('--hsl-primary-900'),
        'primary-950': hslVar('--hsl-primary-950'),

        'surface-0': hslVar('--hsl-surface-0'),
        'surface-50': hslVar('--hsl-surface-50'),
        'surface-100': hslVar('--hsl-surface-100'),
        'surface-200': hslVar('--hsl-surface-200'),
        'surface-300': hslVar('--hsl-surface-300'),
        'surface-400': hslVar('--hsl-surface-400'),
        'surface-500': hslVar('--hsl-surface-500'),
        'surface-600': hslVar('--hsl-surface-600'),
        'surface-700': hslVar('--hsl-surface-700'),
        'surface-800': hslVar('--hsl-surface-800'),
        'surface-900': hslVar('--hsl-surface-900'),
        'surface-950': hslVar('--hsl-surface-950'),

        // You must define them in colors.css
        ...hslPalettes('sky', 'amber', 'red'),
      },
    },
  },
  plugins: [aspectRatioPlugin, PrimeUI],
  corePlugins: {
    aspectRatio: false,
    container: false,
  },
} satisfies Config;
