import { Component, ViewEncapsulation } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';
import { TabsModule } from 'primeng/tabs';
import { LucideChevronRight, LucideCirclePlus, LucideCopy } from '@lucide/angular';

import { CInvestmentBuyFormComponent } from '../investments/components/investment-buy-form/c-investment-buy-form.component';
import { CInvestmentSharesOverviewComponent } from '../investments/components/shares-overview/c-investment-shares-overview.component';
import { InvestmentTabsNavComponent } from '../investments/components/tabs/investment-tabs-nav.component';
import {
  InvestmentTabpanelComponent,
  InvestmentTabpanelsComponent,
} from '../investments/components/tabs/investment-tabpanels.component';
import {
  PillTabComponent,
  PillTabPanelComponent,
  PillTabPanelsComponent,
  PillTabsNavComponent,
} from '../../shared/components/pill-tabs';
import { FormControlCopyComponent } from '../../shared/components/form-controls/form-control-copy.component';

@Component({
  selector: 'app-dashboard-page',
  host: {
    class: 'app-page',
  },
  standalone: true,
  imports: [
    ButtonModule,
    CardModule,
    TabsModule,
    LucideChevronRight,
    LucideCopy,
    LucideCirclePlus,
    CInvestmentBuyFormComponent,
    CInvestmentSharesOverviewComponent,
    InvestmentTabsNavComponent,
    InvestmentTabpanelsComponent,
    InvestmentTabpanelComponent,
    PillTabsNavComponent,
    PillTabComponent,
    PillTabPanelsComponent,
    PillTabPanelComponent,
    FormControlCopyComponent,
  ],
  styleUrl: './dashboard-page.component.css',
  encapsulation: ViewEncapsulation.None,
  template: `
    <section class="c-page-heading">
      <h1 class="c-page-heading__title">Добро пожаловать, Дорин!</h1>
      <p class="c-page-heading__subtitle">Вот текущее состояние ваших инвестиций.</p>
    </section>

    <section class="grid grid-cols-1 gap-6 md:grid-cols-5">
      <div class="space-y-6 md:col-span-2">
        <p-card>
          <div class="flex flex-col gap-4">
            <div class="flex justify-between sm:mb-2">
              <p class="c-section-label">Ваш баланс</p>
              <p-button severity="secondary" size="small" variant="outlined">
                <span pButtonLabel>Кошелёк</span>
                <svg class="h-3.5 w-3.5" lucideChevronRight pButtonIcon></svg>
              </p-button>
            </div>

            <h3 class="text-3xl font-bold tracking-tighter text-surface-900 dark:text-surface-50 xl:text-4xl">
              $ 12,450,000.80
            </h3>

            <p-button [raised]="true">
              <svg class="h-4 w-4" lucideCirclePlus pButtonIcon></svg>
              <span pButtonLabel>Пополнить</span>
            </p-button>
          </div>
        </p-card>

        <p-card>
          <div class="flex flex-col gap-3">
            <div class="flex items-start justify-between">
              <div class="flex flex-col gap-1">
                <p class="c-section-label">Рефералы</p>
                <h3 class="text-3xl font-bold tracking-tight text-surface-900 dark:text-surface-50">12</h3>
              </div>

              <p-button severity="secondary" size="small" variant="outlined">
                <span pButtonLabel>Детали</span>
                <svg class="h-3.5 w-3.5" lucideChevronRight pButtonIcon></svg>
              </p-button>
            </div>

            <app-form-control-copy
              label="Ваша ссылка (платформа)"
              labelVariant="section"
              value="https://invest.awsarhitect.me/register?ref=2A04E1D8"
              variant="filled" />
            <app-form-control-copy
              label="Ваша ссылка (продукт)"
              labelVariant="section"
              value="https://awsarhitect.me/?ref=2A04E1D8"
              variant="filled" />
            <app-form-control-copy
              label="Код"
              labelVariant="section"
              value="2A04E1D8"
              valueClass="text-primary font-semibold"
              variant="filled"
              [code]="true" />
          </div>
        </p-card>
      </div>

      <div class="md:col-span-3">
        <p-tabs class="c-investment-tabs" value="shares" [showNavigators]="false">
          <p-card class="h-full">
            <ng-template #header>
              <h3 class="c-card-title">Инвестиции</h3>
              <app-investment-tabs-nav />
            </ng-template>

            <app-investment-tabpanels>
              <app-investment-tabpanel value="shares">
                <app-investment-shares-overview />
              </app-investment-tabpanel>
              <app-investment-tabpanel value="buy">
                <app-investment-buy-form layout="stacked" />
              </app-investment-tabpanel>
            </app-investment-tabpanels>
          </p-card>
        </p-tabs>
      </div>
    </section>

    <section>
      <p-tabs value="month" [showNavigators]="false">
        <p-card>
          <ng-template #header>
            <h3 class="c-card-title">История цен</h3>
            <app-pill-tabs-nav theme="primary">
              <app-pill-tab value="month">Месяц</app-pill-tab>
              <app-pill-tab value="year">Год</app-pill-tab>
            </app-pill-tabs-nav>
          </ng-template>

          <app-pill-tabpanels>
            <app-pill-tabpanel value="month">
              <div class="flex flex-col gap-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                  <div class="c-investment-stat-card">
                    <h5 class="c-investment-stat-card__title">Текущая цена</h5>
                    <div class="c-investment-stat-card__value">$0.003795</div>
                  </div>
                  <div class="c-investment-stat-card">
                    <h5 class="c-investment-stat-card__title">Всего проданных долей</h5>
                    <div class="c-investment-stat-card__value">5.52B</div>
                  </div>
                </div>

                <div class="dash-chart-shell">
                  <div class="dash-chart-legend">
                    <span><i class="dot dot-blue"></i>Цена</span>
                    <span><i class="dot dot-green"></i>Проданные доли</span>
                  </div>
                  <div class="dash-chart-placeholder">Chart container (legacy structure, static v1)</div>
                </div>
              </div>
            </app-pill-tabpanel>

            <app-pill-tabpanel value="year">
              <div class="py-3 text-sm text-surface-600 dark:text-surface-300">
                Контент за год появится в следующем обновлении.
              </div>
            </app-pill-tabpanel>
          </app-pill-tabpanels>
        </p-card>
      </p-tabs>
    </section>
  `,
})
export class DashboardPageComponent {}
