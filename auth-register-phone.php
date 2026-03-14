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
                <div class="c-form-control">
                  <label for="register-phone-phone" class="c-form-label">Номер телефона</label>
                  <?= renderPhoneInput([
                    'id' => 'register-phone-phone',
                    'name' => 'phone',
                    'hidden_name' => 'phone_country_code',
                    'required' => true,
                    'placeholder' => '(999) 123-45-67',
                  ]) ?>
                </div>

                <div class="c-form-control">
                  <label for="register-phone-password" class="c-form-label">Пароль</label>
                  <div class="c-form-control__input-wrap">
                    <span class="c-form-control__icon-left"><i data-lucide="lock" class="h-4 w-4"></i></span>
                    <input id="register-phone-password" name="password" type="password" required placeholder="Создайте пароль" class="auth-input-with-icons" autocomplete="new-password">
                    <button id="toggle-register-password" data-visibility="hidden" type="button" class="c-form-control__icon-btn" aria-label="Показать пароль">
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

                <div class="c-form-control">
                  <label for="register-phone-password-confirmation" class="c-form-label">Подтвердите пароль</label>
                  <div class="c-form-control__input-wrap">
                    <span class="c-form-control__icon-left"><i data-lucide="lock" class="h-4 w-4"></i></span>
                    <input id="register-phone-password-confirmation" name="password_confirmation" type="password" required placeholder="Повторите пароль" class="auth-input-with-icons" autocomplete="new-password">
                    <button id="toggle-register-password-confirm" data-visibility="hidden" type="button" class="c-form-control__icon-btn" aria-label="Показать пароль">
                      <i data-eye="show" data-lucide="eye" class="h-4 w-4"></i>
                      <i data-eye="hide" data-lucide="eye-off" class="h-4 w-4 hidden"></i>
                    </button>
                  </div>
                  <p id="register-password-mismatch" class="c-form-message hidden">Пароли не совпадают.</p>
                </div>

                <div class="c-form-control">
                  <label for="register-ref-code" class="c-form-label">Реферальный код (необязательно)</label>
                  <div class="c-form-control__input-wrap">
                    <span class="c-form-control__icon-left"><i data-lucide="code" class="h-4 w-4"></i></span>
                    <input id="register-ref-code" name="ref_code" type="text" placeholder="Введите реферальный код" class="auth-input-with-icons pr-4">
                  </div>
                </div>
              </div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm font-bold">Создать аккаунт</button>
                <a href="auth-register.php" class="btn-secondary px-4 py-3 text-sm font-semibold">Назад</a>
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


  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
  <script>
    (() => {
      const form = document.getElementById('register-phone-form');
      const password = document.getElementById('register-phone-password');
      const confirmPassword = document.getElementById('register-phone-password-confirmation');
      const mismatch = document.getElementById('register-password-mismatch');
      const strength = document.getElementById('password-strength');
      const bars = strength ? [...strength.querySelectorAll('.auth-strength-bar')] : [];

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
      if (window.lucide) window.lucide.createIcons({ inTemplates: true });
    })();
  </script>
  <?= renderPhoneInputScript(); ?>
</body>

</html>