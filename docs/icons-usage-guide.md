# Icons Usage Guide

## Stack

- Angular (standalone)
- PrimeNG
- Tailwind CSS
- TypeScript

---

## Core Principle

The project uses a **strict icon system hierarchy**:

1. **Lucide** → primary icon system (UI icons)
2. **Local brand SVG paths** → fallback for brands/socials
3. **PrimeIcons** → ONLY when strictly required by PrimeNG

No other runtime icon libraries are allowed.

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

Use dynamic icons only when icon is not known at build time.

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

# 2. Secondary Icon System — Local Brand SVG Paths

## Purpose

Use local SVG path data when Lucide does not provide the required brand/platform icon.

This typically applies to:

- social networks
- payment systems
- crypto assets
- company / brand logos
- third-party platforms

---

## Source

There is no installed runtime package for brand/social icons.

When a brand icon is required:

1. Prefer the brand owner's official SVG asset when available.
2. Otherwise use the specific SVG path from Simple Icons as source material.
3. Copy only the needed `path d` data into app code.
4. Keep the copied icon local to the component unless the same icon is reused in multiple places.

Do **not** install or import `@semantic-icons/simple-icons`. Its Angular package prebundles thousands of icons in dev mode and makes Chrome DevTools extremely slow.

---

## Usage: Component-Local Icon Map

```ts
import { Component } from '@angular/core';

@Component({
  standalone: true,
  template: `
    <a aria-label="Telegram" href="https://telegram.org/">
      <svg
        aria-hidden="true"
        class="h-4 w-4"
        fill="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path [attr.d]="brandIconPath('telegram')" />
      </svg>
    </a>
  `,
})
export class ExampleComponent {
  protected brandIconPath(icon: BrandIcon): string {
    return BRAND_ICON_PATHS[icon];
  }
}

type BrandIcon = 'telegram';

const BRAND_ICON_PATHS: Record<BrandIcon, string> = {
  telegram: '...',
};
```

Use this pattern for one-off footer/social/payment logos.

---

## Usage: Shared Registry

If the same brand icon is needed in multiple components, create or extend a small local registry, for example:

```ts
// src/app/shared/icons/brand-icons.ts
export type BrandIconName = 'telegram' | 'instagram' | 'youtube';

export const BRAND_ICON_PATHS: Record<BrandIconName, string> = {
  telegram: '...',
  instagram: '...',
  youtube: '...',
};
```

Only add icons that are actually used by the app.

---

## When to use

Use local brand SVG paths ONLY when:

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
- copy only the exact SVG path(s) needed
- keep path maps typed with a string-literal union
- use `viewBox="0 0 24 24"` unless the source asset requires another viewBox
- use `fill="currentColor"` for monochrome brand icons unless the UI intentionally needs official brand colors
- keep one-off icons local to the component
- create a shared local registry only after reuse appears
- do NOT install `@semantic-icons/simple-icons`
- do NOT mix with other icon libraries
- do NOT use for generic UI icons

---

## Correct Usage Examples

### Brand button

```ts
import { Component } from '@angular/core';
import { ButtonModule } from 'primeng/button';

@Component({
  standalone: true,
  imports: [ButtonModule],
  template: `
    <p-button severity="secondary" variant="outlined">
      <svg class="h-4.5 w-4.5" fill="currentColor" pButtonIcon viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path [attr.d]="brandIconPath('telegram')" />
      </svg>
      <span pButtonLabel>Telegram</span>
    </p-button>
  `,
})
export class ExampleComponent {
  protected brandIconPath(icon: BrandIcon): string {
    return BRAND_ICON_PATHS[icon];
  }
}

type BrandIcon = 'telegram';

const BRAND_ICON_PATHS: Record<BrandIcon, string> = {
  telegram: '...',
};
```

### List item

```ts
import { Component } from '@angular/core';

@Component({
  standalone: true,
  template: `
    <div class="flex items-center gap-2">
      <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path [attr.d]="brandIconPath('github')" />
      </svg>
      <span>GitHub</span>
    </div>
  `,
})
export class ExampleComponent {
  protected brandIconPath(icon: BrandIcon): string {
    return BRAND_ICON_PATHS[icon];
  }
}

type BrandIcon = 'github';

const BRAND_ICON_PATHS: Record<BrandIcon, string> = {
  github: '...',
};
```

---

## ❌ Do NOT

```html
<svg siTelegramIcon></svg>
```

```ts
import { SiTelegramIcon } from '@semantic-icons/simple-icons';
```

Do NOT use local brand SVG paths for:

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
2. Local brand SVG paths (only for brands/socials)
3. PrimeIcons (restricted)

---

# 5. Final Rules

When generating Angular UI:

1. Use `@lucide/angular` by default
2. Prefer static Lucide icons
3. Lucide icons must be imported with the `Lucide` prefix
4. Used icon directives must be added to component `imports`
5. Use dynamic Lucide icons only if required
6. If icon is missing and is brand/social → use a local typed SVG path map
7. Do not install or import `@semantic-icons/simple-icons`
8. Use the `pButtonIcon` helper directive when you define svg icon inside p-button, except some cases when you have to use PrimeNG `#icon` slot
9. Do NOT use PrimeIcons unless required
10. Do NOT create wrapper components
11. Do NOT guess icon names
12. Do NOT introduce new icon libraries

---

## Summary

- Lucide → UI icons
- local brand SVG paths → brands/socials (fallback)
- PrimeIcons → rare edge cases

Strict hierarchy must be preserved.
