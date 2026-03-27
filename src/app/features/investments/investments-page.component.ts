import { Component, ViewEncapsulation } from '@angular/core';
import { CardModule, CardPassThroughOptions } from 'primeng/card';
import { TabsModule } from 'primeng/tabs';

import { CInvestmentBuyFormComponent } from './components/investment-buy-form/c-investment-buy-form.component';
import { CInvestmentInstallmentsOverviewComponent } from './components/installments-overview/c-investment-installments-overview.component';
import { CInvestmentSharesOverviewComponent } from './components/shares-overview/c-investment-shares-overview.component';
import { InvestmentTabsNavComponent } from './components/tabs/investment-tabs-nav.component';
import {
  InvestmentTabpanelComponent,
  InvestmentTabpanelsComponent,
} from './components/tabs/investment-tabpanels.component';
import { PillTabComponent } from '../../shared/components/pill-tabs/pill-tab.component';
import { PillTabsNavComponent } from '../../shared/components/pill-tabs/pill-tabs-nav.component';

@Component({
  selector: 'app-investments-page',
  standalone: true,
  imports: [
    CardModule,
    TabsModule,
    CInvestmentBuyFormComponent,
    CInvestmentInstallmentsOverviewComponent,
    CInvestmentSharesOverviewComponent,
    InvestmentTabsNavComponent,
    InvestmentTabpanelsComponent,
    InvestmentTabpanelComponent,
    PillTabsNavComponent,
    PillTabComponent,
  ],
  template: `
    <div class="flex flex-col gap-6 lg:gap-7">
      <section class="c-page-heading">
        <h1 class="c-page-heading__title">Инвестиции</h1>
        <p class="c-page-heading__subtitle">
          Просматривайте портфель долей и управляйте всеми рассрочками в одном месте.
        </p>
      </section>
      <section>
        <p-tabs value="shares" [showNavigators]="false">
          <p-card>
            <ng-template #header>
              <app-investment-tabs-nav />
            </ng-template>

            <app-investment-tabpanels>
              <app-investment-tabpanel value="buy">
                <app-c-investment-buy-form layout="split" />
              </app-investment-tabpanel>
              <app-investment-tabpanel value="shares">
                <app-c-investment-shares-overview [showInstallments]="false" [wideGrid]="true" />
              </app-investment-tabpanel>
            </app-investment-tabpanels>
          </p-card>
        </p-tabs>
      </section>

      <section>
        <p-tabs value="active" [showNavigators]="false">
          <p-card [pt]="installmentsCardPt">
            <ng-template #header>
              <div class="flex flex-wrap items-center justify-between gap-3">
                <h3 class="text-sm font-bold uppercase tracking-tight text-surface-900 dark:text-surface-50">
                  Рассрочки
                </h3>

                <app-pill-tabs-nav size="sm" theme="secondary">
                  <app-pill-tab value="active">Активные</app-pill-tab>
                  <app-pill-tab value="closed">Закрытые</app-pill-tab>
                </app-pill-tabs-nav>
              </div>
            </ng-template>

            <app-c-investment-installments-overview />
          </p-card>
        </p-tabs>
      </section>
    </div>
  `,
  styleUrl: './investments-page.component.css',
  encapsulation: ViewEncapsulation.None,
})
export class InvestmentsPageComponent {
  protected readonly installmentsCardPt: CardPassThroughOptions = {
    body: { class: 'px-0 pb-0 pt-0' },
    content: { class: 'px-0 pb-0 pt-0' },
  };
}
