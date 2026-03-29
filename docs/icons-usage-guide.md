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
import { LucideAngularModule, Plus, X, ChevronRight } from 'lucide-angular';
```

---

## Usage

### Static icons (preferred)

```ts
import { Plus } from 'lucide-angular';
```

```html
<svg lucidePlus class="h-4 w-4"></svg>
```

---

### Dynamic icons (only when necessary)

```ts
import { LucideAngularModule } from 'lucide-angular';
```

```html
<lucide-icon [name]="iconName"></lucide-icon>
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

- import icons individually
- do NOT import the whole icon set
- do NOT wrap Lucide in custom components
- do NOT use `<i>` tags

---

## Correct Usage Examples

### Button

```html
<p-button>
  <svg lucidePlus class="h-4 w-4" pButtonIcon></svg>
  <span pButtonLabel>Add</span>
</p-button>
```

### Icon-only button

```html
<p-button severity="secondary" size="small" styleClass="p-button-icon-only">
  <svg lucideX class="h-4 w-4" pButtonIcon></svg>
</p-button>
```

---

## ❌ Do NOT

```html
<i class="pi pi-plus"></i>
```

```ts
import * as icons from 'lucide-angular';
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
- do NOT wrap in custom components
- do NOT mix with other icon libraries
- do NOT use for generic UI icons

---

## Correct Usage Examples

### Brand button

```html
<p-button severity="secondary" variant="outlined">
  <svg siTelegramIcon class="h-4.5 w-4.5" pButtonIcon></svg>
  <span pButtonLabel>Telegram</span>
</p-button>
```

### List item

```html
<div class="flex items-center gap-2">
  <svg siGithubIcon class="h-4 w-4"></svg>
  <span>GitHub</span>
</div>
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
<p-inputtext>
  <i class="pi pi-search"></i>
</p-inputtext>
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
3. Use dynamic Lucide icons only if required
4. If icon is missing and is brand/social → use `@semantic-icons/simple-icons`
5. Use the `pButtonIcon` helper directive when you define svg icon inside p-button, except some cases when you have to use PrimeNG `#icon` slot
6. Do NOT use PrimeIcons unless required
7. Do NOT create wrapper components
8. Do NOT guess icon names
9. Do NOT introduce new icon libraries

---

## Summary

- Lucide → UI icons
- semantic-icons → brands/socials (fallback)
- PrimeIcons → rare edge cases

Strict hierarchy must be preserved.
