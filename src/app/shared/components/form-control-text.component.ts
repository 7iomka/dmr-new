import { CommonModule } from '@angular/common';
import { Component, Input } from '@angular/core';
import { FormGroup, ReactiveFormsModule } from '@angular/forms';
import { LucideDynamicIcon, type LucideIcon } from '@lucide/angular';
import { InputTextModule } from 'primeng/inputtext';

@Component({
  selector: 'app-form-control-text',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule, InputTextModule, LucideDynamicIcon],
  template: `
    <div class="c-form-control">
      <label class="c-form-control__label" [for]="controlName">{{ label }}</label>
      <div class="c-form-control__control" [formGroup]="formGroup">
        @if (icon) {
          <span class="c-form-control__icon-left">
            <svg class="h-4 w-4" [lucideIcon]="icon"></svg>
          </span>
        }

        <input
          class="c-form-control__input"
          pInputText
          [attr.autocomplete]="autocomplete"
          [formControlName]="controlName"
          [id]="controlName"
          [placeholder]="placeholder"
          [type]="type" />
      </div>
    </div>
  `,
})
export class FormControlTextComponent {
  @Input({ required: true }) formGroup!: FormGroup;
  @Input({ required: true }) controlName!: string;
  @Input({ required: true }) label!: string;
  @Input() type: 'text' | 'email' | 'password' | 'tel' = 'text';
  @Input() placeholder = '';
  @Input() autocomplete?: string;
  @Input() icon?: LucideIcon;
}
