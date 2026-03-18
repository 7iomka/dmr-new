<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">

    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>
    <div class="page-content-area">
      <?php include __DIR__ . '/partials/header.php'; ?>
      <div class="page-body">
        <!-- Main View -->
        <main class="page-main">
          <div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white text-left">
              Профиль</h1>
          </div>
          <!-- Profile Header -->
          <div class="card-simple flex flex-col md:flex-row items-center md:items-start gap-6">
            <div class="relative">
              <div
                class="w-24 h-24 rounded-2xl bg-gradient-to-br from-primary to-primary-500 flex items-center justify-center text-white text-3xl font-bold shadow-lg shadow-primary-500/20">
                DW</div>
              <div
                class="absolute -bottom-2 -right-2 p-1.5 rounded-lg border-4 bg-primary text-white shadow-xl border-white dark:border-[#14171A]">
                <i data-lucide="shield-check" class="w-4 h-4"></i>
              </div>
            </div>
            <div class="flex-1 text-center md:text-left">
              <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 mb-4">
                <h1 class="text-2xl font-bold tracking-tight text-zinc-900 dark:text-white">Dorin Watsap
                </h1>
                <span
                  class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-primary/10 text-primary uppercase tracking-wider border border-primary/20 self-center">Активный</span>
              </div>
              <div class="flex flex-wrap justify-center md:justify-start gap-3">
                <button
                  class="col-span-2 btn-primary">
                  <i data-lucide="settings" class="w-4 h-4"></i>
                  <span>Редактировать профиль</span>
                </button>
                <a href="kyc-verification.php"
                  class="btn-secondary">
                  <i data-lucide="shield-check" class="w-4 h-4 text-primary"></i>
                  <span>Редактировать KYC</span>
                </a>
              </div>
            </div>
          </div>
          <!-- Personal Info -->
          <div class="card">
            <div class="card-header">
              <h3 class="text-sm font-bold uppercase tracking-wide text-zinc-900 dark:text-white">
                Персональные данные</h3>
            </div>
            <div class="card-body">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div>
                  <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">
                    Полное имя</p>
                  <p class="text-sm font-bold tracking-tight">Dorin Watsap</p>
                </div>
                <div>
                  <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">
                    E-mail</p>
                  <p class="text-sm font-bold tracking-tight">lawyer1@awsarhitect.me</p>
                </div>
                <div>
                  <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">
                    Телефон</p>
                  <p class="text-sm font-bold tracking-tight">+37369586275</p>
                </div>
                <div>
                  <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">
                    День рождения</p>
                  <p class="text-sm font-bold tracking-tight">02.07.2001</p>
                </div>
                <div>
                  <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">
                    Верификация</p>
                  <div class="flex items-center space-x-1.5">
                    <i data-lucide="check-circle-2" class="text-primary w-3.5 h-3.5"></i>
                    <span class="text-sm font-bold text-primary">Верифицирован</span>
                  </div>
                </div>
                <div>
                  <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mb-1 opacity-70">
                    Дата создания</p>
                  <p class="text-sm font-bold tracking-tight">08.12.2025 20:34</p>
                </div>
              </div>
            </div>
          </div>
        </main>
        <?php include __DIR__ . '/partials/footer.php'; ?>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>