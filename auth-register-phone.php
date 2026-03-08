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
            <div class="auth-card-icon-wrap">
              <div class="auth-card-icon">
                <i data-lucide="smartphone" class="h-8 w-8"></i>
              </div>
            </div>

            <form method="post" class="auth-card">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <h1 class="auth-title">Регистрация по телефону</h1>
                <p class="auth-subtitle">Введите данные аккаунта для демо-регистрации.</p>
              </div>

              <div class="space-y-4 relative z-10">
                <div class="space-y-2">
                  <label class="auth-label">Имя</label>
                  <input name="name" type="text" required placeholder="Ваше имя" class="auth-input">
                </div>
                <div class="space-y-2">
                  <label class="auth-label">Телефон</label>
                  <input name="phone" type="text" required placeholder="+7 (___) ___-__-__" class="auth-input">
                </div>
                <div class="space-y-2">
                  <label class="auth-label">Пароль</label>
                  <input name="password" type="password" required placeholder="Создайте пароль" class="auth-input">
                </div>
                <div class="space-y-2">
                  <label class="auth-label">Подтверждение пароля</label>
                  <input name="password_confirmation" type="password" required placeholder="Повторите пароль" class="auth-input">
                </div>
              </div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary rounded-xl px-4 py-3 text-sm font-bold">Создать аккаунт</button>
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
