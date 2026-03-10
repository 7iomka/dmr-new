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
      <div class="flex-1 overflow-y-auto">
        <main class="page-main flex items-center justify-center">
          <section class="auth-shell">
            <div class="auth-shell-glow"></div>

            <form method="post" class="auth-card" id="register-phone-form">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <div class="auth-card-icon">
                  <i data-lucide="smartphone" class="h-6 w-6"></i>
                </div>
                <h1 class="auth-title">Регистрация по телефону</h1>
                <p class="auth-subtitle">Введите данные аккаунта для демо-регистрации.</p>
              </div>

              <div class="relative z-10 flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                  <label for="register-phone-phone" class="auth-label">Номер телефона</label>
                  <div class="auth-phone-shell">
                    <div class="auth-phone-prefix">
                      <button data-phone-country-trigger type="button" class="auth-phone-country-trigger" aria-haspopup="listbox" aria-expanded="false">
                        <span data-phone-country-flag class="text-base leading-none">🇷🇺</span>
                        <span data-phone-country-code>+7</span>
                        <i data-lucide="chevron-down" class="auth-phone-country-chevron"></i>
                      </button>
                    </div>
                    <input id="register-phone-phone" name="phone" type="tel" required placeholder="(999) 123-45-67" class="auth-phone-input" autocomplete="tel" inputmode="tel">
                  </div>
                  <input data-phone-country-hidden type="hidden" name="phone_country_code" value="+7">
                </div>

                <div class="flex flex-col gap-2">
                  <label for="register-phone-password" class="auth-label">Пароль</label>
                  <div class="auth-input-wrap">
                    <span class="auth-input-icon-left"><i data-lucide="lock" class="h-4 w-4"></i></span>
                    <input id="register-phone-password" name="password" type="password" required placeholder="Создайте пароль" class="auth-input-with-icons" autocomplete="new-password">
                    <button id="toggle-register-password" data-visibility="hidden" type="button" class="auth-input-icon-btn" aria-label="Показать пароль">
                      <i data-eye="show" data-lucide="eye" class="h-4 w-4"></i>
                      <i data-eye="hide" data-lucide="eye-off" class="h-4 w-4 hidden"></i>
                    </button>
                  </div>
                  <div class="auth-strength" id="password-strength">
                    <div class="auth-strength-bars">
                      <span class="auth-strength-bar"></span>
                      <span class="auth-strength-bar"></span>
                      <span class="auth-strength-bar"></span>
                      <span class="auth-strength-bar"></span>
                    </div>
                    <div class="auth-requirements">
                      <div class="auth-requirement" data-rule="min">Не менее 8 символов</div>
                      <div class="auth-requirement" data-rule="max">Не более 16 символов</div>
                      <div class="auth-requirement" data-rule="upper">Одна прописная буква</div>
                      <div class="auth-requirement" data-rule="lower">Одна строчная буква</div>
                      <div class="auth-requirement" data-rule="digit">Одна цифра</div>
                      <div class="auth-requirement" data-rule="special">Один специальный символ</div>
                    </div>
                  </div>
                </div>

                <div class="flex flex-col gap-2">
                  <label for="register-phone-password-confirmation" class="auth-label">Подтвердите пароль</label>
                  <div class="auth-input-wrap">
                    <span class="auth-input-icon-left"><i data-lucide="lock" class="h-4 w-4"></i></span>
                    <input id="register-phone-password-confirmation" name="password_confirmation" type="password" required placeholder="Повторите пароль" class="auth-input-with-icons" autocomplete="new-password">
                    <button id="toggle-register-password-confirm" data-visibility="hidden" type="button" class="auth-input-icon-btn" aria-label="Показать пароль">
                      <i data-eye="show" data-lucide="eye" class="h-4 w-4"></i>
                      <i data-eye="hide" data-lucide="eye-off" class="h-4 w-4 hidden"></i>
                    </button>
                  </div>
                  <p id="register-password-mismatch" class="auth-field-error">Пароли не совпадают.</p>
                </div>

                <div class="flex flex-col gap-2">
                  <label for="register-ref-code" class="auth-label">Реферальный код (необязательно)</label>
                  <div class="auth-input-wrap">
                    <span class="auth-input-icon-left"><i data-lucide="code" class="h-4 w-4"></i></span>
                    <input id="register-ref-code" name="ref_code" type="text" placeholder="Введите реферальный код" class="auth-input-with-icons pr-4">
                  </div>
                </div>
              </div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm font-bold">Создать аккаунт</button>
                <a href="auth-register.php" class="auth-secondary-btn">Назад</a>
              </div>

              <div class="auth-divider auth-footer justify-start">
                <span class="auth-muted">Уже есть аккаунт? <a href="auth-login.php" class="auth-link">Войти</a></span>
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
    import {computePosition, autoUpdate, offset, flip, shift} from 'https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.10/+esm';

    (() => {
      const countries = [
        { name: 'Russia', native: 'Россия', flag: '🇷🇺', code: '+7' },
        { name: 'Moldova', native: 'Moldova', flag: '🇲🇩', code: '+373' },
        { name: 'Ukraine', native: 'Україна', flag: '🇺🇦', code: '+380' },
        { name: 'Belarus', native: 'Беларусь', flag: '🇧🇾', code: '+375' },
        { name: 'Uzbekistan', native: 'Oʻzbekiston', flag: '🇺🇿', code: '+998' },
        { name: 'Kazakhstan', native: 'Қазақстан', flag: '🇰🇿', code: '+7' },
        { name: 'United States', native: 'United States', flag: '🇺🇸', code: '+1' },
      ];

      const trigger = document.querySelector('[data-phone-country-trigger]');
      const panel = document.querySelector('[data-phone-country-panel]');
      const list = document.querySelector('[data-phone-country-list]');
      const search = document.querySelector('[data-phone-country-search]');
      const flag = document.querySelector('[data-phone-country-flag]');
      const code = document.querySelector('[data-phone-country-code]');
      const hiddenCode = document.querySelector('[data-phone-country-hidden]');
      const phone = document.getElementById('register-phone-phone');

      const password = document.getElementById('register-phone-password');
      const confirmPassword = document.getElementById('register-phone-password-confirmation');
      const mismatch = document.getElementById('register-password-mismatch');
      const form = document.getElementById('register-phone-form');
      const strength = document.getElementById('password-strength');
      const bars = strength ? [...strength.querySelectorAll('.auth-strength-bar')] : [];

      let cleanup = null;

      function setupPasswordToggle(buttonId, inputId) {
        const toggle = document.getElementById(buttonId);
        const input = document.getElementById(inputId);
        if (!toggle || !input) return;
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
          input.type = nextVisible ? 'text' : 'password';
          toggle.setAttribute('aria-label', nextVisible ? 'Скрыть пароль' : 'Показать пароль');
          syncIcons();
        });
      }

      function renderList(filter = '') {
        if (!list) return;
        const q = filter.trim().toLowerCase();
        list.innerHTML = '';
        countries
          .filter((c) => (`${c.name} ${c.native} ${c.code}`).toLowerCase().includes(q))
          .forEach((c) => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'auth-phone-country-item';
            btn.innerHTML = `
              <span class="flex items-center gap-3 min-w-0">
                <span class="text-base leading-none">${c.flag}</span>
                <span class="truncate">${c.name} (${c.native})</span>
              </span>
              <span class="text-zinc-400 dark:text-zinc-500">${c.code}</span>
            `;
            btn.addEventListener('click', () => {
              if (flag) flag.textContent = c.flag;
              if (code) code.textContent = c.code;
              if (hiddenCode) hiddenCode.value = c.code;
              closePanel();
            });
            list.appendChild(btn);
          });
      }

      async function positionPanel() {
        if (!trigger || !panel) return;
        const {x, y} = await computePosition(trigger, panel, {
          placement: 'bottom-start',
          strategy: 'fixed',
          middleware: [offset(8), flip(), shift({padding: 8})],
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
        if (search) {
          search.value = '';
          renderList('');
          setTimeout(() => search.focus(), 0);
        }
      }

      function closePanel() {
        panel?.classList.add('hidden');
        trigger?.setAttribute('aria-expanded', 'false');
        cleanup?.();
        cleanup = null;
      }

      function scorePassword(value) {
        const rules = {
          min: value.length >= 8,
          max: value.length <= 16,
          upper: /[A-ZА-ЯЁ]/.test(value),
          lower: /[a-zа-яё]/.test(value),
          digit: /\d/.test(value),
          special: /[^A-Za-zА-Яа-яЁё0-9]/.test(value),
        };

        if (strength) {
          if (value.length === 0) {
            ['min', 'max', 'upper', 'lower', 'digit', 'special'].forEach((rule) => {
              strength.querySelector(`[data-rule="${rule}"]`)?.classList.remove('ok');
            });
            bars.forEach((bar) => bar.classList.remove('active'));
            return rules;
          }

          Object.entries(rules).forEach(([rule, ok]) => {
            strength.querySelector(`[data-rule="${rule}"]`)?.classList.toggle('ok', ok);
          });

          const passed = Object.values(rules).filter(Boolean).length;
          bars.forEach((bar, idx) => bar.classList.toggle('active', idx < Math.ceil((passed / 6) * 4)));
        }

        return rules;
      }

      function validateMatch(showError = false) {
        if (!password || !confirmPassword || !mismatch) return true;
        const matches = confirmPassword.value === '' || password.value === confirmPassword.value;
        mismatch.classList.toggle('hidden', matches || !showError);
        return matches;
      }

      setupPasswordToggle('toggle-register-password', 'register-phone-password');
      setupPasswordToggle('toggle-register-password-confirm', 'register-phone-password-confirmation');
      renderList();

      if (trigger && panel) {
        trigger.addEventListener('click', () => {
          const isOpen = !panel.classList.contains('hidden');
          if (isOpen) closePanel(); else openPanel();
        });
      }

      if (search) search.addEventListener('input', () => renderList(search.value));

      document.addEventListener('click', (e) => {
        if (!panel || panel.classList.contains('hidden') || !trigger) return;
        const insidePanel = panel.contains(e.target);
        const insideTrigger = trigger.contains(e.target);
        if (!insidePanel && !insideTrigger) closePanel();
      });

      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closePanel();
      });

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

      password?.addEventListener('input', () => {
        scorePassword(password.value);
        validateMatch(false);
      });

      confirmPassword?.addEventListener('input', () => validateMatch(true));

      form?.addEventListener('submit', (e) => {
        if (form && !form.checkValidity()) {
          e.preventDefault();
          form.reportValidity();
          return;
        }

        const matched = validateMatch(true);
        if (!matched) {
          e.preventDefault();
        }
      });

      scorePassword(password?.value || '');
      if (window.lucide) window.lucide.createIcons();
    })();
  </script>
</body>

</html>
