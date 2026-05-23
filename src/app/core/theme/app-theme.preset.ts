import { definePreset } from '@primeuix/themes';
import Aura from '@primeuix/themes/aura';

const hsl = (name: string) => `hsl(var(--hsl-${name}))`;

export const AppThemePreset = definePreset(Aura, {
  semantic: {
    primary: {
      50: hsl('primary-50'),
      100: hsl('primary-100'),
      200: hsl('primary-200'),
      300: hsl('primary-300'),
      400: hsl('primary-400'),
      500: hsl('primary-500'),
      600: hsl('primary-600'),
      700: hsl('primary-700'),
      800: hsl('primary-800'),
      900: hsl('primary-900'),
      950: hsl('primary-950'),
    },

    surface: {
      0: hsl('surface-0'),
      50: hsl('surface-50'),
      100: hsl('surface-100'),
      200: hsl('surface-200'),
      300: hsl('surface-300'),
      400: hsl('surface-400'),
      500: hsl('surface-500'),
      600: hsl('surface-600'),
      700: hsl('surface-700'),
      800: hsl('surface-800'),
      900: hsl('surface-900'),
      950: hsl('surface-950'),
    },

    colorScheme: {
      light: {
        // used for --p-primary-[]-color generated variable, so we defined it our variable
        primary: {
          color: hsl('primary-color'),
          contrastColor: hsl('primary-contrast-color'),
          hoverColor: hsl('primary-hover-color'),
          activeColor: hsl('primary-active-color'),
        },
      },
      dark: {
        // used for --p-primary-[]-color generated variable, so we defined it our variable
        primary: {
          color: hsl('primary-color'),
          contrastColor: hsl('primary-contrast-color'),
          hoverColor: hsl('primary-hover-color'),
          activeColor: hsl('primary-active-color'),
        },
        formField: {
          borderColor: '{surface.700}',
          hoverBorderColor: '{surface.600}',
        },
      },
    },
    borderRadius: {
      xs: 'var(--radius-xs)',
      sm: 'var(--radius-sm)',
      md: 'var(--radius-md)',
      lg: 'var(--radius-lg)',
      xl: 'var(--radius-xl)',
    },
  },
});
