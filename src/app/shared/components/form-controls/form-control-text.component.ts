import { CommonModule } from '@angular/common';
import { Component, Input } from '@angular/core';
import { AbstractControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { LucideDynamicIcon, type LucideIcon } from '@lucide/angular';
import { InputTextModule } from 'primeng/inputtext';
import { FormControlShellComponent } from './form-control-shell.component';
import { FormControlErrorMessages, resolveControlErrorText } from './form-control-errors';
import { createFormControlId } from './form-control-id';

@Component({
  selector: 'app-form-control-text',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule, InputTextModule, LucideDynamicIcon, FormControlShellComponent],
  template: `
    <app-form-control-shell [errorText]="errorText" [inputId]="resolvedInputId" [label]="label" [metaText]="metaText">
      <div class="c-form-control__field" [formGroup]="formGroup">
        @if (icon) {
          <span class="c-form-control__icon-left">
            <svg class="h-4 w-4" [lucideIcon]="icon"></svg>
          </span>
        }

        <input
          class="c-form-control__input"
          pInputText
          [attr.aria-label]="resolvedAriaLabel"
          [attr.autocomplete]="autocomplete"
          [formControlName]="controlName"
          [id]="resolvedInputId"
          [placeholder]="placeholder"
          [type]="type"
          [variant]="variant" />
      </div>
    </app-form-control-shell>
  `,
})
export class FormControlTextComponent {
  @Input({ required: true }) formGroup!: FormGroup;
  @Input({ required: true }) controlName!: string;
  @Input() inputId?: string;
  @Input() label?: string;
  @Input() ariaLabel?: string;
  @Input() type: 'text' | 'email' | 'password' | 'tel' = 'text';
  @Input() variant?: 'filled' | 'outlined';
  @Input() placeholder = '';
  @Input() autocomplete?: string;
  @Input() icon?: LucideIcon;
  @Input() metaText?: string;
  @Input() errorMessages?: FormControlErrorMessages;

  private readonly generatedInputId = createFormControlId();

  protected get resolvedAriaLabel(): string | null {
    if (this.label) {
      return null;
    }

    return (this.ariaLabel ?? this.placeholder) || this.controlName;
  }

  protected get errorText(): string | null {
    return resolveControlErrorText(this.control, this.errorMessages);
  }

  protected get resolvedInputId(): string {
    return this.inputId ?? this.controlName ?? this.generatedInputId;
  }

  private get control(): AbstractControl | null {
    return this.formGroup.get(this.controlName);
  }
}
