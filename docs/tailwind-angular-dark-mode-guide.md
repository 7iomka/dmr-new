# Tailwind + Angular CSS Rules For Codex

## Given

- The project uses Tailwind v3 through `@tailwind` directives in `src/styles.css`.
- Dark mode is class-based via `.dark`.
- Prefer `.dark` selectors over `html.dark`.
- PrimeNG is configured with `darkModeSelector: '.dark'`.
- `tailwindcss/nesting` is enabled before Tailwind in PostCSS.
- Custom media aliases such as `@media (--md)` are handled by `postcss-tailwind-media`; see `./postcss-media.md`.
- The implementation plan for removing legacy `@apply` and adding helper mixins lives in `./apply-removal-postcss-plan.md`.
- This guide applies to component-scoped Angular CSS connected through `styleUrl` and to custom CSS files imported by `src/styles.css`.

---

## Core CSS Policy

Custom CSS must be minimally coupled to Tailwind.

CSS files are allowed for:

- semantic, project-owned sections/components with a clear class API;
- PrimeNG component overrides and PassThrough classes;
- shared theme variables and low-level browser fixes.

Blocks with unclear semantics must stay in Angular templates as Tailwind utility classes until they are given a real semantic section/class or extracted into a component.

Do not create CSS selectors only to hide a bag of Tailwind utilities behind `@apply`.

---

## `@apply` Is Forbidden For New CSS

Do **not** add new `@apply` in any CSS file.

This applies to:

- component stylesheets under `src/app/**/*.css`;
- global modules under `src/styles/*.css`;
- `src/styles.css`;
- PrimeNG overrides;
- migrated UI from `old/**/*.php`.

Existing `@apply` usage is migration debt. When touching a selector that already uses `@apply`, prefer replacing that selector with direct CSS declarations and project/PrimeNG variables if the change is reasonably scoped. Do not perform unrelated mass rewrites just to remove old `@apply`.

Use direct CSS:

```css
.example-panel {
  display: flex;
  gap: 1rem;
  border: 1px solid var(--p-surface-200);
  border-radius: var(--app-radius-lg);
  background: var(--p-surface-0);
  color: var(--p-text-color);
}

.dark .example-panel {
  border-color: var(--p-surface-800);
  background: var(--p-surface-950);
}
```

Do not use `@apply`:

```css
.example-panel {
  @apply flex gap-4 rounded-lg border border-surface-200 bg-surface-0 text-color dark:border-surface-800 dark:bg-surface-950;
}
```

Reason: CSS should depend primarily on CSS variables and browser CSS, not Tailwind's utility compiler. If Tailwind is removed later, unclear semantic template blocks can be converted into semantic classes/components, while existing CSS remains mostly portable.

---

## Tailwind In Templates

Tailwind utilities remain appropriate directly in HTML/templates for:

- one-off layout composition;
- unclear semantic blocks that have not yet become components;
- responsive layout scaffolding;
- short spacing/alignment adjustments around PrimeNG components.

Once a block has stable domain meaning, prefer an Angular component or semantic class with direct CSS declarations.

---

## Responsive CSS

Do not add new `@screen`.

Use native-looking media aliases handled by `postcss-tailwind-media`:

```css
.example-panel {
  display: grid;
  gap: 1rem;

  @media (--lg) {
    grid-template-columns: minmax(0, 1fr) 20rem;
  }
}
```

These aliases are generated from `tailwind.config.ts`, so CSS can stay synchronized with Tailwind breakpoints without using Tailwind directives.

---

## Global Styles

For `styles.css` and files imported directly into it, use classic selectors normally:

```css
.dark .foo {
  color: var(--p-surface-0);
}
```

Angular encapsulation is not a problem there.

For reusable theme-dependent values, prefer root variables with a `.dark` override:

```css
:root {
  --c-panel-bg: var(--p-surface-0);
  --c-panel-border: var(--p-surface-200);
}

.dark {
  --c-panel-bg: var(--p-surface-950);
  --c-panel-border: var(--p-surface-800);
}

.c-panel {
  border: 1px solid var(--c-panel-border);
  background: var(--c-panel-bg);
}
```

---

## Component CSS

Do not use Tailwind v4 CSS-first syntax such as `@reference` or `@variant`; this project is on Tailwind v3.

Component CSS should use direct declarations, CSS variables, nested CSS, and `@media (--*)` aliases when needed.

For normal component-local selectors with style encapsulation enabled, use `:host-context(.dark)`.

```css
.block {
  color: var(--p-text-color);
  background: var(--p-surface-0);
}

:host-context(.dark) .block {
  background: var(--p-surface-950);
}
```

Do not rely on raw `.dark .foo` inside component-scoped CSS. Angular style scoping can make those selectors behave unexpectedly.

For component-owned local variables, define defaults on `:host` and dark overrides on `:host-context(.dark)`:

```css
:host {
  --c-card-bg: var(--p-surface-0);
  --c-card-border: var(--p-surface-200);
}

:host-context(.dark) {
  --c-card-bg: var(--p-surface-950);
  --c-card-border: var(--p-surface-800);
}

.card {
  border: 1px solid var(--c-card-border);
  background: var(--c-card-bg);
}
```

If a component stylesheet needs to consume variables declared on `:root`, make sure the variables are theme-aware at the global source:

```css
:root {
  --app-example-bg: var(--p-surface-0);
}

.dark {
  --app-example-bg: var(--p-surface-950);
}
```

Do not redefine root-level theme variables inside an encapsulated component. If a style needs to set shared/global variables, move the rule to a global CSS module or use `ViewEncapsulation.None` intentionally with namespaced selectors.

