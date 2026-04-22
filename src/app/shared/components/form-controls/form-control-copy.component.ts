import { CommonModule } from '@angular/common';
import { ChangeDetectionStrategy, Component, DestroyRef, inject, Input, signal } from '@angular/core';
import { LucideCheck, LucideCopy, LucideDynamicIcon, type LucideIcon } from '@lucide/angular';
import { ButtonModule } from 'primeng/button';
import { MessageService } from 'primeng/api';

import { FormControlShellComponent } from './form-control-shell.component';
import { InputText } from 'primeng/inputtext';

@Component({
  selector: 'app-form-control-copy',
  standalone: true,
  imports: [
    CommonModule,
    ButtonModule,
    LucideDynamicIcon,
    LucideCopy,
    LucideCheck,
    FormControlShellComponent,
    InputText,
  ],
  template: `
    <app-form-control-shell
      [controlClass]="resolvedControlClass"
      [errorText]="errorText"
      [inputId]="inputId"
      [label]="label"
      [labelClass]="labelClass"
      [labelMode]="labelMode"
      [labelVariant]="labelVariant"
      [metaText]="metaText"
      [rootClass]="rootClass">
      <div class="c-copy-control__box" pInputText [class]="resolvedBoxClass" [variant]="variant">
        @if (icon) {
          <svg class="c-copy-control__icon" [class]="iconClass" [lucideIcon]="icon"></svg>
        }

        @if (code) {
          <code class="c-copy-control__value" [class]="resolvedValueClass" [title]="displayValue || value">
            {{ displayValue || value }}
          </code>
        } @else {
          <span class="c-copy-control__value" [class]="resolvedValueClass" [title]="displayValue || value">
            {{ displayValue || value }}
          </span>
        }

        <button
          pButton
          severity="secondary"
          size="small"
          type="button"
          [attr.aria-label]="copied() ? copiedAriaLabel : copyAriaLabel"
          [class]="resolvedActionClass"
          [outlined]="buttonOutlined"
          [raised]="buttonRaised"
          [text]="buttonText"
          (click)="copyValue()">
          @if (copied()) {
            <svg class="h-4 w-4 text-primary" lucideCheck pButtonIcon></svg>
          } @else {
            <svg class="h-4 w-4" lucideCopy pButtonIcon></svg>
          }
        </button>
      </div>
    </app-form-control-shell>
  `,
  changeDetection: ChangeDetectionStrategy.OnPush,
})
export class FormControlCopyComponent {
  private readonly destroyRef = inject(DestroyRef);
  private readonly messageService = inject(MessageService, { optional: true });

  @Input() label?: string;
  @Input() inputId?: string;
  @Input() labelMode: 'for' | 'static' = 'static';
  @Input() labelVariant?: 'section' | undefined;

  @Input() variant?: 'filled' | 'outlined';

  @Input({ required: true }) value = '';
  @Input() displayValue?: string;

  @Input() metaText?: string;
  @Input() errorText?: string | null;

  @Input() icon?: LucideIcon;
  @Input() valueOverflow: 'truncate' | 'scroll' = 'truncate';
  @Input() code = false;

  @Input() copyAriaLabel = 'Скопировать';
  @Input() copiedAriaLabel = 'Скопировано';
  @Input() copiedToastSummary = 'Скопировано';
  @Input() copiedToastDetail?: string;
  @Input() showToast = true;
  @Input() successDuration = 2000;

  @Input() rootClass?: string;
  @Input() labelClass?: string;
  @Input() controlClass?: string;
  @Input() boxClass?: string;
  @Input() iconClass?: string;
  @Input() valueClass?: string;
  @Input() actionClass?: string;

  @Input() buttonText = false;
  @Input() buttonRaised = true;
  @Input() buttonOutlined = false;

  protected readonly copied = signal(false);

  private resetTimer: ReturnType<typeof setTimeout> | null = null;

  protected get resolvedControlClass(): string {
    return this.joinClasses('c-copy-control', this.controlClass);
  }

  protected get resolvedBoxClass(): string {
    return this.joinClasses(this.boxClass);
  }

  protected get resolvedValueClass(): string {
    return this.joinClasses(
      this.valueOverflow === 'scroll'
        ? ['c-copy-control__value--scroll', 'no-scrollbar']
        : 'c-copy-control__value--truncate',
      this.valueClass,
    );
  }

  protected get resolvedActionClass(): string {
    return this.joinClasses('p-button-icon-only', this.actionClass);
  }

  protected async copyValue(): Promise<void> {
    if (!this.value) {
      return;
    }

    const copiedSuccessfully = await this.writeToClipboard(this.value);
    if (!copiedSuccessfully) {
      return;
    }

    this.copied.set(true);

    if (this.showToast && this.messageService) {
      this.messageService.add({
        severity: 'success',
        summary: this.copiedToastSummary,
        detail: this.copiedToastDetail,
      });
    }

    if (this.resetTimer) {
      clearTimeout(this.resetTimer);
    }

    this.resetTimer = setTimeout(() => {
      this.copied.set(false);
      this.resetTimer = null;
    }, this.successDuration);

    this.destroyRef.onDestroy(() => {
      if (this.resetTimer) {
        clearTimeout(this.resetTimer);
      }
    });
  }

  private async writeToClipboard(text: string): Promise<boolean> {
    try {
      if (navigator.clipboard?.writeText) {
        await navigator.clipboard.writeText(text);
        return true;
      }

      const textarea = document.createElement('textarea');
      textarea.value = text;
      textarea.setAttribute('readonly', '');
      textarea.style.position = 'fixed';
      textarea.style.opacity = '0';
      textarea.style.pointerEvents = 'none';

      document.body.appendChild(textarea);
      textarea.select();
      const success = document.execCommand('copy');
      document.body.removeChild(textarea);

      return success;
    } catch {
      return false;
    }
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
