# AI Agent Angular Rules

This document adapts the useful parts of Angular-focused `.cursorrules` for Codex, Antigravity, and other AI coding agents working in this repository.

It is intentionally project-specific. The rules below must be read together with `../AGENTS.md`, `./primeng-llms-full.txt`, `./tailwind-angular-dark-mode-guide.md`, and the migration guides linked from `AGENTS.md`.

## Baseline

- The app is Angular 21, PrimeNG 21, Tailwind CSS 3, and standalone-first.
- Prefer official Angular 21 documentation and this repository's existing patterns over generic snippets from the internet.
- Keep `strictTemplates` compatibility. Do not silence template or TypeScript errors with broad casts, `any`, or untyped helper shortcuts.
- Keep new Angular work in the root Angular app. The `old/` PHP app is read-only reference unless a task explicitly asks for PHP changes.

## Angular Components

- Use standalone components and import dependencies directly in the `imports` array.
- Prefer `input()`, `output()`, `model()`, `signal()`, and `computed()` for new components.
- Prefer `inject()` for dependency injection.
- Mark signal, computed, injected services, and static collections as `readonly` unless they are intentionally reassigned.
- Use `ChangeDetectionStrategy.OnPush` for new reusable/shared components. For routed migration pages, follow the surrounding page pattern and add OnPush when it does not fight an active migration step.
- All routed page components must include:

```ts
host: {
  class: 'app-page',
}
```

- Use `styleUrl` for single component stylesheets to match current project style.
- Keep constructor bodies for orchestration that must run during construction. Do not use constructor parameter injection in new code.
- In lifecycle hooks and regular methods, use `takeUntilDestroyed(this.destroyRef)`, not argument-less `takeUntilDestroyed()`.

## Templates

- Use Angular control flow: `@if`, `@for`, and `@switch`.
- Every `@for` must include a stable `track` expression.
- Prefer `[class.foo]="condition()"` and `[style.foo]="value()"` for simple bindings.
- Avoid `[ngClass]` and `[ngStyle]` in new code. If a class or style map is genuinely needed, keep it typed and derived from a narrow model.
- Keep branches exhaustive and type-safe. Prefer small helper methods/computed values over clever template expressions.
- Use self-closing component tags where appropriate and supported by Angular templates.

## Signals And State

- Use signals for component-local reactive state.
- Use `computed()` for derived state.
- Update writable signals with `.set()` or `.update()`.
- Do not use removed or obsolete signal APIs such as `.mutate()`.
- Use RxJS where streams are the real model: router events, HTTP, forms, cancellation, time, and interop with existing observable APIs.
- When bridging RxJS and signals, keep ownership explicit and clean up subscriptions with `DestroyRef`.

## Services And Data

- App-wide singleton services should use `@Injectable({ providedIn: 'root' })`.
- Use `inject()` for service dependencies.
- Mock API services should mirror intended backend contracts: endpoint shape, field names, statuses, and response payloads.
- Prefer service methods named after backend actions (`get`, `create`, `confirm`, `setDefault`, `delete`) over UI-only helper names.
- If a real backend flow would refetch server state after mutation, prefer the same behavior in mocks unless the task explicitly calls for optimistic UI.

## Routing

- Prefer lazy route boundaries with `loadComponent()` or `loadChildren()` for new larger features.
- Functional guards are preferred for new guards.
- Keep current eager routes unless the task is already touching routing scope or splitting a feature boundary.
- Route-level pages belong under `src/app/features/{feature-name}/`.

## PrimeNG

- Treat `./docs/primeng-llms-full.txt` as the primary local API source.
- Import PrimeNG modules directly into standalone components.
- Use PrimeNG components for app controls instead of custom clones: `p-button`, `p-tag`, `p-card`, `p-table`, `p-dialog`, `p-drawer`, form controls, and related components.
- For buttons, follow `./button-migration-strategy.md`. Use `<p-button>` by default and `[pButton]` for native anchors/buttons that need `routerLink` or custom host semantics.
- Prefer PrimeNG props and theme tokens first, PassThrough or scoped CSS second, Tailwind utilities only for layout and small alignment details.
- Use `styleClass` and PrimeNG PassThrough intentionally when styling PrimeNG internals; do not rely on accidental deep selectors for overlay DOM.

