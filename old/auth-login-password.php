<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php demoRequirePostAndLogin('dashboard.php'); ?>
<?php require_once __DIR__ . '/components/phone-input.php'; ?>
<?php require_once __DIR__ . '/components/form-control.php'; ?>
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
                <div class="c-form-control">
                  <label for="login-phone" class="c-form-label">Номер телефона</label>
                  <?= renderPhoneInput([
                    'id' => 'login-phone',
                    'name' => 'phone',
                    'hidden_name' => 'phone_country_code',
                    'required' => true,
                    'placeholder' => '(999) 123-45-67',
                  ]) ?>
                </div>

                <div class="c-form-control">
                  <label for="login-password" class="c-form-label">Пароль</label>
                  <div class="c-form-control__input-wrap">
                    <span class="c-form-control__icon-left"><i data-lucide="lock" class="h-4 w-4"></i></span>
                    <input id="login-password" name="password" type="password" required placeholder="••••••••" class="auth-input-with-icons" autocomplete="current-password">
                    <button id="toggle-password-visibility" data-visibility="hidden" type="button" class="c-form-control__icon-btn" aria-label="Показать пароль">
                      <i data-eye="show" data-lucide="eye" class="h-4 w-4"></i>
                      <i data-eye="hide" data-lucide="eye-off" class="h-4 w-4 hidden"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary">Продолжить</button>
                <a href="auth-login.php" class="btn-secondary">Назад</a>
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

    if (window.lucide) window.lucide.createIcons({
      inTemplates: true
    });
  </script>
  <?= renderPhoneInputScript(); ?>
</body>

</html>