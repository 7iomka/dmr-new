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
                      <span id="login-phone-flag" class="text-base leading-none">🇷🇺</span>
                      <select id="login-phone-country" class="auth-phone-country-select" aria-label="Код страны">
                        <option value="+7" data-flag="🇷🇺">+7</option>
                        <option value="+380" data-flag="🇺🇦">+380</option>
                        <option value="+375" data-flag="🇧🇾">+375</option>
                        <option value="+998" data-flag="🇺🇿">+998</option>
                        <option value="+1" data-flag="🇺🇸">+1</option>
                      </select>
                    </div>
                    <input id="login-phone" name="phone" type="tel" required placeholder="(999) 123-45-67" class="auth-phone-input" autocomplete="tel" inputmode="tel">
                  </div>
                </div>
                <div class="flex flex-col gap-2">
                  <label for="login-password" class="auth-label">Пароль</label>
                  <div class="auth-input-wrap">
                    <span class="auth-input-icon-left"><i data-lucide="lock" class="h-5 w-5"></i></span>
                    <input id="login-password" name="password" type="password" required placeholder="••••••••" class="auth-input-with-icons" autocomplete="current-password">
                    <button id="toggle-password-visibility" type="button" class="auth-input-icon-btn" aria-label="Показать пароль">
                      <i id="password-eye-icon" data-lucide="eye" class="h-5 w-5"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm font-bold">Продолжить</button>
                <a href="auth-login.php" class="auth-secondary-btn">Назад</a>
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

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
  <script>
    (() => {
      const country = document.getElementById('login-phone-country');
      const flag = document.getElementById('login-phone-flag');
      const phone = document.getElementById('login-phone');
      const password = document.getElementById('login-password');
      const toggle = document.getElementById('toggle-password-visibility');
      const icon = document.getElementById('password-eye-icon');

      if (country && flag) {
        const syncFlag = () => {
          const selected = country.options[country.selectedIndex];
          flag.textContent = selected?.dataset.flag || '🌐';
        };
        syncFlag();
        country.addEventListener('change', syncFlag);
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

      if (toggle && password && icon) {
        toggle.addEventListener('click', () => {
          const hidden = password.type === 'password';
          password.type = hidden ? 'text' : 'password';
          icon.setAttribute('data-lucide', hidden ? 'eye-off' : 'eye');
          toggle.setAttribute('aria-label', hidden ? 'Скрыть пароль' : 'Показать пароль');
          if (window.lucide) window.lucide.createIcons();
        });
      }
    })();
  </script>
</body>

</html>
