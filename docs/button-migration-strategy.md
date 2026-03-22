# Button Migration Strategy (PrimeNG + Tailwind + Lucide vNext)

## Scope and Goal

This document defines a single button strategy for the project foundation during Angular migration.

Goal:
- migrate from legacy `.btn-*` classes;
- use PrimeNG `p-button` as the single source of truth;
- use Lucide icons via native Angular standalone API (no wrappers);
- avoid alternative button systems and duplicated APIs.

## Core Principle

Use `p-button` directly:
- visual style → via PrimeNG theme, design tokens, and variables;
- behavior → via PrimeNG input props;
- layout/geometry → via Tailwind utilities and minimal helper classes only when required;
- icons → via PrimeIcons or Lucide static svg API.

## Canonical Usage

### Primary
<p-button label="Пополнить" />

### Secondary / Danger / Info
<p-button label="Кошелёк" severity="secondary" variant="outlined" />
<p-button label="Удалить" severity="danger" variant="outlined" />
<p-button label="Подробнее" severity="info" variant="outlined" />

### Small
<p-button label="Сохранить" size="small" />

## Icon-Only Buttons

### PrimeIcons
<p-button icon="pi pi-user" [rounded]="true" [text]="true" severity="info" />

### Lucide (CURRENT STANDARD)

Import:
import { LucideCopy } from '@lucide/angular';

Usage:
<p-button [rounded]="true" [text]="true" severity="secondary" styleClass="p-button-icon-only" ariaLabel="Copy">
  <svg lucideCopy class="h-4 w-4"></svg>
</p-button>

## Lucide Usage Rules

- Static icons preferred
- Attribute must be lowerCamelCase (lucideChevronRight)
- Dynamic icons only when necessary
- Do NOT use <lucide-icon> or legacy API

## Legacy → PrimeNG Mapping

- btn-primary → <p-button />
- btn-secondary → severity="secondary" variant="outlined"
- btn-danger → severity="danger" variant="outlined"
- btn-info → severity="info" variant="outlined"
- btn-sm → size="small"
- btn-icon → styleClass="p-button-icon-only"

## Styling Strategy

1) Tokens first  
2) PrimeNG props  
3) Minimal helper classes  

## Usage Rules

- No new .btn-* classes
- No wrapper components
- Start with PrimeNG props
- Then tokens
- Helpers last

## Migration Policy

- All new pages must follow this strategy
- Replace all legacy buttons
- Use static Lucide icons

## Acceptance Criteria

- No .btn-* usage
- Only p-button used
- Lucide uses static API
- Token-based styling
