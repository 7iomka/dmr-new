<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $target = trim((string) ($_POST['email'] ?? ''));
    header('Location: auth-otp.php?purpose=register&channel=email&target=' . urlencode($target) . '&back=auth-register-email.php');
    exit;
}
?>
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
                <i data-lucide="user-plus" class="h-8 w-8"></i>
              </div>
            </div>

            <form method="post" class="auth-card">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <h1 class="auth-title">Регистрация через Email</h1>
                <p class="auth-subtitle">Заполните данные, затем подтвердите код из письма.</p>
              </div>

              <div class="relative z-10 flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                  <label for="register-email-name" class="auth-label">Имя</label>
                  <input id="register-email-name" name="name" type="text" required placeholder="Ваше имя" class="auth-input">
                </div>
                <div class="flex flex-col gap-2">
                  <label for="register-email-email" class="auth-label">Email</label>
                  <input id="register-email-email" name="email" type="email" required placeholder="name@example.com" class="auth-input">
                </div>
                <div class="flex flex-col gap-2">
                  <label for="register-email-password" class="auth-label">Пароль</label>
                  <input id="register-email-password" name="password" type="password" required placeholder="Создайте пароль" class="auth-input">
                </div>
              </div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary rounded-xl px-4 py-3 text-sm font-bold">Продолжить</button>
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
