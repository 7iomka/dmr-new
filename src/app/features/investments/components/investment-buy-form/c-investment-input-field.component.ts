import { Component, input, output, ViewEncapsulation } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { InputGroupModule } from 'primeng/inputgroup';
import { InputGroupAddonModule } from 'primeng/inputgroupaddon';
import { InputNumberModule } from 'primeng/inputnumber';

@Component({
  selector: 'app-c-investment-input-field',
  standalone: true,
  encapsulation: ViewEncapsulation.None,
  imports: [FormsModule, InputNumberModule, InputGroupModule, InputGroupAddonModule],
  template: `
    <div class="c-investment-input-field">
      <label class="c-investment-input-field__label" [attr.for]="inputId()">{{ label() }}</label>
      @if (suffix()) {
        <p-inputgroup class="c-investment-input-field__split-wrap">
          <p-inputnumber
            [allowEmpty]="false"
            [id]="inputId()"
            [inputStyleClass]="'c-investment-input-field__input c-investment-input-field__input--split'"
            [locale]="'en-US'"
            [maxFractionDigits]="maxFractionDigits()"
            [minFractionDigits]="minFractionDigits()"
            [ngModel]="value()"
            [useGrouping]="false"
            (ngModelChange)="onValueChange($event)" />
          <span class="c-investment-input-field__suffix">{{ suffix() }}</span>
        </p-inputgroup>
      } @else {
        <p-inputnumber
          [allowEmpty]="false"
          [id]="inputId()"
          [inputStyleClass]="'c-investment-input-field__input'"
          [locale]="'en-US'"
          [maxFractionDigits]="maxFractionDigits()"
          [minFractionDigits]="minFractionDigits()"
          [ngModel]="value()"
          [useGrouping]="false"
          (ngModelChange)="onValueChange($event)" />
      }
    </div>
  `,
  styleUrl: './c-investment-input-field.component.css',
})
export class CInvestmentInputFieldComponent {
  readonly label = input.required<string>();
  readonly value = input.required<number>();
  readonly inputId = input.required<string>();
  readonly suffix = input<string | null>(null);
  readonly minFractionDigits = input(0);
  readonly maxFractionDigits = input(0);

  readonly valueChange = output<number>();

  onValueChange(value: number | null): void {
    const nextValue = Number(value ?? 0);
    this.valueChange.emit(nextValue);
  }
}
