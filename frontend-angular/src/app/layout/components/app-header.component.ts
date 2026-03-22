import { Component } from '@angular/core';

import { AppLanguageSwitcherComponent } from './app-language-switcher.component';
import { AppNotificationsButtonComponent } from './app-notifications-button.component';
import { AppThemeToggleComponent } from './app-theme-toggle.component';
import { AppUserMenuComponent } from './app-user-menu.component';

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [
    AppThemeToggleComponent,
    AppLanguageSwitcherComponent,
    AppNotificationsButtonComponent,
    AppUserMenuComponent,
  ],
  template: `
    <header class="page-header">
      <div class="container flex h-full items-center justify-between">
        <div class="min-w-0 text-sm font-semibold text-surface-500 dark:text-surface-400">Dashboard workspace</div>
        <div class="flex items-center gap-1.5 md:gap-2.5">
          <app-theme-toggle />
          <app-language-switcher />
          <app-notifications-button />
          <span class="hidden lg:block h-10 w-px bg-surface-200 mx-1 dark:bg-surface-700"></span>
          <app-user-menu class="hidden lg:block" />
        </div>
      </div>
    </header>
  `,
})
export class AppHeaderComponent {}
