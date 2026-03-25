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

## Angular implementation rules

- Prefer Angular 21 idioms and official Angular docs first.
- Use standalone Angular APIs and existing project patterns.
- Keep `strictTemplates`-compatible code and avoid template typing shortcuts.
- In Angular lifecycle hooks and regular methods, do NOT use `takeUntilDestroyed()` without an explicit `DestroyRef`. Use `takeUntilDestroyed(this.destroyRef)` instead.
- `takeUntilDestroyed()` without arguments is allowed only in an injection context (for example, constructor or field initializer).
- Do not introduce workaround patterns that bypass Angular typing or lifecycle rules just to silence lint/build errors.
- Prefer explicit, predictable code over clever shorthand in templates and RxJS interop.
- When using Angular control flow (`@if`, `@for`, `@switch`), keep branches exhaustive and type-safe.

## Package manager

- Use `pnpm` only.
- Respect the package manager version declared in `package.json`.
- Use Node.js version compatible with `.nvmrc` and `package.json` engines.

## Validation (MANDATORY — NO EXCEPTIONS)

Before every commit or PR update, run:

```bash
pnpm install --frozen-lockfile
pnpm fix && pnpm check
```

Rules:

- Do NOT commit if validation fails because of code, lint, type, test, or formatting issues.
- Do NOT open or update a PR with unresolved lint, type, test, or formatting issues.
- Always include auto-fixes in the same commit when applicable.
- Repeat until everything passes cleanly.

## Environment failure reporting

- If `pnpm install` fails because of proxy, registry, authentication, network, sandbox, or other environment restrictions, treat it as an environment issue, not a code failure.
- In such cases, do NOT claim validation passed.
- Clearly report the exact failed command and the exact error.
- Still complete the requested code changes as far as possible, but explicitly state that full validation could not be completed due to environment limitations.
