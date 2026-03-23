<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php require_once __DIR__ . '/includes/demo-news.php'; ?>
<?php
$newsId = max(1, (int) ($_GET['id'] ?? 1));
$newsItem = getDemoNewsItemById($newsId) ?? getDemoNewsItems()[0];
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
          <article class="card-simple mt-4 w-full max-w-[1000px] mx-auto overflow-hidden">
            <a href="news.php" class="mb-4 inline-flex items-center gap-2 text-sm font-semibold text-primary hover:text-primary-600">
              <i data-lucide="chevron-left" class="w-4 h-4 -mx-1"></i>
              <span>К списку новостей</span>
            </a>
            <div class="relative aspect-video overflow-hidden rounded-xl">
              <img src="<?= htmlspecialchars($newsItem['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($newsItem['title'], ENT_QUOTES, 'UTF-8') ?>" class="h-full w-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/45 via-black/10 to-transparent"></div>
              <span class="absolute bottom-1.5 right-1.5 rounded-md border border-white/30 bg-black/65 px-2 py-1 text-[10px] font-bold tracking-[0.08em] text-white backdrop-blur-sm"><?= htmlspecialchars($newsItem['date'], ENT_QUOTES, 'UTF-8') ?></span>
            </div>

            <div class="mt-5">
              <div class="text-[10px] uppercase font-bold tracking-widest text-zinc-500 mb-3">Новость #<?= (int) $newsItem['id'] ?></div>
              <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white mb-3"><?= htmlspecialchars($newsItem['title'], ENT_QUOTES, 'UTF-8') ?></h1>
              <p class="text-zinc-500 leading-relaxed mb-5"><?= htmlspecialchars($newsItem['excerpt'], ENT_QUOTES, 'UTF-8') ?></p>

              <div class="space-y-3 text-zinc-700 dark:text-zinc-200 leading-relaxed">
                <?php foreach ($newsItem['content'] as $paragraph): ?>
                  <p><?= htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endforeach; ?>
              </div>

              <div class="mt-6 flex flex-wrap gap-2">
                <?php foreach ($newsItem['categories'] as $category): ?>
                  <span class="chip-primary rounded-full px-3 py-1 text-xs font-semibold">#<?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?></span>
                <?php endforeach; ?>
              </div>
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