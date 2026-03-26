import { Component, ViewEncapsulation } from '@angular/core';
import { CardModule } from 'primeng/card';
import { TabsModule } from 'primeng/tabs';

import { CInvestmentBuyFormComponent } from './components/investment-buy-form/c-investment-buy-form.component';
import { CInvestmentSharesOverviewComponent } from './components/shares-overview/c-investment-shares-overview.component';
import { InvestmentTabsNavComponent } from './components/tabs/investment-tabs-nav.component';
import {
  InvestmentTabpanelComponent,
  InvestmentTabpanelsComponent,
} from './components/tabs/investment-tabpanels.component';

@Component({
  selector: 'app-investments-page',
  standalone: true,
  imports: [
    CardModule,
    TabsModule,
    CInvestmentBuyFormComponent,
    CInvestmentSharesOverviewComponent,
    InvestmentTabsNavComponent,
    InvestmentTabpanelsComponent,
    InvestmentTabpanelComponent,
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
    </div>
  `,
  styleUrl: './investments-page.component.css',
  encapsulation: ViewEncapsulation.None,
})
export class InvestmentsPageComponent {}
