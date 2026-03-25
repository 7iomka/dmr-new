import { Component, input, ViewEncapsulation } from '@angular/core';
import { TabsModule } from 'primeng/tabs';

@Component({
  selector: 'app-investment-tabpanels',
  standalone: true,
  encapsulation: ViewEncapsulation.None,
  imports: [TabsModule],
  template: `
    <p-tabpanels class="c-investment-tabs__panels">
      <ng-content />
    </p-tabpanels>
  `,
  styleUrl: './investment-tabpanels.component.css',
})
export class InvestmentTabpanelsComponent {}

@Component({
  selector: 'app-investment-tabpanel',
  standalone: true,
  imports: [TabsModule],
  template: `
    <p-tabpanel class="c-investment-tabs__panel" [value]="value()">
      <ng-content />
    </p-tabpanel>
  `,
  encapsulation: ViewEncapsulation.None,
})
export class InvestmentTabpanelComponent {
  readonly value = input.required<string>();
}
