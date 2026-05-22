import { definePreset } from '@primeuix/themes';
import Aura from '@primeuix/themes/aura';

export const AppThemePreset = definePreset(Aura, {
  semantic: {
    // 1. Указываем PrimeNG брать HSL-каналы для Primary
    primary: {
      50: 'hsl(var(--hsl-primary-50))',
      100: 'hsl(var(--hsl-primary-100))',
      200: 'hsl(var(--hsl-primary-200))',
      300: 'hsl(var(--hsl-primary-300))',
      400: 'hsl(var(--hsl-primary-400))',
      500: 'hsl(var(--hsl-primary-500))',
      600: 'hsl(var(--hsl-primary-600))',
      700: 'hsl(var(--hsl-primary-700))',
      800: 'hsl(var(--hsl-primary-800))',
      900: 'hsl(var(--hsl-primary-900))',
      950: 'hsl(var(--hsl-primary-950))',
    },

    // 2. Указываем PrimeNG брать HSL-каналы для Surface
    // (обязательно, так как ниже в formField мы ссылаемся на {surface.700})
    surface: {
      0: 'hsl(var(--hsl-surface-0))',
      50: 'hsl(var(--hsl-surface-50))',
      100: 'hsl(var(--hsl-surface-100))',
      200: 'hsl(var(--hsl-surface-200))',
      300: 'hsl(var(--hsl-surface-300))',
      400: 'hsl(var(--hsl-surface-400))',
      500: 'hsl(var(--hsl-surface-500))',
      600: 'hsl(var(--hsl-surface-600))',
      700: 'hsl(var(--hsl-surface-700))',
      800: 'hsl(var(--hsl-surface-800))',
      900: 'hsl(var(--hsl-surface-900))',
      950: 'hsl(var(--hsl-surface-950))',
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
        formField: {
          borderColor: '{surface.700}',
          hoverBorderColor: '{surface.600}',
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
