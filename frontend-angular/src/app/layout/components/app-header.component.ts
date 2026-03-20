import { Component } from '@angular/core';
import { DividerModule } from 'primeng/divider';

import { AppLanguageSwitcherComponent } from './app-language-switcher.component';
import { AppNotificationsButtonComponent } from './app-notifications-button.component';
import { AppThemeToggleComponent } from './app-theme-toggle.component';
import { AppUserMenuComponent } from './app-user-menu.component';

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [DividerModule, AppThemeToggleComponent, AppLanguageSwitcherComponent, AppNotificationsButtonComponent, AppUserMenuComponent],
  template: `
    <header class="app-topbar">
      <div class="container flex h-full items-center justify-between gap-3">
        <div class="text-sm font-semibold text-surface-500 dark:text-surface-400">Dashboard workspace</div>
        <div class="flex items-center gap-2 lg:gap-3">
          <app-theme-toggle />
          <app-language-switcher />
          <app-notifications-button />
          <p-divider layout="vertical" styleClass="!hidden !h-8 !lg:block !m-0" />
          <app-user-menu />
        </div>
      </div>
    </header>
  `
})
export class AppHeaderComponent {}
