import { Component, input, ViewEncapsulation } from '@angular/core';
import { TabsModule } from 'primeng/tabs';

@Component({
  selector: 'app-investment-tabs-nav',
  standalone: true,
  encapsulation: ViewEncapsulation.None,
  imports: [TabsModule],
  template: `
    <p-tablist
      [pt]="{
        root: { class: 'c-investment-tabs__nav' },
        tabList: { class: 'c-investment-tabs__list' },
        activeBar: { class: 'hidden' },
      }">
      <p-tab class="c-investment-tabs__tab" value="shares">{{ sharesLabel() }}</p-tab>
      <p-tab class="c-investment-tabs__tab" value="buy">{{ buyLabel() }}</p-tab>
    </p-tablist>
  `,
  styleUrl: './investment-tabs-nav.component.css',
})
export class InvestmentTabsNavComponent {
  readonly sharesLabel = input('Мои доли');
  readonly buyLabel = input('Купить доли');
}
