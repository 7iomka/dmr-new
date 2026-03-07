<div class="hidden md:flex items-center gap-2 px-3 py-1.5 rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900/50">
  <span class="text-[10px] font-bold uppercase tracking-wide text-zinc-500">Demo Auth:</span>
  <span class="text-[10px] font-bold <?= shouldUseAppShell() ? 'text-primary-600 dark:text-primary-400' : 'text-zinc-600 dark:text-zinc-300' ?>">
    <?= demoAuthStatusLabel() ?>
  </span>
  <a href="<?= htmlspecialchars(demoAuthUrl('toggle'), ENT_QUOTES, 'UTF-8') ?>" class="btn-primary text-[10px] px-2 py-1 rounded-md">Toggle</a>
  <a href="<?= htmlspecialchars(demoAuthUrl('0'), ENT_QUOTES, 'UTF-8') ?>" class="text-[10px] px-2 py-1 rounded-md border border-zinc-200 dark:border-zinc-700 text-zinc-500 hover:text-zinc-900 dark:hover:text-white">Guest</a>
  <a href="<?= htmlspecialchars(demoAuthUrl('1'), ENT_QUOTES, 'UTF-8') ?>" class="text-[10px] px-2 py-1 rounded-md border border-zinc-200 dark:border-zinc-700 text-zinc-500 hover:text-zinc-900 dark:hover:text-white">Auth</a>
</div>
