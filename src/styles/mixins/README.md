# PostCSS Mixins

The project uses `postcss-mixins` from `postcss.config.json`:

```json
"postcss-mixins": {
  "mixinsFiles": ["./src/styles/mixins/**/*.css", "./src/styles/mixins/**/*.js"]
}
```

Use CSS `@define-mixin` files for simple declaration helpers. They are easy to read and can be discovered by editor extensions such as `postcss-mixins-autocomplete`. The workspace settings point that extension at `src/styles/mixins/**/*.css` and `src/**/*.css`.

Use JavaScript mixin files only when the helper must rewrite selectors, such as dark-mode helpers for global CSS, Angular component CSS, or root variables.

## Supported Mixins

Global dark:

```css
.card {
  @mixin light-dark color, var(--p-surface-900), var(--p-surface-50);

  @mixin dark {
    border-color: var(--p-surface-700);
  }
}
```

Component-scoped dark:

```css
:host {
  @mixin host-dark {
    color: var(--p-surface-50);
  }
}
```

Root variable dark:

```css
:root {
  --app-card-bg: var(--p-surface-0);

  @mixin root-dark {
    --app-card-bg: var(--p-surface-950);
  }
}
```

Simple helpers:

```css
.title {
  @mixin truncate;
}

.description {
  @mixin line-clamp 2;
}

.avatar {
  @mixin size 2.5rem;
}
```

## Forbidden Helpers

Do not add `space-y`, `space-x`, `divide-y`, or `divide-x` mixins.

Use flex/grid `gap` for spacing:

```css
.stack {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
```

Use explicit semantic selectors for separators:

```css
.rows > :not(:last-child) {
  border-bottom: 1px solid var(--p-surface-200);
}
```
