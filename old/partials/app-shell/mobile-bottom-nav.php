<!-- BOTTOM NAV (mobile) -->
<nav class="lg:hidden fixed bottom-0 left-0 right-0 h-15 bg-card border-t border-zinc-200 dark:border-zinc-800 flex justify-around z-[100]">
  <button id="sidebar-trigger" class="flex flex-col flex-1 min-w-0 items-center gap-1 justify-center text-zinc-500 dark:text-zinc-400 outline-none transition-colors">
    <i data-lucide="text-align-justify" class="w-5 h-5"></i>
    <span class="text-[9px] font-bold uppercase">Меню</span>
  </button>

  <?php if (shouldUseAppShell()): ?>
    <a href="/investments.php" class="flex flex-col flex-1 min-w-0 items-center gap-1 justify-center text-zinc-500 dark:text-zinc-400 outline-none transition-colors">
      <i data-lucide="briefcase" class="w-5 h-5"></i>
      <span class="text-[9px] font-bold uppercase">Инвестиции</span>
    </a>
    <button id="user-trigger" class="flex flex-col flex-1 min-w-0 items-center gap-1 justify-center text-zinc-500 dark:text-zinc-400 outline-none transition-colors">
      <i data-lucide="circle-user" class="w-5 h-5"></i>
      <span class="text-[9px] font-bold uppercase">Профиль</span>
    </button>
  <?php else: ?>
    <a href="/auth-login.php" class="flex flex-col flex-1 min-w-0 items-center gap-1 justify-center text-zinc-500 dark:text-zinc-400 outline-none transition-colors">
      <i data-lucide="log-in" class="w-5 h-5"></i>
      <span class="text-[9px] font-bold uppercase">Вход</span>
    </a>
  <?php endif; ?>
</nav>