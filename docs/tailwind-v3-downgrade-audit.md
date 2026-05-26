# Tailwind v3 Downgrade Fix Plan

Цель: довести текущую Angular codebase до стабильной сборки на `tailwindcss@3.4.17` с учетом уже внесенных ручных правок.

Текущий baseline:

- `tailwindcss` уже зафиксирован на `3.4.17`.
- `content` сейчас включает `./src/**/*.{html,ts,css}`. This is acceptable for this migration, but it must not be the only mechanism that keeps PrimeNG runtime selectors alive.
- `postcss-pxtorem` уже подключен после Tailwind.
- `tailwindcss/nesting` уже включен перед Tailwind.
- `opacity` scale уже расширен с `0` до `100`.
- non-color theme variables уже вынесены в `src/styles/_theme-variables.css`.
- color tokens уже мигрированы на `colors.css`, PrimeNG tokens и HSL channels.
- `var(--color-*)` usages в `src/` сейчас не найдены.

Проверка после текущего набора фиксов:

```bash
pnpm exec ng build --configuration development
```

Status: passes.

## Working Agreements

### Spacing

Current spacing agreement:

1. Keep the default Tailwind v3 spacing scale.
2. Values up to `10` may stay as normal Tailwind classes when they exist in v3.
3. Values above `10`, decimal spacing classes, or non-standard v4 spacing classes must be replaced with arbitrary pixel values.
4. Use `px` inside arbitrary values for readability. `postcss-pxtorem` will convert generated CSS px values to `rem` after Tailwind.
5. Do not manually convert these values to `rem` in templates.

Examples:

```html
<div class="w-[18px]"></div>
<div class="pb-[60px]"></div>
```

Do not add a custom project spacing scale for this migration.

### CSS Variable Arbitrary Values

When migrating Tailwind v4 shorthand CSS variable utilities, replace parentheses with square brackets and do not wrap in `var(...)`.

Use:

```css
bg-[--my-color]
border-[--p-form-field-border-color]
duration-[--p-form-field-transition-duration]
```

Do not use:

```css
bg-[var(--my-color)]
```

### Opacity

Do not replace missing Tailwind v3 slash opacity modifiers with arbitrary values. The project extends Tailwind v3 opacity from `0` to `100`, so v4-like classes are allowed when the value is a percent in `0..100`.

Keep examples:

- `bg-primary/6`
- `bg-primary/8`
- `dark:bg-white/2`
- `bg-primary/35`
- `border-surface-700/12`

Use arbitrary opacity only for non-percent or exceptional values, if any appear later.

### Component CSS Layers

In Angular component-scoped CSS, remove `@layer components` wrappers. Component CSS files are processed separately and do not contain the matching `@tailwind components` directive, so Tailwind v3 fails.

In this Angular build pipeline, CSS files imported by `src/styles.css` are also processed separately by `angular-css`. Therefore imported files under `src/styles/*.css` must not contain Tailwind `@layer` wrappers either.

Important blocker: if `ng build` reports `@layer ... no matching @tailwind ...`, fix or prove impossible the global import/processing pipeline before starting mass rewrites of global `@layer` blocks. Do not start mass rewriting global `@layer` until the import pipeline is fixed or proven impossible.

### PrimeNG Runtime Selectors

PrimeNG generated `.p-*` classes can be absent from project templates because PrimeNG emits them internally. Tailwind v3 may purge selectors inside `@layer` if those selectors are not discovered through `content`.

Current rule:

- `.p-*` PrimeNG generated selector overrides must live outside Tailwind `@layer`.
- `.c-*` / `app-*` project classes may stay inside `@layer components` only when they are in a CSS file processed together with matching `@tailwind components`.
- In imported global modules under `src/styles/*.css`, keep project classes as normal CSS rules because Angular processes those files separately.
- Project selectors that include PrimeNG state classes, for example `.c-pill-tabs-nav__tab.p-tab-active`, are still project-owned selectors; the PrimeNG state class does not make them PrimeNG-owned overrides.
- Keep `content: ['./src/**/*.{html,ts,css}']` if it continues to pass validation, but do not rely on it as the primary fix for PrimeNG generated classes.

