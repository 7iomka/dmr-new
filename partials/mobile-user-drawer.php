	<div id="mobile-user-drawer"
		class="fixed bottom-0 left-0 right-0 bg-card rounded-t-xl z-[99] shadow-2xl border-t border-zinc-200 dark:border-zinc-800 flex flex-col pointer-events-auto max-w-2xl mx-auto pb-15">
		<!-- Хендл для свайпа -->
		<div id="user-swipe-handle" class="w-full pt-4 pb-6 touch-none">
			<div class="w-12 h-1.5 bg-zinc-200 dark:bg-zinc-800 rounded-full mx-auto"></div>
		</div>

		<!-- Превьюшка юзера -->
		<div class="flex items-center space-x-3 cursor-pointer px-4 rounded-xl transition-all">
			<div class="w-12 h-12 rounded-lg bg-gradient-to-tr from-accent to-emerald-400 p-[2px]">
				<div
					class="w-full h-full rounded-md flex items-center justify-center font-bold text-xs bg-card text-zinc-900 dark:text-white">
					DW
				</div>
			</div>
			<div class="text-left">
				<p class="text-md font-bold leading-none mb-0.5 text-zinc-800 dark:text-zinc-200">Dorin Watsap</p>
				<p class="text-sm font-bold text-zinc-500 truncate">lawyer1@awsarhitect.me</p>
			</div>
		</div>

		<!-- Пункты -->
		<div class="flex-1 overflow-y-auto px-4 py-5 space-y-6">
			<div class="space-y-2">
				<div
					class="w-full flex items-center py-2 px-4 rounded-lg bg-zinc-100 dark:bg-zinc-800/50 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors cursor-pointer group">
					<div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center text-accent mr-4">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
							<circle cx="12" cy="7" r="4"></circle>
						</svg>
					</div>
					<span class="text-sm font-medium">Мой профиль</span>
				</div>
				<div
					class="w-full flex items-center py-2 px-4 rounded-lg bg-zinc-100 dark:bg-zinc-800/50 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors cursor-pointer group">
					<div
						class="w-10 h-10 rounded-full bg-zinc-800 text-zinc-600 dark:text-zinc-400 flex items-center justify-center mr-4">

						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="lock"
							aria-hidden="true" class="lucide lucide-lock ">
							<rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
							<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
						</svg>
					</div>
					<span class="text-sm font-medium">Безопасность</span>
				</div>

				<div
					class="w-full flex items-center py-2 px-4 rounded-xl bg-zinc-100 dark:bg-zinc-800/50 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors cursor-pointer text-red-500">
					<div class="w-10 h-10 rounded-full bg-red-500/10 flex items-center justify-center mr-4">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
							<polyline points="16 17 21 12 16 7"></polyline>
							<line x1="21" x2="9" y1="12" y2="12"></line>
						</svg>
					</div>
					<span class="text-sm font-medium">Выйти</span>
				</div>
			</div>
		</div>
	</div>

