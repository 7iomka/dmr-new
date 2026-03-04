<!doctype html>
<html lang="ru" class="dark">
<?php include __DIR__ . '/partials/head.php'; ?>
<body class="home-no-sidebar">
  <div id="app" class="flex overflow-hidden min-h-screen">
    <div class="flex-1 flex flex-col min-w-0 h-screen relative pb-15 lg:pb-0">
      <?php include __DIR__ . '/partials/header.php'; ?>
      <?php include __DIR__ . '/components/landing-content.php'; ?>
    </div>
  </div>

  <style>
    @media (min-width: 1024px) {
      .home-no-sidebar .js-desktop-sidebar-toggle {
        display: none;
      }

      .home-no-sidebar .js-header-logo-desktop {
        display: flex;
      }
    }
  </style>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>
</html>
