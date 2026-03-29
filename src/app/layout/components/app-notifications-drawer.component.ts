import { NgClass } from '@angular/common';
import { Component, computed, inject } from '@angular/core';
import { RouterLink } from '@angular/router';
import { LucideArrowRight, LucideBell, LucideDynamicIcon } from '@lucide/angular';
import { ButtonModule } from 'primeng/button';
import { DrawerModule } from 'primeng/drawer';

import { NotificationsKnowledgeBaseService } from '../../features/notifications/notifications-knowledge-base.service';

@Component({
  selector: 'app-notifications-drawer',
  standalone: true,
  imports: [DrawerModule, ButtonModule, RouterLink, NgClass, LucideBell, LucideArrowRight, LucideDynamicIcon],
  template: `
    <p-drawer
      class="notifications-drawer"
      header=""
      position="right"
      [closeButtonProps]="{ rounded: false, severity: 'secondary', text: true, size: 'small' }"
      [dismissible]="true"
      [modal]="true"
      [pt]="{
        header: { class: 'notifications-drawer__header' },
        content: { class: 'p-0 flex flex-col h-full' },
        footer: { class: 'notifications-drawer__footer' },
      }"
      [showCloseIcon]="true"
      [styleClass]="'notifications-drawer__panel'"
      [visible]="store.drawerOpen()"
      (visibleChange)="onVisibleChange($event)">
      <ng-template #header>
        <div>
          <h2 class="text-lg font-bold text-zinc-900 dark:text-zinc-100">Уведомления</h2>
          <p class="text-xs font-semibold text-zinc-500 dark:text-zinc-400">
            Непрочитанных: {{ store.unreadCount() }} · Показаны последние 10
          </p>
        </div>
      </ng-template>

      <div class="notifications-drawer__list">
        @if (!rows().length) {
          <div class="notifications-empty">
            <svg class="w-8 h-8 opacity-50" lucideBell></svg>
            <p class="text-sm font-semibold">Здесь пока пусто</p>
            <p class="text-xs">Новые уведомления появятся автоматически.</p>
          </div>
        }

        @for (item of rows(); track item.id) {
          <a
            class="notifications-item notifications-item--interactive"
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
                  <h3 class="notifications-item-title">#{{ item.id }} · {{ item.title }}</h3>
                  <span aria-hidden="true" class="notifications-unread-dot" [class.hidden]="item.isRead"></span>
                </div>

                <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400 line-clamp-2">{{ item.message }}</p>

                <div class="mt-2 flex items-center justify-between gap-2">
                  <span class="text-[11px] text-zinc-500 whitespace-nowrap">{{ relativeDate(item.createdAt) }}</span>
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
        <p class="text-[11px] font-semibold text-zinc-500 dark:text-zinc-400">Показаны не все уведомления</p>
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
