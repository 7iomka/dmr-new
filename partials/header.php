<header class="page-header">

  <div class="container flex items-center w-full justify-between h-full">
    <div class="flex items-center min-w-0 js-header-left">
      <div class="lg:hidden">
        <a class="h-10 flex items-center shrink-0" href="/home.php">
          <img class="h-full w-auto hidden dark:block" src="/img/logo-light.svg" alt="Logo">
          <img class="h-full w-auto dark:hidden" src="/img/logo-dark.svg" alt="Logo">
          <img class="h-full w-auto hidden" src="/img/logo-icon-only.svg" alt="Logo">
        </a>
      </div>
    </div>

    <div class="flex items-center gap-2 md:gap-4">
      <button onclick="toggleDarkMode()"
        class="btn-secondary header-icon-btn header-theme-btn">
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

      <div class="relative" data-dropdown data-dropdown-id="language-menu" data-dropdown-placement="bottom-end" data-dropdown-offset="10" data-dropdown-overlay="true" data-dropdown-close-ms="140">
        <button
          type="button"
          class="btn-secondary header-language-trigger"
          data-dropdown-trigger
          aria-haspopup="listbox"
          aria-expanded="false"
          aria-controls="header-language-menu">
          <span class="text-base leading-none" data-language-flag>🇺🇸</span>
          <span class="hidden sm:inline text-sm font-semibold text-zinc-800 dark:text-zinc-100" data-language-native>English</span>
          <span class="sm:hidden text-xs font-semibold uppercase tracking-wide text-zinc-700 dark:text-zinc-200" data-language-code>EN</span>
          <svg class="header-language-chevron" data-dropdown-chevron xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="m6 9 6 6 6-6"></path>
          </svg>
        </button>

        <div
          id="header-language-menu"
          class="header-language-panel"
          data-dropdown-panel
          data-dropdown-template-id="tpl-language-panel"
          role="listbox"
          tabindex="-1"
          aria-label="Выбор языка"></div>

        <template id="tpl-language-panel">
          <div class="header-language-label" data-dd-part="language-label">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="shrink-0">
              <circle cx="12" cy="12" r="10"></circle>
              <path d="M2 12h20"></path>
              <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
            </svg>
            <span>Выберите язык</span>
          </div>
          <div class="header-language-list" data-language-list></div>
        </template>

        <template id="tpl-language-option">
          <button type="button" class="header-language-option" role="option" data-dd-role="language-option">
            <span class="header-language-option-main">
              <span class="header-language-option-flag">{{flag}}</span>
              <span class="min-w-0">
                <span class="header-language-option-native">{{nativeLabel}}</span>
                <span class="header-language-option-english">{{englishLabel}}</span>
              </span>
            </span>
            <svg data-language-check class="header-language-option-check hidden" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>
          </button>
        </template>

      </div>

      <?php if (shouldUseAppShell()): ?>
        <div class="relative">
          <button class="btn-secondary header-icon-btn relative">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="bell"
              aria-hidden="true" class="lucide lucide-bell w-[18px] h-[18px]">
              <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
              <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path>
            </svg>
            <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-primary rounded-full border-2 border-white dark:border-zinc-900"></span>
          </button>
        </div>

        <div class="h-8 w-px hidden lg:block bg-zinc-200 dark:bg-zinc-800"></div>

        <div class="relative hidden lg:block" data-dropdown data-dropdown-id="user-menu" data-dropdown-placement="bottom-end" data-dropdown-offset="12" data-dropdown-overlay="true" data-dropdown-close-ms="140">
          <button type="button" class="flex items-center gap-3 cursor-pointer p-1 pr-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800/50 transition-all" data-dropdown-trigger aria-haspopup="menu" aria-expanded="false" aria-controls="user-dropdown">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-tr from-primary to-primary-400 p-0.5">
              <div class="w-full h-full rounded-md flex items-center justify-center font-bold text-xs bg-card text-zinc-900 dark:text-white">DW</div>
            </div>
            <div class="text-left">
              <p class="text-[11px] font-bold leading-none mb-0.5 text-zinc-800 dark:text-zinc-200">Dorin Watsap</p>
              <p class="text-[10px] font-bold text-zinc-500 uppercase tracking-tighter">ID: 882194</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-down" aria-hidden="true" data-dropdown-chevron class="lucide lucide-chevron-down hidden md:block w-[14px] h-[14px] text-zinc-500 transition-transform">
              <path d="m6 9 6 6 6-6"></path>
            </svg>
          </button>
          <div id="user-dropdown" data-dropdown-panel data-dropdown-template-id="tpl-user-menu" class="header-user-panel" role="menu" tabindex="-1" aria-label="Меню пользователя"></div>
          <template id="tpl-user-menu">
            <div class="p-4 border-b border-zinc-100 dark:border-zinc-800/50">
              <p class="text-[10px] font-bold uppercase text-zinc-500 mb-1">Аккаунт</p>
              <p class="text-sm font-bold truncate">lawyer1@awsarhitect.me</p>
            </div>
            <div class="p-2 border-t border-zinc-100 dark:border-zinc-800/50">
              <a href="logout.php" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors">
                <span class="text-sm font-bold">Выйти</span>
              </a>
            </div>
          </template>
        </div>
      <?php else: ?>
        <a href="auth-login.php" class="hidden lg:inline-flex items-center gap-2 btn-primary px-4 py-2.5 rounded-lg text-sm font-bold ml-2 shadow-lg shadow-primary-500/20">
          <i data-lucide="log-in" class="w-4 h-4"></i>
          <span>Вход</span>
        </a>
      <?php endif; ?>

    </div>
</header>
