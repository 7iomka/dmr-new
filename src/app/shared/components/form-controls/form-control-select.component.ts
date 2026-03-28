import { CommonModule } from '@angular/common';
import { Component, EventEmitter, Input, Output } from '@angular/core';
import { AbstractControl, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { SelectModule, SelectPassThrough } from 'primeng/select';

export type FormControlSelectOption = Record<string, unknown>;

@Component({
  selector: 'app-form-control-select',
  standalone: true,
  imports: [CommonModule, FormsModule, ReactiveFormsModule, SelectModule],
  template: `
    <div class="c-form-control">
      <label class="c-form-control__label" [for]="resolvedInputId">{{ label }}</label>

      @if (usesFormGroup) {
        <div class="c-form-control__control" [formGroup]="formGroup!">
          <p-select
            class="c-form-control__select"
            [appendTo]="'body'"
            [filter]="filter"
            [filterBy]="filterBy"
            [filterPlaceholder]="filterPlaceholder"
            [formControlName]="controlName!"
            [inputId]="resolvedInputId"
            [invalid]="isInvalid"
            [optionLabel]="optionLabel"
            [optionValue]="optionValue"
            [options]="options"
            [overlayOptions]="{ autoZIndex: true, baseZIndex: 1200 }"
            [panelStyleClass]="panelStyleClass"
            [placeholder]="placeholder"
            [pt]="selectPt"
            [showClear]="showClear">
            <ng-template #selectedItem let-item>
              @if (item) {
                <div class="c-form-control-select__value">
                  {{ getLabel(item) }}
                </div>
              }
            </ng-template>

            <ng-template #item let-item>
              <div class="c-form-control-select__option-content">
                {{ getLabel(item) }}
              </div>
            </ng-template>
          </p-select>
        </div>
      } @else {
        <div class="c-form-control__control">
          <p-select
            class="c-form-control__select"
            [appendTo]="'body'"
            [filter]="filter"
            [filterBy]="filterBy"
            [filterPlaceholder]="filterPlaceholder"
            [inputId]="resolvedInputId"
            [ngModel]="value"
            [optionLabel]="optionLabel"
            [optionValue]="optionValue"
            [options]="options"
            [overlayOptions]="{ autoZIndex: true, baseZIndex: 1200 }"
            [panelStyleClass]="panelStyleClass"
            [placeholder]="placeholder"
            [pt]="selectPt"
            [showClear]="showClear"
            (ngModelChange)="onValueChange($event)">
            <ng-template #selectedItem let-item>
              @if (item) {
                <div class="c-form-control-select__value">
                  {{ getLabel(item) }}
                </div>
              }
            </ng-template>

            <ng-template #item let-item>
              <div class="c-form-control-select__option-content">
                {{ getLabel(item) }}
              </div>
            </ng-template>
          </p-select>
        </div>
      }

      @if (metaText) {
        <div class="c-form-control__meta" [class.c-form-control__meta--error]="metaError">
          {{ metaText }}
        </div>
      }
    </div>
  `,
})
export class FormControlSelectComponent {
  @Input() formGroup?: FormGroup;
  @Input() controlName?: string;
  @Input({ required: true }) label!: string;

  @Input() value: unknown;
  @Output() readonly valueChange = new EventEmitter<unknown>();

  @Input() inputId?: string;

  @Input() options: FormControlSelectOption[] = [];
  @Input() optionLabel = 'label';
  @Input() optionValue?: string;

  @Input() placeholder = '';
  @Input() metaText?: string;
  @Input() metaError = false;

  @Input() filter = false;
  @Input() filterBy = 'label';
  @Input() filterPlaceholder = 'Поиск...';
  @Input() showClear = false;

  @Input() panelStyleClass = 'c-form-control-select__panel';

  protected readonly selectPt: SelectPassThrough = {
    root: { class: 'c-form-control-select__root' },
    label: { class: 'c-form-control-select__label' },
    dropdown: { class: 'c-form-control-select__trigger' },
    dropdownIcon: { class: 'c-form-control-select__icon' },
    clearIcon: { class: 'c-form-control-select__clear-icon' },
    header: { class: 'c-form-control-select__header' },
    listContainer: { class: 'c-form-control-select__list-container' },
    list: { class: 'c-form-control-select__list' },
    option: { class: 'c-form-control-select__option' },
    emptyMessage: { class: 'c-form-control-select__empty' },
    pcFilter: {
      root: { class: 'c-form-control-select__filter' },
    },
  };

  protected get usesFormGroup(): boolean {
    return !!this.formGroup && !!this.controlName;
  }

  protected get isInvalid(): boolean {
    const control = this.control;
    return !!control && control.invalid && (control.touched || control.dirty);
  }

  protected get resolvedInputId(): string {
    return this.inputId ?? this.controlName ?? 'form-control-select';
  }

  protected getLabel(option: unknown): string {
    if (option === null) {
      return '';
    }

    if (typeof option === 'string' || typeof option === 'number') {
      return String(option);
    }

    if (typeof option === 'object') {
      const value = (option as Record<string, unknown>)[this.optionLabel];
      return value === null ? '' : String(value);
    }

    return '';
  }

  protected onValueChange(nextValue: unknown): void {
    this.value = nextValue;
    this.valueChange.emit(nextValue);
  }

  private get control(): AbstractControl | null {
    if (!this.formGroup || !this.controlName) {
      return null;
    }

    return this.formGroup.get(this.controlName);
  }
}
