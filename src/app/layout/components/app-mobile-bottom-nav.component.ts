import { Component, inject, signal, ViewEncapsulation } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import {
  LucideBriefcase,
  LucideCircleUser,
  LucideDynamicIcon,
  type LucideIcon,
  LucideLogOut,
  LucideSettings,
  LucideTextAlignJustify,
  LucideUser,
} from '@lucide/angular';
import { AvatarModule } from 'primeng/avatar';
import { ButtonModule } from 'primeng/button';
import { DrawerModule } from 'primeng/drawer';

import { AppMobileSidebarComponent } from './app-mobile-sidebar.component';
import { BottomSheetDragDismissDirective } from '../../shared/directives/bottom-sheet-drag-dismiss.directive';

type MobileProfileDrawerItem = {
  label: string;
  icon: LucideIcon;
  route: string | null;
  tone: 'primary' | 'surface' | 'danger';
};

@Component({
  selector: 'app-mobile-bottom-nav',
  standalone: true,
  imports: [
    RouterLink,
    DrawerModule,
    ButtonModule,
    AvatarModule,
    LucideTextAlignJustify,
    LucideBriefcase,
    LucideCircleUser,
    LucideDynamicIcon,
    BottomSheetDragDismissDirective,
    AppMobileSidebarComponent,
  ],
  styleUrl: './app-mobile-bottom-nav.component.css',
  encapsulation: ViewEncapsulation.None,
  host: {
    class: 'app-mobile-nav',
  },
  template: `
    <nav aria-label="Мобильная навигация" class="app-mobile-nav__inner">
      <button class="app-mobile-nav__item" type="button" (click)="openSidebar()">
        <svg class="app-mobile-nav__icon" lucideTextAlignJustify></svg>
        <span class="app-mobile-nav__label">Меню</span>
      </button>

      <a class="app-mobile-nav__item" routerLink="/investments" [attr.data-active]="isRouteActive('/investments')">
        <svg class="app-mobile-nav__icon" lucideBriefcase></svg>
        <span class="app-mobile-nav__label">Инвестиции</span>
      </a>

      <button class="app-mobile-nav__item" type="button" (click)="isProfileDrawerOpen.set(true)">
        <svg class="app-mobile-nav__icon" lucideCircleUser></svg>
        <span class="app-mobile-nav__label">Профиль</span>
      </button>
    </nav>

    <p-drawer
      position="bottom"
      [appendTo]="'body'"
      [closable]="false"
      [dismissible]="true"
      [modal]="true"
      [pt]="{
        header: { class: 'app-mobile-nav__profile-drawer-header' },
        root: { class: 'app-mobile-nav__profile-drawer' },
        content: { class: 'app-mobile-nav__profile-drawer-content' },
      }"
      [style]="{ height: 'auto' }"
      [visible]="isProfileDrawerOpen()"
      (visibleChange)="isProfileDrawerOpen.set($event)">
      <div
        appBottomSheetDragDismiss
        class="app-mobile-nav__profile-handle"
        [appBottomSheetDragDismissThreshold]="100"
        [appBottomSheetDragDismissVisible]="isProfileDrawerOpen()"
        (appBottomSheetDragDismiss)="isProfileDrawerOpen.set(false)">
        <div class="app-mobile-nav__profile-handle-bar"></div>
      </div>

      <div class="app-mobile-nav__profile-preview">
        <p-avatar class="app-mobile-nav__profile-avatar" label="DW" />

        <div class="app-mobile-nav__profile-meta">
          <p class="app-mobile-nav__profile-name">Dorin Watsap</p>
          <p class="app-mobile-nav__profile-id">ID: <span class="app-mobile-nav__profile-id-value">882194</span></p>
        </div>
      </div>

      <div class="app-mobile-nav__profile-list">
        @for (item of profileDrawerItems; track item.label) {
          @if (item.route) {
            <a class="app-mobile-nav__profile-item" [routerLink]="item.route" (click)="isProfileDrawerOpen.set(false)">
              <span class="app-mobile-nav__profile-item-icon" [attr.data-tone]="item.tone">
                <svg class="app-mobile-nav__profile-item-icon-svg" [lucideIcon]="item.icon"></svg>
              </span>
              <span class="app-mobile-nav__profile-item-label">{{ item.label }}</span>
            </a>
          } @else {
            <button
              class="app-mobile-nav__profile-item app-mobile-nav__profile-item--danger"
              type="button"
              (click)="logout()">
              <span class="app-mobile-nav__profile-item-icon" [attr.data-tone]="item.tone">
                <svg class="app-mobile-nav__profile-item-icon-svg" [lucideIcon]="item.icon"></svg>
              </span>
              <span class="app-mobile-nav__profile-item-label">{{ item.label }}</span>
            </button>
          }
        }
      </div>
    </p-drawer>

    <app-mobile-sidebar [isOpen]="isSidebarOpen()" (isOpenChange)="onSidebarVisibleChange($event)" />
  `,
})
export class AppMobileBottomNavComponent {
  protected readonly isSidebarOpen = signal(false);
  protected readonly isProfileDrawerOpen = signal(false);

  private readonly router = inject(Router);

  protected readonly profileDrawerItems: MobileProfileDrawerItem[] = [
    { label: 'Мой профиль', icon: LucideUser, route: '/profile', tone: 'primary' },
    { label: 'Настройки', icon: LucideSettings, route: '/settings', tone: 'surface' },
    { label: 'Выйти', icon: LucideLogOut, route: null, tone: 'danger' },
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

  protected logout(): void {
    this.isProfileDrawerOpen.set(false);
    console.log('Logout');
  }
}
