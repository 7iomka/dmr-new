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
          <section class="space-y-6">
            <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
              <div>
                <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white">Адреса для вывода</h1>
                <p class="mt-1 text-sm font-medium text-zinc-500">Добавьте адреса, на которые вы сможете выводить средства. Перед использованием адрес необходимо подтвердить.</p>
              </div>
              <button class="btn-primary" data-modal-open="withdraw-address-add">
                <i data-lucide="plus-circle" class="h-4 w-4"></i>Добавить адрес
              </button>
            </div>

            <div class="grid gap-4 lg:grid-cols-2">
              <article class="card-simple space-y-3">
                <div class="flex items-center justify-between gap-3">
                  <p class="font-semibold text-zinc-900 dark:text-white">Основной адрес</p>
                  <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-primary-500/10 text-primary-700 dark:text-primary-200">Подтверждён</span>
                </div>
                <p class="text-xs text-zinc-500">Сеть: USDT (BEP20)</p>
                <p class="font-mono text-xs text-zinc-700 dark:text-zinc-300 break-all">0x34fA5f2CD8Fc5c4B7A3a67E5dfEA3B12A8B392cB</p>
                <span class="inline-flex rounded border border-primary-500/30 bg-primary-500/10 px-2 py-1 text-[10px] font-bold uppercase text-primary-700 dark:text-primary-200">По умолчанию</span>
                <div class="flex flex-wrap gap-2 pt-2">
                  <button class="btn-secondary" disabled>Сделать по умолчанию</button>
                  <button class="btn-secondary text-red-500">Удалить</button>
                </div>
              </article>

              <article class="card-simple space-y-3">
                <div class="flex items-center justify-between gap-3">
                  <p class="font-semibold text-zinc-900 dark:text-white">TRC для биржи</p>
                  <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-amber-500/10 text-amber-500">Требует подтверждения</span>
                </div>
                <p class="text-xs text-zinc-500">Сеть: USDT (TRC20)</p>
                <p class="font-mono text-xs text-zinc-700 dark:text-zinc-300 break-all">TN3W4H6rK2ce4vX9YnFQHwKENnHjoxb3m9</p>
                <div class="flex flex-wrap gap-2 pt-2">
                  <button class="btn-primary btn-sm" data-modal-open="withdraw-address-confirm">Подтвердить</button>
                  <button class="btn-secondary">Сделать по умолчанию</button>
                  <button class="btn-secondary text-red-500">Удалить</button>
                </div>
              </article>
            </div>
          </section>
        </main>
        <?php include __DIR__ . '/../../../partials/footer.php'; ?>
      </div>
    </div>
  </div>

  <div class="modal animate-in fade-in duration-300" data-modal="withdraw-address-add" data-modal-size="lg" aria-hidden="true">
    <div class="modal-backdrop animate-in fade-in duration-300" data-modal-overlay data-modal-close></div>
    <div class="modal-box animate-in zoom-in-95 fade-in duration-300" role="dialog" aria-modal="true" aria-label="Добавить адрес для вывода">
      <div class="modal-header">
        <h3 class="text-lg md:text-xl font-bold text-zinc-900 dark:text-white">Добавить адрес для вывода</h3>
        <button class="modal-close" type="button" data-modal-close><i data-lucide="x" class="h-5 w-5"></i></button>
      </div>
      <div class="modal-body space-y-4">
        <div class="c-form-control">
          <label class="c-form-label" for="networkType">Сеть вывода</label>
          <select id="networkType" class="c-select">
            <option value="bep20" selected>USDT (BEP20)</option>
            <option value="trc20">USDT (TRC20)</option>
          </select>
        </div>
        <div id="networkNotice" class="rounded-lg border border-primary-500/20 bg-primary-500/10 px-3 py-2 text-xs text-primary-700 dark:text-primary-200">Рекомендуемая сеть для вывода.</div>
        <div class="c-form-control">
          <label class="c-form-label" for="newAddress">Адрес для вывода</label>
          <div class="c-form-control__input-wrap">
            <input id="newAddress" class="c-input" placeholder="Введите адрес BEP20 (0x...)">
          </div>
        </div>
        <div class="c-form-control">
          <label class="c-form-label" for="addressName">Название адреса</label>
          <div class="c-form-control__input-wrap"><input id="addressName" class="c-input" placeholder="Например, основной кошелёк"></div>
          <p class="c-form-description">Это название видно только вам</p>
        </div>
        <div class="flex justify-end gap-3 pt-2">
          <button type="button" data-modal-close class="btn-secondary">Отмена</button>
          <button type="button" class="btn-primary">Добавить адрес</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal animate-in fade-in duration-300" data-modal="withdraw-address-confirm" data-modal-size="lg" aria-hidden="true">
    <div class="modal-backdrop animate-in fade-in duration-300" data-modal-overlay data-modal-close></div>
    <div class="modal-box animate-in zoom-in-95 fade-in duration-300" role="dialog" aria-modal="true" aria-label="Подтвердить адрес для вывода">
      <div class="modal-header">
        <h3 class="text-lg md:text-xl font-bold text-zinc-900 dark:text-white">Подтвердить адрес для вывода</h3>
        <button class="modal-close" type="button" data-modal-close><i data-lucide="x" class="h-5 w-5"></i></button>
      </div>
      <div class="modal-body space-y-4">
        <div class="rounded-lg border border-zinc-200 bg-zinc-50 p-3 text-xs dark:border-zinc-700 dark:bg-zinc-900/40">
          <p class="font-semibold text-zinc-900 dark:text-zinc-100">TRC для биржи · USDT (TRC20)</p>
          <p class="mt-1 font-mono text-zinc-600 dark:text-zinc-300 break-all">TN3W4H6rK2ce4vX9YnFQHwKENnHjoxb3m9</p>
        </div>
        <div class="c-form-control">
          <label class="c-form-label" for="otpAddress">OTP-код из email</label>
          <div class="c-form-control__input-wrap"><input id="otpAddress" class="c-input" inputmode="numeric" maxlength="6" placeholder="Введите 6-значный код"></div>
        </div>
        <div class="hidden rounded-lg border border-red-300/80 bg-red-100/80 px-3 py-2 text-xs text-red-800 dark:border-red-500/50 dark:bg-red-500/10 dark:text-red-200" data-otp-error>Неверный OTP-код. Проверьте код и попробуйте снова.</div>
        <div class="flex justify-end gap-3 pt-2">
          <button type="button" data-modal-close class="btn-secondary">Отмена</button>
          <button type="button" class="btn-primary" id="otpConfirmBtn">Подтвердить адрес</button>
        </div>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/../../../partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/../../../partials/scripts.php'; ?>
  <script>
    const networkType = document.getElementById('networkType');
    const addressInput = document.getElementById('newAddress');
    const networkNotice = document.getElementById('networkNotice');

    networkType?.addEventListener('change', () => {
      const trc = networkType.value === 'trc20';
      addressInput.placeholder = trc ? 'Введите адрес TRC20 (начинается с T...)' : 'Введите адрес BEP20 (0x...)';
      networkNotice.className = trc ?
        'rounded-lg border border-amber-300/80 bg-amber-100/80 px-3 py-2 text-xs text-amber-900 dark:border-amber-500/50 dark:bg-amber-500/10 dark:text-amber-200' :
        'rounded-lg border border-primary-500/20 bg-primary-500/10 px-3 py-2 text-xs text-primary-700 dark:text-primary-200';
      networkNotice.textContent = trc ?
        'Для вывода через TRC20 может взиматься комиссия сети. Рекомендуем USDT (BEP20), если доступно.' :
        'Рекомендуемая сеть для вывода.';
    });

    document.getElementById('otpConfirmBtn')?.addEventListener('click', () => {
      const otp = document.getElementById('otpAddress')?.value || '';
      const error = document.querySelector('[data-otp-error]');
      if (otp.length !== 6) {
        error?.classList.remove('hidden');
        return;
      }
      error?.classList.add('hidden');
      document.querySelectorAll('[data-modal="withdraw-address-confirm"] [data-modal-close]').forEach((btn) => btn.click());
    });
  </script>
</body>

</html>