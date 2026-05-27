# Production Redesign Migration Guide

This guide is an audit and rollout plan for bringing the layout, styling, class naming, PrimeNG/Tailwind approach, theme configuration, and vendor strategy from this branch into the future production Angular project represented by `./future-src-tree.md`.

The audit is based on the source tree snapshot only. Before real implementation, validate each recommendation against the actual production code, package versions, build configuration, and visual behavior.

## Goal

Introduce the current branch's UI foundation into the production project with the smallest practical blast radius.

Primary target:

- styles;
- markup;
- theme configuration;
- PrimeNG/Tailwind/vendor setup;
- layout shell;
- reusable UI primitives.

Avoid by default:

- rewriting services;
- changing API contracts;
- moving models;
- changing route/data resolver behavior;
- restructuring feature folders only for aesthetic consistency.

## Snapshot Audit

### Production Tree Shape

The future project is organized around:

- `src/app/core` for auth, guards, interceptors, language, request utilities, config, websocket;
- `src/app/config` for app constants and third-party setup;
- `src/app/layout` for app shell, navbar, footer, and mobile bottom nav;
- `src/app/pages` for authenticated/product pages;
- `src/app/landing-pages` for public marketing/static content;
- `src/app/shared` for reusable components, directives, pipes, enumerations, services, query helpers, validators;
- `src/i18n` for translation JSON files;
- `src/styles/scss` and `src/styles/theme` for global SCSS, vendor styles, and a theme/layout layer.

This structure is production-shaped and should mostly remain intact. It has more domain services, translations, resolvers, and shared utilities than this branch, so a broad folder migration would be high-risk and low-value.

### Current Branch Shape

This branch is stronger in these areas:

- PrimeNG styled-mode foundation and theme preset;
- Tailwind v3 integration with `tailwindcss-primeui`;
- token-first color strategy;
- no-new-`@apply` CSS policy;
- class naming boundaries between `app-*` layout classes and `c-*` reusable component classes;
- Lucide-first icon strategy;
- PrimeNG-first buttons, tags, cards, tables, dialogs, and form controls;
- dark mode selector alignment through `.dark`;
- targeted global CSS modules under `src/styles/*.css`.

The valuable asset is the UI foundation, not the exact folder tree.

## Strategic Recommendation

Treat the redesign as a UI foundation overlay on top of the production application.

Do not begin by moving `pages` to `features`, splitting services, or normalizing every model folder. Angular's current style guidance favors feature-area organization and consistency, but it also explicitly values grouping related files and maintaining project consistency. The production tree already follows feature-area organization, just with names like `pages`, `landing-pages`, `core`, and `shared`.

The safest strategy is:

1. Install/configure the UI foundation.
2. Migrate global theme and vendor setup.
3. Migrate layout shell.
4. Migrate shared UI primitives.
5. Migrate page markup and page-local styles feature by feature.
6. Only then consider small structural cleanups where they reduce real friction.

## What To Preserve

Keep these production patterns unless a specific page requires otherwise:

- `pages/` and `landing-pages/` split.
- Existing service/model/resolver locations.
- Existing API, websocket, auth, guard, interceptor, and translation behavior.
- Existing route boundaries and lazy routes unless the task already touches a route.
- Existing i18n keys and translation JSON file ownership.
- Existing domain-specific shared utilities, query builders, validators, and pipes.

Reason: these are backend and product integration surfaces. Changing them during a visual redesign creates avoidable regression risk.

## What To Replace Or Normalize

Prioritize these areas:

- Old SCSS button/card/table/input skins in `src/styles/scss/components`.
- Theme layout SCSS that duplicates app shell responsibilities.
- FontAwesome webfonts for general UI icons.
- Bootstrap-like or custom `.btn-*`, badge, card, table, and alert skins.
- Raw colors and per-component hardcoded dark-mode values.
- One-off class naming that mixes layout, reusable components, and page-specific elements.
- `ng-select` styling patterns where PrimeNG `Select` can take over without breaking forms.

Do not delete vendor or legacy SCSS in one sweep. First redirect new/migrated screens to the new foundation, then remove old layers after usage is proven gone.

## Foundation Import Checklist

### 1. Package And Build Config

Compare production `package.json`, `angular.json`, `postcss.config`, and Tailwind config with this branch.

Target setup:

- Angular 21-compatible packages.
- PrimeNG 21 and `@primeuix/themes`.
- Tailwind CSS 3 unless there is an explicit approved upgrade plan.
- `tailwindcss-primeui`.
- Lucide Angular for UI icons.
- PostCSS custom media/mixins only if production can support the same CSS pipeline.

Do not update unrelated dependencies in the same PR as page markup changes.

### 2. PrimeNG Theme

Port the equivalent of:

