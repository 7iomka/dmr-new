import { Component, inject } from '@angular/core';
import { Router, RouterLink, RouterOutlet } from '@angular/router';
import { LucideMessageCircleQuestionMark } from '@lucide/angular';
import { MessageService } from 'primeng/api';
import { ToastModule } from 'primeng/toast';

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
    RouterLink,
    AppHeaderComponent,
    AppSidebarComponent,
    AppFooterComponent,
    AppMobileBottomNavComponent,
    AppNotificationsDrawerComponent,
    LucideMessageCircleQuestionMark,
    ToastModule,
  ],
  providers: [MessageService],
  styleUrl: './app-shell.component.css',
  host: {
    '[class.app-shell--sidebar-collapse]': 'sidebarModeService.isCollapsed()',
  },
  template: `
    <p-toast position="top-right" />

    <div class="app-shell" id="app">
      <app-sidebar class="app-shell__sidebar" />

      <div class="app-shell__content">
        <app-header class="app-shell__header" />

        <div class="app-shell__body">
          <main class="app-shell__main container">
            <router-outlet />
          </main>

          <app-footer class="app-shell__footer" />
        </div>
      </div>

      @if (!isChatRoute()) {
        <div class="app-shell__chat-fab-wrap">
          <a aria-label="Открыть чат поддержки" class="app-shell__chat-fab" routerLink="/chat">
            <svg aria-hidden="true" class="app-shell__chat-fab-icon" lucideMessageCircleQuestionMark></svg>
            <span class="app-shell__chat-fab-badge-wrap">
              <span class="app-shell__chat-fab-ping"></span>
              <span class="app-shell__chat-fab-badge">99</span>
            </span>
          </a>
        </div>
      }

      <app-mobile-bottom-nav class="app-shell__mobile-nav" />
      <app-notifications-drawer class="app-shell__notifications-drawer" />
    </div>
  `,
})
export class AppShellComponent {
  protected readonly sidebarModeService = inject(SidebarModeService);
  private readonly router = inject(Router);

  protected isChatRoute(): boolean {
    return this.router.url.startsWith('/chat');
  }
}
