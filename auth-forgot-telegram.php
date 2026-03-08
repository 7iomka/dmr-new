<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $target = trim((string) ($_POST['telegram'] ?? ''));
    header('Location: auth-otp.php?purpose=forgot&channel=telegram&target=' . urlencode($target) . '&back=auth-forgot-telegram.php');
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
                <i data-lucide="send" class="h-8 w-8"></i>
              </div>
            </div>

            <form method="post" class="auth-card">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <h1 class="auth-title">Сброс через Telegram</h1>
                <p class="auth-subtitle">Введите Telegram username или номер для отправки кода.</p>
              </div>

              <div class="space-y-2 relative z-10">
                <label class="auth-label">Telegram</label>
                <input name="telegram" type="text" required placeholder="@username или +7..." class="auth-input">
              </div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary rounded-xl px-4 py-3 text-sm font-bold">Продолжить</button>
                <a href="auth-forgot.php" class="auth-secondary-btn">Назад</a>
              </div>

              <div class="auth-divider auth-footer justify-start">
                <a href="auth-login.php" class="auth-link">Вернуться ко входу</a>
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
