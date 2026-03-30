import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';

import { AppFooterComponent } from '../components/app-footer.component';
import { AppHeaderComponent } from '../components/app-header.component';
import { AppMobileBottomNavComponent } from '../components/app-mobile-bottom-nav.component';
import { AppNotificationsDrawerComponent } from '../components/app-notifications-drawer.component';
import { AppSidebarComponent } from '../components/app-sidebar.component';

@Component({
  selector: 'app-shell',
  standalone: true,
  imports: [
    RouterOutlet,
    AppHeaderComponent,
    AppSidebarComponent,
    AppFooterComponent,
    AppMobileBottomNavComponent,
    AppNotificationsDrawerComponent,
  ],
  styleUrl: './app-shell.component.css',
  template: `
    <div class="app-shell" id="app">
      <app-sidebar class="app-shell__sidebar" />

      <div class="app-shell__content">
        <app-header class="app-shell__header" />

        <div class="app-shell__body">
          <main class="app-shell__main">
            <router-outlet />
          </main>

          <app-footer class="app-shell__footer" />
        </div>
      </div>

      <app-mobile-bottom-nav class="app-shell__mobile-nav" />
      <app-notifications-drawer class="app-shell__notifications-drawer" />
    </div>
  `,
})
export class AppShellComponent {}