Do not enable PrimeNG `cssLayer` while Safari 14.1/14.5 support is required. PrimeNG `cssLayer` emits native CSS cascade layers, unlike Tailwind v3 `@layer` directives that are compiled away by Tailwind.

Required PrimeNG theme configuration for legacy Safari support:

```ts
cssLayer: false;
```

With `cssLayer: false`, PrimeNG runtime styles and app styles are both normal unlayered author CSS. This means source order and specificity matter again for PrimeNG PassThrough parts.

PrimeNG inserts runtime component styles through `UseStyle`. The project overrides this provider with `AppPrimeNgUseStyle` so PrimeNG `data-primeng-style-id` tags are inserted before the app stylesheet link instead of being appended after it. This keeps Safari 14.x compatibility and gives app CSS a stable later source order.

This is a compatibility workaround, not an official PrimeNG customization API. Re-check `AppPrimeNgUseStyle` on every PrimeNG upgrade because the internal `UseStyle` signature or insertion behavior may change. If a PrimeNG component bypasses `UseStyle` and manually appends its own `<style>` tag, handle that component separately.

Prefer simple PassThrough project classes when no stronger override is actually needed:

```css
.app-notifications-drawer__content {
  ...
}
```

Raise specificity, move the override to a later global stylesheet, use PT inline styles, or use `!important` only for real per-property conflicts where PrimeNG runtime CSS otherwise wins by source order or specificity.

### Responsive CSS

Do not add new `@screen`.

Use native-looking media aliases handled by `postcss-tailwind-media`:

```css
.selector {
  @media (--lg) {
    property: value;
  }
}
```

This keeps breakpoints synchronized with `tailwind.config.ts` without relying on Tailwind-specific CSS directives. See `./postcss-media.md`.

### `@apply`

Do not add new `@apply` in any CSS file.

Current source still contains legacy `@apply` usage from migrated pages and earlier style extraction. Treat that usage as migration debt:

- if you touch a selector that already uses `@apply`, prefer replacing it with direct CSS declarations and project/PrimeNG variables when the change is reasonably scoped;
- do not rewrite unrelated selectors only for churn;
- do not create new semantic CSS classes whose only purpose is to wrap Tailwind utilities;
- if a block has unclear semantics, keep Tailwind utilities directly in the Angular template until the block is extracted into a semantic class or component.

The target model is: templates may use Tailwind for unclear/one-off layout, while custom CSS depends primarily on CSS variables, PrimeNG tokens, and browser CSS.

Replacement rules:

- layout utilities become direct CSS: `display`, `grid-template-*`, `align-items`, `justify-content`, `gap`;
- spacing and sizing utilities become direct CSS; `px` values are allowed because `postcss-pxtorem` converts them;
- typography utilities use direct CSS and variables from `src/styles/_theme-variables.css`;
- color/dark utilities use direct CSS plus `.dark`, `:host-context(.dark)`, or future project mixins;
- state variants become nested selectors such as `&:hover`, `&:focus-visible`, `&:disabled`;
- structural helpers such as `truncate`, `line-clamp`, and `size` may use project-owned PostCSS mixins;
- `space-y`, `space-x`, `divide-y`, and `divide-x` must not become project mixins; use `gap` for spacing and explicit `> :not(:last-child)` separators instead;
- important utilities become direct CSS declarations with `!important`;
- PrimeNG override selectors use direct declarations; specificity and source order are handled by app CSS order and `AppPrimeNgUseStyle`.

### Dark Mode Selectors

Global CSS and `ViewEncapsulation.None` CSS:

```css
.dark .selector {
  color: var(--p-surface-50);
}
```

Component-scoped CSS with Angular encapsulation:

```css
:host-context(.dark) .selector {
  color: var(--p-surface-50);
}
```

Prefer `.dark`, not `html.dark`.

