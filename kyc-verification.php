<?php require_once __DIR__ . '/includes/demo-auth.php'; ?>
<?php require_once __DIR__ . '/components/phone-input.php'; ?>
<?php require_once __DIR__ . '/components/form-control.php'; ?>
<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<body>
  <div id="app" class="flex min-h-screen overflow-hidden">
    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>

    <div class="page-content-area">
      <?php include __DIR__ . '/partials/header.php'; ?>

      <div class="page-body">
        <main class="page-main">
          <section class="mx-auto w-full max-w-[800px] rounded-xl border border-zinc-200 bg-card p-5 shadow-sm dark:border-zinc-800 sm:p-8 lg:p-10">
            <header class="text-center">
              <h1 class="text-2xl lg:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white sm:text-4xl">Верификация личности</h1>
              <p class="mt-3 text-sm lg:text-base text-zinc-500 dark:text-zinc-400 sm:text-lg">Загрузите документ и дополнительные фото для усиленной ручной проверки менеджером.</p>
            </header>

            <ol class="c-stepper mt-8" data-kyc-stepper>
              <li class="c-stepper__item" data-step-indicator="1"><span class="c-stepper__dot">1</span><span class="c-stepper__label">Личная информация</span><span class="c-stepper__line" data-step-line></span></li>
              <li class="c-stepper__item" data-step-indicator="2"><span class="c-stepper__dot">2</span><span class="c-stepper__label">Документ</span><span class="c-stepper__line" data-step-line></span></li>
              <li class="c-stepper__item" data-step-indicator="3"><span class="c-stepper__dot">3</span><span class="c-stepper__label">Фото</span><span class="c-stepper__line" data-step-line></span></li>
              <li class="c-stepper__item" data-step-indicator="4"><span class="c-stepper__dot">4</span><span class="c-stepper__label">Проверка</span></li>
            </ol>

            <form id="kycForm" class="mt-8 space-y-7" novalidate>
              <section data-kyc-step="1" class="space-y-6">
                <h2 class="text-xl lg:text-2xl font-bold text-zinc-900 dark:text-white">Этап 1: Личная информация</h2>

                <div class="grid gap-4 sm:grid-cols-2">
                  <div class="c-form-control">
                    <label class="c-form-label" for="firstName">Имя<span class="text-red-500">*</span></label>
                    <div class="c-form-control__input-wrap"><span class="c-form-control__icon-left"><i data-lucide="user" class="h-4 w-4"></i></span><input class="c-input pl-10" id="firstName" name="firstName" placeholder="Введите имя" autocomplete="given-name" required></div>
                    <p class="c-form-message hidden" data-error-for="firstName"></p>
                  </div>
                  <div class="c-form-control">
                    <label class="c-form-label" for="lastName">Фамилия<span class="text-red-500">*</span></label>
                    <div class="c-form-control__input-wrap"><span class="c-form-control__icon-left"><i data-lucide="users" class="h-4 w-4"></i></span><input class="c-input pl-10" id="lastName" name="lastName" placeholder="Введите фамилию" autocomplete="family-name" required></div>
                    <p class="c-form-message hidden" data-error-for="lastName"></p>
                  </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                  <div class="c-form-control">
                    <label class="c-form-label">Дата рождения<span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-3 gap-2" id="birthDateBlock">
                      <select class="c-select" id="birthMonth" name="birthMonth" required>
                        <option value="">Месяц</option>
                      </select>
                      <select class="c-select" id="birthDay" name="birthDay" required>
                        <option value="">День</option>
                      </select>
                      <select class="c-select" id="birthYear" name="birthYear" required>
                        <option value="">Год</option>
                      </select>
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
                    <option value="Молдова" data-flag="🇲🇩">Молдова</option>
                    <option value="Румыния" data-flag="🇷🇴">Румыния</option>
                    <option value="Украина" data-flag="🇺🇦">Украина</option>
                    <option value="Польша" data-flag="🇵🇱">Польша</option>
                    <option value="Германия" data-flag="🇩🇪">Германия</option>
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
                    <div class="c-form-control__input-wrap"><span class="c-form-control__icon-left"><i data-lucide="map-pin" class="h-4 w-4"></i></span><input class="c-input pl-10" id="address" name="address" placeholder="Улица, дом, квартира" autocomplete="street-address" required></div>
                    <p class="c-form-message hidden" data-error-for="address"></p>
                  </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <span></span>
                  <button type="button" class="btn-primary rounded-lg px-6 py-3 text-base font-bold" data-next-step="2">Далее</button>
                </div>
              </section>

              <section data-kyc-step="2" class="space-y-6 hidden">
                <h2 class="text-xl lg:text-2xl font-bold text-zinc-900 dark:text-white">Этап 2: Документ</h2>

                <div class="grid gap-4 sm:grid-cols-2">
                  <div class="c-form-control">
                    <label class="c-form-label" for="documentType">Тип документа<span class="text-red-500">*</span></label>
                    <select id="documentType" class="c-select" required>
                      <option value="">Выберите тип документа</option>
                      <option value="passport">Паспорт</option>
                      <option value="driver_license">Водительское удостоверение</option>
                      <option value="id_card">Национальное удостоверение личности</option>
                    </select>
                    <p class="c-form-message hidden" data-error-for="documentType"></p>
                  </div>

                  <div class="c-form-control">
                    <label class="c-form-label" for="documentNumber">Номер документа<span class="text-red-500">*</span></label>
                    <div class="c-form-control__input-wrap"><span class="c-form-control__icon-left"><i data-lucide="id-card" class="h-4 w-4"></i></span><input id="documentNumber" class="c-input pl-10" placeholder="Введите номер документа" required></div>
                    <p class="c-form-message hidden" data-error-for="documentNumber"></p>
                  </div>
                </div>

                <div class="space-y-4">
                  <div class="c-upload-card" data-upload-card="front">
                    <label class="c-upload-card__label" for="docFrontInput">
                      <p class="c-upload-card__title">Лицевая сторона<span class="text-red-500">*</span></p>
                      <p class="c-upload-card__hint">Перетащите файл сюда или нажмите для выбора</p>
                      <input id="docFrontInput" class="sr-only" type="file" accept="image/*">
                      <div class="hidden w-full max-w-xs rounded-lg border border-zinc-200 bg-white/80 p-2 dark:border-zinc-700 dark:bg-zinc-900/60" data-preview-wrap="front">
                        <img id="docFrontPreview" class="h-40 w-full rounded-lg object-contain bg-zinc-950/5 dark:bg-zinc-950/40" alt="Превью лицевой стороны документа">
                      </div>
                      <p class="hidden text-sm font-medium text-zinc-700 dark:text-zinc-200" data-file-name="front"></p>
                    </label>
                    <div class="mt-3 flex justify-center gap-2">
                      <button type="button" class="btn-secondary hidden px-3 py-1.5 text-sm" data-replace-upload="front">Заменить</button>
                      <button type="button" class="btn-secondary hidden px-3 py-1.5 text-sm" data-clear-upload="front">Сбросить</button>
                    </div>
                    <p class="c-form-message hidden" data-error-for="docFront"></p>
                  </div>

                  <div class="c-upload-card hidden" data-upload-card="back" id="docBackCard">
                    <label class="c-upload-card__label" for="docBackInput">
                      <p class="c-upload-card__title">Обратная сторона<span class="text-red-500">*</span></p>
                      <p class="c-upload-card__hint">Перетащите файл сюда или нажмите для выбора</p>
                      <input id="docBackInput" class="sr-only" type="file" accept="image/*">
                      <div class="hidden w-full max-w-xs rounded-lg border border-zinc-200 bg-white/80 p-2 dark:border-zinc-700 dark:bg-zinc-900/60" data-preview-wrap="back">
                        <img id="docBackPreview" class="h-40 w-full rounded-lg object-contain bg-zinc-950/5 dark:bg-zinc-950/40" alt="Превью обратной стороны документа">
                      </div>
                      <p class="hidden text-sm font-medium text-zinc-700 dark:text-zinc-200" data-file-name="back"></p>
                    </label>
                    <div class="mt-3 flex justify-center gap-2">
                      <button type="button" class="btn-secondary hidden px-3 py-1.5 text-sm" data-replace-upload="back">Заменить</button>
                      <button type="button" class="btn-secondary hidden px-3 py-1.5 text-sm" data-clear-upload="back">Сбросить</button>
                    </div>
                    <p class="c-form-message hidden" data-error-for="docBack"></p>
                  </div>
                </div>

                <div class="c-review-notice">
                  <p class="font-semibold">Критерии приёмки фото документа:</p>
                  <ul class="mt-2 list-disc space-y-1 pl-5 text-sm">
                    <li>Поддерживаются JPG/PNG/WEBP до 10MB.</li>
                    <li>Минимум 700×900 px (или выше), желательно без сильного сжатия.</li>
                    <li>Документ должен занимать значимую часть кадра, все 4 края должны быть видны.</li>
                    <li>Текст и фото на документе должны быть читаемыми, без бликов и смаза.</li>
                  </ul>
                </div>

                <div class="c-verification-status is-warning" data-doc-status>Статус: загрузите обязательные стороны документа.</div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <button type="button" class="btn-secondary px-6 py-3 text-base font-bold" data-prev-step="1">Назад</button>
                  <button type="button" class="btn-primary rounded-lg px-6 py-3 text-base font-bold" data-next-step="3">Далее</button>
                </div>
              </section>

              <section data-kyc-step="3" class="space-y-6 hidden">
                <h2 class="text-xl lg:text-2xl font-bold text-zinc-900 dark:text-white">Этап 3: Подтверждение личности (фото)</h2>
                <p class="c-field-hint">Сделайте два фото: фото лица и фото с документом в руках. Это помогает менеджеру провести ручную сверку.</p>

                <div class="grid gap-4 md:grid-cols-2">
                  <div class="c-upload-card" data-upload-card="selfie">
                    <label class="c-upload-card__label" for="selfieInput">
                      <p class="c-upload-card__title">Фото лица<span class="text-red-500">*</span></p>
                      <p class="c-upload-card__hint">Лицо должно быть по центру и хорошо освещено</p>
                      <input id="selfieInput" class="sr-only" type="file" accept="image/*">
                      <div class="hidden w-full max-w-xs rounded-lg border border-zinc-200 bg-white/80 p-2 dark:border-zinc-700 dark:bg-zinc-900/60" data-preview-wrap="selfie">
                        <img id="selfiePreview" class="h-44 w-full rounded-lg object-contain bg-zinc-950/5 dark:bg-zinc-950/40" alt="Превью фото пользователя">
                      </div>
                      <p class="hidden text-sm font-medium text-zinc-700 dark:text-zinc-200" data-file-name="selfie"></p>
                    </label>
                    <div class="mt-3 flex justify-center gap-2">
                      <button type="button" class="btn-secondary hidden px-3 py-1.5 text-sm" data-replace-upload="selfie">Заменить</button>
                      <button type="button" class="btn-secondary hidden px-3 py-1.5 text-sm" data-clear-upload="selfie">Сбросить</button>
                    </div>
                    <p class="c-form-message hidden" data-error-for="selfie"></p>
                  </div>

                  <div class="c-upload-card" data-upload-card="selfieWithDocument">
                    <label class="c-upload-card__label" for="selfieWithDocumentInput">
                      <p class="c-upload-card__title">Фото с документом<span class="text-red-500">*</span></p>
                      <p class="c-upload-card__hint">В кадре должны быть лицо и документ в руках</p>
                      <input id="selfieWithDocumentInput" class="sr-only" type="file" accept="image/*">
                      <div class="hidden w-full max-w-xs rounded-lg border border-zinc-200 bg-white/80 p-2 dark:border-zinc-700 dark:bg-zinc-900/60" data-preview-wrap="selfieWithDocument">
                        <img id="selfieWithDocumentPreview" class="h-44 w-full rounded-lg object-contain bg-zinc-950/5 dark:bg-zinc-950/40" alt="Превью фото с документом">
                      </div>
                      <p class="hidden text-sm font-medium text-zinc-700 dark:text-zinc-200" data-file-name="selfieWithDocument"></p>
                    </label>
                    <div class="mt-3 flex justify-center gap-2">
                      <button type="button" class="btn-secondary hidden px-3 py-1.5 text-sm" data-replace-upload="selfieWithDocument">Заменить</button>
                      <button type="button" class="btn-secondary hidden px-3 py-1.5 text-sm" data-clear-upload="selfieWithDocument">Сбросить</button>
                    </div>
                    <p class="c-form-message hidden" data-error-for="selfieWithDocument"></p>
                  </div>
                </div>

                <div class="c-verification-status is-warning" data-selfie-status>Статус: загрузите оба фото для ручной проверки.</div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <button type="button" class="btn-secondary px-6 py-3 text-base font-bold" data-prev-step="2">Назад</button>
                  <button type="button" class="btn-primary rounded-lg px-6 py-3 text-base font-bold" data-next-step="4">Далее</button>
                </div>
              </section>

              <section data-kyc-step="4" class="space-y-6 hidden">
                <h2 class="text-xl lg:text-2xl font-bold text-zinc-900 dark:text-white">Этап 4: Проверка и отправка</h2>

                <div class="space-y-4">
                  <div class="c-summary-list">
                    <h3>Личные данные</h3>
                    <dl id="summaryPersonal"></dl>
                  </div>
                  <div class="c-summary-list">
                    <h3>Документ и материалы</h3>
                    <dl id="summaryVerification"></dl>
                  </div>
                  <div class="c-review-notice" id="manualReviewNotice">Заявка будет отправлена менеджеру на ручную проверку.</div>
                </div>

                <div class="rounded-lg border border-primary-500/30 bg-primary-500/10 p-4 space-y-3">
                  <label class="flex cursor-pointer items-start gap-3"><input id="consent" type="checkbox" class="c-checkbox mt-0.5"><span>Я подтверждаю, что данные актуальны и фотографии принадлежат мне.</span></label>
                  <p class="c-form-message hidden" data-error-for="consent"></p>
                  <label class="flex cursor-pointer items-start gap-3"><input id="acceptTerms" type="checkbox" class="c-checkbox mt-0.5"><span>Я согласен на обработку персональных данных в рамках KYC.</span></label>
                  <p class="c-form-message hidden" data-error-for="acceptTerms"></p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <button type="button" class="btn-secondary px-6 py-3 text-base font-bold" data-prev-step="3">Назад</button>
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