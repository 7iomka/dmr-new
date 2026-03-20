import { Component, signal } from '@angular/core';
import { BadgeModule } from 'primeng/badge';
import { ButtonModule } from 'primeng/button';

@Component({
  selector: 'app-notifications-button',
  standalone: true,
  imports: [ButtonModule, BadgeModule],
  template: `
    <p-button
      icon="pi pi-bell"
      severity="secondary"
      [text]="true"
      [rounded]="true"
      styleClass="shell-icon-btn"
      [badge]="unreadCount() > 0 ? unreadCount().toString() : undefined"
      badgeClass="!bg-primary-500"
      ariaLabel="Открыть уведомления"
    />
  `
})
export class AppNotificationsButtonComponent {
  protected readonly unreadCount = signal(3);
}
