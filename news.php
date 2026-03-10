<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php require_once __DIR__ . '/includes/demo-news.php'; ?>
<?php require_once __DIR__ . '/components/news-card.php'; ?>
<?php
$baseNewsItems = getDemoNewsItems();
$newsItems = [];
for ($batch = 0; $batch < 2; $batch++) {
  foreach ($baseNewsItems as $item) {
    $item['source_id'] = $item['id'];
    $item['id'] = $item['id'] + ($batch * 100);
    $newsItems[] = $item;
  }
}
$initialVisibleCount = 6;
?>
<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">
    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>

    <div class="page-content-area">
      <?php include __DIR__ . '/partials/header.php'; ?>

      <div class="page-body">
        <main class="page-main">
          <div class="flex items-end justify-between gap-4 mb-6">
            <div>
              <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white">Новости проекта</h1>
              <p class="text-zinc-500 text-sm font-medium mt-1">Единая карточка новости для лендинга и общей страницы новостей.</p>
            </div>
            <span class="text-xs font-bold uppercase px-3 py-1 rounded-md bg-primary/10 text-primary">Shell: <?= shouldUseAppShell() ? 'App' : 'Guest' ?></span>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4" id="newsList">
            <?php foreach ($newsItems as $index => $newsItem): ?>
              <div class="news-list-item" <?= $index >= $initialVisibleCount ? 'hidden' : '' ?>>
                <?php renderNewsCard($newsItem, ['href' => 'news-detail.php?id=' . $newsItem['source_id']]); ?>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="mt-6 flex justify-center">
            <button id="showMoreNews" class="btn-primary px-5 py-2.5 rounded-lg text-sm font-semibold" data-step="3">
              Показать ещё
            </button>
          </div>
        </main>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
  <script>
    (() => {
      const button = document.getElementById('showMoreNews');
      const items = [...document.querySelectorAll('#newsList .news-list-item')];
      const step = Number(button?.dataset.step || 3);

      if (!button) {
        return;
      }

      button.addEventListener('click', () => {
        const hiddenItems = items.filter((item) => item.hasAttribute('hidden'));
        hiddenItems.slice(0, step).forEach((item) => item.removeAttribute('hidden'));

        if (items.every((item) => !item.hasAttribute('hidden'))) {
          button.setAttribute('hidden', 'hidden');
        }
      });
    })();
  </script>
</body>

</html>
