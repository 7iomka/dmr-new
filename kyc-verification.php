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
          <section class="mx-auto w-full max-w-[800px] rounded-xl border border-zinc-200 dark:border-zinc-800 bg-card shadow-sm p-5 sm:p-8 lg:p-10">
            <header class="text-center">
              <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 dark:text-white">Верификация личности</h1>
              <p class="mt-3 text-base sm:text-lg text-zinc-500 dark:text-zinc-400">Завершите верификацию KYC, чтобы разблокировать все функции платформы</p>
            </header>

            <ol class="mt-8 grid grid-cols-3 items-start gap-4" data-kyc-stepper>
              <li class="relative text-center" data-step-indicator="1">
                <div class="mx-auto flex h-11 w-11 items-center justify-center rounded-full border text-lg font-semibold transition-colors">1</div>
                <div class="mt-2 text-sm sm:text-base font-medium">Личная информация</div>
                <span class="pointer-events-none absolute top-5 left-[calc(50%+2rem)] hidden h-0.5 w-[calc(100%-3rem)] bg-zinc-200 dark:bg-zinc-700 md:block" data-step-line></span>
              </li>
              <li class="relative text-center" data-step-indicator="2">
                <div class="mx-auto flex h-11 w-11 items-center justify-center rounded-full border text-lg font-semibold transition-colors">2</div>
                <div class="mt-2 text-sm sm:text-base font-medium">Документ</div>
                <span class="pointer-events-none absolute top-5 left-[calc(50%+2rem)] hidden h-0.5 w-[calc(100%-3rem)] bg-zinc-200 dark:bg-zinc-700 md:block" data-step-line></span>
              </li>
              <li class="relative text-center" data-step-indicator="3">
                <div class="mx-auto flex h-11 w-11 items-center justify-center rounded-full border text-lg font-semibold transition-colors">3</div>
                <div class="mt-2 text-sm sm:text-base font-medium">Проверка</div>
              </li>
            </ol>

            <form class="mt-10" id="kycForm" novalidate>
              <section data-kyc-step="1" class="space-y-6">
                <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Личная информация</h2>

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
                    <option value="Молдова">Молдова</option>
                    <option value="Румыния">Румыния</option>
                    <option value="Украина">Украина</option>
                    <option value="Германия">Германия</option>
                  </select>
                  <p class="c-form-message hidden" data-error-for="country"></p>
                </div>

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

                <button type="button" class="btn-primary w-full rounded-lg px-6 py-3 text-base font-bold disabled:bg-zinc-500 disabled:text-zinc-300 disabled:dark:bg-zinc-700 disabled:dark:text-zinc-500 disabled:shadow-none disabled:pointer-events-none" data-next-step>Далее</button>
              </section>

              <section data-kyc-step="2" class="space-y-6 hidden">
                <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Загрузите документ, удостоверяющий личность</h2>

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
                  <div class="rounded-lg border-2 border-dashed border-zinc-300 dark:border-zinc-700 bg-zinc-50/80 dark:bg-zinc-900/40 p-5 transition-colors" data-upload-card="front">
                    <label class="flex cursor-pointer flex-col items-center justify-center gap-2 text-center" for="docFront">
                      <i data-lucide="upload" class="h-11 w-11 text-primary-600 dark:text-primary-400"></i>
                      <span class="text-2xl font-bold text-zinc-800 dark:text-zinc-100">Загрузить лицевую сторону</span>
                      <span class="text-sm text-zinc-500 dark:text-zinc-400">Нажмите для выбора или перетащите файл</span>
                    </label>
                    <input id="docFront" name="docFront" type="file" class="sr-only" accept="image/*,.pdf">
                    <div class="mt-3 hidden" data-file-preview-wrap="front">
                      <img src="" alt="Предпросмотр лицевой стороны" class="h-28 w-full rounded-lg border border-primary-500/30 object-cover" data-file-preview="front">
                    </div>
                    <div class="mt-2 hidden items-center justify-center gap-3 text-xs" data-file-actions="front">
                      <button type="button" class="font-semibold text-primary-700 dark:text-primary-300 hover:text-primary-800 dark:hover:text-primary-200" data-file-replace="front">Заменить</button>
                      <button type="button" class="font-semibold text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300" data-file-remove="front">Удалить</button>
                    </div>
                    <p class="c-form-message hidden" data-error-for="docFront"></p>
                  </div>

                  <div class="rounded-lg border-2 border-dashed border-zinc-300 dark:border-zinc-700 bg-zinc-50/80 dark:bg-zinc-900/40 p-5 transition-colors hidden" data-upload-card="back">
                    <label class="flex cursor-pointer flex-col items-center justify-center gap-2 text-center" for="docBack">
                      <i data-lucide="upload" class="h-11 w-11 text-primary-600 dark:text-primary-400"></i>
                      <span class="text-2xl font-bold text-zinc-800 dark:text-zinc-100">Загрузить обратную сторону</span>
                      <span class="text-sm text-zinc-500 dark:text-zinc-400">Нажмите для выбора или перетащите файл</span>
                    </label>
                    <input id="docBack" name="docBack" type="file" class="sr-only" accept="image/*,.pdf">
                    <div class="mt-3 hidden" data-file-preview-wrap="back">
                      <img src="" alt="Предпросмотр обратной стороны" class="h-28 w-full rounded-lg border border-primary-500/30 object-cover" data-file-preview="back">
                    </div>
                    <div class="mt-2 hidden items-center justify-center gap-3 text-xs" data-file-actions="back">
                      <button type="button" class="font-semibold text-primary-700 dark:text-primary-300 hover:text-primary-800 dark:hover:text-primary-200" data-file-replace="back">Заменить</button>
                      <button type="button" class="font-semibold text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300" data-file-remove="back">Удалить</button>
                    </div>
                    <p class="c-form-message hidden" data-error-for="docBack"></p>
                  </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <button type="button" class="w-full rounded-lg border border-primary-500 text-primary-600 dark:text-primary-400 font-bold px-6 py-3 hover:bg-primary-500/10 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/35" data-prev-step>Назад</button>
                  <button type="button" class="btn-primary w-full rounded-lg px-6 py-3 text-base font-bold disabled:bg-zinc-500 disabled:text-zinc-300 disabled:dark:bg-zinc-700 disabled:dark:text-zinc-500 disabled:shadow-none disabled:pointer-events-none" data-next-step>Далее</button>
                </div>
              </section>

              <section data-kyc-step="3" class="space-y-6 hidden">
                <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">Проверьте вашу информацию</h2>

                <div class="space-y-4">
                  <div class="rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50/70 dark:bg-zinc-800/50 p-4">
                    <h3 class="text-xl font-bold text-zinc-800 dark:text-zinc-100">Личная информация</h3>
                    <dl class="mt-4 space-y-2" id="summaryPersonal"></dl>
                  </div>

                  <div class="rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50/70 dark:bg-zinc-800/50 p-4">
                    <h3 class="text-xl font-bold text-zinc-800 dark:text-zinc-100">Информация о документе</h3>
                    <dl class="mt-4 space-y-2" id="summaryDocument"></dl>
                  </div>
                </div>

                <div class="rounded-lg border border-primary-500/30 bg-primary-500/10 p-4 space-y-3">
                  <label class="flex items-start gap-3 text-zinc-800 dark:text-zinc-100 cursor-pointer">
                    <input id="consentAccuracy" type="checkbox" class="c-checkbox mt-0.5">
                    <span>Я подтверждаю, что все предоставленные данные являются точными и актуальными.</span>
                  </label>
                  <p class="c-form-message hidden" data-error-for="consentAccuracy"></p>

                  <label class="flex items-start gap-3 text-zinc-800 dark:text-zinc-100 cursor-pointer">
                    <input id="consentData" type="checkbox" class="c-checkbox mt-0.5">
                    <span>Я соглашаюсь на обработку моих персональных данных в рамках процедуры KYC.</span>
                  </label>
                  <p class="c-form-message hidden" data-error-for="consentData"></p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                  <button type="button" class="w-full rounded-lg border border-primary-500 text-primary-600 dark:text-primary-400 font-bold px-6 py-3 hover:bg-primary-500/10 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/35" data-prev-step>Назад</button>
                  <button id="submitKycBtn" type="submit" class="btn-primary w-full rounded-lg px-6 py-3 text-base font-bold disabled:bg-zinc-500 disabled:text-zinc-300 disabled:dark:bg-zinc-700 disabled:dark:text-zinc-500 disabled:shadow-none disabled:pointer-events-none" disabled>Отправить верификацию</button>
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

  <script>
    (function() {
      const form = document.getElementById('kycForm');
      if (!form) return;

      const stepSections = [...form.querySelectorAll('[data-kyc-step]')];
      const stepIndicators = [...document.querySelectorAll('[data-step-indicator]')];
      const stepLines = [...document.querySelectorAll('[data-step-line]')];
      const nextButtons = [...form.querySelectorAll('[data-next-step]')];
      const prevButtons = [...form.querySelectorAll('[data-prev-step]')];

      const documentType = document.getElementById('documentType');
      const docFront = document.getElementById('docFront');
      const docBack = document.getElementById('docBack');
      const frontCard = form.querySelector('[data-upload-card="front"]');
      const backCard = form.querySelector('[data-upload-card="back"]');
      const submitBtn = document.getElementById('submitKycBtn');

      const birthMonth = document.getElementById('birthMonth');
      const birthDay = document.getElementById('birthDay');
      const birthYear = document.getElementById('birthYear');

      const consentAccuracy = document.getElementById('consentAccuracy');
      const consentData = document.getElementById('consentData');

      let currentStep = 1;

      const monthNames = [
        'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
        'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
      ];

      monthNames.forEach((label, index) => {
        const option = document.createElement('option');
        option.value = String(index + 1).padStart(2, '0');
        option.textContent = label;
        birthMonth.appendChild(option);
      });

      for (let day = 1; day <= 31; day += 1) {
        const option = document.createElement('option');
        option.value = String(day).padStart(2, '0');
        option.textContent = day;
        birthDay.appendChild(option);
      }

      const currentYear = new Date().getFullYear();
      for (let year = currentYear - 18; year >= currentYear - 100; year -= 1) {
        const option = document.createElement('option');
        option.value = String(year);
        option.textContent = year;
        birthYear.appendChild(option);
      }

      function setStep(step) {
        currentStep = Math.min(3, Math.max(1, step));

        stepSections.forEach((section) => {
          const isVisible = Number(section.dataset.kycStep) === currentStep;
          section.classList.toggle('hidden', !isVisible);
        });

        stepIndicators.forEach((indicator, index) => {
          const circle = indicator.querySelector('div');
          const label = indicator.querySelector('div + div');
          const stepNumber = index + 1;
          const isCurrent = stepNumber === currentStep;
          const isCompleted = stepNumber < currentStep;

          circle.className = 'mx-auto flex h-11 w-11 items-center justify-center rounded-full border text-lg font-semibold transition-colors';
          label.className = 'mt-2 text-sm sm:text-base font-medium';

          if (isCurrent || isCompleted) {
            circle.classList.add('border-primary-500', 'bg-primary-500', 'text-white', 'dark:border-primary-600', 'dark:bg-primary-600');
            label.classList.add('text-zinc-800', 'dark:text-zinc-100');
          } else {
            circle.classList.add('border-zinc-200', 'bg-zinc-100', 'text-zinc-500', 'dark:border-zinc-700', 'dark:bg-zinc-800', 'dark:text-zinc-400');
            label.classList.add('text-zinc-500', 'dark:text-zinc-400');
          }
        });

        stepLines.forEach((line, index) => {
          const isActive = index < currentStep - 1;
          line.classList.toggle('bg-primary-500', isActive);
          line.classList.toggle('dark:bg-primary-600', isActive);
          line.classList.toggle('bg-zinc-200', !isActive);
          line.classList.toggle('dark:bg-zinc-700', !isActive);
        });
      }

      function setError(field, message) {
        const errorTarget = form.querySelector(`[data-error-for="${field}"]`);
        if (!errorTarget) return;
        errorTarget.textContent = message;
        errorTarget.classList.toggle('hidden', !message);
      }

      function getInput(field) {
        return form.querySelector(`#${field}`);
      }

      function markInvalid(field, invalid) {
        const input = getInput(field);
        if (input) input.dataset.invalid = invalid ? 'true' : 'false';
      }

      function validateStep1() {
        let valid = true;
        const required = [
          ['firstName', 'Введите имя'],
          ['lastName', 'Введите фамилию'],
          ['phone', 'Введите номер телефона'],
          ['email', 'Введите email'],
          ['country', 'Выберите страну'],
          ['city', 'Введите город'],
          ['address', 'Введите адрес']
        ];

        required.forEach(([field, message]) => {
          const input = getInput(field);
          const isEmpty = !input || !input.value.trim();
          setError(field, isEmpty ? message : '');
          markInvalid(field, isEmpty);
          if (isEmpty) valid = false;
        });

        const email = getInput('email').value.trim();
        if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
          setError('email', 'Введите корректный email');
          markInvalid('email', true);
          valid = false;
        }

        const phone = getInput('phone').value.trim();
        if (phone && !/^\+?[\d\s().-]{7,20}$/.test(phone)) {
          setError('phone', 'Введите корректный номер телефона');
          markInvalid('phone', true);
          valid = false;
        }

        const month = birthMonth.value;
        const day = birthDay.value;
        const year = birthYear.value;
        const birthBlockInvalid = !month || !day || !year;
        setError('birthDate', birthBlockInvalid ? 'Укажите полную дату рождения' : '');
        [birthMonth, birthDay, birthYear].forEach((el) => {
          el.dataset.invalid = birthBlockInvalid ? 'true' : 'false';
        });
        if (birthBlockInvalid) valid = false;

        if (!birthBlockInvalid) {
          const testDate = new Date(`${year}-${month}-${day}T00:00:00`);
          const isValidDate = testDate.getFullYear() === Number(year) && (testDate.getMonth() + 1) === Number(month) && testDate.getDate() === Number(day);
          if (!isValidDate) {
            setError('birthDate', 'Укажите корректную дату рождения');
            [birthMonth, birthDay, birthYear].forEach((el) => {
              el.dataset.invalid = 'true';
            });
            valid = false;
          }
        }

        return valid;
      }

      function requiredUploads() {
        const type = documentType.value;
        if (!type) return ['front'];
        return type === 'Паспорт' ? ['front'] : ['front', 'back'];
      }

      function validateStep2() {
        let valid = true;

        const typeEmpty = !documentType.value;
        setError('documentType', typeEmpty ? 'Выберите тип документа' : '');
        markInvalid('documentType', typeEmpty);
        if (typeEmpty) valid = false;

        const numberInput = getInput('documentNumber');
        const numberInvalid = !numberInput.value.trim() || numberInput.value.trim().length < 4;
        setError('documentNumber', numberInvalid ? 'Введите корректный номер документа' : '');
        markInvalid('documentNumber', numberInvalid);
        if (numberInvalid) valid = false;

        const frontMissing = !docFront.files || !docFront.files[0];
        const backMissing = !docBack.files || !docBack.files[0];

        setError('docFront', frontMissing ? 'Загрузите лицевую сторону документа' : '');
        frontCard.classList.toggle('border-red-500/70', frontMissing);
        if (frontMissing) valid = false;

        const needBack = requiredUploads().includes('back');
        setError('docBack', needBack && backMissing ? 'Загрузите обратную сторону документа' : '');
        backCard.classList.toggle('border-red-500/70', needBack && backMissing);
        if (needBack && backMissing) valid = false;

        return valid;
      }

      function updateSummary() {
        const personalItems = [
          ['Имя', getInput('firstName').value.trim()],
          ['Фамилия', getInput('lastName').value.trim()],
          ['Дата рождения', `${birthDay.value}.${birthMonth.value}.${birthYear.value}`],
          ['Телефон', getInput('phone').value.trim()],
          ['Email', getInput('email').value.trim()],
          ['Страна', getInput('country').value],
          ['Город', getInput('city').value.trim()],
          ['Адрес', getInput('address').value.trim()]
        ];

        const docItems = [
          ['Тип документа', documentType.value],
          ['Номер документа', getInput('documentNumber').value.trim()],
          ['Файл (лицевая сторона)', docFront.files[0]?.name || '—'],
          ['Файл (обратная сторона)', requiredUploads().includes('back') ? (docBack.files[0]?.name || '—') : 'Не требуется']
        ];

        const personalRoot = document.getElementById('summaryPersonal');
        const docRoot = document.getElementById('summaryDocument');

        function renderRows(root, rows) {
          root.innerHTML = rows.map(([label, value]) => `
            <div class="flex flex-col gap-1 border-b border-zinc-200 dark:border-zinc-700 pb-2 last:border-b-0">
              <dt class="text-sm text-zinc-500 dark:text-zinc-400">${label}</dt>
              <dd class="text-base font-semibold text-zinc-900 dark:text-zinc-100">${value || '—'}</dd>
            </div>
          `).join('');
        }

        renderRows(personalRoot, personalItems);
        renderRows(docRoot, docItems);
      }

      function validateStep3() {
        let valid = true;

        if (!consentAccuracy.checked) {
          setError('consentAccuracy', 'Подтвердите достоверность данных');
          valid = false;
        } else {
          setError('consentAccuracy', '');
        }

        if (!consentData.checked) {
          setError('consentData', 'Требуется согласие на обработку данных');
          valid = false;
        } else {
          setError('consentData', '');
        }

        submitBtn.disabled = !(consentAccuracy.checked && consentData.checked);
        return valid;
      }

      function focusFirstError() {
        const error = form.querySelector('.c-form-message:not(.hidden)');
        if (!error) return;
        error.scrollIntoView({ behavior: 'smooth', block: 'center' });
        const forField = error.dataset.errorFor;
        const fallbackMap = {
          birthDate: birthMonth,
          consentAccuracy,
          consentData
        };
        const input = getInput(forField) || fallbackMap[forField];
        if (input) input.focus();
      }

      const previewUrls = { front: null, back: null };

      function syncFileView(side) {
        const input = side === 'front' ? docFront : docBack;
        const previewWrap = form.querySelector(`[data-file-preview-wrap="${side}"]`);
        const preview = form.querySelector(`[data-file-preview="${side}"]`);
        const fileActions = form.querySelector(`[data-file-actions="${side}"]`);
        const hasFile = !!input.files?.[0];

        if (previewUrls[side]) {
          URL.revokeObjectURL(previewUrls[side]);
          previewUrls[side] = null;
        }

        if (hasFile) {
          const file = input.files[0];
          if (file.type.startsWith('image/')) {
            previewUrls[side] = URL.createObjectURL(file);
            preview.src = previewUrls[side];
          } else {
            preview.src = '';
            preview.alt = `Файл выбран: ${file.name}`;
            preview.classList.add('hidden');
          }
        } else {
          preview.src = '';
          preview.alt = '';
        }

        if (hasFile && input.files[0].type.startsWith('image/')) {
          preview.classList.remove('hidden');
        }

        previewWrap.classList.toggle('hidden', !hasFile);
        fileActions.classList.toggle('hidden', !hasFile);
        fileActions.classList.toggle('flex', hasFile);
      }

      function refreshUploadMode() {
        const needBack = requiredUploads().includes('back');
        backCard.classList.toggle('hidden', !needBack);
        setError('docBack', '');
        backCard.classList.remove('border-red-500/70');
      }

      function clearErrorsForStep(step) {
        const section = form.querySelector(`[data-kyc-step="${step}"]`);
        if (!section) return;
        section.querySelectorAll('.c-form-message').forEach((item) => {
          item.classList.add('hidden');
          item.textContent = '';
        });
        section.querySelectorAll('[data-invalid="true"]').forEach((item) => {
          item.dataset.invalid = 'false';
        });
      }

      nextButtons.forEach((button) => {
        button.addEventListener('click', () => {
          const valid = currentStep === 1 ? validateStep1() : validateStep2();
          if (!valid) {
            focusFirstError();
            return;
          }

          if (currentStep === 2) updateSummary();
          clearErrorsForStep(currentStep + 1);
          setStep(currentStep + 1);
        });
      });

      prevButtons.forEach((button) => {
        button.addEventListener('click', () => {
          clearErrorsForStep(currentStep);
          setStep(currentStep - 1);
        });
      });

      documentType.addEventListener('change', () => {
        refreshUploadMode();
        setError('documentType', '');
        documentType.dataset.invalid = 'false';
      });

      [docFront, docBack].forEach((input) => {
        input.addEventListener('change', () => {
          const side = input.id === 'docFront' ? 'front' : 'back';
          syncFileView(side);
          setError(input.id, '');
          const card = form.querySelector(`[data-upload-card="${side}"]`);
          card.classList.remove('border-red-500/70');
        });
      });

      [frontCard, backCard].forEach((card) => {
        const input = card.dataset.uploadCard === 'front' ? docFront : docBack;
        const activate = () => card.classList.add('border-primary-500', 'dark:border-primary-500');
        const deactivate = () => card.classList.remove('border-primary-500', 'dark:border-primary-500');

        ['dragenter', 'dragover'].forEach((eventName) => {
          card.addEventListener(eventName, (event) => {
            event.preventDefault();
            activate();
          });
        });

        ['dragleave', 'dragend', 'drop'].forEach((eventName) => {
          card.addEventListener(eventName, (event) => {
            event.preventDefault();
            deactivate();
          });
        });

        card.addEventListener('drop', (event) => {
          const dt = event.dataTransfer;
          if (!dt?.files?.length) return;
          input.files = dt.files;
          input.dispatchEvent(new Event('change'));
        });
      });

      form.querySelectorAll('[data-file-replace]').forEach((button) => {
        button.addEventListener('click', () => {
          const side = button.dataset.fileReplace;
          const target = side === 'front' ? docFront : docBack;
          target.click();
        });
      });

      form.querySelectorAll('[data-file-remove]').forEach((button) => {
        button.addEventListener('click', () => {
          const side = button.dataset.fileRemove;
          const target = side === 'front' ? docFront : docBack;
          target.value = '';
          syncFileView(side);
        });
      });

      [consentAccuracy, consentData].forEach((checkbox) => {
        checkbox.addEventListener('change', validateStep3);
      });

      form.addEventListener('submit', (event) => {
        event.preventDefault();
        if (!validateStep3()) {
          focusFirstError();
          return;
        }

        submitBtn.disabled = true;
        submitBtn.textContent = 'Отправка...';

        setTimeout(() => {
          window.location.href = 'dashboard.php';
        }, 600);
      });

      setStep(1);
      refreshUploadMode();
      syncFileView('front');
      syncFileView('back');
      validateStep3();
    })();
  </script>
  <?= renderPhoneInputScript(); ?>
</body>

</html>
