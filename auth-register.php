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
        <main class="page-main flex items-center justify-center">
          <section class="w-full max-w-2xl">
            <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-card p-6 sm:p-8 space-y-6">
              <div class="space-y-1">
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Регистрация</h1>
                <p class="text-sm text-zinc-500">Выберите удобный способ создания аккаунта.</p>
              </div>

              <div class="flex flex-col gap-3">
                <a href="auth-register-email.php" class="group rounded-lg border border-primary-300/60 dark:border-primary-500/40 bg-primary-50 dark:bg-primary-950/20 p-4 hover:border-primary-500 transition-colors">
                  <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                      <span class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="mail" class="w-5 h-5"></i></span>
                      <div>
                        <p class="text-sm font-semibold text-zinc-900 dark:text-white">Регистрация через Email</p>
                        <p class="text-xs text-zinc-500">Подтверждение через одноразовый код</p>
                      </div>
                    </div>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-zinc-400 group-hover:text-primary transition-colors"></i>
                  </div>
                </a>

                <a href="auth-register-phone.php" class="group rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50/60 dark:bg-zinc-900/40 p-4 hover:border-primary-400/60 transition-colors">
                  <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                      <span class="w-10 h-10 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-500 flex items-center justify-center shrink-0"><i data-lucide="smartphone" class="w-5 h-5"></i></span>
                      <div>
                        <p class="text-sm font-semibold text-zinc-900 dark:text-white">Регистрация через Телефон</p>
                        <p class="text-xs text-zinc-500">Создание аккаунта с паролем</p>
                      </div>
                    </div>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-zinc-400 group-hover:text-primary transition-colors"></i>
                  </div>
                </a>
              </div>

              <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 text-sm text-zinc-500">
                Уже есть аккаунт? <a href="auth-login.php" class="text-primary hover:text-primary-700">Войти</a>
              </div>
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
