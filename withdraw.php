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
          <section class="mx-auto w-full max-w-[800px] rounded-xl border border-zinc-200 bg-card p-5 shadow-sm dark:border-zinc-800 sm:p-8 lg:p-10">
            <header class="text-center">
              <h1 class="text-2xl lg:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white sm:text-4xl">Создать вывод средств</h1>
              <p class="mt-3 text-sm lg:text-base text-zinc-500 dark:text-zinc-400 sm:text-lg">Безопасный вывод средств через USDT (TRC20).</p>
            </header>

            <div class="mt-6 rounded-lg border border-red-300/80 bg-red-100/80 px-4 py-4 dark:border-red-500/50 dark:bg-red-500/10">
              <div class="flex items-start gap-3">
                <i data-lucide="triangle-alert" class="mt-0.5 h-5 w-5 shrink-0 text-red-700 dark:text-red-400"></i>
                <div>
                  <p class="text-base font-bold text-red-900 dark:text-red-300">Вывод заблокирован</p>
                  <p class="mt-1 text-sm text-red-800/90 dark:text-red-200/90">Недостаточный реферальный баланс. Для вывода средств вам нужны реферальные доходы.</p>
                </div>
              </div>
            </div>

            <ol class="c-stepper mt-8" data-withdraw-stepper>
              <li class="c-stepper__item" data-step-indicator="1"><span class="c-stepper__dot">1</span><span class="c-stepper__label">Сумма и назначение</span><span class="c-stepper__line" data-step-line></span></li>
              <li class="c-stepper__item" data-step-indicator="2"><span class="c-stepper__dot">2</span><span class="c-stepper__label">Проверьте свой вывод средств</span><span class="c-stepper__line" data-step-line></span></li>
              <li class="c-stepper__item" data-step-indicator="3"><span class="c-stepper__dot">3</span><span class="c-stepper__label">Подтвердите свой вывод средств</span></li>
            </ol>

            <form id="withdrawForm" class="mt-8 space-y-7" novalidate>
              <section data-withdraw-step="1" class="space-y-6">
                <h2 class="text-xl lg:text-2xl font-bold text-zinc-900 dark:text-white">Этап 1: Сумма и назначение</h2>

                <div class="c-form-control">
                  <label class="c-form-label" for="withdrawAmount">Сумма вывода</label>
                  <div class="c-form-control__input-wrap">
                    <input id="withdrawAmount" name="withdrawAmount" type="number" min="10" step="0.01" value="20.00" class="c-input" required>
                  </div>
                  <p class="c-form-description">Диапазон сумм: $10.00 - $1000.00</p>
                </div>

                <div class="rounded-lg border border-primary-500/30 bg-primary-500/10 p-4">
                  <p class="text-sm font-semibold text-primary-700 dark:text-primary-200">Доступный баланс</p>
                  <p class="mt-1 text-2xl lg:text-3xl font-bold text-primary-700 dark:text-primary-200">$10.21</p>
                </div>

                <div class="c-form-control">
                  <label class="c-form-label" for="withdrawAddress">Адрес вывода TRC20</label>
                  <select id="withdrawAddress" name="withdrawAddress" class="c-select" required>
                    <option value="">Выберите адрес</option>
                    <option value="test" selected>test - TN3W4H6rK2...oxb3m9</option>
                  </select>
                  <button type="button" class="inline-flex w-fit items-center gap-2 text-sm font-semibold text-primary-600 hover:text-primary-700 dark:text-primary-400 dark:hover:text-primary-300">
                    <i data-lucide="plus-circle" class="h-4 w-4"></i>
                    <span>Добавить новый адрес TRC20</span>
                  </button>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <button type="button" class="btn-secondary rounded-lg px-6 py-3 text-base font-bold" disabled>Назад</button>
                  <button type="button" class="btn-primary rounded-lg px-6 py-3 text-base font-bold" data-next-step="2">Далее</button>
                </div>
              </section>

              <section data-withdraw-step="2" class="hidden space-y-6">
                <h2 class="text-xl lg:text-2xl font-bold text-zinc-900 dark:text-white">Этап 2: Проверьте свой вывод средств</h2>

                <div class="overflow-hidden rounded-lg border border-zinc-200 dark:border-zinc-700">
                  <div class="flex items-center gap-3 border-b border-zinc-200 bg-zinc-50/70 px-4 py-4 dark:border-zinc-700 dark:bg-zinc-900/30">
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-primary-500 text-white"><i data-lucide="bitcoin" class="h-4 w-4"></i></span>
                    <h3 class="text-xl font-bold text-zinc-900 dark:text-zinc-100">Review Your Withdrawal</h3>
                  </div>

                  <div class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    <div class="flex items-center justify-between gap-3 px-4 py-4">
                      <span class="text-sm sm:text-base text-zinc-500 dark:text-zinc-400">Crypto Type</span>
                      <span class="rounded-lg bg-primary-500 px-3 py-1 text-sm font-semibold text-white">USDT (TRC20)</span>
                    </div>
                    <div class="flex items-center justify-between gap-3 px-4 py-4">
                      <span class="text-sm sm:text-base text-zinc-500 dark:text-zinc-400">Amount</span>
                      <span class="text-base sm:text-lg font-medium text-zinc-900 dark:text-zinc-100">$20.00</span>
                    </div>
                    <div class="flex items-center justify-between gap-3 px-4 py-4">
                      <span class="text-sm sm:text-base text-zinc-500 dark:text-zinc-400">Fee</span>
                      <span class="text-base sm:text-lg font-medium text-zinc-900 dark:text-zinc-100">$0.00</span>
                    </div>
                    <div class="flex items-center justify-between gap-3 bg-zinc-50 px-4 py-4 dark:bg-zinc-800/60">
                      <span class="text-base font-semibold text-zinc-900 dark:text-zinc-100">Net Amount</span>
                      <span class="text-2xl lg:text-3xl font-bold text-primary-500">$20.00</span>
                    </div>
                    <div class="space-y-3 px-4 py-4">
                      <p class="text-sm sm:text-base text-zinc-500 dark:text-zinc-400">Destination Address</p>
                      <p class="text-base font-semibold text-zinc-900 dark:text-zinc-100">test</p>
                      <input type="text" readonly value="TN3W4H6rK2ce4vX9YnFQHwKENnHjoxb3m9" class="c-input">
                    </div>
                  </div>
                </div>

                <div class="c-form-control">
                  <label class="c-form-label" for="confirmPassword">
                    <span class="mr-2 inline-flex align-middle text-primary-500"><i data-lucide="lock" class="h-4 w-4"></i></span>
                    Confirm Your Password
                  </label>
                  <div class="c-form-control__input-wrap">
                    <input id="confirmPassword" name="confirmPassword" type="password" placeholder="••••••" class="c-input pr-10" required>
                    <button type="button" class="c-form-control__icon-btn" aria-label="Показать пароль"><i data-lucide="eye" class="h-4 w-4"></i></button>
                  </div>
                </div>

                <div class="c-review-notice">
                  <div class="flex items-center gap-3">
                    <i data-lucide="shield" class="h-5 w-5"></i>
                    <span>An OTP code will be sent to your preferred method for verification.</span>
                  </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <button type="button" class="btn-secondary rounded-lg px-6 py-3 text-base font-bold" data-prev-step="1">Назад</button>
                  <button type="button" class="btn-primary rounded-lg px-6 py-3 text-base font-bold" data-next-step="3">Далее</button>
                </div>
              </section>

              <section data-withdraw-step="3" class="hidden space-y-6">
                <h2 class="text-xl lg:text-2xl font-bold text-zinc-900 dark:text-white">Этап 3: Подтвердите свой вывод средств</h2>

                <div class="c-form-control">
                  <label class="c-form-label" for="otpCode">Код подтверждения (OTP)</label>
                  <div class="c-form-control__input-wrap">
                    <span class="c-form-control__icon-left"><i data-lucide="shield-check" class="h-4 w-4"></i></span>
                    <input id="otpCode" name="otpCode" class="c-input pl-10" inputmode="numeric" maxlength="6" placeholder="Введите 6-значный код" required>
                  </div>
                  <p class="c-form-description">Мы отправили код на ваш предпочтительный метод подтверждения.</p>
                </div>

                <div class="rounded-lg border border-zinc-200 bg-zinc-50/70 p-4 dark:border-zinc-700 dark:bg-zinc-900/40">
                  <p class="text-sm text-zinc-500 dark:text-zinc-400">Проверьте корректность данных перед отправкой.</p>
                  <p class="mt-2 text-base font-semibold text-zinc-900 dark:text-zinc-100">Сумма: <span class="text-primary-600 dark:text-primary-400">$20.00</span></p>
                  <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-300">Адрес: TN3W4H6rK2ce4vX9YnFQHwKENnHjoxb3m9</p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <button type="button" class="btn-secondary rounded-lg px-6 py-3 text-base font-bold" data-prev-step="2">Назад</button>
                  <button type="submit" class="btn-primary rounded-lg px-6 py-3 text-base font-bold inline-flex items-center justify-center gap-2">
                    <span>Confirm &amp; Submit Withdrawal</span>
                    <i data-lucide="check" class="h-4 w-4"></i>
                  </button>
                </div>
              </section>
            </form>
          </section>
        </main>
        <?php include __DIR__ . '/partials/footer.php'; ?>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
  <script>
    (() => {
      const form = document.getElementById('withdrawForm');
      if (!form) return;

      const state = { step: 1, maxStep: 3 };
      const sections = [...form.querySelectorAll('[data-withdraw-step]')];
      const indicators = [...document.querySelectorAll('[data-step-indicator]')];

      function updateStepper() {
        indicators.forEach((item) => {
          const step = Number(item.dataset.stepIndicator);
          const dot = item.querySelector('.c-stepper__dot');
          const label = item.querySelector('.c-stepper__label');
          const line = item.querySelector('[data-step-line]');
          if (!dot || !label) return;

          const completed = step < state.step;
          const active = step === state.step;

          dot.classList.toggle('border-primary-500', active || completed);
          dot.classList.toggle('bg-primary-500', active || completed);
          dot.classList.toggle('text-white', active || completed);
          dot.classList.toggle('border-zinc-200', !active && !completed);
          dot.classList.toggle('bg-zinc-100', !active && !completed);
          dot.classList.toggle('text-zinc-500', !active && !completed);
          dot.classList.toggle('dark:border-zinc-700', !active && !completed);
          dot.classList.toggle('dark:bg-zinc-800', !active && !completed);
          dot.classList.toggle('dark:text-zinc-400', !active && !completed);

          label.classList.toggle('text-primary-600', active || completed);
          label.classList.toggle('dark:text-primary-400', active || completed);
          label.classList.toggle('text-zinc-500', !active && !completed);
          label.classList.toggle('dark:text-zinc-400', !active && !completed);

          if (line) {
            line.classList.toggle('bg-primary-500/60', completed);
            line.classList.toggle('dark:bg-primary-500/50', completed);
            line.classList.toggle('bg-zinc-200', !completed);
            line.classList.toggle('dark:bg-zinc-700', !completed);
          }
        });
      }

      function render() {
        sections.forEach((section) => {
          const step = Number(section.dataset.withdrawStep);
          section.classList.toggle('hidden', step !== state.step);
        });
        updateStepper();
      }

      form.addEventListener('click', (event) => {
        const nextBtn = event.target.closest('[data-next-step]');
        const prevBtn = event.target.closest('[data-prev-step]');

        if (nextBtn) {
          state.step = Math.min(state.maxStep, Number(nextBtn.dataset.nextStep));
          render();
        }

        if (prevBtn) {
          state.step = Math.max(1, Number(prevBtn.dataset.prevStep));
          render();
        }
      });

      form.addEventListener('submit', (event) => {
        event.preventDefault();
      });

      render();
    })();
  </script>
</body>

</html>
