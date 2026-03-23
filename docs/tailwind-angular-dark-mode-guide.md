# Tailwind v4 + Angular component CSS (dark mode) — rules for Codex

## Given

- Global `styles.css` is already configured and includes:

```css
@import 'tailwindcss';
@import 'tailwindcss-primeui';
/* ...other imports... */
@custom-variant dark (&:where(.dark, .dark *));
```

- Dark mode is **class-based** via `.dark`.
- This guide is specifically for **component-scoped Angular CSS** connected through `styleUrl`.

---

## Global styles

For `styles.css` and files imported directly into it, use classic selectors normally:

```css
.dark .foo { ... }
```

Angular encapsulation is not a problem there.

---

## Component CSS: required setup

If a component stylesheet uses any Tailwind features such as:

- `@apply`
- `@variant`
- theme tokens / custom variants from global Tailwind context

then add this at the top:

```css
@reference "../../../styles.css";
```

Use the correct relative path for the file.

---

## Preferred pattern for normal local selectors

For normal component-local selectors, prefer `@variant dark` inside the same rule.

### Works well

```css
.block {
  @apply ...;

  @variant dark {
    @apply ...;
  }
}
```

Also valid for plain CSS:

```css
.block {
  color: ...;

  @variant dark {
    color: ...;
  }
}
```

Use this for typical local selectors such as:

- `.auth-title`
- `.auth-link`
- `.auth-method-btn`
- `.auth-method-icon`
- `.auth-divider`
- `.auth-muted`

---

## Do not use raw `.dark .foo` inside component CSS

Even with `@reference`, raw `.dark .foo` inside component-scoped CSS is not the preferred pattern and may behave unexpectedly because of Angular style scoping.

Avoid:

```css
.dark .foo { ... }
```

inside component CSS files.

---

## Special case: `:host`, `::ng-deep`, deep library overrides

For selectors containing:

- `:host`
- `::ng-deep`
- combinations like `:host ::ng-deep ...`
- deep overrides of library internals / pseudo-elements

**do not nest `@variant dark` inside the rule.**

This pattern can compile into broken selectors in Angular component CSS.

### Avoid

```css
:host ::ng-deep .foo {
  ...

  @variant dark {
    ...
  }
}
```

### Use this instead

```css
:host ::ng-deep .foo {
  ...
}

:host-context(.dark) ::ng-deep .foo {
  ...
}
```

This is the preferred pattern for deep library overrides in component CSS.

---

## Important note about `:host-context(.dark)`

When writing dark overrides for deep selectors, use:

```css
:host-context(.dark) ::ng-deep .foo { ... }
```

Do **not** write duplicated host selectors such as:

```css
:host-context(.dark) :host ::ng-deep .foo { ... }
```

Use only one host anchor.

---

## Practical split

### Use `@variant dark` for:

- normal local classes
- hover / state variants on local classes
- component-owned elements

Examples:

```css
.auth-title {
  color: var(--p-surface-900);

  @variant dark {
    color: var(--p-surface-0);
  }
}

.auth-method-btn:hover {
  border-color: ...;

  @variant dark {
    box-shadow: ...;
  }
}
```

### Use `:host-context(.dark)` for:

- `:host ::ng-deep ...`
- PrimeNG / library internals overridden from component CSS
- deep pseudo-elements like `::before` / `::after` under deep selectors

Examples:

```css
:host ::ng-deep .auth-card.p-card {
  background: var(--p-surface-0);
}

:host-context(.dark) ::ng-deep .auth-card.p-card {
  background: ...;
}

:host ::ng-deep .auth-card.p-card::after {
  display: none;
}

:host-context(.dark) ::ng-deep .auth-card.p-card::after {
  display: block;
}
```

---

## Avoid

- Do NOT use `:host ::ng-deep .dark ...`
- Do NOT use random selector reordering hacks
- Do NOT rely on raw `.dark .foo` in component CSS
- Do NOT switch back to `prefers-color-scheme`
- Do NOT put `@variant dark` inside selectors containing `:host` or `::ng-deep`

---

## Key idea

- **Global CSS** → use `.dark ...` normally
- **Component CSS, normal local selectors** → use `@reference` + `@variant dark`
- **Component CSS, deep Angular/library overrides** → use separate `:host-context(.dark) ::ng-deep ...` rules

That’s the rule set.
