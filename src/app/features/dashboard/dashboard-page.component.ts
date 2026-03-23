import { Component } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';
import { TabsModule } from 'primeng/tabs';
import { ToggleSwitchModule } from 'primeng/toggleswitch';
import { LucideChevronRight, LucideCirclePlus, LucideCopy, LucideCreditCard } from '@lucide/angular';

@Component({
  selector: 'app-dashboard-page',
  standalone: true,
  imports: [
    ButtonModule,
    CardModule,
    TabsModule,
    ToggleSwitchModule,
    LucideChevronRight,
    LucideCopy,
    LucideCreditCard,
    LucideCirclePlus,
  ],
  styleUrl: './dashboard-page.component.css',
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
                  <span>Кошелёк</span>
                  <svg class="h-3.5 w-3.5" lucideChevronRight></svg>
                </p-button>
              </div>

              <h3 class="text-3xl font-bold tracking-tighter text-surface-900 dark:text-surface-50 xl:text-4xl">
                $ 12,450,000.80
              </h3>

              <p-button [raised]="true">
                <svg class="h-4 w-4" lucideCirclePlus></svg>
                <span>Пополнить</span>
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
                  <span>Детали</span>
                  <svg class="h-3.5 w-3.5" lucideChevronRight></svg>
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
                    [raised]="true">
                    <ng-template #icon>
                      <svg class="h-4 w-4" lucideCopy></svg>
                    </ng-template>
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
                    [raised]="true">
                    <ng-template #icon>
                      <svg class="h-4 w-4" lucideCopy></svg>
                    </ng-template>
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
                    [raised]="true">
                    <ng-template #icon>
                      <svg class="h-4 w-4" lucideCopy></svg>
                    </ng-template>
                  </p-button>
                </div>
              </div>
            </div>
          </p-card>
        </div>

        <div class="md:col-span-3">
          <p-card class="h-full">
            <ng-template #header>
              <h3 class="text-sm font-bold uppercase tracking-wide text-surface-900 dark:text-surface-50">
                Инвестиции
              </h3>
              <p-tabs class="dash-tabs" value="shares">
                <p-tablist>
                  <p-tab value="shares">Мои доли</p-tab>
                  <p-tab value="buy">Купить доли</p-tab>
                </p-tablist>
              </p-tabs>
            </ng-template>

            <div class="flex flex-col gap-6">
              <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="dash-stat-card">
                  <p>Количество долей</p>
                  <h4>132,806</h4>
                </div>
                <div class="dash-stat-card">
                  <p>Текущая стоимость</p>
                  <h4 class="text-primary-500">$ 504.00</h4>
                </div>
                <div class="dash-stat-card">
                  <p>Текущая цена доли</p>
                  <h4>$0.003795</h4>
                </div>
                <div class="dash-stat-card">
                  <p>Средняя цена покупки</p>
                  <h4>$0.003795</h4>
                </div>
              </div>

              <div class="flex flex-wrap items-center gap-3">
                <h4 class="text-sm font-bold uppercase tracking-tight text-surface-900 dark:text-surface-50">
                  Активные рассрочки (2)
                </h4>
                <p-button severity="secondary" size="small" variant="outlined">
                  <span>Управление</span>
                  <svg class="h-3.5 w-3.5" lucideChevronRight></svg>
                </p-button>
              </div>

              <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <article class="dash-installment-card dash-installment-card--danger">
                  <div class="flex items-start justify-between">
                    <span class="dash-installment-card__id">ID: 88421</span>
                    <strong class="text-red-500">$ 42.00</strong>
                  </div>
                  <div class="flex-1 flex items-start gap-2">
                    <div class="mt-1 relative flex h-2 w-2">
                      <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                    </div>
                    <div class="space-y-1 text-xs font-bold">
                      <p>След. платеж: <span class="text-red-500">10.02.2026</span></p>
                      <p class="text-red-500/70 dark:text-red-400/70">Оплатить не позднее: 17.02.2026</p>
                    </div>
                  </div>

                  <p-button severity="danger" size="small">
                    <svg class="h-4 w-4" lucideCreditCard></svg>
                    <span>Оплатить сейчас</span>
                  </p-button>
                </article>

                <article class="dash-installment-card">
                  <div class="flex items-start justify-between">
                    <span class="dash-installment-card__id">ID: 90152</span>
                    <strong>$ 120.00</strong>
                  </div>
                  <div class="flex-1 flex items-start gap-2">
                    <div class="mt-1 relative flex h-2 w-2">
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-surface-300 dark:bg-surface-500"></span>
                    </div>
                    <p class="text-xs font-bold text-surface-500 dark:text-surface-400">След. платеж: 25.02.2026</p>
                  </div>
                  <p-button
                    severity="primary"
                    size="small"
                    styleClass="p-disabled:opacity-95 dark:p-disabled:opacity-85"
                    variant="outlined"
                    [disabled]="true">
                    через 15 дней
                  </p-button>
                </article>
              </div>
            </div>
          </p-card>
        </div>
      </section>

      <section>
        <p-card>
          <ng-template #header>
            <h3 class="text-sm font-bold uppercase tracking-wide text-surface-900 dark:text-surface-50">История цен</h3>
            <p-tabs class="dash-tabs dash-tabs--period" value="month">
              <p-tablist>
                <p-tab value="month">Месяц</p-tab>
                <p-tab value="year">Год</p-tab>
              </p-tablist>
            </p-tabs>
          </ng-template>

          <div class="flex flex-col gap-5">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <div class="dash-stat-card">
                <p>Текущая цена</p>
                <h4>$0.003795</h4>
              </div>
              <div class="dash-stat-card">
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
