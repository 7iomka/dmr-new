# Icons Usage Guide (Lucide + PrimeNG + Angular)

## Goal

Define a **strict, unified, LLM-friendly icon strategy** for the project.

This guide is mandatory for all new and migrated Angular UI.

---

## 🔴 Core Principles

* Lucide is the **primary icon system**
* Always use `@lucide/angular`
* Static icons are the **default**
* Dynamic icons are used **only when required by data/config**
* PrimeIcons are **NOT used** unless strictly required by PrimeNG API

---

## Installation / Import

```ts
import { LucideBell } from '@lucide/angular';
```

❌ NEVER use:

* `lucide-angular`
* `<lucide-icon>` component
* legacy APIs

---

## 🔴 PRIMARY RULE

* ✅ Static icons by default
* ⚠️ Dynamic icons only when necessary
* ❌ Do NOT guess icon names
* ❌ Do NOT create custom wrappers

---

# 1. Static Icons (DEFAULT)

## When to use

Use static icons when:

* icon is known at development time
* icon does not depend on data
* button/header/card uses fixed icon

---

## Import

```ts
import { LucideBell } from '@lucide/angular';
```

---

## Component

```ts
@Component({
  standalone: true,
  imports: [LucideBell]
})
```

---

## Template

```html
<svg lucideBell class="h-4.5 w-4.5"></svg>
```

---

## Rules

* Attribute must be **lowerCamelCase**

  * ✅ `lucideBell`
  * ❌ `lucide-bell`

* Use Tailwind for size

  * `h-4 w-4`
  * `h-4.5 w-4.5`

* Color inherits from parent

---

## Example (PrimeNG button)

```html
<p-button severity="secondary" variant="outlined">
  <ng-template #icon>
    <svg lucideBell class="h-4.5 w-4.5"></svg>
  </ng-template>
</p-button>
```

---

# 2. Dynamic Icons (ALLOWED)

## When to use

ONLY when icon depends on:

* navigation config
* API / CMS data
* reusable structures
* state (theme, status, etc.)

---

## Import

```ts
import { LucideDynamicIcon, LucideSun, LucideMoon } from '@lucide/angular';
```

---

## Example (state-based)

```ts

@Component({
  standalone: true,
  imports: [LucideDynamicIcon]
})

protected readonly themeToggleIcon = computed(() =>
  this.isDark() ? LucideSun : LucideMoon
);
```

```html
<svg class="h-4.5 w-4.5" [lucideIcon]="themeToggleIcon()"></svg>
```

---

## Example (config-driven)

```ts
import { type LucideIcon, LucideWallet } from '@lucide/angular';

export interface NavItem {
  label: string;
  icon: LucideIcon;
}
```

```html
<svg [lucideIcon]="item.icon" class="h-4 w-4"></svg>
```

---

## Rules

* Use `LucideIcon` type
* Always map icons explicitly
* Do NOT use raw string-based icons

❌ Wrong:

```ts
icon: 'wallet'
```

---

# 3. PrimeNG Integration (CRITICAL)

## Problem

PrimeNG forces icon via:

```html
<p-button icon="pi pi-home" />
```

But we prefer Lucide icons instead of PrimeIcons.

---

## ✅ Correct Pattern usecases

---

## For Icon-only button ALWAYS use template slot

```html
<p-button
  [rounded]="true"
  [text]="true"
  severity="secondary"
  styleClass="p-button-icon-only"
  ariaLabel="Notifications"
>
  <ng-template #icon>
    <svg lucideBell class="h-4.5 w-4.5"></svg>
  </ng-template>
</p-button>
```

---

## Rules

* ❌ Do NOT use `icon="pi ..."`
* ❌ Do NOT mix Lucide + PrimeIcons

---

# 4. Static vs Dynamic Decision

## Use static if

* icon is fixed
* component knows icon

## Use dynamic if

* icon comes from data/config
* icon changes based on state

---

## Examples

### ✅ Static

```html
<svg lucideBell></svg>
```

### ✅ Dynamic

```html
<svg [lucideIcon]="item.icon"></svg>
```

### ❌ Wrong

```html
<svg [lucideIcon]="bellIcon"></svg>
```

(if bellIcon is constant)

---

# 5. Styling Rules

## Size

* small → `h-4 w-4`
* default → `h-5 w-5`
* large → `h-6 w-6`

## Color

* inherit text color
* use `text-primary` if needed

## Alignment

```html
<div class="flex items-center gap-2">
  <svg lucideBell class="h-4 w-4"></svg>
  <span>Notifications</span>
</div>
```

---

# 6. Forbidden Patterns

## ❌ Custom wrapper

```html
<app-icon name="bell"></app-icon>
```

## ❌ Wrong package

```ts
import { Bell } from 'lucide-angular';
```

## ❌ PrimeIcons

```html
<p-button icon="pi pi-home" />
```

## ❌ Dynamic without need

```html
<svg [lucideIcon]="bellIcon"></svg>
```

---

# 7. LLM Instructions (MANDATORY)

When generating Angular UI:

1. Use `@lucide/angular`
2. Prefer static icons
3. Use dynamic only when needed
4. Use PrimeNG `#icon` slot for icon-only buttons
5. Do NOT use PrimeIcons
6. Do NOT create wrappers
7. Do NOT guess icon names

---

## Final Rule

* static first
* dynamic only if justified
* no legacy
* no abstractions
* explicit and predictable usage
