<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $target = trim((string) ($_POST['whatsapp'] ?? ''));
    header('Location: auth-otp.php?purpose=forgot&channel=whatsapp&target=' . urlencode($target) . '&back=auth-forgot-whatsapp.php');
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

            <form method="post" class="auth-card">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <div class="auth-card-icon">
                  <i data-lucide="message-circle" class="h-6 w-6"></i>
                </div>
                <h1 class="auth-title">Сброс через WhatsApp</h1>
                <p class="auth-subtitle">Введите WhatsApp номер для отправки кода подтверждения.</p>
              </div>

              <div class="relative z-10 flex flex-col gap-2">
                <label for="forgot-whatsapp" class="auth-label">WhatsApp</label>
                <input id="forgot-whatsapp" name="whatsapp" type="text" required placeholder="+7..." class="auth-input">
              </div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm font-bold">Продолжить</button>
                <a href="auth-forgot.php" class="auth-secondary-btn">Назад</a>
              </div>

              <div class="auth-divider auth-footer justify-start">
                <span class="auth-muted">Помните пароль? <a href="auth-login.php" class="auth-link">Вернуться ко входу</a></span>
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
