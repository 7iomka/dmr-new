<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $target = trim((string) ($_POST['phone'] ?? ''));
    header('Location: auth-otp.php?purpose=login&channel=whatsapp&target=' . urlencode($target) . '&back=auth-login-whatsapp.php');
    exit;
}
?>
<!doctype html>
<html lang="ru" class="dark">
<?php include __DIR__ . '/partials/head.php'; ?>
<body>
<div id="app" class="flex overflow-hidden min-h-screen"><?php include __DIR__ . '/partials/desktop-sidebar.php'; ?><div class="page-content-area"><?php include __DIR__ . '/partials/header.php'; ?><div class="flex-1 overflow-y-auto"><main class="page-main"><form method="post" class="card-simple max-w-xl mx-auto space-y-4"><h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Вход через WhatsApp OTP</h1><input name="phone" type="text" required placeholder="Телефон" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-card px-4 py-3"><button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm">Продолжить</button><a href="auth-login.php" class="inline-block px-4 py-3 text-sm rounded-lg border border-zinc-200 dark:border-zinc-700">Назад</a><div class="text-sm text-zinc-500 flex flex-wrap gap-4 pt-2"><a href="auth-forgot.php" class="text-primary hover:text-primary-700">Забыли пароль?</a><a href="auth-register.php" class="text-primary hover:text-primary-700">Регистрация</a></div></form></main></div></div></div>
<?php include __DIR__ . '/partials/app-shell/index.php'; ?><?php include __DIR__ . '/partials/scripts.php'; ?>
</body>
</html>
