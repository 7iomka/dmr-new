import { Component } from '@angular/core';

import { AppLanguageSwitcherComponent } from './app-language-switcher.component';
import { AppNotificationsButtonComponent } from './app-notifications-button.component';
import { AppThemeToggleComponent } from './app-theme-toggle.component';
import { AppUserMenuComponent } from './app-user-menu.component';

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [AppThemeToggleComponent, AppLanguageSwitcherComponent, AppNotificationsButtonComponent, AppUserMenuComponent],
  template: `
    <header class="app-topbar">
      <div class="container flex h-full items-center justify-between">
        <div class="min-w-0 text-sm font-semibold text-surface-500 dark:text-surface-400">Dashboard workspace</div>
        <div class="flex items-center gap-1.5 md:gap-2.5">
          <app-theme-toggle />
          <app-language-switcher />
          <app-notifications-button />
          <span class="shell-topbar-divider"></span>
          <app-user-menu />
        </div>
      </div>
    </header>
  `
})
export class AppHeaderComponent {}
