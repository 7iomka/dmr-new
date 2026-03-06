# AGENTS instructions

## Color system policy (entire repo)
- Always use theme tokens and Tailwind-style color scales from `css/app.css`.
- Prefer `primary-*` shades (Tailwind Emerald) over hardcoded green hex values.
- For new UI states, choose from existing primary scale first (`primary-50...primary-950`).
- Primary button state mapping:
  - base: `bg-primary-500 dark:bg-primary-600 text-white`
  - hover: `hover:bg-primary-600 dark:hover:bg-primary-700`
  - active: `active:bg-primary-700 dark:active:bg-primary-800`
- Use `.btn-primary` where possible instead of repeating long utility chains.
- Read and follow: `docs/color-palette-guide.md`.
