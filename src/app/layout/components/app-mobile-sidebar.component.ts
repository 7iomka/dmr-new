import { Component, EventEmitter, inject, Input, Output, ViewEncapsulation } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { LucideDynamicIcon } from '@lucide/angular';
import { DrawerModule } from 'primeng/drawer';

import { APP_NAVIGATION } from '../models/navigation.model';

@Component({
  selector: 'app-mobile-sidebar',
  standalone: true,
  imports: [RouterLink, DrawerModule, LucideDynamicIcon],
  styleUrl: './app-mobile-sidebar.component.css',
  encapsulation: ViewEncapsulation.None,
  template: `
    <p-drawer
      appendTo="body"
      class="app-mobile-drawer"
      position="left"
      [closeButtonProps]="{ rounded: false, severity: 'secondary', text: true, size: 'small' }"
      [dismissible]="true"
      [modal]="true"
      [pt]="{
        header: {
          class: 'app-mobile-sidebar__header',
        },
        content: { class: 'app-mobile-sidebar__body' },
      }"
      [styleClass]="'app-mobile-sidebar'"
      [visible]="isOpen"
      (visibleChange)="onVisibleChange($event)">
      <ng-template #header>
        <a class="app-mobile-sidebar__logo" routerLink="/" (click)="closeSidebar()">
          <img
            alt="Logo"
            class="app-mobile-sidebar__logo-image app-mobile-sidebar__logo-image--light"
            src="/assets/img/logo-light.svg" />
          <img
            alt="Logo"
            class="app-mobile-sidebar__logo-image app-mobile-sidebar__logo-image--dark"
            src="/assets/img/logo-dark.svg" />
        </a>
      </ng-template>

      @for (group of navigation; track group.title) {
        <section class="app-mobile-sidebar__section">
          <h3 class="app-mobile-sidebar__title">{{ group.title }}</h3>

          <div class="app-mobile-sidebar__links">
            @for (item of group.items; track item.route) {
              <a
                class="app-mobile-sidebar__link"
                [attr.data-active]="isRouteActive(item.route)"
                [routerLink]="item.route"
                (click)="closeSidebar()">
                <svg class="app-mobile-sidebar__link-icon" [lucideIcon]="item.icon"></svg>
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
