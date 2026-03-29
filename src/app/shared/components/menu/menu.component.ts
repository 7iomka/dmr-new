import { Component, Input, ViewChild } from '@angular/core';
import { RouterLink } from '@angular/router';
import { Menu, MenuPassThrough } from 'primeng/menu';
import { LucideCheck, LucideDynamicIcon, type LucideIcon } from '@lucide/angular';
import { MenuItem } from 'primeng/api';
import { NgTemplateOutlet } from '@angular/common';
import { Ripple } from 'primeng/ripple';

export type AppMenuItem = Omit<MenuItem, 'items' | 'icon'> & {
  icon?: LucideIcon | string;
  danger?: boolean;
  active?: boolean;
  linkClass?: string;
  items?: AppMenuItem[];
};

@Component({
  selector: 'app-menu',
  standalone: true,
  imports: [Menu, LucideDynamicIcon, LucideCheck, RouterLink, NgTemplateOutlet, Ripple],
  template: `
    <p-menu #menu appendTo="body" [model]="model" [popup]="popup" [pt]="pt" [styleClass]="menuClass">
      <ng-template #item let-item>
        @let i = asAppItem(item);

        @if (i['routerLink']) {
          <a
            pRipple
            tabindex="-1"
            [attr.target]="i['target'] ?? null"
            [attr.title]="i['title'] ?? null"
            [class]="itemLinkClass(i)"
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
            pRipple
            tabindex="-1"
            [attr.href]="i['url']"
            [attr.target]="i['target'] ?? null"
            [attr.title]="i['title'] ?? null"
            [class]="itemLinkClass(i)">
            <ng-container *ngTemplateOutlet="itemInner; context: { $implicit: i }" />
          </a>
        } @else {
          <a
            href=""
            pRipple
            tabindex="-1"
            [attr.title]="i['title'] ?? null"
            [class]="itemLinkClass(i)"
            (click)="$event.preventDefault()">
            <ng-container *ngTemplateOutlet="itemInner; context: { $implicit: i }" />
          </a>
        }
      </ng-template>

      <ng-template #itemInner let-item>
        <span
          class="c-menu__item-inner"
          [class.c-menu__item-inner--active]="item.active"
          [class.c-menu__item-inner--danger]="item.danger">
          @if (isLucideIcon(item.icon)) {
            <span class="c-menu__item-icon" [class.c-menu__item-icon--danger]="item.danger">
              <svg class="h-4 w-4" [lucideIcon]="item.icon"></svg>
            </span>
          }

          <span class="c-menu__item-label">
            {{ item.label }}
          </span>

          @if (item.active) {
            <span class="c-menu__item-check">
              <svg class="h-4 w-4" lucideCheck></svg>
            </span>
          }
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

  itemLinkClass(item: AppMenuItem): string {
    return ['p-menu-item-link c-menu__item-link', item.linkClass].filter(Boolean).join(' ');
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
