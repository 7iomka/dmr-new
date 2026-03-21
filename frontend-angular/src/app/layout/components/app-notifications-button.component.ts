import { Component, signal } from '@angular/core';
import { BadgeModule } from 'primeng/badge';
import { ButtonModule } from 'primeng/button';
import { LucideDynamicIcon, LucideBell } from '@lucide/angular';

@Component({
  selector: 'app-notifications-button',
  standalone: true,
  imports: [ButtonModule, BadgeModule, LucideDynamicIcon],
  template: `
    <p-button severity="secondary" [text]="true" [rounded]="true" class="shell-icon-btn" [badge]="unreadCount() > 0 ? unreadCount().toString() : undefined" badgeClass="!bg-primary-500">
      <ng-template #icon>
        <svg [lucideIcon]="bellIcon" class="h-4.5 w-4.5"></svg>
      </ng-template>
    </p-button>
  `
})
export class AppNotificationsButtonComponent {
  protected readonly unreadCount = signal(3);
  protected readonly bellIcon = LucideBell;
}
