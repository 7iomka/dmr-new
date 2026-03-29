import { Component, EventEmitter, Input, Output } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { InputOtpModule } from 'primeng/inputotp';

@Component({
  selector: 'app-form-control-otp',
  standalone: true,
  imports: [FormsModule, InputOtpModule],
  template: `
    <div class="c-form-control c-form-control--otp">
      @if (label) {
        <label class="c-form-control__label" [for]="inputId">{{ label }}</label>
      }
      <p-inputotp
        [ariaLabel]="resolvedAriaLabel"
        [attr.inputId]="inputId"
        [integerOnly]="true"
        [length]="length"
        [name]="name"
        [(ngModel)]="modelValue" />
      @if (metaText) {
        <div class="c-form-control__meta">{{ metaText }}</div>
      }
    </div>
  `,
})
export class FormControlOtpComponent {
  @Input() inputId = 'otp-input';
  @Input() name = 'otp';
  @Input() label?: string;
  @Input() ariaLabel?: string;
  @Input() metaText?: string;
  @Input() length = 6;
  @Input() value = '';
  @Output() readonly valueChange = new EventEmitter<string>();

  get modelValue(): string {
    return this.value;
  }

  set modelValue(nextValue: string) {
    this.value = nextValue;
    this.valueChange.emit(nextValue);
  }

  protected get resolvedAriaLabel(): string {
    return this.ariaLabel ?? this.label ?? 'Код подтверждения';
  }
}
