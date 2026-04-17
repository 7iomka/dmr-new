import { Component } from '@angular/core';

import { AppLanguageSwitcherComponent } from './app-language-switcher.component';
import { AppNotificationsButtonComponent } from './app-notifications-button.component';
import { AppThemeToggleComponent } from './app-theme-toggle.component';
import { AppUserAppMenuComponent } from './app-user-menu.component';

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [
    AppThemeToggleComponent,
    AppLanguageSwitcherComponent,
    AppNotificationsButtonComponent,
    AppUserAppMenuComponent,
  ],
  styleUrl: './app-header.component.css',
  host: {
    class: 'app-header',
  },
  template: `
    <header class="app-header__inner">
      <div class="container flex h-full items-center justify-between">
        <a class="app-header__logo" routerLink="/">
          <img alt="DMR" class="app-header__logo-light" src="assets/img/logo-light.svg" />
          <img alt="DMR" class="app-header__logo-dark" src="assets/img/logo-dark.svg" />
        </a>
        <div class="app-header__actions">
          <app-theme-toggle />
          <app-language-switcher />
          <app-notifications-button />
          <span class="app-header__divider"></span>
          <app-user-menu class="hidden lg:block" />
        </div>
      </div>
    </header>
  `,
})
export class AppHeaderComponent {}
