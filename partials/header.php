<header
  class="h-16 lg:h-20 border-b border-zinc-200 dark:border-zinc-800 bg-card flex items-center justify-between px-4 lg:px-10 sticky top-0 z-40">
  <div class="flex items-center min-w-0">
    <!-- DESKTOP: Sidebar toggle -->
    <button onclick="toggleSidebar()"
      class="hidden lg:block p-2 rounded-lg mr-4 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="menu"
        aria-hidden="true" class="lucide lucide-menu w-5 h-5">
        <path d="M4 5h16"></path>
        <path d="M4 12h16"></path>
        <path d="M4 19h16"></path>
      </svg>
    </button>

    <!-- MOBILE (<lg): Logo instead of toggleSidebar() button -->
    <div class="lg:hidden">
      <!-- Logo link -->
      <a class="h-10 flex items-center flex-shrink-0" href="/">
        <svg width="575" height="243" viewBox="0 0 575 243" fill="none" xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink" class="h-full w-auto fill-accent">
          <!-- Logo will be here -->
          <rect x="0" y="46" width="150" height="150" rx="40" fill="inherit" />
          <text x="200" y="165" font-family="sans-serif" font-weight="bold" font-size="120">LOGO</text>
        </svg>
      </a>
    </div>
  </div>

  <div class="flex items-center gap-2 md:gap-4">
    <button onclick="toggleDarkMode()"
      class="p-2.5 rounded-lg bg-zinc-100 dark:bg-[#1E2023] border border-zinc-200 dark:border-zinc-800 text-zinc-500 dark:text-yellow-500 hover:opacity-80 transition-all">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="sun"
        aria-hidden="true" class="lucide lucide-sun w-[18px] h-[18px] hidden dark:block">
        <circle cx="12" cy="12" r="4"></circle>
        <path d="M12 2v2"></path>
        <path d="M12 20v2"></path>
        <path d="m4.93 4.93 1.41 1.41"></path>
        <path d="m17.66 17.66 1.41 1.41"></path>
        <path d="M2 12h2"></path>
        <path d="M20 12h2"></path>
        <path d="m6.34 17.66-1.41 1.41"></path>
        <path d="m19.07 4.93-1.41 1.41"></path>
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="moon"
        aria-hidden="true" class="lucide lucide-moon w-[18px] h-[18px] block dark:hidden">
        <path
          d="M20.985 12.486a9 9 0 1 1-9.473-9.472c.405-.022.617.46.402.803a6 6 0 0 0 8.268 8.268c.344-.215.825-.004.803.401">
        </path>
      </svg>
    </button>

    <div class="relative">
      <button
        class="p-2.5 rounded-lg bg-zinc-100 dark:bg-[#1E2023] border border-zinc-200 dark:border-zinc-800 text-zinc-500 transition-all relative">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="bell"
          aria-hidden="true" class="lucide lucide-bell w-[18px] h-[18px]">
          <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
          <path
            d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326">
          </path>
        </svg>
        <span
          class="absolute top-2.5 right-2.5 w-2 h-2 bg-accent rounded-full border-2 border-white dark:border-[#14171A]"></span>
      </button>
    </div>

    <div class="h-8 w-[1px] hidden lg:block bg-zinc-200 dark:bg-zinc-800"></div>

    <div class="relative hidden lg:block">
      <div onclick="toggleUserMenu()"
        class="flex items-center gap-3 cursor-pointer p-1 pr-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800/50 transition-all">
        <div class="w-10 h-10 rounded-lg bg-gradient-to-tr from-accent to-emerald-400 p-[2px]">
          <div
            class="w-full h-full rounded-md flex items-center justify-center font-bold text-xs bg-card text-zinc-900 dark:text-white">
            DW
          </div>
        </div>
        <div class="text-left">
          <p class="text-[11px] font-bold leading-none mb-0.5 text-zinc-800 dark:text-zinc-200">Dorin Watsap</p>
          <p class="text-[10px] font-bold text-zinc-500 uppercase tracking-tighter">ID: 882194</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          data-lucide="chevron-down" aria-hidden="true" id="user-chevron"
          class="lucide lucide-chevron-down hidden md:block w-[14px] h-[14px] text-zinc-500 transition-transform">
          <path d="m6 9 6 6 6-6"></path>
        </svg>
      </div>

      <!-- User Dropdown -->
      <div id="user-dropdown"
        class="absolute right-0 mt-3 w-64 rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-card shadow-2xl overflow-hidden z-50 hidden">
        <div class="p-4 border-b border-zinc-100 dark:border-zinc-800/50">
          <p class="text-[10px] font-bold uppercase text-zinc-500 mb-1">Аккаунт</p>
          <p class="text-sm font-bold truncate">lawyer1@awsarhitect.me</p>
        </div>
        <div class="p-2">
          <a href="#"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-zinc-50 dark:hover:bg-zinc-800 text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="user"
              aria-hidden="true" class="lucide lucide-user w-4 h-4">
              <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span class="text-sm font-bold">Мой профиль</span>
          </a>
          <a href="#"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-zinc-50 dark:hover:bg-zinc-800 text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="lock"
              aria-hidden="true" class="lucide lucide-lock w-4 h-4">
              <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            <span class="text-sm font-bold">Безопасность</span>
          </a>
        </div>
        <div class="p-2 border-t border-zinc-100 dark:border-zinc-800/50">
          <button
            class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              data-lucide="log-out" aria-hidden="true" class="lucide lucide-log-out w-4 h-4">
              <path d="m16 17 5-5-5-5"></path>
              <path d="M21 12H9"></path>
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
            </svg>
            <span class="text-sm font-bold">Выйти</span>
          </button>
        </div>
      </div>
    </div>

  </div>
</header>