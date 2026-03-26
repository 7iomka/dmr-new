import { Component, inject, ViewEncapsulation } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { LucideChevronsLeft, LucideDynamicIcon } from '@lucide/angular';

import { SidebarModeService } from '../../core/theme/sidebar-mode.service';
import { APP_NAVIGATION, type NavItem } from '../models/navigation.model';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [RouterLink, LucideDynamicIcon, LucideChevronsLeft],
  styleUrl: './app-sidebar.component.css',
  encapsulation: ViewEncapsulation.None,
  template: `
    <aside class="c-desktop-sidebar" id="sidebar">
      <div class="c-desktop-sidebar__topbar">
        <a class="c-desktop-sidebar__logo" routerLink="/dashboard">
          <img
            alt="Logo"
            class="c-desktop-sidebar__logo-full c-desktop-sidebar__logo-full--light"
            src="/assets/img/logo-light.svg" />
          <img
            alt="Logo"
            class="c-desktop-sidebar__logo-full c-desktop-sidebar__logo-full--dark"
            src="/assets/img/logo-dark.svg" />
          <img alt="Logo" class="c-desktop-sidebar__logo-icon" src="/assets/img/logo-icon-only.svg" />
        </a>

        <button
          aria-label="Toggle sidebar"
          class="c-desktop-sidebar__toggle js-desktop-sidebar-toggle"
          type="button"
          (click)="sidebarModeService.toggleSidebar()">
          <svg class="c-desktop-sidebar__toggle-icon" lucideChevronsLeft></svg>
        </button>
      </div>

      <div class="c-desktop-sidebar__content">
        @for (group of navigation; track group.title) {
          <div>
            <p class="c-desktop-sidebar__section-title">
              <span class="c-desktop-sidebar__label">{{ group.title }}</span>
            </p>

            <div class="c-desktop-sidebar__links">
              @for (item of group.items; track item.route) {
                <a
                  class="c-desktop-sidebar__link"
                  [attr.data-active]="isActive(item) ? 'true' : 'false'"
                  [routerLink]="item.route">
                  <div class="c-desktop-sidebar__link-icon">
                    <svg class="c-desktop-sidebar__icon" [lucideIcon]="item.icon"></svg>
                  </div>
                  <span class="c-desktop-sidebar__label c-desktop-sidebar__label--item">{{ item.label }}</span>
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
    return this.router.url === item.route;
  }
}
