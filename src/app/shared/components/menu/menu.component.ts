import { Component, Input, TemplateRef, ViewChild } from '@angular/core';
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
  iconTemplate?: TemplateRef<{ $implicit: AppMenuItem }>;
  itemClass?: string;
  itemActiveClass?: string;
  linkClass?: string;
  linkActiveClass?: string;
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
          <a pRipple tabindex="-1" [attr.title]="i['title'] ?? null" [class]="itemLinkClass(i)">
            <ng-container *ngTemplateOutlet="itemInner; context: { $implicit: i }" />
          </a>
        }
      </ng-template>

      <ng-template #itemInner let-item>
        <span class="c-menu__item-inner">
          @if (item.iconTemplate) {
            <span class="c-menu__item-icon" [class.c-menu__item-icon--danger]="item.danger">
              <ng-container *ngTemplateOutlet="item.iconTemplate; context: { $implicit: item }" />
            </span>
          } @else if (isLucideIcon(item.icon)) {
            <span class="c-menu__item-icon" [class.c-menu__item-icon--danger]="item.danger">
              <svg class="h-4 w-4" [lucideIcon]="item.icon"></svg>
            </span>
          } @else if (allowPrimeIcons && isPrimeIconClass(item.icon)) {
            <span class="c-menu__item-icon" [class.c-menu__item-icon--danger]="item.danger">
              <i [class]="item.icon"></i>
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
export class AppMenuComponent {
  @Input() items: AppMenuItem[] = [];
  @Input() popup = true;
  @Input() menuClass = '';
  @Input() allowPrimeIcons = false;

  @ViewChild('menu', { static: true })
  private readonly menuRef!: Menu;

  readonly pt: MenuPassThrough = {
    root: { class: 'c-menu__overlay' },
    list: { class: 'c-menu__list' },
    item: (options) => ({ class: this.itemClass(this.ptItem(options)) }),
    itemContent: { class: 'c-menu__item-content' },
    itemLink: (options) => ({ class: this.itemLinkClass(this.ptItem(options)) }),
  };

  get model(): MenuItem[] {
    return this.items as unknown as MenuItem[];
  }

  asAppItem(item: unknown): AppMenuItem {
    return item as AppMenuItem;
  }

  ptItem(options: unknown): AppMenuItem {
    const ptOptions = options as {
      item?: unknown;
      context?: { item?: unknown };
      parent?: { item?: unknown };
    };

    return this.asAppItem(ptOptions.item ?? ptOptions.context?.item ?? ptOptions.parent?.item ?? {});
  }

  isLucideIcon(icon: AppMenuItem['icon']): icon is LucideIcon {
    return !!icon && typeof icon !== 'string';
  }

  isPrimeIconClass(icon: AppMenuItem['icon']): icon is string {
    return typeof icon === 'string' && icon.trim().startsWith('pi ');
  }

  itemClass(item: AppMenuItem): string {
    return [
      'c-menu__item',
      item.danger ? 'c-menu__item--danger' : '',
      item.active ? ['c-menu__item--active', item.itemActiveClass].filter(Boolean).join(' ') : '',
      item.itemClass,
    ]
      .filter(Boolean)
      .join(' ');
  }

  itemLinkClass(item: AppMenuItem): string {
    return [
      'p-menu-item-link c-menu__item-link',
      item.active ? ['c-menu__item-link--active', item.linkActiveClass].filter(Boolean).join(' ') : '',
      item.linkClass,
    ]
      .filter(Boolean)
      .join(' ');
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
