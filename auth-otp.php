<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php
$purpose = (string) ($_GET['purpose'] ?? 'login');
$channel = (string) ($_GET['channel'] ?? 'email');
$target = (string) ($_GET['target'] ?? '');
$back = (string) ($_GET['back'] ?? 'auth-login.php');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    demoLogin('dashboard.php');
}

$channelLabelMap = [
    'email' => 'Email',
    'telegram' => 'Telegram',
    'whatsapp' => 'WhatsApp',
];
$channelLabel = $channelLabelMap[$channel] ?? 'канал';
?>
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
          <section class="auth-shell">
            <div class="auth-shell-glow"></div>
            <div class="auth-card-icon-wrap">
              <div class="auth-card-icon">
                <i data-lucide="shield-check" class="h-8 w-8"></i>
              </div>
            </div>

            <form method="post" class="auth-card">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <h1 class="auth-title">Введите код подтверждения</h1>
                <p class="auth-subtitle">Код отправлен через <?= htmlspecialchars($channelLabel, ENT_QUOTES, 'UTF-8') ?>: <?= htmlspecialchars($target, ENT_QUOTES, 'UTF-8') ?>.</p>
              </div>

              <div class="grid grid-cols-6 gap-2 relative z-10">
                <?php for ($i = 0; $i < 6; $i++): ?>
                  <input type="text" maxlength="1" name="otp<?= $i ?>" class="auth-input h-12 px-0 text-center font-semibold">
                <?php endfor; ?>
              </div>

              <div class="relative z-10 text-xs text-zinc-500 dark:text-zinc-400">Код действителен 02:00</div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary rounded-xl px-4 py-3 text-sm font-bold">Подтвердить</button>
                <a href="<?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? 'auth-otp.php', ENT_QUOTES, 'UTF-8') ?>" class="auth-secondary-btn">Повторно отправить</a>
              </div>

              <div class="auth-divider auth-footer justify-start">
                <a href="<?= htmlspecialchars($back, ENT_QUOTES, 'UTF-8') ?>" class="auth-link">Использовать другой способ</a>
              </div>

              <input type="hidden" name="purpose" value="<?= htmlspecialchars($purpose, ENT_QUOTES, 'UTF-8') ?>">
            </form>
          </section>
        </main>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
