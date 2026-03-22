# AGENTS.md

## Stack

- Angular (standalone)
- PrimeNG (styled mode)
- Tailwind CSS
- TypeScript

---

## Package Manager

- Use **pnpm** for all commands
- Do NOT use npm or yarn

---

## Core Principle

This project follows a **strict design system + PrimeNG-first architecture**.

The LLM MUST:

- follow project documentation as the source of truth;
- avoid inventing patterns;
- avoid recreating UI components;
- always prefer documented approaches over assumptions.

---

## 🔴 PRIMARY SOURCE OF TRUTH (MANDATORY)

You MUST always follow these documents:

- PrimeNG LLM documentation → ../docs/primeng-llms-full.txt
- Icons usage → ../docs/icons-usage-guide.md
- Angular migration architecture → ../docs/angular-migration-report.md
- UI rules → ../docs/ui-guidelines.md
- Color system → ../docs/color-palette-guide.md
- Button strategy → ../docs/button-migration-strategy.md
- PrimeNG corrective strategy → ../docs/angular-primeng-corrective-report.md

### Priority order

1. primeng-llms-full.txt (component API, props, patterns)
2. icons usage/project UI/design docs
3. existing codebase patterns
4. general knowledge

If there is any conflict → follow project docs.

---

## PrimeNG Usage Rules (STRICT)

Always rely on PrimeNG documentation before writing UI.

### Decision order

1. PrimeNG component API (props, severity, variant, size)
2. Theme tokens
3. PassThrough (pt)
4. Tailwind utilities (layout only)

### Forbidden

- ❌ Do NOT create custom UI components that duplicate PrimeNG
- ❌ Do NOT use random Tailwind styling for components
- ❌ Do NOT override styles with arbitrary CSS
- ❌ Do NOT guess component APIs

### Required

- ✅ Use PrimeNG components directly
- ✅ Follow documented props and patterns
- ✅ Use semantic tokens
- ✅ Use PassThrough if customization is needed

---

## Buttons (STRICT BLOCK)

- Only use `<p-button>`
- No `.btn-*` classes
- No custom button implementations

Examples:

```html
<p-button label="Save" />
<p-button severity="secondary" variant="outlined" />
```

Icons:

- Follow icons strategy strictly (../docs/icons-usage-guide.md)
- Use Lucide via **@lucide/angular only**
- Prefer static icons
- Use dynamic only for config/state-driven UI

---

## Design System Rules

### Colors

- ❌ No raw hex values
- ✅ Use `primary-*` tokens only

### Radius

- cards → rounded-xl
- inputs/buttons → rounded-lg
- chips → rounded-md

### General

- ❌ Do not mix radius scales
- ❌ Do not invent new design tokens

---

## Tailwind Usage Policy

Tailwind is ONLY for:

- layout
- spacing
- responsiveness

Tailwind is NOT for:

- recreating component visuals
- replacing PrimeNG styling

---

## Architecture Rules

- Use feature-based structure (features/\*)
- Shared UI only when truly reusable
- Do not duplicate PrimeNG components

Reference:

- ../docs/angular-migration-report.md

---

## Angular Best Practices

- Prefer standalone components
- Prefer ChangeDetectionStrategy.OnPush
- Keep templates simple
- Avoid deep nesting
- Use control flow (@if, @for)

---

## Validation After Edits (MANDATORY)

After every code edit, you MUST run:

1. `pnpm lint:fix`
2. `pnpm format`
3. `pnpm build`

### Rules

- Do NOT skip validation
- Fix all autofixable issues
- Ensure build passes

---

## Code Quality Rules

- Remove unused imports
- Ensure consistent formatting
- Follow ESLint + Prettier rules

---

## Output Rules

- Make minimal safe changes
- Do not rewrite unrelated code
- Preserve structure and naming
- Follow project conventions strictly

---

## Important Note

If unsure about a component, API, or behavior:

→ ALWAYS consult:
../docs/primeng-llms-full.txt

Do NOT guess.
