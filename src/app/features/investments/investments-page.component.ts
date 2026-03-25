import { Component, ViewEncapsulation } from '@angular/core';
import { CardModule } from 'primeng/card';
import { TabsModule } from 'primeng/tabs';

import { CInvestmentBuyFormComponent } from './components/investment-buy-form/c-investment-buy-form.component';
import { CInvestmentSharesOverviewComponent } from './components/shares-overview/c-investment-shares-overview.component';

@Component({
  selector: 'app-investments-page',
  standalone: true,
  imports: [CardModule, TabsModule, CInvestmentBuyFormComponent, CInvestmentSharesOverviewComponent],
  template: `
    <div class="flex flex-col gap-6 lg:gap-7">
      <section>
        <h1 class="text-2xl font-bold tracking-tight text-surface-900 dark:text-surface-50 lg:text-3xl">Инвестиции</h1>
        <p class="mt-1 text-sm font-medium text-surface-500">
          Просматривайте портфель долей и управляйте всеми рассрочками в одном месте.
        </p>
      </section>

      <section>
        <p-tabs
          value="shares"
          [showNavigators]="false">
          <p-card>
            <ng-template #header>
              <p-tablist
                [pt]="{
                  root: { class: 'c-investment-tabs__nav' },
                  tabList: { class: 'c-investment-tabs__list' },
                  activeBar: { class: 'hidden' },
                }">
                <p-tab class="c-investment-tabs__tab" value="shares">Мои доли</p-tab>
                <p-tab class="c-investment-tabs__tab" value="buy">Купить доли</p-tab>
              </p-tablist>
            </ng-template>

            <p-tabpanels class="c-investment-tabs__panels">
              <p-tabpanel class="c-investment-tabs__panel" value="buy">
                <app-c-investment-buy-form layout="split" />
              </p-tabpanel>
              <p-tabpanel class="c-investment-tabs__panel" value="shares">
                <app-c-investment-shares-overview [showInstallments]="false" [wideGrid]="true" />
              </p-tabpanel>
            </p-tabpanels>
          </p-card>
        </p-tabs>
      </section>
    </div>
  `,
  styleUrl: './investments-page.component.css',
  encapsulation: ViewEncapsulation.None,
})
export class InvestmentsPageComponent {}
