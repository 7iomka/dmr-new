<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>
<style type="text/tailwindcss">
  /* ════════════ Settings-specific components ════════════ */
    /* Sidebar tab buttons */
    .settings-tab-btn {
      @apply flex items-center
      lg:w-full shrink-0
      flex-col lg:flex-row 
       gap-1.5 px-5 py-3
       lg:gap-3 lg:px-3 lg:py-2.5
       border-b-2 border-transparent
       lg:border-none
       lg:rounded-lg text-sm font-semibold text-left
       transition-all
      text-zinc-600 dark:text-zinc-400
       hover:bg-zinc-100 dark:hover:bg-zinc-800/60 
       hover:text-zinc-900 dark:hover:text-white;
      
    }

    .settings-tab-btn[data-active="true"] {
      @apply border-primary bg-primary/5 lg:bg-primary/10 text-primary;
    }

    
 
    /* Notification toggle rows */
    .s-notify-row {
      @apply flex items-center gap-4 px-4 py-3.5 rounded-lg border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/50 transition-colors;
    }
    .s-notify-icon { @apply h-9 w-9 rounded-lg flex items-center justify-center shrink-0; }
 
    /* Language option cards */
    .s-lang-option {
      @apply flex items-center gap-3 px-4 py-3 rounded-lg border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/50 cursor-pointer transition-all;
    }
    .s-lang-option:hover:not(.is-selected) { @apply border-zinc-300 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800/50; }
    .s-lang-option.is-selected { @apply border-primary-500/60 bg-primary-50 dark:bg-primary-900/25 ring-1 ring-primary-500/30; }
 
    /* Active state chip (for login methods) */
    .s-chip-active { @apply inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-xs font-bold bg-primary-500/10 text-primary-700 dark:text-primary-300; }
 
  </style>
