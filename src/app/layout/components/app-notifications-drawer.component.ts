import { NgClass } from '@angular/common';
import { Component, computed, inject, ViewEncapsulation } from '@angular/core';
import { RouterLink } from '@angular/router';
import { LucideArrowRight, LucideBell, LucideDynamicIcon } from '@lucide/angular';
import { ButtonModule } from 'primeng/button';
import { DrawerModule } from 'primeng/drawer';

import { NotificationsKnowledgeBaseService } from '../../features/notifications/notifications-knowledge-base.service';

@Component({
  selector: 'app-notifications-drawer',
  standalone: true,
  imports: [DrawerModule, ButtonModule, RouterLink, NgClass, LucideBell, LucideArrowRight, LucideDynamicIcon],
  styleUrl: './app-notifications-drawer.component.css',
  encapsulation: ViewEncapsulation.None,
  template: `
    <p-drawer
      header=""
      position="right"
      [closeButtonProps]="{ rounded: false, severity: 'secondary', text: true, size: 'small' }"
      [dismissible]="true"
      [modal]="true"
      [pt]="{
        header: { class: 'app-notifications-drawer__header' },
        content: { class: 'app-notifications-drawer__content' },
        footer: { class: 'app-notifications-drawer__footer' },
      }"
      [showCloseIcon]="true"
      [styleClass]="'app-notifications-drawer'"
      [visible]="store.drawerOpen()"
      (visibleChange)="onVisibleChange($event)">
      <ng-template #header>
        <div>
          <h2 class="text-lg font-bold text-surface-900 dark:text-surface-100">Уведомления</h2>
          <p class="text-xs font-semibold text-surface-500 dark:text-surface-400">
            Непрочитанных: {{ store.unreadCount() }} · Показаны последние 10
          </p>
        </div>
      </ng-template>

      <div class="app-notifications-drawer__list">
        @if (!rows().length) {
          <div class="app-notifications-drawer__empty">
            <svg class="w-8 h-8 opacity-50" lucideBell></svg>
            <p class="text-sm font-semibold">Здесь пока пусто</p>
            <p class="text-xs">Новые уведомления появятся автоматически.</p>
          </div>
        }

        @for (item of rows(); track item.id) {
          <a
            class="app-notifications-drawer__item app-notifications-drawer__item--interactive"
            [class.app-notifications-drawer__item--unread]="!item.isRead"
            [routerLink]="['/notifications', item.id]"
            (click)="onNavigate(item.id)">
            <div class="app-notifications-drawer__item-main">
              <div class="app-notifications-drawer__item-icon-wrap" [ngClass]="store.typeMeta[item.type].wrapClass">
                <svg
                  class="w-4 h-4"
                  [lucideIcon]="store.typeMeta[item.type].icon"
                  [ngClass]="store.typeMeta[item.type].iconClass"></svg>
              </div>

              <div class="app-notifications-drawer__item-body">
                <div class="app-notifications-drawer__item-head">
                  <h3 class="app-notifications-drawer__item-title">#{{ item.id }} · {{ item.title }}</h3>
                  <span
                    aria-hidden="true"
                    class="app-notifications-drawer__item-dot"
                    [class.hidden]="item.isRead"></span>
                </div>

                <p class="mt-1 text-xs text-surface-500 dark:text-surface-400 line-clamp-2">{{ item.message }}</p>

                <div class="app-notifications-drawer__item-meta">
                  <span class="app-notifications-drawer__item-time">{{ relativeDate(item.createdAt) }}</span>
                  <span outlined pButton severity="secondary" size="small">
                    <span pButtonLabel>Перейти</span>
                    <svg class="w-3.5 h-3.5" lucideArrowRight pButtonIcon></svg>
                  </span>
                </div>
              </div>
            </div>
          </a>
        }
      </div>

      <ng-template #footer>
        <p class="text-[11px] font-semibold text-surface-500 dark:text-surface-400">Показаны не все уведомления</p>
        <a pButton routerLink="/notifications" severity="primary" size="small" (click)="store.closeDrawer()">
          <span pButtonLabel>Все уведомления</span>
          <svg class="w-3.5 h-3.5" lucideArrowRight pButtonIcon></svg>
        </a>
      </ng-template>
    </p-drawer>
  `,
})
export class AppNotificationsDrawerComponent {
  protected readonly store = inject(NotificationsKnowledgeBaseService);
  protected readonly rows = computed(() => this.store.getFilteredRows({ sort: 'date_desc' }).slice(0, 10));

  protected onVisibleChange(visible: boolean): void {
    if (!visible) {
      this.store.closeDrawer();
    }
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
