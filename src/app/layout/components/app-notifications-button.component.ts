import { Component, computed, inject, ViewEncapsulation } from '@angular/core';
import { LucideBell } from '@lucide/angular';
import { ButtonModule } from 'primeng/button';

import { NotificationsKnowledgeBaseService } from '../../features/notifications/notifications-knowledge-base.service';

@Component({
  selector: 'app-notifications-button',
  standalone: true,
  imports: [ButtonModule, LucideBell],
  styleUrl: './app-notifications-button.component.css',
  encapsulation: ViewEncapsulation.None,
  template: `
    <div class="app-notifications-button">
      <p-button
        ariaLabel="Открыть уведомления"
        severity="secondary"
        variant="outlined"
        [attr.aria-expanded]="store.drawerOpen()"
        [styleClass]="
          store.drawerOpen()
            ? 'p-button-icon-only app-notifications-button__trigger app-notifications-button__trigger--active'
            : 'p-button-icon-only app-notifications-button__trigger'
        "
        (onClick)="store.toggleDrawer()">
        <svg class="h-[18px] w-[18px]" lucideBell pButtonIcon></svg>
      </p-button>

      <span class="app-notifications-button__dot" [class.hidden]="store.unreadCount() === 0"></span>
      <span class="app-notifications-button__pulse" [class.hidden]="store.unreadCount() === 0"></span>
      <span class="app-notifications-button__badge" [class.hidden]="store.unreadCount() === 0">
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
