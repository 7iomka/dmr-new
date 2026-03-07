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
        <main class="page-main">
          <section class="card-simple max-w-2xl mx-auto space-y-4">
            <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Вход</h1>
            <p class="text-sm text-zinc-500">Выберите удобный способ входа.</p>
            <div class="grid gap-3">
              <a href="auth-login-password.php" class="btn-primary rounded-lg px-4 py-3 text-sm text-center">Телефон и пароль</a>
              <a href="auth-login-email.php" class="rounded-lg px-4 py-3 text-sm border border-zinc-200 dark:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-800/50">Email OTP</a>
              <a href="auth-login-telegram.php" class="rounded-lg px-4 py-3 text-sm border border-zinc-200 dark:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-800/50">Telegram OTP</a>
              <a href="auth-login-whatsapp.php" class="rounded-lg px-4 py-3 text-sm border border-zinc-200 dark:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-800/50">WhatsApp OTP</a>
            </div>
            <div class="text-sm text-zinc-500 flex flex-wrap gap-4">
              <a href="auth-forgot.php" class="text-primary hover:text-primary-700">Забыли пароль?</a>
              <a href="auth-register.php" class="text-primary hover:text-primary-700">Нет аккаунта? Зарегистрироваться</a>
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
