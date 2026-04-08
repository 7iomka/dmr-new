import {
  AfterViewInit,
  Component,
  contentChildren,
  effect,
  ElementRef,
  Input,
  QueryList,
  ViewChildren,
  ViewEncapsulation,
} from '@angular/core';
import { NgTemplateOutlet } from '@angular/common';
import { TabsModule } from 'primeng/tabs';
import { PillTabComponent } from './pill-tab.component';

type PillTabsNavSize = 'sm' | 'md';
type PillTabsNavTheme = 'primary' | 'secondary';
type PillTabsNavBehavior = 'scroll' | 'wrap';
type PillTabsNavScrollAlign = 'center' | 'nearest-start';

@Component({
  selector: 'app-pill-tabs-nav',
  standalone: true,
  imports: [NgTemplateOutlet, TabsModule],
  encapsulation: ViewEncapsulation.None,
  host: {
    class: 'c-pill-tabs-nav',
    '[class.c-pill-tabs-nav--sm]': 'size === "sm"',
    '[class.c-pill-tabs-nav--md]': 'size === "md"',
    '[class.c-pill-tabs-nav--theme-primary]': 'theme === "primary"',
    '[class.c-pill-tabs-nav--theme-secondary]': 'theme === "secondary"',
    '[class.c-pill-tabs-nav--behavior-scroll]': 'behavior === "scroll"',
    '[class.c-pill-tabs-nav--behavior-wrap]': 'behavior === "wrap"',
  },
  template: `
    <p-tablist
      [pt]="{
        root: { class: 'c-pill-tabs-nav__root' },
        content: { class: 'c-pill-tabs-nav__viewport' },
        tabList: { class: 'c-pill-tabs-nav__tab-list' },
        activeBar: { class: 'hidden' },
      }">
      @for (tab of tabs(); track tab.value; let i = $index) {
        <p-tab #tabEl class="c-pill-tabs-nav__tab" [value]="tab.value" (click)="onTabClick(i)">
          <ng-container [ngTemplateOutlet]="tab.content" />
        </p-tab>
      }
    </p-tablist>
  `,
})
export class PillTabsNavComponent implements AfterViewInit {
  @Input() size: PillTabsNavSize = 'sm';
  @Input() theme: PillTabsNavTheme = 'primary';

  /**
   * scroll:
   * - tabs are placed in one line
   * - the content is scrollable horizontally
   *
   * wrap:
   * - tabs are wrapped to a new line
   * - tabs can be stretched
   */
  @Input() behavior: PillTabsNavBehavior = 'scroll';

  /**
   * Used to handle cases where the active tab changes outside of the component,
   * e.g. when the user navigates to a different route.
   */
  @Input() activeValue: string | null = null;

  /**
   * center:
   * - the active tab is centered
   *
   * nearest-start:
   * - the active tab is shown as close as possible to the left edge of the viewport
   */
  @Input() scrollAlign: PillTabsNavScrollAlign = 'nearest-start';

  protected readonly tabs = contentChildren(PillTabComponent);

  @ViewChildren('tabEl', { read: ElementRef })
  protected tabElements!: QueryList<ElementRef<HTMLElement>>;

  constructor() {
    effect(() => {
      const currentValue = this.activeValue;
      const currentTabs = this.tabs();

      if (!currentValue || !currentTabs.length || this.behavior !== 'scroll') {
        return;
      }

      queueMicrotask(() => {
        const index = currentTabs.findIndex((tab) => tab.value === currentValue);

        if (index >= 0) {
          this.scrollTabIntoView(index);
        }
      });
    });
  }

  ngAfterViewInit(): void {
    if (this.behavior === 'scroll' && this.activeValue) {
      queueMicrotask(() => {
        const index = this.tabs().findIndex((tab) => tab.value === this.activeValue);

        if (index >= 0) {
          this.scrollTabIntoView(index);
        }
      });
    }
  }

  protected onTabClick(index: number): void {
    if (this.behavior !== 'scroll') {
      return;
    }

    this.scrollTabIntoView(index);
  }

  private scrollTabIntoView(index: number): void {
    const element = this.tabElements.get(index)?.nativeElement;

    if (!element) {
      return;
    }

    if (this.scrollAlign === 'center') {
      element.scrollIntoView({
        behavior: 'smooth',
        inline: 'center',
        block: 'nearest',
      });
      return;
    }

    this.scrollTabIntoViewNearestStart(element);
  }

  /**
   * More readable behavior for long tabs:
   * - if the tab is already fully visible, do nothing
   * - if the tab is wider than the viewport, align its left edge with the viewport
   * - otherwise, try to show it from the left edge of the viewport
   */
  private scrollTabIntoViewNearestStart(tabElement: HTMLElement): void {
    const viewport = tabElement.closest('.c-pill-tabs-nav__viewport') as HTMLElement | null;

    if (!viewport) {
      return;
    }

    const viewportRect = viewport.getBoundingClientRect();
    const tabRect = tabElement.getBoundingClientRect();

    const isFullyVisible = tabRect.left >= viewportRect.left && tabRect.right <= viewportRect.right;

    if (isFullyVisible) {
      return;
    }

    const tabOffsetLeft = tabElement.offsetLeft;
    const targetLeft = Math.max(tabOffsetLeft - 4, 0);

    viewport.scrollTo({
      left: targetLeft,
      behavior: 'smooth',
    });
  }
}
