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
      <div class="page-body">
        <main class="page-main flex items-center justify-center">
          <section class="auth-shell">
            <div class="auth-shell-glow"></div>

            <form method="post" class="auth-card">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <div class="auth-card-icon">
                  <i data-lucide="send" class="h-6 w-6"></i>
                </div>
                <h1 class="auth-title">Сброс через Telegram</h1>
                <p class="auth-subtitle">Введите Telegram username или номер для отправки кода.</p>
              </div>

              <div class="relative z-10 flex flex-col gap-2">
                <label for="forgot-telegram" class="c-form-label">Telegram</label>
                <div class="c-form-control__input-wrap">
                  <span class="c-form-control__icon-left"><i data-lucide="send" class="h-4 w-4"></i></span>
                  <input id="forgot-telegram" name="telegram" type="text" required placeholder="@username или +7..." class="auth-input-with-icons pr-4">
                </div>
              </div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm font-bold">Продолжить</button>
                <a href="auth-forgot.php" class="btn-secondary px-4 py-3 text-sm font-semibold">Назад</a>
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