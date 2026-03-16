<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body>
  <div id="app" class="flex min-h-screen overflow-hidden">
    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>

    <div class="page-content-area">
      <?php include __DIR__ . '/partials/header.php'; ?>

      <div class="page-body">
        <main class="page-main">
          <section class="mx-auto w-full max-w-[1200px] rounded-xl border border-zinc-200 bg-card shadow-sm dark:border-zinc-800">
            <div class="space-y-6 p-5 sm:p-8 lg:p-10">
              <header class="text-center">
                <h1 class="text-2xl font-bold tracking-tight text-zinc-900 dark:text-white sm:text-3xl">Создать вывод средств</h1>
                <p class="mt-3 text-sm text-zinc-500 dark:text-zinc-400 sm:text-base">Безопасный вывод средств через USDT (TRC20).</p>
              </header>

              <div class="rounded-lg border border-red-300/80 bg-red-100/80 px-4 py-4 dark:border-red-500/50 dark:bg-red-500/10">
                <div class="flex items-start gap-3">
                  <i data-lucide="triangle-alert" class="mt-0.5 h-5 w-5 shrink-0 text-red-700 dark:text-red-400"></i>
                  <div>
                    <p class="text-lg font-bold leading-none text-red-900 dark:text-red-300">Вывод заблокирован</p>
                    <p class="mt-1 text-sm text-red-800/90 dark:text-red-200/90">Недостаточный реферальный баланс. Для вывода средств вам нужны реферальные доходы.</p>
                  </div>
                </div>
              </div>

              <ol class="c-stepper mt-8" aria-label="Шаги вывода средств">
                <li class="c-stepper__item" aria-current="false"><span class="c-stepper__dot border-primary-500 bg-primary-500 text-white">1</span><span class="c-stepper__label text-primary-600 dark:text-primary-400">Сумма и назначение</span><span class="c-stepper__line bg-primary-500/60 dark:bg-primary-500/50"></span></li>
                <li class="c-stepper__item" aria-current="step"><span class="c-stepper__dot border-primary-500 bg-primary-500 text-white">2</span><span class="c-stepper__label text-primary-600 dark:text-primary-400">Проверьте свой вывод средств</span><span class="c-stepper__line"></span></li>
                <li class="c-stepper__item" aria-current="false"><span class="c-stepper__dot">3</span><span class="c-stepper__label">Подтвердите свой вывод средств</span></li>
              </ol>

              <form class="mt-8 space-y-7" novalidate>
                <section data-withdraw-step="1" class="hidden space-y-5">
                  <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Сумма и назначение</h2>

                  <div class="c-form-control">
                    <label class="c-form-label" for="withdrawAmount">Сумма вывода</label>
                    <div class="c-form-control__input-wrap">
                      <input id="withdrawAmount" type="number" value="20.00" class="c-input" />
                    </div>
                    <p class="c-form-description">Диапазон сумм: $10.00 - $1000.00</p>
                  </div>

                  <div class="rounded-lg border border-primary-500/30 bg-primary-500/10 p-4">
                    <p class="text-sm font-semibold text-primary-700 dark:text-primary-200">Доступный баланс</p>
                    <p class="mt-1 text-3xl font-bold text-primary-700 dark:text-primary-200">$10.21</p>
                  </div>

                  <div class="c-form-control">
                    <label class="c-form-label" for="withdrawAddress">Адрес вывода TRC20</label>
                    <select id="withdrawAddress" class="c-select">
                      <option>test - TN3W4H6rK2...oxb3m9</option>
                    </select>
                    <button type="button" class="inline-flex w-fit items-center gap-2 text-sm font-semibold text-primary-600 hover:text-primary-700 dark:text-primary-400 dark:hover:text-primary-300">
                      <i data-lucide="plus-circle" class="h-4 w-4"></i>
                      <span>Добавить новый адрес TRC20</span>
                    </button>
                  </div>
                </section>

                <section data-withdraw-step="2" class="space-y-6">
                  <h2 class="text-xl lg:text-2xl font-bold text-zinc-900 dark:text-white">Этап 2: Проверьте свой вывод средств</h2>

                  <p class="text-base lg:text-lg font-semibold text-zinc-900 dark:text-zinc-100">Review Your Withdrawal</p>

                  <div class="overflow-hidden rounded-2xl border border-zinc-200 bg-zinc-50/70 dark:border-zinc-700 dark:bg-zinc-900/30">
                    <div class="flex items-center gap-3 border-b border-zinc-200 px-5 py-5 dark:border-zinc-700">
                      <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-primary-500 text-white"><i data-lucide="bitcoin" class="h-4 w-4"></i></span>
                      <h3 class="text-xl sm:text-2xl font-bold text-zinc-900 dark:text-zinc-100">Cryptocurrency</h3>
                    </div>

                    <div class="divide-y divide-zinc-200 dark:divide-zinc-700">
                      <div class="flex items-center justify-between gap-4 px-5 py-6">
                        <span class="text-base sm:text-lg text-slate-500 dark:text-slate-300">Crypto Type</span>
                        <span class="rounded-xl bg-primary-500 px-4 py-1.5 text-sm sm:text-base font-semibold text-white">USDT (TRC20)</span>
                      </div>

                      <div class="flex items-center justify-between gap-4 px-5 py-6">
                        <span class="text-base sm:text-lg text-slate-500 dark:text-slate-300">Amount</span>
                        <span class="text-xl sm:text-2xl font-medium text-zinc-900 dark:text-zinc-100">$20.00</span>
                      </div>

                      <div class="flex items-center justify-between gap-4 px-5 py-6">
                        <span class="text-base sm:text-lg text-slate-500 dark:text-slate-300">Fee</span>
                        <span class="text-xl sm:text-2xl font-medium text-zinc-900 dark:text-zinc-100">$0.00</span>
                      </div>

                      <div class="flex items-center justify-between gap-4 bg-zinc-100 px-5 py-6 dark:bg-zinc-800/70">
                        <span class="text-lg sm:text-xl font-semibold text-zinc-900 dark:text-zinc-100">Net Amount</span>
                        <span class="text-3xl sm:text-4xl font-bold leading-none text-primary-500">$20.00</span>
                      </div>

                      <div class="space-y-3 px-5 py-6">
                        <p class="text-base sm:text-lg text-slate-500 dark:text-slate-300">Destination Address</p>
                        <p class="text-xl sm:text-2xl font-semibold text-zinc-900 dark:text-zinc-100">test</p>
                        <input type="text" readonly value="TN3W4H6rK2ce4vX9YnFQHwKENnHjoxb3m9" class="c-input" />
                      </div>
                    </div>
                  </div>

                  <div class="c-form-control">
                    <label class="c-form-label text-base sm:text-lg" for="confirmPassword">
                      <span class="mr-2 inline-flex align-middle text-primary-500"><i data-lucide="lock" class="h-5 w-5"></i></span>
                      Confirm Your Password
                    </label>
                    <div class="c-form-control__input-wrap">
                      <input id="confirmPassword" type="password" value="••••••" class="c-input pr-10" />
                      <button type="button" class="c-form-control__icon-btn" aria-label="Показать пароль"><i data-lucide="eye" class="h-5 w-5"></i></button>
                    </div>
                  </div>

                  <div class="c-review-notice border-blue-500/60 bg-blue-500/10 text-blue-700 dark:text-blue-300">
                    <div class="flex items-center gap-3">
                      <i data-lucide="shield" class="h-6 w-6"></i>
                      <span class="text-base sm:text-lg">An OTP code will be sent to your preferred method for verification</span>
                    </div>
                  </div>
                </section>

                <section data-withdraw-step="3" class="hidden space-y-4">
                  <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Подтвердите свой вывод средств</h2>
                </section>
              </form>
            </div>

            <div class="flex items-center justify-between border-t border-zinc-200 bg-zinc-50/70 px-5 py-5 dark:border-zinc-800 dark:bg-zinc-900/30 sm:px-8 lg:px-10">
              <button type="button" class="btn-secondary inline-flex min-w-[220px] items-center justify-center gap-2 rounded-lg px-4 py-3 text-base font-bold">
                <i data-lucide="arrow-left" class="h-5 w-5"></i>
                <span>Previous</span>
              </button>

              <button type="button" class="btn-primary inline-flex min-w-[320px] items-center justify-center gap-2 rounded-lg px-4 py-3 text-base font-bold">
                <span>Confirm &amp; Submit Withdrawal</span>
                <i data-lucide="check" class="h-5 w-5"></i>
              </button>
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
