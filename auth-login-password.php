<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php demoRequirePostAndLogin('dashboard.php'); ?>
<!doctype html>
<html lang="ru" class="dark">
<?php include __DIR__ . '/partials/head.php'; ?>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">
    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>
    <div class="page-content-area">
      <?php include __DIR__ . '/partials/header.php'; ?>
      <div class="page-body">
        <main class="page-main flex items-center justify-center">
          <section class="auth-shell">
            <div class="auth-shell-glow"></div>

            <form method="post" class="auth-card">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <div class="auth-card-icon">
                  <i data-lucide="key" class="h-6 w-6"></i>
                </div>
                <h1 class="auth-title">Вход по телефону</h1>
                <p class="auth-subtitle">Введите номер телефона и пароль.</p>
              </div>

              <div class="relative z-10 flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                  <label for="login-phone" class="auth-label">Номер телефона</label>
                  <div class="auth-phone-shell">
                    <div class="auth-phone-prefix">
                      <button data-phone-country-trigger type="button" class="auth-phone-country-trigger" aria-haspopup="listbox" aria-expanded="false">
                        <span data-phone-country-flag class="text-base leading-none">🇷🇺</span>
                        <span data-phone-country-code>+7</span>
                        <i data-lucide="chevron-down" class="auth-phone-country-chevron"></i>
                      </button>
                    </div>
                    <input id="login-phone" name="phone" type="tel" required placeholder="(999) 123-45-67" class="auth-phone-input" autocomplete="tel" inputmode="tel">
                  </div>
                  <input data-phone-country-hidden type="hidden" name="phone_country_code" value="+7">
                </div>

                <div class="flex flex-col gap-2">
                  <label for="login-password" class="auth-label">Пароль</label>
                  <div class="auth-input-wrap">
                    <span class="auth-input-icon-left"><i data-lucide="lock" class="h-4 w-4"></i></span>
                    <input id="login-password" name="password" type="password" required placeholder="••••••••" class="auth-input-with-icons" autocomplete="current-password">
                    <button id="toggle-password-visibility" data-visibility="hidden" type="button" class="auth-input-icon-btn" aria-label="Показать пароль">
                      <i data-eye="show" data-lucide="eye" class="h-4 w-4"></i>
                      <i data-eye="hide" data-lucide="eye-off" class="h-4 w-4 hidden"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm font-bold">Продолжить</button>
                <a href="auth-login.php" class="btn-secondary px-4 py-3 text-sm font-semibold">Назад</a>
              </div>

              <div class="auth-divider auth-footer justify-start">
                <a href="auth-forgot.php" class="auth-link">Забыли пароль?</a>
                <a href="auth-register.php" class="auth-link">Регистрация</a>
              </div>
            </form>
          </section>
        </main>
      </div>
    </div>
  </div>

  <div data-phone-country-panel class="auth-phone-country-panel hidden" role="dialog" aria-label="Выбор страны">
    <input data-phone-country-search class="auth-phone-country-search" type="text" placeholder="Поиск страны" autocomplete="off">
    <div data-phone-country-list class="auth-phone-country-list" role="listbox" aria-label="Список стран"></div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
  <script type="module">
    import {
      computePosition,
      autoUpdate,
      offset,
      flip,
      shift
    } from 'https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.10/+esm';

    (() => {
      const countries = [{
          name: 'Russia',
          native: 'Россия',
          flag: '🇷🇺',
          code: '+7'
        },
        {
          name: 'Moldova',
          native: 'Moldova',
          flag: '🇲🇩',
          code: '+373'
        },
        {
          name: 'Ukraine',
          native: 'Україна',
          flag: '🇺🇦',
          code: '+380'
        },
        {
          name: 'Belarus',
          native: 'Беларусь',
          flag: '🇧🇾',
          code: '+375'
        },
        {
          name: 'Uzbekistan',
          native: 'Oʻzbekiston',
          flag: '🇺🇿',
          code: '+998'
        },
        {
          name: 'Kazakhstan',
          native: 'Қазақстан',
          flag: '🇰🇿',
          code: '+7'
        },
        {
          name: 'United States',
          native: 'United States',
          flag: '🇺🇸',
          code: '+1'
        },
      ];

      const trigger = document.querySelector('[data-phone-country-trigger]');
      const panel = document.querySelector('[data-phone-country-panel]');
      const list = document.querySelector('[data-phone-country-list]');
      const search = document.querySelector('[data-phone-country-search]');
      const flag = document.querySelector('[data-phone-country-flag]');
      const code = document.querySelector('[data-phone-country-code]');
      const hiddenCode = document.querySelector('[data-phone-country-hidden]');
      const phone = document.getElementById('login-phone');

      let cleanup = null;
      let selected = countries[0];

      function renderList(filter = '') {
        const q = filter.trim().toLowerCase();
        list.innerHTML = '';

        countries
          .filter((c) => (`${c.name} ${c.native} ${c.code}`).toLowerCase().includes(q))
          .forEach((c) => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'auth-phone-country-item';
            btn.setAttribute('role', 'option');
            btn.innerHTML = `
              <span class="flex items-center gap-3 min-w-0">
                <span class="text-base leading-none">${c.flag}</span>
                <span class="truncate">${c.name} (${c.native})</span>
              </span>
              <span class="text-zinc-400 dark:text-zinc-500">${c.code}</span>
            `;
            btn.addEventListener('click', () => {
              selected = c;
              flag.textContent = c.flag;
              code.textContent = c.code;
              hiddenCode.value = c.code;
              closePanel();
            });
            list.appendChild(btn);
          });
      }

      async function positionPanel() {
        if (!trigger || !panel) return;
        const {
          x,
          y
        } = await computePosition(trigger, panel, {
          placement: 'bottom-start',
          strategy: 'fixed',
          middleware: [offset(8), flip(), shift({
            padding: 8
          })],
        });
        panel.style.left = `${x}px`;
        panel.style.top = `${y}px`;
      }

      function openPanel() {
        if (!panel || !trigger) return;
        panel.classList.remove('hidden');
        trigger.setAttribute('aria-expanded', 'true');
        cleanup = autoUpdate(trigger, panel, positionPanel);
        positionPanel();
        search.value = '';
        renderList('');
        setTimeout(() => search.focus(), 0);
      }

      function closePanel() {
        panel?.classList.add('hidden');
        trigger?.setAttribute('aria-expanded', 'false');
        cleanup?.();
        cleanup = null;
      }

      if (trigger && panel && list && search && flag && code && hiddenCode) {
        renderList();
        trigger.addEventListener('click', () => {
          const isOpen = !panel.classList.contains('hidden');
          if (isOpen) closePanel();
          else openPanel();
        });

        search.addEventListener('input', () => renderList(search.value));

        document.addEventListener('click', (e) => {
          if (panel.classList.contains('hidden')) return;
          const insidePanel = panel.contains(e.target);
          const insideTrigger = trigger.contains(e.target);
          if (!insidePanel && !insideTrigger) closePanel();
        });

        document.addEventListener('keydown', (e) => {
          if (e.key === 'Escape') closePanel();
        });
      }

      if (phone) {
        phone.addEventListener('input', () => {
          const raw = phone.value.replace(/\D/g, '').slice(0, 10);
          const parts = [];
          if (raw.length > 0) parts.push('(' + raw.slice(0, 3));
          if (raw.length >= 4) parts[0] += ')';
          if (raw.length > 3) parts.push(' ' + raw.slice(3, 6));
          if (raw.length > 6) parts.push('-' + raw.slice(6, 8));
          if (raw.length > 8) parts.push('-' + raw.slice(8, 10));
          phone.value = parts.join('');
        });
      }

      const password = document.getElementById('login-password');
      const toggle = document.getElementById('toggle-password-visibility');
      if (toggle && password) {
        const showIcon = toggle.querySelector('[data-eye="show"]');
        const hideIcon = toggle.querySelector('[data-eye="hide"]');

        const syncIcons = () => {
          const visible = toggle.dataset.visibility === 'visible';
          showIcon?.classList.toggle('hidden', visible);
          hideIcon?.classList.toggle('hidden', !visible);
        };

        syncIcons();
        toggle.addEventListener('click', () => {
          const nextVisible = toggle.dataset.visibility !== 'visible';
          toggle.dataset.visibility = nextVisible ? 'visible' : 'hidden';
          password.type = nextVisible ? 'text' : 'password';
          toggle.setAttribute('aria-label', nextVisible ? 'Скрыть пароль' : 'Показать пароль');
          syncIcons();
        });
      }
    })();

    if (window.lucide) window.lucide.createIcons();
  </script>
</body>

</html>