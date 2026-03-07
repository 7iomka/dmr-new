<?php if (shouldUseAppShell()): ?>
  <?php include __DIR__ . '/nav-app-mobile-sidebar.php'; ?>
<?php else: ?>
  <aside id="mobile-sidebar-drawer"
    class="lg:hidden fixed top-0 left-0 bottom-0 w-[78%] max-w-[320px] bg-card border-r border-zinc-200 dark:border-zinc-800 z-[103] flex flex-col">
    <div class="h-16 flex items-center px-4 border-b border-zinc-200 dark:border-zinc-800">
      <span class="font-bold text-sm tracking-tight uppercase text-zinc-900 dark:text-white">Меню</span>
      <button id="mobile-sidebar-close"
        class="ml-auto p-2 rounded-lg text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors"
        aria-label="Close sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 6 6 18"></path>
          <path d="m6 6 12 12"></path>
        </svg>
      </button>
    </div>

    <div class="flex-1 px-3 py-4 overflow-y-auto space-y-2">
      <a href="home.php" class="w-full flex items-center p-3 gap-3 rounded-lg text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
        <span class="text-sm font-semibold">Главная</span>
      </a>
      <a href="news.php" class="w-full flex items-center p-3 gap-3 rounded-lg text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
        <span class="text-sm font-semibold">Новости</span>
      </a>
      <a href="<?= htmlspecialchars(demoAuthUrl('1'), ENT_QUOTES, 'UTF-8') ?>" class="w-full flex items-center p-3 gap-3 rounded-lg text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
        <span class="text-sm font-semibold">Войти (demo)</span>
      </a>
    </div>
  </aside>
<?php endif; ?>
