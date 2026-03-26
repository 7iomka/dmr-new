import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';

import { AppFooterComponent } from '../components/app-footer.component';
import { AppHeaderComponent } from '../components/app-header.component';
import { AppSidebarComponent } from '../components/app-sidebar.component';
import { AppMobileBottomNavComponent } from '../components/app-mobile-bottom-nav.component';

@Component({
  selector: 'app-shell',
  standalone: true,
  imports: [RouterOutlet, AppHeaderComponent, AppSidebarComponent, AppFooterComponent, AppMobileBottomNavComponent],
  template: `
    <div class="flex overflow-hidden min-h-screen" id="app">
      <app-sidebar />
      <div class="page-content-area">
        <app-header />
        <div class="page-body">
          <main class="page-main">
            <router-outlet />
          </main>
          <app-footer />
        </div>
      </div>
      <app-mobile-bottom-nav />
    </div>
  `,
})
export class AppShellComponent {}
