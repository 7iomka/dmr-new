# DMR Angular Foundation (Corrected)

## Stack
- Angular standalone
- PrimeNG styled mode
- Tailwind v4 + official `tailwindcss-primeui` plugin

## Run
```bash
npm install
npm run start
```

## Structure
- `src/app/core/theme` — PrimeNG preset and theme service
- `src/app/layout` — shell (sidebar/header/footer)
- `src/app/features/showcase` — UI playground for foundation validation

## Tailwind policy
- Tailwind is used for layout/spacing/composition around PrimeNG components.
- Visual component states should be defined primarily via PrimeNG theme tokens and component APIs (`severity`, `variant`, `size`, `rounded`, etc.).
- Avoid creating custom wrappers unless they standardize behavior meaningfully.
