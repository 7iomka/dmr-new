import { Component, ViewEncapsulation } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';
import { TabsModule } from 'primeng/tabs';
import { LucideChevronRight, LucideCirclePlus, LucideCopy } from '@lucide/angular';

import { CInvestmentBuyFormComponent } from '../investments/components/investment-buy-form/c-investment-buy-form.component';
import { CInvestmentSharesOverviewComponent } from '../investments/components/shares-overview/c-investment-shares-overview.component';

@Component({
  selector: 'app-dashboard-page',
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
  ],
  styleUrl: './dashboard-page.component.css',
  encapsulation: ViewEncapsulation.None,
  template: `
    <div class="flex flex-col gap-6 lg:gap-7">
      <section>
        <h1 class="text-2xl font-bold tracking-tight text-surface-900 dark:text-surface-50 lg:text-3xl">
          Добро пожаловать, Дорин!
        </h1>
        <p class="mt-1 text-sm font-medium text-surface-500">Вот текущее состояние ваших инвестиций.</p>
      </section>

      <section class="grid grid-cols-1 gap-6 md:grid-cols-5">
        <div class="space-y-6 md:col-span-2">
          <p-card>
            <div class="flex flex-col gap-4">
              <div class="flex justify-between sm:mb-2">
                <p class="dash-card-sm-title">Ваш баланс</p>
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
                  <p class="dash-card-sm-title">Рефералы</p>
                  <h3 class="text-3xl font-bold tracking-tight text-surface-900 dark:text-surface-50">12</h3>
                </div>

                <p-button severity="secondary" size="small" variant="outlined">
                  <span pButtonLabel>Детали</span>
                  <svg class="h-3.5 w-3.5" lucideChevronRight pButtonIcon></svg>
                </p-button>
              </div>

              <div class="dash-ref-box">
                <span class="dash-ref-box__label">Ваша ссылка (платформа)</span>
                <div class="dash-ref-box__row">
                  <span class="dash-ref-box__content">https://invest.awsarhitect.me/?ref=A7CA9B55</span>
                  <p-button
                    ariaLabel="Copy platform referral link"
                    class="dash-ref-box__action"
                    severity="secondary"
                    size="small"
                    styleClass="p-button-icon-only"
                    [raised]="true">
                    <svg class="h-4 w-4" lucideCopy pButtonIcon></svg>
                  </p-button>
                </div>
              </div>

              <div class="dash-ref-box">
                <span class="dash-ref-box__label">Ваша ссылка (продукт)</span>
                <div class="dash-ref-box__row">
                  <span class="dash-ref-box__content">https://awsarhitect.me/?ref=A7CA9B55</span>
                  <p-button
                    ariaLabel="Copy product referral link"
                    class="dash-ref-box__action"
                    severity="secondary"
                    size="small"
                    styleClass="p-button-icon-only"
                    [raised]="true">
                    <svg class="h-4 w-4" lucideCopy pButtonIcon></svg>
                  </p-button>
                </div>
              </div>
              <div class="dash-ref-box">
                <span class="dash-ref-box__label">Код</span>
                <div class="dash-ref-box__row">
                  <span class="dash-ref-box__content font-bold text-primary">A7CA9B55</span>
                  <p-button
                    ariaLabel="Copy referral code"
                    class="dash-ref-box__action"
                    severity="secondary"
                    size="small"
                    styleClass="p-button-icon-only"
                    [raised]="true">
                    <svg class="h-4 w-4" lucideCopy pButtonIcon></svg>
                  </p-button>
                </div>
              </div>
            </div>
          </p-card>
        </div>

        <div class="md:col-span-3">
          <p-tabs class="c-investment-tabs" value="shares" [showNavigators]="false">
            <p-card class="h-full">
              <ng-template #header>
                <h3 class="text-sm font-bold uppercase tracking-wide text-surface-900 dark:text-surface-50">
                  Инвестиции
                </h3>
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

              <p-tabpanels>
                <p-tabpanel value="shares">
                  <app-c-investment-shares-overview />
                </p-tabpanel>
                <p-tabpanel value="buy">
                  <app-c-investment-buy-form layout="stacked" />
                </p-tabpanel>
              </p-tabpanels>
            </p-card>
          </p-tabs>
        </div>
      </section>

      <section>
        <p-card>
          <ng-template #header>
            <h3 class="text-sm font-bold uppercase tracking-wide text-surface-900 dark:text-surface-50">История цен</h3>
            <p-tabs class="c-investment-tabs c-investment-tabs--period" value="month">
              <p-tablist>
                <p-tab value="month">Месяц</p-tab>
                <p-tab value="year">Год</p-tab>
              </p-tablist>
            </p-tabs>
          </ng-template>

          <div class="flex flex-col gap-5">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <div class="c-investment-stat-card">
                <p>Текущая цена</p>
                <h4>$0.003795</h4>
              </div>
              <div class="c-investment-stat-card">
                <p>Всего проданных акций</p>
                <h4>5.52B</h4>
              </div>
            </div>

            <div class="dash-chart-shell">
              <div class="dash-chart-legend">
                <span><i class="dot dot-blue"></i>Цена</span>
                <span><i class="dot dot-green"></i>Проданные акции</span>
              </div>
              <div class="dash-chart-placeholder">Chart container (legacy structure, static v1)</div>
            </div>
          </div>
        </p-card>
      </section>
    </div>
  `,
})
export class DashboardPageComponent {}
