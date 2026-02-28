<?php chdir(dirname(__DIR__)); ?>
<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/../partials/head.php'; ?>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">

    <?php include __DIR__ . '/../partials/desktop-sidebar.php'; ?>

    <div class="flex-1 flex flex-col min-w-0 h-screen relative pb-15 lg:pb-0">
      <?php include __DIR__ . '/../partials/header.php'; ?>

      <main class="flex-1 overflow-y-auto px-4 py-6 lg:p-10">
        <div class="max-w-7xl mx-auto space-y-6">
          <section id="chat-container" class="card overflow-hidden flex flex-col min-h-[480px] lg:min-h-[600px] max-h-[83vh]">
            <header class="card-header">
              <div class="flex items-center gap-3 min-w-0">
                <div class="h-10 w-10 rounded-lg bg-accent/10 text-accent flex items-center justify-center shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"
                    aria-hidden="true">
                    <path d="m7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                  </svg>
                </div>
                <div class="min-w-0">
                  <h1 class="text-xl lg:text-2xl font-bold text-zinc-900 dark:text-white">Чат поддержки</h1>
                  <p class="text-sm text-zinc-500">Создайте обращение — мы рассмотрим его в кратчайшие сроки</p>
                </div>
              </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-[340px_1fr] flex-1 min-h-0">
              <aside id="chat-list-panel"
                class="bg-card border-b lg:border-b-0 lg:border-r border-zinc-200 dark:border-zinc-800 flex flex-col min-h-0">
                <div id="chat-list" class="p-2 space-y-2 overflow-y-auto">
                  <button type="button" data-chat-item data-chat-target="support-technical" data-chat-title="Общий вопрос"
                    data-chat-subtitle="Чат поддержки"
                    class="w-full rounded-lg border border-accent/30 bg-accent/5 px-3 py-3 text-left transition-colors hover:border-accent/40">
                    <div class="flex items-start gap-3">
                      <div class="h-10 w-10 rounded-md bg-accent/10 text-accent flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"
                          aria-hidden="true">
                          <path d="m7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                        </svg>
                      </div>
                      <div class="min-w-0 flex-1">
                        <div class="flex items-center justify-between gap-2">
                          <p class="text-sm font-bold text-zinc-900 dark:text-white truncate" data-chat-item-title>Общий вопрос</p>
                          <span class="text-xs text-zinc-500">09:43</span>
                        </div>
                        <p class="mt-1 text-xs text-zinc-500 truncate">Проверяем статус транзакции и скоро ответим.</p>
                      </div>
                    </div>
                  </button>

                  <button type="button" data-chat-item data-chat-target="support-notice" data-chat-title="Отчет об ошибке"
                    data-chat-subtitle="Чат поддержки"
                    class="w-full rounded-lg border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-card px-3 py-3 text-left transition-colors hover:border-accent/40">
                    <div class="flex items-start gap-3">
                      <div
                        class="relative h-10 w-10 rounded-md bg-accent/10 text-accent flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"
                          aria-hidden="true">
                          <path d="m7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                        </svg>
                        <span
                          class="absolute -top-1.5 -right-1.5 min-w-[18px] h-[18px] px-1 rounded-md bg-accent text-white text-[10px] leading-[18px] text-center font-bold">2</span>
                      </div>
                      <div class="min-w-0 flex-1">
                        <div class="flex items-center justify-between gap-2">
                          <p class="text-sm font-bold text-zinc-900 dark:text-white truncate" data-chat-item-title>Отчет об ошибке</p>
                          <span class="text-xs text-zinc-500">Вчера</span>
                        </div>
                        <p class="mt-1 text-xs text-zinc-500 truncate">Поддержка начала диалог по безопасности аккаунта.</p>
                      </div>
                    </div>
                  </button>

                  <div id="chat-empty-state"
                    class="hidden rounded-lg border border-dashed border-zinc-300 dark:border-zinc-700 px-4 py-8 text-center">
                    <p class="text-sm font-semibold text-zinc-700 dark:text-zinc-200">Пока нет обращений</p>
                    <p class="mt-1 text-xs text-zinc-500">Нажмите «Начать разговор», чтобы начать беседу с поддержкой.</p>
                  </div>
                </div>

                <div class="p-4 border-t border-zinc-200 dark:border-zinc-800">
                  <button id="new-ticket-btn" type="button"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-accent px-4 py-3 text-sm font-bold text-white hover:bg-emerald-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"
                      aria-hidden="true">
                      <circle cx="12" cy="12" r="10"></circle>
                      <path d="M8 12h8"></path>
                      <path d="M12 8v8"></path>
                    </svg>
                    Начать разговор
                  </button>
                </div>
              </aside>

              <section id="chat-detail-panel" class="hidden lg:flex flex-col bg-card min-h-0">
                <div class="px-4 lg:px-5 py-4 border-b border-zinc-200 dark:border-zinc-800 flex items-center gap-3">
                  <button id="chat-back" type="button"
                    class="lg:hidden h-9 w-9 rounded-lg border border-zinc-200 dark:border-zinc-700 text-zinc-500 flex items-center justify-center"
                    aria-label="Вернуться к списку диалогов">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"
                      aria-hidden="true">
                      <path d="m15 18-6-6 6-6"></path>
                    </svg>
                  </button>

                  <div class="h-10 w-10 rounded-md bg-accent/10 text-accent flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"
                      aria-hidden="true">
                      <path d="m7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                    </svg>
                  </div>
                  <div class="min-w-0">
                    <p id="chat-title" class="text-base font-bold text-zinc-900 dark:text-white">Общий вопрос</p>
                    <p id="chat-subtitle" class="text-sm text-zinc-500">Чат поддержки</p>
                  </div>
                </div>


                <div id="chat-welcome-screen" class="hidden flex flex-1 items-center justify-center px-6 py-6">
                  <div class="max-w-md text-center">
                    <p class="text-lg font-bold text-zinc-900 dark:text-white">Добро пожаловать в чат поддержки</p>
                    <p class="mt-2 text-sm text-zinc-500">Выберите существующий диалог или создайте новое обращение.</p>
                    <button type="button" data-new-ticket-trigger
                      class="mt-4 inline-flex items-center gap-2 rounded-lg bg-accent px-4 py-2.5 text-sm font-bold text-white hover:bg-emerald-600 transition-colors">
                      Начать разговор
                    </button>
                  </div>
                </div>

                <div id="new-ticket-screen" class="hidden flex-1 flex-col px-4 lg:px-5 py-4 overflow-y-auto">
                  <div class="space-y-4">
                    <div class="space-y-2">
                      <label for="ticket-topic" class="inline-block text-sm font-semibold text-zinc-900 dark:text-white">Тема обращения</label>
                      <div class="relative">
                        <select id="ticket-topic"
                          class="w-full border focus:border-accent/50 rounded-lg px-4 py-3 pr-10 outline-none appearance-none font-bold cursor-pointer text-sm bg-white dark:bg-[#0B0E11] border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-white">
                          <option>Техническая проблема</option>
                          <option>Счета и платежи</option>
                          <option>Настройки учетной записи</option>
                          <option>Запрос функции</option>
                          <option>Отчет об ошибке</option>
                          <option selected>Общий вопрос</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="absolute right-4 top-1/2 -translate-y-1/2 text-zinc-500 w-4 h-4 pointer-events-none" aria-hidden="true">
                          <path d="m6 9 6 6 6-6"></path>
                        </svg>
                      </div>
                    </div>

                    <div class="space-y-2">
                      <label for="ticket-first-message" class="inline-block text-sm font-semibold text-zinc-900 dark:text-white">Первое сообщение</label>

                      <div class="relative">
                        <div id="ticket-emoji-picker"
                          class="hidden absolute bottom-12 right-12 z-20 w-[300px] rounded-xl border border-zinc-200 dark:border-zinc-700 bg-card shadow-xl p-3">
                          <div class="grid grid-cols-8 gap-2">
                            <button type="button" data-ticket-emoji="😀" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😀</button>
                            <button type="button" data-ticket-emoji="😁" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😁</button>
                            <button type="button" data-ticket-emoji="😂" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😂</button>
                            <button type="button" data-ticket-emoji="😊" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😊</button>
                            <button type="button" data-ticket-emoji="😉" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😉</button>
                            <button type="button" data-ticket-emoji="😍" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😍</button>
                            <button type="button" data-ticket-emoji="😎" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😎</button>
                            <button type="button" data-ticket-emoji="🤔" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">🤔</button>
                            <button type="button" data-ticket-emoji="😴" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😴</button>
                            <button type="button" data-ticket-emoji="😢" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😢</button>
                            <button type="button" data-ticket-emoji="😭" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😭</button>
                            <button type="button" data-ticket-emoji="😡" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😡</button>
                            <button type="button" data-ticket-emoji="😱" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😱</button>
                            <button type="button" data-ticket-emoji="👍" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">👍</button>
                            <button type="button" data-ticket-emoji="👎" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">👎</button>
                            <button type="button" data-ticket-emoji="👏" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">👏</button>
                            <button type="button" data-ticket-emoji="🙏" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">🙏</button>
                            <button type="button" data-ticket-emoji="🔥" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">🔥</button>
                            <button type="button" data-ticket-emoji="🎉" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">🎉</button>
                            <button type="button" data-ticket-emoji="✅" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">✅</button>
                          </div>
                        </div>

                        <div id="ticket-attachment-preview"
                          class="hidden mb-3 items-center justify-between rounded-lg border-t border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 px-3 py-2">
                          <div class="flex items-center gap-2 min-w-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-accent shrink-0 lucide lucide-paperclip-icon lucide-paperclip" aria-hidden="true">
                              <path d="m16 6-8.414 8.586a2 2 0 0 0 2.829 2.829l8.414-8.586a4 4 0 1 0-5.657-5.657l-8.379 8.551a6 6 0 1 0 8.485 8.485l8.379-8.551" />
                            </svg>
                            <span id="ticket-attachment-name" class="truncate text-xs font-semibold text-zinc-600 dark:text-zinc-300">file.pdf</span>
                          </div>
                          <button id="ticket-attachment-remove" type="button" class="rounded-lg p-1.5 text-zinc-400 hover:text-red-500" aria-label="Удалить файл">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" aria-hidden="true">
                              <path d="M18 6 6 18"></path>
                              <path d="m6 6 12 12"></path>
                            </svg>
                          </button>
                        </div>

                        <form id="new-ticket-form"
                          class="flex items-end gap-2 rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900 px-2 py-2 focus-within:border-accent/40 transition-colors">
                          <input id="ticket-file" type="file" class="hidden" />
                          <button id="ticket-file-trigger" type="button"
                            class="h-10 w-10 rounded-lg text-zinc-400 hover:text-accent flex items-center justify-center shrink-0"
                            aria-label="Прикрепить файл">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 lucide lucide-paperclip-icon lucide-paperclip" aria-hidden="true">
                              <path d="m16 6-8.414 8.586a2 2 0 0 0 2.829 2.829l8.414-8.586a4 4 0 1 0-5.657-5.657l-8.379 8.551a6 6 0 1 0 8.485 8.485l8.379-8.551" />
                            </svg>
                          </button>

                          <textarea id="ticket-first-message" rows="1" placeholder="Введите сообщение..."
                            class="w-full max-h-[320px] resize-none overflow-y-auto bg-transparent px-1 py-2 text-sm leading-6 text-zinc-900 dark:text-white outline-none"></textarea>

                          <button id="ticket-emoji-toggle" type="button"
                            class="h-10 w-10 rounded-lg text-zinc-400 hover:text-accent flex items-center justify-center shrink-0"
                            aria-label="Открыть эмодзи">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5" aria-hidden="true">
                              <circle cx="12" cy="12" r="10" />
                              <path d="M8 14s1.5 2 4 2 4-2 4-2" />
                              <line x1="9" x2="9.01" y1="9" y2="9" />
                              <line x1="15" x2="15.01" y1="9" y2="9" />
                            </svg>
                          </button>

                          <span class="h-6 w-px bg-zinc-200 dark:bg-zinc-700 shrink-0 my-auto" aria-hidden="true"></span>

                          <button type="submit"
                            class="h-10 w-10 rounded-lg text-zinc-400 hover:text-accent flex items-center justify-center shrink-0 transition-all active:scale-95"
                            aria-label="Создать обращение">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5" aria-hidden="true">
                              <path d="M3.714 3.048a.498.498 0 0 0-.683.627l2.843 7.627a2 2 0 0 1 0 1.396l-2.842 7.627a.498.498 0 0 0 .682.627l18-8.5a.5.5 0 0 0 0-.904z" />
                              <path d="M6 12h16" />
                            </svg>
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <div id="support-technical" data-chat-panel class="relative flex-1 px-4 lg:px-5 pb-4 overflow-y-auto">
                  <section class="chat-date-group relative space-y-4 pt-2" data-range="25.01.2025">
                    <div class="flex justify-center sticky top-1 z-10" data-date-sticky data-date="25.01.2025"><span class="rounded-md bg-zinc-100/95 dark:bg-zinc-800/95 px-3 py-1 text-xs font-semibold text-zinc-500 shadow-sm transition-opacity duration-200" data-date-chip>25.01.2025</span></div>
                    <div class="sticky_sentinel sticky_sentinel--top h-px" aria-hidden="true"></div>
                    <div class="max-w-md rounded-lg border border-accent/30 bg-accent/10 text-zinc-900 dark:text-white px-4 py-3">
                      <p class="text-sm text-zinc-700 dark:text-zinc-200">Здравствуйте! Это старт диалога. Если нужна помощь — просто ответьте в этом чате.</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-accent/80">14.05.2024</p>
                    </div>
                    <div class="ml-auto max-w-md rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 px-4 py-3">
                      <p class="text-sm">Принял, спасибо!</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">14.05.2024</p>
                    </div>
                  </section>

                  <section class="chat-date-group relative space-y-4 pt-2" data-range="27.01.2025">
                    <div class="flex justify-center sticky top-1 z-10" data-date-sticky data-date="27.01.2025"><span class="rounded-md bg-zinc-100/95 dark:bg-zinc-800/95 px-3 py-1 text-xs font-semibold text-zinc-500 shadow-sm transition-opacity duration-200" data-date-chip>27.01.2025</span></div>
                    <div class="sticky_sentinel sticky_sentinel--top h-px" aria-hidden="true"></div>
                    <div class="ml-auto max-w-md rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 px-4 py-3">
                      <p class="text-sm">Подскажите, где посмотреть историю начислений?</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">12.01.2026</p>
                    </div>
                    <div class="max-w-md rounded-lg border border-accent/30 bg-accent/10 text-zinc-900 dark:text-white px-4 py-3">
                      <p class="text-sm text-zinc-700 dark:text-zinc-200">История доступна в разделе «Отчёт» — выгрузил вам свежий файл.</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-accent/80">12.01.2026</p>
                    </div>
                    <div class="ml-auto max-w-md rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 px-4 py-3">
                      <p class="text-sm">Увидел, спасибо. Можно ещё разбивку по месяцам?</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">12.01.2026</p>
                    </div>
                  </section>

                  <section class="chat-date-group relative space-y-4 pt-2" data-range="Сегодня">
                    <div class="flex justify-center sticky top-1 z-10" data-date-sticky data-date="Сегодня"><span class="rounded-md bg-zinc-100/95 dark:bg-zinc-800/95 px-3 py-1 text-xs font-semibold text-zinc-500 shadow-sm transition-opacity duration-200" data-date-chip>Сегодня</span></div>
                    <div class="sticky_sentinel sticky_sentinel--top h-px" aria-hidden="true"></div>
                    <div class="max-w-md rounded-lg border border-accent/30 bg-accent/10 text-zinc-900 dark:text-white px-4 py-3">
                      <p class="text-sm text-zinc-700 dark:text-zinc-200">Поняли вас. Последние начисления добавили в отчёт по аккаунту.</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-accent/80">вчера, 19:30</p>
                    </div>
                    <div class="ml-auto max-w-md rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 px-4 py-3">
                      <p class="text-sm">Проверил, всё корректно 👌</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">вчера, 19:34</p>
                    </div>
                    <div class="max-w-md rounded-lg border border-accent/30 bg-accent/10 text-zinc-900 dark:text-white px-4 py-3">
                      <p class="text-sm text-zinc-700 dark:text-zinc-200">Дополнительно отправили вам файл с разбивкой по месяцам.</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-accent/80">сегодня, 09:12</p>
                    </div>
                    <div class="ml-auto max-w-md rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 px-4 py-3">
                      <p class="text-sm">Файл загрузился, благодарю за оперативность.</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">сегодня, 09:15</p>
                    </div>
                  </section>
                </div>

                <div id="support-notice" data-chat-panel class="hidden relative flex-1 px-4 lg:px-5 pb-4 overflow-y-auto">
                  <section class="chat-date-group relative space-y-4 pt-2" data-range="26.01.2025">
                    <div class="flex justify-center sticky top-1 z-10" data-date-sticky data-date="26.01.2025"><span class="rounded-md bg-zinc-100/95 dark:bg-zinc-800/95 px-3 py-1 text-xs font-semibold text-zinc-500 shadow-sm transition-opacity duration-200" data-date-chip>26.01.2025</span></div>
                    <div class="sticky_sentinel sticky_sentinel--top h-px" aria-hidden="true"></div>
                    <div class="max-w-md rounded-lg border border-accent/30 bg-accent/10 text-zinc-900 dark:text-white px-4 py-3">
                      <p class="text-sm text-zinc-700 dark:text-zinc-200">Система обнаружила вход в аккаунт с нового устройства.</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-accent/80">26.01.2025, 08:05</p>
                    </div>
                    <div class="ml-auto max-w-md rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 px-4 py-3">
                      <p class="text-sm">Подтверждаю, это был мой вход.</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">26.01.2025, 08:07</p>
                    </div>
                  </section>

                  <section class="chat-date-group relative space-y-4 pt-2" data-range="Сегодня">
                    <div class="flex justify-center sticky top-1 z-10" data-date-sticky data-date="Сегодня"><span class="rounded-md bg-zinc-100/95 dark:bg-zinc-800/95 px-3 py-1 text-xs font-semibold text-zinc-500 shadow-sm transition-opacity duration-200" data-date-chip>Сегодня</span></div>
                    <div class="sticky_sentinel sticky_sentinel--top h-px" aria-hidden="true"></div>
                    <div class="max-w-md rounded-lg border border-accent/30 bg-accent/10 text-zinc-900 dark:text-white px-4 py-3">
                      <p class="text-sm text-zinc-700 dark:text-zinc-200">Поддержка инициировала диалог: зафиксирован вход с нового устройства.</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-accent/80">вчера, 18:05</p>
                    </div>
                    <div class="ml-auto max-w-md rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 px-4 py-3">
                      <p class="text-sm">Это был я, вход подтверждаю.</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">вчера, 18:07</p>
                    </div>
                    <div class="max-w-md rounded-lg border border-accent/30 bg-accent/10 text-zinc-900 dark:text-white px-4 py-3">
                      <p class="text-sm text-zinc-700 dark:text-zinc-200">Спасибо, отметили вход как безопасный.</p>
                      <p class="mt-2 text-[11px] font-semibold uppercase tracking-wide text-accent/80">вчера, 18:08</p>
                    </div>
                  </section>
                </div>

                <footer class="border-t border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/50 p-4 space-y-3">
                  <div class="relative">
                    <div id="emoji-picker"
                      class="hidden absolute bottom-12 right-12 z-20 w-[300px] rounded-xl border border-zinc-200 dark:border-zinc-700 bg-card shadow-xl p-3">
                      <div class="grid grid-cols-8 gap-2">
                        <button type="button" data-emoji="😀" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😀</button>
                        <button type="button" data-emoji="😁" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😁</button>
                        <button type="button" data-emoji="😂" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😂</button>
                        <button type="button" data-emoji="😊" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😊</button>
                        <button type="button" data-emoji="😉" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😉</button>
                        <button type="button" data-emoji="😍" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😍</button>
                        <button type="button" data-emoji="😎" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😎</button>
                        <button type="button" data-emoji="🤔" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">🤔</button>
                        <button type="button" data-emoji="😴" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😴</button>
                        <button type="button" data-emoji="😢" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😢</button>
                        <button type="button" data-emoji="😭" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😭</button>
                        <button type="button" data-emoji="😡" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😡</button>
                        <button type="button" data-emoji="😱" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">😱</button>
                        <button type="button" data-emoji="👍" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">👍</button>
                        <button type="button" data-emoji="👎" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">👎</button>
                        <button type="button" data-emoji="👏" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">👏</button>
                        <button type="button" data-emoji="🙏" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">🙏</button>
                        <button type="button" data-emoji="🔥" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">🔥</button>
                        <button type="button" data-emoji="🎉" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">🎉</button>
                        <button type="button" data-emoji="✅" class="h-8 w-8 rounded-md bg-zinc-100/80 dark:bg-zinc-800/70 hover:bg-zinc-200 dark:hover:bg-zinc-700">✅</button>
                      </div>
                    </div>

                    <div id="attachment-preview"
                      class="hidden mb-3 items-center justify-between rounded-lg border-t border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 px-3 py-2">
                      <div class="flex items-center gap-2 min-w-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-accent shrink-0 lucide lucide-paperclip-icon lucide-paperclip" aria-hidden="true">
                          <path d="m16 6-8.414 8.586a2 2 0 0 0 2.829 2.829l8.414-8.586a4 4 0 1 0-5.657-5.657l-8.379 8.551a6 6 0 1 0 8.485 8.485l8.379-8.551" />
                        </svg>
                        <span id="attachment-name" class="truncate text-xs font-semibold text-zinc-600 dark:text-zinc-300">file.pdf</span>
                      </div>
                      <button id="attachment-remove" type="button" class="rounded-lg p-1.5 text-zinc-400 hover:text-red-500" aria-label="Удалить файл">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"
                          aria-hidden="true">
                          <path d="M18 6 6 18"></path>
                          <path d="m6 6 12 12"></path>
                        </svg>
                      </button>
                    </div>

                    <form id="chat-form"
                      class="flex items-end gap-2 rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900 px-2 py-2 focus-within:border-accent/40 transition-colors">
                      <input id="chat-file" type="file" class="hidden" />
                      <button id="file-trigger" type="button"
                        class="h-10 w-10 rounded-lg text-zinc-400 hover:text-accent flex items-center justify-center shrink-0"
                        aria-label="Прикрепить файл">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 lucide lucide-paperclip-icon lucide-paperclip" aria-hidden="true">
                          <path d="m16 6-8.414 8.586a2 2 0 0 0 2.829 2.829l8.414-8.586a4 4 0 1 0-5.657-5.657l-8.379 8.551a6 6 0 1 0 8.485 8.485l8.379-8.551" />
                        </svg>
                      </button>

                      <label for="chat-message" class="sr-only">Сообщение</label>
                      <textarea id="chat-message" rows="1" placeholder="Введите сообщение..."
                        class="w-full max-h-[320px] resize-none overflow-y-auto bg-transparent px-1 py-2 text-sm leading-6 text-zinc-900 dark:text-white outline-none"></textarea>

                      <button id="emoji-toggle" type="button"
                        class="h-10 w-10 rounded-lg text-zinc-400 hover:text-accent flex items-center justify-center shrink-0"
                        aria-label="Открыть эмодзи">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5" aria-hidden="true">
                          <circle cx="12" cy="12" r="10" />
                          <path d="M8 14s1.5 2 4 2 4-2 4-2" />
                          <line x1="9" x2="9.01" y1="9" y2="9" />
                          <line x1="15" x2="15.01" y1="9" y2="9" />
                        </svg>
                      </button>

                      <span class="h-6 w-px bg-zinc-200 dark:bg-zinc-700 shrink-0 my-auto" aria-hidden="true"></span>

                      <button type="submit"
                        class="h-10 w-10 rounded-lg text-zinc-400 hover:text-accent flex items-center justify-center shrink-0 transition-all active:scale-95"
                        aria-label="Отправить сообщение">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"
                          aria-hidden="true">
                          <path d="M3.714 3.048a.498.498 0 0 0-.683.627l2.843 7.627a2 2 0 0 1 0 1.396l-2.842 7.627a.498.498 0 0 0 .682.627l18-8.5a.5.5 0 0 0 0-.904z" />
                          <path d="M6 12h16" />
                        </svg>
                      </button>
                    </form>
                  </div>
                </footer>
              </section>
            </div>
          </section>
        </div>
      </main>
    </div>
  </div>

  <?php include __DIR__ . '/../partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/../partials/scripts.php'; ?>

  <style>
    .chat-fab-container {
      display: none !important;
    }
  </style>
  <script>
    (function() {
      const listPanel = document.getElementById('chat-list-panel');
      const detailPanel = document.getElementById('chat-detail-panel');
      const backBtn = document.getElementById('chat-back');
      const chatList = document.getElementById('chat-list');
      const emptyState = document.getElementById('chat-empty-state');
      const welcomeScreen = document.getElementById('chat-welcome-screen');
      const newTicketScreen = document.getElementById('new-ticket-screen');
      const newTicketBtn = document.getElementById('new-ticket-btn');
      const newTicketTriggers = document.querySelectorAll('[data-new-ticket-trigger]');

      const title = document.getElementById('chat-title');
      const subtitle = document.getElementById('chat-subtitle');

      const form = document.getElementById('chat-form');
      const input = document.getElementById('chat-message');
      const emojiToggle = document.getElementById('emoji-toggle');
      const emojiPicker = document.getElementById('emoji-picker');
      const emojiButtons = document.querySelectorAll('[data-emoji]');
      const fileInput = document.getElementById('chat-file');
      const fileTrigger = document.getElementById('file-trigger');
      const attachmentPreview = document.getElementById('attachment-preview');
      const attachmentName = document.getElementById('attachment-name');
      const attachmentRemove = document.getElementById('attachment-remove');

      const newTicketForm = document.getElementById('new-ticket-form');
      const ticketTopic = document.getElementById('ticket-topic');
      const ticketMessage = document.getElementById('ticket-first-message');
      const ticketEmojiToggle = document.getElementById('ticket-emoji-toggle');
      const ticketEmojiPicker = document.getElementById('ticket-emoji-picker');
      const ticketEmojiButtons = document.querySelectorAll('[data-ticket-emoji]');
      const ticketFile = document.getElementById('ticket-file');
      const ticketFileTrigger = document.getElementById('ticket-file-trigger');
      const ticketAttachmentPreview = document.getElementById('ticket-attachment-preview');
      const ticketAttachmentName = document.getElementById('ticket-attachment-name');
      const ticketAttachmentRemove = document.getElementById('ticket-attachment-remove');

      let selectedFile = null;
      let ticketSelectedFile = null;
      let activeChatId = '';
      let generatedChatCounter = 0;

      const isMobile = () => window.innerWidth < 1024;

      function autoResizeTextarea(el) {
        if (!el) return;
        const minHeight = 40;
        el.style.height = 'auto';
        el.style.height = `${Math.min(Math.max(el.scrollHeight, minHeight), 320)}px`;
      }

      function getChatItems() {
        return Array.from(chatList.querySelectorAll('[data-chat-item]'));
      }

      function getPanels() {
        return Array.from(detailPanel.querySelectorAll('[data-chat-panel]'));
      }

      function getActivePanel() {
        return activeChatId ? document.getElementById(activeChatId) : null;
      }

      function formatCurrentTime() {
        return new Date().toLocaleTimeString('ru-RU', {
          hour: '2-digit',
          minute: '2-digit'
        });
      }

      function formatTodayDateLabel() {
        return new Date().toLocaleDateString('ru-RU');
      }

      const dateHideTimers = new WeakMap();

      function getPanelGroups(panel) {
        return Array.from(panel.querySelectorAll('.chat-date-group')).map(group => ({
          group,
          range: group.getAttribute('data-range') || '',
          sentinel: group.querySelector('.sticky_sentinel--top'),
          sticky: group.querySelector('[data-date-sticky]'),
          chip: group.querySelector('[data-date-chip]')
        })).filter(item => item.sentinel && item.chip && item.sticky);
      }

      function getActiveStickyGroup(panel) {
        const groups = getPanelGroups(panel);
        if (!groups.length) return null;

        const panelRect = panel.getBoundingClientRect();
        let active = groups[0];

        groups.forEach(item => {
          const top = item.sentinel.getBoundingClientRect().top - panelRect.top;
          if (top <= 8) {
            active = item;
          }
        });

        return active;
      }

      function showAllDateChips(panel) {
        getPanelGroups(panel).forEach(item => {
          item.chip.classList.remove('opacity-0');
        });
      }

      function isStickyActive(panel, groupItem) {
        if (!groupItem || !groupItem.sticky) return false;
        const panelRect = panel.getBoundingClientRect();
        const stickyRect = groupItem.sticky.getBoundingClientRect();
        const groupRect = groupItem.group.getBoundingClientRect();
        const stickyTop = panelRect.top + 4;

        return panel.scrollTop > 0 && stickyRect.top <= stickyTop + 1 && groupRect.top <= stickyTop + 1;
      }

      function hideActiveStickyChip(panel) {
        showAllDateChips(panel);
        const active = getActiveStickyGroup(panel);
        if (!active || !isStickyActive(panel, active)) return;
        active.chip.classList.add('opacity-0');
      }

      function revealActiveStickyChip(panel) {
        showAllDateChips(panel);
        const prev = dateHideTimers.get(panel);
        if (prev) clearTimeout(prev);

        const timer = setTimeout(() => {
          hideActiveStickyChip(panel);
        }, 900);
        dateHideTimers.set(panel, timer);
      }

      function scrollToBottom(panel) {
        if (!panel) return;

        const maxScrollTop = Math.max(panel.scrollHeight - panel.clientHeight, 0);
        panel.scrollTo({
          top: maxScrollTop,
          behavior: 'smooth'
        });

        requestAnimationFrame(() => {
          const freshMaxScrollTop = Math.max(panel.scrollHeight - panel.clientHeight, 0);
          if (Math.abs(panel.scrollTop - freshMaxScrollTop) > 1) {
            panel.scrollTop = freshMaxScrollTop;
          }
        });
      }

      function activateItem(activeItem) {
        getChatItems().forEach(item => {
          item.classList.remove('border-accent/30', 'bg-accent/5');
          item.classList.add('border-zinc-200', 'dark:border-zinc-800', 'bg-white', 'dark:bg-card');
        });
        if (!activeItem) return;
        activeItem.classList.remove('border-zinc-200', 'dark:border-zinc-800', 'bg-white', 'dark:bg-card');
        activeItem.classList.add('border-accent/30', 'bg-accent/5');
      }

      function setHeader(topic) {
        title.textContent = topic || 'Чат поддержки';
        subtitle.textContent = 'Чат поддержки';
      }

      function showOnlyPanel(targetId) {
        getPanels().forEach(panel => {
          const isTarget = panel.id === targetId;
          panel.classList.toggle('hidden', !isTarget);
          panel.classList.toggle('block', isTarget);
        });
      }

      function hideUtilityScreens() {
        welcomeScreen.classList.add('hidden');
        newTicketScreen.classList.add('hidden');
      }

      function showChatFooter(show) {
        form.closest('footer').classList.toggle('hidden', !show);
      }

      function showWelcomeIfNeeded() {
        const hasDialogs = getChatItems().length > 0;
        emptyState.classList.toggle('hidden', hasDialogs);

        if (!hasDialogs) {
          activeChatId = '';
          showOnlyPanel('');
          welcomeScreen.classList.remove('hidden');
          if (!isMobile()) {
            detailPanel.classList.remove('hidden');
            detailPanel.classList.add('flex');
          }
          showChatFooter(false);
        }
      }

      function openConversationById(targetId, chatItem = null) {
        if (!targetId) return;
        hideUtilityScreens();
        showOnlyPanel(targetId);
        activeChatId = targetId;

        const item = chatItem || chatList.querySelector(`[data-chat-target="${targetId}"]`);
        if (item) {
          setHeader(item.getAttribute('data-chat-title') || 'Общий вопрос');
          activateItem(item);
        }

        showChatFooter(true);
        const activePanel = getActivePanel();
        scrollToBottom(activePanel);
        hideActiveStickyChip(activePanel);

        if (isMobile()) {
          listPanel.classList.add('hidden');
          detailPanel.classList.remove('hidden');
          detailPanel.classList.add('flex');
        }
      }

      function openNewTicketScreen() {
        activateItem(null);
        showOnlyPanel('');
        welcomeScreen.classList.add('hidden');
        newTicketScreen.classList.remove('hidden');
        showChatFooter(false);
        setHeader('Новое обращение');

        if (isMobile()) {
          listPanel.classList.add('hidden');
          detailPanel.classList.remove('hidden');
          detailPanel.classList.add('flex');
        }

        requestAnimationFrame(() => {
          autoResizeTextarea(ticketMessage);
        });
      }

      function buildDateGroupMarkup(range) {
        return `
      <section class="chat-date-group relative space-y-4 pt-2" data-range="${range}">
        <div class="flex justify-center sticky top-1 z-10" data-date-sticky data-date="${range}"><span class="rounded-md bg-zinc-100/95 dark:bg-zinc-800/95 px-3 py-1 text-xs font-semibold text-zinc-500 shadow-sm transition-opacity duration-200" data-date-chip>${range}</span></div>
        <div class="sticky_sentinel sticky_sentinel--top h-px" aria-hidden="true"></div>
      </section>`;
      }

      function appendMessageToGroup(group, text, isMine, timeLabel) {
        const wrap = document.createElement('div');
        wrap.className = `${isMine ? 'ml-auto border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200' : 'border border-accent/30 bg-accent/10 text-zinc-900 dark:text-white'} max-w-md rounded-lg px-4 py-3`;

        const msg = document.createElement('p');
        msg.className = `text-sm ${isMine ? '' : 'text-zinc-700 dark:text-zinc-200'} whitespace-pre-line`;
        msg.textContent = text;

        const time = document.createElement('p');
        time.className = `mt-2 text-[11px] font-semibold uppercase tracking-wide ${isMine ? 'text-zinc-500 dark:text-zinc-400' : 'text-accent/80'}`;
        time.textContent = timeLabel || formatCurrentTime();

        wrap.appendChild(msg);
        wrap.appendChild(time);
        group.appendChild(wrap);
      }

      function createDialogItem(targetId, topic, previewText) {
        const button = document.createElement('button');
        button.type = 'button';
        button.setAttribute('data-chat-item', '');
        button.setAttribute('data-chat-target', targetId);
        button.setAttribute('data-chat-title', topic);
        button.setAttribute('data-chat-subtitle', 'Чат поддержки');
        button.className = 'w-full rounded-lg border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-card px-3 py-3 text-left transition-colors hover:border-accent/40';
        button.innerHTML = `
        <div class="flex items-start gap-3">
          <div class="h-10 w-10 rounded-md bg-accent/10 text-accent flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true"><path d="m7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path></svg>
          </div>
          <div class="min-w-0 flex-1">
            <div class="flex items-center justify-between gap-2">
              <p class="text-sm font-bold text-zinc-900 dark:text-white truncate" data-chat-item-title>${topic}</p>
              <span class="text-xs text-zinc-500">${formatCurrentTime()}</span>
            </div>
            <p class="mt-1 text-xs text-zinc-500 truncate">${previewText}</p>
          </div>
        </div>`;
        return button;
      }

      function createDialogPanel(targetId, firstMessageText, topic) {
        const panel = document.createElement('div');
        panel.id = targetId;
        panel.setAttribute('data-chat-panel', '');
        panel.className = 'hidden relative flex-1 px-4 lg:px-5 pb-4 overflow-y-auto';
        panel.innerHTML = buildDateGroupMarkup('Сегодня');
        detailPanel.insertBefore(panel, form.closest('footer'));

        const firstGroup = panel.querySelector('.chat-date-group');
        appendMessageToGroup(firstGroup, firstMessageText, true, formatCurrentTime());
        appendMessageToGroup(firstGroup, `Здравствуйте! Тема «${topic}» принята в работу. Мы скоро ответим подробнее.`, false, formatCurrentTime());
        return panel;
      }

      function resetTicketComposer() {
        ticketMessage.value = '';
        autoResizeTextarea(ticketMessage);
        ticketSelectedFile = null;
        ticketFile.value = '';
        ticketAttachmentPreview.classList.add('hidden');
        ticketAttachmentPreview.classList.remove('flex');
        ticketEmojiPicker.classList.add('hidden');
        ticketTopic.value = 'Общий вопрос';
      }

      function openConversationFromItem(item) {
        const targetId = item.getAttribute('data-chat-target');
        openConversationById(targetId, item);
      }

      function addMessage(panel, text, isMine) {
        const group = panel.querySelector('.chat-date-group:last-of-type') || panel;
        appendMessageToGroup(group, text, isMine, formatCurrentTime());
        scrollToBottom(panel);
        revealActiveStickyChip(panel);
      }

      chatList.addEventListener('click', (event) => {
        const item = event.target.closest('[data-chat-item]');
        if (!item || !chatList.contains(item)) return;
        openConversationFromItem(item);
      });

      backBtn.addEventListener('click', () => {
        if (!isMobile()) return;
        detailPanel.classList.remove('flex');
        detailPanel.classList.add('hidden');
        listPanel.classList.remove('hidden');
      });

      newTicketBtn.addEventListener('click', openNewTicketScreen);
      newTicketTriggers.forEach(btn => btn.addEventListener('click', openNewTicketScreen));

      emojiToggle.addEventListener('click', () => {
        emojiPicker.classList.toggle('hidden');
      });

      ticketEmojiToggle.addEventListener('click', () => {
        ticketEmojiPicker.classList.toggle('hidden');
      });

      document.addEventListener('click', (event) => {
        const isInsidePicker = emojiPicker.contains(event.target);
        const isToggle = emojiToggle.contains(event.target);
        if (!isInsidePicker && !isToggle) emojiPicker.classList.add('hidden');

        const isInsideTicketPicker = ticketEmojiPicker.contains(event.target);
        const isTicketToggle = ticketEmojiToggle.contains(event.target);
        if (!isInsideTicketPicker && !isTicketToggle) ticketEmojiPicker.classList.add('hidden');
      });

      emojiButtons.forEach(btn => {
        btn.addEventListener('click', () => {
          input.value = `${input.value}${btn.getAttribute('data-emoji')}`;
          input.focus();
          autoResizeTextarea(input);
        });
      });

      ticketEmojiButtons.forEach(btn => {
        btn.addEventListener('click', () => {
          ticketMessage.value = `${ticketMessage.value}${btn.getAttribute('data-ticket-emoji')}`;
          ticketMessage.focus();
          autoResizeTextarea(ticketMessage);
        });
      });

      input.addEventListener('input', () => autoResizeTextarea(input));
      ticketMessage.addEventListener('input', () => autoResizeTextarea(ticketMessage));

      input.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' && !event.shiftKey) {
          event.preventDefault();
          form.requestSubmit();
        }
      });

      ticketMessage.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' && !event.shiftKey) {
          event.preventDefault();
          newTicketForm.requestSubmit();
        }
      });

      detailPanel.addEventListener('scroll', (event) => {
        const panel = event.target.closest('[data-chat-panel]');
        if (!panel) return;
        revealActiveStickyChip(panel);
      }, true);

      fileTrigger.addEventListener('click', () => fileInput.click());
      ticketFileTrigger.addEventListener('click', () => ticketFile.click());

      fileInput.addEventListener('change', () => {
        selectedFile = fileInput.files && fileInput.files[0] ? fileInput.files[0] : null;
        if (selectedFile) {
          attachmentName.textContent = selectedFile.name;
          attachmentPreview.classList.remove('hidden');
          attachmentPreview.classList.add('flex');
        }
      });

      ticketFile.addEventListener('change', () => {
        ticketSelectedFile = ticketFile.files && ticketFile.files[0] ? ticketFile.files[0] : null;
        if (ticketSelectedFile) {
          ticketAttachmentName.textContent = ticketSelectedFile.name;
          ticketAttachmentPreview.classList.remove('hidden');
          ticketAttachmentPreview.classList.add('flex');
        }
      });

      attachmentRemove.addEventListener('click', () => {
        selectedFile = null;
        fileInput.value = '';
        attachmentPreview.classList.add('hidden');
        attachmentPreview.classList.remove('flex');
      });

      ticketAttachmentRemove.addEventListener('click', () => {
        ticketSelectedFile = null;
        ticketFile.value = '';
        ticketAttachmentPreview.classList.add('hidden');
        ticketAttachmentPreview.classList.remove('flex');
      });

      form.addEventListener('submit', (e) => {
        e.preventDefault();
        const text = input.value.trim();
        if (!text && !selectedFile) return;

        const panel = getActivePanel();
        if (!panel) return;

        const messageText = selectedFile ? `📎 Файл: ${selectedFile.name}${text ? `
${text}` : ''}` : text;
        addMessage(panel, messageText, true);
        input.value = '';
        autoResizeTextarea(input);
        emojiPicker.classList.add('hidden');
        selectedFile = null;
        fileInput.value = '';
        attachmentPreview.classList.add('hidden');
        attachmentPreview.classList.remove('flex');

        setTimeout(() => {
          addMessage(panel, 'Спасибо! Автоответ: получили ваше сообщение и уже передали специалисту.', false);
        }, 900);
      });

      newTicketForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const topic = ticketTopic.value;
        const text = ticketMessage.value.trim();
        if (!text && !ticketSelectedFile) return;

        generatedChatCounter += 1;
        const targetId = `support-generated-${generatedChatCounter}`;
        const messageText = ticketSelectedFile ? `📎 Файл: ${ticketSelectedFile.name}${text ? `
