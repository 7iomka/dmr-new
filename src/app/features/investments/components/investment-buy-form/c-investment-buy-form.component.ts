import { Component, computed, input, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { SelectModule, SelectPassThrough } from 'primeng/select';

import { CInvestmentInputFieldComponent } from './c-investment-input-field.component';
import { CInvestmentSummaryCardComponent } from './c-investment-summary-card.component';
import { CInvestmentSwitchCardComponent } from './c-investment-switch-card.component';

@Component({
  selector: 'app-c-investment-buy-form',
  standalone: true,
  imports: [
    FormsModule,
    SelectModule,
    CInvestmentInputFieldComponent,
    CInvestmentSummaryCardComponent,
    CInvestmentSwitchCardComponent,
  ],
  template: `
    <div class="c-investment-buy-form" [class.c-investment-buy-form--split]="layout() === 'split'">
      <div class="c-investment-buy-form__main">
        <app-c-investment-switch-card
          [checked]="installmentEnabled()"
          (checkedChange)="installmentEnabled.set($event)" />

        <div class="c-investment-buy-form__fields">
          <app-c-investment-input-field
            inputId="investment-amount"
            label="Введите сумму"
            suffix="$"
            [value]="amount()"
            [maxFractionDigits]="6"
            (valueChange)="updateAmount($event)" />
          <app-c-investment-input-field
            inputId="investment-shares"
            label="Количество долей"
            [value]="shares()"
            [maxFractionDigits]="0"
            (valueChange)="updateShares($event)" />
        </div>

        @if (installmentEnabled()) {
          <label class="c-investment-buy-form__term-wrap" for="investment-term">
            <span class="c-investment-buy-form__term-label">Срок рассрочки</span>
            <p-select
              class="c-investment-buy-form__term"
              appendTo="body"
              ariaLabel="Срок рассрочки"
              id="investment-term"
              optionLabel="label"
              optionValue="value"
              [ngModel]="termMonths()"
              [options]="termOptions"
              [pt]="termSelectPt"
              [unstyled]="true"
              (ngModelChange)="updateTerm($event)" />
          </label>
        }
      </div>

      <div class="c-investment-buy-form__summary">
        <app-c-investment-summary-card
          [amount]="amount()"
          [sharePrice]="sharePrice()"
          [shares]="shares()"
          [showButton]="true"
          [sticky]="layout() === 'split'" />
      </div>
    </div>
  `,
  styleUrl: './c-investment-buy-form.component.css',
})
export class CInvestmentBuyFormComponent {
  private static readonly SHARE_PRICE = 0.003795;

  readonly layout = input<'stacked' | 'split'>('stacked');

  readonly amount = signal(504);
  readonly shares = signal(132806);
  readonly installmentEnabled = signal(false);
  readonly termMonths = signal(12);
  readonly sharePrice = computed(() => CInvestmentBuyFormComponent.SHARE_PRICE.toFixed(6));

  protected readonly termOptions = [
    { label: '3 месяца', value: 3 },
    { label: '6 месяцев', value: 6 },
    { label: '12 месяцев', value: 12 },
    { label: '24 месяца', value: 24 },
  ];

  protected readonly termSelectPt: SelectPassThrough = {
    root: { class: 'c-investment-buy-form__term-root' },
    label: { class: 'c-investment-buy-form__term-label-value' },
    dropdown: { class: 'c-investment-buy-form__term-dropdown' },
    dropdownIcon: { class: 'c-investment-buy-form__term-dropdown-icon' },
    overlay: { class: 'c-investment-buy-form__term-overlay' },
    list: { class: 'c-investment-buy-form__term-list' },
    option: { class: 'c-investment-buy-form__term-option' },
  };

  updateAmount(value: number): void {
    const normalizedAmount = this.roundToScale(Math.max(0, value), 6);
    const nextShares = Math.floor(normalizedAmount / CInvestmentBuyFormComponent.SHARE_PRICE);

    this.amount.set(normalizedAmount);
    this.shares.set(nextShares);
  }

  updateShares(value: number): void {
    const nextShares = Math.max(0, Math.trunc(value));
    const nextAmount = this.roundToScale(nextShares * CInvestmentBuyFormComponent.SHARE_PRICE, 6);

    this.shares.set(nextShares);
    this.amount.set(nextAmount);
  }

  updateTerm(value: number): void {
    this.termMonths.set(value);
  }

  private roundToScale(value: number, scale: number): number {
    const factor = 10 ** scale;
    return Math.round(value * factor) / factor;
  }
}
