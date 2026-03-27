import { Component, Input, ViewChild } from '@angular/core';
import { RouterLink } from '@angular/router';
import { Menu, MenuPassThrough } from 'primeng/menu';
import { LucideDynamicIcon, type LucideIcon } from '@lucide/angular';
import { MenuItem } from 'primeng/api';
import { NgTemplateOutlet } from '@angular/common';

export type AppMenuItem = Omit<MenuItem, 'items' | 'icon'> & {
  icon?: LucideIcon | string;
  danger?: boolean;
  items?: AppMenuItem[];
};

@Component({
  selector: 'app-menu',
  standalone: true,
  imports: [Menu, LucideDynamicIcon, RouterLink, NgTemplateOutlet],
  template: `
    <p-menu #menu appendTo="body" [model]="model" [popup]="popup" [pt]="pt" [styleClass]="menuClass">
      <ng-template #item let-item>
        @let i = asAppItem(item);

        @if (i['routerLink']) {
          <a
            class="p-menu-item-link c-menu__item-link"
            tabindex="-1"
            [attr.target]="i['target'] ?? null"
            [attr.title]="i['title'] ?? null"
            [fragment]="i['fragment']"
            [preserveFragment]="i['preserveFragment']"
            [queryParams]="i['queryParams']"
            [queryParamsHandling]="i['queryParamsHandling']"
            [replaceUrl]="i['replaceUrl']"
            [routerLink]="i['routerLink']"
            [skipLocationChange]="i['skipLocationChange']"
            [state]="i['state']">
            <ng-container *ngTemplateOutlet="itemInner; context: { $implicit: i }" />
          </a>
        } @else if (i['url']) {
          <a
            class="p-menu-item-link c-menu__item-link"
            tabindex="-1"
            [attr.href]="i['url']"
            [attr.target]="i['target'] ?? null"
            [attr.title]="i['title'] ?? null">
            <ng-container *ngTemplateOutlet="itemInner; context: { $implicit: i }" />
          </a>
        } @else {
          <a
            class="p-menu-item-link c-menu__item-link"
            href=""
            tabindex="-1"
            [attr.title]="i['title'] ?? null"
            (click)="$event.preventDefault()">
            <ng-container *ngTemplateOutlet="itemInner; context: { $implicit: i }" />
          </a>
        }
      </ng-template>

      <ng-template #itemInner let-item>
        <span class="c-menu__item-inner" [class.c-menu__item-inner--danger]="item.danger">
          @if (isLucideIcon(item.icon)) {
            <span class="c-menu__item-icon" [class.c-menu__item-icon--danger]="item.danger">
              <svg class="h-4 w-4" [lucideIcon]="item.icon"></svg>
            </span>
          }

          <span class="c-menu__item-label">
            {{ item.label }}
          </span>
        </span>
      </ng-template>
    </p-menu>
  `,
})
export class MenuComponent {
  @Input() items: AppMenuItem[] = [];
  @Input() popup = true;
  @Input() menuClass = '';

  @ViewChild('menu', { static: true })
  private readonly menuRef!: Menu;

  readonly pt: MenuPassThrough = {
    root: { class: 'c-menu__overlay' },
    list: { class: 'c-menu__list' },
    item: { class: 'c-menu__item' },
    itemContent: { class: 'c-menu__item-content' },
    itemLink: { class: 'c-menu__item-link' },
  };

  get model(): MenuItem[] {
    return this.items as unknown as MenuItem[];
  }

  asAppItem(item: unknown): AppMenuItem {
    return item as AppMenuItem;
  }

  isLucideIcon(icon: AppMenuItem['icon']): icon is LucideIcon {
    return icon !== null && typeof icon !== 'string';
  }

  toggle(event: Event): void {
    this.menuRef.toggle(event);
  }

  show(event: Event): void {
    this.menuRef.show(event);
  }

  hide(): void {
    this.menuRef.hide();
  }
}
