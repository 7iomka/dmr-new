# AGENTS.md (root)

## Project Context

This repository contains:

- Legacy PHP application (source of truth for UI and flows)
- Angular application (target implementation)

---

## Core Rule

- PHP code is READ-ONLY reference (unless the task involves creating a PHP page or making corrections to existing PHP code)
- Angular is the ONLY target for new code (unless the task involves creating a PHP page or making corrections to existing PHP code)

---

## Migration Policy

When implementing features:

1. Analyze PHP pages for:
   - layout
   - structure
   - business logic
   - UI behavior

2. Reimplement in Angular using:
   - PrimeNG components
   - project design system
   - Angular architecture

---

## STRICT RULES

- ❌ Do NOT write PHP
- ❌ Do NOT copy HTML blindly
- ❌ Do NOT reuse legacy CSS classes (.btn-*, etc.)

- ✅ Translate logic into Angular components
- ✅ Use PrimeNG instead of raw HTML
- ✅ Follow frontend-angular/AGENTS.md

---

## Angular Rules

All Angular code MUST follow:

→ frontend-angular/AGENTS.md

---

## Important

If working inside Angular:

- Ignore legacy PHP patterns
- Use them only as reference
- Do not replicate outdated approaches