# Color Palette Guide (Accent System)

## Goal

Create a predictable accent scale for all pages (including landing) so designers/developers always know which shade to use for:
- default accent
- hover/active states
- subtle backgrounds
- focus rings
- readable text on accent surfaces

## Accent scale (Tailwind-style)

Use only these tokens from `css/app.css`:

- `accent-50` `#eefbf4`
- `accent-100` `#d6f5e4`
- `accent-200` `#aeeccb`
- `accent-300` `#7de0ab`
- `accent-400` `#48cf88`
- `accent-500` `#22be6f`
- `accent-600` `#00b074` (brand default)
- `accent-700` `#009663` (hover)
- `accent-800` `#0b7550` (active/pressed)
- `accent-900` `#0d6043`
- `accent-950` `#063625`

Semantic aliases:
- `--color-accent` -> default brand (`accent-600`)
- `--color-accent-foreground` -> text on accent surface (`#fff`)

## Usage rules

### Buttons (primary)
- Base: `bg-accent text-accent-foreground`
- Hover: `hover:bg-accent-700`
- Active: `active:bg-accent-800`
- Shadow: `shadow-accent/20`

### Accent text/icons
- Use `text-accent` for key numbers/statuses.
- For muted accent text on light surfaces, prefer `text-accent-700`.

### Accent borders and soft surfaces
- Soft background: `bg-accent/10`
- Soft border: `border-accent/20`
- Hover border emphasis: `hover:border-accent/50`

### Focus states
- Use `focus:ring-accent/50` or token `--color-ring`.

## Landing vs other pages

- Landing can use richer gradients, but all green accents must derive from `accent-*` scale.
- Body dark background remains global (`--color-dark-bg`) to keep cross-page consistency.
- If you need new green shades, extend `accent-*` scale first, then consume via utilities.

## Do / Don't

Do:
- use semantic utilities (`bg-accent`, `hover:bg-accent-700`, `text-accent`)
- use scale values for deterministic states

Don't:
- introduce raw hex in components (`#009663`, `#00B074`, etc.)
- invent one-off hover shades outside the scale
