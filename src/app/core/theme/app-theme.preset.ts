import { definePreset } from '@primeuix/themes';
import Aura from '@primeuix/themes/aura';

export const AppThemePreset = definePreset(Aura, {
  semantic: {
    primary: {
      50: '{emerald.50}',
      100: '{emerald.100}',
      200: '{emerald.200}',
      300: '{emerald.300}',
      400: '{emerald.400}',
      500: '{emerald.500}',
      600: '{emerald.600}',
      700: '{emerald.700}',
      800: '{emerald.800}',
      900: '{emerald.900}',
      950: '{emerald.950}',
    },
    colorScheme: {
      light: {
        primary: {
          color: '{primary.500}',
          contrastColor: '#ffffff',
          hoverColor: '{primary.600}',
          activeColor: '{primary.700}',
        },
        // highlight: {
        //   background: '{primary.950}',
        //   focusBackground: '{primary.700}',
        //   color: '#ffffff',
        //   focusColor: '#ffffff',
        // },
      },
      dark: {
        primary: {
          color: '{primary.500}',
          contrastColor: '{primary.950}',
          hoverColor: '{primary.400}',
          activeColor: '{primary.300}',
        },
        // highlight: {
        //   background: '{primary.50}',
        //   focusBackground: '{primary.300}',
        //   color: '{primary.950}',
        //   focusColor: '{primary.950}',
        // },
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
