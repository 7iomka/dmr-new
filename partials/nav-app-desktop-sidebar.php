<!-- DESKTOP SIDEBAR -->
<aside id="sidebar"
	class="page-sidebar">
	<div class="relative h-20 px-2 flex items-center justify-between">
		<a class="sidebar-logo-link h-full pl-4 flex items-center shrink-0 transition-all" href="/home.php">
			<img class="sidebar-logo-full h-12 w-auto hidden dark:block" src="/img/logo-light.svg" alt="Logo">
			<img class="sidebar-logo-full h-12 w-auto dark:hidden" src="/img/logo-dark.svg" alt="Logo">
			<img class="sidebar-logo-icon h-12 w-auto hidden" src="/img/logo-icon-only.svg" alt="Logo">
		</a>
		<!-- DESKTOP: Sidebar toggle -->
		<button onclick="toggleSidebar()"
			class="js-desktop-sidebar-toggle absolute -right-3.5 top-0 bottom-0 my-auto hidden lg:flex w-7 h-7  items-center justify-center text-zinc-500 bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 border border-zinc-200 dark:border-zinc-700 rounded-md transition-colors">
			<i class="w-4.5 h-4.5 transition-transform duration-300 [.sidebar-collapse_&]:rotate-180" data-lucide="chevrons-left"></i>
		</button>
	</div>


	<div class="flex-1 px-2 py-4 pb-10 overflow-y-auto space-y-8">

		<!-- Основное -->
		<div>
			<p
				class="sidebar-section-title px-4 text-[10px] font-bold uppercase tracking-[2px] mb-3 text-zinc-400 dark:text-zinc-600">
				<span class="sidebar-label">Основное</span>
			</p>

			<div class="flex flex-col gap-1">
				<a href="dashboard.php" data-active="true" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
					text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
					dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
					data-[active=true]:bg-primary/10 data-[active=true]:text-primary dark:data-[active=true]:bg-primary/10 dark:data-[active=true]:text-primary
					">
					<div class="sidebar-link-icon flex items-center justify-center">
						<i data-lucide="layout-dashboard" class="w-5 h-5"></i>
					</div>
					<span class="sidebar-label text-sm font-semibold">Дашборд</span>
				</a>

				<a href="investments.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
					text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
					dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
					data-[active=true]:bg-primary/10 data-[active=true]:text-primary dark:data-[active=true]:bg-primary/10 dark:data-[active=true]:text-primary
					">
					<div class="sidebar-link-icon flex items-center justify-center">
						<i data-lucide="briefcase" class="w-5 h-5"></i>
					</div>
					<span class="sidebar-label text-sm font-semibold">Инвестиции</span>
				</a>
			</div>
		</div>

		<!-- Финансы -->
		<div>
			<p
				class="sidebar-section-title px-4 text-[10px] font-bold uppercase tracking-[2px] mb-3 text-zinc-400 dark:text-zinc-600">
				<span class="sidebar-label">Финансы</span>
			</p>

			<div class="flex flex-col gap-1">
				<a href="wallet.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
					text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
					dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
					data-[active=true]:bg-primary/10 data-[active=true]:text-primary dark:data-[active=true]:bg-primary/10 dark:data-[active=true]:text-primary
					">
					<div class="sidebar-link-icon flex items-center justify-center">
						<i data-lucide="wallet" class="w-5 h-5"></i>
					</div>
					<span class="sidebar-label text-sm font-semibold">Кошелёк</span>
				</a>

				<a href="withdrawals.html" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
					text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
					dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
					data-[active=true]:bg-primary/10 data-[active=true]:text-primary dark:data-[active=true]:bg-primary/10 dark:data-[active=true]:text-primary
					">
					<div class="sidebar-link-icon flex items-center justify-center">
						<i data-lucide="circle-arrow-up" class="w-5 h-5"></i>
					</div>
					<span class="sidebar-label text-sm font-semibold">Выводы</span>
				</a>

				<a href="report.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
					text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
					dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
					data-[active=true]:bg-primary/10 data-[active=true]:text-primary dark:data-[active=true]:bg-primary/10 dark:data-[active=true]:text-primary
					">
					<div class="sidebar-link-icon flex items-center justify-center">
						<i data-lucide="file-text" class="w-5 h-5"></i>
					</div>
					<span class="sidebar-label text-sm font-semibold">Отчёт</span>
				</a>
			</div>
		</div>

		<!-- Аккаунт -->
		<div>
			<p
				class="sidebar-section-title px-4 text-[10px] font-bold uppercase tracking-[2px] mb-3 text-zinc-400 dark:text-zinc-600">
				<span class="sidebar-label">Аккаунт</span>
			</p>

			<div class="flex flex-col gap-1">
				<a href="profile.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
					text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
					dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
					data-[active=true]:bg-primary/10 data-[active=true]:text-primary dark:data-[active=true]:bg-primary/10 dark:data-[active=true]:text-primary
					">
					<div class="sidebar-link-icon flex items-center justify-center">
						<i data-lucide="circle-user" class="w-5 h-5"></i>
					</div>
					<span class="sidebar-label text-sm font-semibold">Профиль</span>
				</a>

				<a href="partners.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
					text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
					dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
					data-[active=true]:bg-primary/10 data-[active=true]:text-primary dark:data-[active=true]:bg-primary/10 dark:data-[active=true]:text-primary
					">
					<div class="sidebar-link-icon flex items-center justify-center">
						<i data-lucide="users" class="w-5 h-5"></i>
					</div>
					<span class="sidebar-label text-sm font-semibold">Рефералы</span>
				</a>

				<a href="settings.html" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
					text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
					dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
					data-[active=true]:bg-primary/10 data-[active=true]:text-primary dark:data-[active=true]:bg-primary/10 dark:data-[active=true]:text-primary
					">
					<div class="sidebar-link-icon flex items-center justify-center">
						<i data-lucide="settings" class="w-5 h-5"></i>
					</div>
					<span class="sidebar-label text-sm font-semibold">Настройки</span>
				</a>
			</div>
		</div>

		<!-- Публичные страницы -->
		<div>
			<p class="sidebar-section-title px-4 text-[10px] font-bold uppercase tracking-[2px] mb-3 text-zinc-400 dark:text-zinc-600">
				<span class="sidebar-label">Информация</span>
			</p>
			<div class="flex flex-col gap-1">
				<a href="home.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white data-[active=true]:bg-primary/10 data-[active=true]:text-primary dark:data-[active=true]:bg-primary/10 dark:data-[active=true]:text-primary">
					<div class="sidebar-link-icon flex items-center justify-center"><i data-lucide="house" class="w-5 h-5"></i></div>
					<span class="sidebar-label text-sm font-semibold">Главная</span>
				</a>
				<a href="news.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white data-[active=true]:bg-primary/10 data-[active=true]:text-primary dark:data-[active=true]:bg-primary/10 dark:data-[active=true]:text-primary">
					<div class="sidebar-link-icon flex items-center justify-center"><i data-lucide="newspaper" class="w-5 h-5"></i></div>
					<span class="sidebar-label text-sm font-semibold">Новости</span>
				</a>
				<a href="contacts.php" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white data-[active=true]:bg-primary/10 data-[active=true]:text-primary dark:data-[active=true]:bg-primary/10 dark:data-[active=true]:text-primary">
					<div class="sidebar-link-icon flex items-center justify-center"><i data-lucide="phone" class="w-5 h-5"></i></div>
					<span class="sidebar-label text-sm font-semibold">Контакты</span>
				</a>
			</div>
		</div>


	</div>
</aside>