# Angular Migration Architecture Report (Phase 0-1)

## 1) Legacy page map (HTML/PHP includes)

### App (authenticated shell)
- `home.php`
- `dashboard.php`
- `wallet.php`, `wallet/index.php`, `wallet/withdrawals/index.php`, `wallet/withdrawals/new/index.php`, `wallet/withdrawals/addresses/index.php`, `withdraw.php`
- `deposit.php`
- `investments.php`
- `partners.php`
- `profile.php`
- `settings.php`
- `notifications.php`
- `report.php`
- `news.php`, `news-detail.php`
- `kyc-verification.php`
- `contacts.php`, `terms-acceptance.php`

### Auth flow pages
- `auth-login.php`, `auth-login-email.php`, `auth-login-password.php`, `auth-login-telegram.php`, `auth-login-whatsapp.php`
- `auth-register.php`, `auth-register-email.php`, `auth-register-phone.php`
- `auth-forgot.php`, `auth-forgot-email.php`, `auth-forgot-telegram.php`, `auth-forgot-whatsapp.php`
- `auth-otp.php`

### Legacy composition dependencies
- Global shell: `partials/head.php`, `partials/header.php`, `partials/desktop-sidebar.php`, `partials/footer.php`, `partials/scripts.php`
- Mobile/app overlays: `partials/app-shell/*`
- Reusable snippets: `components/news-card.php`, `components/form-control.php`, `components/phone-input.php`, `components/toggle-switch.php`, `components/copy-button.php`

## 2) Reusable blocks map

- **Layout shell**: desktop sidebar, header/top bar, content container, footer.
- **Mobile shell**: bottom nav, mobile sidebar, profile drawer, floating chat FAB, overlay layer.
- **Reusable content**:
  - cards (dashboard widgets, balances, info panels)
  - tables (wallet operations, investments, history)
  - forms (auth, profile, KYC wizard)
  - tags/badges/status chips
  - dialogs/drawers and confirmations
  - toast/message notifications
  - empty/loading states

## 3) Angular component map (target)

### App shell + layout
- `layout/app-shell`
- `layout/components/app-sidebar`
- `layout/components/app-header`
- `layout/components/app-footer`
- `layout/components/mobile-bottom-nav`
- `layout/components/mobile-user-drawer`

### Shared UI layer
- `shared/ui/card-shell`
- `shared/ui/data-table`
- `shared/ui/form-field`
- `shared/ui/status-badge`
- `shared/ui/dialog-shell`
- `shared/ui/empty-state`
- `shared/ui/skeleton-block`

### Feature slices (page orchestration)
- `features/dashboard`
- `features/wallet`
- `features/investments`
- `features/news`
- `features/kyc`
- `features/settings`
- `features/auth`

## 4) PrimeNG selection (only real candidates)

| Area | PrimeNG component | Use now | Note |
|---|---|---:|---|
| Actions | `Button` | ✅ | base CTA and icon buttons |
| Inputs | `InputText`, `InputNumber`, `Textarea` | ✅ | auth + profile + KYC forms |
| Choice | `Select`, `MultiSelect`, `Checkbox`, `RadioButton`, `ToggleSwitch` | ✅ | filters and settings |
| Data | `Table`, `Paginator`, `Tag`, `Badge` | ✅ | wallet, investments, reports |
| Overlays | `Dialog`, `Drawer`, `ConfirmDialog`, `Tooltip` | ✅ | mobile drawers + confirmations |
| Navigation | `Menu`, `Breadcrumb`, `Tabs`, `Accordion` | ⚠️ | by page need only |
| Feedback | `Toast`, `Message`, `Skeleton`, `ProgressSpinner` | ✅ | notifications + loading |
| Date/time | `DatePicker` | ⚠️ | only if report/wallet filters require |

## 5) PrimeNG customization strategy

- Use **styled mode** with global token overrides first (faster parity with legacy).
- Keep wrapper components for:
  - `ui-button` (maps legacy `.btn-primary` states)
  - `ui-data-table` (typography, row heights, border rhythm)
  - `ui-dialog-shell` / `ui-drawer-shell` (overlay spacing, radius, dark mode)
- Use Tailwind + CSS variables for precise parity, not default out-of-the-box Prime visuals.

## 6) Theme + design-system baseline

### Global tokens
- Surface/background/text/border from current `css/app.css` token system.
- Primary color from existing emerald-based scale (`primary-50..950`).
- Standard radii:
  - card: `rounded-xl`
  - controls: `rounded-lg`
  - micro-elements: `rounded-md`
- Focus ring: primary-based contrast ring for both themes.

### Light/dark parity points to lock
- body background, card background, muted text, border contrast
- table header/background differences
- input autofill and focus behavior
- overlay backdrop opacity and z-index stacking

### Overlay z-index strategy
- `header`: 40
- `desktop sidebar`: 50
- `mobile drawer`: 60+
- dialogs/confirm: PrimeNG overlay layer with project override tokens

## 7) PHP include to Angular composition mapping

- `partials/head.php` → Angular build pipeline + global styles + app providers.
- `partials/header.php` → `layout/components/app-header`.
- `partials/desktop-sidebar.php` + `partials/nav-app-desktop-sidebar.php` → `layout/components/app-sidebar` + nav config model.
- `partials/app-shell/*` → mobile layout components + overlay outlet.
- `partials/footer.php` → `layout/components/app-footer`.
- `components/*.php` → standalone reusable UI components in `shared/ui`.

## 8) Current migration status after this iteration

1. Created Angular standalone foundation in `frontend-angular` with planned app architecture.
2. Added PrimeNG/Tailwind/Lucide dependency scaffold and base provider setup.
3. Implemented shell-first baseline (`sidebar + header + footer + router outlet`) and initial shared UI primitives.
4. Added no full page migration yet by design: next iteration begins with shared table/form/dialog blocks, then page-by-page transfer.
