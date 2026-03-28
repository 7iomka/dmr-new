import { provideZoneChangeDetection } from '@angular/core';
import { bootstrapApplication } from '@angular/platform-browser';
import { provideRouter } from '@angular/router';
import { providePrimeNG } from 'primeng/config';
import { provideLucideConfig } from '@lucide/angular';

import { AppComponent } from './app/app.component';
import { appRoutes } from './app/app.routes';
import { AppThemePreset } from './app/core/theme/app-theme.preset';
import { patchPrimeNgAutoFocus } from './app/core/patches/primeng-autofocus.patch';

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
          cssLayer: {
            name: 'primeng',
            order: 'theme, base, primeng',
          },
        },
      },
      ripple: true,
      ptOptions: {
        mergeProps: true,
      },
    }),
  ],
}).catch((err) => console.error(err));
