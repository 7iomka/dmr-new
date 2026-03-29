import { NgClass } from '@angular/common';
import { Component, computed, effect, inject } from '@angular/core';
import { RouterLink } from '@angular/router';
import { LucideArrowRight, LucideDynamicIcon, LucideX } from '@lucide/angular';
import { ButtonModule } from 'primeng/button';

import { NotificationsKnowledgeBaseService } from '../../features/notifications/notifications-knowledge-base.service';

@Component({
  selector: 'app-notifications-drawer',
  standalone: true,
  imports: [ButtonModule, RouterLink, NgClass, LucideDynamicIcon, LucideX, LucideArrowRight],
  template: `
    @if (store.drawerOpen()) {
      <button
        aria-label="Закрыть уведомления"
        class="overlay fixed inset-0 z-[1090] notifications-drawer-overlay"
        type="button"
        (click)="store.closeDrawer()"></button>
    }

    <aside
      aria-labelledby="notifications-drawer-title"
      aria-modal="true"
      class="notifications-drawer"
      role="dialog"
      tabindex="-1"
      [class.active]="store.drawerOpen()">
      <div class="notifications-drawer__header">
        <div>
          <h2 class="text-lg font-bold text-zinc-900 dark:text-zinc-100" id="notifications-drawer-title">
            Уведомления
          </h2>
          <p class="text-xs font-semibold text-zinc-500 dark:text-zinc-400">
            Непрочитанных: {{ store.unreadCount() }} · Показаны последние 10
          </p>
        </div>

        <p-button
          ariaLabel="Закрыть уведомления"
          severity="secondary"
          styleClass="p-button-icon-only notifications-close-btn"
          variant="outlined"
          (onClick)="store.closeDrawer()">
          <svg class="h-4 w-4" lucideX pButtonIcon></svg>
        </p-button>
      </div>

      <div class="notifications-drawer__list">
        @if (!rows().length) {
          <div class="notifications-empty">
            <svg class="w-8 h-8 opacity-50" [lucideIcon]="'bell'"></svg>
            <p class="text-sm font-semibold">Здесь пока пусто</p>
            <p class="text-xs">Новые уведомления появятся автоматически.</p>
          </div>
        }

        @for (item of rows(); track item.id) {
          <a
            class="notifications-item notifications-item--interactive block focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500 dark:focus-visible:ring-primary-400"
            [class.is-unread]="!item.isRead"
            [routerLink]="['/notifications', item.id]"
            (click)="onNavigate(item.id)">
            <div class="flex items-start gap-3">
              <div class="notifications-icon-wrap" [ngClass]="store.typeMeta[item.type].wrapClass">
                <svg
                  class="w-4 h-4"
                  [lucideIcon]="store.typeMeta[item.type].icon"
                  [ngClass]="store.typeMeta[item.type].iconClass"></svg>
              </div>

              <div class="min-w-0 flex-1">
                <div class="flex items-start justify-between gap-2">
                  <h3 class="notifications-item-title">{{ item.title }}</h3>
                  <span aria-hidden="true" class="notifications-unread-dot" [class.hidden]="item.isRead"></span>
                </div>

                <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400 line-clamp-2">{{ item.message }}</p>

                <div class="mt-2 flex items-center justify-between gap-2">
                  <span class="text-[11px] text-zinc-500 whitespace-nowrap">{{ relativeDate(item.createdAt) }}</span>
                  <span aria-hidden="true" class="btn-secondary btn-sm">
                    <span>Перейти</span>
                    <svg class="w-3.5 h-3.5" lucideArrowRight></svg>
                  </span>
                </div>
              </div>
            </div>
          </a>
        }
      </div>

      <div class="notifications-drawer__footer">
        <p class="text-[11px] font-semibold text-zinc-500 dark:text-zinc-400">Показаны не все уведомления</p>
        <a class="btn-primary btn-sm" routerLink="/notifications" (click)="store.closeDrawer()">
          <span>Все уведомления</span>
          <svg class="w-3.5 h-3.5" lucideArrowRight></svg>
        </a>
      </div>
    </aside>
  `,
})
export class AppNotificationsDrawerComponent {
  protected readonly store = inject(NotificationsKnowledgeBaseService);
  protected readonly rows = computed(() => this.store.getFilteredRows({ sort: 'date_desc' }).slice(0, 10));

  constructor() {
    effect(() => {
      document.body.style.overflow = this.store.drawerOpen() ? 'hidden' : '';
    });
  }

  protected onNavigate(id: string): void {
    this.store.markAsRead(id);
    this.store.closeDrawer();
  }

  protected relativeDate(iso: string): string {
    const date = new Date(iso);
    const diff = Date.now() - date.getTime();
    const hours = Math.floor(diff / 3600000);

    if (hours < 1) {
      return 'только что';
    }
    if (hours < 24) {
      return `${hours} ч назад`;
    }

    const days = Math.floor(hours / 24);
    if (days < 7) {
      return `${days} д назад`;
    }

    return date.toLocaleDateString('ru-RU', {
      day: '2-digit',
      month: 'short',
    });
  }
}
