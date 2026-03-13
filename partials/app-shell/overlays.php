<!-- OVERLAYS -->
<div id="sidebar-overlay" class="overlay fixed inset-0 z-[102] lg:hidden" aria-hidden="true"></div>
<div id="user-overlay" class="overlay fixed inset-0 z-[98] lg:hidden" aria-hidden="true"></div>

<?php if (shouldUseAppShell()): ?>
  <aside
    id="notifications-drawer"
    class="notifications-drawer"
    data-notifications-drawer
    role="dialog"
    aria-modal="true"
    aria-labelledby="notifications-drawer-title"
    tabindex="-1">
    <div class="notifications-drawer__header">
      <div>
        <h2 id="notifications-drawer-title" class="text-lg font-bold text-zinc-900 dark:text-zinc-100">Уведомления</h2>
        <p class="text-xs font-semibold text-zinc-500 dark:text-zinc-400" data-notifications-drawer-count></p>
      </div>
      <button type="button" class="notifications-drawer-close" data-notifications-close aria-label="Закрыть уведомления">
        <i data-lucide="x" class="w-4 h-4"></i>
      </button>
    </div>

    <div class="notifications-drawer__list" data-notifications-drawer-list></div>

    <div class="notifications-drawer__footer">
      <p class="text-[11px] font-semibold text-zinc-500 dark:text-zinc-400">Показаны не все уведомления</p>
      <a href="/notifications.php" class="btn-primary text-xs font-bold px-3 py-2 rounded-lg inline-flex items-center gap-1.5">
        <span>Все уведомления</span>
        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
      </a>
    </div>
  </aside>
<?php endif; ?>
