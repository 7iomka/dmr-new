import { Component, DestroyRef, inject } from '@angular/core';
import { NavigationEnd, Router, RouterOutlet } from '@angular/router';

import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import { filter } from 'rxjs';

import { SidebarModeService } from '../../core/theme/sidebar-mode.service';
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
  host: {
    '[class.app-shell--sidebar-collapse]': 'sidebarModeService.isCollapsed()',
  },
  template: `
    <div class="app-shell" id="app">
      <app-sidebar class="app-shell__sidebar" />

      <div class="app-shell__content">
        <app-header class="app-shell__header" />

        <div class="app-shell__body">
          <main class="app-shell__main container">
            <router-outlet />
          </main>

          @if (showFooter) {
            <app-footer class="app-shell__footer" />
          }
        </div>
      </div>

      <app-mobile-bottom-nav class="app-shell__mobile-nav" />
      <app-notifications-drawer class="app-shell__notifications-drawer" />
    </div>
  `,
})
export class AppShellComponent {
  protected readonly sidebarModeService = inject(SidebarModeService);
  private readonly router = inject(Router);
  private readonly destroyRef = inject(DestroyRef);

  protected showFooter = true;

  constructor() {
    this.syncFooterVisibility(this.router.url);

    this.router.events
      .pipe(
        filter((event): event is NavigationEnd => event instanceof NavigationEnd),
        takeUntilDestroyed(this.destroyRef),
      )
      .subscribe((event) => this.syncFooterVisibility(event.urlAfterRedirects));
  }

  private syncFooterVisibility(url: string): void {
    this.showFooter = !url.startsWith('/chat');
  }
}
