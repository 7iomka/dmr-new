import { Component, EventEmitter, Input, Output } from '@angular/core';
import { AbstractControl, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { InputOtpModule } from 'primeng/inputotp';

import { FormControlErrorMessages, resolveControlErrorText } from './form-control-errors';
import { FormControlShellComponent } from './form-control-shell.component';

@Component({
  selector: 'app-form-control-otp',
  standalone: true,
  imports: [FormsModule, ReactiveFormsModule, InputOtpModule, FormControlShellComponent],
  template: `
    <app-form-control-shell
      [errorText]="errorText"
      [inputId]="inputId"
      [label]="label"
      [metaText]="metaText"
      [rootClass]="center ? 'c-input-otp c-input-otp--center' : 'c-input-otp'">
      @if (usesFormGroup) {
        <div [formGroup]="formGroup!">
          <p-inputotp
            styleClass="c-form-control__input c-input-otp__field"
            [ariaLabel]="resolvedAriaLabel"
            [attr.inputId]="inputId"
            [formControlName]="controlName!"
            [integerOnly]="true"
            [length]="length"
            [name]="name"
            [variant]="variant" />
        </div>
      } @else {
        <p-inputotp
          styleClass="c-form-control__input c-input-otp__field"
          [ariaLabel]="resolvedAriaLabel"
          [attr.inputId]="inputId"
          [integerOnly]="true"
          [length]="length"
          [name]="name"
          [variant]="variant"
          [(ngModel)]="modelValue" />
      }
    </app-form-control-shell>
  `,
})
export class FormControlOtpComponent {
  @Input() inputId = 'otp-input';
  @Input() name = 'otp';
  @Input() label?: string;
  @Input() ariaLabel?: string;
  @Input() metaText?: string;
  @Input() formGroup?: FormGroup;
  @Input() controlName?: string;
  @Input() errorMessages?: FormControlErrorMessages;
  @Input() variant?: 'filled' | 'outlined';
  @Input() length = 6;
  @Input() value = '';
  @Input() center = false;
  @Output() readonly valueChange = new EventEmitter<string>();

  get modelValue(): string {
    return this.value;
  }

  set modelValue(nextValue: string) {
    this.value = nextValue;
    this.valueChange.emit(nextValue);
  }

  protected get usesFormGroup(): boolean {
    return !!this.formGroup && !!this.controlName;
  }

  protected get resolvedAriaLabel(): string {
    return this.ariaLabel ?? this.label ?? 'Код подтверждения';
  }

  protected get errorText(): string | null {
    return resolveControlErrorText(this.control, this.errorMessages);
  }

  private get control(): AbstractControl | null {
    if (!this.formGroup || !this.controlName) {
      return null;
    }

    return this.formGroup.get(this.controlName);
  }
}