</style>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">
    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>

    <div class="page-content-area">
      <?php include __DIR__ . '/partials/header.php'; ?>

      <!-- ═══════════ PAGE BODY ═══════════ -->
      <div class="page-body">

        <!-- ════════════════════════════════════════════════════
           PAGE MAIN — Settings content
      ════════════════════════════════════════════════════ -->
        <main class="page-main">

          <div class="js-tabs-container card">

            <!-- Card header -->
            <div class="card-header">
              <div class="flex items-center gap-3 min-w-0">
                <div class="h-10 w-10 rounded-lg bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                  <i data-lucide="settings" class="w-5 h-5" aria-hidden="true"></i>
                </div>
                <div class="min-w-0">
                  <h1 class="text-xl lg:text-2xl font-bold text-zinc-900 dark:text-white">Настройки Аккаунта</h1>
                  <p class="text-sm text-zinc-500 dark:text-zinc-400">Управляйте настройками и предпочтениями вашего аккаунта</p>
                </div>
              </div>
            </div>

            <!-- Two-column layout: sidebar nav + content -->
            <div class="grid grid-cols-1 lg:grid-cols-[220px_1fr] xl:grid-cols-[280px_1fr] min-h-[560px] items-start lg:items-stretch">

              <!-- ── Left nav ── -->
              <aside class="border-b lg:border-b-0 lg:border-r border-zinc-200 dark:border-zinc-800 lg:px-3 lg:py-6 xl:px-4">
                <nav class="js-tabs-nav flex flex-row lg:flex-col lg:gap-1 overflow-x-auto no-scrollbar">
                  <button type="button" class="js-tab-btn settings-tab-btn whitespace-nowrap lg:whitespace-normal"
                    data-target="tab-profile" data-active="true">
                    <i data-lucide="circle-user" class="w-5 h-5 shrink-0"></i>
                    <span>Профиль</span>
                  </button>

                  <button type="button" class="js-tab-btn settings-tab-btn whitespace-nowrap lg:whitespace-normal"
                    data-target="tab-security" data-active="false">
                    <i data-lucide="shield" class="w-5 h-5 shrink-0"></i>
                    <span>Методы входа</span>
                  </button>

                  <button type="button" class="js-tab-btn settings-tab-btn whitespace-nowrap lg:whitespace-normal"
                    data-target="tab-notifications" data-active="false">
                    <i data-lucide="bell" class="w-5 h-5 shrink-0"></i>
                    <span>Уведомления</span>
                  </button>

                  <button type="button" class="js-tab-btn settings-tab-btn whitespace-nowrap lg:whitespace-normal"
                    data-target="tab-language" data-active="false">
                    <i data-lucide="globe" class="w-5 h-5 shrink-0"></i>
                    <span>Язык</span>
                  </button>
                </nav>
              </aside>

              <!-- ── Right content ── -->
              <div class="min-w-0 min-h-0">

                <!-- ══════════════════════════
                   TAB 1 · Профиль
              ══════════════════════════ -->
                <div class="js-tab-content" data-id="tab-profile">
                  <div class="card-body-inset-x py-6 flex flex-col gap-6">

                    <div>
                      <h2 class="text-lg font-bold text-zinc-900 dark:text-white">Редактировать профиль</h2>
                      <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-0.5">Обновите личную информацию и социальные ссылки</p>
                    </div>

                    <!-- Avatar + Form -->
                    <div class="flex flex-col sm:flex-row gap-6 xl:gap-8">

                      <!-- Avatar -->
                      <div class="flex flex-col items-center gap-3 shrink-0">
                        <p class="text-sm font-semibold text-zinc-700 dark:text-zinc-300">Фото профиля</p>
                        <div class="relative">
                          <div class="w-26 h-26 rounded-lg bg-gradient-to-tr from-primary to-primary-400 p-0.5 shadow-sm">
                            <div class="w-full h-full rounded-lg flex items-center justify-center bg-card font-bold text-2xl text-zinc-900 dark:text-white select-none">
                              DW
                            </div>
                          </div>
                          <button type="button"
                            class="absolute -bottom-1.5 -right-1.5 w-7 h-7 rounded-md bg-primary-500 hover:bg-primary-600 text-white flex items-center justify-center shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/40"
                            aria-label="Изменить фото профиля">
                            <i data-lucide="pencil" class="w-3.5 h-3.5" aria-hidden="true"></i>
                          </button>
                        </div>
                        <p class="text-xs text-zinc-500 dark:text-zinc-400 text-center max-w-[120px] leading-relaxed">Максимальный размер файла: 10MB.</p>
                      </div>

                      <!-- Personal info form -->
                      <div class="flex-1 min-w-0">
                        <h3 class="text-sm font-bold text-zinc-700 dark:text-zinc-300 mb-4">Личная информация</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                          <div class="c-form-control">
                            <label class="c-form-label" for="s-firstname">Имя</label>
                            <input type="text" id="s-firstname" class="c-input" disabled value="Dorin" placeholder="Введите имя">
                          </div>

                          <div class="c-form-control">
                            <label class="c-form-label" for="s-lastname">Фамилия</label>
                            <input type="text" id="s-lastname" class="c-input" disabled value="Watsap" placeholder="Введите фамилию">
                          </div>

                          <div class="c-form-control">
                            <label class="c-form-label" for="s-email">Электронная Почта</label>
                            <input type="email" id="s-email" class="c-input" disabled value="lawyer1@awsarhitect.me" placeholder="email@example.com">
                          </div>

                          <div class="c-form-control">
                            <label class="c-form-label" for="s-phone">Телефон</label>
                            <input type="tel" id="s-phone" class="c-input" disabled value="+376700001" placeholder="+7 000 000 00 00">
                          </div>

                          <div class="c-form-control sm:col-span-2 md:col-span-1">
                            <label class="c-form-label" for="s-dob">Дата рождения</label>
                            <div class="c-form-control__input-wrap">
                              <input type="text" id="s-dob" class="c-input pr-10" disabled value="04.12.2007" placeholder="ДД.ММ.ГГГГ">
                              <button type="button" class="c-form-control__icon-btn" disabled aria-label="Открыть календарь">
                                <i data-lucide="calendar" class="w-4 h-4" aria-hidden="true"></i>
                              </button>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>

                    <!-- Social links -->
                    <div class="border-t border-zinc-200 dark:border-zinc-800 pt-6 flex justify-end">
                      <div class="max-w-xl">
                        <div class="flex items-center justify-between gap-3 mb-4 flex-wrap">
                          <h3 class="text-sm font-bold text-zinc-700 dark:text-zinc-300">Социальные ссылки</h3>
                          <button type="button" class="btn-secondary btn-sm flex items-center gap-1.5">
                            <i data-lucide="plus" class="w-3.5 h-3.5" aria-hidden="true"></i>
                            <span>Добавить социальную ссылку</span>
                          </button>
                        </div>
                        <div class="alert alert-info">
                          <i data-lucide="info" class="w-5 h-5 shrink-0 mt-px" aria-hidden="true"></i>
                          <span>Социальные ссылки ещё не добавлены. Нажмите «Добавить социальную ссылку», чтобы начать.</span>
                        </div>
                      </div>
                    </div>

                    <!-- Actions -->
                    <div class="border-t border-zinc-200 dark:border-zinc-800 pt-4 flex items-center justify-end gap-3 flex-wrap">
                      <button type="button" class="btn-secondary flex items-center gap-2">
                        <i data-lucide="x" class="w-4 h-4" aria-hidden="true"></i>
                        <span>Отмена</span>
                      </button>
                      <button type="button" class="btn-primary flex items-center gap-2">
                        <i data-lucide="check" class="w-4 h-4" aria-hidden="true"></i>
                        <span>Сохранить</span>
                      </button>
                    </div>

                  </div>
                </div><!-- /tab-profile -->

                <!-- ══════════════════════════
                   TAB 2 · Методы входа
              ══════════════════════════ -->
                <div class="js-tab-content hidden" data-id="tab-security">
                  <div class="card-body-inset-x py-6 flex flex-col gap-6">

                    <div>
                      <h2 class="text-lg font-bold text-zinc-900 dark:text-white">Методы входа</h2>
                      <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-0.5">Управляйте способами доступа к вашему аккаунту</p>
                    </div>

                    <!-- Password method card -->
                    <div class="rounded-lg border border-zinc-200 dark:border-zinc-800 overflow-hidden">
                      <div class="flex items-center gap-4 px-4 lg:px-5 py-4 bg-zinc-50 dark:bg-zinc-900/50 border-b border-zinc-200 dark:border-zinc-800">
                        <div class="h-9 w-9 rounded-lg bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                          <i data-lucide="key-round" class="w-4 h-4" aria-hidden="true"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                          <p class="text-sm font-semibold text-zinc-900 dark:text-white">Пароль</p>
                          <p class="text-xs text-zinc-500 dark:text-zinc-400">Последнее изменение: никогда</p>
                        </div>
                        <span class="s-chip-active">Активен</span>
                      </div>

                      <div class="p-4 lg:p-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-xl">

                          <div class="c-form-control sm:col-span-2">
                            <label class="c-form-label" for="s-cur-pass">Текущий пароль</label>
                            <div class="c-form-control__input-wrap">
                              <input type="password" id="s-cur-pass" class="c-input pr-10" placeholder="••••••••">
                              <button type="button" class="c-form-control__icon-btn s-eye-toggle" aria-label="Показать пароль">
                                <i data-lucide="eye" class="w-4 h-4" aria-hidden="true"></i>
                              </button>
                            </div>
                          </div>

                          <div class="c-form-control">
                            <label class="c-form-label" for="s-new-pass">Новый пароль</label>
                            <div class="c-form-control__input-wrap">
                              <input type="password" id="s-new-pass" class="c-input pr-10" placeholder="••••••••">
                              <button type="button" class="c-form-control__icon-btn s-eye-toggle" aria-label="Показать пароль">
                                <i data-lucide="eye" class="w-4 h-4" aria-hidden="true"></i>
                              </button>
                            </div>
                          </div>

                          <div class="c-form-control">
                            <label class="c-form-label" for="s-conf-pass">Повторите пароль</label>
                            <div class="c-form-control__input-wrap">
                              <input type="password" id="s-conf-pass" class="c-input pr-10" placeholder="••••••••">
                              <button type="button" class="c-form-control__icon-btn s-eye-toggle" aria-label="Показать пароль">
                                <i data-lucide="eye" class="w-4 h-4" aria-hidden="true"></i>
                              </button>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end gap-3 flex-wrap">
                      <button type="button" class="btn-secondary flex items-center gap-2">
                        <i data-lucide="x" class="w-4 h-4" aria-hidden="true"></i>
                        <span>Отмена</span>
                      </button>
                      <button type="button" class="btn-primary flex items-center gap-2">
                        <i data-lucide="check" class="w-4 h-4" aria-hidden="true"></i>
                        <span>Сохранить</span>
                      </button>
                    </div>

                  </div>
                </div><!-- /tab-security -->

                <!-- ══════════════════════════
                   TAB 3 · Уведомления
              ══════════════════════════ -->
                <div class="js-tab-content hidden" data-id="tab-notifications">
                  <div class="card-body-inset-x py-6 flex flex-col gap-6">

                    <div>
                      <h2 class="text-lg font-bold text-zinc-900 dark:text-white">Уведомления</h2>
                      <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-0.5">Настройте какие уведомления вы хотите получать</p>
                    </div>

                    <div class="space-y-2 max-w-xl">

                      <div class="s-notify-row">
                        <div class="s-notify-icon bg-primary-500/10 text-primary-600 dark:text-primary-400">
                          <i data-lucide="wallet" class="w-4 h-4" aria-hidden="true"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                          <p class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">Транзакции</p>
                          <p class="text-xs text-zinc-500 dark:text-zinc-400">Пополнения, выводы и переводы</p>
                        </div>
                        <?= toggleSwitch([
                          'name' => 'transactions',
                          'checked' => true,
                          'ariaLabel' => 'Транзакции'
                        ]) ?>

                      </div>

                      <div class="s-notify-row">
                        <div class="s-notify-icon bg-sky-500/10 text-sky-600 dark:text-sky-400">
                          <i data-lucide="briefcase" class="w-4 h-4" aria-hidden="true"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                          <p class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">Инвестиции</p>
                          <p class="text-xs text-zinc-500 dark:text-zinc-400">Начисления дохода и статусы планов</p>
                        </div>
                        <?= toggleSwitch([
                          'name' => 'transactions',
                          'checked' => true,
                          'ariaLabel' => 'Инвестиции'
                        ]) ?>
                      </div>

                      <div class="s-notify-row">
                        <div class="s-notify-icon bg-amber-500/10 text-amber-600 dark:text-amber-400">
                          <i data-lucide="users" class="w-4 h-4" aria-hidden="true"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                          <p class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">Рефералы</p>
                          <p class="text-xs text-zinc-500 dark:text-zinc-400">Новые регистрации по вашей ссылке</p>
                        </div>
                        <?= toggleSwitch([
                          'name' => 'transactions',
                          'checked' => true,
                          'ariaLabel' => 'Рефералы'
                        ]) ?>
                      </div>

                      <div class="s-notify-row">
                        <div class="s-notify-icon bg-red-500/10 text-red-600 dark:text-red-400">
                          <i data-lucide="shield-alert" class="w-4 h-4" aria-hidden="true"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                          <p class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">Безопасность</p>
                          <p class="text-xs text-zinc-500 dark:text-zinc-400">Входы с новых устройств и смены пароля</p>
                        </div>
                        <?= toggleSwitch([
                          'name' => 'transactions',
                          'checked' => true,
                          'ariaLabel' => 'Безопасность'
                        ]) ?>
                      </div>

                      <div class="s-notify-row">
                        <div class="s-notify-icon bg-zinc-500/10 text-zinc-600 dark:text-zinc-400">
                          <i data-lucide="megaphone" class="w-4 h-4" aria-hidden="true"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                          <p class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">Маркетинг</p>
                          <p class="text-xs text-zinc-500 dark:text-zinc-400">Акции, новости и специальные предложения</p>
                        </div>
                        <?= toggleSwitch([
                          'name' => 'transactions',
                          'checked' => true,
                          'ariaLabel' => 'Маркетинг'
                        ]) ?>
                      </div>

                    </div>

                    <!-- Actions -->
                    <div class="border-t border-zinc-200 dark:border-zinc-800 pt-4 flex items-center justify-end">
                      <button type="button" class="btn-primary flex items-center gap-2">
                        <i data-lucide="check" class="w-4 h-4" aria-hidden="true"></i>
                        <span>Сохранить</span>
                      </button>
                    </div>

                  </div>
                </div><!-- /tab-notifications -->

                <!-- ══════════════════════════
                   TAB 4 · Язык
              ══════════════════════════ -->
                <div class="js-tab-content hidden" data-id="tab-language">
                  <div class="card-body-inset-x py-6 flex flex-col gap-6">

                    <div>
                      <h2 class="text-lg font-bold text-zinc-900 dark:text-white">Язык интерфейса</h2>
                      <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-0.5">Выберите предпочитаемый язык отображения</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 max-w-xl" id="s-lang-list">

                      <label class="s-lang-option is-selected">
                        <input type="radio" name="s-lang" value="EN" checked class="sr-only s-lang-radio">
                        <span class="text-lg leading-none">🇺🇸</span>
                        <span class="min-w-0">
                          <span class="block text-sm font-semibold truncate">English</span>
                          <span class="block text-xs text-zinc-500 dark:text-zinc-400 truncate">English</span>
                        </span>
                        <i data-lucide="check" class="w-4 h-4 ml-auto shrink-0 text-primary-500 s-lang-check" aria-hidden="true"></i>
                      </label>

                      <label class="s-lang-option">
                        <input type="radio" name="s-lang" value="RU" class="sr-only s-lang-radio">
                        <span class="text-lg leading-none">🇷🇺</span>
                        <span class="min-w-0">
                          <span class="block text-sm font-semibold truncate">Русский</span>
                          <span class="block text-xs text-zinc-500 dark:text-zinc-400 truncate">Russian</span>
                        </span>
                        <i data-lucide="check" class="w-4 h-4 ml-auto shrink-0 text-primary-500 s-lang-check hidden" aria-hidden="true"></i>
                      </label>

                      <label class="s-lang-option">
                        <input type="radio" name="s-lang" value="FR" class="sr-only s-lang-radio">
                        <span class="text-lg leading-none">🇫🇷</span>
                        <span class="min-w-0">
                          <span class="block text-sm font-semibold truncate">Français</span>
                          <span class="block text-xs text-zinc-500 dark:text-zinc-400 truncate">French</span>
                        </span>
                        <i data-lucide="check" class="w-4 h-4 ml-auto shrink-0 text-primary-500 s-lang-check hidden" aria-hidden="true"></i>
                      </label>

                      <label class="s-lang-option">
                        <input type="radio" name="s-lang" value="DE" class="sr-only s-lang-radio">
                        <span class="text-lg leading-none">🇩🇪</span>
                        <span class="min-w-0">
                          <span class="block text-sm font-semibold truncate">Deutsch</span>
                          <span class="block text-xs text-zinc-500 dark:text-zinc-400 truncate">German</span>
                        </span>
                        <i data-lucide="check" class="w-4 h-4 ml-auto shrink-0 text-primary-500 s-lang-check hidden" aria-hidden="true"></i>
                      </label>

                      <label class="s-lang-option">
                        <input type="radio" name="s-lang" value="ES" class="sr-only s-lang-radio">
                        <span class="text-lg leading-none">🇪🇸</span>
                        <span class="min-w-0">
                          <span class="block text-sm font-semibold truncate">Español</span>
                          <span class="block text-xs text-zinc-500 dark:text-zinc-400 truncate">Spanish</span>
                        </span>
                        <i data-lucide="check" class="w-4 h-4 ml-auto shrink-0 text-primary-500 s-lang-check hidden" aria-hidden="true"></i>
                      </label>

                      <label class="s-lang-option">
                        <input type="radio" name="s-lang" value="ZH" class="sr-only s-lang-radio">
                        <span class="text-lg leading-none">🇨🇳</span>
                        <span class="min-w-0">
                          <span class="block text-sm font-semibold truncate">中文</span>
                          <span class="block text-xs text-zinc-500 dark:text-zinc-400 truncate">Chinese</span>
                        </span>
                        <i data-lucide="check" class="w-4 h-4 ml-auto shrink-0 text-primary-500 s-lang-check hidden" aria-hidden="true"></i>
                      </label>

                    </div>

                    <!-- Actions -->
                    <div class="border-t border-zinc-200 dark:border-zinc-800 pt-4 flex items-center justify-end">
                      <button type="button" class="btn-primary flex items-center gap-2">
                        <i data-lucide="check" class="w-4 h-4" aria-hidden="true"></i>
                        <span>Сохранить</span>
                      </button>
                    </div>

                  </div>
                </div><!-- /tab-language -->

              </div><!-- /right content -->
            </div><!-- /grid -->

          </div><!-- /card -->
        </main>

        <?php include __DIR__ . '/partials/footer.php'; ?>
      </div><!-- /page-body -->
    </div><!-- /page-content-area -->
  </div><!-- /app -->
  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>

  <script>
    /* ── Settings page interactions ── */
    document.addEventListener('DOMContentLoaded', () => {

      /* Password visibility toggle */
      document.querySelectorAll('.s-eye-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
          const input = btn.closest('.c-form-control__input-wrap')?.querySelector('input');
          if (!input) return;
          const isPass = input.type === 'password';
          input.type = isPass ? 'text' : 'password';
          const icon = btn.querySelector('[data-lucide]');
          if (icon) icon.setAttribute('data-lucide', isPass ? 'eye-off' : 'eye');
          lucide.createIcons();
        });
      });

      /* Language radio cards */
      document.querySelectorAll('.s-lang-radio').forEach(radio => {
        radio.addEventListener('change', () => {
          document.querySelectorAll('.s-lang-option').forEach(opt => {
            const r = opt.querySelector('.s-lang-radio');
            const check = opt.querySelector('.s-lang-check');
            const sel = r?.checked;
            opt.classList.toggle('is-selected', sel);
            check?.classList.toggle('hidden', !sel);
          });
        });
      });

    });
  </script>

</body>

</html>