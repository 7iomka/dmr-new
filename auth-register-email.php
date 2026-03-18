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
      <div class="page-body">
        <main class="page-main flex items-center justify-center">
          <section class="auth-shell">
            <div class="auth-shell-glow"></div>

            <form method="post" class="auth-card">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <div class="auth-card-icon">
                  <i data-lucide="user-plus" class="h-6 w-6"></i>
                </div>
                <h1 class="auth-title">Регистрация через Email</h1>
                <p class="auth-subtitle">Заполните данные, затем подтвердите код из письма.</p>
              </div>

              <div class="relative z-10 flex flex-col gap-4">
                <div class="c-form-control">
                  <label for="register-email-email" class="c-form-label">Email</label>
                  <div class="c-form-control__input-wrap">
                    <span class="c-form-control__icon-left"><i data-lucide="mail" class="h-4 w-4"></i></span>
                    <input id="register-email-email" name="email" type="email" required placeholder="name@example.com" class="auth-input-with-icons pr-4" value="<?= htmlspecialchars((string) ($_POST['email'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
                  </div>
                </div>
                <div class="c-form-control">
                  <label for="register-email-ref-code" class="c-form-label">Реферальный код (необязательно)</label>
                  <div class="c-form-control__input-wrap">
                    <span class="c-form-control__icon-left"><i data-lucide="code" class="h-4 w-4"></i></span>
                    <input id="register-email-ref-code" name="ref_code" type="text" placeholder="Введите реферальный код" class="auth-input-with-icons pr-4" value="<?= htmlspecialchars((string) ($_POST['ref_code'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
                  </div>
                </div>
              </div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary">Продолжить</button>
                <a href="auth-register.php" class="btn-secondary">Назад</a>
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