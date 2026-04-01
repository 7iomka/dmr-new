import { CommonModule } from '@angular/common';
import { Component, ElementRef, EventEmitter, inject, Input, Output } from '@angular/core';
import { AbstractControl, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { SelectModule, SelectPassThrough } from 'primeng/select';

export type FormControlSelectOption = Record<string, unknown>;

@Component({
  selector: 'app-form-control-select',
  standalone: true,
  imports: [CommonModule, FormsModule, ReactiveFormsModule, SelectModule],
  template: `
    <div [class]="resolvedRootClass">
      @if (label) {
        <label [class]="resolvedLabelClass" [for]="resolvedInputId">
          {{ label }}
        </label>
      }

      @if (usesFormGroup) {
        <div [class]="resolvedControlClass" [formGroup]="formGroup!">
          <p-select
            [appendTo]="'body'"
            [ariaLabel]="resolvedAriaLabel"
            [class]="resolvedSelectClass"
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
            [panelStyleClass]="resolvedPanelStyleClass"
            [placeholder]="placeholder"
            [pt]="resolvedSelectPt"
            [ptOptions]="{ mergeSections: true, mergeProps: true }"
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
        <div [class]="resolvedControlClass">
          <p-select
            [appendTo]="'body'"
            [ariaLabel]="resolvedAriaLabel"
            [class]="resolvedSelectClass"
            [filter]="filter"
            [filterBy]="filterBy"
            [filterPlaceholder]="filterPlaceholder"
            [inputId]="resolvedInputId"
            [ngModel]="value"
            [optionLabel]="optionLabel"
            [optionValue]="optionValue"
            [options]="options"
            [overlayOptions]="{ autoZIndex: true, baseZIndex: 1200 }"
            [panelStyleClass]="resolvedPanelStyleClass"
            [placeholder]="placeholder"
            [pt]="resolvedSelectPt"
            [ptOptions]="{ mergeSections: true, mergeProps: true }"
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
        <div [class]="resolvedMetaClass">
          {{ metaText }}
        </div>
      }
    </div>
  `,
})
export class FormControlSelectComponent {
  private readonly hostElement = inject(ElementRef<HTMLElement>);

  @Input() formGroup?: FormGroup;
  @Input() controlName?: string;
  @Input() label?: string;
  @Input() ariaLabel?: string;

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

  @Input() rootClass?: string;
  @Input() labelClass?: string;
  @Input() controlClass?: string;
  @Input() selectClass?: string;
  @Input() metaClass?: string;
  @Input() panelStyleClass?: string;
  @Input() pt?: SelectPassThrough;

  protected readonly resolvedSelectPt: SelectPassThrough = {
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

  protected get resolvedAriaLabel(): string | undefined {
    if (this.label) {
      return undefined;
    }

    return (this.ariaLabel ?? this.placeholder) || this.controlName;
  }

  protected get resolvedRootClass(): string {
    return this.joinClasses('c-form-control', this.rootClass);
  }

  protected get resolvedLabelClass(): string {
    return this.joinClasses('c-form-control__label', this.labelClass);
  }

  protected get resolvedControlClass(): string {
    return this.joinClasses('c-form-control__control', this.controlClass);
  }

  protected get resolvedSelectClass(): string {
    return this.joinClasses('c-form-control__select', this.selectClass);
  }

  protected get resolvedMetaClass(): string {
    return this.joinClasses(
      'c-form-control__meta',
      this.metaError ? 'c-form-control__meta--error' : null,
      this.metaClass,
    );
  }

  protected get resolvedPanelStyleClass(): string {
    return this.joinClasses('c-form-control-select__panel', this.panelStyleClass);
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

  private joinClasses(...values: unknown[]): string {
    return values
      .flatMap((value) => (Array.isArray(value) ? value : [value]))
      .filter(
        (value): value is string | number => value !== null && value !== undefined && value !== false && value !== '',
      )
      .map(String)
      .join(' ');
  }

  private escapeAttributeValue(value: string): string {
    return value.replace(/\\/g, '\\\\').replace(/"/g, '\\"');
  }

  private get control(): AbstractControl | null {
    if (!this.formGroup || !this.controlName) {
      return null;
    }

    return this.formGroup.get(this.controlName);
  }
}
