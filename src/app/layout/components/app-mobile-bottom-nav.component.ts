import { Component, inject, signal, ViewEncapsulation } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { MenuItem } from 'primeng/api';
import { DrawerModule } from 'primeng/drawer';
import { Menu, MenuModule } from 'primeng/menu';
import { LucideBriefcase, LucideCircleUser, LucideDynamicIcon, LucideTextAlignJustify, LucideX } from '@lucide/angular';

import { APP_NAVIGATION } from '../models/navigation.model';

@Component({
  selector: 'app-mobile-bottom-nav',
  standalone: true,
  imports: [
    RouterLink,
    MenuModule,
    DrawerModule,
    LucideTextAlignJustify,
    LucideBriefcase,
    LucideCircleUser,
    LucideX,
    LucideDynamicIcon,
  ],
  styleUrl: './app-mobile-bottom-nav.component.css',
  encapsulation: ViewEncapsulation.None,
  template: `
    <nav aria-label="Мобильная навигация" class="c-mobile-nav">
      <button class="c-mobile-nav__item" type="button" (click)="openSidebar()">
        <svg class="c-mobile-nav__icon" lucideTextAlignJustify></svg>
        <span class="c-mobile-nav__label">Меню</span>
      </button>

      <a class="c-mobile-nav__item" routerLink="/investments" [attr.data-active]="isRouteActive('/investments')">
        <svg class="c-mobile-nav__icon" lucideBriefcase></svg>
        <span class="c-mobile-nav__label">Инвестиции</span>
      </a>

      <button class="c-mobile-nav__item" type="button" (click)="toggleProfileMenu($event, profileMenu)">
        <svg class="c-mobile-nav__icon" lucideCircleUser></svg>
        <span class="c-mobile-nav__label">Профиль</span>
      </button>
    </nav>

    <p-menu
      #profileMenu
      appendTo="body"
      styleClass="c-mobile-nav__profile-menu"
      [model]="profileMenuItems"
      [popup]="true" />

    <p-drawer
      class="c-mobile-drawer"
      header=""
      position="left"
      [dismissible]="true"
      [modal]="true"
      [pt]="{
        header: {
          class: 'c-mobile-sidebar__header',
        },
        content: { class: 'c-mobile-sidebar__body' },
      }"
      [showCloseIcon]="false"
      [styleClass]="'c-mobile-sidebar'"
      [visible]="isSidebarOpen()"
      (visibleChange)="onSidebarVisibleChange($event)">
      <ng-template #header>
        <a class="c-mobile-sidebar__logo" routerLink="/dashboard" (click)="closeSidebar()">
          <img alt="Logo" class="h-10 w-auto hidden dark:block" src="/assets/img/logo-light.svg" />
          <img alt="Logo" class="h-10 w-auto dark:hidden" src="/assets/img/logo-dark.svg" />
        </a>

        <button aria-label="Закрыть меню" class="c-mobile-sidebar__close" type="button" (click)="closeSidebar()">
          <svg class="h-5 w-5" lucideX></svg>
        </button>
      </ng-template>

      @for (group of navigation; track group.title) {
        <section class="c-mobile-sidebar__section">
          <h3 class="c-mobile-sidebar__title">{{ group.title }}</h3>

          <div class="c-mobile-sidebar__links">
            @for (item of group.items; track item.route) {
              <a
                class="c-mobile-sidebar__link"
                [attr.data-active]="isRouteActive(item.route)"
                [routerLink]="item.route"
                (click)="closeSidebar()">
                <svg class="h-5 w-5" [lucideIcon]="item.icon"></svg>
                <span>{{ item.label }}</span>
              </a>
            }
          </div>
        </section>
      }
    </p-drawer>
  `,
})
export class AppMobileBottomNavComponent {
  protected readonly navigation = APP_NAVIGATION;
  protected readonly isSidebarOpen = signal(false);

  private readonly router = inject(Router);

  protected readonly profileMenuItems: MenuItem[] = [
    { label: 'Профиль', icon: 'pi pi-user', routerLink: '/profile' },
    { label: 'Настройки', icon: 'pi pi-cog', routerLink: '/settings' },
    { separator: true },
    { label: 'Выйти', icon: 'pi pi-sign-out' },
  ];

  protected openSidebar(): void {
    this.isSidebarOpen.set(true);
  }

  protected closeSidebar(): void {
    this.isSidebarOpen.set(false);
  }

  protected onSidebarVisibleChange(isVisible: boolean): void {
    this.isSidebarOpen.set(isVisible);
  }

  protected isRouteActive(route: string): boolean {
    return this.router.url === route;
  }

  protected toggleProfileMenu(event: Event, menu: Menu): void {
    menu.toggle(event);
  }
}
