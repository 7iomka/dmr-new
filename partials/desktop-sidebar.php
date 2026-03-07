<?php if (shouldUseAppShell()): ?>
  <?php include __DIR__ . '/nav-app-desktop-sidebar.php'; ?>
<?php else: ?>
  <aside id="sidebar"
    class="app-sidebar hidden lg:flex flex-col border-r gap-4 border-zinc-200 dark:border-zinc-800 sidebar-transition z-50 h-screen fixed inset-y-0 left-0 bg-card">
    <div class="relative h-20 px-2 flex items-center justify-between">
      <a class="sidebar-logo-link h-full pl-4 flex items-center shrink-0 transition-all" href="/home.php">
        <img class="sidebar-logo-full h-12 w-auto hidden dark:block" src="/img/logo-light.svg" alt="Logo">
        <img class="sidebar-logo-full h-12 w-auto dark:hidden" src="/img/logo-dark.svg" alt="Logo">
      </a>
    </div>

    <div class="flex-1 px-2 overflow-y-auto space-y-8">
      <div>
        <p class="sidebar-section-title px-4 text-[10px] font-bold uppercase tracking-[2px] mb-3 text-zinc-400 dark:text-zinc-600">
          <span class="sidebar-label">Публичное</span>
        </p>

        <div class="space-y-1">
          <a href="home.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
            <span class="sidebar-label text-sm font-semibold">Главная</span>
          </a>
          <a href="news.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
            <span class="sidebar-label text-sm font-semibold">Новости</span>
          </a>
          <a href="<?= htmlspecialchars(demoAuthUrl('1'), ENT_QUOTES, 'UTF-8') ?>"
            class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
            <span class="sidebar-label text-sm font-semibold">Войти (demo)</span>
          </a>
        </div>
      </div>
    </div>
  </aside>
<?php endif; ?>
