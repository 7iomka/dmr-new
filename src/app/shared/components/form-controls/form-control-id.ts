let nextFormControlId = 0;

export function createFormControlId(prefix = 'form-control'): string {
  return `${prefix}-${nextFormControlId++}`;
}
