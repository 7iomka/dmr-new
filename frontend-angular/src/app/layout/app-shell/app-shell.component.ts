import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';

import { AppFooterComponent } from '../components/app-footer.component';
import { AppHeaderComponent } from '../components/app-header.component';
import { AppSidebarComponent } from '../components/app-sidebar.component';

@Component({
  selector: 'app-shell',
  standalone: true,
  imports: [RouterOutlet, AppHeaderComponent, AppSidebarComponent, AppFooterComponent],
  template: `
    <div class="app-shell">
      <app-sidebar />
      <div class="app-main">
        <app-header />
        <main class="app-content">
          <div class="app-page-container">
            <router-outlet />
          </div>
        </main>
        <app-footer />
      </div>
    </div>
  `
})
export class AppShellComponent {}
