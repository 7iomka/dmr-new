# App Menu Usage Guide for LLM Migrations (English)

## Scope

This guide defines how AI-assisted migrations should implement popup menus in this repository.

## Mandatory rule

When migrating UI from legacy pages or building new Angular popup action menus, **use `app-menu`** (`src/app/shared/components/menu/menu.component.ts`) as the default implementation.

Do **not** introduce direct PrimeNG `p-menu` templates with duplicated custom item markup unless there is a hard blocker.

## Why

`app-menu` already centralizes:

- Active item state and trailing check icon
- Danger styling
- Shared BEM class structure
- Ripple behavior
- Icon extension points (Lucide + custom template + optional PrimeIcons fallback)

Using `app-menu` prevents style drift and repeated one-off templates.

## Icon policy

1. **Primary**: Lucide icons
2. **Secondary**: local brand SVG paths via `iconTemplate` (brands, socials, payment systems, crypto, logos)
3. **Restricted**: PrimeIcons only when explicitly enabled via `[allowPrimeIcons]="true"` and only if no better alternative exists

## Important command-menu behavior

For command-driven menus, avoid model getters that rebuild `items` on every change detection pass.

Use a stable field or `computed()` signal for menu items. This avoids click/focus glitches and keeps command behavior consistent.

## Minimal migration pattern

```html
<p-button (click)="menu.toggle($event)"></p-button>
<app-menu #menu [items]="menuItems()" />
```

```ts
protected readonly menuItems = computed<AppMenuItem[]>(() =>
  options.map((opt) => ({
    label: opt.label,
    active: this.currentSort() === opt.value,
    command: () => this.currentSort.set(opt.value),
  })),
);
```

## Custom icon pattern (brand SVG)

```html
<ng-template #telegramIcon>
  <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path [attr.d]="brandIconPath('telegram')" />
  </svg>
</ng-template>
```

```ts
{ label: 'Telegram', iconTemplate: this.telegramIcon }
```

Use the brand icon policy from `./icons-usage-guide.md`: copy only the needed SVG path from an official brand asset or Simple Icons source material, and do not install/import `@semantic-icons/simple-icons`.

## References

- Shared component: `src/app/shared/components/menu/menu.component.ts`
- Component README: `src/app/shared/components/menu/README.md`
