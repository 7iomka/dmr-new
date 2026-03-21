# UI Guidelines (Skill Code / Dilan Mirror)

## Border Radius

- Cards: rounded-xl (max allowed)
- Inner elements (buttons, inputs): rounded-lg
- Small height elements (chips, badges): rounded-md
- Pills: rounded-full (only for tags / avatars)

## Rules

- Never use rounded-2xl or higher
- Avoid mixing different radius in same component level
- Card header must inherit card radius

## Colors

- Use semantic tokens (accent, card, etc.)
- Never use raw hex in components
- Color palette details: `docs/color-palette-guide.md`

## Button Strategy

- Follow `docs/button-migration-strategy.md` as the mandatory foundation strategy.
- Use PrimeNG `p-button` as the only button component for all new and migrated screens.
- Do not introduce new `.btn-*` classes in migrated/new Angular pages.
