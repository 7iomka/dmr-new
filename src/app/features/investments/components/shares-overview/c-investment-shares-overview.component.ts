import { Component, input } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { LucideChevronRight, LucideCreditCard } from '@lucide/angular';

@Component({
  selector: 'app-c-investment-shares-overview',
  standalone: true,
  imports: [ButtonModule, LucideChevronRight, LucideCreditCard],
  template: `
    <div class="c-investment-shares-overview">
      <div class="c-investment-shares-overview__stats" [class.c-investment-shares-overview__stats--wide]="wideGrid()">
        <div class="c-investment-stat-card">
          <p>Количество долей</p>
          <h4>132,806</h4>
        </div>
        <div class="c-investment-stat-card">
          <p>{{ wideGrid() ? 'Стоимость портфеля' : 'Текущая стоимость' }}</p>
          <h4 class="text-primary-500">$ 504.00</h4>
        </div>
        <div class="c-investment-stat-card">
          <p>Текущая цена доли</p>
          <h4>$0.003795</h4>
        </div>
        <div class="c-investment-stat-card">
          <p>Средняя цена покупки</p>
          <h4>$0.003795</h4>
        </div>
      </div>

      @if (showInstallments()) {
        <div class="c-investment-shares-overview__installments-head">
          <h4 class="text-sm font-bold uppercase tracking-tight text-surface-900 dark:text-surface-50">
            Активные рассрочки (2)
          </h4>
          <p-button severity="secondary" size="small" variant="outlined">
            <span pButtonLabel>Управление</span>
            <svg class="h-3.5 w-3.5" lucideChevronRight pButtonIcon></svg>
          </p-button>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
          <article class="c-investment-installment-card c-investment-installment-card--danger">
            <div class="flex items-start justify-between">
              <span class="c-investment-installment-card__id">ID: 88421</span>
              <strong class="text-red-500">$ 42.00</strong>
            </div>
            <div class="flex-1 flex items-start gap-2">
              <div class="mt-1 relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
              </div>
              <div class="space-y-1 text-xs font-bold">
                <p>След. платеж: <span class="text-red-500">10.02.2026</span></p>
                <p class="text-red-500/70 dark:text-red-400/70">Оплатить не позднее: 17.02.2026</p>
              </div>
            </div>

            <p-button severity="danger" size="small">
              <svg class="h-4 w-4" lucideCreditCard pButtonIcon></svg>
              <span pButtonLabel>Оплатить сейчас</span>
            </p-button>
          </article>

          <article class="c-investment-installment-card">
            <div class="flex items-start justify-between">
              <span class="c-investment-installment-card__id">ID: 90152</span>
              <strong>$ 120.00</strong>
            </div>
            <div class="flex-1 flex items-start gap-2">
              <div class="mt-1 relative flex h-2 w-2">
                <span class="relative inline-flex rounded-full h-2 w-2 bg-surface-300 dark:bg-surface-500"></span>
              </div>
              <p class="text-xs font-bold text-surface-500 dark:text-surface-400">След. платеж: 25.02.2026</p>
            </div>
            <p-button
              label="через 15 дней"
              severity="primary"
              size="small"
              styleClass="p-disabled:opacity-95 dark:p-disabled:opacity-85"
              variant="outlined"
              [disabled]="true" />
          </article>
        </div>
      }
    </div>
  `,
  styleUrl: './c-investment-shares-overview.component.css',
})
export class CInvestmentSharesOverviewComponent {
  readonly showInstallments = input(true);
  readonly wideGrid = input(false);
}
