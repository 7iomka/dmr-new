<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">
    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>

    <div class="flex-1 flex flex-col min-w-0 h-screen relative pb-15 lg:pb-0">
      <?php include __DIR__ . '/partials/header.php'; ?>

      <main class="flex-1 overflow-y-auto px-4 py-6 lg:p-10">
        <div class="max-w-7xl mx-auto space-y-6" id="deposit-page" data-fee-rate="0.03">
          <div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white text-left">Пополнение
            </h1>
            <p class="text-zinc-500 text-sm font-medium mt-1">Пополните кошелёк, используя различные способы оплаты</p>
          </div>

          <div class="grid gap-6 lg:grid-cols-12">
            <div class="space-y-6 lg:col-span-8 lg:order-1">
              <section class="card overflow-hidden lg:hidden">
                <div class="card-header">
                  <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="w-4 h-4 text-accent">
                      <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                      <path d="M14 2v6h6"></path>
                    </svg>
                    <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Сводка заказа
                    </h3>
                  </div>
                </div>

                <div class="card-body space-y-4">
                  <div class="space-y-3 text-sm">
                    <div class="flex items-center justify-between"><span class="text-zinc-500">Сумма
                        пополнения</span><span class="font-bold text-zinc-900 dark:text-white"
                        data-summary-amount>$250.00</span></div>
                    <div><span class="text-zinc-500">Комиссия за транзакцию</span>
                      <div class="text-[11px] text-zinc-500">(3%)</div>
                      <div class="font-bold text-red-500 mt-0.5" data-summary-fee>$7.50</div>
                    </div>
                  </div>

                  <div class="border-t border-zinc-200 dark:border-zinc-800 pt-4 space-y-1">
                    <p class="text-xl font-bold text-zinc-900 dark:text-white">Общая сумма</p>
                    <p class="text-2xl font-bold text-accent" data-summary-total>$257.50</p>
                  </div>

                  <button
                    class="w-full h-11 rounded-lg bg-accent hover:bg-accent/90 text-white font-bold inline-flex items-center justify-center gap-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="w-4 h-4">
                      <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    Перейти к оплате
                  </button>
                </div>
              </section>

              <div
                class="lg:hidden rounded-xl border border-blue-500/60 bg-blue-50 dark:bg-blue-500/10 px-4 py-3 text-blue-600 dark:text-blue-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="w-5 h-5 shrink-0">
                  <path d="M20 13c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V6l8-4 8 4z"></path>
                </svg>
                <div>
                  <p class="font-bold leading-none">Безопасный платёж</p>
                  <p class="text-sm leading-tight mt-1">Ваша платёжная информация зашифрована и защищена</p>
                </div>
              </div>

              <section class="card overflow-hidden">
                <div class="card-header">
                  <div class="flex items-center gap-2">
                    <span class="text-accent text-base font-bold">$</span>
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
                      <button type="button" data-amount="50"
                        class="h-11 rounded-lg border border-zinc-300 dark:border-zinc-700 text-sm font-bold text-zinc-700 dark:text-zinc-300 transition-colors hover:border-accent/50">$50</button>
                      <button type="button" data-amount="100"
                        class="h-11 rounded-lg border border-zinc-300 dark:border-zinc-700 text-sm font-bold text-zinc-700 dark:text-zinc-300 transition-colors hover:border-accent/50">$100</button>
                      <button type="button" data-amount="250"
                        class="h-11 rounded-lg border border-accent bg-accent text-sm font-bold text-white">$250</button>
                      <button type="button" data-amount="500"
                        class="h-11 rounded-lg border border-zinc-300 dark:border-zinc-700 text-sm font-bold text-zinc-700 dark:text-zinc-300 transition-colors hover:border-accent/50">$500</button>
                      <button type="button" data-amount="1000"
                        class="h-11 rounded-lg border border-zinc-300 dark:border-zinc-700 text-sm font-bold text-zinc-700 dark:text-zinc-300 transition-colors hover:border-accent/50">$1000</button>
                      <button type="button" data-amount="2500"
                        class="h-11 rounded-lg border border-zinc-300 dark:border-zinc-700 text-sm font-bold text-zinc-700 dark:text-zinc-300 transition-colors hover:border-accent/50">$2500</button>
                    </div>
                  </div>
                </div>
              </section>

              <section class="card overflow-hidden">
                <div class="card-header">
                  <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="w-4 h-4 text-accent">
                      <path d="M4 22h16"></path>
                      <path d="M5 2h14"></path>
                      <path d="M6 2v20"></path>
                      <path d="M18 2v20"></path>
                      <path d="M10 6h4"></path>
                      <path d="M10 10h4"></path>
                      <path d="M10 14h4"></path>
                      <path d="M10 18h4"></path>
                    </svg>
                    <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Платёжный
                      провайдер</h3>
                  </div>
                </div>

                <div class="card-body space-y-4">
                  <h2 class="text-lg font-bold text-zinc-900 dark:text-white">Выберите платёжного провайдера</h2>
                  <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3" data-provider-options>
                    <button type="button" data-provider="TheMerchant" aria-pressed="true"
                      class="provider-option relative rounded-lg border-2 border-accent bg-accent/10 min-h-44 px-4 py-5 flex flex-col items-center justify-center text-center transition-colors">
                      <div
                        class="absolute top-3 right-3 w-6 h-6 rounded-full border-2 border-accent grid place-items-center text-accent text-xs">
                        ✓</div>
                      <div class="w-12 h-12 rounded-full bg-zinc-100 dark:bg-zinc-800 grid place-items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="w-4 h-4 text-accent">
                          <path d="M3 7h18"></path>
                          <path d="M3 11h18"></path>
                          <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                        </svg>
                      </div>
                      <p class="text-base font-bold text-zinc-900 dark:text-white">TheMerchant</p>
                      <p class="text-sm text-zinc-500 mt-1">The Merch ru</p>
                    </button>

                    <button type="button" data-provider="Stripe" aria-pressed="false"
                      class="provider-option relative rounded-lg border border-zinc-200 dark:border-zinc-700 min-h-44 px-4 py-5 flex flex-col items-center justify-center text-center transition-colors hover:border-accent/50">
                      <div
                        class="absolute top-3 right-3 w-6 h-6 rounded-full border border-zinc-300 dark:border-zinc-600 hidden grid place-items-center text-zinc-400 text-xs">
                        ✓</div>
                      <div class="w-12 h-12 rounded-full bg-zinc-100 dark:bg-zinc-800 grid place-items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="w-4 h-4 text-accent">
                          <path d="M3 7h18"></path>
                          <path d="M3 11h18"></path>
                          <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                        </svg>
                      </div>
                      <p class="text-base font-bold text-zinc-900 dark:text-white">Stripe</p>
                      <p class="text-sm text-zinc-500 mt-1">Global payment processor - Stripe</p>
                    </button>

                    <button type="button" data-provider="Crypto" aria-pressed="false"
                      class="provider-option relative rounded-lg border border-zinc-200 dark:border-zinc-700 min-h-44 px-4 py-5 flex flex-col items-center justify-center text-center transition-colors hover:border-accent/50">
                      <div
                        class="absolute top-3 right-3 w-6 h-6 rounded-full border border-zinc-300 dark:border-zinc-600 hidden grid place-items-center text-zinc-400 text-xs">
                        ✓</div>
                      <div class="w-12 h-12 rounded-full bg-zinc-100 dark:bg-zinc-800 grid place-items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="w-4 h-4 text-accent">
                          <path d="M3 7h18"></path>
                          <path d="M3 11h18"></path>
                          <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                        </svg>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="w-4 h-4 text-accent">
                      <path d="M5 4h14l1 7H4z"></path>
                      <path d="M5 11h14v8a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2z"></path>
                      <path d="M9 15h.01"></path>
                    </svg>
                    <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Способ оплаты
                    </h3>
                  </div>
                </div>

                <div class="card-body space-y-4">
                  <h2 class="text-lg font-bold text-zinc-900 dark:text-white">Выберите способ оплаты</h2>
                  <div class="space-y-3" data-method-options>
                    <button type="button" data-method="test" aria-pressed="true"
                      class="method-option w-full rounded-lg border-2 border-accent bg-accent/10 px-4 py-4 flex items-center gap-4 text-left transition-colors">
                      <span class="w-4 h-4 rounded-full border-2 border-accent"></span>
                      <span class="w-8 h-8 rounded-lg bg-zinc-100 dark:bg-zinc-800 grid place-items-center text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="w-4 h-4">
                          <path d="M5 12h14"></path>
                          <path d="m12 5 7 7-7 7"></path>
                        </svg>
                      </span>
                      <span>
                        <span class="block text-base font-bold text-zinc-900 dark:text-white">Test</span>
                        <span class="block text-sm text-zinc-500">USD, BTC, ETH, USDT · 3% fee</span>
                      </span>
                    </button>

                    <button type="button" data-method="card" aria-pressed="false"
                      class="method-option w-full rounded-lg border border-zinc-200 dark:border-zinc-700 px-4 py-4 flex items-center gap-4 text-left transition-colors hover:border-accent/50">
                      <span class="w-4 h-4 rounded-full border border-zinc-300 dark:border-zinc-600"></span>
                      <span class="w-8 h-8 rounded-lg bg-zinc-100 dark:bg-zinc-800 grid place-items-center text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="w-4 h-4">
                          <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                          <path d="M2 10h20"></path>
                        </svg>
                      </span>
                      <span>
                        <span class="block text-base font-bold text-zinc-900 dark:text-white">Bank Card</span>
                        <span class="block text-sm text-zinc-500">Visa, Mastercard · 2.5% fee</span>
                      </span>
                    </button>
                  </div>
                </div>
              </section>

              <section class="card overflow-hidden lg:hidden">
                <div class="card-header">
                  <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="w-4 h-4 text-accent">
                      <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                      <path d="M14 2v6h6"></path>
                    </svg>
                    <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Сводка заказа
                    </h3>
                  </div>
                </div>

                <div class="card-body space-y-4">
                  <div class="space-y-3 text-sm">
                    <div class="flex items-center justify-between"><span class="text-zinc-500">Сумма
                        пополнения</span><span class="font-bold text-zinc-900 dark:text-white"
                        data-summary-amount>$250.00</span></div>
                    <div><span class="text-zinc-500">Комиссия за транзакцию</span>
                      <div class="text-[11px] text-zinc-500">(3%)</div>
                      <div class="font-bold text-red-500 mt-0.5" data-summary-fee>$7.50</div>
                    </div>
                  </div>

                  <div class="border-t border-zinc-200 dark:border-zinc-800 pt-4 space-y-1">
                    <p class="text-xl font-bold text-zinc-900 dark:text-white">Общая сумма</p>
                    <p class="text-2xl font-bold text-accent" data-summary-total>$257.50</p>
                  </div>

                  <button
                    class="w-full h-11 rounded-lg bg-accent hover:bg-accent/90 text-white font-bold inline-flex items-center justify-center gap-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="w-4 h-4">
                      <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    Перейти к оплате
                  </button>
                </div>
              </section>

              <div
                class="lg:hidden rounded-xl border border-blue-500/60 bg-blue-50 dark:bg-blue-500/10 px-4 py-3 text-blue-600 dark:text-blue-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="w-5 h-5 shrink-0">
                  <path d="M20 13c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V6l8-4 8 4z"></path>
                </svg>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="w-4 h-4 text-accent">
                      <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                      <path d="M14 2v6h6"></path>
                    </svg>
                    <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Сводка заказа
                    </h3>
                  </div>
                </div>

                <div class="card-body space-y-4">
                  <div class="space-y-3 text-sm">
                    <div class="flex items-center justify-between"><span class="text-zinc-500">Сумма
                        пополнения</span><span class="font-bold text-zinc-900 dark:text-white"
                        data-summary-amount>$250.00</span></div>
                    <div class="flex items-start justify-between gap-3"><span class="text-zinc-500">Комиссия за
                        транзакцию (3%)</span><span class="font-bold text-red-500" data-summary-fee>$7.50</span></div>
                  </div>

                  <div class="border-t border-zinc-200 dark:border-zinc-800 pt-4 space-y-1">
                    <p class="text-xl font-bold text-zinc-900 dark:text-white">Общая сумма</p>
                    <p class="text-2xl font-bold text-accent" data-summary-total>$257.50</p>
                  </div>

                  <button
                    class="w-full h-11 rounded-lg bg-accent hover:bg-accent/90 text-white font-bold inline-flex items-center justify-center gap-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="w-4 h-4">
                      <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    Перейти к оплате
                  </button>
                </div>
              </section>

              <div
                class="rounded-xl border border-blue-500/60 bg-blue-50 dark:bg-blue-500/10 px-4 py-3 text-blue-600 dark:text-blue-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="w-5 h-5 shrink-0">
                  <path d="M20 13c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V6l8-4 8 4z"></path>
                </svg>
                <div>
                  <p class="font-bold leading-none">Безопасный платёж</p>
                  <p class="text-sm leading-tight mt-1">Ваша платёжная информация зашифрована и защищена</p>
                </div>
              </div>
            </aside>
          </div>
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
          button.classList.toggle('bg-accent', active);
          button.classList.toggle('border-accent', active);
          button.classList.toggle('text-white', active);
          button.classList.toggle('text-zinc-700', !active);
          button.classList.toggle('dark:text-zinc-300', !active);
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
              other.classList.toggle('border-accent', active);
              other.classList.toggle('bg-accent/10', active);
              other.classList.toggle('border-2', active);
              other.classList.toggle('border', !active);

              const marker = other.querySelector('.absolute.top-3.right-3');
              if (marker) {
                marker.classList.toggle('hidden', !active);
              }

              const radio = other.querySelector('span.w-4.h-4, span.w-5.h-5');
              if (radio) {
                radio.classList.toggle('border-accent', active);
                radio.classList.toggle('border-zinc-300', !active);
                radio.classList.toggle('dark:border-zinc-600', !active);
              }
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