# Icons Usage Guide

## Stack

- Angular (standalone)
- PrimeNG
- Tailwind CSS
- TypeScript

---

## 🎯 Core Principle

The project uses a **strict icon system hierarchy**:

1. **Lucide** → primary icon system (UI icons)
2. **semantic-icons (Simple Icons)** → fallback for brands/socials
3. **PrimeIcons** → ONLY when strictly required by PrimeNG

No other icon libraries are allowed.

---

# 1. Primary Icon System — Lucide

## Library

```ts
import { LucideAngularModule, LucidePlus, LucideX, LucideChevronRight } from '@lucide/angular';
```

---

## Usage

### Static icons (preferred)

```ts
import { LucidePlus } from '@lucide/angular';

@Component({
  standalone: true,
  imports: [LucidePlus],
})
export class ExampleComponent {}
```

```html
<svg lucidePlus class="h-4 w-4"></svg>
```

---

### Dynamic icons (only when necessary)

```ts
import { LucideDynamicIcon, LucideIconData } from '@lucide/angular';

@Component({
  standalone: true,
  imports: [LucideDynamicIcon],
})
export class ExampleComponent {
  icon: LucideIconData | null = null;
}
```

```html
<lucide-icon [img]="icon"></lucide-icon>
```

⚠️ Use dynamic icons only when icon is not known at build time.

---

## Styling

Use Tailwind classes only:

```html
<svg lucidePlus class="h-4 w-4 text-surface-500"></svg>
```

Rules:

- size → `h-* w-*`
- color → `text-*`
- do NOT use inline styles

---

## Rules

- import icons individually from `@lucide/angular`
- Lucide icons must use the `Lucide` prefix in TypeScript imports
- add used icons to component `imports`
- when using `[lucideIcon]`, you must import `LucideDynamicIcon` and add it to component `imports`
- do not add static Lucide icons to component `imports` unless the template uses their directive directly (for example `lucideChevronRight`)
- do NOT import the whole icon set
- do NOT wrap Lucide in custom components
- do NOT use `<i>` tags

---

## Correct Usage Examples

### Button

```ts
import { Component } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { LucidePlus } from '@lucide/angular';

@Component({
  standalone: true,
  imports: [ButtonModule, LucidePlus],
  template: `
    <p-button>
      <svg lucidePlus class="h-4 w-4" pButtonIcon></svg>
      <span pButtonLabel>Add</span>
    </p-button>
  `,
})
export class ExampleComponent {}
```

### Icon-only button

```ts
import { Component } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { LucideX } from '@lucide/angular';

@Component({
  standalone: true,
  imports: [ButtonModule, LucideX],
  template: `
    <p-button severity="secondary" size="small" styleClass="p-button-icon-only">
      <svg lucideX class="h-4 w-4" pButtonIcon></svg>
    </p-button>
  `,
})
export class ExampleComponent {}
```

---

## ❌ Do NOT

```html
<i class="pi pi-plus"></i>
```

```ts
import * as icons from '@lucide/angular';
```

```ts
import { Plus } from '@lucide/angular';
```

---

# 2. Secondary Icon System — semantic-icons (Simple Icons)

## Purpose

Use `@semantic-icons/simple-icons` **only when Lucide does not provide the required icon**.

This typically applies to:

- social networks
- payment systems
- crypto assets
- company / brand logos
- third-party platforms

---

## Library

```ts
import { SiGithubIcon } from '@semantic-icons/simple-icons';
```

---

## Usage

```ts
import { Component } from '@angular/core';
import { SiGithubIcon } from '@semantic-icons/simple-icons';

@Component({
  standalone: true,
  imports: [SiGithubIcon],
})
export class ExampleComponent {}
```

```html
<svg siGithubIcon class="h-4 w-4"></svg>
```

---

## Naming Convention

- TypeScript import: `SiGithubIcon`
- Template usage: `siGithubIcon`

Rules:

- prefix → `Si`
- suffix → `Icon`
- template → lowerCamelCase

---

## When to use

Use semantic-icons ONLY when:

- icon is brand-specific
- icon is not available in Lucide
- UI requires recognizable brand identity

Examples:

- Telegram
- YouTube
- Instagram
- Facebook
- X / Twitter
- LinkedIn
- GitHub
- Binance
- Stripe
- PayPal
- Visa / Mastercard
- Bitcoin / Ethereum

---

## Rules

- fallback only — Lucide is still primary
- import icons individually
- add used icons to component `imports`
- do NOT wrap in custom components
- do NOT mix with other icon libraries
- do NOT use for generic UI icons

---

## Correct Usage Examples

### Brand button

```ts
import { Component } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { SiTelegramIcon } from '@semantic-icons/simple-icons';

@Component({
  standalone: true,
  imports: [ButtonModule, SiTelegramIcon],
  template: `
    <p-button severity="secondary" variant="outlined">
      <svg siTelegramIcon class="h-4.5 w-4.5" pButtonIcon></svg>
      <span pButtonLabel>Telegram</span>
    </p-button>
  `,
})
export class ExampleComponent {}
```

### List item

```ts
import { Component } from '@angular/core';
import { SiGithubIcon } from '@semantic-icons/simple-icons';

@Component({
  standalone: true,
  imports: [SiGithubIcon],
  template: `
    <div class="flex items-center gap-2">
      <svg siGithubIcon class="h-4 w-4"></svg>
      <span>GitHub</span>
    </div>
  `,
})
export class ExampleComponent {}
```

---

## ❌ Do NOT

```html
<svg siChevronRightIcon></svg>
```

Do NOT use semantic-icons for:

- arrows
- navigation
- UI controls
- system icons

---

# 3. PrimeIcons (Restricted Use)

## Rule

PrimeIcons are **NOT allowed by default**.

Use ONLY when:

- PrimeNG component strictly requires it
- no alternative exists

---

## Example

```html
<i class="pi pi-search"></i>
```

---

# 4. Priority Order

1. Lucide
2. semantic-icons (only for brands/socials)
3. PrimeIcons (restricted)

---

# 5. Final Rules

When generating Angular UI:

1. Use `@lucide/angular` by default
2. Prefer static Lucide icons
3. Lucide icons must be imported with the `Lucide` prefix
4. Used icon directives must be added to component `imports`
5. Use dynamic Lucide icons only if required
6. If icon is missing and is brand/social → use `@semantic-icons/simple-icons`
7. semantic-icons must also be added to component `imports`
8. Use the `pButtonIcon` helper directive when you define svg icon inside p-button, except some cases when you have to use PrimeNG `#icon` slot
9. Do NOT use PrimeIcons unless required
10. Do NOT create wrapper components
11. Do NOT guess icon names
12. Do NOT introduce new icon libraries

---

## Summary

- Lucide → UI icons
- semantic-icons → brands/socials (fallback)
- PrimeIcons → rare edge cases

Strict hierarchy must be preserved.
