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
- Color palette details: `./color-palette-guide.md`

## CSS And Tailwind

- Do not add new `@apply` in custom CSS files.
- Use direct CSS declarations with project/PrimeNG variables for semantic selectors and PrimeNG overrides.
- Keep Tailwind utilities directly in templates for unclear or one-off layout blocks until they become semantic classes/components.
- Do not add new `@screen`; use `@media (--*)` aliases from `postcss-tailwind-media`.
- For dark mode in CSS rules, use the project dark mixins; they emit Tailwind selector-mode selectors.
- Use `.dark` selectors directly only for shared root variable blocks such as `:root, .dark`.
- Root-level variables consumed by components must be theme-aware at their global source. Do not redefine shared `:root` theme variables inside encapsulated component CSS.
- Full rules: `./tailwind-angular-dark-mode-guide.md`
- Implementation plan: `./apply-removal-postcss-plan.md`

## Button Strategy

- Follow `./button-migration-strategy.md` as the mandatory foundation strategy.
- Use PrimeNG `p-button` as the only button component for all new and migrated screens.
- Prefer the `<p-button>` component by default for regular app buttons.
- Use the `pButton` directive only when a native or custom host element is actually required by the markup.
- Do not introduce new `.btn-*` classes in migrated/new Angular pages.

## Tags And Statuses

- Use PrimeNG `p-tag` for all statuses, chips, badges, and compact semantic markers.
- Do not introduce custom badge classes like `c-badge`; this pattern does not exist in the Angular app.
- If legacy PHP used a badge-like span, migrate it to `p-tag` instead of recreating legacy CSS.

## Mock API Contracts

- Mock services should mirror the intended backend contract as closely as possible: endpoint shape, field names, statuses, and response payloads.
- Prefer service methods that reflect backend actions (`get`, `create`, `confirm`, `setDefault`, `delete`) instead of purely UI-shaped helpers.
- If a real flow would refetch server state after a mutation, prefer the same behavior in mocks unless there is a clear need for optimistic UI.
