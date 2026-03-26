# Layout naming rules

## Prefixes

- `app-*` is used for application-level layout components (header, sidebar, footer, page shells).
- `app-*` classes are allowed for layout styling.
- `c-*` is used **only** for reusable UI components (design system blocks).
- Do **not** create `c-*` classes for layout parts or one-off elements.

## How to name layout elements

- If an element belongs to a layout component, use `app-block__element` (BEM style).
- If an element is reusable across multiple places, create a `c-*` block.
- Never treat every DOM node as a separate component.
