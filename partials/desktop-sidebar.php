<?php if (shouldUseAppShell()): ?>
  <?php include __DIR__ . '/nav-app-desktop-sidebar.php'; ?>
<?php else: ?>
  <aside id="sidebar"
    class="app-sidebar hidden lg:flex flex-col border-r border-zinc-200 dark:border-zinc-800 sidebar-transition z-50 h-screen fixed inset-y-0 left-0 bg-card">
    <div class="relative h-20 px-2 flex items-center justify-between">
      <a class="sidebar-logo-link h-full pl-4 flex items-center shrink-0 transition-all" href="/home.php">
        <img class="sidebar-logo-full h-12 w-auto hidden dark:block" src="/img/logo-light.svg" alt="Logo">
        <img class="sidebar-logo-full h-12 w-auto dark:hidden" src="/img/logo-dark.svg" alt="Logo">
        <img class="sidebar-logo-icon h-12 w-auto hidden" src="/img/logo-icon-only.svg" alt="Logo">
      </a>
      <button onclick="toggleSidebar()"
        class="js-desktop-sidebar-toggle absolute -right-3.5 top-0 bottom-0 my-auto hidden lg:flex w-7 h-7 items-center justify-center text-zinc-500 bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 border border-zinc-200 dark:border-zinc-700 rounded-md transition-colors">
        <i class="w-4.5 h-4.5 transition-transform duration-300 [.sidebar-collapse_&]:rotate-180" data-lucide="chevrons-left"></i>
      </button>
    </div>

    <div class="flex-1 px-2 py-4 pb-10 overflow-y-auto space-y-8">
      <div>
        <p class="sidebar-section-title px-4 text-[10px] font-bold uppercase tracking-[2px] mb-3 text-zinc-400 dark:text-zinc-600">
          <span class="sidebar-label">Навигация</span>
        </p>

        <div class="flex flex-col gap-1">
          <a href="home.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
            <div class="sidebar-link-icon flex items-center justify-center"><i data-lucide="house" class="w-5 h-5"></i></div>
            <span class="sidebar-label text-sm font-semibold">Главная</span>
          </a>
          <a href="news.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
            <div class="sidebar-link-icon flex items-center justify-center"><i data-lucide="newspaper" class="w-5 h-5"></i></div>
            <span class="sidebar-label text-sm font-semibold">Новости</span>
          </a>
          <a href="contacts.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
            <div class="sidebar-link-icon flex items-center justify-center"><i data-lucide="phone" class="w-5 h-5"></i></div>
            <span class="sidebar-label text-sm font-semibold">Контакты</span>
          </a>
        </div>
      </div>

      <div>
        <p class="sidebar-section-title px-4 text-[10px] font-bold uppercase tracking-[2px] mb-3 text-zinc-400 dark:text-zinc-600">
          <span class="sidebar-label">Аккаунт</span>
        </p>

        <div class="flex flex-col gap-1">
          <a href="auth-login.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
            <div class="sidebar-link-icon flex items-center justify-center"><i data-lucide="log-in" class="w-5 h-5"></i></div>
            <span class="sidebar-label text-sm font-semibold">Вход</span>
          </a>
          <a href="auth-register.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
            <div class="sidebar-link-icon flex items-center justify-center"><i data-lucide="user-plus" class="w-5 h-5"></i></div>
            <span class="sidebar-label text-sm font-semibold">Регистрация</span>
          </a>
        </div>
      </div>
    </div>
  </aside>
<?php endif; ?>
