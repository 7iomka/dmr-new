# PrimeNG + Tailwind Corrective Report (Foundation Rework)

## What was wrong in previous foundation

1. Tailwind integration with PrimeNG was incomplete (official `tailwindcss-primeui` was missing).
2. Styling approach drifted to legacy utility recreation (`.btn-*`, custom badges/cards) instead of PrimeNG component semantics.
3. No explicit cascade strategy (`cssLayer`) to ensure predictable Tailwind overrides over PrimeNG styles.
4. Shared UI wrappers (`card-shell`, `status-badge`) duplicated components already provided by PrimeNG without strong project API benefit.
5. No consolidated showcase page to validate component/tokens/dark-mode behavior in one place.

---

## Official research conclusions

### Sources reviewed
- PrimeNG Tailwind integration: https://primeng.org/tailwind
- PrimeNG Styled theming model: https://primeng.org/theming/styled
- PrimeNG Unstyled model: https://primeng.org/theming/unstyled
- PrimeNG Button API: https://primeng.org/button
- PrimeNG Pass Through: https://primeng.org/passthrough
- PrimeNG migration stream: https://primeng.org/migration/v21

### Tailwind + PrimeNG strategy

Chosen approach:
- Tailwind v4 + `@import 'tailwindcss-primeui'`.
- Dark mode selector aligned between PrimeNG and Tailwind (`.dark`).
- PrimeNG `cssLayer` enabled (`theme, base, primeng`) for safer utility overrides.

Implications:
- Use semantic utilities produced by plugin (`bg-primary`, `text-muted-color`, `bg-surface-*`, etc.) rather than replicating legacy component skins.
- Legacy button utility classes are no longer foundation primitives for Angular code.

### Styled vs Unstyled decision

**Base mode selected: Styled mode.**

Why:
- Faster parity with existing dashboard UI using global preset/token overrides.
- Maintains built-in accessibility and consistent component behavior.
- Reduces custom CSS volume and risk during phased migration.

When deviation is allowed:
- Only for highly custom/headless cases where styled tokens + component props + Pass Through cannot express required UI.
- Deviation should be component-scoped, not project-wide switch to unstyled.

---

## Theming redesign (top-down)

### Level 1: Global preset/tokens
- Created `AppThemePreset` based on Aura using `definePreset`.
- Primary palette mapped to emerald scale (legacy visual intent).
- Light/dark surface scales and global radii tuned.

### Level 2: Component token overrides
- Added token-level adjustments for Button, InputText, Card radii in preset.

### Level 3: Minimal Tailwind utilities
- Tailwind retained for layout/spacing/responsive composition, not replacing component visuals.

### Level 4: Pass Through (policy)
- PT reserved for targeted DOM-part customization when token/API is insufficient.

---

## Tailwind usage policy for this project

Tailwind **is for**:
- layout grids/flex flows;
- spacing and responsive orchestration;
- shell composition and minor visual alignment.

Tailwind **is not for**:
- re-implementing Button/Input/Table/Dialog visuals from scratch if PrimeNG already provides them.

Decision order for new UI:
1) PrimeNG component API (severity/variant/size/rounded/icon/etc.)
2) Theme token override (preset/component tokens)
3) Pass Through / scoped customization
4) Minimal utility additions

---

## Legacy control -> PrimeNG mapping matrix

## Buttons (mandatory block)

| Legacy type | PrimeNG base | Preferred API mapping | Theme/token role | Extra Tailwind |
|---|---|---|---|---|
| primary CTA | `p-button` | default severity | primary semantic tokens | none/minimal layout |
| secondary | `p-button` | `severity="secondary"` | secondary contrast tokens | optional spacing |
| danger/destructive | `p-button` | `severity="danger"` | danger semantic tokens | none |
| outlined | `p-button` | `variant="outlined"` | border/hover token behavior | none |
| text/ghost | `p-button` | `variant="text"` | text/hover tokens | none |
| soft subtle | `p-button` | `severity + variant` combo | token tuning if needed | minimal |
| icon-only | `p-button` | `icon`, `[rounded]`, `[text]` | icon spacing token via theme | none |
| nav inline action | `p-button` | `text/outlined` low emphasis | neutral/surface tokens | layout only |

### Final implementation strategy for buttons
- Do not recreate `.btn-primary/.btn-danger/.btn-ghost` as independent CSS-first primitives.
- Standardize button behavior via PrimeNG props first.
- If app-level convention is needed, use directive-level abstraction over `p-button` inputs, not custom HTML button clone.

---

## Tables / forms / overlays corrective mapping

| Area | PrimeNG component(s) | Primary approach | Allowed extension |
|---|---|---|---|
| Table | `p-table`, paginator | styled mode + token tuning for header/row density | PT for cell-level hooks |
| Forms | `InputText`, `Select`, `ToggleSwitch`, etc. | component APIs + invalid/disabled tokens | minimal layout utilities |
| Dialog/Drawer | `p-dialog`, `p-drawer`, `ConfirmDialog` | styled mode overlays + global overlay tokens | PT for header/body slots |
| Status | `p-tag` / `p-badge` | severity-based semantics | small spacing helpers |

---

## Shared/UI primitives review result

Removed as pseudo-abstractions:
- `card-shell`
- `status-badge`

Reason:
- thin wrappers duplicated PrimeNG components without meaningful normalization API.

Retained abstractions:
- `ThemeService` (actual app concern: mode persistence + root selector toggle)
- Layout shell components (app-level composition concern)

---

## Foundation fixes delivered

1. Added official Tailwind plugin integration (`tailwindcss-primeui`).
2. Aligned dark selector and enabled PrimeNG cssLayer strategy.
3. Reworked theme to use custom PrimeNG preset (`definePreset`) with emerald-based primary and dark/light surfaces.
4. Removed pseudo UI wrappers that duplicated PrimeNG components.
5. Added `showcase` page with real PrimeNG controls:
   - buttons variants
   - input/select/toggle
   - tags
   - table fragment
   - dialog + drawer
   - theme switch in shell

---

## Next step gate (before page migration)

Proceed to page-by-page migration only after showcase is accepted in:
- light + dark modes,
- desktop + mobile breakpoints,
- visual comparison against legacy intent for density, spacing, and hierarchy.
