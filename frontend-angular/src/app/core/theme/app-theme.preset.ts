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
      950: '{emerald.950}'
    },
    borderRadius: {
      sm: '6px',
      md: '8px',
      lg: '12px',
      xl: '14px'
    }
  },
  components: {
    card: {
      root: {
        borderRadius: '12px',
        shadow: '0 1px 3px 0 rgb(0 0 0 / 0.08), 0 1px 2px -1px rgb(0 0 0 / 0.08)'
      },
      body: {
        padding: '1rem',
        gap: '0'
      },
      colorScheme: {
        light: {
          root: {
            background: '#ffffff',
            color: '{surface.900}'
          }
        },
        dark: {
          root: {
            background: '#14171a',
            color: '{surface.0}'
          }
        }
      }
    }
  }
});
