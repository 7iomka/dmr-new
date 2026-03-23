# Angular Migration Architecture Report (Phase 0-1)

## 1) Legacy page map (HTML/PHP includes)

### App (authenticated shell)

- `old/home.php`
- `old/dashboard.php`
- `old/wallet.php`, `old/wallet/index.php`, `old/wallet/withdrawals/index.php`, `old/wallet/withdrawals/new/index.php`, `old/wallet/withdrawals/addresses/index.php`, `old/withdraw.php`
- `old/deposit.php`
- `old/investments.php`
- `old/partners.php`
- `old/profile.php`
- `old/settings.php`
- `old/notifications.php`
- `old/report.php`
- `old/news.php`, `old/news-detail.php`
- `old/kyc-verification.php`
- `old/contacts.php`, `old/terms-acceptance.php`

### Auth flow pages

- `old/auth-login.php`, `old/auth-login-email.php`, `old/auth-login-password.php`, `old/auth-login-telegram.php`, `old/auth-login-whatsapp.php`
- `old/auth-register.php`, `old/auth-register-email.php`, `old/auth-register-phone.php`
- `old/auth-forgot.php`, `old/auth-forgot-email.php`, `old/auth-forgot-telegram.php`, `old/auth-forgot-whatsapp.php`
- `old/auth-otp.php`

### Legacy composition dependencies

- Global shell: `old/partials/head.php`, `old/partials/header.php`, `old/partials/desktop-sidebar.php`, `old/partials/footer.php`, `old/partials/scripts.php`
- Mobile/app overlays: `old/partials/app-shell/*`
- Reusable snippets: `old/components/news-card.php`, `old/components/form-control.php`, `old/components/phone-input.php`, `old/components/toggle-switch.php`, `old/components/copy-button.php`

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

| Area       | PrimeNG component                                                  | Use now | Note                                  |
| ---------- | ------------------------------------------------------------------ | ------: | ------------------------------------- |
| Actions    | `Button`                                                           |      ✅ | base CTA and icon buttons             |
| Inputs     | `InputText`, `InputNumber`, `Textarea`                             |      ✅ | auth + profile + KYC forms            |
| Choice     | `Select`, `MultiSelect`, `Checkbox`, `RadioButton`, `ToggleSwitch` |      ✅ | filters and settings                  |
| Data       | `Table`, `Paginator`, `Tag`, `Badge`                               |      ✅ | wallet, investments, reports          |
| Overlays   | `Dialog`, `Drawer`, `ConfirmDialog`, `Tooltip`                     |      ✅ | mobile drawers + confirmations        |
| Navigation | `Menu`, `Breadcrumb`, `Tabs`, `Accordion`                          |      ⚠️ | by page need only                     |
| Feedback   | `Toast`, `Message`, `Skeleton`, `ProgressSpinner`                  |      ✅ | notifications + loading               |
| Date/time  | `DatePicker`                                                       |      ⚠️ | only if report/wallet filters require |

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

- `old/partials/head.php` → Angular build pipeline + global styles + app providers.
- `old/partials/header.php` → `layout/components/app-header`.
- `old/partials/desktop-sidebar.php` + `old/partials/nav-app-desktop-sidebar.php` → `layout/components/app-sidebar` + nav config model.
- `old/partials/app-shell/*` → mobile layout components + overlay outlet.
- `old/partials/footer.php` → `layout/components/app-footer`.
- `old/components/*.php` → standalone reusable UI components in `shared/ui`.

## 8) Current migration status after this iteration

1. Created Angular standalone foundation at repository root with planned app architecture.
2. Added PrimeNG/Tailwind/Lucide dependency scaffold and base provider setup.
3. Implemented shell-first baseline (`sidebar + header + footer + router outlet`) and initial shared UI primitives.
4. Added no full page migration yet by design: next iteration begins with shared table/form/dialog blocks, then page-by-page transfer.
