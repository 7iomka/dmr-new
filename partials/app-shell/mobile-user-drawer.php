	<div id="mobile-user-drawer"
		class="fixed bottom-0 left-0 right-0 bg-card rounded-t-xl z-[99] shadow-2xl border-t border-zinc-200 dark:border-zinc-800 flex flex-col pointer-events-auto max-w-md mx-auto pb-15">
		<!-- Хендл для свайпа -->
		<div id="user-swipe-handle" class="w-full pt-4 pb-6 touch-none">
			<div class="w-12 h-1.5 bg-zinc-200 dark:bg-zinc-800 rounded-full mx-auto"></div>
		</div>

		<!-- Превьюшка юзера -->
		<div class="flex justify-center items-center gap-3 cursor-pointer px-4 rounded-xl transition-all">
			<div class="w-12 h-12 rounded-lg bg-gradient-to-tr from-primary to-primary-400 p-0.5">
				<div
					class="w-full h-full rounded-md flex items-center justify-center font-bold text-xs bg-card text-zinc-900 dark:text-white">
					DW
				</div>
			</div>
			<div class="text-left flex flex-col gap-1">
				<p class="text-base font-bold leading-none mb-0.5 text-zinc-800 dark:text-zinc-200">Dorin Watsap</p>
				<p class="text-sm font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-tighter">ID: 882194</p>
			</div>
		</div>

		<!-- Пункты -->
		<div class="flex-1 overflow-y-auto px-4 py-5 space-y-6">
			<div class="space-y-2">
				<a href="profile.php"
					class="w-full flex items-center py-2 px-4 rounded-lg bg-zinc-100 dark:bg-zinc-800/50 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors cursor-pointer group">
					<div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary mr-4">
						<i data-lucide="user" class="w-5 h-5"></i>
					</div>
					<span class="text-sm font-medium">Мой профиль</span>
				</a>
				<a href="/settings.php"
					class="w-full flex items-center py-2 px-4 rounded-lg bg-zinc-100 dark:bg-zinc-800/50 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors cursor-pointer group">
					<div
						class="w-10 h-10 rounded-full bg-zinc-800 text-zinc-600 dark:text-zinc-400 flex items-center justify-center mr-4">
						<i data-lucide="settings" class="w-5 h-5"></i>
					</div>
					<span class="text-sm font-medium">Настройки</span>
				</a>

				<a href="logout.php"
					class="w-full flex items-center py-2 px-4 rounded-xl bg-zinc-100 dark:bg-zinc-800/50 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors cursor-pointer text-red-500">
					<div class="w-10 h-10 rounded-full bg-red-500/10 flex items-center justify-center mr-4">
						<i data-lucide="log-out" class="w-5 h-5"></i>
					</div>
					<span class="text-sm font-medium">Выйти</span>
				</a>
			</div>
		</div>
	</div>