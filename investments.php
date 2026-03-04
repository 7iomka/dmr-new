<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">

    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>
    <div class="flex-1 flex flex-col min-w-0 h-screen relative pb-15 lg:pb-0">
      <?php include __DIR__ . '/partials/header.php'; ?>

      <main class="flex-1 overflow-y-auto px-4 py-6 lg:p-10">
        <div class="max-w-7xl mx-auto space-y-6">
          <div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white text-left">Инвестиции</h1>
            <p class="text-zinc-500 text-sm font-medium mt-1">Просматривайте портфель долей и управляйте всеми рассрочками в одном месте.</p>
          </div>

          <div id="shares_holder" data-has-shares="true" class="card js-tabs-container">
            <!-- Header + Tabs -->
            <div class="card-header">
              <div class="js-tabs-nav flex items-center gap-2 p-1 rounded-xl bg-accent/[0.06] dark:bg-accent/[0.08] w-fit overflow-x-auto c-no-scrollbar max-w-full">
                <button data-active="true" data-target="shares"
                  class="js-tab-btn px-4 py-2 text-sm font-semibold rounded-lg border border-transparent whitespace-nowrap transition-colors data-[active=false]:bg-white/75 data-[active=false]:border-emerald-500/30 data-[active=false]:text-emerald-700 dark:data-[active=false]:bg-emerald-950/25 dark:data-[active=false]:border-emerald-500/35 dark:data-[active=false]:text-emerald-300 data-[active=true]:bg-accent data-[active=true]:text-white data-[active=true]:border-accent data-[active=true]:shadow-[0_8px_16px_rgb(16_185_129/0.18)]">
                  Мои доли
                </button>
                <button data-active="false" data-target="buy"
                  class="js-tab-btn investments-primary-tab px-4 py-2 text-sm font-semibold rounded-lg border border-transparent whitespace-nowrap transition-colors data-[active=false]:bg-white/75 data-[active=false]:border-emerald-500/30 data-[active=false]:text-emerald-700 dark:data-[active=false]:bg-emerald-950/25 dark:data-[active=false]:border-emerald-500/35 dark:data-[active=false]:text-emerald-300 data-[active=true]:bg-accent data-[active=true]:text-white data-[active=true]:border-accent data-[active=true]:shadow-[0_8px_16px_rgb(16_185_129/0.18)]">
                  Купить доли
                </button>
              </div>
            </div>

            <div class="card-body">
              <!-- TAB: BUY -->
              <div class="js-tab-content hidden" data-id="buy">
                <div class="grid grid-cols-1 xl:grid-cols-5 gap-4 xl:gap-5">
                  <div class="xl:col-span-3 flex flex-col gap-5">
                    <div
                      class="p-4 rounded-lg border flex items-center justify-between bg-zinc-50 dark:bg-[#0B0E11] border-zinc-200 dark:border-zinc-800">
                      <div class="flex-1 pr-2">
                        <p class="text-sm font-bold text-zinc-900 dark:text-zinc-200">Рассрочка</p>
                        <p class="text-xs text-zinc-500 font-medium leading-tight mt-0.5">
                          Резервируйте доли для покупки на срок от 2 до 24 месяцев
                        </p>
                      </div>

                      <button id="installmentToggle" onclick="toggleInstallment()"
                        class="w-10 h-5 rounded-full relative transition-all duration-300 flex items-center px-1 flex-shrink-0 bg-zinc-400 dark:bg-zinc-700">
                        <div id="toggleCircle"
                          class="w-3.5 h-3.5 rounded-full bg-white shadow-sm transition-transform duration-300"
                          style="transform: translateX(0px);"></div>
                      </button>
                    </div>

                    <div class="flex flex-col gap-4">
                      <div class="flex flex-col gap-2">
                        <label for="invest_summ" class="text-[10px] font-bold text-zinc-500 uppercase px-1">Введите Сумму</label>
                        <div class="relative group flex">
                          <input id="invest_summ" type="number"
                            class="no-spinner w-full rounded-lg rounded-r-none px-4 py-3 outline-none transition-all text-lg font-bold bg-white dark:bg-[#0B0E11] border border-zinc-200 dark:border-zinc-800 focus:border-accent/50 dark:focus:border-accent/50 text-zinc-900 dark:text-white"
                            value="504">
                          <div
                            class="border border-zinc-200 dark:border-zinc-800 border-l-0 flex items-center px-4 text-zinc-400 font-bold bg-black/5 dark:bg-white/5 rounded-r-lg">
                            $
                          </div>
                        </div>
                      </div>

                      <div class="flex flex-col gap-2">
                        <label for="shares_count" class="text-[10px] font-bold text-zinc-500 uppercase px-1">Количество долей</label>
                        <input id="shares_count" type="number"
                          class="no-spinner w-full rounded-lg px-4 py-3 outline-none transition-all text-lg font-bold bg-white dark:bg-[#0B0E11] border border-zinc-200 dark:border-zinc-800 focus:border-accent/50 dark:focus:border-accent/50 text-zinc-900 dark:text-white"
                          value="132806">
                      </div>
                    </div>

                    <div id="installmentField" class="flex flex-col gap-2 animate-slide-down hidden">
                      <label class="text-[10px] font-bold text-zinc-500 uppercase px-1">Срок рассрочки</label>

                      <div class="relative">
                        <select
                          class="w-full border focus:border-accent/50 rounded-lg px-4 py-3 outline-none appearance-none font-bold cursor-pointer text-sm bg-white dark:bg-[#0B0E11] border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-white">
                          <option value="3">3 месяца</option>
                          <option value="6">6 месяцев</option>
                          <option value="12" selected>12 месяцев</option>
                          <option value="24">24 месяца</option>
                        </select>

                        <i data-lucide="chevron-down"
                          class="absolute right-4 top-1/2 -translate-y-1/2 text-zinc-500 w-4 h-4 pointer-events-none"></i>
                      </div>
                    </div>

                  </div>

                  <div class="xl:col-span-2 flex flex-col gap-4 xl:gap-5">
                    <div
                      class="p-4 rounded-lg border flex flex-col gap-3 bg-zinc-50 dark:bg-[#0B0E11] border-zinc-200 dark:border-zinc-800 xl:sticky xl:top-4">
                      <div class="flex justify-between items-center">
                        <span class="text-[11px] font-bold text-zinc-500 uppercase tracking-wide">Доли</span>
                        <span class="text-sm font-bold text-accent">132 806</span>
                      </div>

                      <div class="flex justify-between items-center">
                        <span class="text-[11px] font-bold text-zinc-500 uppercase tracking-wide">Цена за Долю</span>
                        <span class="text-sm font-bold tracking-tight dark:text-zinc-200">0.003795 $ / Доля</span>
                      </div>

                      <div class="h-[1px] bg-zinc-200 dark:bg-zinc-800"></div>

                      <div class="flex justify-between items-center">
                        <span class="text-[11px] font-bold text-zinc-500 uppercase tracking-wider">Общая Сумма</span>
                        <span class="text-2xl font-bold dark:text-white">504 $</span>
                      </div>

                      <button id="mainBuyButton"
                        class="w-full py-4 bg-accent hover:bg-[#009663] text-white font-bold rounded-lg shadow-lg shadow-[#00B074]/20 transition-all active:scale-95 text-[12px] uppercase leading-snug flex items-center justify-center gap-3">
                        <i data-lucide="circle-plus" class="w-5 h-5"></i>
                        <span id="buttonText">Купить 132 806 долей за 504 $</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- TAB: SHARES -->
              <div class="js-tab-content hidden block" data-id="shares">
                <!-- EMPTY STATE (когда долей нет) -->
                <div
                  class="only-no-shares p-6 rounded-lg border border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-[#0B0E11] text-center">
                  <p class="text-base font-bold text-zinc-900 dark:text-white">У вас пока нет
                    долей</p>
                  <p class="text-sm font-medium text-zinc-500 mt-2">
                    Купите доли, чтобы открыть портфель и начать отслеживать цену и платежи.
                  </p>
                  <button
                    class="mt-5 inline-flex items-center justify-center px-4 py-3 rounded-lg bg-accent hover:bg-[#009663] text-white font-bold text-xs uppercase js-tab-btn"
                    data-target="buy" data-active="false">
                    Купить доли
                  </button>
                </div>
                <!-- NORMAL STATE (когда доли есть) -->
                <div class="only-has-shares">
                  <!-- KPI grid -->
                  <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                    <div class="p-4 rounded-lg bg-zinc-50 dark:bg-white/[0.02] border border-zinc-200 dark:border-zinc-800">
                      <p class="text-[9px] font-bold text-zinc-500 uppercase mb-1">Количество долей</p>
                      <p class="text-xl font-bold text-zinc-900 dark:text-white leading-none">132 806</p>
                    </div>
                    <div class="p-4 rounded-lg bg-zinc-50 dark:bg-white/[0.02] border border-zinc-200 dark:border-zinc-800">
                      <p class="text-[9px] font-bold text-zinc-500 uppercase mb-1">Стоимость портфеля</p>
                      <p class="text-xl font-bold text-zinc-900 dark:text-white leading-none">$ 504.00</p>
                    </div>
                    <div class="p-4 rounded-lg bg-zinc-50 dark:bg-white/[0.02] border border-zinc-200 dark:border-zinc-800">
                      <p class="text-[9px] font-bold text-zinc-500 uppercase mb-1">Текущая цена доли</p>
                      <p class="text-xl font-bold text-zinc-900 dark:text-white leading-none">$ 0.003795</p>
                    </div>
                    <div class="p-4 rounded-lg bg-zinc-50 dark:bg-white/[0.02] border border-zinc-200 dark:border-zinc-800">
                      <p class="text-[9px] font-bold text-zinc-500 uppercase mb-1">Средняя цена покупки</p>
                      <p class="text-xl font-bold text-zinc-900 dark:text-white leading-none">$ 0.003795</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <style>
            [data-has-shares="false"] .only-has-shares {
              display: none;
            }

            [data-has-shares="true"] .only-no-shares {
              display: none;
            }
          </style>

          <script>
            // Выставляем дефолтный таб до initTabs(), чтобы работал тот же паттерн, что и в "История цен"
            document.addEventListener('DOMContentLoaded', () => {
              const holder = document.getElementById('shares_holder');
              if (!holder) return;
              const hasShares = holder.dataset.hasShares === "true";
              const btnShares = holder.querySelector('.js-tab-btn[data-target="shares"]');
              const btnBuy = holder.querySelector('.js-tab-btn[data-target="buy"]');
              if (btnShares && btnBuy) {
                btnShares.setAttribute('data-active', hasShares ? "true" : "false");
                btnBuy.setAttribute('data-active', hasShares ? "false" : "true");
              }
            });
          </script>

          <!-- Рассрочки -->
          <div class="card js-tabs-container">
            <div class="card-header">
              <h3 class="text-sm font-bold uppercase tracking-wider text-zinc-900 dark:text-white">Рассрочки</h3>
              <div
                class="js-tabs-nav relative flex bg-zinc-200/50 dark:bg-zinc-800/80 p-1 rounded-lg w-fit overflow-x-auto c-no-scrollbar max-w-full">
                <div class="js-tab-highlight c-transition-slider absolute bg-white dark:bg-zinc-600 rounded-md shadow z-0 h-[calc(100%-8px)] top-[4px] left-0"></div>
                <button data-active="true" data-target="installments-active"
                  class="js-tab-btn relative z-10 px-4 py-1.5 text-xs font-semibold text-zinc-500 data-[active=true]:text-zinc-900 dark:data-[active=true]:text-white whitespace-nowrap">Активные</button>
                <button data-active="false" data-target="installments-closed"
                  class="js-tab-btn relative z-10 px-4 py-1.5 text-xs font-semibold text-zinc-500 data-[active=true]:text-zinc-900 dark:data-[active=true]:text-white whitespace-nowrap">Закрытые</button>
              </div>
            </div>

            <div class="card-body !p-0">
              <div class="js-tab-content block" data-id="installments-active">
                <div class="hidden lg:block overflow-x-auto">
                  <table class="w-full text-left border-collapse min-w-[700px] text-zinc-500 dark:text-zinc-400">
                    <thead class="text-sm">
                      <tr class="bg-zinc-50/50 dark:bg-[#1E2023]/50 border-b border-zinc-200 dark:border-zinc-800">
                        <th class="whitespace-nowrap card-body-inset-x py-4 font-bold">ID</th>
                        <th class="whitespace-nowrap card-body-inset-x py-4 font-bold">Общая сумма / План</th>
                        <th class="whitespace-nowrap card-body-inset-x py-4 font-bold">Даты</th>
                        <th class="whitespace-nowrap card-body-inset-x py-4 font-bold">Оплачено / Остаток</th>
                      </tr>
                    </thead>

                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800/50 text-sm">
                      <tr data-installment-row="88421" data-expanded="true" class="align-top hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors data-[expanded=true]:bg-zinc-50/80 dark:data-[expanded=true]:bg-white/[0.04] data-[expanded=true]:border-accent/70 data-[expanded=true]:dark:border-accent/30">
                        <td class="card-body-inset-x py-5 font-bold text-zinc-900 dark:text-white whitespace-nowrap tabular-nums">
                          <div class="flex flex-col items-start gap-2">
                            <div class="font-bold">88421</div>
                            <div class="flex gap-2">
                              <button
                                type="button"
                                data-installment-toggle="88421"
                                aria-expanded="true"
                                aria-controls="inst-payments-88421"
                                data-expanded="true"
                                class="inline-flex items-center gap-1 px-2.5 py-1.5 text-xs font-semibold rounded-md bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-all border border-zinc-200 dark:border-zinc-700 text-zinc-900 dark:text-white"
                                title="Показать платежи">
                                <span>План</span>
                                <span data-chevron class="inline-flex transition-transform rotate-180"><i data-lucide="chevron-down" class="h-4 w-4"></i></span>
                              </button>
                              <button type="button" data-fly-trigger data-fly-menu="contract-actions" data-contract-id="88421" aria-expanded="false" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-accent text-white">
                                <i data-lucide="settings" class="h-4 w-4"></i>
                              </button>
                            </div>
                          </div>
                        </td>

                        <td class="card-body-inset-x py-5 min-w-0">
                          <div class="flex flex-col gap-1">
                            <p class="text-lg font-bold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">$200.00</p>
                            <p class="font-semibold text-zinc-900 dark:text-zinc-100">3 месяца</p>
                            <p class="break-words">Платёж в месяц: <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">$66.67</span></p>
                            <p class="break-words">Зарезервировано: <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">52 707</span> долей</p>
                          </div>
                        </td>

                        <td class="card-body-inset-x py-5">
                          <p>Начало: <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">05.02.2026</span></p>
                          <p class="mt-1">Следующий: <span class="font-semibold text-red-500 tabular-nums whitespace-nowrap">05.03.2026</span></p>
                        </td>

                        <td class="card-body-inset-x py-5">
                          <p class="font-bold tabular-nums whitespace-nowrap">
                            <span class="text-accent">$66.67</span><span class="text-zinc-400 dark:text-zinc-500"> / </span><span class="text-zinc-900 dark:text-white">$133.33</span>
                          </p>
                          <p class="mt-1 break-words">Доли: <span class="font-semibold text-accent tabular-nums whitespace-nowrap">17 569</span><span class="text-zinc-400"> / </span><span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">52 707</span></p>
                        </td>
                      </tr>

                      <tr id="inst-payments-88421" data-installment-details="88421" data-expanded="true" class="data-[expanded=true]:bg-zinc-50/70 dark:data-[expanded=true]:bg-white/[0.03] data-[expanded=true]:border-accent/70 data-[expanded=true]:dark:border-accent/30">
                        <td colspan="4" class="card-body-inset-x py-6">
                          <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-black/30 overflow-hidden animate-in fade-in duration-300">
                            <div class="px-4 py-3 border-b border-zinc-200 dark:border-zinc-800">
                              <p class="font-bold text-zinc-500 dark:text-zinc-400">План платежей</p>
                            </div>
                            <table class="w-full text-left text-xs text-zinc-600 dark:text-zinc-300">
                              <thead>
                                <tr class="font-bold text-zinc-500 border-b border-zinc-200 dark:border-zinc-800">
                                  <th class="px-4 py-3">Платёж</th>
                                  <th class="px-4 py-3">Сумма</th>
                                  <th class="px-4 py-3">Доли</th>
                                  <th class="px-4 py-3">Дата выпуска</th>
                                  <th class="px-4 py-3">Срок</th>
                                  <th class="px-4 py-3 text-right">Действие</th>
                                </tr>
                              </thead>
                              <tbody class="divide-y divide-zinc-200/70 dark:divide-zinc-800/60">
                                <tr data-payment-item="88421-1">
                                  <td class="px-4 py-3 font-semibold text-zinc-900 dark:text-zinc-100">Платёж #1</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">$66.67</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">17569</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">05.02.2026</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap text-accent">
                                    <div class="flex gap-1">
                                      <i class="h-4 w-4" data-lucide="check-check"></i>
                                      <span class="text-accent">05.02.2026</span>
                                    </div>
                                  </td>
                                  <td class="px-4 py-3 text-right"><span class="inline-flex items-center rounded-md bg-accent/10 text-accent px-2 py-1 font-bold uppercase">Оплачен</span></td>
                                </tr>
                                <tr data-payment-item="88421-2" class="bg-white/70 dark:bg-white/[0.02]">
                                  <td class="px-4 py-3 font-semibold text-zinc-900 dark:text-zinc-100">Платёж #2</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">$66.67</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">17569</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">05.03.2026</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap text-amber-600">до 17.03.2026</td>
                                  <td class="px-4 py-3 text-right"><button class="px-3 py-2 rounded-md bg-accent text-white font-bold uppercase whitespace-nowrap">Оплатить сейчас</button></td>
                                </tr>
                                <tr data-payment-item="88421-3">
                                  <td class="px-4 py-3 font-semibold text-zinc-900 dark:text-zinc-100">Платёж #3</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">$66.67</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">17569</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">05.04.2026</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap text-zinc-500">до 12.04.2026</td>
                                  <td class="px-4 py-3 text-right"><span class="inline-flex items-center rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 px-2 py-1 text-[10px] font-bold uppercase">Ожидается</span></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </td>
                      </tr>

                      <tr data-installment-row="88422" data-expanded="false" class="align-top hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors data-[expanded=true]:bg-zinc-50/80 dark:data-[expanded=true]:bg-white/[0.04] data-[expanded=true]:border-accent/70 data-[expanded=true]:dark:border-accent/30">
                        <td class="card-body-inset-x py-5 font-bold text-zinc-900 dark:text-white whitespace-nowrap tabular-nums">
                          <div class="flex flex-col items-start gap-2">
                            <div class="font-bold">88422</div>
                            <div class="flex gap-2">
                              <button
                                type="button"
                                data-installment-toggle="88422"
                                aria-expanded="true"
                                aria-controls="inst-payments-88422"
                                data-expanded="true"
                                class="inline-flex items-center gap-1 px-2.5 py-1.5 text-xs font-semibold rounded-md bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-all border border-zinc-200 dark:border-zinc-700 text-zinc-900 dark:text-white"
                                title="Показать платежи">
                                <span>План</span>
                                <span data-chevron class="inline-flex transition-transform rotate-180"><i data-lucide="chevron-down" class="h-4 w-4"></i></span>
                              </button>
                              <button type="button" data-fly-trigger data-fly-menu="contract-actions" data-contract-id="88422" aria-expanded="false" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-accent text-white">
                                <i data-lucide="settings" class="h-4 w-4"></i>
                              </button>
                            </div>
                          </div>
                        </td>
                        <td class="card-body-inset-x py-5 min-w-0">
                          <div class="flex flex-col gap-1">
                            <p class="text-lg font-bold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">$100.00</p>
                            <p class="font-semibold text-zinc-900 dark:text-zinc-100">3 месяца</p>
                            <p>Платёж в месяц: <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">$33.33</span></p>
                            <p>Зарезервировано: <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">26 543</span> долей</p>
                          </div>
                        </td>
                        <td class="card-body-inset-x py-5">
                          <p>Начало: <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">10.12.2025</span></p>
                          <p class="mt-1">Следующий: <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">01.03.2026</span></p>
                        </td>
                        <td class="card-body-inset-x py-5">
                          <p class="font-bold tabular-nums whitespace-nowrap"><span class="text-accent">$0.00</span><span class="text-zinc-400 dark:text-zinc-500"> / </span><span class="text-zinc-900 dark:text-white">$100.00</span></p>
                          <p class="mt-1">Доли: <span class="font-semibold text-accent tabular-nums whitespace-nowrap">0</span><span class="text-zinc-400"> / </span><span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">26 543</span></p>
                        </td>
                      </tr>
                      <tr id="inst-payments-88422" data-installment-details="88422" data-expanded="false" class="hidden data-[expanded=true]:bg-zinc-50/70 dark:data-[expanded=true]:bg-white/[0.03] data-[expanded=true]:border-accent/70 data-[expanded=true]:dark:border-accent/30">
                        <td colspan="4" class="card-body-inset-x py-6">
                          <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-black/30 p-4 text-xs">План платежей по контракту 88422</div>
                        </td>
                      </tr>

                      <tr data-installment-row="88423" data-expanded="false" class="align-top hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors data-[expanded=true]:bg-zinc-50/80 dark:data-[expanded=true]:bg-white/[0.04] data-[expanded=true]:border-accent/70 data-[expanded=true]:dark:border-accent/30">
                        <td class="card-body-inset-x py-5 font-bold text-zinc-900 dark:text-white whitespace-nowrap tabular-nums">
                          <div class="flex flex-col items-start gap-2">
                            <div class="font-bold">88423</div>
                            <div class="flex gap-2">
                              <button
                                type="button"
                                data-installment-toggle="88423"
                                aria-expanded="true"
                                aria-controls="inst-payments-88423"
                                data-expanded="true"
                                class="inline-flex items-center gap-1 px-2.5 py-1.5 text-xs font-semibold rounded-md bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-all border border-zinc-200 dark:border-zinc-700 text-zinc-900 dark:text-white"
                                title="Показать платежи">
                                <span>План</span>
                                <span data-chevron class="inline-flex transition-transform rotate-180"><i data-lucide="chevron-down" class="h-4 w-4"></i></span>
                              </button>
                              <button type="button" data-fly-trigger data-fly-menu="contract-actions" data-contract-id="88423" aria-expanded="false" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-accent text-white">
                                <i data-lucide="settings" class="h-4 w-4"></i>
                              </button>
                            </div>
                          </div>
                        </td>
                        <td class="card-body-inset-x py-5 min-w-0">
                          <div class="flex flex-col gap-1">
                            <p class="text-lg font-bold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">$200.00</p>
                            <p class="font-semibold text-zinc-900 dark:text-zinc-100">3 месяца</p>
                            <p>Платёж в месяц: <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">$66.67</span></p>
                            <p>Зарезервировано: <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">53 086</span> долей</p>
                          </div>
                        </td>
                        <td class="card-body-inset-x py-5">
                          <p>Начало: <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">10.12.2025</span></p>
                          <p class="mt-1">Следующий: <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">01.03.2026</span></p>
                        </td>
                        <td class="card-body-inset-x py-5">
                          <p class="font-bold tabular-nums whitespace-nowrap"><span class="text-accent">$0.00</span><span class="text-zinc-400 dark:text-zinc-500"> / </span><span class="text-zinc-900 dark:text-white">$200.00</span></p>
                          <p class="mt-1">Доли: <span class="font-semibold text-accent tabular-nums whitespace-nowrap">0</span><span class="text-zinc-400"> / </span><span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">53 086</span></p>
                        </td>
                      </tr>
                      <tr id="inst-payments-88423" data-installment-details="88423" data-expanded="false" class="hidden data-[expanded=true]:bg-zinc-50/70 dark:data-[expanded=true]:bg-white/[0.03] data-[expanded=true]:border-accent/70 data-[expanded=true]:dark:border-accent/30">
                        <td colspan="4" class="card-body-inset-x py-6">
                          <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-black/30 p-4 text-xs">План платежей по контракту 88423</div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- Mobile version Installments -->
                <div class="lg:hidden divide-y divide-zinc-200 dark:divide-zinc-800/50 text-zinc-500 dark:text-zinc-400">
                  <div data-mobile-installment="88421" data-expanded="true" class="p-4 space-y-3 data-[expanded=true]:bg-zinc-50 dark:data-[expanded=true]:bg-white/[0.03]">
                    <div class="flex items-center justify-between gap-2">
                      <div class="min-w-0 text-xs">
                        <p class="text-sm font-bold text-zinc-900 dark:text-white tabular-nums">ID: 88421</p>
                      </div>
                      <div class="flex gap-2">
                        <button type="button"
                          data-mobile-toggle="88421"
                          data-expanded="true"
                          aria-expanded="true"
                          aria-controls="mobile-plan-88421"
                          class="inline-flex items-center gap-1 px-2.5 py-1.5 text-xs font-semibold rounded-md bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-all border border-zinc-200 dark:border-zinc-700 text-zinc-900 dark:text-white">
                          <span>План</span>
                          <span data-chevron class="inline-flex transition-transform rotate-180">
                            <i data-lucide="chevron-down" class="h-4 w-4"></i>
                          </span>
                        </button>
                        <button type="button"
                          data-fly-trigger
                          data-fly-menu="contract-actions" data-contract-id="88421"
                          aria-expanded="false"
                          class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-accent text-white">
                          <i data-lucide="settings" class="h-4 w-4"></i>
                        </button>
                      </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2 text-[11px]">
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Общая сумма</p>
                        <p class="text-sm font-bold text-zinc-900 dark:text-white tabular-nums">$200.00</p>
                      </div>
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Даты</p>
                        <div class="flex flex-col gap-1">
                          <p class="flex items-center gap-1 text-zinc-600 dark:text-zinc-300 tracking-tight">
                            <i class="w-[1em] h-[1em]" data-lucide="calendar-check-2"></i>
                            <span class="leading-none text-zinc-900 dark:text-white">05.02.2026</span>
                          </p>
                          <p class="flex items-center gap-1 text-zinc-600 dark:text-zinc-300 tracking-tight">
                            <i class="w-[1em] h-[1em]" data-lucide="clock-fading"></i>
                            <span class="leading-none font-semibold text-red-500">05.03.2026</span>
                          </p>
                        </div>
                      </div>
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Оплачено / Остаток</p>
                        <p class="font-semibold tabular-nums"><span class="text-accent">$66.67</span> / <span class="text-zinc-900 dark:text-white">$133.33</span></p>
                      </div>
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Доли</p>
                        <p class="font-semibold tabular-nums"><span class="text-accent">17 569</span> / <span class="text-zinc-900 dark:text-white">52 707</span></p>
                      </div>
                    </div>

                    <div id="mobile-plan-88421" data-mobile-plan="88421" class="space-y-3">
                      <div data-payment-item="88421-1" class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2">
                        <div class="flex items-center justify-between">
                          <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #1</p><span class="inline-flex items-center rounded-md bg-accent/10 text-accent px-2 py-1 text-[9px] font-bold uppercase">Оплачен</span>
                        </div>
                        <p class="mt-1 text-[11px]">Дата выпуска: 05.02.2026</p>
                        <p class="mt-1 text-[11px]">Дата оплаты: <span class="text-accent">05.02.2026</span></p>
                        <p class="mt-1 text-[11px]">Сумма: <span class="font-semibold text-zinc-900 dark:text-white">$66.67</span></p>
                        <p class="mt-1 text-[11px]">Доли: <span class="font-semibold text-zinc-900 dark:text-white">17569</span></p>
                      </div>

                      <div data-payment-item="88421-2" class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 shadow-sm">
                        <div class="flex items-center justify-between">
                          <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #2</p><span class="inline-flex items-center rounded-md bg-amber-500/10 text-amber-700 dark:text-amber-300 px-2 py-1 text-[9px] font-bold uppercase">В ожидании</span>
                        </div>
                        <p class="mt-1 text-[11px]">Дата выпуска: 05.03.2026</p>
                        <p class="mt-1 text-[11px]">Срок: <span class="font-semibold text-amber-600">до 17.03.2026</span></p>
                        <p class="mt-1 text-[11px]">Сумма: <span class="font-semibold text-zinc-900 dark:text-white">$66.67</span></p>
                        <p class="mt-1 text-[11px]">Доли: <span class="font-semibold text-zinc-900 dark:text-white">17569</span></p>
                        <button class="mt-3 w-full px-3 py-2.5 rounded-lg bg-accent text-white text-[11px] font-bold uppercase">Оплатить сейчас</button>
                      </div>

                      <div data-payment-item="88421-3" class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2">
                        <div class="flex items-center justify-between">
                          <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #3</p><span class="inline-flex items-center rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 px-2 py-1 text-[9px] font-bold uppercase">Ожидается</span>
                        </div>
                        <p class="mt-1 text-[11px]">Дата выпуска: 05.04.2026</p>
                        <p class="mt-1 text-[11px]">Срок: <span class="font-semibold">до 12.04.2026</span></p>
                        <p class="mt-1 text-[11px]">Сумма: <span class="font-semibold text-zinc-900 dark:text-white">$66.67</span></p>
                        <p class="mt-1 text-[11px]">Доли: <span class="font-semibold text-zinc-900 dark:text-white">17569</span></p>
                      </div>
                    </div>
                  </div>

                  <div data-mobile-installment="88422" data-expanded="false" class="p-4 space-y-3 data-[expanded=true]:bg-zinc-50 dark:data-[expanded=true]:bg-white/[0.03]">
                    <div class="flex items-center justify-between gap-2">
                      <p class="text-sm font-bold text-zinc-900 dark:text-white tabular-nums">ID: 88422</p>
                      <div class="flex gap-2">
                        <button type="button"
                          data-mobile-toggle="88422"
                          data-expanded="true"
                          aria-expanded="true"
                          aria-controls="mobile-plan-88422"
                          class="inline-flex items-center gap-1 px-2.5 py-1.5 text-xs font-semibold rounded-md bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-all border border-zinc-200 dark:border-zinc-700 text-zinc-900 dark:text-white">
                          <span>План</span>
                          <span data-chevron class="inline-flex transition-transform rotate-180">
                            <i data-lucide="chevron-down" class="h-4 w-4"></i>
                          </span>
                        </button>
                        <button type="button"
                          data-fly-trigger
                          data-fly-menu="contract-actions" data-contract-id="88422"
                          aria-expanded="false"
                          class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-accent text-white">
                          <i data-lucide="settings" class="h-4 w-4"></i>
                        </button>
                      </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2 text-[11px]">
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Общая сумма</p>
                        <p class="font-bold text-zinc-900 dark:text-white tabular-nums">$100.00</p>
                      </div>
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Даты</p>
                        <div class="flex flex-col gap-1">
                          <p class="flex items-center gap-1 text-zinc-600 dark:text-zinc-300 tracking-tight">
                            <i class="w-[1em] h-[1em]" data-lucide="calendar-check-2"></i>
                            <span class="leading-none text-zinc-900 dark:text-white">10.12.2026</span>
                          </p>
                          <p class="flex items-center gap-1 text-zinc-600 dark:text-zinc-300 tracking-tight">
                            <i class="w-[1em] h-[1em]" data-lucide="clock-fading"></i>
                            <span class="leading-none font-semibold text-amber-600">12.03.2026</span>
                          </p>
                        </div>
                      </div>
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Оплачено / Остаток</p>
                        <p class="font-semibold tabular-nums"><span class="text-accent">$0.00</span> / <span class="text-zinc-900 dark:text-white">$100.00</span></p>
                      </div>
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Доли</p>
                        <p class="font-semibold tabular-nums"><span class="text-accent">0</span> / <span class="text-zinc-900 dark:text-white">26 543</span></p>
                      </div>
                    </div>

                    <div id="mobile-plan-88422" data-mobile-plan="88422" class="hidden space-y-3">
                      <div data-payment-item="88422-1" class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-card shadow-sm p-4">
                        <div class="flex items-start justify-between">
                          <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #1</p><span class="inline-flex items-center rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 px-2 py-1 text-[9px] font-bold uppercase">Ожидается</span>
                        </div>
                        <p class="mt-1 text-[11px]">Дата выпуска: 01.03.2026</p>
                        <p class="mt-1 text-[11px]">Сумма: <span class="font-semibold text-zinc-900 dark:text-white">$33.33</span></p>
                        <p class="mt-1 text-[11px]">Доли: <span class="font-semibold text-zinc-900 dark:text-white">8847</span></p>
                      </div>
                      <div data-payment-item="88422-2" class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-card shadow-sm p-4">
                        <div class="flex items-start justify-between">
                          <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #2</p><span class="inline-flex items-center rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 px-2 py-1 text-[9px] font-bold uppercase">Ожидается</span>
                        </div>
                        <p class="mt-1 text-[11px]">Дата выпуска: 01.04.2026</p>
                        <p class="mt-1 text-[11px]">Сумма: <span class="font-semibold text-zinc-900 dark:text-white">$33.33</span></p>
                        <p class="mt-1 text-[11px]">Доли: <span class="font-semibold text-zinc-900 dark:text-white">8848</span></p>
                      </div>
                      <div data-payment-item="88422-3" class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-card shadow-sm p-4">
                        <div class="flex items-start justify-between">
                          <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #3</p><span class="inline-flex items-center rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 px-2 py-1 text-[9px] font-bold uppercase">Ожидается</span>
                        </div>
                        <p class="mt-1 text-[11px]">Дата выпуска: 01.05.2026</p>
                        <p class="mt-1 text-[11px]">Сумма: <span class="font-semibold text-zinc-900 dark:text-white">$33.34</span></p>
                        <p class="mt-1 text-[11px]">Доли: <span class="font-semibold text-zinc-900 dark:text-white">8848</span></p>
                      </div>
                    </div>
                  </div>

                  <div data-mobile-installment="88423" data-expanded="false" class="p-4 space-y-3 data-[expanded=true]:bg-zinc-50 dark:data-[expanded=true]:bg-white/[0.03]">
                    <div class="flex items-center justify-between gap-2">
                      <p class="text-sm font-bold text-zinc-900 dark:text-white tabular-nums">ID: 88423</p>
                      <div class="flex gap-2">
                        <button type="button"
                          data-mobile-toggle="88423"
                          data-expanded="true"
                          aria-expanded="true"
                          aria-controls="mobile-plan-88423"
                          class="inline-flex items-center gap-1 px-2.5 py-1.5 text-xs font-semibold rounded-md bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-all border border-zinc-200 dark:border-zinc-700 text-zinc-900 dark:text-white">
                          <span>План</span>
                          <span data-chevron class="inline-flex transition-transform rotate-180">
                            <i data-lucide="chevron-down" class="h-4 w-4"></i>
                          </span>
                        </button>
                        <button type="button"
                          data-fly-trigger
                          data-fly-menu="contract-actions" data-contract-id="88423"
                          aria-expanded="false"
                          class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-accent text-white">
                          <i data-lucide="settings" class="h-4 w-4"></i>
                        </button>
                      </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2 text-[11px]">
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Общая сумма</p>
                        <p class="font-bold text-zinc-900 dark:text-white tabular-nums">$200.00</p>
                      </div>
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Даты</p>
                        <div class="flex flex-col gap-1">
                          <p class="flex items-center gap-1 text-zinc-600 dark:text-zinc-300 tracking-tight">
                            <i class="w-[1em] h-[1em]" data-lucide="calendar-check-2"></i>
                            <span class="leading-none text-zinc-900 dark:text-white">10.12.2026</span>
                          </p>
                          <p class="flex items-center gap-1 text-zinc-600 dark:text-zinc-300 tracking-tight">
                            <i class="w-[1em] h-[1em]" data-lucide="clock-fading"></i>
                            <span class="leading-none font-semibold">12.03.2026</span>
                          </p>
                        </div>
                      </div>
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Оплачено / Остаток</p>
                        <p class="font-semibold tabular-nums"><span class="text-accent">$0.00</span> / <span class="text-zinc-900 dark:text-white">$200.00</span></p>
                      </div>
                      <div class="bg-card rounded-lg border border-zinc-200 dark:border-zinc-800 px-3 py-2 flex flex-col gap-1">
                        <p>Доли</p>
                        <p class="font-semibold tabular-nums"><span class="text-accent">0</span> / <span class="text-zinc-900 dark:text-white">53 086</span></p>
                      </div>
                    </div>

                    <div id="mobile-plan-88423" data-mobile-plan="88423" class="hidden space-y-3">
                      <div data-payment-item="88423-1" class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-card shadow-sm p-4">
                        <div class="flex items-start justify-between">
                          <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #1</p><span class="inline-flex items-center rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 px-2 py-1 text-[9px] font-bold uppercase">Ожидается</span>
                        </div>
                        <p class="mt-1 text-[11px]">Дата выпуска: 01.03.2026</p>
                        <p class="mt-1 text-[11px]">Сумма: <span class="font-semibold text-zinc-900 dark:text-white">$66.67</span></p>
                        <p class="mt-1 text-[11px]">Доли: <span class="font-semibold text-zinc-900 dark:text-white">17695</span></p>
                      </div>
                      <div data-payment-item="88423-2" class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-card shadow-sm p-4">
                        <div class="flex items-start justify-between">
                          <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #2</p><span class="inline-flex items-center rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 px-2 py-1 text-[9px] font-bold uppercase">Ожидается</span>
                        </div>
                        <p class="mt-1 text-[11px]">Дата выпуска: 01.04.2026</p>
                        <p class="mt-1 text-[11px]">Сумма: <span class="font-semibold text-zinc-900 dark:text-white">$66.67</span></p>
                        <p class="mt-1 text-[11px]">Доли: <span class="font-semibold text-zinc-900 dark:text-white">17695</span></p>
                      </div>
                      <div data-payment-item="88423-3" class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-card shadow-sm p-4">
                        <div class="flex items-start justify-between">
                          <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #3</p><span class="inline-flex items-center rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 px-2 py-1 text-[9px] font-bold uppercase">Ожидается</span>
                        </div>
                        <p class="mt-1 text-[11px]">Дата выпуска: 01.05.2026</p>
                        <p class="mt-1 text-[11px]">Сумма: <span class="font-semibold text-zinc-900 dark:text-white">$66.66</span></p>
                        <p class="mt-1 text-[11px]">Доли: <span class="font-semibold text-zinc-900 dark:text-white">17696</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="js-tab-content hidden" data-id="installments-closed">
                <div class="p-8 text-center">
                  <div
                    class="max-w-xl mx-auto rounded-xl border border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-[#0B0E11] px-6 py-10">
                    <p class="text-sm font-bold text-zinc-900 dark:text-white mb-2">Пока нет закрытых рассрочек</p>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400">
                      После полной оплаты или закрытия Закрыть история завершённых рассрочек появится в этом разделе.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Portals -->

  <div
    data-fly-portal="contract-actions"
    class="fixed inset-0 z-[9999] hidden">
    <button type="button" data-fly-backdrop class="absolute inset-0 cursor-default"></button>

    <div
      data-fly-panel
      class="absolute min-w-[260px] rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-[#1E2023] shadow-lg overflow-hidden">
      <button type="button" data-action="pay_all"
        class="w-full px-4 py-3 text-left text-sm hover:bg-zinc-50 dark:hover:bg-white/[0.03] flex items-center gap-3">
        <i data-lucide="dollar-sign" class="h-4 w-4 text-zinc-400"></i>
        Оплатить весь контракт
      </button>

      <button type="button" data-action="pay_some"
        class="w-full px-4 py-3 text-left text-sm hover:bg-zinc-50 dark:hover:bg-white/[0.03] flex items-center gap-3">
        <i data-lucide="calendar" class="h-4 w-4 text-zinc-400"></i>
        Оплатить несколько месяцев
      </button>

      <div class="h-px bg-zinc-100 dark:bg-zinc-800"></div>

      <button type="button" data-action="cancel"
        class="w-full px-4 py-3 text-left text-sm hover:bg-zinc-50 dark:hover:bg-white/[0.03] flex items-center gap-3">
        <i data-lucide="x" class="h-4 w-4 text-zinc-400"></i>
        Отменить контракт
      </button>
    </div>
  </div>

  <script>
    (function() {
      const toggleButtons = document.querySelectorAll('[data-installment-toggle]');
      const mobileToggleButtons = document.querySelectorAll('[data-mobile-toggle]');

      function setChevronState(btn, isOpen) {
        const chevron = btn?.querySelector('[data-chevron]');
        chevron?.classList.toggle('rotate-180', isOpen);
      }

      function syncInstallmentInUrl(id, payment = '') {
        const url = new URL(window.location.href);
        if (id) {
          url.searchParams.set('installment', id);
        } else {
          url.searchParams.delete('installment');
        }

        if (payment) {
          url.searchParams.set('payment', payment);
        } else {
          url.searchParams.delete('payment');
        }

        history.replaceState({}, '', `${url.pathname}${url.search}`);
      }

      function setDesktopOpen(id, shouldFocus = false) {
        document.querySelectorAll('[data-installment-details]').forEach((row) => {
          const rowId = row.getAttribute('data-installment-details');
          const btn = document.querySelector(`[data-installment-toggle="${rowId}"]`);
          const isTarget = rowId === id;
          row.classList.toggle('hidden', !isTarget);
          row.setAttribute('data-expanded', String(isTarget));

          const parentRow = document.querySelector(`[data-installment-row="${rowId}"]`);
          if (parentRow) {
            parentRow.setAttribute('data-expanded', String(isTarget));
          }

          if (btn) {
            btn.setAttribute('aria-expanded', String(isTarget));
            btn.setAttribute('data-expanded', String(isTarget));
            setChevronState(btn, isTarget);
          }
        });

        if (shouldFocus) {
          const targetRow = document.querySelector(`[data-installment-row="${id}"]`);
          if (targetRow) {
            targetRow.scrollIntoView({
              behavior: 'smooth',
              block: 'center'
            });
          }
        }
      }

      function setMobileOpen(id, shouldFocus = false) {
        document.querySelectorAll('[data-mobile-plan]').forEach((plan) => {
          const planId = plan.getAttribute('data-mobile-plan');
          const btn = document.querySelector(`[data-mobile-toggle="${planId}"]`);
          const isTarget = planId === id;
          plan.classList.toggle('hidden', !isTarget);

          const card = document.querySelector(`[data-mobile-installment="${planId}"]`);
          if (card) {
            card.setAttribute('data-expanded', String(isTarget));
          }

          if (btn) {
            btn.setAttribute('aria-expanded', String(isTarget));
            btn.setAttribute('data-expanded', String(isTarget));
            setChevronState(btn, isTarget);
          }
        });

        if (shouldFocus) {
          const targetCard = document.querySelector(`[data-mobile-installment="${id}"]`);
          if (targetCard) {
            targetCard.classList.add('ring-2', 'ring-accent/60', 'rounded-xl');
            targetCard.scrollIntoView({
              behavior: 'smooth',
              block: 'start'
            });
            setTimeout(() => targetCard.classList.remove('ring-2', 'ring-accent/60', 'rounded-xl'), 2500);
          }
        }
      }

      function focusPayment(id, payment) {
        if (!payment) return;
        const paymentTarget = document.querySelector(`[data-payment-item="${id}-${payment}"]`);
        if (!paymentTarget) return;

        paymentTarget.classList.add('ring-2', 'ring-amber-400/80', 'rounded-lg');
        paymentTarget.scrollIntoView({
          behavior: 'smooth',
          block: 'center'
        });
        setTimeout(() => paymentTarget.classList.remove('ring-2', 'ring-amber-400/80', 'rounded-lg'), 2800);
      }

      function parseInstallmentTarget() {
        const params = new URLSearchParams(window.location.search);
        const targetId = params.get('installment') || params.get('installmentId') || '';
        const payment = params.get('payment') || params.get('paymentNumber') || '';
        return {
          targetId,
          payment
        };
      }

      toggleButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
          const id = btn.getAttribute('data-installment-toggle');
          const row = document.querySelector(`[data-installment-details="${id}"]`);
          if (!row) return;

          const isOpen = !row.classList.contains('hidden');
          if (isOpen) {
            setDesktopOpen('');
            syncInstallmentInUrl('');
            return;
          }

          setDesktopOpen(id);
          syncInstallmentInUrl(id);
        });
      });

      mobileToggleButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
          const id = btn.getAttribute('data-mobile-toggle');
          const plan = document.querySelector(`[data-mobile-plan="${id}"]`);
          if (!plan) return;

          const isOpen = !plan.classList.contains('hidden');
          if (isOpen) {
            setMobileOpen('');
            syncInstallmentInUrl('');
            return;
          }

          setMobileOpen(id);
          syncInstallmentInUrl(id);
        });
      });

      const {
        targetId,
        payment
      } = parseInstallmentTarget();

      if (targetId) {
        setDesktopOpen(targetId, true);
        setMobileOpen(targetId, true);
        syncInstallmentInUrl(targetId, payment);
        setTimeout(() => focusPayment(targetId, payment), 350);
      } else {
        setDesktopOpen('88421');
        setMobileOpen('88421');
      }
    })();
  </script>
  <!-- MENU dropdowns (DEMO only) -->
  <script type="module">
    import {
      computePosition,
      autoUpdate,
      offset,
      flip,
      shift
    } from 'https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.10/+esm';

    const state = {
      openKey: null, // какое меню открыто: "actions" | "status" | ...
      triggerEl: null, // активный trigger
      triggerData: null, // dataset/контекст триггера
      cleanup: null,
    };

    function getPortal(key) {
      return document.querySelector(`[data-fly-portal="${key}"]`);
    }

    function getPanel(portal) {
      return portal?.querySelector('[data-fly-panel]');
    }

    function closeCurrent() {
      if (!state.openKey) return;

      const portal = getPortal(state.openKey);
      portal?.classList.add('hidden');

      if (state.triggerEl) {
        state.triggerEl.setAttribute('aria-expanded', 'false');
      }

      state.cleanup?.();
      state.cleanup = null;

      state.openKey = null;
      state.triggerEl = null;
      state.triggerData = null;
    }

    async function positionCurrent() {
      if (!state.openKey || !state.triggerEl) return;

      const portal = getPortal(state.openKey);
      const panel = getPanel(portal);
      if (!portal || !panel) return;

      const {
        x,
        y
      } = await computePosition(state.triggerEl, panel, {
        placement: 'bottom-end',
        strategy: 'fixed',
        middleware: [offset(8), flip(), shift({
          padding: 8
        })],
      });

      panel.style.left = `${x}px`;
      panel.style.top = `${y}px`;
    }

    function openMenuForTrigger(triggerEl) {
      const key = triggerEl.dataset.flyMenu; // "actions", "status", ...
      if (!key) return;

      // toggle same menu for same trigger
      if (state.openKey === key && state.triggerEl === triggerEl) {
        closeCurrent();
        return;
      }

      // закрыть предыдущее
      closeCurrent();

      const portal = getPortal(key);
      const panel = getPanel(portal);
      if (!portal || !panel) return;

      state.openKey = key;
      state.triggerEl = triggerEl;
      state.triggerData = {
        ...triggerEl.dataset
      }; // flyId, contractId, etc.

      portal.classList.remove('hidden');
      triggerEl.setAttribute('aria-expanded', 'true');

      // авто-перепозиционирование
      state.cleanup = autoUpdate(triggerEl, panel, positionCurrent);

      positionCurrent();

      // если иконки lucide внутри меню/кнопок
      if (window.lucide) window.lucide.createIcons();
    }

    // 1) клики по триггерам
    document.addEventListener('click', (e) => {
      const trigger = e.target.closest('[data-fly-trigger]');
      if (trigger) {
        openMenuForTrigger(trigger);
        return;
      }

      // 2) клик по бэкдропу любого портала
      const backdrop = e.target.closest('[data-fly-backdrop]');
      if (backdrop) {
        closeCurrent();
        return;
      }

      // 3) клик вне меню/триггера -> закрыть
      if (state.openKey) {
        const portal = getPortal(state.openKey);
        const panel = getPanel(portal);

        const clickedInsidePanel = panel && panel.contains(e.target);
        const clickedTrigger = state.triggerEl && state.triggerEl.contains(e.target);

        if (!clickedInsidePanel && !clickedTrigger) closeCurrent();
      }
    });

    // ESC закрыть
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeCurrent();
    });

    // Пример: обработка действий для contract actions menu
    document.addEventListener('click', (e) => {
      const btn = e.target.closest('[data-fly-portal="contract-actions"] [data-action]');
      if (!btn) return;

      const action = btn.dataset.action; // pay_all | pay_some | cancel
      const contractId = state.triggerEl?.dataset.contractId; // 88421


      console.log('contract actions menu:', {
        action,
        contractId
      });

      closeCurrent();
    });
  </script>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>