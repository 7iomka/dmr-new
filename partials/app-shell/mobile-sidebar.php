<?php if (shouldUseAppShell()): ?>
  <?php include __DIR__ . '/nav-app-mobile-sidebar.php'; ?>
<?php else: ?>
  <aside id="mobile-sidebar-drawer"
    class="lg:hidden fixed top-0 left-0 bottom-0 w-[320px] max-w-full bg-card border-r border-zinc-200 dark:border-zinc-800 z-[103] flex flex-col">
    <div class="h-16 px-4 flex items-center border-b border-zinc-200 dark:border-zinc-800">
      <a class="h-10 flex items-center shrink-0" href="/home.php">
        <img class="h-full w-auto hidden dark:block" src="/img/logo-light.svg" alt="Logo">
        <img class="h-full w-auto dark:hidden" src="/img/logo-dark.svg" alt="Logo">
      </a>

      <button id="mobile-sidebar-close"
        class="ml-auto p-1.5 rounded-lg text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors"
        aria-label="Close sidebar">
        <i data-lucide="x" class="w-5 h-5"></i>
      </button>
    </div>

    <div class="flex-1 px-3 py-4 pb-10 overflow-y-auto space-y-6">
      <div>
        <p class="px-3 text-[10px] font-bold uppercase tracking-[2px] mb-2 text-zinc-400 dark:text-zinc-600">Навигация</p>
        <div class="flex flex-col gap-1">
          <a href="home.php" class="w-full flex items-center p-3 gap-3 rounded-lg text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white"><i data-lucide="house" class="w-5 h-5"></i><span class="text-sm font-semibold">Главная</span></a>
          <a href="news.php" class="w-full flex items-center p-3 gap-3 rounded-lg text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white"><i data-lucide="newspaper" class="w-5 h-5"></i><span class="text-sm font-semibold">Новости</span></a>
          <a href="contacts.php" class="w-full flex items-center p-3 gap-3 rounded-lg text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white"><i data-lucide="phone" class="w-5 h-5"></i><span class="text-sm font-semibold">Контакты</span></a>
        </div>
      </div>

      <div>
        <p class="px-3 text-[10px] font-bold uppercase tracking-[2px] mb-2 text-zinc-400 dark:text-zinc-600">Аккаунт</p>
        <div class="flex flex-col gap-1">
          <a href="auth-login.php" class="w-full flex items-center p-3 gap-3 rounded-lg text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white"><i data-lucide="log-in" class="w-5 h-5"></i><span class="text-sm font-semibold">Вход</span></a>
          <a href="auth-register.php" class="w-full flex items-center p-3 gap-3 rounded-lg text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white"><i data-lucide="user-plus" class="w-5 h-5"></i><span class="text-sm font-semibold">Регистрация</span></a>
        </div>
      </div>
    </div>
  </aside>
<?php endif; ?>