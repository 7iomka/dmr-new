# App Menu (`app-menu`)

Reusable wrapper around PrimeNG `p-menu` for app-level menu UX/styling.

## Why this component exists

- Centralizes menu visuals (active state, check icon, danger state, BEM classes).
- Avoids repeating `p-menu` custom templates and class wiring across features.
- Adds controlled icon extension points beyond Lucide.

## Rule for feature development

For popup action menus in Angular pages/components, prefer `app-menu` over direct `p-menu` usage.

Use direct PrimeNG `p-menu` only when a feature requires unsupported behavior that cannot be solved by extending `app-menu`.

## Inputs

- `items: AppMenuItem[]`
- `popup: boolean` (default `true`)
- `menuClass: string` (default `''`)
- `allowPrimeIcons: boolean` (default `false`, opt-in fallback only)

## Item model (`AppMenuItem`)

Extends PrimeNG `MenuItem` and supports:

- `active?: boolean` — enables active visual state and trailing check icon.
- `danger?: boolean` — applies danger color styles.
- `icon?: LucideIcon | string`
  - `LucideIcon` (preferred)
  - PrimeIcon class string (`'pi ...'`) only when `allowPrimeIcons` is `true`
- `iconTemplate?: TemplateRef<{ $implicit: AppMenuItem }>` — custom icon slot (highest priority).
- `itemClass?`, `itemActiveClass?`, `linkClass?`, `linkActiveClass?` — class override hooks.

## Icon rendering priority

1. `iconTemplate`
2. Lucide icon from `icon`
3. PrimeIcon class from `icon` when `allowPrimeIcons = true`

## Usage examples

### Basic

```html
<app-menu #actionsMenu [items]="items" />
<button type="button" (click)="actionsMenu.toggle($event)">Open</button>
```

### Stable model for command items (important)

Use a `computed()` signal (or stable field), not a getter that creates a new array each change detection cycle.

```ts
protected readonly menuItems = computed<AppMenuItem[]>(() => [
  {
    label: 'Newest first',
    active: this.sort() === 'date_desc',
    command: () => this.sort.set('date_desc'),
  },
]);
```

### Semantic icon / custom SVG

```html
<ng-template #githubIcon>
  <svg siGithubIcon class="h-4 w-4"></svg>
</ng-template>
```

```ts
protected readonly items: AppMenuItem[] = [
  { label: 'GitHub', iconTemplate: this.githubIcon },
];
```

### PrimeIcons fallback (restricted)

```html
<app-menu [items]="items" [allowPrimeIcons]="true" />
```

```ts
protected readonly items: AppMenuItem[] = [
  { label: 'Search', icon: 'pi pi-search' },
];
```

## Methods

- `toggle(event: Event)`
- `show(event: Event)`
- `hide()`
