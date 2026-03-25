import { Component, input, output } from '@angular/core';

@Component({
  selector: 'app-c-investment-input-field',
  standalone: true,
  template: `
    <div class="c-investment-input-field">
      <label class="c-investment-input-field__label" [attr.for]="inputId()">{{ label() }}</label>
      @if (suffix()) {
        <div class="c-investment-input-field__split-wrap">
          <input
            class="c-investment-input-field__input c-investment-input-field__input--split"
            type="number"
            [id]="inputId()"
            [value]="value()"
            (input)="onInput($event)" />
          <span class="c-investment-input-field__suffix">{{ suffix() }}</span>
        </div>
      } @else {
        <input
          class="c-investment-input-field__input"
          type="number"
          [id]="inputId()"
          [value]="value()"
          (input)="onInput($event)" />
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

  readonly valueChange = output<number>();

  onInput(event: Event): void {
    const nextValue = Number((event.target as HTMLInputElement).value || 0);
    this.valueChange.emit(nextValue);
  }
}
