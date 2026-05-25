import { provideZoneChangeDetection } from '@angular/core';
import { bootstrapApplication } from '@angular/platform-browser';
import { provideRouter } from '@angular/router';
import { providePrimeNG } from 'primeng/config';
import { UseStyle } from 'primeng/usestyle';
import { provideLucideConfig } from '@lucide/angular';
import { polyfillCountryFlagEmojis } from 'country-flag-emoji-polyfill';

import { AppComponent } from './app/app.component';
import { appRoutes } from './app/app.routes';
import { AppThemePreset } from './app/core/theme/app-theme.preset';
import { patchPrimeNgAutoFocus } from './app/core/patches/primeng-autofocus.patch';
import { AppPrimeNgUseStyle } from './app/core/patches/primeng-style-order.service';

patchPrimeNgAutoFocus();

bootstrapApplication(AppComponent, {
  providers: [
    provideZoneChangeDetection(),
    provideRouter(appRoutes),
    provideLucideConfig({
      size: 20,
      color: 'currentColor',
    }),
    providePrimeNG({
      theme: {
        preset: AppThemePreset,
        options: {
          darkModeSelector: '.dark',
          cssLayer: false,
        },
      },
      ripple: true,
      ptOptions: {
        mergeProps: true,
      },
    }),
    { provide: UseStyle, useClass: AppPrimeNgUseStyle },
  ],
}).catch((err) => console.error(err));

polyfillCountryFlagEmojis('Twemoji Mozilla');
