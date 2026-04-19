import { Component, ViewChild, ViewEncapsulation } from '@angular/core';
import { AvatarModule } from 'primeng/avatar';
import { ButtonModule } from 'primeng/button';

import { LucideChevronDown, LucideLogOut, LucideSettings, LucideUser } from '@lucide/angular';
import { AppMenuComponent, type AppMenuItem } from '../../shared/components/menu/menu.component';

@Component({
  selector: 'app-user-menu',
  standalone: true,
  imports: [ButtonModule, AvatarModule, AppMenuComponent, LucideChevronDown],
  styleUrl: './app-user-menu.component.css',
  encapsulation: ViewEncapsulation.None,
  template: `
    <p-button severity="secondary" variant="outlined" (onClick)="menu.toggle($event)">
      <p-avatar label="DW" />
      <span class="app-user-menu__meta">
        <span class="app-user-menu__name">Dorin Watsap</span>
        <span class="app-user-menu__id"> ID: <span class="app-user-menu__id-value">882194</span> </span>
      </span>
      <svg class="app-user-menu__chevron" lucideChevronDown pButtonIcon></svg>
    </p-button>

    <app-menu
      #menu
      appendTo="body"
      defaultItemLinkClass="app-user-menu__item-link"
      menuClass="app-user-menu"
      [items]="userMenuItems"
      [popup]="true" />
  `,
})
export class AppUserAppMenuComponent {
  @ViewChild('menu') protected menu!: AppMenuComponent;

  protected readonly userMenuItems: AppMenuItem[] = [
    {
      label: 'Профиль',
      icon: LucideUser,
      routerLink: ['/profile'],
    },
    {
      label: 'Настройки',
      icon: LucideSettings,
      routerLink: ['/settings'],
    },
    {
      separator: true,
    },
    {
      label: 'Выйти',
      icon: LucideLogOut,
      danger: true,
      command: () => this.logout(),
    },
  ];

  protected logout(): void {
    console.log('Logout');
  }
}
