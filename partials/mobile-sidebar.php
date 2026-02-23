	<!-- MOBILE SIDEBAR DRAWER (duplicate of desktop sidebar) -->
	<aside id="mobile-sidebar-drawer"
	  class="lg:hidden fixed top-0 left-0 bottom-0 w-[78%] max-w-[320px] bg-card border-r border-zinc-200 dark:border-zinc-800 z-[103] flex flex-col">
	  <div class="h-16 flex items-center px-4 border-b border-zinc-200 dark:border-zinc-800">
	    <div class="w-10 h-10 bg-accent rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
	      <!-- logo icon -->
	    </div>
	    <span class="ml-3 font-bold text-sm tracking-tight uppercase text-zinc-900 dark:text-white">
	      Skill Code
	    </span>

	    <button id="mobile-sidebar-close"
	      class="ml-auto p-2 rounded-lg text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors"
	      aria-label="Close sidebar">
	      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
	        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="x"
	        class="lucide lucide-x">
	        <path d="M18 6 6 18"></path>
	        <path d="m6 6 12 12"></path>
	      </svg>
	    </button>
	  </div>

	  <div class="flex-1 px-3 py-4 overflow-y-auto space-y-6">
	    <!-- Основное -->
	    <div>
	      <p class="px-3 text-[10px] font-bold uppercase tracking-[2px] mb-2 text-zinc-400 dark:text-zinc-600">
	        Основное
	      </p>
	      <div class="space-y-1">
	        <a href="dashboard.php" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all 
            text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
						dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
            data-[active=true]:bg-accent/10 data-[active=true]:text-accent dark:data-[active=true]:bg-accent/10 dark:data-[active=true]:text-accent
            ">
	          <div class="flex items-center justify-center">
	            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
	              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
	              class="lucide lucide-layout-dashboard" aria-hidden="true">
	              <rect width="7" height="9" x="3" y="3" rx="1"></rect>
	              <rect width="7" height="5" x="14" y="3" rx="1"></rect>
	              <rect width="7" height="9" x="14" y="12" rx="1"></rect>
	              <rect width="7" height="5" x="3" y="16" rx="1"></rect>
	            </svg>
	          </div>
	          <span class="text-sm font-semibold">Дашборд</span>
	        </a>

	        <a href="portfolio.html" class="w-full flex items-center p-3 gap-3 rounded-lg transition-all 
            text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
						dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
            data-[active=true]:bg-accent/10 data-[active=true]:text-accent dark:data-[active=true]:bg-accent/10 dark:data-[active=true]:text-accent
            ">
	          <div class="flex items-center justify-center">
	            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
	              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
	              class="lucide lucide-briefcase" aria-hidden="true">
	              <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
	              <rect width="20" height="14" x="2" y="6" rx="2"></rect>
	            </svg>
	          </div>
	          <span class="text-sm font-semibold">Инвестиции</span>
	        </a>
	      </div>
	    </div>

	    <!-- Финансы -->
	    <div>
	      <p class="px-3 text-[10px] font-bold uppercase tracking-[2px] mb-2 text-zinc-400 dark:text-zinc-600">
	        Финансы
	      </p>
	      <div class="space-y-1">
	        <a href="wallet.php" class="w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
            text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
						dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
            data-[active=true]:bg-accent/10 data-[active=true]:text-accent dark:data-[active=true]:bg-accent/10 dark:data-[active=true]:text-accent
            ">
	          <div class="flex items-center justify-center">
	            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
	              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
	              class="lucide lucide-wallet" aria-hidden="true">
	              <path
	                d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1">
	              </path>
	              <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path>
	            </svg>
	          </div>
	          <span class="text-sm font-semibold">Кошелёк</span>
	        </a>

	        <a href="withdrawals.html" class="w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
            text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
						dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
            data-[active=true]:bg-accent/10 data-[active=true]:text-accent dark:data-[active=true]:bg-accent/10 dark:data-[active=true]:text-accent
            ">
	          <div class="flex items-center justify-center">
	            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
	              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
	              class="lucide lucide-circle-arrow-up" aria-hidden="true">
	              <circle cx="12" cy="12" r="10"></circle>
	              <path d="m16 12-4-4-4 4"></path>
	              <path d="M12 16V8"></path>
	            </svg>
	          </div>
	          <span class="text-sm font-semibold">Выводы</span>
	        </a>

	        <a href="report.php" class="w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
            text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
						dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
            data-[active=true]:bg-accent/10 data-[active=true]:text-accent dark:data-[active=true]:bg-accent/10 dark:data-[active=true]:text-accent
            ">
	          <div class="flex items-center justify-center">
	            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
	              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
	              class="lucide lucide-file-text" aria-hidden="true">
	              <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
	              <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
	              <path d="M10 9H8"></path>
	              <path d="M16 13H8"></path>
	              <path d="M16 17H8"></path>
	            </svg>
	          </div>
	          <span class="text-sm font-semibold">Отчёт</span>
	        </a>
	      </div>
	    </div>

	    <!-- Аккаунт -->
	    <div>
	      <p class="px-3 text-[10px] font-bold uppercase tracking-[2px] mb-2 text-zinc-400 dark:text-zinc-600">
	        Аккаунт
	      </p>
	      <div class="space-y-1">
	        <a href="profile.php" class="w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
            text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
						dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
            data-[active=true]:bg-accent/10 data-[active=true]:text-accent dark:data-[active=true]:bg-accent/10 dark:data-[active=true]:text-accent
            ">
	          <div class="flex items-center justify-center">
	            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
	              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
	              class="lucide lucide-circle-user">
	              <circle cx="12" cy="12" r="10"></circle>
	              <circle cx="12" cy="10" r="3"></circle>
	              <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"></path>
	            </svg>
	          </div>
	          <span class="text-sm font-semibold">Профиль</span>
	        </a>

	        <a href="partners.php" class="w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
              text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
							dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
              data-[active=true]:bg-accent/10 data-[active=true]:text-accent dark:data-[active=true]:bg-accent/10 dark:data-[active=true]:text-accent
              ">
	          <div class="flex items-center justify-center">
	            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
	              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
	              class="lucide lucide-users-icon lucide-users">
	              <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
	              <path d="M16 3.128a4 4 0 0 1 0 7.744" />
	              <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
	              <circle cx="9" cy="7" r="4" />
	            </svg>
	          </div>
	          <span class="js-sidebar-label text-sm font-semibold">Рефералы</span>
	        </a>

	        <a href="settings.html" class="w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all 
            text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900
						dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white
            data-[active=true]:bg-accent/10 data-[active=true]:text-accent dark:data-[active=true]:bg-accent/10 dark:data-[active=true]:text-accent
            ">
	          <div class="flex items-center justify-center">
	            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
	              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
	              class="lucide lucide-settings" aria-hidden="true">
	              <path
	                d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
	              </path>
	              <circle cx="12" cy="12" r="3"></circle>
	            </svg>
	          </div>
	          <span class="text-sm font-semibold">Настройки</span>
	        </a>
	      </div>
	    </div>
	  </div>
	</aside>