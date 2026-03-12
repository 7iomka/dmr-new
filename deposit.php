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
        <!-- Main View -->
        <main class="page-main" id="deposit-page" data-fee-rate="0.03">
          <div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white text-left">Пополнение
            </h1>
            <p class="text-zinc-500 text-sm font-medium mt-1">Пополните кошелёк, используя различные способы оплаты</p>
          </div>

          <div class="grid gap-6 lg:grid-cols-12">
            <div class="space-y-6 lg:col-span-8 lg:order-1">
              <section class="card overflow-hidden">
                <div class="card-header">
                  <div class="flex items-center gap-2">
                    <span class="text-primary text-base font-bold">$</span>
                    <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Сумма</h3>
                  </div>
                </div>

                <div class="card-body space-y-4">
                  <h2 class="text-lg font-bold text-zinc-900 dark:text-white">Сумма пополнения</h2>

                  <label class="sr-only" for="deposit-amount">Сумма пополнения</label>
                  <div
                    class="h-12 rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900 px-4 flex items-center gap-3 text-zinc-900 dark:text-white">
                    <span class="opacity-70 font-bold">$</span>
                    <input id="deposit-amount" type="number" min="1" step="1" value="250"
                      class="no-spinner w-full bg-transparent outline-none text-xl font-bold" />
                  </div>

                  <div>
                    <p class="text-sm text-zinc-500 mb-3">Быстрые суммы:</p>
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-3" data-quick-amounts>
                      <button type="button" data-amount="50" data-active="false"
                        class="h-11 rounded-lg border border-zinc-300 dark:border-zinc-700 data-[active=true]:border-primary-500 data-[active=true]:bg-primary-500 text-sm font-bold text-zinc-700 dark:text-zinc-300 data-[active=true]:text-white transition-colors hover:border-primary-500/50">$50</button>
                      <button type="button" data-amount="100" data-active="false"
                        class="h-11 rounded-lg border border-zinc-300 dark:border-zinc-700 data-[active=true]:border-primary-500 data-[active=true]:bg-primary-500 text-sm font-bold text-zinc-700 dark:text-zinc-300 data-[active=true]:text-white transition-colors hover:border-primary-500/50">$100</button>
                      <button type="button" data-amount="250" data-active="true"
                        class="h-11 rounded-lg border border-zinc-300 dark:border-zinc-700 data-[active=true]:border-primary-500 data-[active=true]:bg-primary-500 text-sm font-bold text-zinc-700 dark:text-zinc-300 data-[active=true]:text-white transition-colors hover:border-primary-500/50">$250</button>
                      <button type="button" data-amount="500" data-active="false"
                        class="h-11 rounded-lg border border-zinc-300 dark:border-zinc-700 data-[active=true]:border-primary-500 data-[active=true]:bg-primary-500 text-sm font-bold text-zinc-700 dark:text-zinc-300 data-[active=true]:text-white transition-colors hover:border-primary-500/50">$500</button>
                      <button type="button" data-amount="1000" data-active="false"
                        class="h-11 rounded-lg border border-zinc-300 dark:border-zinc-700 data-[active=true]:border-primary-500 data-[active=true]:bg-primary-500 text-sm font-bold text-zinc-700 dark:text-zinc-300 data-[active=true]:text-white transition-colors hover:border-primary-500/50">$1000</button>
                      <button type="button" data-amount="2500" data-active="false"
                        class="h-11 rounded-lg border border-zinc-300 dark:border-zinc-700 data-[active=true]:border-primary-500 data-[active=true]:bg-primary-500 text-sm font-bold text-zinc-700 dark:text-zinc-300 data-[active=true]:text-white transition-colors hover:border-primary-500/50">$2500</button>
                    </div>
                  </div>
                </div>
              </section>

              <section class="card overflow-hidden">
                <div class="card-header">
                  <div class="flex items-center gap-2">
                    <i data-lucide="banknote-arrow-up" class="w-4 h-4 text-primary"></i>
                    <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Платёжный
                      провайдер</h3>
                  </div>
                </div>

                <div class="card-body space-y-4">
                  <h2 class="text-lg font-bold text-zinc-900 dark:text-white">Выберите платёжного провайдера</h2>
                  <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3" data-provider-options>
                    <button type="button" data-provider="TheMerchant" aria-pressed="true" data-active="true"
                      class="provider-option group relative rounded-lg border border-zinc-300 dark:border-zinc-700 data-[active=true]:border-2 data-[active=true]:border-primary-500 data-[active=true]:bg-primary-500/10 min-h-44 px-4 py-5 flex flex-col items-center justify-center text-center transition-colors hover:border-primary-500/50">
                      <div
                        class="absolute top-3 right-3 w-6 h-6 rounded-full bg-primary-100 dark:bg-primary-900/50 group-data-[active=false]:hidden grid place-items-center text-primary">
                        <i data-lucide="check" class="w-4 h-4"></i>
                      </div>
                      <div
                        class="w-12 h-12 rounded-full bg-zinc-100 dark:bg-zinc-800 group-data-[active=true]:bg-primary-100 group-data-[active=true]:dark:bg-primary-900/50 grid place-items-center mb-4 transition-colors">
                        <i data-lucide="credit-card" class="w-4 h-4 text-primary"></i>
                      </div>
                      <p class="text-base font-bold text-zinc-900 dark:text-white">TheMerchant</p>
                      <p class="text-sm text-zinc-500 mt-1">The Merch [RUB]</p>
                    </button>

                    <button type="button" data-provider="Stripe" aria-pressed="false" data-active="false"
                      class="provider-option group relative rounded-lg border border-zinc-300 dark:border-zinc-700 data-[active=true]:border-2 data-[active=true]:border-primary-500 data-[active=true]:bg-primary-500/10 min-h-44 px-4 py-5 flex flex-col items-center justify-center text-center transition-colors hover:border-primary-500/50">
                      <div
                        class="absolute top-3 right-3 w-6 h-6 rounded-full bg-primary-100 dark:bg-primary-900/50 group-data-[active=false]:hidden grid place-items-center text-primary">
                        <i data-lucide="check" class="w-4 h-4"></i>
                      </div>
                      <div
                        class="w-12 h-12 rounded-full bg-zinc-100 dark:bg-zinc-800 group-data-[active=true]:bg-primary-100 group-data-[active=true]:dark:bg-primary-900/50 grid place-items-center mb-4 transition-colors">
                        <i data-lucide="credit-card" class="w-4 h-4 text-primary"></i>
                      </div>
                      <p class="text-base font-bold text-zinc-900 dark:text-white">Stripe</p>
                      <p class="text-sm text-zinc-500 mt-1">Global payment processor - Stripe</p>
                    </button>

                    <button type="button" data-provider="Crypto" aria-pressed="false" data-active="false"
                      class="provider-option group relative rounded-lg border border-zinc-300 dark:border-zinc-700 data-[active=true]:border-2 data-[active=true]:border-primary-500 data-[active=true]:bg-primary-500/10 min-h-44 px-4 py-5 flex flex-col items-center justify-center text-center transition-colors hover:border-primary-500/50">
                      <div
                        class="absolute top-3 right-3 w-6 h-6 rounded-full bg-primary-100 dark:bg-primary-900/50 group-data-[active=false]:hidden grid place-items-center text-primary">
                        <i data-lucide="check" class="w-4 h-4"></i>
                      </div>
                      <div
                        class="w-12 h-12 rounded-full bg-zinc-100 dark:bg-zinc-800 group-data-[active=true]:bg-primary-100 group-data-[active=true]:dark:bg-primary-900/50 grid place-items-center mb-4 transition-colors">
                        <i data-lucide="bitcoin" class="w-4 h-4 text-primary"></i>
                      </div>
                      <p class="text-base font-bold text-zinc-900 dark:text-white">Crypto</p>
                      <p class="text-sm text-zinc-500 mt-1">Generic Crypto Payment Provider (Coinbase Commerce style)
                      </p>
                    </button>
                  </div>
                </div>
              </section>

              <section class="card overflow-hidden">
                <div class="card-header">
                  <div class="flex items-center gap-2">
                    <i data-lucide="receipt" class="w-4 h-4 text-primary"></i>
                    <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Способ оплаты
                    </h3>
                  </div>
                </div>

                <div class="card-body space-y-4">
                  <h2 class="text-lg font-bold text-zinc-900 dark:text-white">Выберите способ оплаты</h2>
                  <div class="space-y-3" data-method-options>
                    <button type="button" data-method="test" aria-pressed="true" data-active="true"
                      class="method-option group relative w-full rounded-lg border border-zinc-300 dark:border-zinc-700 data-[active=true]:border-2 data-[active=true]:border-primary-500 data-[active=true]:bg-primary-500/10 px-4 py-4 flex items-center gap-4 text-left transition-colors hover:border-primary-500/50">
                      <div
                        class="absolute top-3 right-3 w-6 h-6 rounded-full bg-primary-100 dark:bg-primary-900/50 group-data-[active=false]:hidden grid place-items-center text-primary">
                        <i data-lucide="check" class="w-4 h-4"></i>
                      </div>
                      <span
                        class="overflow-hidden w-8 h-8 rounded-lg bg-zinc-100 dark:bg-zinc-800 group-data-[active=true]:bg-primary-100 group-data-[active=true]:dark:bg-primary-900/50 grid place-items-center text-primary transition-colors">
                        <!-- Custom payment icon -->
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32">
                          <path fill="#26a17b" d="M0 0h32v32H0z" />
                          <path fill="#fff" fill-rule="evenodd" d="M17.922 17.383v-.002c-.11.008-.677.042-1.942.042-1.01 0-1.721-.03-1.971-.042v.003c-3.888-.171-6.79-.848-6.79-1.658s2.902-1.486 6.79-1.66v2.644c.254.018.982.06 1.988.06 1.207 0 1.812-.05 1.925-.06v-2.642c3.88.173 6.775.85 6.775 1.658 0 .81-2.895 1.485-6.775 1.657m0-3.59v-2.366h5.414V7.819H8.595v3.608h5.414v2.365c-4.4.202-7.71 1.074-7.71 2.118s3.31 1.915 7.71 2.118v7.582h3.913v-7.584c4.393-.202 7.694-1.073 7.694-2.116s-3.301-1.914-7.694-2.117" clip-rule="evenodd" />
                        </svg>
                      </span>
                      <span class="flex-1 min-w-0">
                        <span class="block text-base font-bold text-zinc-900 dark:text-white pr-6">Test</span>
                        <span class="block text-sm text-zinc-500">USD, BTC, ETH, USDT · 3% fee</span>
                      </span>
                    </button>

                    <button type="button" data-method="card" aria-pressed="false" data-active="false"
                      class="method-option group w-full rounded-lg border border-zinc-300 dark:border-zinc-700 data-[active=true]:border-2 data-[active=true]:border-primary-500 data-[active=true]:bg-primary-500/10 px-4 py-4 flex items-center gap-4 text-left transition-colors hover:border-primary-500/50">
                      <div
                        class="absolute top-3 right-3 w-6 h-6 rounded-full bg-primary-100 dark:bg-primary-900/50 group-data-[active=false]:hidden grid place-items-center text-primary">
                        <i data-lucide="check" class="w-4 h-4"></i>
                      </div>
                      <span
                        class="overflow-hidden w-8 h-8 rounded-lg bg-zinc-100 dark:bg-zinc-800 group-data-[active=true]:bg-primary-100 group-data-[active=true]:dark:bg-primary-900/50 grid place-items-center text-primary transition-colors">
                        <!-- If there's no custom payment icon, use the default one for cards/crypto with smaller size -->
                        <i data-lucide="credit-card" class="w-4 h-4"></i>
                      </span>
                      <span class="flex-1 min-w-0">
                        <span class="block text-base font-bold text-zinc-900 dark:text-white pr-6">Bank Card</span>
                        <span class="block text-sm text-zinc-500">Visa, Mastercard · 2.5% fee</span>
                      </span>
                    </button>
                  </div>
                </div>
              </section>

              <section class="card overflow-hidden lg:hidden">
                <div class="card-header">
                  <div class="flex items-center gap-2">
                    <i data-lucide="file" class="w-4 h-4 text-primary"></i>
                    <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Сводка заказа
                    </h3>
                  </div>
                </div>

                <div class="card-body space-y-4">
                  <div class="space-y-3 text-sm">
                    <div class="flex items-center justify-between"><span class="text-zinc-500">Сумма
                        пополнения</span><span class="font-bold text-zinc-900 dark:text-white"
                        data-summary-amount>$250.00</span></div>
                    <div class="flex items-start justify-between gap-3">
                      <span class="text-zinc-500">Комиссия за транзакцию (3%)</span>
                      <span class="font-bold text-red-500" data-summary-fee>$7.50</span>
                    </div>
                  </div>

                  <div class="border-t border-zinc-200 dark:border-zinc-800 pt-4 space-y-1">
                    <p class="text-xl font-bold text-zinc-900 dark:text-white">Общая сумма</p>
                    <p class="text-2xl font-bold text-primary" data-summary-total>$257.50</p>
                  </div>

                  <button
                    class="w-full h-11 rounded-lg btn-primary font-bold inline-flex items-center justify-center gap-2">
                    Перейти к оплате
                  </button>
                </div>
              </section>

              <div class="lg:hidden alert-info">
                <i data-lucide="shield-check" class="w-5 h-5 shrink-0"></i>
                <div>
                  <p class="font-bold leading-none">Безопасный платёж</p>
                  <p class="text-sm leading-tight mt-1">Ваша платёжная информация зашифрована и защищена</p>
                </div>
              </div>
            </div>

            <aside class="hidden lg:block lg:col-span-4 lg:order-2 space-y-4">
              <section class="card overflow-hidden">
                <div class="card-header">
                  <div class="flex items-center gap-2">
                    <i data-lucide="file" class="w-4 h-4 text-primary"></i>
                    <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Сводка заказа
                    </h3>
                  </div>
                </div>

                <div class="card-body space-y-4">
                  <div class="space-y-3 text-sm">
                    <div class="flex items-center justify-between"><span class="text-zinc-500">Сумма
                        пополнения</span><span class="font-bold text-zinc-900 dark:text-white"
                        data-summary-amount>$250.00</span></div>
                    <div class="flex items-start justify-between gap-3">
                      <span class="text-zinc-500">Комиссия за транзакцию (3%)</span>
                      <span class="font-bold text-red-500" data-summary-fee>$7.50</span>
                    </div>
                  </div>

                  <div class="border-t border-zinc-200 dark:border-zinc-800 pt-4 space-y-1">
                    <p class="text-xl font-bold text-zinc-900 dark:text-white">Общая сумма</p>
                    <p class="text-2xl font-bold text-primary" data-summary-total>$257.50</p>
                  </div>

                  <button
                    class="w-full h-11 rounded-lg btn-primary font-bold inline-flex items-center justify-center gap-2">
                    Перейти к оплате
                  </button>
                </div>
              </section>

              <div class="lg:hidden alert-info">
                <i data-lucide="shield-check" class="w-5 h-5 shrink-0"></i>
                <div>
                  <p class="font-bold leading-none">Безопасный платёж</p>
                  <p class="text-sm leading-tight mt-1">Ваша платёжная информация зашифрована и защищена</p>
                </div>
              </div>
            </aside>
          </div>
        </main>
        <?php include __DIR__ . '/partials/footer.php'; ?>
      </div>
      </main>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>

  <script>
    (function() {
      const page = document.getElementById('deposit-page');
      if (!page) return;

      const feeRate = Number(page.dataset.feeRate || 0.03);
      const amountInput = document.getElementById('deposit-amount');
      const quickButtons = Array.from(page.querySelectorAll('[data-quick-amounts] button'));

      const summaryAmount = page.querySelectorAll('[data-summary-amount]');
      const summaryFee = page.querySelectorAll('[data-summary-fee]');
      const summaryTotal = page.querySelectorAll('[data-summary-total]');

      function formatMoney(value) {
        return '$' + value.toFixed(2);
      }

      function setActiveQuickButton(currentAmount) {
        quickButtons.forEach((button) => {
          const active = Number(button.dataset.amount) === currentAmount;
          button.dataset.active = active ? 'true' : 'false';
          button.setAttribute('aria-pressed', active ? 'true' : 'false');
        });
      }

      function updateSummary(amountValue) {
        const amount = Number.isFinite(amountValue) && amountValue > 0 ? amountValue : 0;
        const fee = amount * feeRate;
        const total = amount + fee;

        summaryAmount.forEach((el) => {
          el.textContent = formatMoney(amount);
        });
        summaryFee.forEach((el) => {
          el.textContent = formatMoney(fee);
        });
        summaryTotal.forEach((el) => {
          el.textContent = formatMoney(total);
        });

        setActiveQuickButton(amount);
      }

      quickButtons.forEach((button) => {
        button.addEventListener('click', () => {
          const value = Number(button.dataset.amount || 0);
          amountInput.value = value;
          updateSummary(value);
        });
      });

      amountInput.addEventListener('input', () => {
        updateSummary(Number(amountInput.value));
      });

      function setupChoiceGroup(selector) {
        const items = Array.from(page.querySelectorAll(selector));
        items.forEach((item) => {
          item.addEventListener('click', () => {
            items.forEach((other) => {
              const active = other === item;
              other.setAttribute('aria-pressed', active ? 'true' : 'false');
              other.dataset.active = active ? 'true' : 'false';
            });
          });
        });
      }

      setupChoiceGroup('.provider-option');
      setupChoiceGroup('.method-option');
      updateSummary(Number(amountInput.value));
    })();
  </script>
</body>

</html>