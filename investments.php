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

          <div class="card-simple">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
              <h2 class="text-sm font-bold uppercase tracking-wider text-zinc-900 dark:text-white">Мои доли</h2>
              <div class="flex flex-wrap items-center gap-2">
                <button class="px-3 py-2 rounded-lg text-[10px] font-bold uppercase tracking-wider bg-accent text-white">Купить доли</button>
                <button class="px-3 py-2 rounded-lg text-[10px] font-bold uppercase tracking-wider border border-zinc-200 dark:border-zinc-700 text-zinc-600 dark:text-zinc-300">Оформить рассрочку</button>
              </div>
            </div>

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

          <div class="card js-tabs-container">
            <div class="card-header">
              <h3 class="text-sm font-bold uppercase tracking-wider text-zinc-900 dark:text-white">Рассрочки</h3>
              <div
                class="relative flex bg-zinc-200/50 dark:bg-zinc-800/80 p-1 rounded-lg w-fit overflow-x-auto c-no-scrollbar max-w-full">
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
                  <table class="w-full text-left border-collapse min-w-[1000px] text-zinc-500 dark:text-zinc-400">
                    <thead class="text-sm">
                      <tr class="bg-zinc-50/50 dark:bg-[#1E2023]/50 border-b border-zinc-200 dark:border-zinc-800">
                        <th class="whitespace-nowrap card-body-inset-x py-4 font-bold">ID</th>
                        <th class="whitespace-nowrap card-body-inset-x py-4 font-bold">План</th>
                        <th class="whitespace-nowrap card-body-inset-x py-4 font-bold">Следующий платёж</th>
                        <th class="whitespace-nowrap card-body-inset-x py-4 font-bold">Оплачено / Остаток</th>
                        <th class="whitespace-nowrap card-body-inset-x py-4 font-bold text-right">Действия</th>
                      </tr>
                    </thead>

                    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800/50 text-sm">
                      <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors">
                        <!-- ID -->
                        <td class="card-body-inset-x py-5 font-bold text-zinc-900 dark:text-white whitespace-nowrap tabular-nums">
                          <button
                            type="button"
                            data-installment-toggle="88421"
                            aria-expanded="false"
                            aria-controls="inst-payments-88421"
                            class="mr-2 inline-flex h-7 w-7 items-center justify-center rounded-md border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-card hover:bg-zinc-50 dark:hover:bg-white/[0.03] transition-transform"
                            title="Показать платежи">
                            <i data-lucide="chevron-down" class="h-4 w-4"></i>
                          </button>
                          88421
                        </td>

                        <!-- PLAN -->
                        <td class="card-body-inset-x py-5 min-w-0">
                          <div class="flex flex-col gap-1">
                            <p class="font-semibold text-zinc-900 dark:text-zinc-100">12 месяцев</p>
                            <p class="break-words">
                              Платёж в месяц:
                              <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">$66.67</span>
                            </p>

                            <p class="break-words">
                              Зарезервировано:
                              <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">52 707</span>
                              долей
                            </p>
                            <p class="break-words">
                              Стоимость доли:
                              <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">0,00135$</span>
                            </p>
                          </div>
                        </td>

                        <!-- NEXT PAYMENT -->
                        <td class="card-body-inset-x py-5">
                          <p class="font-semibold text-red-500 tabular-nums whitespace-nowrap">10.03.2026</p>
                          <p class="break-words">
                            Оплатить до <span class="tabular-nums whitespace-nowrap">17.03.2026</span>
                          </p>
                        </td>

                        <!-- PAID / REMAIN -->
                        <td class="card-body-inset-x py-5">
                          <p class="font-bold tabular-nums whitespace-nowrap">
                            <span class="text-accent">$66.67</span>
                            <span class="text-zinc-400 dark:text-zinc-500"> / </span>
                            <span class="text-zinc-900 dark:text-white">$133.33</span>
                          </p>

                          <p class="mt-1 break-words">
                            Доли:
                            <span class="font-semibold text-accent tabular-nums whitespace-nowrap">17,569</span>
                            <span class="text-zinc-400">/</span>
                            <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">52 707</span>
                          </p>
                        </td>

                        <!-- ACTIONS (dropdown) -->
                        <td class="card-body-inset-x py-5 text-right">
                          <button
                            type="button"
                            data-fly-trigger
                            data-fly-menu="contract-actions"
                            data-contract-id="88421"
                            aria-expanded="false"
                            class="inline-flex items-center gap-2 rounded-lg bg-accent px-3 py-2 text-white text-sm font-bold">
                            <i data-lucide="settings" class="h-4 w-4"></i>
                            Действия
                            <i data-lucide="chevron-down" class="h-4 w-4 opacity-90"></i>
                          </button>
                        </td>
                      </tr>

                      <!-- DETAILS ROW -->
                      <tr id="inst-payments-88421" class="hidden">
                        <td colspan="5" class="card-body-inset-x py-6">
                          <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-zinc-50/60 dark:bg-[#1E2023]/30 overflow-hidden">
                            <div class="px-4 py-3 border-b border-zinc-200 dark:border-zinc-800 flex items-center justify-between gap-3 flex-wrap">
                              <p class="font-bold text-zinc-500 dark:text-zinc-400">
                                План платежей
                              </p>
                            </div>

                            <table class="w-full text-left text-xs text-zinc-600 dark:text-zinc-300">
                              <thead>
                                <tr class="font-bold text-zinc-500 border-b border-zinc-200 dark:border-zinc-800">
                                  <th class="px-4 py-3">Платёж</th>
                                  <th class="px-4 py-3">Сумма</th>
                                  <th class="px-4 py-3">Доли</th>
                                  <th class="px-4 py-3">Issue date</th>
                                  <th class="px-4 py-3">Срок</th>
                                  <th class="px-4 py-3 text-right">Действие</th>
                                </tr>
                              </thead>

                              <tbody class="divide-y divide-zinc-200/70 dark:divide-zinc-800/60">
                                <tr>
                                  <td class="px-4 py-3 font-semibold text-zinc-900 dark:text-zinc-100">
                                    Платёж #1
                                  </td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">$66.67</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">17569</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">05.02.2026</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap text-zinc-500">
                                    Оплачено: <span class="font-semibold text-zinc-900 dark:text-zinc-100">05.02.2026</span>
                                  </td>
                                  <td class="px-4 py-3 text-right">
                                    <span class="inline-flex items-center rounded-md bg-accent/10 text-accent px-2 py-1 font-bold uppercase">Оплачен</span>
                                  </td>
                                </tr>

                                <tr class="bg-white/70 dark:bg-white/[0.02]">
                                  <td class="px-4 py-3 font-semibold text-zinc-900 dark:text-zinc-100">Платёж #2</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">$66.67</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">17569</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">05.03.2026</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap text-amber-600">до 17.03.2026</td>
                                  <td class="px-4 py-3 text-right">
                                    <button class="px-3 py-2 rounded-md bg-accent text-white font-bold uppercase whitespace-nowrap">Оплатить сейчас</button>
                                  </td>
                                </tr>

                                <tr>
                                  <td class="px-4 py-3 font-semibold text-zinc-900 dark:text-zinc-100">Платёж #3</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">$66.67</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">17569</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap">05.04.2026</td>
                                  <td class="px-4 py-3 tabular-nums whitespace-nowrap text-zinc-500">до 12.04.2026</td>
                                  <td class="px-4 py-3 text-right">
                                    <span class="inline-flex items-center rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 px-2 py-1 text-[10px] font-bold uppercase">Ожидается</span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <!-- MOBILE -->
                <div class="lg:hidden divide-y divide-zinc-100 dark:divide-zinc-800/50 text-zinc-500 dark:text-zinc-400">
                  <!-- MOBILE: Contract 88421 (header + subcards) -->
                  <div class="p-4 space-y-4">

                    <!-- Header -->
                    <div class="flex flex-col min-[360px]:flex-row items-start justify-between gap-3">
                      <div class="min-w-0 text-xs">
                        <div class="flex items-center gap-2">
                          <p class="text-sm font-bold text-zinc-900 dark:text-white tabular-nums">
                            ID: 88421
                          </p>

                          <!-- Optional badge -->
                          <span class="shrink-0 px-2 py-1 rounded bg-red-500/10 text-red-500 text-[9px] font-bold uppercase whitespace-nowrap">
                            Просрочка
                          </span>
                        </div>
                        <div class="flex flex-col gap-1 mt-1">
                          <p>План: <span class="font-semibold text-zinc-900 dark:text-zinc-100">12 месяцев</span></p>
                          <p class="break-words">
                            Платёж в месяц:
                            <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">$66.67</span>
                          </p>

                          <p class="break-words">
                            Зарезервировано:
                            <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">52 707</span>
                            долей
                          </p>
                          <p class="break-words">
                            Стоимость доли:
                            <span class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">0,00135$</span>
                          </p>
                        </div>
                      </div>

                      <!-- Contract actions-->
                      <button
                        type="button"
                        data-fly-trigger
                        data-fly-menu="contract-actions"
                        data-contract-id="88421"
                        aria-expanded="false"
                        class="inline-flex items-center gap-2 rounded-lg bg-accent px-3 py-2 text-white text-sm font-bold">
                        <i data-lucide="settings" class="h-4 w-4"></i>
                        Действия
                        <i data-lucide="chevron-down" class="h-4 w-4 opacity-90"></i>
                      </button>

                    </div>

                    <!-- Subcards -->
                    <div class="space-y-3">

                      <!-- Payment #1 (paid) -->
                      <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white text-zinc-500 dark:text-zinc-400 dark:bg-card shadow-sm">
                        <div class="px-4 py-3 flex items-start justify-between gap-3">
                          <div class="min-w-0">
                            <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #1</p>
                            <p class="mt-1 text-[11px]">
                              Issue date: <span class="tabular-nums whitespace-nowrap">05.02.2026</span>
                            </p>
                          </div>

                          <span class="shrink-0 inline-flex items-center rounded-md bg-accent/10 text-accent px-2 py-1 text-[9px] font-bold uppercase">
                            Оплачен
                          </span>
                        </div>

                        <div class="px-4 pb-4 grid grid-cols-2 gap-3 text-[11px]">
                          <div>
                            <p>Сумма</p>
                            <p class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">$66.67</p>
                          </div>
                          <div>
                            <p>Доли</p>
                            <p class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">17569</p>
                          </div>
                        </div>
                      </div>

                      <!-- Payment #2 (due + action) -->
                      <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white text-zinc-500 dark:text-zinc-400 dark:bg-card shadow-sm">
                        <div class="px-4 py-3 flex items-start justify-between gap-3">
                          <div class="min-w-0">
                            <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #2</p>
                            <p class="mt-1 text-[11px]">
                              Issue date: <span class="tabular-nums whitespace-nowrap">05.03.2026</span>
                            </p>
                            <p class="mt-1 text-[11px]">
                              Срок: <span class="font-semibold text-amber-600 tabular-nums whitespace-nowrap">до 17.03.2026</span>
                            </p>
                          </div>

                          <span class="shrink-0 inline-flex items-center rounded-md bg-amber-500/10 text-amber-700 dark:text-amber-300 px-2 py-1 text-[9px] font-bold uppercase">
                            В ожидании
                          </span>
                        </div>

                        <div class="px-4 pb-3 grid grid-cols-2 gap-3 text-[11px]">
                          <div>
                            <p>Сумма</p>
                            <p class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">$66.67</p>
                          </div>
                          <div>
                            <p>Доли</p>
                            <p class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">17569</p>
                          </div>
                        </div>

                        <div class="px-4 pb-4">
                          <button class="w-full px-3 py-2.5 rounded-lg bg-accent text-white text-[11px] font-bold uppercase flex items-center justify-center gap-2">
                            <i data-lucide="credit-card" class="h-4 w-4"></i>
                            Оплатить сейчас
                          </button>
                        </div>
                      </div>

                      <!-- Payment #3 (upcoming) -->
                      <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white text-zinc-500 dark:text-zinc-400 dark:bg-card shadow-sm">
                        <div class="px-4 py-3 flex items-start justify-between gap-3">
                          <div class="min-w-0">
                            <p class="text-[11px] font-bold text-zinc-900 dark:text-white">Платёж #3</p>
                            <p class="mt-1 text-[11px] text-zinc-500 dark:text-zinc-400">
                              Issue date: <span class="tabular-nums whitespace-nowrap">05.04.2026</span>
                            </p>
                            <p class="mt-1 text-[11px] text-zinc-500 dark:text-zinc-400">
                              Срок: <span class="tabular-nums whitespace-nowrap">до 12.04.2026</span>
                            </p>
                          </div>

                          <span class="shrink-0 inline-flex items-center rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 px-2 py-1 text-[9px] font-bold uppercase">
                            Ожидается
                          </span>
                        </div>

                        <div class="px-4 pb-4 grid grid-cols-2 gap-3 text-[11px]">
                          <div>
                            <p>Сумма</p>
                            <p class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">$66.67</p>
                          </div>
                          <div>
                            <p>Доли</p>
                            <p class="font-semibold text-zinc-900 dark:text-white tabular-nums whitespace-nowrap">17569</p>
                          </div>
                        </div>
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
      const buttons = document.querySelectorAll('[data-installment-toggle]');
      buttons.forEach((btn) => {
        btn.addEventListener('click', () => {
          const id = btn.getAttribute('data-installment-toggle');
          const row = document.getElementById(`inst-payments-${id}`);
          if (!row) return;

          const isOpen = !row.classList.contains('hidden');

          // toggle row
          row.classList.toggle('hidden');

          // aria
          btn.setAttribute('aria-expanded', String(!isOpen));

          // rotate chevron
          btn.classList.toggle('rotate-180', !isOpen);
        });
      });
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