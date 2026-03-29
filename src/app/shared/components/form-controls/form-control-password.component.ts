import { CommonModule } from '@angular/common';
import { Component, Input } from '@angular/core';
import { FormGroup, ReactiveFormsModule } from '@angular/forms';
import { LucideDynamicIcon, LucideEye, LucideEyeOff, type LucideIcon } from '@lucide/angular';
import { InputTextModule } from 'primeng/inputtext';

@Component({
  selector: 'app-form-control-password',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule, InputTextModule, LucideDynamicIcon, LucideEye, LucideEyeOff],
  template: `
    <div class="c-form-control">
      @if (label) {
        <label class="c-form-control__label" [for]="controlName">{{ label }}</label>
      }
      <div class="c-form-control__control" [formGroup]="formGroup">
        @if (icon) {
          <span class="c-form-control__icon-left">
            <svg class="h-4 w-4" [lucideIcon]="icon"></svg>
          </span>
        }

        <input
          class="c-form-control__input c-form-control__input--password"
          pInputText
          [attr.aria-label]="resolvedAriaLabel"
          [attr.autocomplete]="autocomplete"
          [formControlName]="controlName"
          [id]="controlName"
          [placeholder]="placeholder"
          [type]="isVisible ? 'text' : 'password'" />

        <button
          class="c-form-control__icon-btn"
          type="button"
          [attr.aria-label]="isVisible ? 'Скрыть пароль' : 'Показать пароль'"
          (click)="toggleVisibility()">
          @if (isVisible) {
            <svg class="h-4 w-4" lucideEyeOff></svg>
          } @else {
            <svg class="h-4 w-4" lucideEye></svg>
          }
        </button>
      </div>

      @if (showStrength) {
        <div class="c-password-strength">
          <div class="c-password-strength__bars">
            @for (bar of [0, 1, 2, 3]; track bar) {
              <span class="c-password-strength__bar" [class.is-active]="bar < activeBars"></span>
            }
          </div>
          <div class="c-password-strength__rules">
            @for (rule of ruleStates; track rule.key) {
              <div class="c-password-strength__rule" [class.is-ok]="rule.ok">{{ rule.label }}</div>
            }
          </div>
        </div>
      }
    </div>
  `,
})
export class FormControlPasswordComponent {
  @Input({ required: true }) formGroup!: FormGroup;
  @Input({ required: true }) controlName!: string;
  @Input() label?: string;
  @Input() ariaLabel?: string;
  @Input() placeholder = '';
  @Input() autocomplete = 'new-password';
  @Input() icon?: LucideIcon;
  @Input() showStrength = false;

  protected isVisible = false;

  protected get passwordValue(): string {
    const value = this.formGroup.get(this.controlName)?.value;
    return typeof value === 'string' ? value : '';
  }

  protected get ruleStates(): { key: string; label: string; ok: boolean }[] {
    const value = this.passwordValue;

    return [
      { key: 'min', label: 'Не менее 8 символов', ok: value.length >= 8 },
      { key: 'max', label: 'Не более 16 символов', ok: value.length <= 16 && value.length > 0 },
      { key: 'upper', label: 'Одна прописная буква', ok: /[A-ZА-ЯЁ]/.test(value) },
      { key: 'lower', label: 'Одна строчная буква', ok: /[a-zа-яё]/.test(value) },
      { key: 'digit', label: 'Одна цифра', ok: /\d/.test(value) },
      { key: 'special', label: 'Один специальный символ', ok: /[^A-Za-zА-Яа-яЁё0-9]/.test(value) },
    ];
  }

  protected get activeBars(): number {
    if (!this.passwordValue) {
      return 0;
    }

    const passedCount = this.ruleStates.filter((rule) => rule.ok).length;
    return Math.ceil((passedCount / this.ruleStates.length) * 4);
  }

  protected toggleVisibility(): void {
    this.isVisible = !this.isVisible;
  }

  protected get resolvedAriaLabel(): string | null {
    if (this.label) {
      return null;
    }

    return (this.ariaLabel ?? this.placeholder) || this.controlName;
  }
}
