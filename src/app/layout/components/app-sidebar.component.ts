import { Component, inject } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { LucideChevronsLeft, LucideDynamicIcon } from '@lucide/angular';

import { SidebarModeService } from '../../core/theme/sidebar-mode.service';
import { APP_NAVIGATION, type NavItem } from '../models/navigation.model';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [RouterLink, LucideDynamicIcon, LucideChevronsLeft],
  styleUrl: './app-sidebar.component.css',
  host: {
    class: 'app-sidebar',
    '[class.is-collapsed]': 'sidebarModeService.isCollapsed()',
  },
  template: `
    <button
      aria-label="Toggle sidebar"
      class="app-sidebar__toggle"
      type="button"
      (click)="sidebarModeService.toggleSidebar()">
      <svg class="app-sidebar__toggle-icon" lucideChevronsLeft></svg>
    </button>
    <aside class="app-sidebar__panel">
      <div class="app-sidebar__topbar">
        <a class="app-sidebar__logo" routerLink="/">
          <img
            alt="DMR"
            class="app-sidebar__logo-full app-sidebar__logo-full--light"
            src="/assets/img/logo-light.svg" />
          <img alt="DMR" class="app-sidebar__logo-full app-sidebar__logo-full--dark" src="/assets/img/logo-dark.svg" />
          <img alt="DMR" class="app-sidebar__logo-icon" src="/assets/img/logo-icon-only.svg" />
        </a>
      </div>

      <div class="app-sidebar__content">
        @for (group of navigation; track group.title) {
          <div>
            <p class="app-sidebar__section-title">
              <span class="app-sidebar__label">{{ group.title }}</span>
            </p>

            <div class="app-sidebar__links">
              @for (item of group.items; track item.route) {
                <a
                  class="app-sidebar__link"
                  [attr.data-active]="isActive(item) ? 'true' : 'false'"
                  [routerLink]="item.route">
                  <div class="app-sidebar__link-icon">
                    <svg class="app-sidebar__icon" [lucideIcon]="item.icon"></svg>
                  </div>
                  <span class="app-sidebar__label app-sidebar__label--item">{{ item.label }}</span>
                </a>
              }
            </div>
          </div>
        }
      </div>
    </aside>
  `,
})
export class AppSidebarComponent {
  protected readonly navigation = APP_NAVIGATION;
  protected readonly sidebarModeService = inject(SidebarModeService);
  private readonly router = inject(Router);

  protected isActive(item: NavItem): boolean {
    return this.router.url === item.route || this.router.url.startsWith(`${item.route}/`);
  }
}
