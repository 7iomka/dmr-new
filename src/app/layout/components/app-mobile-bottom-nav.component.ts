import { Component, inject, signal, ViewEncapsulation } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { MenuItem } from 'primeng/api';
import { Menu, MenuModule } from 'primeng/menu';
import { LucideBriefcase, LucideCircleUser, LucideTextAlignJustify } from '@lucide/angular';

import { AppMobileSidebarComponent } from './app-mobile-sidebar.component';

@Component({
  selector: 'app-mobile-bottom-nav',
  standalone: true,
  imports: [
    RouterLink,
    MenuModule,
    LucideTextAlignJustify,
    LucideBriefcase,
    LucideCircleUser,
    AppMobileSidebarComponent,
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

    <app-mobile-sidebar [isOpen]="isSidebarOpen()" (isOpenChange)="onSidebarVisibleChange($event)" />
  `,
})
export class AppMobileBottomNavComponent {
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