- `src/app/core/theme/app-theme.preset.ts`;
- `src/app/core/theme/theme-token.helpers.ts`;
- `providePrimeNG` theme options from `src/main.ts`;
- `.dark` as the shared dark-mode selector.

PrimeNG's styled mode is token-based, so prefer preset semantic/component tokens over large CSS overrides.

Decision point:

- If production currently uses PrimeNG styled mode, migrate tokens in place.
- If production uses a third-party PrimeNG theme SCSS under `src/styles/theme`, introduce styled mode carefully and keep a rollback path.

### 3. Tailwind Integration

Port the project-specific Tailwind strategy, not a generic utility-first rewrite:

- Tailwind utilities for layout, spacing, responsive composition, and small alignment.
- PrimeNG and CSS variables for component visuals.
- `tailwindcss-primeui` semantic classes.
- no Tailwind Zinc palette.
- no new `@apply`.
- no new `@screen`; use configured media aliases if the same PostCSS plugin exists.

In production SCSS, migrate gradually from Sass component skins to CSS variables and semantic component classes.

### 4. Global Styles

Create a controlled global style layer similar to this branch's `src/styles.css` and `src/styles/*.css`.

Suggested layering:

1. fonts;
2. theme variables and color tokens;
3. small global utilities;
4. PrimeNG component customizations;
5. app layout/page primitives;
6. Tailwind base/components/utilities.

Keep production vendor imports isolated. Do not mix vendor reset fixes with page-level redesign CSS.

### 5. Theme Toggle And Dark Mode

Align all systems on `.dark`:

- document root/body class;
- PrimeNG `darkModeSelector`;
- Tailwind `darkMode: ['class']`;
- component CSS with `:host-context(.dark)`;
- global CSS with `.dark`.

Do not support multiple dark-mode selectors during the migration unless production already depends on them. Multiple selectors make visual bugs hard to localize.

### 6. Icons

Use this branch's icon hierarchy:

1. Lucide for UI icons.
2. Simple Icons for brands/platforms.
3. PrimeIcons only when required by PrimeNG.

FontAwesome webfonts in the future tree should be treated as legacy. Replace page by page; remove webfonts only after no templates/styles reference them.

### 7. Shared UI Primitives

Port or recreate only primitives that have real cross-page value:

- form control shell/copy/text/password/select/OTP patterns;
- alert/message patterns;
- pagination/table row patterns;
- page heading/page shell patterns;
- pill tabs/investment tabs if needed by the product surface;
- app menu patterns if production menus match the need.

Avoid thin wrappers around PrimeNG when PrimeNG props already express the design. A wrapper is justified only if it normalizes real repeated behavior, accessibility, or domain-specific markup.

## Page Migration Order

Prefer a vertical-slice migration order:

1. App shell: `layout/app-layout`, `navbar`, `footer`, `mobile-bottom-nav`.
2. Auth: login, register, forgot password, OTP, auth wrapper.
3. Dashboard.
4. Wallet/deposit/withdrawal flows.
5. Investments/share purchase/installments/contracts.
6. Referral.
7. Notifications/chat.
8. Account/profile/settings/KYC.
9. Landing pages/home/news/static/contact.

Rationale:

- shell establishes spacing, navigation, dark mode, and responsive constraints;
- auth is isolated and high-visibility;
- dashboard validates cards, stats, tabs, charts, and page layout;
- wallet/withdrawal validate forms, tables, dialogs, status tags, and confirmation flows;
- landing pages can diverge more visually and should not dictate dashboard primitives.

## Per-Page Migration Procedure

For each page or feature folder:

1. Capture current production screenshots in light/dark and desktop/mobile.
2. Identify all vendor components used by the page: PrimeNG, ng-select, custom dialogs, FontAwesome, charting, tables.
3. Map old UI primitives to target primitives:
   - buttons -> `p-button`;
   - badges/status spans -> `p-tag`;
   - panels/cards -> `p-card` or project `c-*` component class;
   - tables -> PrimeNG table or existing table if data behavior is too coupled;
   - dialogs -> PrimeNG dialog/drawer/confirm dialog;
   - icons -> Lucide static icons.
4. Keep service calls, resolvers, models, and translations unchanged.
5. Rewrite markup for structure and accessibility.
6. Rewrite page/component styles using semantic class names and tokens.
7. Remove page-local legacy style imports only when the migrated page no longer uses them.
8. Validate interactions, forms, i18n strings, responsive behavior, and dark mode.
9. Commit each migrated feature independently.

## Class Naming Rules For Production

Use the same boundaries as this branch:

- `app-*` for application layout components and app shell classes.
- `c-*` for reusable UI/design-system blocks.
- page-specific blocks use the page name, for example `wallet-page__summary`, `dashboard-page__grid`, `auth-page__panel`.

Do not create `c-*` classes for one-off page sections.

Do not treat every DOM element as a reusable component. Extract only when reuse or complexity justifies it.