For theme-aware root variables, define the default under `:root` and the override under `.dark` in a global CSS file:

```css
:root {
  --app-example-bg: var(--p-surface-0);
}

.dark {
  --app-example-bg: var(--p-surface-950);
}
```

Do not redefine shared `:root` variables inside encapsulated component CSS. Move shared variables to global CSS, or intentionally use `ViewEncapsulation.None` with namespaced selectors.

### PostCSS Mixin Direction

The project uses `postcss-mixins` as the documented helper layer for dark mode and safe repeated structural utilities.

Because Angular CLI currently uses `postcss.config.json`, plugin configuration must be JSON-compatible:

- do not rely on inline JavaScript functions inside PostCSS config;
- configure `postcss-mixins` through `mixinsFiles`;
- keep CSS-defined helper mixins under `src/styles/mixins` for editor autocomplete;
- keep selector-aware dark helpers as file-loaded JavaScript function mixins.

Recommended mixin names:

- `@mixin dark` -> emits `.dark &`;
- `@mixin host-dark` -> emits `:host-context(.dark) &`;
- `@mixin root-dark` -> emits `.dark` for root variable overrides;
- `@mixin light-dark <property>, <light-value>, <dark-value>` -> emits the normal property and a `.dark` override;
- `@mixin host-light-dark <property>, <light-value>, <dark-value>` -> emits the normal property and a `:host-context(.dark)` override.
- `@mixin truncate`, `@mixin line-clamp <lines>`, and `@mixin size <size>` -> safe CSS helper declarations.

Forbidden mixin names:

- `@mixin space-y`, `@mixin space-x`, `@mixin divide-y`, and `@mixin divide-x`.

Tailwind v4 changed the generated selectors for space/divide utilities. In this project, do not clone those utilities into CSS mixins. Prefer flex/grid `gap`, and write semantic separator selectors with `> :not(:last-child)` when a divider is required.

Do not use native CSS `light-dark()` for app theme switching while legacy Safari compatibility is required and `.dark` remains the theme source of truth.

### Custom Utility Classes

For `c-section-label`, use the class directly in HTML/templates instead of `@apply c-section-label` inside component CSS.

For `no-scrollbar`, do not use `@apply no-scrollbar` in Tailwind v3. The utility can still exist for direct template usage, but CSS selectors must use direct declarations:

```css
.scroll-container {
  overflow-x: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.scroll-container::-webkit-scrollbar {
  display: none;
}
```

## Step 1. Fix Global CSS Pipeline For Imported `@layer`

Status: done.

Previous `ng build` reported errors like:

```text
@layer base is used but no matching @tailwind base directive is present.
```

This currently appears for global files imported by `src/styles.css`, including:

- `src/styles/_theme-variables.css`
- `src/styles/colors.css`
- `src/styles/button.css`
- `src/styles/card.css`
- `src/styles/form-controls.css`
- `src/styles/page.css`
- `src/styles/utilities.css`
- and other imported global style modules.

Expected rule: a CSS file may use Tailwind `@layer` only if it is processed as part of the same Tailwind input that contains:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

Outcome:

1. `postcss-import` was tested as a pipeline fix, but Angular still processed imported CSS modules separately.
2. Moving `@tailwind` before imports removed the `@layer` errors but produced invalid CSS imports after generated Tailwind rules.
3. Final fix: keep `src/styles.css` as the per-file import entrypoint and remove Tailwind `@layer` wrappers from imported global modules under `src/styles/*.css`.
4. Keep the `@tailwind` directives in `src/styles.css` after the imports so CSS import order stays valid.

```bash
pnpm exec ng build --configuration development
```

Current structure:

- `src/styles.css` imports the split files from `src/styles/*.css`.
- `src/styles.css` keeps its local `@layer base` block because it is in the same file as `@tailwind base`.
- imported `src/styles/*.css` files use normal CSS rules, existing legacy `@apply`, `@media (--*)` aliases, and CSS variables, but no Tailwind `@layer`. Do not add new `@apply`; replace touched legacy `@apply` with direct declarations where reasonably scoped.

