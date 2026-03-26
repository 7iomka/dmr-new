import { Component, contentChildren, Input, ViewEncapsulation } from '@angular/core';
import { NgClass, NgTemplateOutlet } from '@angular/common';
import { TabsModule } from 'primeng/tabs';
import { PillTabComponent } from './pill-tab.component';

@Component({
  selector: 'app-pill-tabs-nav',
  standalone: true,
  imports: [NgClass, NgTemplateOutlet, TabsModule],
  encapsulation: ViewEncapsulation.None,
  template: `
    <div class="c-pill-tabs" [ngClass]="['c-pill-tabs--' + size, 'c-pill-tabs--theme-' + theme]">
      <p-tablist class="c-pill-tabs__nav" [pt]="{ activeBar: { class: 'hidden' } }">
        @for (tab of tabs(); track tab.value) {
          <p-tab class="c-pill-tabs__tab" [value]="tab.value">
            <ng-container [ngTemplateOutlet]="tab.content" />
          </p-tab>
        }
      </p-tablist>
    </div>

    <ng-content />
  `,
})
export class PillTabsNavComponent {
  @Input() size: 'sm' | 'md' = 'sm';
  @Input() theme: 'primary' | 'secondary' = 'primary';

  protected readonly tabs = contentChildren(PillTabComponent);
}
