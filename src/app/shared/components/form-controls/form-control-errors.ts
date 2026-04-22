import { AbstractControl, ValidationErrors } from '@angular/forms';

export type FormControlErrorMessages = Partial<Record<string, string>>;

export function shouldShowControlError(control: AbstractControl | null): boolean {
  return !!control && control.invalid && (control.touched || control.dirty);
}

export function resolveControlErrorText(
  control: AbstractControl | null,
  errorMessages?: FormControlErrorMessages,
): string | null {
  if (!shouldShowControlError(control) || !control?.errors) {
    return null;
  }

  const entries = Object.entries(control.errors) as [string, ValidationErrors[string]][];
  const [firstKey, firstValue] = entries[0] ?? [];

  if (!firstKey) {
    return null;
  }

  if (errorMessages?.[firstKey]) {
    return errorMessages[firstKey] ?? null;
  }

  switch (firstKey) {
    case 'required':
      return 'Поле обязательно для заполнения.';
    case 'email':
      return 'Введите корректный email.';
    case 'minlength':
      return `Минимальная длина: ${typeof firstValue === 'object' && firstValue ? ((firstValue as { requiredLength?: number }).requiredLength ?? 0) : 0}.`;
    case 'maxlength':
      return `Максимальная длина: ${typeof firstValue === 'object' && firstValue ? ((firstValue as { requiredLength?: number }).requiredLength ?? 0) : 0}.`;
    case 'pattern':
      return 'Значение имеет неверный формат.';
    default:
      return 'Проверьте корректность заполнения поля.';
  }
}
