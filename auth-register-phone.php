<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php demoRequirePostAndLogin('dashboard.php'); ?>
<!doctype html>
<html lang="ru" class="dark">
<?php include __DIR__ . '/partials/head.php'; ?>
<body>
<div id="app" class="flex overflow-hidden min-h-screen"><?php include __DIR__ . '/partials/desktop-sidebar.php'; ?><div class="page-content-area"><?php include __DIR__ . '/partials/header.php'; ?><div class="flex-1 overflow-y-auto"><main class="page-main"><form method="post" class="card-simple max-w-xl mx-auto space-y-4"><h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Регистрация через телефон</h1><input name="phone" type="text" required placeholder="Телефон" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-card px-4 py-3"><input name="password" type="password" required placeholder="Пароль" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-card px-4 py-3"><p class="text-xs text-zinc-500">Минимум 6 символов. Для demo-flow подойдет любое значение.</p><input name="password_confirm" type="password" required placeholder="Подтвердите пароль" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-card px-4 py-3"><input name="ref" type="text" placeholder="Реферальный код (необязательно)" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-card px-4 py-3"><button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm">Создать аккаунт</button><a href="auth-register.php" class="inline-block px-4 py-3 text-sm rounded-lg border border-zinc-200 dark:border-zinc-700">Назад</a></form></main></div></div></div>
<?php include __DIR__ . '/partials/app-shell/index.php'; ?><?php include __DIR__ . '/partials/scripts.php'; ?>
</body>
</html>
