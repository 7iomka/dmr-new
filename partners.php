<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body class="bg-zinc-50 text-[#1A1D1F] dark:bg-[#0B0E11] dark:text-[#E4E6EB] min-h-screen">
	<div id="app" class="flex overflow-hidden min-h-screen">

		<?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>
		<div class="flex-1 flex flex-col min-w-0 h-screen relative pb-15 lg:pb-0">
			<?php include __DIR__ . '/partials/header.php'; ?>

			<main class="flex-1 overflow-y-auto px-4 py-6 lg:p-10">
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
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-6">
                        
                        <!-- Card 1: Total Earnings -->
                        <div class="card-simple group relative overflow-hidden">
                            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                                <i data-lucide="wallet" class="w-16 h-16 text-accent"></i>
                            </div>
                            <div class="flex flex-col h-full justify-between relative z-10">
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
                        <div class="card-simple group relative overflow-hidden">
                            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                                <i data-lucide="users" class="w-16 h-16 text-blue-500"></i>
                            </div>
                            <div class="flex flex-col h-full justify-between relative z-10">
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
                        <div class="card-simple group relative overflow-hidden dark:bg-gradient-to-br dark:from-zinc-900 dark:to-zinc-800 dark:border-zinc-700/50 md:col-span-2 xl:col-span-1">
                            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-accent/10 dark:bg-accent/20 rounded-full blur-2xl"></div>
                            <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-blue-500/10 dark:bg-blue-500/20 rounded-full blur-3xl"></div>

                            <div class="flex-col h-full justify-between relative z-10">
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

                    <div class="mt-6">
                        <style>
                            .level-badge {
                                transition: all 0.2s ease;
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                font-weight: 700;
                                text-transform: uppercase;
                                text-rendering: optimizeLegibility;
                            }


                            /* Breadcrumb Masks */
                            .breadcrumb-wrapper {
                                position: relative;
                                display: flex;
                                align-items: center;
                                flex: 1;
                                min-width: 0;
                                height: 100%;
                            }

                            .mask-left, .mask-right {
                                position: absolute;
                                top: 0;
                                bottom: 0;
                                width: 70px;
                                pointer-events: none;
                                z-index: 20;
                                transition: opacity 0.3s;
                                display: flex;
                                align-items: center;
                            }

                            .mask-left {
                                left: 0;
                                background: linear-gradient(to right, var(--color-zinc-100), transparent); 
                                justify-content: flex-start;
                            }
                            .dark .mask-left {
                                background: linear-gradient(to right, #1E2023, transparent);
                            }

                            .mask-right {
                                right: 0;
                                background: linear-gradient(to left, var(--color-zinc-100), transparent);
                                justify-content: flex-end;
                            }
                            .dark .mask-right {
                                background: linear-gradient(to left, #1E2023, transparent);
                            }

                            /* Nav Buttons */
                            .nav-btn-base {
                                pointer-events: auto;
                                width: 28px;
                                height: 28px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                border-radius: 8px;
                                transition: all 0.2s;
                                cursor: pointer;
                                box-shadow: 0 1px 2px rgba(0,0,0,0.05);
                            }

                            .nav-btn-style {
                                background: white;
                                border: 1px solid var(--color-zinc-200);
                                color: var(--color-zinc-500);
                            }
                            .nav-btn-style:hover:not(:disabled) {
                                background: var(--color-zinc-100);
                                color: var(--color-zinc-700);
                                border-color: var(--color-zinc-300);
                            }

                            .dark .nav-btn-style {
                                background: #27272a;
                                border: 1px solid #3f3f46;
                                color: #a1a1aa;
                            }
                            .dark .nav-btn-style:hover:not(:disabled) {
                                background: #3f3f46;
                                color: #f4f4f5;
                                border-color: #52525b;
                            }
                            .nav-btn-base:active:not(:disabled) { transform: scale(0.9); }
                            .nav-btn-base:disabled { opacity: 0.3; cursor: not-allowed; filter: grayscale(1); }
                            
                        </style>
                        <style>
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
                        <!-- Table Card Section -->
                        <div class="card">
                            <!-- Card Header with Breadcrumbs -->
                            <div class="card-header !p-0">
                                <div class="flex flex-col w-full">
                                    <!-- Line 1: Breadcrumbs -->
                                    <div class="card-body-inset-x h-14 flex items-center justify-between gap-2 overflow-hidden grow border-b border-zinc-200 dark:border-zinc-800">
                                        
                                        <!-- Fixed Root Element (Current User) -->
                                        <div class="flex items-center flex-shrink-0 pr-3 border-r border-zinc-200 dark:border-zinc-700 h-full">
                                            <button onclick="goToRoot()" id="root-btn" class="flex items-center gap-2 px-2 py-1 rounded-lg transition-all group">
                                                <i data-lucide="home" id="root-icon" class="w-4 h-4 transition-colors"></i>
                                                <span id="root-label" class="text-sm transition-colors">Вы</span>
                                            </button>
                                        </div>
    
                                        <!-- Scrollable Path -->
                                        <div class="breadcrumb-wrapper">
                                            <div class="mask-left opacity-0" id="m-left">
                                                <button onclick="scrollBreadcrumbs('left')" class="nav-btn-base nav-btn-style ml-1">
                                                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                                                </button>
                                            </div>
                                            <div id="breadcrumb-container" class="flex items-center gap-1 overflow-x-auto no-scrollbar text-sm px-4 h-full scroll-smooth">
                                                <!-- JS fills this -->
                                            </div>
                                            <div class="mask-right opacity-0" id="m-right">
                                                <button onclick="scrollBreadcrumbs('right')" class="nav-btn-base nav-btn-style mr-1">
                                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                                </button>
                                            </div>
                                        </div>
    
                                        <!-- Back Action -->
                                        <div class="flex items-center gap-2 flex-shrink-0 border-l border-zinc-200 dark:border-zinc-700 pl-3 h-full">
                                            <button id="back-btn" onclick="goBack()" class="nav-btn-base nav-btn-style">
                                                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                                            </button>
                                        </div>
                                    </div>
    
                                    <!-- Line 2: Search & Pagination -->
                                    <div class="card-body-inset-x py-3 bg-zinc-50/50 dark:bg-white/[0.02] flex flex-col md:flex-row items-center justify-between gap-4">
                                        <!-- Search -->
                                        <div class="relative w-full md:w-72">
                                            <i data-lucide="search" class="w-3.5 h-3.5 absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400"></i>
                                            <input type="text" placeholder="Поиск по логину..." class="w-full h-9 pl-9 pr-4 bg-white dark:bg-[#27272a] border border-zinc-200 dark:border-zinc-700 rounded-lg text-xs font-medium focus:outline-none focus:ring-1 focus:ring-accent/50 transition-all placeholder:text-zinc-500">
                                        </div>
                                        
                                        <!-- Top Pagination (Compact) -->
                                        <div class="flex items-center gap-3">
                                            <p class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest hidden sm:block">Страница 1 из 5</p>
                                            <div class="flex items-center gap-1">
                                                <button class="nav-btn-base"><i data-lucide="chevron-left" class="w-3.5 h-3.5"></i></button>
                                                <button class="nav-btn-base !bg-accent !text-white !border-none text-[10px] font-bold">1</button>
                                                <button class="nav-btn-base text-[10px] font-bold">2</button>
                                                <button class="nav-btn-base"><i data-lucide="chevron-right" class="w-3.5 h-3.5"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body with Table -->
                            <div class="card-body !p-0">
                                <!-- Desktop Table -->
                                <div class="hidden lg:block overflow-x-auto"">
                                    <table class="w-full text-left border-collapse min-w-[1000px] text-zinc-500 dark:text-zinc-400">
                                        <thead>
                                            <tr class="bg-zinc-50/50 dark:bg-[#1E2023]/50 border-b border-zinc-200 dark:border-zinc-800">
                                                <th class="whitespace-nowrap card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest">Логин</th>
                                                <th class="whitespace-nowrap card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest">Полное Имя</th>
                                                <th class="whitespace-nowrap card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest">Email</th>
                                                <th class="whitespace-nowrap card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest text-center">Рефералы</th>
                                                <th class="whitespace-nowrap card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest text-center">Статус</th>
                                                <th class="whitespace-nowrap card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest">Код</th>
                                                <th class="whitespace-nowrap card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest">Дата</th>
                                                <th class="whitespace-nowrap card-body-inset-x py-4 text-[9px] font-bold uppercase tracking-widest text-right">Действия</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body-desktop" class="divide-y divide-zinc-100 dark:divide-zinc-800/50 text-xs">
                                            <!-- JS fills this -->
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Mobile Cards -->
                                <div id="table-body-mobile" class="lg:hidden divide-y divide-zinc-100 dark:divide-zinc-800/50"></div>

                                <!-- Bottom Pagination -->
                                <div class="card-body-inset-x py-5 border-t border-zinc-200 dark:border-zinc-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                                    <p class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Показано 1-5 из 42 партнеров</p>
                                    <div class="flex items-center gap-2">
                                        <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors cursor-pointer">
                                            <i data-lucide="chevron-left" class="w-4 h-4"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center rounded bg-accent text-white text-[10px] font-bold shadow-sm shadow-accent/20">1</button>
                                        <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 text-[10px] font-bold transition-colors cursor-pointer">2</button>
                                        <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 text-[10px] font-bold transition-colors cursor-pointer">3</button>
                                        <button class="w-8 h-8 flex items-center justify-center rounded border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors cursor-pointer">
                                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
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

<script>
let currentPath = [];

// AAA Color Logic
function hexToRgb(hex) {
    const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? { r: parseInt(result[1], 16), g: parseInt(result[2], 16), b: parseInt(result[3], 16) } : null;
}
function getLuminance(r, g, b) {
    const a = [r, g, b].map(v => { v /= 255; return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4); });
    return a[0] * 0.2126 + a[1] * 0.7152 + a[2] * 0.0722;
}
function getContrastRatio(l1, l2) { return (Math.max(l1, l2) + 0.05) / (Math.min(l1, l2) + 0.05); }
function hslToHex(h, s, l) {
    l /= 100; const a = s * Math.min(l, 1 - l) / 100;
    const f = n => {
        const k = (n + h / 30) % 12;
        const color = l - a * Math.max(Math.min(k - 3, 9 - k, 1), -1);
        return Math.round(255 * color).toString(16).padStart(2, '0');
    };
    return `#${f(0)}${f(8)}${f(4)}`;
}

function getAaaStyle(levelIndex) {
    const hue = (140 - (levelIndex % 23 * (360 / 23)) + 360) % 360;
    let currentL = 50;
    const whiteLum = getLuminance(255, 255, 255);
    const blackLum = getLuminance(0, 0, 0);
    
    let hex = hslToHex(hue, 80, currentL);
    let lum = getLuminance(...Object.values(hexToRgb(hex)));
    
    if (getContrastRatio(lum, whiteLum) >= 4.5) return { bg: hex, text: 'white' };
    if (getContrastRatio(lum, blackLum) >= 4.5) return { bg: hex, text: 'black' };
    return { bg: '#00B074', text: 'white' };
}

function toggleTheme() { document.documentElement.classList.toggle('dark'); }
function toggleCard(el) { el.classList.toggle('card-open'); }

function renderUI(shouldScrollToHeader = false) {
    renderBreadcrumbs();
    renderContent();
    lucide.createIcons();
    updateScrollMasks();
    scrollToEnd();
    if (shouldScrollToHeader) checkAndScrollToTop();
}

function checkAndScrollToTop() {
    const header = document.getElementById('card-header-anchor');
    if (!header) return;
    const rect = header.getBoundingClientRect();
    if (rect.top < 20) header.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function scrollToEnd() {
    const container = document.getElementById('breadcrumb-container');
    setTimeout(() => { if(container) container.scrollLeft = container.scrollWidth; }, 50);
}

function renderBreadcrumbs() {
    const container = document.getElementById('breadcrumb-container');
    const rootLabel = document.getElementById('root-label');
    const rootIcon = document.getElementById('root-icon');
    
    if (currentPath.length === 0) {
        rootLabel.className = "text-sm font-bold text-zinc-900 dark:text-white";
        rootIcon.className = "w-4 h-4 text-accent";
    } else {
        rootLabel.className = "text-sm font-medium text-zinc-500 dark:text-zinc-400";
        rootIcon.className = "w-4 h-4 text-zinc-400";
    }

    let html = '';
    currentPath.forEach((step, index) => {
        const style = getAaaStyle(step.level - 1);
        const isLast = index === currentPath.length - 1;
        html += `
            <i data-lucide="chevron-right" class="w-4 h-4 text-zinc-300 dark:text-zinc-700 mx-1 flex-shrink-0"></i>
            <button onclick="goToLevel(${index})" class="flex items-center gap-1.5 whitespace-nowrap py-1 px-1.5 rounded-lg transition-colors hover:bg-zinc-100 dark:hover:bg-zinc-800 group ${isLast ? 'cursor-default' : ''}">
                <span class="text-[10px] px-1.5 py-0.5 rounded font-bold" style="background:${style.bg}; color:${style.text}">L${step.level}</span>
                <span class="font-medium ${isLast ? 'text-zinc-900 dark:text-white font-bold' : 'text-zinc-500 dark:text-zinc-400 group-hover:text-zinc-900 dark:group-hover:text-white'}">${step.name}</span>
            </button>
        `;
    });
    container.innerHTML = html;
    document.getElementById('back-btn').disabled = currentPath.length === 0;
}

function renderContent() {
    const desktopBody = document.getElementById('table-body-desktop');
    const mobileBody = document.getElementById('table-body-mobile');
    const nextLvl = currentPath.length + 1;
    const style = getAaaStyle(nextLvl - 1);
    let dHtml = '';
    let mHtml = '';

    for (let i = 1; i <= 5; i++) {
        const login = `user_lvl${nextLvl}_id${i}`;
        const hasRef = i < 4;
        const refCount = hasRef ? (10 - i) : 0;

        // Row style: hover:bg-zinc-50 dark:hover:bg-white/[0.02]
        // Cell style: card-body-inset-x py-5
        dHtml += `
            <tr class="hover:bg-zinc-50 dark:hover:bg-white/[0.02] transition-colors">
                <td class="card-body-inset-x py-5">
                    <div class="flex items-center gap-3">
                        <span class="level-badge text-[10px] px-2 py-0.5 rounded shadow-sm" 
                                style="background-color: ${style.bg}; color: ${style.text}">L${nextLvl}</span>
                        <span class="text-zinc-900 dark:text-white font-bold">${login}</span>
                    </div>
                </td>
                <td class="card-body-inset-x py-5 text-zinc-400 italic">User Name</td>
                <td class="card-body-inset-x py-5 text-zinc-500 text-xs font-semibold">${login}@test.pro</td>
                <td class="card-body-inset-x py-5 text-center">
                    ${refCount === 0 ? 
                        `<span class="text-zinc-300 dark:text-zinc-600 px-3 font-medium">—</span>` :
                        `<span class="inline-flex items-center justify-center min-w-[28px] px-2 py-0.5 rounded-md text-[11px] font-bold shadow-sm border border-accent/50 bg-accent-light text-accent">
                            ${refCount}
                        </span>`
                    }
                </td>
                <td class="card-body-inset-x py-5 text-center">
                    ${hasRef ? `
                        <span class="inline-flex items-center justify-center min-w-[60px] px-2.5 py-0.5 rounded-md text-[10px] font-bold shadow-sm border border-accent/50 bg-accent-light text-accent">
                            ACTIVE
                        </span>
                    ` : `
                        <span class="inline-flex items-center justify-center min-w-[60px] px-2.5 py-0.5 rounded-md text-[10px] font-bold shadow-sm border border-[var(--color-amber-400-50)] bg-[var(--color-amber-400-10)] text-amber-600 dark:text-amber-400">
                            PENDING
                        </span>
                    `}
                </td>
                <td class="card-body-inset-x py-5 font-mono text-xs font-bold text-zinc-400">ID-${nextLvl}${i}</td>
                <td class="card-body-inset-x py-5 text-zinc-500 text-[11px] font-medium">18.02.26</td>
                <td class="card-body-inset-x py-5 text-right">
                    ${hasRef ? `
                        <button onclick="goDeeper('${login}', ${nextLvl})" 
                                class="p-2 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 hover:bg-accent hover:text-white transition-all active:scale-90 shadow-sm cursor-pointer">
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </button>
                    ` : '<span class="text-zinc-300 dark:text-zinc-600 px-3">—</span>'}
                </td>
            </tr>
            `;

        mHtml += `
            <div class="bg-card group transition-colors cursor-pointer" onclick="toggleCard(this)">
                <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center font-black text-xs shadow-inner" style="background:${style.bg}; color:${style.text}">L${nextLvl}</div>
                        <div class="min-w-0">
                            <p class="text-[13px] font-bold dark:text-white uppercase tracking-tight truncate">${login}</p>
                            <p class="text-[10px] text-zinc-500 font-medium">Рефералов: ${refCount}</p>
                        </div>
                    </div>
                    <div class="text-right pl-3">
                        <span class="px-2 py-0.5 bg-accent/10 text-accent text-[8px] font-bold uppercase rounded">ACTIVE</span>
                        <div class="flex items-center justify-end text-[9px] text-zinc-400 uppercase font-bold tracking-tighter mt-1">
                            <span>Детали</span><i data-lucide="chevron-down" class="w-3 h-3 ml-1 c-card-chevron"></i>
                        </div>
                    </div>
                </div>
                <div class="c-card-details-wrapper">
                    <div class="c-card-details-content">
                        <div class="px-4 pb-4 pt-0">
                            <div class="bg-zinc-50 dark:bg-[#0B0E11] rounded-xl px-4 py-4 space-y-3 border border-zinc-200 dark:border-zinc-800 shadow-inner">
                                <div class="flex justify-between items-center text-[10px] font-bold">
                                    <span class="uppercase text-zinc-500 tracking-wider">Email:</span>
                                    <span class="text-zinc-400 font-medium">${login}@test.pro</span>
                                </div>
                                <div class="flex justify-between items-center text-[10px] font-bold">
                                    <span class="uppercase text-zinc-500 tracking-wider">Регистрация:</span>
                                    <span class="text-zinc-400 font-medium">18.02.2026</span>
                                </div>
                                ${hasRef ? `<div class="pt-2 border-t border-zinc-200 dark:border-zinc-800/80"><button onclick="event.stopPropagation(); goDeeper('${login}', ${nextLvl})" class="w-full py-2 flex items-center justify-center gap-2 border border-accent/30 bg-accent/5 text-accent rounded-lg text-[10px] font-bold uppercase tracking-wider hover:bg-accent/10 transition-colors"><span>Открыть структуру</span><i data-lucide="arrow-right-circle" class="w-3.5 h-3.5"></i></button></div>` : ''}
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
    }
    desktopBody.innerHTML = dHtml;
    mobileBody.innerHTML = mHtml;
}

function goDeeper(name, level) { currentPath.push({ name, level }); renderUI(true); }
function goBack() { currentPath.pop(); renderUI(true); }
function goToRoot() { currentPath = []; renderUI(true); }
function goToLevel(idx) { currentPath = currentPath.slice(0, idx + 1); renderUI(true); }

function scrollBreadcrumbs(dir) {
    const c = document.getElementById('breadcrumb-container');
    if(c) c.scrollLeft += (dir === 'left' ? -150 : 150);
}

function updateScrollMasks() {
    const c = document.getElementById('breadcrumb-container');
    if (!c) return;
    document.getElementById('m-left').style.opacity = c.scrollLeft > 10 ? "1" : "0";
    document.getElementById('m-right').style.opacity = (c.scrollLeft + c.clientWidth < c.scrollWidth - 10) ? "1" : "0";
}

window.onload = () => {
    renderUI();
    const container = document.getElementById('breadcrumb-container');
    if(container) container.addEventListener('scroll', updateScrollMasks);
};

</script>

</body>

</html>
