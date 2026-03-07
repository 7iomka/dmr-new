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
          <div class="flex items-end justify-between gap-4 mb-6">
            <div>
              <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white">Новости проекта</h1>
              <p class="text-zinc-500 text-sm font-medium mt-1">Общая страница для Guest и Authenticated с разной оболочкой.</p>
            </div>
            <span class="text-xs font-bold uppercase px-3 py-1 rounded-md bg-primary/10 text-primary">Shell: <?= shouldUseAppShell() ? 'App' : 'Guest' ?></span>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <?php for ($i = 1; $i <= 6; $i++): ?>
              <article class="card-simple">
                <div class="text-[10px] uppercase font-bold tracking-[2px] text-zinc-500 mb-2">Новость #<?= $i ?></div>
                <h2 class="text-lg font-bold text-zinc-900 dark:text-white mb-2">Обновление платформы Dilan Mirror</h2>
                <p class="text-sm text-zinc-500 mb-4">Короткое демо-описание новости для проверки общего контента в разных shell.</p>
                <a href="news-detail.php?id=<?= $i ?>" class="btn-primary inline-flex items-center gap-2 px-3 py-2 rounded-lg text-xs">Открыть новость</a>
              </article>
            <?php endfor; ?>
          </div>
        </main>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
