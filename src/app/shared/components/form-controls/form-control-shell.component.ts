import { CommonModule } from '@angular/common';
import { Component, Input } from '@angular/core';
import { Message } from 'primeng/message';

let nextUniqueId = 0;

@Component({
  selector: 'app-form-control-shell',
  standalone: true,
  imports: [CommonModule, Message],
  template: `
    <div [class]="resolvedRootClass">
      @if (label) {
        @if (labelMode === 'for') {
          <label [attr.for]="resolvedInputId" [class]="resolvedLabelClass">
            {{ label }}
          </label>
        } @else {
          <div [class]="resolvedLabelClass">
            {{ label }}
          </div>
        }
      }

      <div [class]="resolvedControlClass">
        <ng-content />
      </div>

      @if (metaText) {
        <div [class]="resolvedMetaClass">
          {{ metaText }}
        </div>
      }

      @if (errorText) {
        <p-message severity="error" size="small" variant="simple">
          {{ errorText }}
        </p-message>
      }
    </div>
  `,
})
export class FormControlShellComponent {
  @Input() label?: string;
  @Input() inputId?: string;
  @Input() labelMode: 'for' | 'static' = 'for';

  @Input() metaText?: string;
  @Input() errorText?: string | null;

  @Input() rootClass?: string;
  @Input() labelClass?: string;
  @Input() controlClass?: string;
  @Input() metaClass?: string;
  @Input() labelVariant?: 'section' | undefined;

  private readonly generatedInputId = `form-control-${nextUniqueId++}`;

  protected get resolvedInputId(): string {
    return this.inputId ?? this.generatedInputId;
  }

  protected get resolvedRootClass(): string {
    return this.joinClasses('c-form-control', this.rootClass);
  }

  protected get resolvedLabelClass(): string {
    return this.joinClasses(
      'c-form-control__label',
      this.labelVariant === 'section' && 'c-form-control__label--section',
      this.labelClass,
    );
  }
  protected get resolvedControlClass(): string {
    return this.joinClasses('c-form-control__control', this.controlClass);
  }

  protected get resolvedMetaClass(): string {
    return this.joinClasses('c-form-control__meta', this.metaClass);
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
}
