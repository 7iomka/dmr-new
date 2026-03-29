import { Component, computed, inject } from '@angular/core';
import { LucideBell } from '@lucide/angular';
import { ButtonModule } from 'primeng/button';

import { NotificationsKnowledgeBaseService } from '../../features/notifications/notifications-knowledge-base.service';

@Component({
  selector: 'app-notifications-button',
  standalone: true,
  imports: [ButtonModule, LucideBell],
  template: `
    <div class="inline-flex relative">
      <p-button
        ariaLabel="Открыть уведомления"
        severity="secondary"
        variant="outlined"
        [attr.aria-expanded]="store.drawerOpen()"
        [styleClass]="store.drawerOpen() ? 'p-button-icon-only notifications-action-btn--active' : 'p-button-icon-only'"
        (onClick)="store.toggleDrawer()">
        <svg class="h-4.5 w-4.5" lucideBell pButtonIcon></svg>
      </p-button>

      <span
        class="peer pointer-events-none absolute top-2.5 right-2.5 w-2 h-2 bg-primary rounded-full border-2 border-white dark:border-zinc-900"
        [class.hidden]="store.unreadCount() === 0"></span>
      <span
        class="pointer-events-none absolute top-2.5 right-2.5 w-2 h-2 bg-primary/35 rounded-full blur-[0.5px] animate-ping peer-[.hidden]:hidden"></span>
      <span
        class="pointer-events-none absolute -top-1 -right-1 min-w-4.5 h-4.5 leading-4.5 px-1 rounded-full bg-primary-500 dark:bg-primary-600 text-white text-[10px] font-bold text-center"
        [class.hidden]="store.unreadCount() === 0">
        {{ badge() }}
      </span>
      <span class="sr-only">Непрочитанных: {{ store.unreadCount() }}</span>
    </div>
  `,
})
export class AppNotificationsButtonComponent {
  protected readonly store = inject(NotificationsKnowledgeBaseService);
  protected readonly badge = computed(() => {
    const count = this.store.unreadCount();
    return count > 0 ? count.toString() : '';
  });
}
