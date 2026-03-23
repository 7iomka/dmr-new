import { Component, ViewChild } from '@angular/core';
import { AvatarModule } from 'primeng/avatar';
import { ButtonModule } from 'primeng/button';
import { MenuModule } from 'primeng/menu';
import { Menu } from 'primeng/menu';
import { MenuItem } from 'primeng/api';
import { LucideChevronDown } from '@lucide/angular';

@Component({
  selector: 'app-user-menu',
  standalone: true,
  imports: [ButtonModule, AvatarModule, MenuModule, LucideChevronDown],
  template: `
    <p-button severity="secondary" variant="outlined" (onClick)="menu.toggle($event)">
      <p-avatar label="DW" />
      <span class="hidden text-left md:flex md:min-w-29.5 md:flex-col">
        <span class="text-sm font-bold leading-none text-surface-800 dark:text-surface-100 normal-case"
          >Dorin Watsap</span
        >
        <span class="mt-0.5 text-[11px] font-bold uppercase tracking-tight text-surface-500 dark:text-surface-400"
          >ID: 882194</span
        >
      </span>
      <svg class="h-4 w-4 text-surface-500" lucideChevronDown></svg>
    </p-button>
    <p-menu #menu appendTo="body" styleClass="shell-user-menu" [model]="items" [popup]="true" />
  `,
})
export class AppUserMenuComponent {
  @ViewChild('menu') protected menu!: Menu;

  protected readonly items: MenuItem[] = [
    { label: 'Профиль', icon: 'pi pi-user' },
    { label: 'Настройки', icon: 'pi pi-cog' },
    { separator: true },
    { label: 'Выйти', icon: 'pi pi-sign-out', class: 'text-red-500' },
  ];
}
