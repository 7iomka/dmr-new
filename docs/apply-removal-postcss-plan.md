# `@apply` Removal And PostCSS Helper Plan

## Goal

Move custom CSS away from Tailwind utility expansion.

The target model:

- templates may use Tailwind utilities for unclear or one-off layout;
- semantic CSS and PrimeNG overrides use direct CSS declarations;
- theme values come from CSS variables and PrimeNG tokens;
- breakpoints use `@media (--*)` aliases handled by `postcss-tailwind-media`;
- repeated non-trivial CSS patterns use project-owned PostCSS mixins, not `@apply`.

---

## Current PostCSS Constraints

The project uses `postcss.config.json` because of Angular CLI constraints.

That means:

- plugin configuration must be JSON-compatible;
- inline JavaScript mixin functions cannot be declared inside the PostCSS config;
- local PostCSS plugins can still be registered by package name if they are installed or linked through `package.json`;
- `postcss-mixins` can be configured through JSON options such as `mixinsDir` or `mixinsFiles`.

Current relevant order:

```json
{
  "plugins": {
    "postcss-import": {},
    "postcss-tailwind-media": {},
    "tailwindcss/nesting": {},
    "tailwindcss": {},
    "autoprefixer": {},
    "postcss-pxtorem": {}
  }
}
```

If a mixin layer is added, place it after `postcss-tailwind-media` and before `tailwindcss/nesting`.

---

## Recommended Implementation

Prefer a small local plugin over a large dependency stack if selector-aware mixins become awkward with `postcss-mixins`.

Recommended package:

```text
tools/postcss-dmr-mixins
```

Recommended config:

```json
{
  "plugins": {
    "postcss-import": {},
    "postcss-tailwind-media": {},
    "postcss-dmr-mixins": {},
    "tailwindcss/nesting": {},
    "tailwindcss": {},
    "autoprefixer": {},
    "postcss-pxtorem": {}
  }
}
```

Why local plugin first:

- it works cleanly with `postcss.config.json`;
- it can transform selectors exactly for Angular/global contexts;
- it can enforce project-specific names and fail on unsupported mixin usage;
- it avoids depending on Tailwind internals for CSS generation.

`postcss-mixins` is still acceptable for simple reusable declaration blocks, especially structural helpers. Validate function mixin loading through `mixinsDir` before relying on it for selector transforms.

---

## Required Mixins

### `@mixin dark`

Use only in global CSS or `ViewEncapsulation.None` component CSS.

Input:

```css
.card {
  color: var(--p-surface-900);

  @mixin dark {
    color: var(--p-surface-50);
  }
}
```

Output:

```css
.card {
  color: var(--p-surface-900);
}

.dark .card {
  color: var(--p-surface-50);
}
```

### `@mixin host-dark`

Use in component CSS with Angular style encapsulation enabled.

Input:

```css
.card {
  color: var(--p-surface-900);

  @mixin host-dark {
    color: var(--p-surface-50);
  }
}
```

Output:

```css
.card {
  color: var(--p-surface-900);
}

:host-context(.dark) .card {
  color: var(--p-surface-50);
}
```

### `@mixin root-dark`

Use for global root variable overrides.

Input:

```css
:root {
  --app-card-bg: var(--p-surface-0);

  @mixin root-dark {
    --app-card-bg: var(--p-surface-950);
  }
}
```

Output:

```css
:root {
  --app-card-bg: var(--p-surface-0);
}

.dark {
  --app-card-bg: var(--p-surface-950);
}
```

Use the name `root-dark`, not `dark-root`.

### `@mixin light-dark`

Use for single-property light/dark pairs in global CSS or `ViewEncapsulation.None`.

Input:

```css
.card {
  @mixin light-dark color, var(--p-surface-900), var(--p-surface-50);
}
```

Output:

```css
.card {
  color: var(--p-surface-900);
}

.dark .card {
  color: var(--p-surface-50);
}
```

### `@mixin host-light-dark`

Use for single-property light/dark pairs in encapsulated component CSS.

