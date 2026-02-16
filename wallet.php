<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body class="bg-zinc-50 text-[#1A1D1F] dark:bg-[#0B0E11] dark:text-[#E4E6EB] min-h-screen">
	<div id="app" class="flex overflow-hidden min-h-screen">

		<?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>
		<div class="flex-1 flex flex-col min-w-0 h-screen relative pb-15 lg:pb-0">
			<header class="h-16 lg:h-20 border-b border-zinc-200 dark:border-zinc-800 bg-card flex items-center justify-between px-4 lg:px-10 sticky top-0 z-40">
				<div class="flex items-center min-w-0">
					<button onclick="toggleSidebar()" class="hidden lg:block p-2 rounded-lg mr-4 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu w-5 h-5"><path d="M4 5h16"></path><path d="M4 12h16"></path><path d="M4 19h16"></path></svg>
					</button>

					<div class="lg:hidden">
						<a class="h-10 flex items-center flex-shrink-0" href="/">
							<svg width="575" height="243" viewBox="0 0 575 243" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-auto fill-accent">
								<rect x="0" y="46" width="150" height="150" rx="40" fill="inherit" />
								<text x="200" y="165" font-family="sans-serif" font-weight="bold" font-size="120">LOGO</text>
							</svg>
						</a>
					</div>
				</div>

				<div class="flex items-center space-x-2 md:space-x-4">
					<button onclick="toggleDarkMode()" class="p-2.5 rounded-lg bg-zinc-100 dark:bg-[#1E2023] border border-zinc-200 dark:border-zinc-800 text-zinc-500 dark:text-yellow-500 hover:opacity-80 transition-all">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun w-[18px] h-[18px] hidden dark:block"><circle cx="12" cy="12" r="4"></circle><path d="M12 2v2"></path><path d="M12 20v2"></path><path d="m4.93 4.93 1.41 1.41"></path><path d="m17.66 17.66 1.41 1.41"></path><path d="M2 12h2"></path><path d="M20 12h2"></path><path d="m6.34 17.66-1.41 1.41"></path><path d="m19.07 4.93-1.41 1.41"></path></svg>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon w-[18px] h-[18px] block dark:hidden"><path d="M20.985 12.486a9 9 0 1 1-9.473-9.472c.405-.022.617.46.402.803a6 6 0 0 0 8.268 8.268c.344-.215.825-.004.803.401"></path></svg>
					</button>

					<div class="relative">
						<button class="p-2.5 rounded-lg bg-zinc-100 dark:bg-[#1E2023] border border-zinc-200 dark:border-zinc-800 text-zinc-500 transition-all relative">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell w-[18px] h-[18px]"><path d="M10.268 21a2 2 0 0 0 3.464 0"></path><path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path></svg>
							<span class="absolute top-2.5 right-2.5 w-2 h-2 bg-accent rounded-full border-2 border-white dark:border-[#14171A]"></span>
						</button>
					</div>

					<div class="h-8 w-[1px] hidden lg:block bg-zinc-200 dark:bg-zinc-800"></div>
					<div class="relative hidden lg:block">
						<div onclick="toggleUserMenu()" class="flex items-center space-x-3 cursor-pointer p-1 pr-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800/50 transition-all">
							<div class="w-10 h-10 rounded-lg bg-gradient-to-tr from-accent to-emerald-400 p-[2px]"><div class="w-full h-full rounded-md flex items-center justify-center font-bold text-xs bg-card text-zinc-900 dark:text-white">DW</div></div>
							<div class="text-left"><p class="text-[11px] font-bold leading-none mb-0.5 text-zinc-800 dark:text-zinc-200">Dorin Watsap</p><p class="text-[10px] font-bold text-zinc-500 uppercase tracking-tighter">ID: 882194</p></div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="user-chevron" class="lucide lucide-chevron-down hidden md:block w-[14px] h-[14px] text-zinc-500 transition-transform"><path d="m6 9 6 6 6-6"></path></svg>
						</div>
						<div id="user-dropdown" class="absolute right-0 mt-3 w-64 rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-card shadow-2xl overflow-hidden z-50 hidden">
							<div class="p-4 border-b border-zinc-100 dark:border-zinc-800/50"><p class="text-[10px] font-bold uppercase text-zinc-500 mb-1">Аккаунт</p><p class="text-sm font-bold truncate">lawyer1@awsarhitect.me</p></div>
							<div class="p-2"><a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl hover:bg-zinc-50 dark:hover:bg-zinc-800 text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors"><span class="text-sm font-bold">Мой профиль</span></a></div>
						</div>
					</div>
				</div>
			</header>

			<main class="flex-1 overflow-y-auto p-4 lg:p-10">
				<div class="max-w-7xl mx-auto space-y-6 w-full">
					<div>
						<h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white text-left">Кошелёк</h1>
						<p class="text-zinc-500 text-sm font-medium mt-1">Управляйте балансом, пополнениями и транзакциями.</p>
					</div>

					<div class="px-4 lg:px-6 py-6 rounded-xl bg-card border border-zinc-200 dark:border-zinc-800 shadow-sm flex flex-col lg:flex-row gap-6">
						<div class="max-w-md min-w-0 lg:order-1">
							<label class="text-[10px] font-bold uppercase tracking-[2px] text-zinc-500 mb-2 block">Адрес вашего кошелька</label>
							<div class="flex items-center bg-zinc-50 dark:bg-[#0B0E11] border border-zinc-200 dark:border-zinc-800 rounded-lg p-2 pl-4 shadow-inner">
								<code id="wallet-uuid" class="text-[12px] sm:text-[13px] font-bold text-zinc-800 dark:text-zinc-200 flex-1 font-mono tracking-tight truncate">bb8623ef-3902-4937-95e5-1e64fc6f79c4</code>
								<button onclick="copyWalletId()" class="ml-3 p-2.5 bg-white dark:bg-zinc-800 rounded-lg text-zinc-500 hover:text-accent transition-all relative border border-zinc-200 dark:border-zinc-700">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy w-4 h-4"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path></svg>
									<span id="copy-status" class="hidden absolute -top-10 right-0 bg-accent text-white text-[10px] px-3 py-1.5 rounded-lg whitespace-nowrap shadow-xl uppercase font-bold c-copy-tooltip">Скопировано!</span>
								</button>
							</div>
						</div>

						<div class="relative z-10 flex-1">
							<p class="text-[10px] font-bold uppercase tracking-[2px] text-zinc-500 mb-2">Общий баланс</p>
							<h2 class="text-3xl sm:text-5xl font-bold tracking-tighter text-zinc-900 dark:text-white mb-6 whitespace-nowrap">$ 12,450,000.80</h2>
							<div class="space-y-3 mb-8">
								<div class="flex items-baseline space-x-2"><span class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Доступно к выводу:</span><span class="text-lg font-bold text-accent">$ 482.50</span></div>
								<div class="flex items-baseline space-x-2 opacity-80"><span class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Заблокировано:</span><span class="text-md font-bold text-zinc-900 dark:text-zinc-300">$ 120,000.00</span></div>
							</div>
							<div class="grid grid-cols-2 sm:flex flex-wrap gap-3">
								<button class="col-span-2 flex items-center justify-center space-x-2 px-6 py-3 bg-accent hover:bg-[#009663] text-white text-[11px] font-bold rounded-lg transition-all uppercase tracking-widest"><span>Пополнить</span></button>
								<button class="flex items-center justify-center space-x-2 px-6 py-3 bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 text-zinc-900 dark:text-white text-[11px] font-bold rounded-lg transition-all border border-zinc-200 dark:border-zinc-700 uppercase tracking-widest"><span>Перевести</span></button>
								<button class="flex items-center justify-center space-x-2 px-6 py-3 bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 text-zinc-900 dark:text-white text-[11px] font-bold rounded-lg transition-all border border-zinc-200 dark:border-zinc-700 uppercase tracking-widest"><span>Вывести</span></button>
							</div>
						</div>
					</div>

					<div class="rounded-xl border bg-card border-zinc-200 dark:border-zinc-800 shadow-sm overflow-hidden js-tabs-container">
						<div class="px-4 lg:px-6 py-4 border-b flex items-center justify-between gap-2 flex-wrap bg-zinc-100 dark:bg-[#1E2023] border-zinc-200 dark:border-zinc-800">
							<h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Транзакции</h3>
							<div class="relative flex bg-zinc-200/50 dark:bg-zinc-800/80 p-1 rounded-lg w-fit overflow-x-auto c-no-scrollbar max-w-full">
								<div class="js-tab-highlight c-transition-slider absolute bg-white dark:bg-zinc-600 rounded-md shadow z-0 h-[calc(100%-8px)] top-[4px] left-0"></div>
								<button data-active="true" data-target="payments" class="js-tab-btn relative z-10 px-4 py-1.5 text-xs font-semibold text-zinc-500 data-[active=true]:text-zinc-900 dark:data-[active=true]:text-white whitespace-nowrap">Платежные транзакции</button>
								<button data-active="false" data-target="wallet" class="js-tab-btn relative z-10 px-4 py-1.5 text-xs font-semibold text-zinc-500 data-[active=true]:text-zinc-900 dark:data-[active=true]:text-white whitespace-nowrap">Wallet transactions</button>
							</div>
						</div>

            <!-- TAB: PAYMENTS -->
            <div class="js-tab-content block" data-id="payments">
              <!-- Desktop Table -->
              <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[1000px] text-zinc-500 dark:text-zinc-400">
                  <thead>
                    <tr class="bg-zinc-50/50 dark:bg-[#1E2023]/50 border-b border-zinc-200 dark:border-zinc-800">
                      <th class="c-sortable-th whitespace-nowrap px-6 py-4 text-[9px] font-bold uppercase tracking-widest">
                        Сумма
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>

                      <th class="c-sortable-th whitespace-nowrap px-6 py-4 text-[9px] font-bold uppercase tracking-widest">Валюта
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>

                      <th class="c-sortable-th whitespace-nowrap px-6 py-4 text-[9px] font-bold uppercase tracking-widest">Провайдер
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>

                      <th class="c-sortable-th whitespace-nowrap px-6 py-4 text-[9px] font-bold uppercase tracking-widest">Метод оплаты
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>

                      <th class="c-sortable-th whitespace-nowrap px-6 py-4 text-[9px] font-bold uppercase tracking-widest">Статус
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>

                      <th class="c-sortable-th whitespace-nowrap px-6 py-4 text-[9px] font-bold uppercase tracking-widest">Детали оплаты
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>

                      <th class="c-sortable-th whitespace-nowrap px-6 py-4 text-[9px] font-bold uppercase tracking-widest">Дата создания
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>

                      <th class="c-sortable-th whitespace-nowrap px-6 py-4 text-[9px] font-bold uppercase tracking-widest">Дата завершения
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>
                    </tr>
                  </thead>

                  <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800/50 text-xs">
                    <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors">
                      <td class="px-6 py-5 font-bold text-zinc-900 dark:text-white">$10.00</td>
                      <td class="px-6 py-5">USD</td>
                      <td class="px-6 py-5">
                        <span class="px-2 py-0.5 bg-cyan-500/10 text-cyan-500 text-[9px] font-bold uppercase rounded">INTERNAL</span>
                      </td>
                      <td class="px-6 py-5 font-semibold">MANUAL_DEPOSIT</td>
                      <td class="px-6 py-5">
                        <span class="px-2 py-0.5 bg-accent/10 text-accent text-[9px] font-bold uppercase rounded">COMPLETED</span>
                      </td>
                      <td class="px-6 py-5 text-[10px]">ADMIN ADD FUNDS: stripe nu lucra 2eff5754-f533-4924-b9e7-e178ad187e10</td>
                      <td class="px-6 py-5">05.02.2026 11:56</td>
                      <td class="px-6 py-5">05.02.2026 11:56</td>
                    </tr>

                    <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors">
                      <td class="px-6 py-5 font-bold text-zinc-900 dark:text-white">$1.00</td>
                      <td class="px-6 py-5">USD</td>
                      <td class="px-6 py-5">
                        <span class="px-2 py-0.5 bg-cyan-500/10 text-cyan-500 text-[9px] font-bold uppercase rounded">STRIPE</span>
                      </td>
                      <td class="px-6 py-5 font-semibold">CARD</td>
                      <td class="px-6 py-5"></td>
                      <td class="px-6 py-5 text-[10px]">Deposit initiated via STRIPE</td>
                      <td class="px-6 py-5">05.02.2026 11:36</td>
                      <td class="px-6 py-5">-</td>
                    </tr>

                    <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors">
                      <td class="px-6 py-5 font-bold text-zinc-900 dark:text-white">$250.01</td>
                      <td class="px-6 py-5">USD</td>
                      <td class="px-6 py-5">
                        <span class="px-2 py-0.5 bg-cyan-500/10 text-cyan-500 text-[9px] font-bold uppercase rounded">MERCHANT_RU</span>
                      </td>
                      <td class="px-6 py-5 font-semibold">TEST</td>
                      <td class="px-6 py-5">
                        <span class="px-2 py-0.5 bg-red-500/10 text-red-500 text-[9px] font-bold uppercase rounded">FAILED</span>
                      </td>
                      <td class="px-6 py-5 text-[10px]">Deposit initiated via MERCHANT_RU</td>
                      <td class="px-6 py-5">05.02.2026 11:36</td>
                      <td class="px-6 py-5">-</td>
                    </tr>

                    <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors">
                      <td class="px-6 py-5 font-bold text-zinc-900 dark:text-white">$500.00</td>
                      <td class="px-6 py-5">USD</td>
                      <td class="px-6 py-5">
                        <span class="px-2 py-0.5 bg-cyan-500/10 text-cyan-500 text-[9px] font-bold uppercase rounded">BANK_TRANSFER</span>
                      </td>
                      <td class="px-6 py-5 font-semibold">CARD</td>
                      <td class="px-6 py-5">
                        <span class="px-2 py-0.5 bg-accent/10 text-accent text-[9px] font-bold uppercase rounded">COMPLETED</span>
                      </td>
                      <td class="px-6 py-5 text-[10px]">ADMIN ADD FUNDS</td>
                      <td class="px-6 py-5">06.01.2026 07:55</td>
                      <td class="px-6 py-5">06.01.2026 07:55</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- Mobile cards (Payments) -->
              <div class="md:hidden divide-y divide-zinc-100 dark:divide-zinc-800/50">
                <!-- Card 1 -->
                <div class="bg-card group transition-colors cursor-pointer" onclick="toggleCard(this)">
                  <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3 min-w-0">
                      <div class="w-10 h-10 rounded-full bg-cyan-500/10 flex items-center justify-center text-cyan-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="zap"
                            aria-hidden="true" class="lucide lucide-zap w-5 h-5">
                          <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
                        </svg>
                      </div>
                      <div class="min-w-0">
                        <p class="text-[13px] font-bold dark:text-white uppercase tracking-tight truncate">INTERNAL</p>
                        <p class="text-[10px] text-zinc-500 font-medium">05.02.2026 11:56</p>
                      </div>
                    </div>
                    <div class="text-right pl-3">
                      <p class="text-[14px] font-black text-zinc-900 dark:text-white whitespace-nowrap">10.00 USD</p>
                      <div class="flex items-center justify-end text-[9px] text-zinc-400 uppercase font-bold tracking-tighter">
                        <span>Детали</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-down"
                            aria-hidden="true" class="lucide lucide-chevron-down w-3 h-3 ml-1 c-card-chevron">
                          <path d="m6 9 6 6 6-6"></path>
                        </svg>
                      </div>
                    </div>
                  </div>

                  <div class="c-card-details-wrapper">
                    <div class="c-card-details-content">
                      <div class="px-4 pb-4 pt-0">
                        <div class="bg-zinc-50 dark:bg-[#0B0E11] rounded-xl px-4 py-4 space-y-3 border border-zinc-200 dark:border-zinc-800 shadow-inner">
                          <div class="flex justify-between items-center">
                            <span class="text-[10px] uppercase font-bold text-zinc-500 tracking-wider">Статус:</span>
                            <span class="px-2 py-0.5 bg-accent/10 text-accent text-[9px] font-bold uppercase rounded">COMPLETED</span>
                          </div>
                          <div class="flex justify-between items-center text-[10px] font-bold">
                            <span class="uppercase text-zinc-500 tracking-wider">Метод:</span>
                            <span class="text-zinc-400">MANUAL_DEPOSIT</span>
                          </div>
                          <div class="flex justify-between items-center text-[10px] font-bold">
                            <span class="uppercase text-zinc-500 tracking-wider">Завершено:</span>
                            <span class="text-zinc-400">05.02.2026 11:56</span>
                          </div>
                          <div class="pt-2 border-t border-zinc-200 dark:border-zinc-800/80">
                            <p class="text-[10px] uppercase font-bold text-zinc-500 mb-1.5 tracking-wider">Детали оплаты:</p>
                            <p class="text-[11px] font-medium leading-relaxed text-zinc-600 dark:text-zinc-400">
                              ADMIN ADD FUNDS: stripe nu lucra 2eff5754-f533-4924-b9e7-e178ad187e10
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- Card 2 -->
                <div class="bg-card group transition-colors cursor-pointer" onclick="toggleCard(this)">
                  <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3 min-w-0">
                      <div class="w-10 h-10 rounded-full bg-red-500/10 flex items-center justify-center text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="alert-circle"
                            aria-hidden="true" class="lucide lucide-alert-circle w-5 h-5">
                          <circle cx="12" cy="12" r="10"></circle>
                          <line x1="12" x2="12" y1="8" y2="12"></line>
                          <line x1="12" x2="12.01" y1="16" y2="16"></line>
                        </svg>
                      </div>
                      <div class="min-w-0">
                        <p class="text-[13px] font-bold dark:text-white uppercase tracking-tight truncate">MERCHANT_RU</p>
                        <p class="text-[10px] text-zinc-500 font-medium">05.02.2026 11:36</p>
                      </div>
                    </div>
                    <div class="text-right pl-3">
                      <p class="text-[14px] font-black text-red-500 whitespace-nowrap">250.01 USD</p>
                      <div class="flex items-center justify-end text-[9px] text-zinc-400 uppercase font-bold tracking-tighter">
                        <span>Детали</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-down"
                            aria-hidden="true" class="lucide lucide-chevron-down w-3 h-3 ml-1 c-card-chevron">
                          <path d="m6 9 6 6 6-6"></path>
                        </svg>
                      </div>
                    </div>
                  </div>

                  <div class="c-card-details-wrapper">
                    <div class="c-card-details-content">
                      <div class="px-4 pb-4 pt-0">
                        <div class="bg-zinc-50 dark:bg-[#0B0E11] rounded-xl px-4 py-4 space-y-3 border border-zinc-200 dark:border-zinc-800 shadow-inner">
                          <div class="flex justify-between items-center">
                            <span class="text-[10px] uppercase font-bold text-zinc-500 tracking-wider">Статус:</span>
                            <span class="px-2 py-0.5 bg-red-500/10 text-red-500 text-[9px] font-bold uppercase rounded">FAILED</span>
                          </div>
                          <div class="flex justify-between items-center text-[10px] font-bold">
                            <span class="uppercase text-zinc-500 tracking-wider">Метод:</span>
                            <span class="text-zinc-400">TEST</span>
                          </div>
                          <div class="pt-2 border-t border-zinc-200 dark:border-zinc-800/80">
                            <p class="text-[10px] uppercase font-bold text-zinc-500 mb-1.5 tracking-wider">Детали оплаты:</p>
                            <p class="text-[11px] font-medium leading-relaxed text-zinc-600 dark:text-zinc-400">
                              Deposit initiated via MERCHANT_RU
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <!-- Pagination (shared) -->
              <div class="px-4 lg:px-6 py-5 border-t border-zinc-200 dark:border-zinc-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Показано 1-10 из 42 транзакций</p>
                <div class="flex items-center space-x-2">
                  <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-left"
                        aria-hidden="true" class="lucide lucide-chevron-left w-4 h-4">
                      <path d="m15 18-6-6 6-6"></path>
                    </svg>
                  </button>
                  <button class="w-8 h-8 flex items-center justify-center rounded bg-accent text-white text-[10px] font-bold">1</button>
                  <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 text-[10px] font-bold transition-colors">2</button>
                  <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 text-[10px] font-bold transition-colors">3</button>
                  <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-right"
                        aria-hidden="true" class="lucide lucide-chevron-right w-4 h-4">
                      <path d="m9 18 6-6-6-6"></path>
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <!-- TAB: WALLET -->
            <div class="js-tab-content hidden" data-id="wallet">
              <!-- Desktop -->
              <div class="hidden lg:block overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[1000px] text-zinc-500 dark:text-zinc-400">
                  <thead>
                    <tr class="bg-zinc-50/50 dark:bg-[#1E2023]/50 border-b border-zinc-200 dark:border-zinc-800">
                      <th class="c-sortable-th px-6 py-4 text-[9px] font-bold uppercase whitespace-nowrap tracking-widest">Тип
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>
                      <th class="c-sortable-th px-6 py-4 text-[9px] font-bold uppercase whitespace-nowrap tracking-widest">Сумма
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>
                      <th class="c-sortable-th px-6 py-4 text-[9px] font-bold uppercase whitespace-nowrap tracking-widest">Баланс после
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>
                      <th class="c-sortable-th px-6 py-4 text-[9px] font-bold uppercase whitespace-nowrap tracking-widest">Валюта
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>
                      <th class="c-sortable-th px-6 py-4 text-[9px] font-bold uppercase whitespace-nowrap tracking-widest">Тип ссылки
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>
                      <th class="c-sortable-th px-6 py-4 text-[9px] font-bold uppercase whitespace-nowrap tracking-widest">Описание
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>
                      <th class="c-sortable-th px-6 py-4 text-[9px] font-bold uppercase whitespace-nowrap tracking-widest">Дата
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-down"
                            aria-hidden="true" class="lucide lucide-arrow-up-down c-sort-icon inline w-3 h-3 ml-1 opacity-50">
                          <path d="m21 16-4 4-4-4"></path><path d="M17 20V4"></path><path d="m3 8 4-4 4 4"></path><path d="M7 4v16"></path>
                        </svg>
                      </th>
                    </tr>
                  </thead>

                  <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800/50 text-xs">
                    <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors">
                      <td class="px-6 py-5">
                        <span class="px-2 py-1 bg-emerald-500/10 text-emerald-500 text-[9px] font-bold uppercase rounded tracking-wider">Кредит</span>
                      </td>
                      <td class="px-6 py-5 font-bold text-emerald-500 whitespace-nowrap">+ 2,000.00</td>
                      <td class="px-6 py-5 font-semibold text-zinc-900 dark:text-white whitespace-nowrap">12,450,000.80</td>
                      <td class="px-6 py-5 font-semibold uppercase">USD</td>
                      <td class="px-6 py-5 text-[10px] font-bold uppercase">INTERNAL_TX</td>
                      <td class="px-6 py-5 text-[10px] whitespace-normal break-words">
                        Пополнение основного счета через шлюз Stripe. Зачислено автоматически по результатам успешной верификации транзакции.
                      </td>
                      <td class="px-6 py-5 text-[10px] whitespace-nowrap">10.02.2026 16:45</td>
                    </tr>

                    <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors">
                      <td class="px-6 py-5">
                        <span class="px-2 py-1 bg-red-500/10 text-red-500 text-[9px] font-bold uppercase rounded tracking-wider">Дебет</span>
                      </td>
                      <td class="px-6 py-5 font-bold text-red-500 whitespace-nowrap">- 450.00</td>
                      <td class="px-6 py-5 font-semibold text-zinc-900 dark:text-white whitespace-nowrap">12,449,550.80</td>
                      <td class="px-6 py-5 font-semibold uppercase">USD</td>
                      <td class="px-6 py-5 text-[10px] font-bold uppercase">WITHDRAWAL</td>
                      <td class="px-6 py-5 text-[10px] whitespace-normal break-words">Комиссия за обслуживание счета и перевод средств.</td>
                      <td class="px-6 py-5 text-[10px] whitespace-nowrap">10.02.2026 17:00</td>
                    </tr>

                    <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors">
                      <td class="px-6 py-5">
                        <span class="px-2 py-1 bg-red-500/10 text-red-500 text-[9px] font-bold uppercase rounded tracking-wider">Заблокировано</span>
                      </td>
                      <td class="px-6 py-5 font-bold text-red-500 whitespace-nowrap">1,000.00</td>
                      <td class="px-6 py-5 font-semibold text-zinc-900 dark:text-white whitespace-nowrap">12,448,550.80</td>
                      <td class="px-6 py-5 font-semibold uppercase">USD</td>
                      <td class="px-6 py-5 text-[10px] font-bold uppercase">HOLD</td>
                      <td class="px-6 py-5 text-[10px] whitespace-normal break-words">Удержание средств до завершения проверки безопасности KYC Level 3.</td>
                      <td class="px-6 py-5 text-[10px] whitespace-nowrap">09.02.2026 12:20</td>
                    </tr>

                    <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors">
                      <td class="px-6 py-5">
                        <span class="px-2 py-1 bg-emerald-500/10 text-emerald-500 text-[9px] font-bold uppercase rounded tracking-wider">Разблокировано</span>
                      </td>
                      <td class="px-6 py-5 font-bold text-emerald-500 whitespace-nowrap">1,000.00</td>
                      <td class="px-6 py-5 font-semibold text-zinc-900 dark:text-white whitespace-nowrap">12,449,550.80</td>
                      <td class="px-6 py-5 font-semibold uppercase">USD</td>
                      <td class="px-6 py-5 text-[10px] font-bold uppercase">RELEASE</td>
                      <td class="px-6 py-5 text-[10px] whitespace-normal break-words">Средства разблокированы после успешного подтверждения.</td>
                      <td class="px-6 py-5 text-[10px] text-zinc-400 whitespace-nowrap">09.02.2026 15:40</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- Mobile cards (Wallet TX) -->
              <div class="lg:hidden divide-y divide-zinc-100 dark:divide-zinc-800/50">
                <div class="bg-card group transition-colors cursor-pointer" onclick="toggleCard(this)">
                  <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3 min-w-0">
                      <div class="w-10 h-10 rounded-full bg-emerald-500/10 flex items-center justify-center text-emerald-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-down-left"
                            aria-hidden="true" class="lucide lucide-arrow-down-left w-5 h-5">
                          <path d="M17 7 7 17"></path><path d="M17 17H7V7"></path>
                        </svg>
                      </div>
                      <div class="min-w-0">
                        <p class="text-[13px] font-bold dark:text-white truncate">Пополнение счета</p>
                        <p class="text-[10px] text-zinc-500 font-medium">10.02.2026 16:45</p>
                      </div>
                    </div>
                    <div class="text-right pl-3">
                      <p class="text-[14px] font-black text-emerald-500 whitespace-nowrap">+ 2,000.00 $</p>
                      <div class="flex items-center justify-end text-[9px] text-zinc-400 uppercase font-bold tracking-tighter">
                        <span>Детали</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-down"
                            aria-hidden="true" class="lucide lucide-chevron-down w-3 h-3 ml-1 c-card-chevron">
                          <path d="m6 9 6 6 6-6"></path>
                        </svg>
                      </div>
                    </div>
                  </div>

                  <div class="c-card-details-wrapper">
                    <div class="c-card-details-content">
                      <div class="px-4 pb-4 pt-0">
                        <div class="bg-zinc-50 dark:bg-[#0B0E11] rounded-xl px-4 py-4 space-y-3 border border-zinc-200 dark:border-zinc-800 shadow-inner">
                          <div class="flex justify-between items-center">
                            <span class="text-[10px] uppercase font-bold text-zinc-500 tracking-wider">Тип ссылки:</span>
                            <span class="text-[10px] font-mono font-bold text-zinc-800 dark:text-zinc-300">INTERNAL_TX</span>
                          </div>
                          <div class="flex justify-between items-center">
                            <span class="text-[10px] uppercase font-bold text-zinc-500 tracking-wider">Баланс после:</span>
                            <span class="text-[10px] font-bold text-zinc-800 dark:text-zinc-300">12,450,000.80 $</span>
                          </div>
                          <div class="pt-2 border-t border-zinc-200 dark:border-zinc-800/80">
                            <p class="text-[10px] uppercase font-bold text-zinc-500 mb-1.5 tracking-wider">Описание:</p>
                            <p class="text-[11px] leading-relaxed text-zinc-600 dark:text-zinc-400">Пополнение основного счета через шлюз Stripe. Средства зачислены мгновенно.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="bg-card group transition-colors cursor-pointer" onclick="toggleCard(this)">
                  <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3 min-w-0">
                      <div class="w-10 h-10 rounded-full bg-red-500/10 flex items-center justify-center text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-right"
                            aria-hidden="true" class="lucide lucide-arrow-up-right w-5 h-5">
                          <path d="M7 7h10v10"></path><path d="M7 17 17 7"></path>
                        </svg>
                      </div>
                      <div class="min-w-0">
                        <p class="text-[13px] font-bold dark:text-white truncate">Вывод средств</p>
                        <p class="text-[10px] text-zinc-500 font-medium">09.02.2026 11:20</p>
                      </div>
                    </div>
                    <div class="text-right pl-3">
                      <p class="text-[14px] font-black text-red-500 whitespace-nowrap">- 120.00 $</p>
                      <div class="flex items-center justify-end text-[9px] text-zinc-400 uppercase font-bold tracking-tighter">
                        <span>Детали</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-down"
                            aria-hidden="true" class="lucide lucide-chevron-down w-3 h-3 ml-1 c-card-chevron">
                          <path d="m6 9 6 6 6-6"></path>
                        </svg>
                      </div>
                    </div>
                  </div>

                  <div class="c-card-details-wrapper">
                    <div class="c-card-details-content">
                      <div class="px-4 pb-4 pt-0">
                        <div class="bg-zinc-50 dark:bg-[#0B0E11] rounded-xl px-4 py-4 space-y-3 border border-zinc-200 dark:border-zinc-800 shadow-inner">
                          <div class="flex justify-between items-center">
                            <span class="text-[10px] uppercase font-bold text-zinc-500 tracking-wider">Тип ссылки:</span>
                            <span class="text-[10px] font-mono font-bold text-zinc-800 dark:text-zinc-300">WITHDRAWAL</span>
                          </div>
                          <div class="flex justify-between items-center">
                            <span class="text-[10px] uppercase font-bold text-zinc-500 tracking-wider">Баланс после:</span>
                            <span class="text-[10px] font-bold text-zinc-800 dark:text-zinc-300">12,448,000.80 $</span>
                          </div>
                          <div class="pt-2 border-t border-zinc-200 dark:border-zinc-800/80">
                            <p class="text-[10px] uppercase font-bold text-zinc-500 mb-1.5 tracking-wider">Описание:</p>
                            <p class="text-[11px] leading-relaxed text-zinc-600 dark:text-zinc-400">Вывод средств на внешний кошелек USDT (TRC-20).</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <!-- Pagination (shared) -->
              <div class="px-4 lg:px-6 py-5 border-t border-zinc-200 dark:border-zinc-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Показано 1-10 из 42 транзакций</p>
                <div class="flex items-center space-x-2">
                  <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-left"
                        aria-hidden="true" class="lucide lucide-chevron-left w-4 h-4">
                      <path d="m15 18-6-6 6-6"></path>
                    </svg>
                  </button>
                  <button class="w-8 h-8 flex items-center justify-center rounded bg-accent text-white text-[10px] font-bold">1</button>
                  <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 text-[10px] font-bold transition-colors">2</button>
                  <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 text-[10px] font-bold transition-colors">3</button>
                  <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-right"
                        aria-hidden="true" class="lucide lucide-chevron-right w-4 h-4">
                      <path d="m9 18 6-6-6-6"></path>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
					</div>
				</div>
			</main>
		</div>
	</div>

	<style>
		.c-no-scrollbar::-webkit-scrollbar { display: none; }
		.c-no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
		.c-copy-tooltip { animation: cFadeInOut 2s forwards; }
		@keyframes cFadeInOut { 0% { opacity: 0; transform: translateY(5px); } 20%,80% { opacity: 1; transform: translateY(0); } 100% { opacity: 0; transform: translateY(-5px); } }
		.c-card-details-wrapper { display: grid; grid-template-rows: 0fr; transition: grid-template-rows 0.3s ease-out, opacity 0.2s ease-out; opacity: 0; overflow: hidden; }
		.card-open .c-card-details-wrapper { grid-template-rows: 1fr; opacity: 1; }
		.c-card-details-content { min-height: 0; }
		.c-card-chevron { transition: transform 0.3s ease; }
		.card-open .c-card-chevron { transform: rotate(180deg); }
		.c-sortable-th { cursor: pointer; transition: background-color 0.2s, color 0.2s; }
		.c-sortable-th:hover { background-color: rgba(0, 176, 116, 0.05); color: #00B074; }
		.c-sortable-th:hover .c-sort-icon { opacity: 1; color: #00B074; }
		.dark .c-sortable-th:hover { background-color: rgba(255, 255, 255, 0.03); }
	</style>

	<?php include __DIR__ . '/partials/mobile-sidebar.php'; ?>
	<?php include __DIR__ . '/partials/mobile-user-drawer.php'; ?>
	<?php include __DIR__ . '/partials/mobile-bottom-nav.php'; ?>

	<script>
		function toggleCard(cardEl) {
			cardEl.classList.toggle('card-open');
		}

		async function copyWalletId() {
			const walletEl = document.getElementById('wallet-uuid');
			const statusEl = document.getElementById('copy-status');
			if (!walletEl) return;
			const text = walletEl.textContent.trim();

			try {
				if (navigator.clipboard?.writeText) {
					await navigator.clipboard.writeText(text);
				} else {
					const ta = document.createElement('textarea');
					ta.value = text;
					document.body.appendChild(ta);
					ta.select();
					document.execCommand('copy');
					document.body.removeChild(ta);
				}

				if (statusEl) {
					statusEl.classList.remove('hidden');
					statusEl.classList.remove('c-copy-tooltip');
					void statusEl.offsetWidth;
					statusEl.classList.add('c-copy-tooltip');
					setTimeout(() => statusEl.classList.add('hidden'), 1800);
				}
			} catch (e) {}
		}
	</script>
	<?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