## Styling Rules For Production Migration

Use this decision order:

1. PrimeNG component API.
2. PrimeNG semantic/component token.
3. Project CSS variable.
4. Scoped semantic CSS class.
5. Tailwind utility for layout/alignment.
6. PassThrough for targeted PrimeNG internals.
7. Deep selector only as a last resort.

Avoid:

- raw hex/rgb colors in components;
- `zinc-*`;
- new `@apply`;
- large page-level Sass maps just to restyle PrimeNG;
- global selectors that accidentally affect multiple production flows;
- custom button/table/badge systems parallel to PrimeNG.

## Folder Structure Guidance

Do not restructure production into this branch's `features/` layout as part of the redesign.

Accepted production mapping:

- `pages/*` is equivalent to feature areas for authenticated app pages.
- `landing-pages/*` is equivalent to public feature areas.
- `layout/*` remains app shell ownership.
- `shared/components/*` remains reusable UI ownership.
- `core/*` remains infrastructure ownership.

Only consider folder changes when:

- a page folder is already being heavily edited;
- files are clearly misplaced;
- the move reduces imports or ownership confusion;
- tests/routes can prove behavior is unchanged.

When adding new UI-only pieces:

- place feature-only components under that feature/page folder;
- place cross-page UI components under `shared/components`;
- place app shell components under `layout`;
- avoid new service/model folders unless the feature already has that convention.

## Vendor Migration Notes

### PrimeNG

Use PrimeNG as the default UI suite. Preserve current production data behavior while replacing visual wrappers.

### ng-select

Replace with PrimeNG `Select` only where form contracts and search behavior are straightforward. If a production flow depends on custom `ng-select` behavior, defer replacement and only align its styles.

### FontAwesome

Treat as legacy. Replace UI icons with Lucide, but keep brand/social icons until a Simple Icons mapping is verified.

### Charts

Do not rewrite chart data/services for visual consistency. Wrap or restyle chart containers first; change chart libraries only as a separate technical decision.

### Translation

Keep translation keys stable. Redesign markup should consume the same keys unless copy itself is part of the product task.

## PR Slicing

Recommended PR sequence:

1. UI foundation config: packages, Tailwind/PostCSS, PrimeNG theme, global variables, dark-mode service.
2. Vendor/icon foundation: Lucide config, FontAwesome deprecation path, PrimeNG button/tag/table/dialog baseline.
3. App shell redesign.
4. Shared UI primitives.
5. Auth pages.
6. Dashboard.
7. Wallet/withdrawal.
8. Investments/referral.
9. Notifications/chat.
10. Account/settings/KYC.
11. Landing pages.
12. Legacy style cleanup.

Keep each PR shippable and visually testable. Avoid PRs that mix foundation config, service refactors, and multiple page redesigns.

## Validation Checklist

For every migration slice:

- build passes;
- lint/format passes;
- type checking and strict templates pass;
- no new dependency drift unless intended;
- light/dark screenshots checked;
- desktop/tablet/mobile checked;
- forms still submit and validate;
- dialogs/drawers trap focus and close correctly;
- translated strings still render;
- route guards/resolvers still fire;
- no obvious duplicate vendor CSS order issue;
- no global selector unexpectedly changes unrelated pages.

For final cleanup:

- search for `.btn-`, FontAwesome class names, old badge/card/table classes, raw colors, and `zinc-`;
- remove unused SCSS imports one by one;
- remove unused font assets only after template/style search confirms no references;
- compare bundle/CSS size before and after cleanup.

## Risks

- Global SCSS in the production tree may have broad selectors that override PrimeNG or Tailwind unpredictably.
- Existing services/components may assume specific DOM structures for modals, tables, or form controls.
- Translation directives/pipes may make template rewrites noisier than this branch's simpler templates.
- Vendor CSS order can break PrimeNG styled mode if old theme SCSS remains active.
- Replacing ng-select or custom responsive tables can accidentally change keyboard and mobile behavior.
- Landing pages likely need a looser visual system than authenticated dashboard pages.

## Non-Goals

- Full Angular architecture rewrite.
- Moving all `pages` into `features`.
- Rewriting services to signals.
- Replacing all RxJS usage.
- Renaming every model folder from `model` to `models`.
- Removing all old SCSS before migrated pages prove the new foundation.

## References

- Angular style guide: https://angular.dev/style-guide
- PrimeNG Tailwind integration: https://primeng.org/tailwind
- PrimeNG styled theming: https://primeng.org/theming/styled
- Local AI agent rules: `./ai-agent-angular-rules.md`
- Local Tailwind/dark-mode rules: `./tailwind-angular-dark-mode-guide.md`
- Local UI guidelines: `./ui-guidelines.md`
- Local layout naming rules: `./layout-class-naming-rules.md`
