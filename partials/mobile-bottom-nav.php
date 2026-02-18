	<!-- BOTTOM NAV (mobile) -->
	<nav
		class="lg:hidden fixed bottom-0 left-0 right-0 h-15 bg-card border-t border-zinc-200 dark:border-zinc-800 flex items-center justify-around z-[100]">
		<!-- MENU: opens mobile sidebar drawer -->
		<button id="sidebar-trigger" class="flex flex-col items-center space-y-1 text-zinc-400 group">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
				stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
				class="lucide lucide-text-align-justify-icon lucide-text-align-justify">
				<path d="M3 5h18" />
				<path d="M3 12h18" />
				<path d="M3 19h18" /></svg>
			<span class="text-[9px] font-bold uppercase">Меню</span>
		</button>

		<!-- PROFILE: opens user drawer -->
		<button id="user-trigger" class="flex flex-col items-center space-y-1 text-zinc-400 outline-none transition-colors">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
				stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
				class="lucide lucide-circle-user">
				<circle cx="12" cy="12" r="10"></circle>
				<circle cx="12" cy="10" r="3"></circle>
				<path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"></path>
			</svg>
			<span class="text-[9px] font-bold uppercase">Профиль</span>
		</button>
	</nav>
