import { Component, contentChildren, ViewEncapsulation } from '@angular/core';
import { NgTemplateOutlet } from '@angular/common';
import { TabsModule } from 'primeng/tabs';
import { PillTabPanelComponent } from './pill-tabpanel.component';

@Component({
  selector: 'app-pill-tabpanels',
  standalone: true,
  imports: [NgTemplateOutlet, TabsModule],
  encapsulation: ViewEncapsulation.None,
  host: {
    class: 'c-pill-tabpanels',
  },
  template: `
    <p-tabpanels class="c-pill-tabpanels__root">
      @for (panel of panels(); track panel.value) {
        <p-tabpanel class="c-pill-tabpanels__item" [value]="panel.value">
          <ng-container [ngTemplateOutlet]="panel.content" />
        </p-tabpanel>
      }
    </p-tabpanels>
  `,
})
export class PillTabPanelsComponent {
  protected readonly panels = contentChildren(PillTabPanelComponent);
}