## Step 1.1. Move PrimeNG Generated Selectors Out Of Tailwind Layers

Status: done.

Problem found after enabling CSS files in Tailwind `content`: styles that target PrimeNG generated classes can disappear when they are inside `@layer components`, because those `.p-*` classes are not necessarily present in app HTML or TS.

Fix applied:

- Moved pure PrimeNG `.p-*` overrides outside Tailwind `@layer` in the split files under `src/styles/*.css`.
- Kept project-owned `.c-*` selectors as normal imported global CSS rules.
- Restored `src/styles.css` to per-file imports instead of flattening the split files.

Do not treat these project-owned selectors as PrimeNG-owned just because they include PrimeNG state classes:

```css
.c-pill-tabs-nav__tab.p-tab-active {
  ...
}
```

Do move these PrimeNG-owned selectors out of `@layer`:

```css
.p-button {
  ...
}

.p-datatable-thead > tr > th {
  ...
}
```

## Step 1.2. Remove Custom Utilities From `@apply` When Tailwind v3 Cannot Resolve Them

Status: done for `no-scrollbar`.

Build error:

```text
The `no-scrollbar` class does not exist. If `no-scrollbar` is a custom class, make sure it is defined within a `@layer` directive.
```

Fix applied:

- Removed `no-scrollbar` from component/global `@apply` declarations.
- Replaced it with direct scrollbar CSS declarations on the affected selectors.
- Kept `no-scrollbar` available for direct HTML usage if the utility exists globally.

## Step 2. Remove `@reference` From Component CSS

`@reference` is Tailwind v4 CSS-first syntax and should be removed.

Current count: 27 occurrences.

Files:

- `src/app/features/auth/auth-page.component.css`
- `src/app/features/chat/chat-page.component.css`
- `src/app/features/dashboard/dashboard-page.component.css`
- `src/app/features/investments/components/installments-overview/c-investment-installments-overview.component.css`
- `src/app/features/investments/components/investment-buy-form/c-investment-buy-form.component.css`
- `src/app/features/investments/components/investment-buy-form/c-investment-input-field.component.css`
- `src/app/features/investments/components/investment-buy-form/c-investment-summary-card.component.css`
- `src/app/features/investments/components/investment-buy-form/c-investment-switch-card.component.css`
- `src/app/features/investments/components/shares-overview/c-investment-shares-overview.component.css`
- `src/app/features/investments/components/tabs/investment-tabpanels.component.css`
- `src/app/features/investments/components/tabs/investment-tabs-nav.component.css`
- `src/app/features/investments/investments-page.component.css`
- `src/app/features/notifications/notifications-page.component.css`
- `src/app/features/partners/partners-page.component.css`
- `src/app/features/wallet/wallet-page.component.css`
- `src/app/features/withdrawals/withdrawal-addresses-page.component.css`
- `src/app/features/withdrawals/withdrawal-new-page.component.css`
- `src/app/features/withdrawals/withdrawals-page.component.css`
- `src/app/layout/app-shell/app-shell.component.css`
- `src/app/layout/components/app-footer.component.css`
- `src/app/layout/components/app-header.component.css`
- `src/app/layout/components/app-mobile-bottom-nav.component.css`
- `src/app/layout/components/app-mobile-sidebar.component.css`
- `src/app/layout/components/app-notifications-button.component.css`
- `src/app/layout/components/app-notifications-drawer.component.css`
- `src/app/layout/components/app-sidebar.component.css`
- `src/app/layout/components/app-user-menu.component.css`

## Step 3. Remove `@layer components` From Component CSS

Current component-scoped files with `@layer components`:

- `src/app/features/chat/chat-page.component.css`
- `src/app/features/notifications/notifications-page.component.css`
- `src/app/layout/components/app-notifications-button.component.css`
- `src/app/layout/components/app-notifications-drawer.component.css`

Fix: unwrap the selectors and leave normal component CSS. Do not change selector behavior.

## Step 4. Replace `@variant`

Current count: 76 occurrences.

