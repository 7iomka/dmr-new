<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
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
            <div class="auth-card-icon-wrap">
              <div class="auth-card-icon">
                <i data-lucide="log-in" class="h-8 w-8"></i>
              </div>
            </div>

            <div class="auth-card">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <h1 class="auth-title">Выберите способ входа</h1>
                <p class="auth-subtitle">Выберите предпочтительный способ аутентификации.</p>
              </div>

              <div class="auth-method-list">
                <a href="auth-login-password.php" class="group auth-method-btn auth-method-btn-primary">
                  <div class="auth-method-row">
                    <div class="auth-method-left">
                      <span class="auth-method-icon"><i data-lucide="phone" class="h-5 w-5"></i></span>
                      <div class="min-w-0">
                        <p class="auth-method-title">Телефон и пароль</p>
                        <p class="auth-method-desc">Войти с номером телефона и паролем</p>
                      </div>
                    </div>
                    <i data-lucide="chevron-right" class="auth-method-arrow"></i>
                  </div>
                </a>

                <a href="auth-login-email.php" class="group auth-method-btn">
                  <div class="auth-method-row">
                    <div class="auth-method-left">
                      <span class="auth-method-icon"><i data-lucide="mail" class="h-5 w-5"></i></span>
                      <div class="min-w-0">
                        <p class="auth-method-title">Email OTP</p>
                        <p class="auth-method-desc">Код подтверждения на почту</p>
                      </div>
                    </div>
                    <i data-lucide="chevron-right" class="auth-method-arrow"></i>
                  </div>
                </a>

                <a href="auth-login-telegram.php" class="group auth-method-btn">
                  <div class="auth-method-row">
                    <div class="auth-method-left">
                      <span class="auth-method-icon"><i data-lucide="send" class="h-5 w-5"></i></span>
                      <div class="min-w-0">
                        <p class="auth-method-title">Telegram OTP</p>
                        <p class="auth-method-desc">Код через Telegram-бот</p>
                      </div>
                    </div>
                    <i data-lucide="chevron-right" class="auth-method-arrow"></i>
                  </div>
                </a>

                <a href="auth-login-whatsapp.php" class="group auth-method-btn">
                  <div class="auth-method-row">
                    <div class="auth-method-left">
                      <span class="auth-method-icon"><i data-lucide="message-circle" class="h-5 w-5"></i></span>
                      <div class="min-w-0">
                        <p class="auth-method-title">WhatsApp OTP</p>
                        <p class="auth-method-desc">Код через WhatsApp</p>
                      </div>
                    </div>
                    <i data-lucide="chevron-right" class="auth-method-arrow"></i>
                  </div>
                </a>
              </div>

              <div class="auth-divider auth-footer">
                <a href="auth-forgot.php" class="auth-link">Забыли пароль?</a>
                <span class="auth-muted">Нет аккаунта? <a href="auth-register.php" class="auth-link">Зарегистрироваться</a></span>
              </div>
            </div>
          </section>
        </main>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
