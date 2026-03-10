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
          <article class="card-simple max-w-3xl">
            <h1 class="text-2xl font-bold text-zinc-900 dark:text-white mb-4">Контакты</h1>
            <p class="text-zinc-500 mb-6">Свяжитесь с нами по любому удобному каналу.</p>
            <div class="space-y-3 text-sm text-zinc-600 dark:text-zinc-300">
              <p><span class="font-semibold text-zinc-900 dark:text-white">Email:</span> support@dilanmirror.test</p>
              <p><span class="font-semibold text-zinc-900 dark:text-white">Telegram:</span> @dilanmirror_support</p>
              <p><span class="font-semibold text-zinc-900 dark:text-white">WhatsApp:</span> +7 900 000-00-00</p>
            </div>
          </article>
        </main>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