---

## Deep Library Overrides

For selectors containing:

- `:host`;
- `::ng-deep`;
- combinations like `:host ::ng-deep ...`;
- deep overrides of library internals or pseudo-elements;

use separate dark rules instead of nested dark variants.

Use this pattern:

```css
:host ::ng-deep .foo {
  background: var(--p-surface-0);
}

:host-context(.dark) ::ng-deep .foo {
  background: var(--p-surface-950);
}
```

Do **not** write duplicated host selectors such as:

```css
:host-context(.dark) :host ::ng-deep .foo {
  background: var(--p-surface-950);
}
```

Use only one host anchor.

For PrimeNG overlays or components rendered outside the component host, component-scoped selectors and variables may not reach the generated DOM. Prefer global style modules or explicit PrimeNG `styleClass` / PassThrough classes for those cases.

---

## Proposed PostCSS Mixins

The project can add a small Mantine-like mixin layer, but it must work with `postcss.config.json`.

Rules:

- JSON config cannot inline JavaScript function mixins.
- `postcss-mixins` can be declared in JSON with options such as `mixinsDir` / `mixinsFiles`.
- If selector-aware mixins need more control than `postcss-mixins` can provide through files, create a local package plugin, for example `tools/postcss-dmr-mixins`, and register it in `postcss.config.json`.
- Place any mixin plugin after `postcss-import` and before `tailwindcss/nesting`, so generated nested selectors are normalized by the existing nesting step.

Target mixins:

```css
.global-rule {
  color: var(--p-surface-900);

  @mixin dark {
    color: var(--p-surface-50);
  }
}
```

Should compile like:

```css
.global-rule {
  color: var(--p-surface-900);
}

.dark .global-rule {
  color: var(--p-surface-50);
}
```

Component-scoped dark:

```css
.local-rule {
  color: var(--p-surface-900);

  @mixin host-dark {
    color: var(--p-surface-50);
  }
}
```

Should compile like:

```css
.local-rule {
  color: var(--p-surface-900);
}

:host-context(.dark) .local-rule {
  color: var(--p-surface-50);
}
```

Root-variable dark overrides:

```css
:root {
  --app-example-bg: var(--p-surface-0);

  @mixin root-dark {
    --app-example-bg: var(--p-surface-950);
  }
}
```

Should compile like:

```css
:root {
  --app-example-bg: var(--p-surface-0);
}

.dark {
  --app-example-bg: var(--p-surface-950);
}
```

Use the name `root-dark`, not `dark-root`.

Optional property helper:

```css
.rule {
  @mixin light-dark color, var(--p-surface-900), var(--p-surface-50);
}
```

Should compile to a normal declaration plus the correct dark selector for the selected context. Because global and component dark selectors differ, prefer explicit `light-dark` and `host-light-dark` names unless the custom plugin can reliably infer file context.

Do not use native CSS `light-dark()` yet for app theme switching. It follows `color-scheme`, not directly `.dark`, and browser support does not match the current legacy Safari constraints.

---

## Replacing Common `@apply` Patterns

Use direct CSS for ordinary Tailwind utilities:

- layout: `display`, `flex-direction`, `grid-template-columns`, `align-items`, `justify-content`, `gap`;
- spacing/sizing: `padding`, `margin`, `width`, `height`, `min-*`, `max-*`; use `px` values when convenient because `postcss-pxtorem` converts them;
- typography: `font-size: var(--text-sm)`, `line-height: var(--text-sm--line-height)`, `font-weight`, `letter-spacing: var(--tracking-wide)`;
- state variants: nest `&:hover`, `&:focus-visible`, `&:disabled`, `&[aria-selected='true']`;
- important utilities: write the property with `!important`;
- PrimeNG overrides: write normal CSS declarations, using specificity/source order handled by the app PrimeNG style-order patch.

Structural helpers need explicit CSS or mixins:

```css
/* truncate */
overflow: hidden;
text-overflow: ellipsis;
white-space: nowrap;

/* line-clamp-2 */
display: -webkit-box;
overflow: hidden;
-webkit-box-orient: vertical;
-webkit-line-clamp: 2;

/* divide-y */
> :not([hidden]) ~ :not([hidden]) {
  border-top: 1px solid var(--p-surface-200);
}

/* space-y */
> :not([hidden]) ~ :not([hidden]) {
  margin-top: 1rem;
}
```

If these patterns repeat, implement them as explicit PostCSS mixins instead of reintroducing `@apply`.

---

## Avoid

- Do NOT add new `@apply`.
- Do NOT add new `@screen`; use `@media (--*)`.
- Do NOT use Tailwind v4-only CSS directives such as `@reference` or `@variant`.
- Do NOT use `:host ::ng-deep .dark ...`.
- Do NOT use random selector reordering hacks.
- Do NOT rely on raw `.dark .foo` in component CSS.
- Do NOT switch back to `prefers-color-scheme`.

---

## Key Idea

- **Templates** -> Tailwind utilities are fine for unclear/one-off layout.
- **Custom CSS** -> semantic selectors with direct CSS declarations and variables.
- **Global CSS** -> use `.dark ...` normally.
- **Component CSS** -> use direct CSS plus `:host-context(.dark)` where dark-mode scoping matters.
- **Deep Angular/library overrides** -> use separate `:host-context(.dark) ::ng-deep ...` rules.
- **Responsive CSS** -> use `@media (--*)` aliases from `postcss-tailwind-media`.
- **Reusable CSS helpers** -> use project-owned PostCSS mixins, not Tailwind `@apply`.
