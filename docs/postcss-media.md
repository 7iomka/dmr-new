# Custom Media Queries (PostCSS + Tailwind v3 Sync)

A lightweight PostCSS pipeline for **Angular CLI (`@angular/build`)** and **Tailwind CSS v3**. It allows writing **native CSS Media Queries Level 4 syntax** using aliases synced directly from `tailwind.config.ts`.

It completely replaces non-standard Tailwind directives like `@screen` or `@theme` with standardized vanilla CSS wrappers.

New CSS must use `@media (--*)` aliases instead of `@screen`.

---

## 📐 Media Aliases Syntax

You can use three structural types of auto-generated responsive aliases inside **any** component stylesheet:

### 1. Mobile-First (Base Aliases)

Applies styles from the specified breakpoint and **upwards** (`min-width`).

```css
.card {
  padding: 1rem;

  @media (--md) {
    padding: 2rem; /* Applies from 'md' and up */
  }
}
```

### 2. Desktop-First (Strict Max Aliases)

Applies styles strictly **below** the specified breakpoint (`max-width`). It automatically deducts `0.01em` to eliminate viewport blending gaps.

```css
.sidebar {
  display: block;

  @media (--max-md) {
    display: none; /* Hidden strictly below 'md' breakpoint */
  }
}
```

### 3. Strict Range Intervals (Edge-Cases)

Applies styles **exclusively within the boundaries of two adjacent breakpoints**. Perfect for targeting tablets only.

```css
.grid {
  grid-template-columns: repeat(4, 1fr);

  @media (--md-lg) {
    grid-template-columns: repeat(2, 1fr); /* Targets devices strictly BETWEEN 'md' and 'lg' */
  }
}
```

---

## 🚀 Usage Rules

1. **Standard Properties First**: Declare base parameters before appending media overrides.
2. **Ascending Order Requirement**: Always write media queries moving from smaller viewports to larger ones (`--sm` before `--md`).

```css
/* ✅ CORRECT IMPLEMENTATION */
.element {
  padding: 30px; /* Base rule */

  @media (--md) {
    font-size: 2.5rem;
  }
  @media (--lg) {
    font-size: 4rem;
  }
}
```

---

## 🎛️ Editor Settings (VS Code / Windsurf)

To prevent the editor from highlighting the native Custom Media syntax prefix (`--`) as an error, add this configuration file to your repository root layout:

**.vscode/settings.json**

```json
{
  "css.lint.unknownAtRules": "ignore",
  "scss.lint.unknownAtRules": "ignore"
}
```

---

## 🧯 Cache Flushing

If you modify breakpoints inside `tailwind.config.ts`, always clear the hard compiler cache to force re-render components stylesheets layout:

```bash
rm -rf .angular/cache && pnpm start
```

---

## Relationship To PostCSS Mixins

Responsive behavior is owned by `postcss-tailwind-media`, not by `postcss-mixins`.

Do not create breakpoint mixins such as `@mixin screen lg` unless `postcss-tailwind-media` is removed. Keeping responsive aliases in one plugin avoids drift between `@media (--lg)` and Tailwind's configured screens.

If a future project-owned mixin plugin is added for dark mode or structural helpers, keep it separate from media alias expansion and place it before `tailwindcss/nesting` in `postcss.config.json`.