## Icons

- Follow `./icons-usage-guide.md`.
- Use Lucide static Angular icon directives for UI icons.
- For brand/platform icons, use local typed SVG path maps copied from official brand assets or Simple Icons source material.
- Do not install or import `@semantic-icons/simple-icons`; it prebundles thousands of icons in dev mode and slows Chrome DevTools.
- Use PrimeIcons only when a PrimeNG API strictly requires them.
- Do not add icon wrapper components or import whole icon sets.

## Tailwind And CSS

This project uses Tailwind in the opposite way from many generic Angular rulesets.

- Tailwind utilities are allowed mainly in templates for layout, spacing, responsive composition, and small alignment adjustments.
- Do not add new `@apply` in CSS.
- Do not add new `@screen`; use `@media (--*)` aliases from `postcss-tailwind-media`.
- Component CSS should use direct CSS declarations, PrimeNG/project CSS variables, nested CSS, and semantic class names.
- Use PrimeNG semantic tokens and project variables instead of raw colors.
- Never use Tailwind Zinc (`zinc-*`) in new or migrated UI.
- For dark mode in CSS rules, use the project dark mixins. They emit Tailwind 3 selector-mode selectors: `selector:where(.dark, .dark *)`.
- Use `.dark` selectors directly only for shared root variable blocks such as `:root, .dark`.
- For PrimeNG overlay content appended to `body` from a scoped component, use `@mixin dark` on the overlay's local class so the element keeps Angular scoping while matching the root dark class.
- Do not use Tailwind v4 CSS-first syntax; this project is on Tailwind CSS 3.

## Folder Structure

Prefer feature-first structure, but do not create empty ceremony folders.

```text
src/app/
  core/                 app-wide singleton infrastructure
  features/
    {feature-name}/      routed feature pages, feature services, feature models
      components/        feature-only components when the feature grows
      models/            feature-only types when there are enough to group
      services/          feature-only services when there are enough to group
      {feature}.routes.ts for new lazy feature route boundaries
  layout/               app shell and navigation composition
  shared/               reusable UI, directives, pipes, and utilities
```

Guidelines:

- Keep one-page features simple: `{feature}-page.component.ts/html/css` may live directly in the feature folder.
- Add `components/`, `models/`, and `services/` only when they reduce clutter or match an existing local pattern.
- Shared code must be genuinely reused across features. Do not move feature-specific pieces into `shared/` prematurely.
- `core/` is for singleton infrastructure, app-wide APIs, interceptors, guards, theme, and low-level integration code.
- Keep file names hyphenated and aligned with their TypeScript symbol names.

## Naming

- Components: `user-list.component.ts`
- Services: `auth.service.ts`
- Guards: `auth.guard.ts`
- Pipes: `date-format.pipe.ts`
- Directives: `bottom-sheet-drag-dismiss.directive.ts`
- Models/types: use `*.model.ts` only when that convention fits the feature; otherwise colocate narrow types with their component/service.

## Testing And Validation

- Add focused tests when behavior is non-trivial, shared, or easy to regress.
- For simple migration pages, prioritize passing lint, formatting, strict templates, and visual consistency with the migration docs.
- Before every commit or PR update, run the validation commands from `AGENTS.md`:

```bash
pnpm install --frozen-lockfile
pnpm fix && pnpm check
```

## Do Not Copy From Generic Rulesets

- Do not downgrade Angular 21 patterns to Angular 20-era guidance.
- Do not introduce NgModules for new feature work.
- Do not force every file into `pages/models/services` folders when the current feature is small.
- Do not replace PrimeNG component semantics with custom Tailwind component skins.
- Do not add raw legacy colors from `old/**/*.php`; follow `./color-migration-strategy.md`.
- Do not claim validation passed if it was not run or failed for environment reasons.

## References

- Angular style guide: https://angular.dev/style-guide
- Angular signal inputs: https://angular.dev/guide/components/inputs
- Angular dependency injection with `inject()`: https://angular.dev/guide/di/dependency-injection-context
- Angular AI best practices entry point: https://angular.dev/ai
- PrimeNG: https://primeng.org
- Tailwind CSS v3: https://v3.tailwindcss.com
