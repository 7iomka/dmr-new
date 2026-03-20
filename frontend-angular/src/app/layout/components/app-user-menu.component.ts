import { Component, ViewChild } from '@angular/core';
import { AvatarModule } from 'primeng/avatar';
import { ButtonModule } from 'primeng/button';
import { MenuModule } from 'primeng/menu';
import { Menu } from 'primeng/menu';
import { MenuItem } from 'primeng/api';
import { ChevronDown, LucideAngularModule } from 'lucide-angular';

@Component({
  selector: 'app-user-menu',
  standalone: true,
  imports: [ButtonModule, AvatarModule, MenuModule, LucideAngularModule],
  template: `
    <div class="hidden lg:block">
      <p-button styleClass="shell-user-trigger" [text]="true" (onClick)="menu.toggle($event)">
        <ng-template pTemplate="content">
          <p-avatar label="DW" shape="circle" styleClass="shell-user-avatar" />
          <span class="shell-user-meta">
            <span class="shell-user-name">Dorin Watsap</span>
            <span class="shell-user-id">ID: 882194</span>
          </span>
          <lucide-icon [img]="chevronDownIcon" class="h-4 w-4 text-surface-500" />
        </ng-template>
      </p-button>

      <p-menu #menu [popup]="true" [model]="items" appendTo="body" styleClass="shell-user-menu" />
    </div>
  `
})
export class AppUserMenuComponent {
  @ViewChild('menu') protected menu!: Menu;

  protected readonly items: MenuItem[] = [
    { label: 'Профиль', icon: 'pi pi-user' },
    { label: 'Настройки', icon: 'pi pi-cog' },
    { separator: true },
    { label: 'Выйти', icon: 'pi pi-sign-out', styleClass: 'text-red-500' }
  ];

  protected readonly chevronDownIcon = ChevronDown;
}
