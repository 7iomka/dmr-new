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

1. `./docs/primeng-llms-full.txt` ← PRIMARY SOURCE (component APIs, patterns)
2. `./docs/tailwind-angular-dark-mode-guide.md` ← REQUIRED for all styling work
3. `./docs/color-migrations-strategy.md` ← REQUIRED for ALL migrations from old/\*_/_.php
4. `./docs/button-migration-strategy.md`
5. `./docs/icons-usage-guide.md`
6. `./docs/angular-migration-report.md`
7. `./docs/ui-guidelines.md`
8. `./docs/color-palette-guide.md` ← Applied only for old/\*_/_.php
9. `./docs/angular-primeng-corrective-report.md`

### Critical rules for Codex

- When migrating UI from `old/**/*.php`, you MUST follow:
  - `./docs/color-migrations-strategy.md` (NO EXCEPTIONS)
- NEVER reuse Tailwind Zinc palette (`zinc-*`)
- ALWAYS convert colors to PrimeNG semantic tokens (`surface`, `text`, `muted`, etc.)
- Prefer semantic tokens over raw colors in ALL cases
- All routed page components MUST include:
  ```ts
  host: {
    class: 'app-page',
  }
  ```

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
