<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body class="bg-zinc-50 text-[#1A1D1F] dark:bg-[#0B0E11] dark:text-[#E4E6EB] min-h-screen">
	<div id="app" class="flex overflow-hidden min-h-screen">

		<?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>
		<div class="flex-1 flex flex-col min-w-0 h-screen relative pb-15 lg:pb-0">
			<?php include __DIR__ . '/partials/header.php'; ?>

			<main class="flex-1 overflow-y-auto p-4 lg:p-10">
				<div class="max-w-7xl mx-auto space-y-6">
					<div>
						<h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white text-left">Профиль</h1>
					</div>
          <!-- Profile Header -->
          <div
            class="px-4 lg:px-6 py-6 rounded-xl bg-card border border-zinc-200 dark:border-zinc-800 shadow-sm flex flex-col md:flex-row items-center md:items-start gap-6 transition-colors">

            <div class="relative">
              <div
                class="w-24 h-24 rounded-2xl bg-gradient-to-br from-accent to-emerald-500 flex items-center justify-center text-white text-3xl font-bold shadow-lg shadow-emerald-500/20">
                DW</div>
              <div
                class="absolute -bottom-2 -right-2 p-1.5 rounded-lg border-4 bg-accent text-white shadow-xl border-white dark:border-[#14171A]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="shield-check"
                  aria-hidden="true" class="lucide lucide-shield-check w-4 h-4">
                  <path
                    d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z">
                  </path>
                  <path d="m9 12 2 2 4-4"></path>
                </svg>
              </div>
            </div>
            <div class="flex-1 text-center md:text-left">
              <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 mb-4">
                <h1 class="text-2xl font-bold tracking-tight text-zinc-900 dark:text-white">Dorin Watsap</h1>
                <span
                  class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-accent/10 text-accent uppercase tracking-wider border border-accent/20 self-center">Активный</span>
              </div>
              <div class="flex flex-wrap justify-center md:justify-start gap-3">

                <button
                  class="col-span-2 flex items-center justify-center gap-2 px-6 py-3 bg-accent hover:bg-[#009663] text-white text-[11px] font-bold rounded-lg transition-all shadow-lg uppercase tracking-widest">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="settings"
                    aria-hidden="true" class="lucide lucide-settings w-4 h-4">
                    <path
                      d="M9.671 4.136a2.34 2.34 0 0 1 4.659 0 2.34 2.34 0 0 0 3.319 1.915 2.34 2.34 0 0 1 2.33 4.033 2.34 2.34 0 0 0 0 3.831 2.34 2.34 0 0 1-2.33 4.033 2.34 2.34 0 0 0-3.319 1.915 2.34 2.34 0 0 1-4.659 0 2.34 2.34 0 0 0-3.32-1.915 2.34 2.34 0 0 1-2.33-4.033 2.34 2.34 0 0 0 0-3.831A2.34 2.34 0 0 1 6.35 6.051a2.34 2.34 0 0 0 3.319-1.915">
                    </path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>
                  <span>Редактировать профиль</span>
                </button><button
                  class="flex items-center justify-center gap-2 px-6 py-3 bg-zinc-50 dark:bg-zinc-800 hover:bg-zinc-100 dark:hover:bg-zinc-700 text-zinc-900 dark:text-white text-[11px] font-bold rounded-lg transition-all border border-zinc-200 dark:border-zinc-700 uppercase tracking-widest">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    data-lucide="shield-check" aria-hidden="true" class="lucide lucide-shield-check w-4 h-4 text-accent">
                    <path
                      d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z">
                    </path>
                    <path d="m9 12 2 2 4-4"></path>
                  </svg>
                  <span>Редактировать KYC</span>
                </button>
              </div>
            </div>
          </div>
          <!-- Personal Info -->
          <div class="rounded-xl border bg-card border-zinc-200 dark:border-zinc-800 shadow-sm">

            <div
              class="px-4 lg:px-6 py-4 border-b flex items-center justify-between gap-2 flex-wrap bg-zinc-100 dark:bg-[#1E2023] border-zinc-200 dark:border-zinc-800 rounded-t-[inherit]">
              <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">Персональные данные</h3>

            </div>
            <div class="px-4 lg:px-6 py-4 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
              <div>
                <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">Полное имя</p>
                <p class="text-sm font-bold tracking-tight">Dorin Watsap</p>
              </div>
              <div>
                <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">E-mail</p>
                <p class="text-sm font-bold tracking-tight">lawyer1@awsarhitect.me</p>
              </div>
              <div>
                <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">Телефон</p>
                <p class="text-sm font-bold tracking-tight">+37369586275</p>
              </div>
              <div>
                <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">День рождения</p>
                <p class="text-sm font-bold tracking-tight">02.07.2001</p>
              </div>
              <div>
                <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">Верификация</p>
                <div class="flex items-center space-x-1.5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    data-lucide="check-circle-2" aria-hidden="true"
                    class="lucide lucide-check-circle-2 text-accent w-[14px] h-[14px]">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="m9 12 2 2 4-4"></path>
                  </svg>
                  <span class="text-sm font-bold text-accent">Пройден</span>
                </div>
              </div>
              <div>
                <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">Дата создания</p>
                <p class="text-sm font-bold tracking-tight">08.12.2025 20:34</p>
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
