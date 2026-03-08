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
          <form method="post" class="w-full max-w-xl rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-card p-6 sm:p-8 space-y-5">
            <div class="space-y-1">
              <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Регистрация через телефон</h1>
              <p class="text-sm text-zinc-500">Создайте пароль и подтвердите его.</p>
            </div>

            <div class="space-y-4">
              <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-[1.5px] text-zinc-500">Телефон</label>
                <input name="phone" type="text" required placeholder="+7 (___) ___-__-__" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-950/40 px-4 py-3 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-primary-500">
              </div>
              <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-[1.5px] text-zinc-500">Пароль</label>
                <input name="password" type="password" required placeholder="Введите пароль" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-950/40 px-4 py-3 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-primary-500">
                <p class="text-xs text-zinc-500">Минимум 6 символов. В demo-режиме подходит любое значение.</p>
              </div>
              <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-[1.5px] text-zinc-500">Подтверждение пароля</label>
                <input name="password_confirm" type="password" required placeholder="Повторите пароль" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-950/40 px-4 py-3 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-primary-500">
              </div>
              <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-[1.5px] text-zinc-500">Реферальный код</label>
                <input name="ref" type="text" placeholder="Необязательно" class="w-full rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-950/40 px-4 py-3 text-sm text-zinc-900 dark:text-white focus:outline-none focus:border-primary-500">
              </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
              <button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm font-bold">Создать аккаунт</button>
              <a href="auth-register.php" class="inline-flex items-center justify-center rounded-lg px-4 py-3 text-sm font-semibold border border-zinc-200 dark:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-800/50">Назад</a>
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
