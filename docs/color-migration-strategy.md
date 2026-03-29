# Color Migration Strategy (Old → Angular + PrimeNG)

## Core rule

When migrating pages from `old/**/*.php`, **do not reuse Zinc palette**.
Always map colors to **PrimeNG semantic tokens** (`surface`, `text`, etc.).

---

## Surface colors (backgrounds, borders, containers)

**Old (Tailwind Zinc):**

```html
bg-zinc-900
text-zinc-200
border-zinc-700
```

**New (use PrimeNG surface palette):**

```html
bg-surface-900
text-surface-200
border-surface-700
```

Or in CSS variables:

```css
--p-surface-900
--p-surface-200
--p-surface-700
```

👉 Rule:

- Tailwind classes → `*-surface-*`
- CSS variables → `--p-surface-*`

---

## Muted / secondary text

In old UI, secondary text was often:

```html
text-zinc-500
```

In new UI, **do NOT map directly to surface**.

**Use semantic muted color instead:**

```html
text-muted-color
```

Or in CSS:

```css
--p-text-muted-color
```

👉 Rule:

- Any “less important text” → `text-muted-color`
- Never use `text-surface-*` for semantic text hierarchy

---

## Summary

| Purpose     | Old (Zinc)     | New (PrimeNG)     |
| ----------- | -------------- | ----------------- |
| Background  | bg-zinc-\*     | bg-surface-\*     |
| Text (main) | text-zinc-\*   | text-surface-\*   |
| Borders     | border-zinc-\* | border-surface-\* |
| Muted text  | text-zinc-500  | text-muted-color  |

---

## Key principle

- ❌ Do not copy colors literally
- ✅ Always convert to **semantic tokens** (surface / muted / etc.)
- ✅ Prefer PrimeNG design system over Tailwind raw palette
