<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">
    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>

    <div class="page-content-area">
      <?php include __DIR__ . '/partials/header.php'; ?>

      <div class="page-body">
        <main class="page-main">
          <section class="card overflow-hidden flex flex-col min-h-[520px] lg:min-h-[620px] max-h-[85vh]" data-notifications-page>
            <header class="card-header">
              <div class="flex items-center gap-3 min-w-0">
                <div class="h-10 w-10 rounded-lg bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                  <i data-lucide="bell" class="w-5 h-5" aria-hidden="true"></i>
                </div>
                <div class="min-w-0">
                  <h1 class="text-xl lg:text-2xl font-bold text-zinc-900 dark:text-white">Уведомления</h1>
                  <p class="text-sm text-zinc-500">Быстрый обзор и удобное управление уведомлениями.</p>
                </div>
              </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-[340px_1fr] xl:grid-cols-[420px_1fr] flex-1 min-h-0 notifications-page-shell">
              <aside class="bg-card border-b lg:border-b-0 lg:border-r border-zinc-200 dark:border-zinc-800 flex flex-col min-h-0" data-notifications-list-panel>
                <div class="p-3 lg:p-4 space-y-3 border-b border-zinc-200 dark:border-zinc-800">
                  <div class="flex items-center gap-2">
                    <label class="relative block flex-1 min-w-0">
                      <i data-lucide="search" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400"></i>
                      <input type="search" data-notifications-search placeholder="Поиск по заголовку и тексту" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900/70 py-2.5 pl-9 pr-3 text-sm text-zinc-900 dark:text-zinc-100 placeholder:text-zinc-400 focus:outline-none focus:ring-2 focus:ring-primary-500/35">
                    </label>

                    <button type="button" class="btn-secondary h-10 rounded-lg px-2.5 inline-flex items-center gap-1.5 text-xs font-bold" data-notifications-select-mode-toggle aria-pressed="false" aria-label="Режим выбора уведомлений">
                      <i data-lucide="list-checks" class="w-4 h-4" aria-hidden="true"></i>
                      <span class="tabular-nums" data-notifications-select-count>0</span>
                    </button>

                    <div class="relative" data-dropdown data-dropdown-id="notifications-sort" data-dropdown-placement="bottom-end" data-dropdown-offset="8" data-dropdown-overlay="false" data-dropdown-close-ms="120">
                      <button type="button" class="btn-secondary header-icon-btn h-10 w-10" data-notifications-sort-trigger data-dropdown-trigger aria-haspopup="listbox" aria-expanded="false" aria-controls="notifications-sort-panel" aria-label="Сортировка уведомлений">
                        <i data-lucide="arrow-up-down" class="w-4 h-4"></i>
                      </button>
                      <div id="notifications-sort-panel" class="header-language-panel" data-dropdown-panel data-dropdown-template-id="tpl-notifications-sort-panel" role="listbox" tabindex="-1" aria-label="Сортировка уведомлений"></div>
                      <template id="tpl-notifications-sort-panel">
                        <div class="header-language-list" data-notifications-sort-list></div>
                      </template>
                      <template id="tpl-notifications-sort-option">
                        <button type="button" class="header-language-option" data-sort-option="{{value}}" role="option">
                          <span class="header-language-option-main">
                            <span class="min-w-0">
                              <span class="header-language-option-native">{{label}}</span>
                            </span>
                          </span>
                          <i data-lucide="check" class="header-language-option-check w-4 h-4 hidden" data-sort-check></i>
                        </button>
                      </template>
                    </div>
                  </div>

                  <div class="flex items-center gap-2 overflow-x-auto no-scrollbar">
                    <button type="button" class="notifications-segment is-active" data-type-filter="all">Все</button>
                    <button type="button" class="notifications-segment" data-type-filter="info">Info</button>
                    <button type="button" class="notifications-segment" data-type-filter="warning">Warning</button>
                    <button type="button" class="notifications-segment" data-type-filter="critical">Critical</button>
                  </div>
                </div>

                <div class="hidden p-3 border-b border-zinc-200 dark:border-zinc-800 bg-primary-50/70 dark:bg-primary-900/20" data-notifications-bulkbar>
                  <div class="flex items-center justify-between gap-2 flex-wrap">
                    <p class="text-xs font-bold text-primary-700 dark:text-primary-200" data-notifications-selected-counter>Выбрано: 0</p>
                    <div class="flex items-center gap-2 flex-wrap">
                      <button type="button" class="btn-secondary text-xs font-bold px-3 py-1.5" data-bulk-action="read">Прочитать</button>
                      <button type="button" class="btn-secondary text-xs font-bold px-3 py-1.5" data-bulk-action="unread">Непрочитанные</button>
                      <button type="button" class="btn-secondary text-xs font-bold px-3 py-1.5 text-red-600 dark:text-red-400" data-bulk-action="delete">Удалить</button>
                    </div>
                  </div>
                </div>

                <div class="notifications-page-list" data-notifications-page-list></div>
              </aside>

              <section class="hidden lg:flex flex-col bg-card min-h-0" data-notifications-detail-panel>
                <div class="px-4 lg:px-5 py-4 border-b border-zinc-200 dark:border-zinc-800 lg:hidden">
                  <button type="button" class="w-full inline-flex items-center gap-3 rounded-lg px-2 py-1.5 text-sm font-bold text-zinc-700 dark:text-zinc-400 hover:bg-zinc-100/70 dark:hover:bg-zinc-800/70 transition-colors" data-notifications-back>
                    <span class="notifications-detail-back shrink-0">
                      <i data-lucide="chevron-left" class="h-4 w-4"></i>
                    </span>
                    <span>Вернуться к списку</span>
                  </button>
                </div>
                <div class="flex-1 overflow-y-auto p-4 lg:p-5" data-notifications-detail></div>
              </section>
            </div>
          </section>
        </main>

        <?php include __DIR__ . '/partials/footer.php'; ?>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
