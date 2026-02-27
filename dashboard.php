<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">

    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>
    <!-- CONTENT AREA -->
    <div class="flex-1 flex flex-col min-w-0 h-screen relative pb-15 lg:pb-0">
      <?php include __DIR__ . '/partials/header.php'; ?>

      <!-- Main View -->
      <main class="flex-1 overflow-y-auto px-4 py-6 lg:p-10">
        <div class="max-w-7xl mx-auto space-y-6">
          <!-- Приветствие -->
          <div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white text-left">
              Добро
              пожаловать, Дорин!</h1>
            <p class="text-zinc-500 text-sm font-medium mt-1">Вот текущее состояние ваших инвестиций.</p>
          </div>

          <!-- Сетка карточек -->
          <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
            <div class="md:col-span-2 flex flex-col gap-6">
              <!-- Блок Баланса -->
              <div class="card-simple">
                <div class="flex justify-between mb-4 sm:mb-6">
                  <p class="text-[9px] sm:text-[10px] font-bold uppercase tracking-[2px] text-zinc-500">
                    Ваш баланс</p>
                  <a href="wallet.html"
                    class="group flex items-center gap-1.5 px-3 py-1.5 rounded-md bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-all border border-zinc-200 dark:border-zinc-700">
                    <span class="text-[10px] font-bold text-zinc-600 dark:text-zinc-300 uppercase">Кошелёк</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      data-lucide="chevron-right" aria-hidden="true"
                      class="lucide lucide-chevron-right w-3.5 h-3.5 text-zinc-400 transition-transform group-hover:translate-x-0.5 -mr-1.5">
                      <path d="m9 18 6-6-6-6"></path>
                    </svg>
                  </a>
                </div>
                <div class="flex-1 flex flex-col justify-center items-start gap-4">
                  <h3
                    class="text-3xl xl:text-4xl font-bold tracking-tighter text-zinc-900 dark:text-white whitespace-nowrap">
                    $ 12,450,000.80
                  </h3>
                  <div>
                    <a href="deposit.php"
                      class="col-span-2 flex items-center justify-center gap-2 px-6 py-3 bg-accent hover:bg-[#009663] text-white text-[11px] font-bold rounded-lg transition-all shadow-lg shadow-emerald-500/20 uppercase tracking-widest">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        data-lucide="plus-circle" aria-hidden="true" class="lucide lucide-plus-circle w-4 h-4">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M8 12h8"></path>
                        <path d="M12 8v8"></path>
                      </svg>
                      <span>Пополнить</span>
                    </a>
                  </div>
                </div>
              </div>

              <!-- Блок Рефералов -->
              <div class="card-simple">
                <div class="flex justify-between items-start mb-4">
                  <div class="space-y-1">
                    <p class="text-[9px] sm:text-[10px] font-bold uppercase tracking-[2px] text-zinc-500">
                      Рефералы</p>
                    <h3 class="text-2xl sm:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white">
                      12</h3>
                  </div>
                  <a href="partners.php"
                    class="group flex items-center gap-1.5 px-3 py-1.5 rounded-md bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-all border border-zinc-200 dark:border-zinc-700">
                    <span class="text-[10px] font-bold text-zinc-600 dark:text-zinc-300 uppercase">Детали</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      data-lucide="chevron-right" aria-hidden="true"
                      class="lucide lucide-chevron-right w-3.5 h-3.5 text-zinc-400 transition-transform group-hover:translate-x-0.5 -mr-1.5">
                      <path d="m9 18 6-6-6-6"></path>
                    </svg>
                  </a>
                </div>

                <div class="space-y-3">
                  <div class="group relative">
                    <label class="text-[10px] font-bold text-zinc-500 uppercase mb-1 block">Ваша
                      ссылка (платформа)</label>
                    <div
                      class="flex items-center bg-zinc-50 dark:bg-zinc-950/50 border border-zinc-200 dark:border-zinc-700 rounded-lg p-1 pr-1.5 focus-within:border-accent transition-colors">
                      <div id="ref-link"
                        class="pl-3 pr-2 py-2 truncate text-xs font-mono text-zinc-600 dark:text-zinc-300 w-full select-all">
                        https://invest.awsarhitect.me/?ref=A7CA9B55</div>
                      <?= copyButton([
                        'text' => 'https://invest.awsarhitect.me/?ref=A7CA9B55',
                      ]) ?>
                    </div>
                  </div>
                  <div class="group relative">
                    <label class="text-[10px] font-bold text-zinc-500 uppercase mb-1 block">Ваша
                      ссылка (продукт)</label>
                    <div
                      class="flex items-center bg-zinc-50 dark:bg-zinc-950/50 border border-zinc-200 dark:border-zinc-700 rounded-lg p-1 pr-1.5 focus-within:border-accent transition-colors">
                      <div id="ref-link"
                        class="pl-3 pr-2 py-2 truncate text-xs font-mono text-zinc-600 dark:text-zinc-300 w-full select-all">
                        https://awsarhitect.me/?ref=A7CA9B55</div>
                      <?= copyButton([
                        'text' => 'https://awsarhitect.me/?ref=A7CA9B55',
                      ]) ?>
                    </div>
                  </div>
                  <div
                    class="flex justify-between items-center bg-zinc-50 dark:bg-zinc-950/30 rounded-lg px-3 py-2.5 border border-zinc-200 dark:border-zinc-800">
                    <span class="text-[10px] font-bold text-zinc-500 uppercase">Код:</span>
                    <div class="flex items-center gap-3">
                      <span class="font-mono font-bold text-accent text-sm tracking-wider">A7CA9B55</span>
                      <?= copyButton([
                        'text' => 'A7CA9B55',
                        'classOverride' => 'relative text-zinc-400 hover:text-zinc-600 dark:hover:text-white transition-colors',
                      ]) ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="md:col-span-3">
              <div id="shares_holder" data-has-shares="true" class="card js-tabs-container">
                <!-- Header + Tabs -->
                <div class="card-header">
                  <h3 class="text-sm font-bold uppercase tracking-wider text-zinc-900 dark:text-white">
                    Инвестиции</h3>

                  <div class="relative flex bg-zinc-200/50 dark:bg-zinc-800/80 p-1 rounded-lg w-fit">
                    <div
                      class="js-tab-highlight c-transition-slider absolute bg-white dark:bg-zinc-600 rounded-md shadow z-0 h-[calc(100%-8px)] top-[4px] left-0">
                    </div>

                    <button data-active="false" data-target="shares"
                      class="js-tab-btn relative z-10 px-4 py-1.5 text-xs font-semibold text-zinc-500 data-[active=true]:text-zinc-900 dark:data-[active=true]:text-white">
                      Мои доли
                    </button>
                    <button data-active="true" data-target="buy"
                      class="js-tab-btn relative z-10 px-4 py-1.5 text-xs font-semibold text-zinc-500 data-[active=true]:text-zinc-900 dark:data-[active=true]:text-white">
                      Купить доли
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <!-- TAB: BUY -->
                  <div class="js-tab-content block" data-id="buy">
                    <div class="space-y-5">
                      <div
                        class="p-4 rounded-lg border flex items-center justify-between bg-zinc-50 dark:bg-[#0B0E11] border-zinc-100 dark:border-zinc-800">
                        <div class="flex-1 pr-2">
                          <p class="text-xs font-bold text-zinc-900 dark:text-zinc-200">
                            Рассрочка</p>
                          <p class="text-[9px] text-zinc-500 font-medium leading-tight mt-0.5">
                            Резервируйте доли для
                            покупки на срок от 2 до 24 месяцев</p>
                        </div>

                        <button id="installmentToggle" onclick="toggleInstallment()"
                          class="w-10 h-5 rounded-full relative transition-all duration-300 flex items-center px-1 flex-shrink-0 bg-zinc-400 dark:bg-zinc-700">
                          <div id="toggleCircle"
                            class="w-3.5 h-3.5 rounded-full bg-white shadow-sm transition-transform duration-300"
                            style="transform: translateX(0px);"></div>
                        </button>
                      </div>

                      <div class="space-y-4">
                        <div class="space-y-2">
                          <label for="invest_summ" class="text-[10px] font-bold text-zinc-500 uppercase px-1">Введите
                            Сумму</label>
                          <div class="relative group flex">
                            <input id="invest_summ" type="number"
                              class="no-spinner w-full rounded-lg rounded-r-none px-4 py-3 outline-none transition-all text-lg font-bold bg-white dark:bg-[#0B0E11] border border-zinc-200 dark:border-zinc-800 focus:border-accent/50 dark:focus:border-accent/50 text-zinc-900 dark:text-white"
                              value="504">
                            <div
                              class="border border-zinc-200 dark:border-zinc-800 border-l-0 flex items-center px-4 text-zinc-400 font-bold bg-black/5 dark:bg-white/5 rounded-r-lg">
                              $ </div>
                          </div>
                        </div>

                        <div class="space-y-2">
                          <label for="shares_count"
                            class="text-[10px] font-bold text-zinc-500 uppercase px-1">Количество
                            долей</label>
                          <input id="shares_count" type="number"
                            class="no-spinner w-full rounded-lg px-4 py-3 outline-none transition-all text-lg font-bold bg-white dark:bg-[#0B0E11] border border-zinc-200 dark:border-zinc-800 focus:border-accent/50 dark:focus:border-accent/50 text-zinc-900 dark:text-white"
                            value="132806">
                        </div>
                      </div>

                      <div id="installmentField" class="space-y-2 animate-slide-down hidden">
                        <label class="text-[10px] font-bold text-zinc-500 uppercase px-1">Срок
                          рассрочки</label>

                        <div class="relative">
                          <select
                            class="w-full border focus:border-accent/50 rounded-lg px-4 py-3 outline-none appearance-none font-bold cursor-pointer text-sm bg-white dark:bg-[#0B0E11] border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-white">
                            <option value="3">3 месяца</option>
                            <option value="6">6 месяцев</option>
                            <option value="12" selected>12 месяцев</option>
                            <option value="24">24 месяца</option>
                          </select>

                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            data-lucide="chevron-down" aria-hidden="true"
                            class="lucide lucide-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-zinc-500 w-4 h-4 pointer-events-none">
                            <path d="m6 9 6 6 6-6"></path>
                          </svg>
                        </div>
                      </div>

                      <div
                        class="p-4 rounded-lg border space-y-3 bg-zinc-50 dark:bg-[#0B0E11] border-zinc-100 dark:border-zinc-800">
                        <div class="flex justify-between items-center">
                          <span class="text-[11px] font-bold text-zinc-500 uppercase tracking-wide">Доли</span>
                          <span class="text-sm font-bold text-accent">132 806</span>
                        </div>

                        <div class="flex justify-between items-center">
                          <span class="text-[11px] font-bold text-zinc-500 uppercase tracking-wide">Цена
                            за Долю</span>
                          <span class="text-sm font-bold tracking-tight dark:text-zinc-200">0.003795
                            $ / Доля</span>
                        </div>

                        <div class="h-[1px] bg-zinc-200 dark:bg-zinc-800"></div>

                        <div class="flex justify-between items-center">
                          <span class="text-[11px] font-bold text-zinc-500 uppercase tracking-wider">Общая
                            Сумма</span>
                          <span class="text-2xl font-bold dark:text-white">504 $</span>
                        </div>
                      </div>

                      <button id="mainBuyButton"
                        class="w-full py-4 bg-accent hover:bg-[#009663] text-white font-bold rounded-lg shadow-lg shadow-[#00B074]/20 transition-all active:scale-95 text-[12px] uppercase leading-snug flex items-center justify-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          data-lucide="circle-plus" aria-hidden="true" class="lucide lucide-circle-plus w-5 h-5">
                          <circle cx="12" cy="12" r="10"></circle>
                          <path d="M8 12h8"></path>
                          <path d="M12 8v8"></path>
                        </svg>
                        <span id="buttonText">Купить 132 806 долей за 504 $</span>
                      </button>
                    </div>
                  </div>

                  <!-- TAB: SHARES -->
                  <div class="js-tab-content hidden" data-id="shares">
                    <!-- EMPTY STATE (когда долей нет) -->
                    <div
                      class="only-no-shares p-6 rounded-xl border border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-[#0B0E11] text-center">
                      <p class="text-sm font-bold text-zinc-900 dark:text-white">У вас пока нет
                        долей</p>
                      <p class="text-[11px] font-bold text-zinc-500 mt-2">
                        Купите доли, чтобы открыть портфель и начать отслеживать цену и платежи.
                      </p>
                      <button
                        class="mt-5 inline-flex items-center justify-center px-4 py-3 rounded-lg bg-accent hover:bg-[#009663] text-white font-bold text-[11px] uppercase js-tab-btn"
                        data-target="buy" data-active="false">
                        Купить доли
                      </button>
                    </div>

                    <!-- NORMAL STATE (когда доли есть) -->
                    <div class="only-has-shares">
                      <!-- KPI grid -->
                      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div
                          class="p-4 rounded-lg bg-zinc-50 dark:bg-[#0B0E11] border border-zinc-200 dark:border-zinc-800">
                          <p class="text-[9px] font-bold text-zinc-500 uppercase mb-1">
                            Количество долей</p>
                          <p class="text-2xl font-bold text-zinc-900 dark:text-white leading-none">
                            132,806</p>
                        </div>

                        <div
                          class="p-4 rounded-lg bg-zinc-50 dark:bg-[#0B0E11] border border-zinc-200 dark:border-zinc-800">
                          <p class="text-[9px] font-bold text-zinc-500 uppercase mb-1">Текущая
                            стоимость</p>
                          <p class="text-2xl font-bold text-accent leading-none">$ 504.00</p>
                          <p class="text-[10px] font-bold text-zinc-500 mt-2">Оценка по
                            текущей цене доли</p>
                        </div>

                        <div
                          class="p-4 rounded-lg bg-white dark:bg-white/[0.02] border border-zinc-200 dark:border-zinc-800">
                          <p class="text-[9px] font-bold text-zinc-500 uppercase mb-1">Текущая
                            цена доли</p>
                          <p class="text-xl font-bold text-zinc-900 dark:text-white leading-none">
                            $0.003795</p>
                        </div>

                        <div
                          class="p-4 rounded-lg bg-white dark:bg-white/[0.02] border border-zinc-200 dark:border-zinc-800">
                          <p class="text-[9px] font-bold text-zinc-500 uppercase mb-1">Средняя
                            цена покупки</p>
                          <p class="text-xl font-bold text-zinc-900 dark:text-white leading-none">
                            $0.003795</p>
                        </div>
                      </div>

                      <!-- Мини-виджеты рассрочек (если имеются) -->
                      <div class="flex items-center mb-4 gap-4">
                        <h3 class="text-sm font-bold text-zinc-900 dark:text-white uppercase tracking-tight">
                          Активные
                          рассрочки (2)</h3>
                        <a href="#"
                          class="group flex items-center gap-1.5 px-3 py-1.5 rounded-md bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-all border border-zinc-200 dark:border-zinc-700">
                          <span
                            class="text-[10px] font-bold text-zinc-600 dark:text-zinc-300 uppercase">Управление</span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            data-lucide="chevron-right" aria-hidden="true"
                            class="lucide lucide-chevron-right w-3.5 h-3.5 text-zinc-400 transition-transform group-hover:translate-x-0.5 -mr-1.5">
                            <path d="m9 18 6-6-6-6"></path>
                          </svg>
                        </a>
                      </div>

                      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Рассрочка 1: Просрочена -->
                        <div
                          class="flex flex-col p-4 rounded-lg border bg-red-500/[0.04] border-red-500/20 transition-all">
                          <div class="flex justify-between items-start mb-4">
                            <span
                              class="text-[9px] font-bold text-zinc-400 dark:text-zinc-500 uppercase leading-none">ID:
                              88421</span>
                            <span class="text-xs font-bold text-red-600 dark:text-red-400 tracking-tight leading-none">$
                              42.00</span>
                          </div>

                          <div class="flex items-start gap-3 mb-4">
                            <div class="mt-1 relative flex h-2 w-2">
                              <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                            </div>

                            <div class="space-y-1">
                              <p
                                class="text-[10px] font-bold text-zinc-700 dark:text-zinc-300 uppercase tracking-tight">
                                След. платеж: <span class="text-red-500">10.02.2026</span></p>
                              <p class="text-[9px] font-bold text-red-500/60 uppercase">
                                Оплатить не позднее: 17.02.2026
                              </p>
                            </div>
                          </div>

                          <a href="#"
                            class="w-full flex items-center justify-center gap-2 py-2.5 rounded-lg bg-red-500 hover:bg-red-600 text-white transition-all shadow-lg shadow-red-500/20 active:scale-[0.98]">
                            <span class="text-[10px] font-bold uppercase">Оплатить
                              сейчас</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" data-lucide="credit-card" aria-hidden="true"
                              class="lucide lucide-credit-card w-3.5 h-3.5">
                              <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                              <line x1="2" x2="22" y1="10" y2="10"></line>
                            </svg>
                          </a>
                        </div>

                        <!-- Рассрочка 2: Обычная -->
                        <div
                          class="flex flex-col p-4 rounded-lg border bg-zinc-50 dark:bg-white/[0.02] border-zinc-200 dark:border-zinc-800 transition-colors hover:border-zinc-300 dark:hover:border-zinc-700">
                          <div class="flex justify-between items-start mb-4">
                            <span
                              class="text-[9px] font-bold text-zinc-400 dark:text-zinc-500 uppercase leading-none">ID:
                              90152</span>
                            <span
                              class="text-xs font-bold text-zinc-900 dark:text-zinc-100 tracking-tight leading-none">$
                              120.00</span>
                          </div>

                          <div class="flex items-start gap-3 mb-4">
                            <div class="mt-1 h-2 w-2 rounded-full bg-zinc-300 dark:bg-zinc-700">
                            </div>
                            <p class="text-[10px] font-bold text-zinc-600 dark:text-zinc-300 uppercase tracking-tight">
                              След. платеж: 25.02.2026</p>
                          </div>

                          <div
                            class="w-full flex mt-auto items-center justify-center py-2.5 rounded-lg bg-zinc-100 dark:bg-zinc-800/50 border border-zinc-200 dark:border-zinc-700/50 ">
                            <span class="text-[10px] font-bold text-accent uppercase">через
                              15 дней</span>
                          </div>
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
            </div>
          </div>

          <!-- История цен -->
          <div class="w-full flex-shrink-0">
            <div class="card js-tabs-container">
              <div class="card-header">
                <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">
                  История цен</h3>
                <div class="relative flex bg-zinc-200/50 dark:bg-zinc-800/80 p-1 rounded-lg w-fit">
                  <div
                    class="js-tab-highlight c-transition-slider absolute bg-white dark:bg-zinc-600 rounded-md shadow z-0 h-[calc(100%-8px)] top-[4px] left-0"
                    style="width: 65px; transform: translateX(4px);"></div>

                  <button data-active="true" data-target="price-history-month"
                    class="js-tab-btn relative z-10 px-4 py-1.5 text-xs font-semibold text-zinc-500 data-[active=true]:text-zinc-900 dark:data-[active=true]:text-white">Месяц</button>
                  <button data-active="false" data-target="price-history-year"
                    class="js-tab-btn relative z-10 px-4 py-1.5 text-xs font-semibold text-zinc-500 data-[active=true]:text-zinc-900 dark:data-[active=true]:text-white">Год</button>
                </div>
              </div>
              <div class="card-body flex flex-col gap-6">
                <!-- KPI (static?) -->
                <div data-id="price-history-kpi">
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div
                      class="p-4 rounded-lg border border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-[#0B0E11]">
                      <p class="text-[10px] font-bold text-zinc-500 uppercase">Текущая цена</p>
                      <p class="mt-1 text-2xl font-bold tracking-tight text-zinc-900 dark:text-white">
                        $0.003795</p>
                    </div>
                    <div
                      class="p-4 rounded-lg border border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-[#0B0E11]">
                      <p class="text-[10px] font-bold text-zinc-500 uppercase">Всего проданных
                        акций</p>
                      <p class="mt-1 text-2xl font-bold tracking-tight text-zinc-900 dark:text-white">
                        5.52B</p>
                    </div>
                  </div>
                </div>

                <!-- TAB CONTENT: Месяц -->
                <div class="js-tab-content block" data-id="price-history-month">
                  <div class="rounded-lg border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-[#0B0E11] py-5">
                    <div
                      class="flex items-center justify-center gap-6 text-sm font-semibold text-zinc-600 dark:text-zinc-300 mb-4">
                      <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                        <span>Цена</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-emerald-500 shrink-0"></span>
                        <span>Проданные акции</span>
                      </div>
                    </div>
                    <div class="h-[260px] w-full">
                      <svg viewBox="0 0 900 260" class="w-full h-full text-zinc-500 dark:text-zinc-400">
                        <defs>
                          <linearGradient id="areaBlueYear" x1="0" x2="0" y1="0" y2="1">
                            <stop offset="0" stop-color="rgb(59 130 246)" stop-opacity="0.18" />
                            <stop offset="1" stop-color="rgb(59 130 246)" stop-opacity="0" />
                          </linearGradient>
                          <linearGradient id="areaGreenYear" x1="0" x2="0" y1="0" y2="1">
                            <stop offset="0" stop-color="rgb(16 185 129)" stop-opacity="0.18" />
                            <stop offset="1" stop-color="rgb(16 185 129)" stop-opacity="0" />
                          </linearGradient>
                        </defs>

                        <g stroke="rgb(148 163 184)" stroke-opacity="0.25">
                          <line x1="40" y1="30" x2="880" y2="30" />
                          <line x1="40" y1="80" x2="880" y2="80" />
                          <line x1="40" y1="130" x2="880" y2="130" />
                          <line x1="40" y1="180" x2="880" y2="180" />
                          <line x1="40" y1="230" x2="880" y2="230" />
                        </g>

                        <path
                          d="M40,230 L40,225 L120,210 L200,185 L280,165 L360,120 L440,80 L520,55 L600,42 L680,35 L760,32 L880,30 L880,230 Z"
                          fill="url(#areaBlueYear)" />
                        <path
                          d="M40,230 L40,228 L120,220 L200,205 L280,185 L360,165 L440,145 L520,125 L600,110 L680,98 L760,88 L880,75 L880,230 Z"
                          fill="url(#areaGreenYear)" />

                        <path
                          d="M40,225 L120,210 L200,185 L280,165 L360,120 L440,80 L520,55 L600,42 L680,35 L760,32 L880,30"
                          fill="none" stroke="rgb(59 130 246)" stroke-width="4" stroke-linecap="round"
                          stroke-linejoin="round" />
                        <path
                          d="M40,228 L120,220 L200,205 L280,185 L360,165 L440,145 L520,125 L600,110 L680,98 L760,88 L880,75"
                          fill="none" stroke="rgb(16 185 129)" stroke-width="4" stroke-linecap="round"
                          stroke-linejoin="round" />

                        <g fill="white" stroke-width="4">
                          <circle cx="40" cy="225" r="7" stroke="rgb(59 130 246)" />
                          <circle cx="200" cy="185" r="7" stroke="rgb(59 130 246)" />
                          <circle cx="360" cy="120" r="7" stroke="rgb(59 130 246)" />
                          <circle cx="520" cy="55" r="9" stroke="rgb(59 130 246)" />
                          <circle cx="680" cy="35" r="7" stroke="rgb(59 130 246)" />
                          <circle cx="880" cy="30" r="7" stroke="rgb(59 130 246)" />
                        </g>
                        <g fill="white" stroke-width="4">
                          <circle cx="40" cy="228" r="7" stroke="rgb(16 185 129)" />
                          <circle cx="200" cy="205" r="7" stroke="rgb(16 185 129)" />
                          <circle cx="360" cy="165" r="7" stroke="rgb(16 185 129)" />
                          <circle cx="520" cy="125" r="7" stroke="rgb(16 185 129)" />
                          <circle cx="680" cy="98" r="7" stroke="rgb(16 185 129)" />
                          <circle cx="880" cy="75" r="7" stroke="rgb(16 185 129)" />
                        </g>

                        <g fill="currentColor" font-size="12" font-weight="700">
                          <text x="40" y="252">2024</text>
                          <text x="280" y="252">2025</text>
                          <text x="520" y="252">2026</text>
                          <text x="760" y="252">2027</text>
                          <text x="880" y="252" text-anchor="end">2028</text>
                        </g>
                      </svg>
                    </div>
                  </div>
                </div>

                <!-- TAB CONTENT: Год -->
                <div class="js-tab-content hidden" data-id="price-history-year">
                  <div class="rounded-lg border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-[#0B0E11] py-5">
                    <div
                      class="flex items-center justify-center gap-6 text-sm font-semibold text-zinc-600 dark:text-zinc-300 mb-4">
                      <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                        <span>Цена</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-emerald-500 shrink-0"></span>
                        <span>Проданные акции</span>
                      </div>
                    </div>
                    <div class="h-[260px] w-full">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>