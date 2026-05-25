import { definePreset } from '@primeuix/themes';
import Aura from '@primeuix/themes/aura';

import { appPrimitivePaletteNames, hslPalettes, hslScale, hslSurfaceScale, hslToken } from './theme-token.helpers';

export const AppThemePreset = definePreset(Aura, {
  primitive: {
    ...hslPalettes(appPrimitivePaletteNames),
  },

  semantic: {
    primary: hslScale('primary'),

    surface: hslSurfaceScale(),

    colorScheme: {
      light: {
        primary: {
          color: hslToken('primary-color'),
          contrastColor: hslToken('primary-contrast-color'),
          hoverColor: hslToken('primary-hover-color'),
          activeColor: hslToken('primary-active-color'),
        },
      },

      dark: {
        primary: {
          color: hslToken('primary-color'),
          contrastColor: hslToken('primary-contrast-color'),
          hoverColor: hslToken('primary-hover-color'),
          activeColor: hslToken('primary-active-color'),
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
      '2xl': 'var(--radius-2xl)',
      '3xl': 'var(--radius-3xl)',
      '4xl': 'var(--radius-4xl)',
    },
  },
});
