<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $target = trim((string) ($_POST['phone'] ?? ''));
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
          <form method="post" class="w-full max-w-xl rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-card p-6 sm:p-8 space-y-5">
            <div class="space-y-1">
              <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Сброс через Telegram</h1>
              <p class="text-sm text-zinc-500">Введите телефон для отправки кода.</p>
            </div>
            <div class="space-y-2">
              <label class="text-xs font-bold uppercase tracking-[1.5px] text-zinc-500">Телефон</label>
              <input name="phone" type="text" required placeholder="+7 (___) ___-__-__" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-950/40 px-4 py-3 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-primary-500">
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
              <button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm font-bold">Продолжить</button>
              <a href="auth-forgot.php" class="inline-flex items-center justify-center rounded-lg px-4 py-3 text-sm font-semibold border border-zinc-200 dark:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-800/50">Назад</a>
            </div>
            <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 text-sm">
              <a href="auth-login.php" class="text-primary hover:text-primary-700">Вернуться ко входу</a>
            </div>
          </form>
        </main>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
