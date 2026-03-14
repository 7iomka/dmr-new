<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php require_once __DIR__ . '/components/phone-input.php'; ?>
<?php require_once __DIR__ . '/components/form-control.php'; ?>
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
          <section class="mx-auto w-full max-w-[900px] rounded-xl border border-zinc-200 dark:border-zinc-800 bg-card shadow-sm p-5 sm:p-8 lg:p-10">
            <header class="text-center">
              <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 dark:text-white">Верификация личности</h1>
              <p class="mt-3 text-base sm:text-lg text-zinc-500 dark:text-zinc-400">Поток KYC с проверкой документа, live-liveness и risk-based decisioning.</p>
            </header>

            <ol class="c-stepper mt-8" data-kyc-stepper>
              <li class="c-stepper__item" data-step-indicator="1"><span class="c-stepper__dot">1</span><span class="c-stepper__label">Личные данные</span><span class="c-stepper__line" data-step-line></span></li>
              <li class="c-stepper__item" data-step-indicator="2"><span class="c-stepper__dot">2</span><span class="c-stepper__label">Документ</span><span class="c-stepper__line" data-step-line></span></li>
              <li class="c-stepper__item" data-step-indicator="3"><span class="c-stepper__dot">3</span><span class="c-stepper__label">Face & Liveness</span><span class="c-stepper__line" data-step-line></span></li>
              <li class="c-stepper__item" data-step-indicator="4"><span class="c-stepper__dot">4</span><span class="c-stepper__label">Проверка</span></li>
            </ol>

            <form class="mt-8 space-y-7" id="kycForm" novalidate>
              <section data-kyc-step="1" class="space-y-6">
                <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Этап 1: Личная информация</h2>

                <div class="grid gap-4 sm:grid-cols-2">
                  <div class="c-form-control">
                    <label class="c-form-label" for="firstName">Имя<span class="text-red-500">*</span></label>
                    <div class="c-form-control__input-wrap"><span class="c-form-control__icon-left"><i data-lucide="user" class="h-4 w-4"></i></span><input class="c-input pl-10" id="firstName" name="firstName" autocomplete="given-name" placeholder="Введите имя" required></div>
                    <p class="c-form-message hidden" data-error-for="firstName"></p>
                  </div>
                  <div class="c-form-control">
                    <label class="c-form-label" for="lastName">Фамилия<span class="text-red-500">*</span></label>
                    <div class="c-form-control__input-wrap"><span class="c-form-control__icon-left"><i data-lucide="users" class="h-4 w-4"></i></span><input class="c-input pl-10" id="lastName" name="lastName" autocomplete="family-name" placeholder="Введите фамилию" required></div>
                    <p class="c-form-message hidden" data-error-for="lastName"></p>
                  </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                  <div class="c-form-control">
                    <label class="c-form-label">Дата рождения<span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-3 gap-2" id="birthDateBlock">
                      <select class="c-select" id="birthMonth" name="birthMonth" required><option value="">Месяц</option></select>
                      <select class="c-select" id="birthDay" name="birthDay" required><option value="">День</option></select>
                      <select class="c-select" id="birthYear" name="birthYear" required><option value="">Год</option></select>
                    </div>
                    <p class="c-form-message hidden" data-error-for="birthDate"></p>
                  </div>

                  <div class="c-form-control">
                    <label class="c-form-label" for="phone">Номер телефона<span class="text-red-500">*</span></label>
                    <?= renderPhoneInput([
                      'id' => 'phone',
                      'name' => 'phone',
                      'hidden_name' => 'phone_country_code',
                      'required' => true,
                      'placeholder' => '(000) 000-00-00',
                    ]) ?>
                    <p class="c-form-message hidden" data-error-for="phone"></p>
                  </div>
                </div>

                <?= renderFormControl([
                  'id' => 'email',
                  'label' => 'Электронная почта',
                  'required' => true,
                  'control_html' => '<div class="c-form-control__input-wrap"><span class="c-form-control__icon-left"><i data-lucide="mail" class="h-4 w-4"></i></span><input class="c-input pl-10" id="email" name="email" type="email" autocomplete="email" placeholder="name@example.com" required></div>',
                  'error_data_for' => 'email',
                  'error_text' => '',
                ]) ?>

                <div class="c-form-control">
                  <label class="c-form-label" for="country">Страна<span class="text-red-500">*</span></label>
                  <select class="c-select" id="country" name="country" required>
                    <option value="">Выберите страну</option>
                    <option value="Молдова">Молдова</option>
                    <option value="Румыния">Румыния</option>
                    <option value="Украина">Украина</option>
                    <option value="Германия">Германия</option>
                  </select>
                  <p class="c-form-message hidden" data-error-for="country"></p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                  <div class="c-form-control">
                    <label class="c-form-label" for="city">Город<span class="text-red-500">*</span></label>
                    <div class="c-form-control__input-wrap"><span class="c-form-control__icon-left"><i data-lucide="building-2" class="h-4 w-4"></i></span><input class="c-input pl-10" id="city" name="city" placeholder="Введите город" required></div>
                    <p class="c-form-message hidden" data-error-for="city"></p>
                  </div>

                  <div class="c-form-control">
                    <label class="c-form-label" for="address">Адрес<span class="text-red-500">*</span></label>
                    <div class="c-form-control__input-wrap"><span class="c-form-control__icon-left"><i data-lucide="map-pin" class="h-4 w-4"></i></span><input class="c-input pl-10" id="address" name="address" autocomplete="street-address" placeholder="Улица, дом, квартира" required></div>
                    <p class="c-form-message hidden" data-error-for="address"></p>
                  </div>
                </div>

                <button type="button" class="btn-primary w-full rounded-lg px-6 py-3 text-base font-bold" data-action="next-step-1">Далее: документ</button>
              </section>

              <section data-kyc-step="2" class="space-y-6 hidden">
                <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Этап 2: Document verification</h2>
                <p class="c-field-hint">Загрузите чёткие изображения документа, где видны все края. Затем запустится quality-check, OCR и поиск лица на документе.</p>

                <div class="c-form-control">
                  <label class="c-form-label" for="documentType">Тип документа<span class="text-red-500">*</span></label>
                  <select class="c-select" id="documentType" name="documentType" required>
                    <option value="">Выберите тип документа</option>
                    <option value="Паспорт">Паспорт</option>
                    <option value="Водительское удостоверение">Водительское удостоверение</option>
                    <option value="Национальное удостоверение личности">Национальное удостоверение личности</option>
                  </select>
                  <p class="c-form-message hidden" data-error-for="documentType"></p>
                </div>

                <div class="c-form-control">
                  <label class="c-form-label" for="documentNumber">Номер документа<span class="text-red-500">*</span></label>
                  <div class="c-form-control__input-wrap"><span class="c-form-control__icon-left"><i data-lucide="badge-check" class="h-4 w-4"></i></span><input class="c-input pl-10" id="documentNumber" name="documentNumber" placeholder="Введите номер документа" required></div>
                  <p class="c-form-message hidden" data-error-for="documentNumber"></p>
                </div>

                <div class="grid gap-4 md:grid-cols-2" id="uploadGrid">
                  <div class="c-upload-card" data-upload-card="front">
                    <label class="c-upload-card__label" for="docFront">
                      <i data-lucide="upload" class="h-9 w-9 text-primary-600 dark:text-primary-400"></i>
                      <span class="c-upload-card__title">Лицевая сторона</span>
                      <span class="c-upload-card__hint">Нажмите для выбора или перетащите файл</span>
                    </label>
                    <input id="docFront" name="docFront" type="file" class="sr-only" accept="image/*,.pdf">
                    <div class="mt-3 hidden" data-file-preview-wrap="front"><img src="" alt="Предпросмотр лицевой стороны" class="h-28 w-full rounded-lg border border-primary-500/30 object-cover" data-file-preview="front"></div>
                    <div class="mt-2 hidden items-center justify-center gap-3 text-xs" data-file-actions="front">
                      <button type="button" class="font-semibold text-primary-700 dark:text-primary-300" data-file-replace="front">Заменить</button>
                      <button type="button" class="font-semibold text-red-600 dark:text-red-400" data-file-remove="front">Удалить</button>
                    </div>
                    <p class="c-form-message hidden" data-error-for="docFront"></p>
                  </div>

                  <div class="c-upload-card hidden" data-upload-card="back">
                    <label class="c-upload-card__label" for="docBack">
                      <i data-lucide="upload" class="h-9 w-9 text-primary-600 dark:text-primary-400"></i>
                      <span class="c-upload-card__title">Обратная сторона</span>
                      <span class="c-upload-card__hint">Нажмите для выбора или перетащите файл</span>
                    </label>
                    <input id="docBack" name="docBack" type="file" class="sr-only" accept="image/*,.pdf">
                    <div class="mt-3 hidden" data-file-preview-wrap="back"><img src="" alt="Предпросмотр обратной стороны" class="h-28 w-full rounded-lg border border-primary-500/30 object-cover" data-file-preview="back"></div>
                    <div class="mt-2 hidden items-center justify-center gap-3 text-xs" data-file-actions="back">
                      <button type="button" class="font-semibold text-primary-700 dark:text-primary-300" data-file-replace="back">Заменить</button>
                      <button type="button" class="font-semibold text-red-600 dark:text-red-400" data-file-remove="back">Удалить</button>
                    </div>
                    <p class="c-form-message hidden" data-error-for="docBack"></p>
                  </div>
                </div>

                <div id="faceStatusMessage" class="c-verification-status is-warning">Ожидается запуск проверки документа.</div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <button type="button" class="btn-secondary px-6 py-3 text-base font-bold" data-prev-step="1" data-prev-step-btn>Назад</button>
                  <button type="button" class="btn-primary rounded-lg px-6 py-3 text-base font-bold" data-action="verify-document">Проверить документ</button>
                </div>
              </section>

              <section data-kyc-step="3" class="space-y-6 hidden">
                <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Этап 3: Face verification + Liveness</h2>
                <p class="c-field-hint">Для защиты от подмены фото необходимо пройти challenge (прямой взгляд, повороты головы, моргание).</p>

                <div class="grid gap-4 lg:grid-cols-2">
                  <div class="rounded-lg border border-zinc-200 dark:border-zinc-700 p-3 bg-zinc-50/60 dark:bg-zinc-900/40">
                    <video id="livenessVideo" class="aspect-video w-full rounded-lg bg-zinc-950/80" autoplay muted playsinline></video>
                    <div class="mt-3 flex gap-2">
                      <button id="startFaceVerificationBtn" type="button" class="btn-primary rounded-lg px-4 py-2 text-sm font-semibold">Запустить проверку</button>
                      <button id="retryFaceVerificationBtn" type="button" class="btn-secondary px-4 py-2 text-sm font-semibold">Повторить</button>
                    </div>
                  </div>
                  <div class="space-y-4">
                    <div class="rounded-lg border border-zinc-200 dark:border-zinc-700 p-3 bg-zinc-50/60 dark:bg-zinc-900/40">
                      <p class="text-sm font-semibold mb-2">Лицо из документа</p>
                      <img id="documentFacePreview" class="hidden h-36 w-full rounded-lg object-cover" alt="Лицо из документа">
                    </div>
                    <div class="rounded-lg border border-zinc-200 dark:border-zinc-700 p-3 bg-zinc-50/60 dark:bg-zinc-900/40">
                      <p class="text-sm font-semibold mb-2">Live selfie</p>
                      <img id="selfiePreview" class="hidden h-36 w-full rounded-lg object-cover" alt="Selfie">
                    </div>
                  </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <button type="button" class="btn-secondary px-6 py-3 text-base font-bold" data-prev-step="2" data-prev-step>Назад</button>
                  <button id="proceedToReviewBtn" type="button" class="btn-primary rounded-lg px-6 py-3 text-base font-bold" disabled>Далее: Review</button>
                </div>
              </section>

              <section data-kyc-step="4" class="space-y-6 hidden">
                <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Этап 4: Review и решение</h2>

                <div class="space-y-4">
                  <div class="c-summary-list">
                    <h3>Личные данные</h3>
                    <dl id="summaryPersonal"></dl>
                  </div>

                  <div class="c-summary-list">
                    <h3>Документ и проверка</h3>
                    <dl id="summaryDocument"></dl>
                  </div>

                  <div class="c-review-notice" id="verificationNotice">Проверьте итог перед отправкой.</div>
                  <div id="finalDecisionBadge" class="c-verification-status is-warning">Решение ещё не вычислено.</div>

                  <div class="c-summary-list">
                    <h3>Risk flags</h3>
                    <ul id="riskFlags" class="list-disc pl-6 text-sm text-zinc-700 dark:text-zinc-200"></ul>
                  </div>
                </div>

                <div class="rounded-lg border border-primary-500/30 bg-primary-500/10 p-4 space-y-3">
                  <label class="flex items-start gap-3 cursor-pointer"><input id="consentAccuracy" type="checkbox" class="c-checkbox mt-0.5"><span>Я подтверждаю, что все данные точные и актуальные.</span></label>
                  <p class="c-form-message hidden" data-error-for="consentAccuracy"></p>
                  <label class="flex items-start gap-3 cursor-pointer"><input id="consentData" type="checkbox" class="c-checkbox mt-0.5"><span>Я согласен на обработку персональных данных в рамках KYC.</span></label>
                  <p class="c-form-message hidden" data-error-for="consentData"></p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <button type="button" class="btn-secondary px-6 py-3 text-base font-bold" data-prev-step="3" data-prev-step>Назад</button>
                  <button id="submitKycBtn" type="submit" class="btn-primary rounded-lg px-6 py-3 text-base font-bold" disabled>Отправить KYC</button>
                </div>
              </section>
            </form>
          </section>
        </main>

        <?php include __DIR__ . '/partials/footer.php'; ?>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
  <?= renderPhoneInputScript(); ?>
  <script type="module" src="js/kyc/app.js"></script>
</body>

</html>
