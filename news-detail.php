<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php $newsId = max(1, (int) ($_GET['id'] ?? 1)); ?>
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
          <a href="news.php" class="text-sm font-semibold text-primary hover:text-primary-700">← К списку новостей</a>
          <article class="card-simple mt-4">
            <div class="text-[10px] uppercase font-bold tracking-[2px] text-zinc-500 mb-3">Новость #<?= $newsId ?></div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white mb-4">Детальная новость</h1>
            <p class="text-zinc-500 leading-relaxed">Эта страница доступна и гостю, и авторизованному пользователю. Контент одинаковый, но навигационная оболочка переключается по состоянию авторизации.</p>
          </article>
        </main>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
