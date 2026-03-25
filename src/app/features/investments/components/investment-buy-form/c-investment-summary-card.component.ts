import { Component, computed, input } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { LucideCirclePlus } from '@lucide/angular';

@Component({
  selector: 'app-c-investment-summary-card',
  standalone: true,
  imports: [ButtonModule, LucideCirclePlus],
  template: `
    <div class="c-investment-summary-card" [class.c-investment-summary-card--sticky]="sticky()">
      <div class="c-investment-summary-card__row">
        <span class="c-investment-summary-card__label">Доли</span>
        <span class="c-investment-summary-card__value c-investment-summary-card__value--accent">{{
          shares() | number
        }}</span>
      </div>

      <div class="c-investment-summary-card__row">
        <span class="c-investment-summary-card__label">Цена за долю</span>
        <span class="c-investment-summary-card__value">{{ sharePrice() }} $ / Доля</span>
      </div>

      <div class="c-investment-summary-card__divider"></div>

      <div class="c-investment-summary-card__row">
        <span class="c-investment-summary-card__label">Общая сумма</span>
        <span class="c-investment-summary-card__total">{{ amount() }} $</span>
      </div>

      @if (showButton()) {
        <p-button styleClass="w-full" [raised]="true">
          <svg class="h-5 w-5" lucideCirclePlus pButtonIcon></svg>
          <span pButtonLabel>{{ buyLabel() }}</span>
        </p-button>
      }
    </div>
  `,
  styleUrl: './c-investment-summary-card.component.css',
})
export class CInvestmentSummaryCardComponent {
  readonly shares = input.required<number>();
  readonly amount = input.required<number>();
  readonly sharePrice = input('0.003795');
  readonly sticky = input(false);
  readonly showButton = input(false);

  readonly buyLabel = computed(() => `Купить ${this.shares().toLocaleString('ru-RU')} долей за ${this.amount()} $`);
}
