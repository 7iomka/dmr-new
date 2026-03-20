import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { ButtonModule } from 'primeng/button';

import { APP_NAVIGATION } from '../models/navigation.model';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, ButtonModule],
  template: `
    <aside class="app-sidebar">
      <div class="app-sidebar__brand">
        <a routerLink="/dashboard" class="flex items-center gap-3">
          <img class="h-10 w-auto dark:hidden" src="img/logo-dark.svg" alt="Logo" />
          <img class="hidden h-10 w-auto dark:block" src="img/logo-light.svg" alt="Logo" />
        </a>
      </div>

      <div class="app-sidebar__nav">
        @for (group of navigation; track group.title) {
          <section class="app-sidebar__group">
            <p class="app-sidebar__group-title">{{ group.title }}</p>
            <nav class="flex flex-col gap-1">
              @for (item of group.items; track item.route) {
                <a [routerLink]="item.route" routerLinkActive="is-active">
                  <p-button [label]="item.label" [icon]="item.icon" [text]="true" styleClass="app-sidebar__nav-btn" />
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
