<!-- Notification templates -->
<template id="tpl-notifications-empty">
  <div class="notifications-empty">
    <i data-empty-icon class="w-8 h-8 opacity-50"></i>
    <p class="text-sm font-semibold" data-empty-title></p>
    <p class="text-xs" data-empty-message></p>
  </div>
</template>

<template id="tpl-notifications-drawer-item">
  <article class="notifications-item" data-drawer-item>
    <div class="flex items-start gap-3">
      <div class="notifications-icon-wrap" data-item-icon-wrap>
        <i data-item-icon class="w-4 h-4"></i>
      </div>
      <div class="min-w-0 flex-1">
        <div class="flex items-start justify-between gap-2">
          <h3 class="notifications-item-title" data-item-title></h3>
          <span class="notifications-unread-dot" data-item-unread-dot aria-hidden="true"></span>
        </div>
        <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400 line-clamp-2" data-item-message></p>
        <div class="mt-2 flex items-center justify-between gap-2">
          <span class="text-[11px] text-zinc-500 whitespace-nowrap" data-item-date></span>
          <a href="/notifications.php" class="btn-secondary text-[11px] font-semibold px-2.5 py-1.5 inline-flex items-center gap-1.5" data-drawer-go>
            <span>Перейти</span>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
          </a>
        </div>
      </div>
    </div>
  </article>
</template>

<template id="tpl-notifications-page-item">
  <article class="notifications-item" data-page-item role="button" tabindex="0">
    <div class="flex items-start gap-3">
      <div class="notifications-item-leading">
        <div class="notifications-icon-wrap" data-item-icon-wrap>
          <i data-item-icon class="w-4 h-4"></i>
        </div>
        <input type="checkbox" class="notifications-checkbox notifications-item-select" data-bulk-checkbox aria-label="Выбрать уведомление">
      </div>
      <div class="min-w-0 flex-1">
        <div class="flex items-start justify-between gap-2">
          <h3 class="notifications-item-title" data-item-title></h3>
          <span class="notifications-unread-dot" data-item-unread-dot aria-hidden="true"></span>
        </div>
        <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400 line-clamp-2" data-item-message></p>
        <div class="mt-1.5 flex items-center gap-2 text-[11px] text-zinc-500">
          <span class="truncate" data-item-type></span>
          <span>•</span>
          <span class="whitespace-nowrap" data-item-date></span>
        </div>
      </div>
    </div>
  </article>
</template>

<template id="tpl-notifications-detail-empty">
  <div class="notifications-empty min-h-[360px]">
    <i data-lucide="bell-ring" class="w-10 h-10 opacity-50"></i>
    <p class="text-base font-bold text-zinc-700 dark:text-zinc-200">Выберите уведомление</p>
    <p class="text-sm">Откройте элемент из списка, чтобы посмотреть полные детали.</p>
  </div>
</template>

<template id="tpl-notifications-detail">
  <article class="space-y-4">
    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-xs font-bold" data-detail-chip>
      <i data-detail-icon class="w-3.5 h-3.5"></i>
      <span data-detail-type></span>
    </span>
    <h2 class="text-xl font-bold text-zinc-900 dark:text-zinc-100" data-detail-title></h2>
    <p class="text-xs font-semibold text-zinc-500" data-detail-date></p>
    <div class="rounded-lg border border-zinc-200 dark:border-zinc-800 bg-zinc-50/70 dark:bg-zinc-900/60 p-4 text-sm leading-relaxed text-zinc-700 dark:text-zinc-300" data-detail-message></div>
  </article>
</template>
