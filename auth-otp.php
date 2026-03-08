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
          <form method="post" class="w-full max-w-xl rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-card p-6 sm:p-8 space-y-6">
            <div class="space-y-1">
              <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Введите код подтверждения</h1>
              <p class="text-sm text-zinc-500">Код отправлен через <?= htmlspecialchars($channelLabel, ENT_QUOTES, 'UTF-8') ?>: <?= htmlspecialchars($target, ENT_QUOTES, 'UTF-8') ?>.</p>
            </div>

            <div class="grid grid-cols-6 gap-2">
              <?php for ($i = 0; $i < 6; $i++): ?>
                <input type="text" maxlength="1" name="otp<?= $i ?>" class="h-12 text-center rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-950/40 text-zinc-900 dark:text-white font-semibold focus:outline-none focus:border-primary-500">
              <?php endfor; ?>
            </div>

            <div class="text-xs text-zinc-500">Код действителен 02:00</div>

            <div class="flex flex-col sm:flex-row gap-3">
              <button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm font-bold">Подтвердить</button>
              <a href="<?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? 'auth-otp.php', ENT_QUOTES, 'UTF-8') ?>" class="inline-flex items-center justify-center rounded-lg px-4 py-3 text-sm font-semibold border border-zinc-200 dark:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-800/50">Повторно отправить</a>
            </div>

            <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800">
              <a href="<?= htmlspecialchars($back, ENT_QUOTES, 'UTF-8') ?>" class="text-sm text-primary hover:text-primary-700">Использовать другой способ</a>
            </div>

            <input type="hidden" name="purpose" value="<?= htmlspecialchars($purpose, ENT_QUOTES, 'UTF-8') ?>">
          </form>
        </main>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
