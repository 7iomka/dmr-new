import { Component, computed, input, signal } from '@angular/core';

import { CInvestmentInputFieldComponent } from './c-investment-input-field.component';
import { CInvestmentSummaryCardComponent } from './c-investment-summary-card.component';
import { CInvestmentSwitchCardComponent } from './c-investment-switch-card.component';

@Component({
  selector: 'app-c-investment-buy-form',
  standalone: true,
  imports: [CInvestmentInputFieldComponent, CInvestmentSummaryCardComponent, CInvestmentSwitchCardComponent],
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
            (valueChange)="amount.set($event)" />
          <app-c-investment-input-field
            inputId="investment-shares"
            label="Количество долей"
            [value]="shares()"
            (valueChange)="shares.set($event)" />
        </div>

        @if (installmentEnabled()) {
          <label class="c-investment-buy-form__term-wrap" for="investment-term">
            <span class="c-investment-buy-form__term-label">Срок рассрочки</span>
            <select
              class="c-investment-buy-form__term"
              id="investment-term"
              [value]="termMonths()"
              (change)="updateTerm($event)">
              <option value="3">3 месяца</option>
              <option value="6">6 месяцев</option>
              <option value="12">12 месяцев</option>
              <option value="24">24 месяца</option>
            </select>
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
  readonly layout = input<'stacked' | 'split'>('stacked');

  readonly amount = signal(504);
  readonly shares = signal(132806);
  readonly installmentEnabled = signal(false);
  readonly termMonths = signal(12);
  readonly sharePrice = computed(() => '0.003795');

  updateTerm(event: Event): void {
    this.termMonths.set(Number((event.target as HTMLSelectElement).value));
  }
}