Rules:

- Component CSS dark mode: replace with `:host-context(.dark) ...`.
- Global CSS dark mode: replace with `.dark ...`.
- `@variant lg`: replace with nested `@media (--lg)`.
- `@variant motion-safe`: replace with nested/native media query:

```css
@media (prefers-reduced-motion: no-preference) {
  ...
}
```

Examples:

```css
.card {
  border-color: var(--p-surface-200);

  @media (--lg) {
    padding: 24px;
  }
}

:host-context(.dark) .card {
  border-color: var(--p-surface-800);
}
```

High-volume files:

- `src/app/features/investments/components/installments-overview/c-investment-installments-overview.component.css`: 26 dark variants.
- `src/app/features/auth/auth-page.component.css`: 19 dark variants.

Other files:

- `src/app/features/chat/chat-page.component.css`
- `src/app/features/dashboard/dashboard-page.component.css`
- investment buy-form/input/summary/switch/shares/tabs CSS
- layout footer/mobile/sidebar CSS
- global `src/styles/page.css`
- global `src/styles/card.css`
- global `src/styles/page-heading.css`
- global `src/styles/stat-card.css`

## Step 5. Replace v4 CSS Variable Utility Shorthand

Current count: 10 utility shorthand usages.

Replace:

| Current          | Tailwind v3 form |
| ---------------- | ---------------- |
| `bg-(--x)`       | `bg-[--x]`       |
| `text-(--x)`     | `text-[--x]`     |
| `border-(--x)`   | `border-[--x]`   |
| `duration-(--x)` | `duration-[--x]` |
| `gap-(--x)`      | `gap-[--x]`      |
| `py-(--x)`       | `py-[--x]`       |

Files/usages:

- `src/styles/page.css`
  - `py-(--c-page-padding-y)` -> `py-[--c-page-padding-y]`
  - `gap-(--c-page-gap)` -> `gap-[--c-page-gap]`
- `src/styles/form-controls.css`
  - `border-(--p-inputtext-hover-border-color)` -> `border-[--p-inputtext-hover-border-color]`
- `src/styles/pill-tabs.css`
  - `bg-(--c-pill-tabs-nav-bg)` -> `bg-[--c-pill-tabs-nav-bg]`
  - `bg-(--c-pill-tabs-nav-primary-active-bg)` -> `bg-[--c-pill-tabs-nav-primary-active-bg]`
  - `text-(--c-pill-tabs-nav-primary-active-color)` -> `text-[--c-pill-tabs-nav-primary-active-color]`
  - `bg-(--c-pill-tabs-nav-secondary-active-bg)` -> `bg-[--c-pill-tabs-nav-secondary-active-bg]`
  - `text-(--c-pill-tabs-nav-secondary-active-color)` -> `text-[--c-pill-tabs-nav-secondary-active-color]`
- `src/app/features/chat/chat-page.component.css`
  - `border-(--p-form-field-border-color)` -> `border-[--p-form-field-border-color]`
  - `hover:border-(--p-form-field-hover-border-color)` -> `hover:border-[--p-form-field-hover-border-color]`
  - `has-[.chat-page__textarea:focus]:border-(--p-form-field-focus-border-color)` -> `has-[.chat-page__textarea:focus]:border-[--p-form-field-focus-border-color]`
  - `duration-(--p-form-field-transition-duration)` -> `duration-[--p-form-field-transition-duration]`
- `src/app/features/investments/components/tabs/investment-tabs-nav.component.css`
  - `p-active:bg-(--p-button-primary-background)` -> `p-active:bg-[--p-button-primary-background]`
  - `p-active:text-(--p-button-primary-color)` -> `p-active:text-[--p-button-primary-color]`
  - `p-active:border-(--p-button-primary-border-color)` -> `p-active:border-[--p-button-primary-border-color]`

## Step 6. Replace Non-Standard Spacing With Arbitrary px Values

Do not add a custom spacing scale.

Current replacements:

