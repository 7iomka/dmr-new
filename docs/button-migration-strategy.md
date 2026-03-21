# Button Migration Strategy (PrimeNG + Tailwind)

## Scope and Goal

This document defines a single button strategy for the project foundation during Angular migration.

Goal:
- migrate from legacy `.btn-*` classes;
- use PrimeNG `p-button` as the single source of truth;
- avoid alternative button systems and duplicated APIs.

## Core Principle

Use `p-button` directly:
- visual style → via PrimeNG theme, design tokens, and variables;
- behavior → via PrimeNG input props;
- layout/geometry → via Tailwind utilities and minimal helper classes only when required.

## Canonical Usage

### Primary

```html
<p-button label="Пополнить" />
```

### Secondary / Danger / Info

```html
<p-button label="Кошелёк" severity="secondary" variant="outlined" />
<p-button label="Удалить" severity="danger" variant="outlined" />
<p-button label="Подробнее" severity="info" variant="outlined" />
```

### Small

```html
<p-button label="Сохранить" size="small" />
```

## Icon-Only Buttons

### PrimeIcons

```html
<p-button icon="pi pi-user" [rounded]="true" [text]="true" severity="info" />
```

### Lucide

```ts
import { Copy, LucideAngularModule } from 'lucide-angular';
```

```html
<p-button
  [rounded]="true"
  [text]="true"
  severity="secondary"
  styleClass="p-button-icon-only"
  ariaLabel="Copy"
>
  <lucide-icon [img]="Copy" class="h-4 w-4"></lucide-icon>
</p-button>
```

### Small icon-only

```html
<p-button
  [rounded]="true"
  [text]="true"
  severity="secondary"
  size="small"
  styleClass="p-button-icon-only"
  ariaLabel="Copy"
>
  <lucide-icon [img]="Copy" class="h-3.5 w-3.5"></lucide-icon>
</p-button>
```

## Legacy → PrimeNG Mapping

- `btn-primary` → `<p-button />`
- `btn-secondary` → `<p-button severity="secondary" variant="outlined" />`
- `btn-danger` → `<p-button severity="danger" variant="outlined" />`
- `btn-info` → `<p-button severity="info" variant="outlined" />`
- `btn-sm` → `size="small"`
- `btn-icon` → `styleClass="p-button-icon-only"`
- `btn-sm btn-icon` → `size="small" + styleClass="p-button-icon-only"`
- `btn-narrow` → helper class only if truly needed

## Styling Strategy

### 1) Tokens / Variables first

Configure styling in theme/tokens:
- primary palette (green scale);
- border radius;
- padding + small-size padding;
- font size;
- outlined variant colors;
- hover states;
- focus ring.

### 2) PrimeNG props second

Prefer props over custom CSS:
- `severity`
- `variant`
- `size`
- `rounded`
- `text`
- `loading`
- `disabled`

### 3) Helper classes last (minimal)

```css
@layer components {
  .p-button-narrow {
    @apply !px-2.5;
  }
}
```

## Usage Rules (Mandatory)

1. Do not create new `.btn-*` classes.
2. Do not wrap `p-button` with a custom duplicated button API.
3. Always start with PrimeNG props.
4. Then adjust through theme/tokens.
5. Use helper classes only as a last resort.
6. Do not globally restyle `.p-button` without explicit need.

## Migration Policy

- All new pages must use this strategy.
- While migrating existing pages, replace legacy `.btn-*` usage by the mapping above.
- Secondary, danger, and info styles must be implemented via `severity + variant="outlined"`.
- Small buttons must use `size="small"`.
- Icon-only buttons must support both PrimeIcons and Lucide patterns from this document.

## Acceptance Criteria

- No `.btn-*` usage in migrated pages.
- Only `p-button` is used as the button component.
- Secondary/danger/info rely on `severity` + `variant="outlined"`.
- Small size relies on `size="small"`.
- Icon-only works for PrimeIcons and Lucide.
- Styling is token-driven, not custom class-driven.
- This strategy remains documented and is applied on all newly migrated pages.
