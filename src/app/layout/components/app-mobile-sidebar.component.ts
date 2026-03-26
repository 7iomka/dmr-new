import { Component, EventEmitter, inject, Input, Output, ViewEncapsulation } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { LucideDynamicIcon, LucideX } from '@lucide/angular';
import { DrawerModule } from 'primeng/drawer';

import { APP_NAVIGATION } from '../models/navigation.model';

@Component({
  selector: 'app-mobile-sidebar',
  standalone: true,
  imports: [RouterLink, DrawerModule, LucideX, LucideDynamicIcon],
  styleUrl: './app-mobile-sidebar.component.css',
  encapsulation: ViewEncapsulation.None,
  template: `
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
      [visible]="isOpen"
      (visibleChange)="onVisibleChange($event)">
      <ng-template #header>
        <a class="c-mobile-sidebar__logo" routerLink="/dashboard" (click)="closeSidebar()">
          <img
            alt="Logo"
            class="c-mobile-sidebar__logo-image c-mobile-sidebar__logo-image--light"
            src="/assets/img/logo-light.svg" />
          <img
            alt="Logo"
            class="c-mobile-sidebar__logo-image c-mobile-sidebar__logo-image--dark"
            src="/assets/img/logo-dark.svg" />
        </a>

        <button aria-label="Закрыть меню" class="c-mobile-sidebar__close" type="button" (click)="closeSidebar()">
          <svg class="c-mobile-sidebar__close-icon" lucideX></svg>
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
                <svg class="c-mobile-sidebar__link-icon" [lucideIcon]="item.icon"></svg>
                <span>{{ item.label }}</span>
              </a>
            }
          </div>
        </section>
      }
    </p-drawer>
  `,
})
export class AppMobileSidebarComponent {
  protected readonly navigation = APP_NAVIGATION;

  @Input() isOpen = false;

  @Output() readonly isOpenChange = new EventEmitter<boolean>();

  private readonly router = inject(Router);

  protected closeSidebar(): void {
    this.isOpenChange.emit(false);
  }

  protected onVisibleChange(isVisible: boolean): void {
    this.isOpenChange.emit(isVisible);
  }

  protected isRouteActive(route: string): boolean {
    return this.router.url === route;
  }
}
