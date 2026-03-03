<!doctype html>
<html lang="ru" class="dark">
<?php include __DIR__ . '/partials/head.php'; ?>
<body>
  <div id="app" class="flex overflow-hidden min-h-screen">
    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>
    <div class="flex-1 flex flex-col min-w-0 h-screen relative pb-15 lg:pb-0">
      <?php include __DIR__ . '/partials/header.php'; ?>
      <?php include __DIR__ . '/components/landing-content.php'; ?>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>
</html>
