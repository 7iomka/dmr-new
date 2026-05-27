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

## Current Implementation

Use `postcss-mixins` as the documented mixin engine.

The project keeps mixins in files because `postcss.config.json` cannot declare inline JavaScript functions. CSS-defined mixins are preferred when possible because they are readable and can be discovered by editor tooling such as `postcss-mixins-autocomplete`. Selector-aware dark-mode helpers use JavaScript function mixins loaded through `mixinsFiles`.

Current config shape:

```json
{
  "plugins": {
    "postcss-import": {},
    "postcss-tailwind-media": {},
    "postcss-mixins": {
      "mixinsFiles": ["./src/styles/mixins/**/*.css", "./src/styles/mixins/**/*.js"]
    },
    "tailwindcss/nesting": {},
    "tailwindcss": {},
    "autoprefixer": {},
    "postcss-pxtorem": {}
  }
}
```

Mixin files live under:

```text
src/styles/mixins
```

Do not reintroduce a local PostCSS plugin unless `postcss-mixins` can no longer express a required helper through CSS mixin files or file-loaded function mixins.

---

## Required Mixins

### `@mixin dark`

Use in global CSS, `ViewEncapsulation.None` CSS, and component-scoped CSS when a rule needs a dark override.

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

.card:where(.dark, .dark *) {
  color: var(--p-surface-50);
}
```

### `@mixin light-dark`

Use for single-property light/dark pairs.

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

.card:where(.dark, .dark *) {
  color: var(--p-surface-50);
}
```

Do not use native CSS `light-dark()` while `.dark` remains the source of truth and legacy Safari compatibility is required.

---

## Structural Helper Mixins

Only use structural mixins that map to simple declaration blocks.

Recommended mixins:

- `@mixin truncate`;
- `@mixin line-clamp 2`;
- `@mixin size <size>`;

Example:

```css
.title {
  @mixin truncate;
}

.description {
  @mixin line-clamp 2;
}
```

Do not add `space-y`, `space-x`, `divide-y`, or `divide-x` mixins. Tailwind v4 changed these selectors for performance and compatibility reasons. In project CSS, spacing should use `gap`, and separators should use explicit semantic selectors such as `> :not(:last-child)`.

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

Use flex/grid `gap` instead of Tailwind-like `space-y` / `space-x` helpers:

```css
.panel-stack {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
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

### Separators

Use explicit semantic separators instead of `divide-y` / `divide-x` helpers:

```css
.transaction-list > :not(:last-child) {
  border-bottom: 1px solid var(--p-surface-200);

  @mixin dark {
    border-bottom-color: var(--p-surface-800);
  }
}
```

Use the same `dark` mixin in component-scoped CSS:

```css
.rows > :not(:last-child) {
  border-bottom: 1px solid var(--p-surface-200);

  @mixin dark {
    border-bottom-color: var(--p-surface-800);
  }
}
```

---

## Migration Sequence

1. Keep `postcss-mixins` registered through JSON-compatible `mixinsFiles`.
2. Keep dark helpers: `dark`, `light-dark`.
3. Keep only safe structural helper mixins: `truncate`, `line-clamp`, `size`.
4. Convert existing `@screen` to `@media (--*)`.
5. Convert global/root variable patterns first because they reduce repeated color overrides.
6. Convert low-risk shared global CSS modules under `src/styles/*.css`.
7. Convert encapsulated component CSS separately, using `dark` / `light-dark`.
8. Convert `ViewEncapsulation.None` component CSS as global/namespaced CSS, using `dark`.
9. Convert high-volume migrated pages last.
10. Replace touched `space-*` with `gap` and touched `divide-*` with explicit semantic separators.
11. Keep lint guardrails that reject new `@apply`, `@screen`, `@variant`, `@reference`, and forbidden space/divide mixins in source CSS.

Validation after each batch:

```bash
pnpm install --frozen-lockfile
pnpm fix && pnpm check
```

For visual-risk batches, also run the app and inspect light/dark mode plus responsive states.
