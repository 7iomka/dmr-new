<!-- MOBILE SIDEBAR DRAWER (app state) -->
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
      <p class="px-3 text-[10px] font-bold uppercase tracking-[2px] mb-2 text-zinc-400 dark:text-zinc-600">Основное</p>
      <div class="flex flex-col gap-1">
        <a href="/dashboard.php" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
          <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
          <span class="text-sm font-semibold">Дашборд</span>
        </a>
        <a href="/investments.php" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
          <i data-lucide="briefcase" class="w-5 h-5"></i>
          <span class="text-sm font-semibold">Инвестиции</span>
        </a>
      </div>
    </div>

    <div>
      <p class="px-3 text-[10px] font-bold uppercase tracking-[2px] mb-2 text-zinc-400 dark:text-zinc-600">Финансы</p>
      <div class="flex flex-col gap-1">
        <a href="/wallet" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
          <i data-lucide="wallet" class="w-5 h-5"></i>
          <span class="text-sm font-semibold">Кошелёк</span>
        </a>
        <a href="/wallet/withdrawals" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
          <i data-lucide="circle-arrow-up" class="w-5 h-5"></i>
          <span class="text-sm font-semibold">Выводы</span>
        </a>
        <a href="/report.php" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
          <i data-lucide="file-text" class="w-5 h-5"></i>
          <span class="text-sm font-semibold">Отчёт</span>
        </a>
      </div>
    </div>

    <div>
      <p class="px-3 text-[10px] font-bold uppercase tracking-[2px] mb-2 text-zinc-400 dark:text-zinc-600">Аккаунт</p>
      <div class="flex flex-col gap-1">
        <a href="/profile.php" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
          <i data-lucide="circle-user" class="w-5 h-5"></i>
          <span class="text-sm font-semibold">Профиль</span>
        </a>
        <a href="/partners.php" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
          <i data-lucide="users" class="w-5 h-5"></i>
          <span class="text-sm font-semibold">Рефералы</span>
        </a>
        <a href="/settings.html" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
          <i data-lucide="settings" class="w-5 h-5"></i>
          <span class="text-sm font-semibold">Настройки</span>
        </a>
      </div>
    </div>

    <div>
      <p class="px-3 text-[10px] font-bold uppercase tracking-[2px] mb-2 text-zinc-400 dark:text-zinc-600">Информация</p>
      <div class="flex flex-col gap-1">
        <a href="/home.php" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
          <i data-lucide="house" class="w-5 h-5"></i>
          <span class="text-sm font-semibold">Главная</span>
        </a>
        <a href="/news.php" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
          <i data-lucide="newspaper" class="w-5 h-5"></i>
          <span class="text-sm font-semibold">Новости</span>
        </a>
        <a href="/contacts.php" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
          <i data-lucide="phone" class="w-5 h-5"></i>
          <span class="text-sm font-semibold">Контакты</span>
        </a>
      </div>
    </div>
  </div>
</aside>