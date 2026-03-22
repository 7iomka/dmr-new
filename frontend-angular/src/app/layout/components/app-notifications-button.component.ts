import { Component, signal } from '@angular/core';
import { BadgeModule } from 'primeng/badge';
import { ButtonModule } from 'primeng/button';
import { LucideBell } from '@lucide/angular';

@Component({
  selector: 'app-notifications-button',
  standalone: true,
  imports: [ButtonModule, BadgeModule, LucideBell],
  template: `
  <div class="inline-flex relative">
    <p-button severity="secondary" variant="outlined" >
      <ng-template #icon>
        <svg lucideBell class="h-4.5 w-4.5"></svg>
      </ng-template>
    </p-button>
    <span data-notifications-dot class="peer absolute top-2.5 right-2.5 w-2 h-2 bg-primary rounded-full border-2 border-white dark:border-zinc-900"></span>
    <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-primary/35 rounded-full blur-[0.5px] animate-ping peer-[.hidden]:hidden"></span>
    <span data-notifications-badge class="absolute -top-1 -right-1 min-w-4.5 h-4.5 leading-4.5 px-1 rounded-full bg-primary-500 dark:bg-primary-600 text-white text-[10px] font-bold text-center">
      {{ badge }}
    </span>
    <span class="sr-only" data-notifications-unread-label>Непрочитанных: 0</span>
  </div>
  `
})
export class AppNotificationsButtonComponent {
  protected readonly unreadCount = signal(3);

  protected get badge(): string | undefined {
    const count = this.unreadCount();
    return count > 0 ? count.toString() : undefined;
  }
}