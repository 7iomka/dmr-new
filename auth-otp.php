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
      <div class="page-body">
        <main class="page-main flex items-center justify-center">
          <section class="auth-shell">
            <div class="auth-shell-glow"></div>

            <form method="post" class="auth-card">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <div class="auth-card-icon">
                  <i data-lucide="shield-check" class="h-6 w-6"></i>
                </div>
                <h1 class="auth-title">Введите код подтверждения</h1>
                <p class="auth-subtitle">Код отправлен на <?= htmlspecialchars($channelLabel, ENT_QUOTES, 'UTF-8') ?>: <?= htmlspecialchars($target, ENT_QUOTES, 'UTF-8') ?>.</p>
              </div>

              <div class="otp-boxes relative z-10" data-otp-boxes>
                <?php for ($i = 0; $i < 6; $i++): ?>
                  <input
                    type="text"
                    inputmode="numeric"
                    pattern="[0-9]*"
                    autocomplete="one-time-code"
                    maxlength="1"
                    name="otp<?= $i ?>"
                    class="otp-box"
                    data-otp-input
                    aria-label="Символ кода <?= $i + 1 ?>"
                  >
                <?php endfor; ?>
              </div>

              <div class="relative z-10 text-xs text-zinc-500 dark:text-zinc-400">Код действителен 02:00</div>

              <div class="auth-actions">
                <button type="submit" class="btn-primary rounded-lg px-4 py-3 text-sm font-bold">Подтвердить</button>
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
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const otpInputs = [...document.querySelectorAll('[data-otp-input]')];
      if (!otpInputs.length) return;

      otpInputs[0].focus();

      otpInputs.forEach((input, index) => {
        const syncFilledState = () => {
          input.dataset.filled = input.value ? 'true' : 'false';
        };

        syncFilledState();

        input.addEventListener('input', (event) => {
          const value = (event.target.value || '').replace(/\D/g, '').slice(-1);
          event.target.value = value;
          syncFilledState();

          if (value && index < otpInputs.length - 1) {
            otpInputs[index + 1].focus();
          }
        });

        input.addEventListener('keydown', (event) => {
          if (event.key === 'Backspace' && !input.value && index > 0) {
            otpInputs[index - 1].focus();
          }

          if (event.key === 'ArrowLeft' && index > 0) {
            event.preventDefault();
            otpInputs[index - 1].focus();
          }

          if (event.key === 'ArrowRight' && index < otpInputs.length - 1) {
            event.preventDefault();
            otpInputs[index + 1].focus();
          }
        });

        input.addEventListener('paste', (event) => {
          event.preventDefault();
          const pasted = (event.clipboardData?.getData('text') ?? '').replace(/\D/g, '').slice(0, otpInputs.length);
          if (!pasted) return;

          pasted.split('').forEach((char, offset) => {
            const target = otpInputs[index + offset];
            if (target) {
              target.value = char;
              target.dataset.filled = 'true';
            }
          });

          const nextIndex = Math.min(index + pasted.length, otpInputs.length - 1);
          otpInputs[nextIndex].focus();
        });
      });
    });
  </script>
</body>

</html>
