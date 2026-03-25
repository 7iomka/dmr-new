# DMR Repository

## Structure

- Angular application: repository root
- Legacy PHP application: `old/`
- Documentation: `docs/`
- Code rules and guidelines: `AGENTS.md`

## Run Angular app

```bash
corepack enable
corepack prepare pnpm@10.32.1 --activate
pnpm install
pnpm start
```

## Quality checks

```bash
pnpm lint
pnpm lint:fix
pnpm format
pnpm build
```
