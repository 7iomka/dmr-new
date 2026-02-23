<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">
    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>

    <div class="flex-1 flex flex-col min-w-0 h-screen relative pb-15 lg:pb-0">
      <?php include __DIR__ . '/partials/header.php'; ?>

      <main class="flex-1 overflow-y-auto px-4 py-6 lg:p-10">
        <div class="max-w-5xl mx-auto">
          <section class="card overflow-hidden">
            <div class="card-body space-y-6 lg:space-y-8">
              <div class="text-center">
                <h1 class="text-3xl font-extrabold text-zinc-900 dark:text-white">Создать вывод средств</h1>
                <p class="mt-2 text-sm text-zinc-500">Безопасный вывод средств через USDT (TRC20)</p>
              </div>

              <div
                class="rounded-lg border border-red-300/80 bg-red-100/80 dark:bg-red-500/10 dark:border-red-500/50 px-4 py-4">
                <div class="flex items-start gap-3">
                  <svg class="shrink-0 w-5 h-5 text-red-700 dark:text-red-400 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                      d="m10.29 3.86-7.81 13.52A2 2 0 0 0 4.2 20h15.6a2 2 0 0 0 1.73-2.62L13.71 3.86a2 2 0 0 0-3.42 0Z">
                    </path>
                    <line x1="12" x2="12" y1="9" y2="13"></line>
                    <line x1="12" x2="12.01" y1="17" y2="17"></line>
                  </svg>
                  <div>
                    <p class="text-2xl font-extrabold text-red-900 dark:text-red-300 leading-none">Вывод заблокирован
                    </p>
                    <p class="text-sm text-red-800/90 dark:text-red-200/90 mt-1">Недостаточный реферальный баланс. Для
                      вывода средств вам нужны реферальные доходы.</p>
                  </div>
                </div>
              </div>

              <!-- currentStep: 1..3 -->
              <div class="px-2">
                <div class="relative">
                  <!-- базовая линия (всегда) -->
                  <div class="absolute left-0 right-0 top-4 h-px bg-zinc-200 dark:bg-zinc-700"></div>

                  <!-- прогресс-линия (меняй width по шагу) -->
                  <!-- step=1 -> w-0, step=2 -> w-1/2, step=3 -> w-full -->
                  <div class="absolute left-0 top-4 h-px bg-accent w-0"></div>

                  <div class="grid grid-cols-3 text-center gap-3 text-zinc-500 text-xs sm:text-sm">
                    <!-- STEP 1 -->
                    <div class="relative">
                      <!-- completed/current styles -->
                      <div class="relative z-10 w-8 h-8 rounded-full border bg-white dark:bg-zinc-900 mx-auto grid place-items-center
                    border-accent text-accent">
                        1
                      </div>
                      <p class="mt-3">Сумма и назначение</p>
                    </div>

                    <!-- STEP 2 -->
                    <div class="relative">
                      <div class="relative z-10 w-8 h-8 rounded-full border bg-white dark:bg-zinc-900 mx-auto grid place-items-center
                    border-zinc-300 dark:border-zinc-600 text-zinc-500">
                        2
                      </div>
                      <p class="mt-3">Проверьте свой вывод средств</p>
                    </div>

                    <!-- STEP 3 -->
                    <div class="relative">
                      <div class="relative z-10 w-8 h-8 rounded-full border bg-white dark:bg-zinc-900 mx-auto grid place-items-center
                    border-zinc-300 dark:border-zinc-600 text-zinc-500">
                        3
                      </div>
                      <p class="mt-3">Подтвердите свой вывод средств</p>
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-zinc-50/70 dark:bg-zinc-900/30 p-4 sm:p-6 lg:p-8 space-y-5">
                <h2 class="text-2xl font-extrabold text-zinc-900 dark:text-white">Сумма и назначение</h2>

                <div>
                  <label class="block mb-2 text-sm font-semibold text-zinc-800 dark:text-zinc-200">Сумма вывода</label>
                  <input type="number" value="0.00"
                    class="no-spinner w-full rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-[#0B0E11] px-4 py-2.5 text-zinc-700 dark:text-zinc-200 outline-none focus:border-accent" />
                  <p class="mt-2 text-sm text-zinc-500">Диапазон сумм: $10.00 - $0.00</p>
                </div>

                <div
                  class="rounded-lg bg-gradient-to-r from-[#18b889] to-[#0da26e] p-4 text-white flex items-center gap-3">
                  <div class="w-12 h-12 rounded-lg bg-white/20 grid place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-wallet-cards w-6 h-6">
                      <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                      <path d="M3 9h18"></path>
                      <path d="M7 15h.01"></path>
                      <path d="M11 15h2"></path>
                    </svg>
                  </div>
                  <div>
                    <p class="text-sm font-semibold text-white/90">Доступный баланс</p>
                    <p class="text-4xl font-bold tracking-tight">$10.21</p>
                  </div>
                </div>

                <div>
                  <label class="block mb-2 text-sm font-semibold text-zinc-800 dark:text-zinc-200">Адрес вывода
                    TRC20</label>
                  <div class="relative">
                    <select
                      class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-[#0B0E11] px-4 py-2.5 text-zinc-700 dark:text-zinc-200 appearance-none outline-none focus:border-accent">
                      <option>test - TN3W4H6rK2...oxb3m9</option>
                    </select>
                    <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-zinc-400 pointer-events-none"
                      xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="m6 9 6 6 6-6"></path>
                    </svg>
                  </div>
                  <button class="mt-4 text-accent font-semibold text-sm flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="w-4 h-4">
                      <circle cx="12" cy="12" r="10"></circle>
                      <path d="M8 12h8"></path>
                      <path d="M12 8v8"></path>
                    </svg>
                    <span>Добавить новый адрес TRC20</span>
                  </button>
                </div>
              </div>
            </div>

            <div
              class="px-4 lg:px-6 py-4 border-t border-zinc-200 dark:border-zinc-800 flex justify-end bg-zinc-50/60 dark:bg-zinc-900/30">
              <button disabled
                class="inline-flex items-center gap-2 rounded-lg bg-accent/60 px-8 py-2.5 text-white font-semibold disabled:opacity-80 disabled:cursor-not-allowed">
                <span>Следующий</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                  <path d="M5 12h14"></path>
                  <path d="m12 5 7 7-7 7"></path>
                </svg>
              </button>
            </div>
          </section>
        </div>
      </main>
    </div>
  </div>

  <?php include __DIR__ . '/partials/mobile-sidebar.php'; ?>
  <?php include __DIR__ . '/partials/mobile-user-drawer.php'; ?>
  <?php include __DIR__ . '/partials/mobile-bottom-nav.php'; ?>
  <?php include __DIR__ . '/partials/overlays.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>