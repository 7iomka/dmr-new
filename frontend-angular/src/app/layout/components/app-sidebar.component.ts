import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { LucideAngularModule } from 'lucide-angular';

import { APP_NAVIGATION } from '../models/navigation.model';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, LucideAngularModule],
  template: `
    <aside id="sidebar" class="page-sidebar">
      <div class="page-sidebar-brand">
        <a routerLink="/dashboard" class="flex items-center gap-3">
          <img class="h-10 w-auto dark:hidden" src="img/logo-dark.svg" alt="Logo" />
          <img class="hidden h-10 w-auto dark:block" src="img/logo-light.svg" alt="Logo" />
        </a>
      </div>

      <div class="page-sidebar-nav">
        @for (group of navigation; track group.title) {
          <section class="app-sidebar__group">
            <p class="app-sidebar__group-title">{{ group.title }}</p>
            <nav class="flex flex-col gap-1">
              @for (item of group.items; track item.route) {
                <a [routerLink]="item.route" routerLinkActive="is-active" [routerLinkActiveOptions]="{ exact: true }" class="app-sidebar__link">
                  <lucide-icon [img]="item.icon" class="h-5 w-5" />
                  <span>{{ item.label }}</span>
                </a>
              }
            </nav>
          </section>
        }
      </div>
    </aside>
  `
})
export class AppSidebarComponent {
  protected readonly navigation = APP_NAVIGATION;
}
