import { Component, ViewEncapsulation } from '@angular/core';
import { NgTemplateOutlet } from '@angular/common';
import { contentChildren } from '@angular/core';
import { TabsModule } from 'primeng/tabs';
import { PillTabPanelComponent } from './pill-tabpanel.component';

@Component({
  selector: 'app-pill-tabpanels',
  standalone: true,
  imports: [NgTemplateOutlet, TabsModule],
  encapsulation: ViewEncapsulation.None,
  template: `
    <p-tabpanels class="c-pill-tabs__panels">
      @for (panel of panels(); track panel.value) {
        <p-tabpanel [value]="panel.value">
          <div class="c-pill-tabs__panel">
            <ng-container [ngTemplateOutlet]="panel.content" />
          </div>
        </p-tabpanel>
      }
    </p-tabpanels>
    <ng-content />
  `,
})
export class PillTabPanelsComponent {
  protected readonly panels = contentChildren(PillTabPanelComponent);
}
