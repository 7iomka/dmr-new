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
        <main class="page-main flex items-center justify-center">
          <section class="flex flex-col gap-6 items-center justify-center text-center">
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white text-left">Условия использования</h1>

            <div class="card-simple w-full max-w-4xl">
              <p class="text-center text-base md:text-lg leading-relaxed text-zinc-700 dark:text-zinc-200">
                Наши <a href="#" class="text-primary-500 hover:text-primary-400 hover:underline font-semibold">Условия использования</a> были обновлены. Пожалуйста, ознакомьтесь и подтвердите их снова, чтобы продолжить использование наших услуг.
              </p>

              <form id="termsAcceptanceForm" class="mt-8 lg:mt-10 flex flex-col items-center gap-7" action="#" method="post">
                <label for="termsAcceptanceCheckbox" class="w-full flex items-start md:items-center justify-center gap-3 text-zinc-700 dark:text-zinc-200 text-sm cursor-pointer select-none">
                  <input id="termsAcceptanceCheckbox" name="termsAccepted" type="checkbox" class="c-checkbox mt-0.5 md:mt-0" />
                  <span>Нажимая это, вы подтверждаете, что прочитали и согласны с нашими Условиями использования</span>
                </label>

                <button id="termsAcceptanceSubmit" type="submit" disabled class="btn-primary w-full max-w-md">
                  <i data-lucide="check" class="h-4 w-4" aria-hidden="true"></i>
                  <span>Подтвердить и продолжить</span>
                </button>
              </form>
            </div>
          </section>
        </main>

        <?php include __DIR__ . '/partials/footer.php'; ?>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>

  <script>
    (function() {
      const checkbox = document.getElementById('termsAcceptanceCheckbox');
      const submitButton = document.getElementById('termsAcceptanceSubmit');

      if (!checkbox || !submitButton) {
        return;
      }

      const syncButtonState = () => {
        submitButton.disabled = !checkbox.checked;
      };

      checkbox.addEventListener('change', syncButtonState);
      syncButtonState();
    })();
  </script>
</body>

</html>