import { AutoFocus } from 'primeng/autofocus';
/**
 * Temp workaround. See: https://github.com/primefaces/primeng/issues/18795#issuecomment-3768081008
 */
export function patchPrimeNgAutoFocus(): void {
  const originalAutoFocus = AutoFocus.prototype.autoFocus;
  const originalAfterContentChecked = AutoFocus.prototype.onAfterContentChecked;
  const originalAfterViewChecked = AutoFocus.prototype.onAfterViewChecked;

  AutoFocus.prototype.onAfterContentChecked = function (this: AutoFocus) {
    if (this.autofocus !== true) {
      this.host?.nativeElement?.removeAttribute?.('autofocus');
      this.focused = true;
      return;
    }

    return originalAfterContentChecked?.call(this);
  };

  AutoFocus.prototype.onAfterViewChecked = function (this: AutoFocus) {
    if (this.autofocus !== true) {
      this.focused = true;
      return;
    }

    return originalAfterViewChecked?.call(this);
  };

  AutoFocus.prototype.autoFocus = function (this: AutoFocus) {
    if (this.autofocus !== true) {
      this.host?.nativeElement?.removeAttribute?.('autofocus');
      this.focused = true;
      return;
    }

    return originalAutoFocus?.call(this);
  };
}
