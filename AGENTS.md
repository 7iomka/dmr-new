# AGENTS.md (root)

## Repository layout

- Angular application is the primary app at repository root.
- Legacy PHP application is preserved under `old/` as read-only reference.
- Project documentation remains under `docs/`.

## Core rule

- `old/` PHP code is reference-only unless a task explicitly asks for PHP edits.
- New feature work must target Angular code at root.

## Angular source of truth

When editing Angular code, follow these docs first:

- `./docs/primeng-llms-full.txt`
- `./docs/icons-usage-guide.md`
- `./docs/angular-migration-report.md`
- `./docs/ui-guidelines.md`
- `./docs/color-palette-guide.md`
- `./docs/button-migration-strategy.md`
- `./docs/angular-primeng-corrective-report.md`
- `./docs/tailwind-angular-dark-mode-guide.md` ← required for all styling work

## Package manager

- Use `pnpm` only.

## Validation (MANDATORY — NO EXCEPTIONS)

Before EVERY commit or PR update:

```bash
pnpm fix && pnpm check
```

Rules:

- Do NOT commit if any check fails
- Do NOT open/update PR with lint or formatting issues
- Always include auto-fixes in the same commit
- Repeat until everything passes cleanly
