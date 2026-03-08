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
        <main class="page-main flex items-center justify-center">
          <section class="auth-shell">
            <div class="auth-shell-glow"></div>
            <div class="auth-card-icon-wrap">
              <div class="auth-card-icon">
                <i data-lucide="life-buoy" class="h-8 w-8"></i>
              </div>
            </div>

            <div class="auth-card">
              <div class="auth-card-dot auth-card-dot-1"></div>
              <div class="auth-card-dot auth-card-dot-2"></div>

              <div class="auth-head">
                <h1 class="auth-title">Выберите способ восстановления</h1>
                <p class="auth-subtitle">Отправим код подтверждения удобным способом.</p>
              </div>

              <div class="auth-method-list">
                <a href="auth-forgot-email.php" class="group auth-method-btn auth-method-btn-primary">
                  <div class="auth-method-row">
                    <div class="auth-method-left"><span class="auth-method-icon"><i data-lucide="mail" class="h-5 w-5"></i></span><div><p class="auth-method-title">Email OTP</p><p class="auth-method-desc">Код на почту</p></div></div>
                    <i data-lucide="chevron-right" class="auth-method-arrow"></i>
                  </div>
                </a>
                <a href="auth-forgot-telegram.php" class="group auth-method-btn">
                  <div class="auth-method-row">
                    <div class="auth-method-left"><span class="auth-method-icon"><i data-lucide="send" class="h-5 w-5"></i></span><div><p class="auth-method-title">Telegram OTP</p><p class="auth-method-desc">Код через Telegram</p></div></div>
                    <i data-lucide="chevron-right" class="auth-method-arrow"></i>
                  </div>
                </a>
                <a href="auth-forgot-whatsapp.php" class="group auth-method-btn">
                  <div class="auth-method-row">
                    <div class="auth-method-left"><span class="auth-method-icon"><i data-lucide="message-circle" class="h-5 w-5"></i></span><div><p class="auth-method-title">WhatsApp OTP</p><p class="auth-method-desc">Код через WhatsApp</p></div></div>
                    <i data-lucide="chevron-right" class="auth-method-arrow"></i>
                  </div>
                </a>
              </div>

              <div class="auth-divider auth-footer justify-start">
                <span class="auth-muted">Помните пароль? <a href="auth-login.php" class="auth-link">Вернуться ко входу</a></span>
              </div>
            </div>
          </section>
        </main>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
