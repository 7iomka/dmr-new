# AGENTS instructions

## Color system policy (entire repo)
- Always use theme tokens and Tailwind-style color scales from `css/app.css`.
- Prefer `accent-*` shades over hardcoded green hex values.
- For new UI states, choose from existing accent scale first (`accent-50...accent-950`).
- Primary button state mapping:
  - base: `bg-accent text-accent-foreground`
  - hover: `hover:bg-accent-700`
  - active: `active:bg-accent-800`
- Read and follow: `docs/color-palette-guide.md`.
