# Color Palette Guide (Primary System)

## Goal

Create a predictable **primary** color system based on Tailwind Emerald so every page (landing + app) uses the same logic for:
- base button color
- hover/active states
- soft tinted surfaces
- focus rings
- white text contrast on green-turquoise controls

## Primary scale (Tailwind Emerald)

`primary-*` tokens in `css/app.css` are aliases to built-in Tailwind emerald tokens (`--color-emerald-50...950`).

That means:
- no duplicated hex palette maintenance
- primary colors always stay aligned with original Tailwind emerald scale
- you can still use semantic `primary-*` names in components

## Universal button approach (recommended)

Use `.btn-primary` from `css/app.css` instead of repeating long class chains.

It already encodes the desired contrast behavior:
- light theme base: `bg-primary-500`
- dark theme base: `dark:bg-primary-600`
- light hover: `hover:bg-primary-600`
- dark hover: `dark:hover:bg-primary-700`
- foreground: `text-white`

So you get your preferred pattern (darker step in dark mode) without duplicating classes per button.

## Secondary usage patterns

### Soft blocks / chips
- use `.chip-primary`
- or explicit: `bg-primary-500/10 border-primary-500/20`

### Focus / rings
- use `focus:ring-primary/50` (or `--color-ring` in custom CSS)

### Text/icons
- key highlights: `text-primary` or legacy `text-accent` (alias)

## Landing + app consistency

- Landing may keep richer gradients, but all green accents should derive from `primary-*` tokens.
- App pages should use `.btn-primary` for CTA buttons by default.
- If new shades are needed, extend `primary-*` first, then consume semantically.

## Migration note

Legacy `accent` aliases are kept for compatibility, but new code should prefer `primary` naming.
