import { Component, DestroyRef, ElementRef, inject, signal, viewChild } from '@angular/core';
import { NavigationEnd, Router, RouterLink, RouterOutlet } from '@angular/router';
import { LucideMessageCircleQuestionMark } from '@lucide/angular';
import { MessageService } from 'primeng/api';
import { ToastModule } from 'primeng/toast';
import { filter, fromEvent, merge, of } from 'rxjs';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';

import { SidebarModeService } from '../../core/theme/sidebar-mode.service';
import { CHAT_DIALOGS_STORAGE_KEY, CHAT_DIALOGS_UPDATED_EVENT } from '../../features/chat/chat-storage.constants';
import { AppFooterComponent } from '../components/app-footer.component';
import { AppHeaderComponent } from '../components/app-header.component';
import { AppMobileBottomNavComponent } from '../components/app-mobile-bottom-nav.component';
import { AppNotificationsDrawerComponent } from '../components/app-notifications-drawer.component';
import { AppSidebarComponent } from '../components/app-sidebar.component';

const APP_SHELL_SCROLL_STATE_KEY = 'app-shell-scroll-state';

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

        <div #scrollContainer class="app-shell__body">
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
            <span class="app-shell__chat-fab-badge-wrap" [class.hidden]="unreadChatCount() === 0">
              <span class="app-shell__chat-fab-ping"></span>
              <span class="app-shell__chat-fab-badge">{{ unreadChatCount() }}</span>
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
  private readonly destroyRef = inject(DestroyRef);
  private readonly scrollContainer = viewChild<ElementRef<HTMLElement>>('scrollContainer');
  protected readonly unreadChatCount = signal(0);
  private initialScrollHandled = false;

  constructor() {
    if (typeof window === 'undefined') {
      return;
    }

    merge(
      of(null),
      fromEvent(window, CHAT_DIALOGS_UPDATED_EVENT),
      this.router.events.pipe(filter((event) => event instanceof NavigationEnd)),
    )
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe(() => {
        this.unreadChatCount.set(this.readUnreadCountFromStorage());
      });

    fromEvent(window, 'pagehide')
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe(() => {
        this.persistScrollStateForReload();
      });

    this.router.events
      .pipe(
        filter((event) => event instanceof NavigationEnd),
        takeUntilDestroyed(this.destroyRef),
      )
      .subscribe((event) => {
        this.handleRouteScroll((event as NavigationEnd).urlAfterRedirects);
      });
  }

  protected isChatRoute(): boolean {
    return this.router.url.startsWith('/chat');
  }

  private handleRouteScroll(url: string): void {
    this.scheduleAfterNavigation(() => {
      const scrollContainer = this.scrollContainer()?.nativeElement;
      if (!scrollContainer) {
        return;
      }

      const [pathWithQuery, fragment = ''] = url.split('#');
      const normalizedUrl = this.normalizeUrl(pathWithQuery);

      if (!this.initialScrollHandled) {
        this.initialScrollHandled = true;

        const restored = this.restoreScrollStateForReload(normalizedUrl);
        if (restored) {
          return;
        }

        if (fragment) {
          this.scrollToFragment(fragment);
        }

        return;
      }

      if (fragment) {
        this.scrollToFragment(fragment);
        return;
      }

      scrollContainer.scrollTo({ top: 0, left: 0, behavior: 'auto' });
    });
  }

  private scrollToFragment(fragment: string): void {
    const targetId = decodeURIComponent(fragment);
    const target =
      document.getElementById(targetId) ??
      (document.querySelector(`[name="${CSS.escape(targetId)}"]`) as HTMLElement | null);

    target?.scrollIntoView({ block: 'start', inline: 'nearest' });
  }

  private persistScrollStateForReload(): void {
    const scrollContainer = this.scrollContainer()?.nativeElement;
    if (!scrollContainer) {
      return;
    }

    const payload = JSON.stringify({
      url: this.normalizeUrl(this.router.url),
      scrollTop: scrollContainer.scrollTop,
    });

    window.sessionStorage.setItem(APP_SHELL_SCROLL_STATE_KEY, payload);
  }

  private restoreScrollStateForReload(expectedUrl: string): boolean {
    const scrollContainer = this.scrollContainer()?.nativeElement;
    if (!scrollContainer) {
      return false;
    }

    const raw = window.sessionStorage.getItem(APP_SHELL_SCROLL_STATE_KEY);
    if (!raw) {
      return false;
    }

    window.sessionStorage.removeItem(APP_SHELL_SCROLL_STATE_KEY);

    try {
      const parsed = JSON.parse(raw) as { scrollTop?: unknown; url?: unknown };
      if (parsed.url !== expectedUrl || typeof parsed.scrollTop !== 'number') {
        return false;
      }

      scrollContainer.scrollTo({ top: parsed.scrollTop, left: 0, behavior: 'auto' });
      return true;
    } catch {
      return false;
    }
  }

  private normalizeUrl(url: string): string {
    return url.split('#')[0] ?? url;
  }

  private scheduleAfterNavigation(callback: () => void): void {
    requestAnimationFrame(() => {
      requestAnimationFrame(callback);
    });
  }

  private readUnreadCountFromStorage(): number {
    if (typeof window === 'undefined') {
      return 0;
    }

    const raw = window.localStorage.getItem(CHAT_DIALOGS_STORAGE_KEY);
    if (!raw) {
      return 0;
    }

    try {
      const parsed = JSON.parse(raw) as unknown;
      if (!Array.isArray(parsed)) {
        return 0;
      }

      return parsed.reduce((total, dialog) => {
        if (typeof dialog !== 'object' || dialog === null) {
          return total;
        }

        const unreadCount = (dialog as { unreadCount?: unknown }).unreadCount;
        return total + (typeof unreadCount === 'number' ? unreadCount : 0);
      }, 0);
    } catch {
      return 0;
    }
  }
}