| Current                    | Replace with                         |
| -------------------------- | ------------------------------------ |
| `h-13`                     | `h-[52px]`                           |
| `w-10.5`                   | `w-[42px]`                           |
| `h-2.75`                   | `h-[11px]`                           |
| `w-2.75`                   | `w-[11px]`                           |
| `h-4.5`                    | `h-[18px]`                           |
| `w-4.5`                    | `w-[18px]`                           |
| `min-w-4.5`                | `min-w-[18px]`                       |
| `leading-4.5`              | `leading-[18px]`                     |
| `w-7.5`                    | `w-[30px]`                           |
| `min-w-29.5`               | `min-w-[118px]`                      |
| `min-h-50`                 | `min-h-[200px]`                      |
| `h-65`                     | `h-[260px]`                          |
| `max-w-76`                 | `max-w-[304px]`                      |
| `w-75`                     | `w-[300px]`                          |
| `min-h-90` / `md:min-h-90` | `min-h-[360px]` / `md:min-h-[360px]` |
| `lg:min-h-130`             | `lg:min-h-[520px]`                   |
| `pb-15`                    | `pb-[60px]`                          |

Files from current scan:

- `src/styles/form-controls.css`
- `src/app/features/partners/partners-page.component.css`
- `src/app/layout/components/app-footer.component.css`
- `src/app/layout/components/app-notifications-button.component.css`
- `src/app/features/dashboard/dashboard-page.component.css`
- `src/app/features/chat/chat-page.component.css`
- `src/app/features/investments/components/installments-overview/c-investment-installments-overview.component.css`
- `src/app/features/withdrawals/withdrawals-page.component.css`
- `src/app/layout/app-shell/app-shell.component.css`
- `src/app/layout/components/app-user-menu.component.css`

## Step 7. Replace `@apply c-section-label` In Component CSS

Chosen direction: use `.c-section-label` directly in HTML/templates instead of applying it through component CSS.

Current build failures:

- `src/app/features/partners/partners-page.component.css`
- `src/app/features/wallet/wallet-page.component.css`

Plan:

1. Move `c-section-label` to the relevant template element if the element already exists.
2. Remove the component CSS selector if it only existed to apply `c-section-label`.
3. If the selector also carries layout-specific styles, keep the selector and remove only `@apply c-section-label`.

Global usages such as `src/styles/pagination.css` can stay unless build proves otherwise after global pipeline is fixed.

## Step 8. Fix Remaining Theme Token Gaps

Do not recreate Tailwind v4 `--color-*` variables.

Rules:

- PrimeNG primitive color without alpha: `var(--p-red-500)`
- PrimeNG primitive color with alpha: `hsl(var(--hsl-red-500) / 40%)`
- PrimeNG semantic color without alpha: `var(--p-primary-color)`
- PrimeNG semantic color with alpha: `hsl(var(--hsl-primary-color) / 40%)`
- Custom app color without alpha: `var(--app-color-card)`
- Custom app color with alpha: `hsl(var(--hsl-app-color-card) / 40%)`

Current state:

- `var(--color-*)` usages in `src/` are currently gone.
- `--text-*`, `--radius-*`, `--blur-*`, font, shadow, tracking, leading tokens live in `src/styles/_theme-variables.css`.
- Tailwind config points to those token files through `theme` values.

If new missing token errors appear, add non-color tokens to `_theme-variables.css`; for colors, replace usage with PrimeNG/HSL/custom app token patterns above.

## Step 9. Rebuild And Iterate

After each batch:

```bash
pnpm exec ng build --configuration development
```

Expected next failures after the first batch are likely from:

- remaining `@variant` blocks;
- remaining invalid spacing utilities;
- nested `@apply` inside migrated nested blocks;
- uncommon variants such as `not-hover:*`, if build reaches them and Tailwind v3 rejects them.

## Step 10. Mandatory Validation Before Commit/PR

Run:

```bash
pnpm install --frozen-lockfile
pnpm fix && pnpm check
pnpm exec ng build --configuration development
```

Do not claim validation passed unless all required commands pass.
