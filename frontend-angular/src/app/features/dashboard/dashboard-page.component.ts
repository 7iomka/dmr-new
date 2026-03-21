import { Component } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';
import { TabsModule } from 'primeng/tabs';
import { ToggleSwitchModule } from 'primeng/toggleswitch';
import { LucideDynamicIcon, LucideChevronRight, LucideCopy, LucideCreditCard, LucideCirclePlus } from '@lucide/angular';

@Component({
  selector: 'app-dashboard-page',
  standalone: true,
  imports: [ButtonModule, CardModule, TabsModule, ToggleSwitchModule, LucideDynamicIcon],
  template: `
    <div class="flex flex-col gap-6 lg:gap-7">
      <section>
        <h1 class="text-2xl font-bold tracking-tight text-surface-900 dark:text-surface-50 lg:text-3xl">Добро пожаловать, Дорин!</h1>
        <p class="mt-1 text-sm font-medium text-surface-500">Вот текущее состояние ваших инвестиций.</p>
      </section>

      <section class="grid grid-cols-1 gap-6 md:grid-cols-5">
        <div class="space-y-6 md:col-span-2">
          <p-card>
            <div class="flex flex-col gap-4">
              <div class="flex justify-between sm:mb-2">
                <p class="dash-card-kicker">Ваш баланс</p>
                <p-button severity="secondary" variant="outlined" size="small">
                  <span>Кошелёк</span>
                  <svg [lucideIcon]="chevronRightIcon" class="h-3.5 w-3.5"></svg>
                </p-button>
              </div>
              <h3 class="text-3xl font-bold tracking-tighter text-surface-900 dark:text-surface-50 xl:text-4xl">$ 12,450,000.80</h3>
              <p-button>
                <svg [lucideIcon]="circlePlusIcon" class="h-4 w-4"></svg>
                <span>Пополнить</span>
              </p-button>
            </div>
          </p-card>

          <p-card>
            <div class="flex flex-col gap-3">
              <div class="flex items-start justify-between">
                <div class="flex flex-col gap-1">
                  <p class="dash-card-kicker">Рефералы</p>
                  <h3 class="text-3xl font-bold tracking-tight text-surface-900 dark:text-surface-50">12</h3>
                </div>
                <p-button severity="secondary" variant="outlined" size="small">
                  <span>Детали</span>
                  <svg [lucideIcon]="chevronRightIcon" class="h-3.5 w-3.5"></svg>
                </p-button>
              </div>

              <div class="dash-ref-box">
                <label>Ваша ссылка (платформа)</label>
                <div class="dash-ref-box__row">
                  <span>https://invest.awsarhitect.me/?ref=A7CA9B55</span>
                  <p-button
                    [rounded]="true"
                    [text]="true"
                    severity="secondary"
                    size="small"
                    class="p-button-icon-only"
                    ariaLabel="Copy platform referral link"
                  >
                    <svg [lucideIcon]="copyIcon" class="h-4 w-4"></svg>
                  </p-button>
                </div>
              </div>

              <div class="dash-ref-box">
                <label>Ваша ссылка (продукт)</label>
                <div class="dash-ref-box__row">
                  <span>https://awsarhitect.me/?ref=A7CA9B55</span>
                  <p-button
                    [rounded]="true"
                    [text]="true"
                    severity="secondary"
                    size="small"
                    class="p-button-icon-only"
                    ariaLabel="Copy product referral link"
                  >
                    <svg [lucideIcon]="copyIcon" class="h-4 w-4"></svg>
                  </p-button>
                </div>
              </div>

              <div class="dash-ref-code">
                <span>Код:</span>
                <div class="flex items-center gap-2">
                  <strong>A7CA9B55</strong>
                  <p-button
                    [rounded]="true"
                    [text]="true"
                    severity="secondary"
                    size="small"
                    class="p-button-icon-only"
                    ariaLabel="Copy referral code"
                  >
                    <svg [lucideIcon]="copyIcon" class="h-4 w-4"></svg>
                  </p-button>
                </div>
              </div>
            </div>
          </p-card>
        </div>

        <div class="md:col-span-3">
          <p-card class="h-full">
            <ng-template #header>
              <h3 class="text-sm font-bold uppercase tracking-wide text-surface-900 dark:text-surface-50">Инвестиции</h3>
              <p-tabs value="shares" class="dash-tabs">
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
                <h4 class="text-sm font-bold uppercase tracking-tight text-surface-900 dark:text-surface-50">Активные рассрочки (2)</h4>
                <p-button severity="secondary" variant="outlined" size="small">
                  <span>Управление</span>
                  <svg [lucideIcon]="chevronRightIcon" class="h-3.5 w-3.5"></svg>
                </p-button>
              </div>

              <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <article class="dash-installment-card dash-installment-card--danger">
                  <div class="flex items-start justify-between">
                    <span class="dash-installment-card__id">ID: 88421</span>
                    <strong class="text-red-500">$ 42.00</strong>
                  </div>
                  <div class="space-y-1 text-[11px] font-bold uppercase">
                    <p>След. платеж: <span class="text-red-500">10.02.2026</span></p>
                    <p class="text-red-400/70">Оплатить не позднее: 17.02.2026</p>
                  </div>
                  <p-button severity="danger" variant="outlined" class="w-full !justify-center !gap-2">
                    <span>Оплатить сейчас</span>
                    <svg [lucideIcon]="creditCardIcon" class="h-4 w-4"></svg>
                  </p-button>
                </article>

                <article class="dash-installment-card">
                  <div class="flex items-start justify-between">
                    <span class="dash-installment-card__id">ID: 90152</span>
                    <strong>$ 120.00</strong>
                  </div>
                  <p class="text-[11px] font-bold uppercase text-surface-500 dark:text-surface-300">След. платеж: 25.02.2026</p>
                  <div class="dash-installment-card__eta">через 15 дней</div>
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
            <p-tabs value="month" class="dash-tabs dash-tabs--period">
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
  `
})
export class DashboardPageComponent {
  protected readonly chevronRightIcon = LucideChevronRight;
  protected readonly circlePlusIcon = LucideCirclePlus;
  protected readonly copyIcon = LucideCopy;
  protected readonly creditCardIcon = LucideCreditCard;
}
