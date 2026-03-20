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
    <div id="app" class="flex overflow-hidden min-h-screen">
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
    </div>
  `
})
export class AppShellComponent {}
