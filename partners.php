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
                    <!-- Header Section -->
                    <div class="flex flex-col items-start md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h1 class="text-2xl font-bold tracking-tight">Партнерская программа</h1>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Отслеживайте свои успехи и управляйте рефералами</p>
                        </div>
                        <div class="flex items-center gap-3 px-4 py-2 bg-white dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 rounded-lg shadow-sm">
                            <span class="text-[10px] uppercase font-bold text-zinc-400 tracking-wider">Вас пригласил:</span>
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-gradient-to-tr from-accent to-emerald-400 p-[2px]">
                                    <div class="w-full h-full rounded-sm flex items-center justify-center font-bold text-[10px] bg-card text-zinc-900 dark:text-white">AR</div>
                                </div>    
                                <span class="text-xs font-semibold">Arcadius Rudov</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bento Grid Layout -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-6">
                        
                        <!-- Card 1: Total Earnings -->
                        <div class="relative overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 p-6 shadow-sm group">
                            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                                <i data-lucide="wallet" class="w-16 h-16 text-accent"></i>
                            </div>
                            <div class="flex flex-col h-full justify-between">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="p-1.5 rounded-md bg-accent/10 text-accent">
                                        <i data-lucide="dollar-sign" class="w-4 h-4"></i>
                                    </div>
                                    <span class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Доход</span>
                                </div>
                                <div>
                                    <div class="flex items-baseline gap-2">
                                        <h2 class="text-3xl font-bold text-zinc-900 dark:text-white whitespace-nowrap">1,250.00 $</h2>
                                    </div>
                                    <div class="flex items-center gap-2 mt-2 text-xs">
                                        <span class="text-accent bg-accent/10 px-1.5 py-0.5 rounded font-medium">+250.00 $</span>
                                        <span class="text-zinc-400">за Февраль</span>
                                    </div>
                                </div>
                                <div class="mt-4 pt-4 border-t border-zinc-100 dark:border-zinc-800 flex justify-between items-center">
                                    <span class="text-[10px] font-bold text-zinc-400 uppercase">Доступно к выводу</span>
                                    <span class="text-sm font-bold text-accent">482.50 $</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Referrals Count -->
                        <div class="relative overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 p-6 shadow-sm group">
                            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                                <i data-lucide="users" class="w-16 h-16 text-blue-500"></i>
                            </div>
                            <div class="flex flex-col h-full justify-between">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="p-1.5 rounded-md bg-blue-500/10 text-blue-500">
                                        <i data-lucide="users" class="w-4 h-4"></i>
                                    </div>
                                    <span class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Команда</span>
                                </div>
                                <div>
                                    <h2 class="text-3xl font-bold text-zinc-900 dark:text-white">12</h2>
                                    <p class="text-xs text-zinc-400 mt-2">Активных партнеров: <span class="text-zinc-600 dark:text-zinc-300 font-bold">8</span></p>
                                </div>
                                <div class="mt-4">
                                    <div class="flex gap-1 h-1.5 w-full bg-zinc-100 dark:bg-zinc-800 rounded-full overflow-hidden">
                                        <div class="bg-blue-500 w-[60%]"></div>
                                        <div class="bg-blue-400 w-[25%]"></div>
                                        <div class="bg-blue-300 w-[15%]"></div>
                                    </div>
                                    <div class="flex justify-between text-[10px] text-zinc-400 mt-1">
                                        <span class="pl-0.5 w-[60%]">Lvl 1</span>
                                        <span class="pl-0.5 w-[25%]">Lvl 2</span>
                                        <span class="pl-0.5 w-[15%]">Lvl 3+</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3: Referral Link -->
                        <div class="md:col-span-1 bg-white dark:bg-gradient-to-br dark:from-zinc-900 dark:to-zinc-800 rounded-2xl p-6 text-zinc-900 dark:text-white relative overflow-hidden shadow-sm dark:shadow-lg border border-zinc-200 dark:border-zinc-700/50">
                            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-accent/10 dark:bg-accent/20 rounded-full blur-2xl"></div>
                            <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-blue-500/10 dark:bg-blue-500/20 rounded-full blur-3xl"></div>

                            <div class="relative z-10 flex flex-col h-full justify-between">
                                <div>
                                    <h3 class="font-bold text-lg">Приглашайте друзей</h3>
                                    <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1 mb-4">Получайте бонусы за каждого активного партнера.</p>
                                </div>

                                <div class="space-y-3">
                                    <div class="group relative">
                                        <label class="text-[10px] font-bold text-zinc-500 uppercase mb-1 block">Ваша ссылка</label>
                                        <div class="flex items-center bg-zinc-50 dark:bg-zinc-950/50 border border-zinc-200 dark:border-zinc-700 rounded-lg p-1 pr-1.5 focus-within:border-accent transition-colors">
                                            <div id="ref-link" class="pl-3 pr-2 py-2 truncate text-xs font-mono text-zinc-600 dark:text-zinc-300 w-full select-all">https://invest.awsarhitect.me/register?ref=A7CA9B55</div>
                                                <?= copyButton([
                                                    'text' => 'https://invest.awsarhitect.me/register?ref=A7CA9B55',
                                                ]) ?>
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center bg-zinc-50 dark:bg-zinc-950/30 rounded-lg px-3 py-2.5 border border-zinc-200 dark:border-zinc-800">
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
                    </div>

                    <!-- Navigation / Tabs -->
                    <div class="mt-8">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-zinc-200 dark:border-zinc-800 pb-1">
                            <nav class="flex overflow-x-auto hide-scrollbar gap-6">
                                <button class="group relative pb-3 text-sm font-medium text-accent outline-none">
                                    <span class="flex items-center gap-2">Уровень 1 <span class="bg-accent/10 text-accent text-[10px] px-1.5 py-0.5 rounded-md">8</span></span>
                                    <span class="absolute bottom-0 left-0 h-0.5 w-full bg-accent"></span>
                                </button>
                                <button class="group relative pb-3 text-sm font-medium text-zinc-500 dark:text-zinc-400 hover:text-zinc-700 dark:hover:text-zinc-200 outline-none transition-colors">
                                    <span class="flex items-center gap-2">Уровень 2 <span class="bg-zinc-100 dark:bg-zinc-800 text-zinc-500 text-[10px] px-1.5 py-0.5 rounded-md">3</span></span>
                                    <span class="absolute bottom-0 left-0 h-0.5 w-full bg-transparent group-hover:bg-zinc-300 dark:group-hover:bg-zinc-700 transition-colors"></span>
                                </button>
                                <button class="group relative pb-3 text-sm font-medium text-zinc-500 dark:text-zinc-400 hover:text-zinc-700 dark:hover:text-zinc-200 outline-none transition-colors">
                                    <span class="flex items-center gap-2">Уровень 3 <span class="bg-zinc-100 dark:bg-zinc-800 text-zinc-500 text-[10px] px-1.5 py-0.5 rounded-md">1</span></span>
                                    <span class="absolute bottom-0 left-0 h-0.5 w-full bg-transparent group-hover:bg-zinc-300 dark:group-hover:bg-zinc-700 transition-colors"></span>
                                </button>
                            </nav>
                            <div class="flex items-center gap-2 pb-2">
                                <div class="relative">
                                    <i data-lucide="search" class="absolute left-2.5 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-zinc-500"></i>
                                    <input type="text" placeholder="Поиск партнера..." class="pl-8 pr-3 py-1.5 text-xs rounded-lg border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 focus:outline-none focus:border-accent w-full sm:w-48">
                                </div>
                                <button class="p-1.5 rounded-lg border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-800 text-zinc-500">
                                    <i data-lucide="filter" class="w-3.5 h-3.5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mt-4 rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-[#14171A] min-h-[200px] flex items-center justify-center text-zinc-400 text-sm border-dashed">
                            Здесь будет ваша таблица уровней
                        </div>
                    </div>
				</div>
			</main>
		</div>
	</div>


	<?php include __DIR__ . '/partials/mobile-sidebar.php'; ?>
	<?php include __DIR__ . '/partials/mobile-user-drawer.php'; ?>
	<?php include __DIR__ . '/partials/mobile-bottom-nav.php'; ?>


	<?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
