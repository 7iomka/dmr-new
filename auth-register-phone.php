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
                  <i data-lucide="smartphone" class="h-6 w-6"></i>
                </div>
                <h1 class="auth-title">Регистрация по телефону</h1>
                <p class="auth-subtitle">Введите данные аккаунта для демо-регистрации.</p>
              </div>

              <div class="relative z-10 flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                  <label for="register-phone-name" class="auth-label">Имя</label>
                  <input id="register-phone-name" name="name" type="text" required placeholder="Ваше имя" class="auth-input">
                </div>
                <div class="flex flex-col gap-2">
                  <label for="register-phone-phone" class="auth-label">Телефон</label>
                  <input id="register-phone-phone" name="phone" type="text" required placeholder="+7 (___) ___-__-__" class="auth-input">
                </div>
                <div class="flex flex-col gap-2">
                  <label for="register-phone-password" class="auth-label">Пароль</label>
                  <input id="register-phone-password" name="password" type="password" required placeholder="Создайте пароль" class="auth-input">
                </div>
                <div class="flex flex-col gap-2">
                  <label for="register-phone-password-confirmation" class="auth-label">Подтверждение пароля</label>
                  <input id="register-phone-password-confirmation" name="password_confirmation" type="password" required placeholder="Повторите пароль" class="auth-input">
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

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