${text}` : ''}` : text;

        const newItem = createDialogItem(targetId, topic, text || 'Прикреплен файл');
        chatList.insertBefore(newItem, emptyState);
        const panel = createDialogPanel(targetId, messageText, topic);

        resetTicketComposer();
        showWelcomeIfNeeded();
        openConversationById(targetId, newItem);
        hideActiveStickyChip(panel);
      });

      function shouldShowDetailOnMobile() {
        const hasActiveConversation = Boolean(activeChatId && getActivePanel());
        const isNewTicketVisible = !newTicketScreen.classList.contains('hidden');
        const isWelcomeVisible = !welcomeScreen.classList.contains('hidden');
        return hasActiveConversation || isNewTicketVisible || isWelcomeVisible;
      }

      function applyLayout() {
        if (isMobile()) {
          const showDetail = shouldShowDetailOnMobile();
          listPanel.classList.toggle('hidden', showDetail);
          detailPanel.classList.toggle('hidden', !showDetail);
          detailPanel.classList.toggle('flex', showDetail);
          return;
        }

        detailPanel.classList.remove('hidden');
        detailPanel.classList.add('flex');
        listPanel.classList.remove('hidden');

        const panel = getActivePanel();
        if (panel) {
          scrollToBottom(panel);
          hideActiveStickyChip(panel);
        }
      }

      window.addEventListener('resize', applyLayout);

      function init() {
        const initialItem = getChatItems()[0] || null;
        if (initialItem) {
          openConversationFromItem(initialItem);
        } else {
          showWelcomeIfNeeded();
        }

        autoResizeTextarea(input);
        autoResizeTextarea(ticketMessage);
        applyLayout();
        showWelcomeIfNeeded();
        getPanels().forEach(hideActiveStickyChip);
      }

      init();
    })();
  </script>
</body>

</html>