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
          <section class="relative w-full max-w-2xl">
            <div class="pointer-events-none absolute inset-x-10 -top-6 h-36 bg-primary-500/10 blur-3xl"></div>
            <div class="rounded-2xl border border-zinc-200/80 dark:border-zinc-800 bg-gradient-to-b from-white via-zinc-50/80 to-zinc-100/70 dark:from-zinc-900 dark:via-zinc-900 dark:to-zinc-950/80 shadow-[0_20px_45px_rgba(2,6,23,0.08)] dark:shadow-[0_20px_45px_rgba(0,0,0,0.45)] p-6 sm:p-8 space-y-6">
              <div class="flex justify-center -mt-1">
              <div class="h-14 w-14 rounded-2xl border border-primary-400/40 bg-gradient-to-b from-primary-100 to-primary-200 dark:from-primary-900/40 dark:to-primary-950/60 text-primary-700 dark:text-primary-300 flex items-center justify-center shadow-[0_10px_30px_rgba(16,185,129,0.22)]">
                <i data-lucide="shield-check" class="w-7 h-7"></i>
              </div>
            </div>

            <div class="space-y-1">
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Восстановление пароля</h1>
                <p class="text-sm text-zinc-500">Выберите способ получения одноразового кода.</p>
              </div>

              <div class="flex flex-col gap-3">
                <a href="auth-forgot-email.php" class="group rounded-lg border border-primary-300/60 dark:border-primary-500/40 bg-primary-50 dark:bg-primary-950/20 p-4 hover:border-primary-500 transition-colors">
                  <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3"><span class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="mail" class="w-5 h-5"></i></span><div><p class="text-sm font-semibold text-zinc-900 dark:text-white">Отправить код по Email</p><p class="text-xs text-zinc-500">Сброс через почту</p></div></div>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-zinc-400 group-hover:text-primary transition-colors"></i>
                  </div>
                </a>
                <a href="auth-forgot-telegram.php" class="group rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50/60 dark:bg-zinc-900/40 p-4 hover:border-primary-400/60 transition-colors">
                  <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3"><span class="w-10 h-10 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-500 flex items-center justify-center"><i data-lucide="send" class="w-5 h-5"></i></span><div><p class="text-sm font-semibold text-zinc-900 dark:text-white">Telegram OTP</p><p class="text-xs text-zinc-500">Код через Telegram</p></div></div>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-zinc-400 group-hover:text-primary transition-colors"></i>
                  </div>
                </a>
                <a href="auth-forgot-whatsapp.php" class="group rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50/60 dark:bg-zinc-900/40 p-4 hover:border-primary-400/60 transition-colors">
                  <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3"><span class="w-10 h-10 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-500 flex items-center justify-center"><i data-lucide="message-circle" class="w-5 h-5"></i></span><div><p class="text-sm font-semibold text-zinc-900 dark:text-white">WhatsApp OTP</p><p class="text-xs text-zinc-500">Код через WhatsApp</p></div></div>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-zinc-400 group-hover:text-primary transition-colors"></i>
                  </div>
                </a>
              </div>

              <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 text-sm text-zinc-500">
                Помните пароль? <a href="auth-login.php" class="text-primary hover:text-primary-700">Вернуться ко входу</a>
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
