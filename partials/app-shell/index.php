<?php include __DIR__ . '/chat-fab.php'; ?>
<?php include __DIR__ . '/mobile-sidebar.php'; ?>
<?php if (shouldUseAppShell()): ?>
  <?php include __DIR__ . '/mobile-user-drawer.php'; ?>
<?php endif; ?>
<?php include __DIR__ . '/mobile-bottom-nav.php'; ?>

<!-- Overlays -->
<?php include __DIR__ . '/overlays.php'; ?>

<!-- Global templates -->
<?php include __DIR__ . '/templates.php'; ?>
