# Button Migration Strategy (PrimeNG + Tailwind + Lucide vNext)

## Scope and Goal

This document defines a single button strategy for the project foundation during Angular migration.

Goal:

- migrate from legacy `.btn-*` classes;
- use PrimeNG `p-button` as the single source of truth;
- use Lucide icons via native Angular standalone API (no wrappers);
- avoid alternative button systems and duplicated APIs.

## Core Principle

Use `p-button` directly:

- visual style → via PrimeNG theme, design tokens, and variables;
- behavior → via PrimeNG input props;
- layout/geometry → via Tailwind utilities and minimal helper classes only when required;
- icons → via PrimeIcons or Lucide static svg API.

---

## NEW: pButton Directive Usage (IMPORTANT)

PrimeNG provides **two ways** to use buttons:

1. `<p-button>` component (preferred for most cases)
2. `[pButton]` directive (for native elements like `<button>` or `<a>`)

Use `[pButton]` when:

- you need `routerLink`
- you need semantic `<a>`
- you integrate into existing markup

---

### Basic Example (Anchor + Router)

```html
<a pButton routerLink="/dashboard">Back to dashboard</a>
```

---

### Passing Props (Directive API)

Unlike `<p-button>`, props are passed as **inputs on the element**:

```html
<a
  pButton
  routerLink="/dashboard"
  severity="secondary"
  outlined
  size="small"
>
  Back to dashboard
</a>
```

Key differences:

- `outlined` → boolean attribute (NOT `variant="outlined"`)
- `text`, `raised`, `rounded`, `plain` → boolean flags
- `size="small" | "large"`
- `severity="primary" | "secondary" | "danger" | "info"`

Source: PrimeNG directive API

---

### Icon + Label (Directive)

```html
<a pButton routerLink="/dashboard" severity="secondary" outlined>
  <svg class="h-4 w-4" lucideChevronLeft pButtonIcon></svg>
  <span pButtonLabel>Back</span>
</a>
```

---

### Icon Only (Directive)

```html
<button pButton text severity="secondary" aria-label="Copy">
  <svg class="h-4 w-4" lucideCopy pButtonIcon></svg>
</button>
```

---

### Loading State

```html
<button pButton [loading]="isLoading">Submit</button>
```

---

### Full Width (Fluid)

```html
<button pButton fluid>Continue</button>
```

---

### PassThrough (Advanced)

Used to inject attributes into internal DOM:

```html
<button
  pButton
  [pButtonPT]="{
    root: { class: 'w-full' }
  }"
>
  Continue
</button>
```

---

### When to Use What

| Case                          | Use          |
| ----------------------------- | ------------ |
| Standard button               | `<p-button>` |
| Router link / anchor          | `[pButton]`  |
| Need full control over markup | `[pButton]`  |
| Simple UI                     | `<p-button>` |

---

## Canonical Usage

### Primary

<p-button label="Пополнить" />

### Secondary / Danger / Info

<p-button label="Кошелёк" severity="secondary" variant="outlined" />
<p-button label="Удалить" severity="danger" variant="outlined" />
<p-button label="Подробнее" severity="info" variant="outlined" />

### Small

<p-button label="Сохранить" size="small" />

## Icon + Label Buttons

### Lucide (CURRENT STANDARD)

Import:
import { LucideCopy } from '@lucide/angular';

Usage:
<p-button [text]="true" severity="secondary" styleClass="p-button-icon-only" ariaLabel="Copy"> <svg class="h-4 w-4" lucideCopy pButtonIcon></svg> <span pButtonLabel>Copy</span> </p-button>

### PrimeIcons (LEGACY, not recommended)

<p-button label="Юзер" icon="pi pi-user" [text]="true" severity="info" />

## Icon-Only Buttons

### Lucide (CURRENT STANDARD)

Import:
import { LucideCopy } from '@lucide/angular';

Usage:
<p-button [text]="true" severity="secondary" styleClass="p-button-icon-only" ariaLabel="Copy"> <svg class="h-4 w-4" lucideCopy pButtonIcon></svg> </p-button>

### PrimeIcons (LEGACY, not recommended)

<p-button icon="pi pi-user" [text]="true" severity="info" />

## Lucide Usage Rules

- Static icons preferred
- Attribute must be lowerCamelCase (lucideChevronRight)
- Dynamic icons only when necessary
- Do NOT use <lucide-icon> or legacy API
- Use pButtonIcon directive
- For more details, see `./icons-usage-guide.md`

## Legacy → PrimeNG Mapping

- btn-primary → <p-button />
- btn-secondary → severity="secondary" variant="outlined"
- btn-danger → severity="danger" variant="outlined"
- btn-info → severity="info" variant="outlined"
- btn-sm → size="small"
- btn-icon → styleClass="p-button-icon-only" and use svg with pButtonIcon directive

## Styling Strategy

1. Tokens first
2. PrimeNG props
3. Minimal helper classes

## Usage Rules

- No new .btn-\* classes
- No wrapper components
- Start with PrimeNG props
- Then tokens
- Helpers last

## Migration Policy

- All new pages must follow this strategy
- Replace all legacy buttons
- Use static Lucide icons

## Acceptance Criteria

- No .btn-\* usage
- Only p-button used
- Lucide uses static API
- Token-based styling
