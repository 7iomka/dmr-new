import { Component, signal } from '@angular/core';
import { BadgeModule } from 'primeng/badge';
import { ButtonModule } from 'primeng/button';
import { LucideAngularModule } from 'lucide-angular';

@Component({
  selector: 'app-notifications-button',
  standalone: true,
  imports: [ButtonModule, BadgeModule, LucideAngularModule],
  template: `
    <p-button severity="secondary" [text]="true" [rounded]="true" styleClass="shell-icon-btn" [badge]="unreadCount() > 0 ? unreadCount().toString() : undefined" badgeClass="!bg-primary-500">
      <ng-template pTemplate="icon">
        <lucide-icon name="bell" class="h-[18px] w-[18px]" />
      </ng-template>
    </p-button>
  `
})
export class AppNotificationsButtonComponent {
  protected readonly unreadCount = signal(3);
}
