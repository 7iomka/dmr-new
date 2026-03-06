# Color Palette Guide (Primary System)

## Goal

Create a predictable **primary** color system based on Tailwind Emerald so every page (landing + app) uses the same logic for:
- base button color
- hover/active states
- soft tinted surfaces
- focus rings
- white text contrast on green-turquoise controls

## Primary scale (Tailwind Emerald)

Use this scale from `css/app.css`:

- `primary-50` `#ecfdf5`
- `primary-100` `#d1fae5`
- `primary-200` `#a7f3d0`
- `primary-300` `#6ee7b7`
- `primary-400` `#34d399`
- `primary-500` `#10b981`
- `primary-600` `#059669`
- `primary-700` `#047857`
- `primary-800` `#065f46`
- `primary-900` `#064e3b`
- `primary-950` `#022c22`

Semantic aliases:
- `--color-primary` -> default (`primary-500`)
- `--color-primary-foreground` -> `#ffffff`
- `--color-ring` -> ring from `primary`

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
