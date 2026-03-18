<?php require_once __DIR__ . '/../../../includes/demo-auth.php'; ?>
<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/../../../partials/head.php'; ?>

<body>
  <div id="app" class="flex min-h-screen overflow-hidden">
    <?php include __DIR__ . '/../../../partials/desktop-sidebar.php'; ?>

    <div class="page-content-area">
      <?php include __DIR__ . '/../../../partials/header.php'; ?>

      <div class="page-body">
        <main class="page-main">
          <section class="mx-auto w-full max-w-[860px] space-y-6">
            <div>
              <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white">Новая заявка на вывод</h1>
              <p class="mt-1 text-sm font-medium text-zinc-500">Введите сумму, выберите подтверждённый адрес для вывода и проверьте итог перед подтверждением.</p>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
              <article class="card-simple">
                <p class="text-[10px] font-bold uppercase tracking-[2px] text-zinc-500">Доступная сумма</p>
                <p class="mt-3 text-3xl font-bold text-primary-700 dark:text-primary-200">$ 482.50</p>
                <p class="mt-2 text-xs text-zinc-500">Минимальная сумма вывода: $20.00</p>
              </article>
              <article class="rounded-xl border border-amber-300/80 bg-amber-100/80 p-4 dark:border-amber-500/50 dark:bg-amber-500/10">
                <div class="flex items-start gap-3">
                  <i data-lucide="alert-triangle" class="h-5 w-5 text-amber-700 dark:text-amber-300 mt-0.5"></i>
                  <div>
                    <p class="text-sm font-bold text-amber-900 dark:text-amber-200">Ограничение на вывод</p>
                    <p class="mt-1 text-xs text-amber-900/90 dark:text-amber-100/90">Временный лимит: не более $300.00 в сутки.</p>
                  </div>
                </div>
              </article>
            </div>

            <div class="card">
              <div class="card-body space-y-6">
                <div class="c-form-control">
                  <label class="c-form-label" for="withdrawAmount">Сумма вывода</label>
                  <div class="c-form-control__input-wrap">
                    <input id="withdrawAmount" class="c-input" placeholder="0.00" />
                  </div>
                </div>

                <div class="c-form-control">
                  <label class="c-form-label" for="withdrawAddress">Адрес для вывода</label>
                  <select id="withdrawAddress" class="c-select">
                    <option value="">Выберите подтверждённый адрес</option>
                    <option value="1">Основной BEP20 — 0x34fA...92cB</option>
                  </select>
                  <p class="c-form-description">Показываются только подтверждённые адреса для вывода.</p>
                  <div class="mt-2 rounded-lg border border-zinc-200 bg-zinc-50 px-3 py-2 text-xs text-zinc-600 dark:border-zinc-700 dark:bg-zinc-900/50 dark:text-zinc-300">
                    Неподтверждённый адрес: <span class="font-mono">TN3W...b3m9</span> · <a href="/wallet/withdrawals/addresses" class="font-semibold text-primary-600 dark:text-primary-400">Подтвердить адрес</a>
                  </div>
                </div>

                <div class="rounded-lg border border-zinc-200 dark:border-zinc-700">
                  <div class="px-4 py-3 border-b border-zinc-200 dark:border-zinc-700 text-sm font-semibold text-zinc-900 dark:text-zinc-100">Комиссия и итог</div>
                  <div class="divide-y divide-zinc-200 dark:divide-zinc-700 text-sm">
                    <div class="flex items-center justify-between px-4 py-3"><span class="text-zinc-500">Комиссия</span><span class="font-semibold text-zinc-900 dark:text-zinc-100">$2.50</span></div>
                    <div class="flex items-center justify-between px-4 py-3"><span class="text-zinc-500">К получению</span><span class="font-bold text-primary-700 dark:text-primary-200">$117.50</span></div>
                  </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                  <button type="button" class="rounded-lg border border-zinc-200 dark:border-zinc-700 px-4 py-2 text-xs font-bold uppercase tracking-widest text-zinc-500" data-demo-state="empty">Нет адресов</button>
                  <button type="button" class="rounded-lg border border-zinc-200 dark:border-zinc-700 px-4 py-2 text-xs font-bold uppercase tracking-widest text-zinc-500" data-demo-state="unconfirmed">Нет подтверждений</button>
                  <button type="button" class="rounded-lg border border-zinc-200 dark:border-zinc-700 px-4 py-2 text-xs font-bold uppercase tracking-widest text-zinc-500" data-demo-state="restricted">Вывод недоступен</button>
                  <button type="button" class="rounded-lg border border-zinc-200 dark:border-zinc-700 px-4 py-2 text-xs font-bold uppercase tracking-widest text-zinc-500" data-demo-state="ok">Рабочее состояние</button>
                </div>

                <div class="rounded-lg border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-900/50" data-state-panel="ok">
                  <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-100">Готово к подтверждению заявки</p>
                  <p class="mt-1 text-xs text-zinc-500">Проверьте сумму и адрес, затем перейдите к подтверждению по OTP.</p>
                </div>
                <div class="hidden rounded-lg border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-900/50" data-state-panel="empty">
                  <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-100">У вас пока нет адресов для вывода</p>
                  <a href="/wallet/withdrawals/addresses" class="mt-2 inline-flex text-xs font-bold uppercase tracking-widest text-primary-600 dark:text-primary-400">Добавить адрес</a>
                </div>
                <div class="hidden rounded-lg border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-900/50" data-state-panel="unconfirmed">
                  <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-100">Нет подтверждённых адресов для вывода</p>
                  <a href="/wallet/withdrawals/addresses" class="mt-2 inline-flex text-xs font-bold uppercase tracking-widest text-primary-600 dark:text-primary-400">Управлять адресами</a>
                </div>
                <div class="hidden rounded-lg border border-red-300/80 bg-red-100/80 p-4 dark:border-red-500/50 dark:bg-red-500/10" data-state-panel="restricted">
                  <p class="text-sm font-semibold text-red-900 dark:text-red-200">Вывод временно недоступен</p>
                  <p class="mt-1 text-xs text-red-800/90 dark:text-red-200/90">Сейчас доступная сумма к выводу равна $0.00.</p>
                </div>

                <div class="flex flex-wrap justify-end gap-3">
                  <a href="/wallet/withdrawals" class="inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-200 dark:border-zinc-700 px-5 py-3 text-xs font-bold uppercase tracking-widest text-zinc-900 dark:text-zinc-100">История выводов</a>
                  <button class="btn-primary">Перейти к подтверждению</button>
                </div>
              </div>
            </div>
          </section>
        </main>
        <?php include __DIR__ . '/../../../partials/footer.php'; ?>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/../../../partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/../../../partials/scripts.php'; ?>
  <script>
    document.querySelectorAll('[data-demo-state]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const target = btn.dataset.demoState;
        document.querySelectorAll('[data-state-panel]').forEach((panel) => panel.classList.toggle('hidden', panel.dataset.statePanel !== target));
      });
    });
  </script>
</body>

</html>