Input:

```css
.card {
  @mixin host-light-dark color, var(--p-surface-900), var(--p-surface-50);
}
```

Output:

```css
.card {
  color: var(--p-surface-900);
}

:host-context(.dark) .card {
  color: var(--p-surface-50);
}
```

Do not use native CSS `light-dark()` while `.dark` remains the source of truth and legacy Safari compatibility is required.

---

## Structural Helper Mixins

These are candidates because Tailwind utilities such as `truncate`, `line-clamp`, `divide-y`, and `space-y` are convenient but not portable through `@apply`.

Recommended mixins:

- `@mixin truncate`;
- `@mixin line-clamp 2`;
- `@mixin divide-y <border-value>`;
- `@mixin space-y <margin-value>`;
- `@mixin square <size>`;

Example:

```css
.title {
  @mixin truncate;
}

.description {
  @mixin line-clamp 2;
}

.list {
  @mixin divide-y var(--p-surface-200);

  @mixin dark {
    @mixin divide-y var(--p-surface-800);
  }
}
```

If nested mixins inside `@mixin dark` are not practical in the chosen implementation, write explicit CSS declarations in the dark block.

---

## Utility Replacement Rules

### Layout

Replace with pure CSS:

```css
display: flex;
flex-direction: column;
align-items: center;
justify-content: space-between;
gap: 16px;
```

### Spacing And Sizing

Use direct CSS. Prefer readable `px` values for migrated Tailwind spacing because `postcss-pxtorem` converts them.

```css
padding: 16px 24px;
width: 40px;
min-height: 360px;
```

### Typography

Use variables from `src/styles/_theme-variables.css`.

```css
font-size: var(--text-sm);
line-height: var(--text-sm--line-height);
font-weight: 700;
letter-spacing: var(--tracking-wide);
```

### Colors

Use PrimeNG tokens, HSL channels, or app semantic variables.

```css
color: var(--p-text-color);
background: var(--p-surface-0);
border-color: var(--p-surface-200);
box-shadow: 0 10px 15px -3px hsl(var(--hsl-primary-500) / 25%);
```

### States

Use nested CSS handled by `tailwindcss/nesting`.

```css
.button {
  transition: border-color 150ms ease;

  &:hover {
    border-color: var(--p-primary-color);
  }

  &:focus-visible {
    outline: 2px solid var(--p-primary-color);
    outline-offset: 2px;
  }

  &:disabled {
    opacity: 0.5;
  }
}
```

### Important Utilities

Use direct `!important`.

```css
width: 40px !important;
height: 40px !important;
```

### PrimeNG Overrides

Use direct declarations. Do not wrap PrimeNG overrides in Tailwind utilities.

The project controls PrimeNG style order with `AppPrimeNgUseStyle`; use specificity, source order, PassThrough classes, and `!important` only when there is a concrete PrimeNG conflict.

---

## Migration Sequence

1. Add `postcss-dmr-mixins` or evaluate `postcss-mixins` with JSON-compatible `mixinsDir`.
2. Add minimal mixins: `dark`, `host-dark`, `root-dark`, `light-dark`, `host-light-dark`.
3. Add structural helper mixins only after the dark helpers are proven in Angular component CSS and global CSS.
4. Convert existing `@screen` to `@media (--*)`.
5. Convert global/root variable patterns first because they reduce repeated color overrides.
6. Convert low-risk shared global CSS modules under `src/styles/*.css`.
7. Convert encapsulated component CSS separately, using `host-dark` / `host-light-dark`.
8. Convert `ViewEncapsulation.None` component CSS as global/namespaced CSS, using `dark`.
9. Convert high-volume migrated pages last.
10. Add lint or CI guardrails that reject new `@apply`, `@screen`, `@variant`, and `@reference` in source CSS.

Validation after each batch:

```bash
pnpm install --frozen-lockfile
pnpm fix && pnpm check
```

For visual-risk batches, also run the app and inspect light/dark mode plus responsive states.
