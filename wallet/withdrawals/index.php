<?php require_once __DIR__ . '/../../includes/demo-auth.php'; ?>
<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/../../partials/head.php'; ?>

<body>
<div id="app" class="flex min-h-screen overflow-hidden">
  <?php include __DIR__ . '/../../partials/desktop-sidebar.php'; ?>

  <div class="page-content-area">
    <?php include __DIR__ . '/../../partials/header.php'; ?>

    <div class="page-body">
      <main class="page-main">
        <section class="space-y-6">
          <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
            <div>
              <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white">Выводы</h1>
              <p class="mt-1 text-sm font-medium text-zinc-500">Управляйте заявками на вывод, следите за статусами и подтверждайте адреса для вывода.</p>
            </div>
            <div class="flex flex-wrap gap-2">
              <a href="/wallet/withdrawals/addresses" class="inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-200 dark:border-zinc-700 px-4 py-2 text-xs font-bold uppercase tracking-widest text-zinc-900 dark:text-zinc-100 hover:bg-zinc-100 dark:hover:bg-zinc-800">
                <i data-lucide="book-user" class="h-4 w-4"></i>Адреса для вывода
              </a>
              <a href="/wallet/withdrawals/new" class="btn-primary inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-xs font-bold uppercase tracking-widest">
                <i data-lucide="plus-circle" class="h-4 w-4"></i>Новая заявка на вывод
              </a>
            </div>
          </div>

          <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <article class="card-simple">
              <p class="text-[10px] font-bold uppercase tracking-[2px] text-zinc-500">Доступно к выводу</p>
              <p class="mt-3 text-2xl font-bold text-zinc-900 dark:text-white">$ 482.50</p>
            </article>
            <article class="card-simple">
              <p class="text-[10px] font-bold uppercase tracking-[2px] text-zinc-500">Всего выведено</p>
              <p class="mt-3 text-2xl font-bold text-zinc-900 dark:text-white">$ 12,450.00</p>
            </article>
            <article class="card-simple">
              <p class="text-[10px] font-bold uppercase tracking-[2px] text-zinc-500">В обработке</p>
              <p class="mt-3 text-2xl font-bold text-amber-500">$ 180.00</p>
            </article>
            <article class="card-simple">
              <p class="text-[10px] font-bold uppercase tracking-[2px] text-zinc-500">Статус вывода</p>
              <p class="mt-3 inline-flex items-center gap-2 rounded-md bg-primary-500/10 px-2.5 py-1 text-xs font-bold uppercase text-primary-700 dark:text-primary-200">
                <i data-lucide="shield-check" class="h-3.5 w-3.5"></i>Доступен
              </p>
            </article>
          </div>

          <div class="card">
            <div class="card-header">
              <h2 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">История заявок на вывод</h2>
            </div>
            <div class="card-body !p-0">
              <div class="hidden lg:block overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[1200px] text-zinc-500 dark:text-zinc-400">
                  <thead>
                  <tr class="bg-zinc-50/50 dark:bg-[#1E2023]/50 border-b border-zinc-200 dark:border-zinc-800">
                    <th class="c-sortable-th card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest whitespace-nowrap">ID <i data-lucide="arrow-up-down" class="c-sort-icon inline w-3 h-3 ml-1 opacity-50"></i></th>
                    <th class="c-sortable-th card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest whitespace-nowrap">Дата создания <i data-lucide="arrow-up-down" class="c-sort-icon inline w-3 h-3 ml-1 opacity-50"></i></th>
                    <th class="c-sortable-th card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest whitespace-nowrap">Сумма</th>
                    <th class="c-sortable-th card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest whitespace-nowrap">Комиссия</th>
                    <th class="c-sortable-th card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest whitespace-nowrap">К получению</th>
                    <th class="card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest whitespace-nowrap">Сеть</th>
                    <th class="card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest whitespace-nowrap">Адрес назначения</th>
                    <th class="card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest whitespace-nowrap">Статус</th>
                    <th class="card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest whitespace-nowrap">Дата завершения</th>
                    <th class="card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest whitespace-nowrap">Действия</th>
                  </tr>
                  </thead>
                  <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800/50 text-xs">
                  <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02]">
                    <td class="card-body-inset-x py-5 font-bold text-zinc-900 dark:text-white">#WD-10842</td>
                    <td class="card-body-inset-x py-5">14.02.2026 11:22</td>
                    <td class="card-body-inset-x py-5 font-bold text-red-500">$120.00</td>
                    <td class="card-body-inset-x py-5">$2.50</td>
                    <td class="card-body-inset-x py-5 font-bold text-zinc-900 dark:text-white">$117.50</td>
                    <td class="card-body-inset-x py-5">USDT (BEP20)</td>
                    <td class="card-body-inset-x py-5 font-mono text-[11px]">0x34fA...92cB</td>
                    <td class="card-body-inset-x py-5"><span class="px-2 py-0.5 bg-primary-500/10 text-primary-700 dark:text-primary-200 text-[9px] font-bold uppercase rounded">Завершён</span></td>
                    <td class="card-body-inset-x py-5">14.02.2026 11:30</td>
                    <td class="card-body-inset-x py-5"><button class="text-xs font-semibold text-primary-600 dark:text-primary-400">Детали</button></td>
                  </tr>
                  <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02]">
                    <td class="card-body-inset-x py-5 font-bold text-zinc-900 dark:text-white">#WD-10839</td>
                    <td class="card-body-inset-x py-5">13.02.2026 17:41</td>
                    <td class="card-body-inset-x py-5 font-bold text-red-500">$80.00</td>
                    <td class="card-body-inset-x py-5">$1.00</td>
                    <td class="card-body-inset-x py-5 font-bold text-zinc-900 dark:text-white">$79.00</td>
                    <td class="card-body-inset-x py-5">USDT (TRC20)</td>
                    <td class="card-body-inset-x py-5 font-mono text-[11px]">TN3W...b3m9</td>
                    <td class="card-body-inset-x py-5"><span class="px-2 py-0.5 bg-amber-500/10 text-amber-500 text-[9px] font-bold uppercase rounded">В обработке</span></td>
                    <td class="card-body-inset-x py-5">—</td>
                    <td class="card-body-inset-x py-5"><button class="text-xs font-semibold text-primary-600 dark:text-primary-400">Детали</button></td>
                  </tr>
                  </tbody>
                </table>
              </div>

              <div class="lg:hidden divide-y divide-zinc-100 dark:divide-zinc-800/50">
                <div class="p-4 space-y-3">
                  <div class="flex items-center justify-between gap-3">
                    <p class="text-xs font-bold text-zinc-900 dark:text-white">#WD-10842</p>
                    <span class="px-2 py-0.5 bg-primary-500/10 text-primary-700 dark:text-primary-200 text-[9px] font-bold uppercase rounded">Завершён</span>
                  </div>
                  <p class="text-[11px] text-zinc-500">14.02.2026 11:22 · USDT (BEP20)</p>
                  <p class="text-sm font-bold text-zinc-900 dark:text-white">$117.50 к получению</p>
                </div>
                <div class="p-4 text-center text-sm text-zinc-500">
                  Нет дополнительных записей на этой странице.
                </div>
              </div>

              <div class="card-body-inset-x py-5 border-t border-zinc-200 dark:border-zinc-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Показано 1-2 из 2 заявок</p>
                <div class="flex items-center gap-2">
                  <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500"><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
                  <button class="w-8 h-8 flex items-center justify-center rounded btn-primary text-[10px] font-bold">1</button>
                  <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500"><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <?php include __DIR__ . '/../../partials/footer.php'; ?>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../../partials/app-shell/index.php'; ?>
<?php include __DIR__ . '/../../partials/scripts.php'; ?>
</body>

</html>
