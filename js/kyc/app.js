const form = document.getElementById('kycForm');
if (!form) {
  throw new Error('KYC form not found');
}

const state = {
  step: 1,
  personal: {
    firstName: '',
    lastName: '',
    birthDate: '',
    phoneNumber: '',
    email: '',
    country: '',
    countryFlag: '',
    city: '',
    addressLine: '',
  },
  document: {
    docType: '',
    docNumber: '',
    front: null,
    back: null,
  },
  selfie: null,
  selfieWithDocument: null,
  hasSelfie: false,
  hasSelfieWithDocument: false,
  consent: false,
  acceptTerms: false,
};

const dom = {
  steps: [...document.querySelectorAll('[data-kyc-step]')],
  indicators: [...document.querySelectorAll('[data-step-indicator]')],
  statusDoc: document.querySelector('[data-doc-status]'),
  statusSelfie: document.querySelector('[data-selfie-status]'),
  summaryPersonal: document.getElementById('summaryPersonal'),
  summaryVerification: document.getElementById('summaryVerification'),
  submitBtn: document.getElementById('submitKycBtn'),
  docType: document.getElementById('documentType'),
  docNumber: document.getElementById('documentNumber'),
  docBackCard: document.getElementById('docBackCard'),
  consent: document.getElementById('consent'),
  acceptTerms: document.getElementById('acceptTerms'),
};

const uploads = {
  front: bindUpload('front', 'docFrontInput', 'docFrontPreview'),
  back: bindUpload('back', 'docBackInput', 'docBackPreview'),
  selfie: bindUpload('selfie', 'selfieInput', 'selfiePreview'),
  selfieWithDocument: bindUpload('selfieWithDocument', 'selfieWithDocumentInput', 'selfieWithDocumentPreview'),
};

const monthSelect = document.getElementById('birthMonth');
const daySelect = document.getElementById('birthDay');
const yearSelect = document.getElementById('birthYear');

initBirthDateOptions();
initEvents();
updateDocumentTypeUI();
updateStatuses();
updateStepper();

function initEvents() {
  document.querySelectorAll('[data-next-step]').forEach((button) => {
    button.addEventListener('click', () => gotoStep(Number(button.dataset.nextStep)));
  });

  document.querySelectorAll('[data-prev-step]').forEach((button) => {
    button.addEventListener('click', () => gotoStep(Number(button.dataset.prevStep)));
  });

  dom.docType.addEventListener('change', () => {
    clearError('documentType');
    updateDocumentTypeUI();
    if (requiresBackSide()) {
      state.document.back = uploads.back.file;
    } else {
      clearUpload('back');
      state.document.back = null;
    }
    updateStatuses();
  });

  dom.docNumber.addEventListener('input', () => clearError('documentNumber'));
  [dom.consent, dom.acceptTerms].forEach((checkbox) => checkbox.addEventListener('change', updateSubmitState));

  form.addEventListener('input', (event) => {
    const target = event.target;
    if (!(target instanceof HTMLElement)) return;
    if (target.id) clearError(target.id);
    if (['birthMonth', 'birthDay', 'birthYear'].includes(target.id)) clearError('birthDate');
  });

  form.addEventListener('submit', async (event) => {
    event.preventDefault();
    if (!validateStep4()) return;

    const payload = await buildPayload();
    console.info('[KYC payload]', payload);

    const notice = encodeURIComponent('manual_review_submitted');
    window.location.href = `dashboard.php?kyc=${notice}`;
  });
}

function gotoStep(targetStep) {
  if (targetStep > state.step) {
    const valid = validateCurrentStep();
    if (!valid) return;
  }

  state.step = targetStep;
  dom.steps.forEach((stepEl) => {
    stepEl.classList.toggle('hidden', Number(stepEl.dataset.kycStep) !== targetStep);
  });

  if (targetStep === 4) {
    renderSummary();
  }

  updateStepper();
  updateSubmitState();
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

function validateCurrentStep() {
  if (state.step === 1) return validateStep1();
  if (state.step === 2) return validateStep2();
  if (state.step === 3) return validateStep3();
  return true;
}

function validateStep1() {
  const required = ['firstName', 'lastName', 'phone', 'email', 'country', 'city', 'address'];
  let isValid = true;

  required.forEach((id) => {
    const el = document.getElementById(id);
    const value = (el?.value || '').trim();
    if (!value) {
      isValid = false;
      showError(id, 'Обязательное поле.');
    }
  });

  if (!monthSelect.value || !daySelect.value || !yearSelect.value) {
    isValid = false;
    showError('birthDate', 'Укажите дату рождения полностью.');
  }

  const email = document.getElementById('email')?.value.trim() || '';
  if (email && !/^\S+@\S+\.\S+$/.test(email)) {
    isValid = false;
    showError('email', 'Введите корректный email.');
  }

  const phone = document.getElementById('phone')?.value.trim() || '';
  if (phone && phone.replace(/\D/g, '').length < 8) {
    isValid = false;
    showError('phone', 'Введите корректный номер телефона.');
  }

  if (!isValid) return focusFirstError();

  const countrySelect = document.getElementById('country');
  const selectedOption = countrySelect?.options[countrySelect.selectedIndex];
  state.personal = {
    firstName: document.getElementById('firstName').value.trim(),
    lastName: document.getElementById('lastName').value.trim(),
    birthDate: `${yearSelect.value}-${monthSelect.value.padStart(2, '0')}-${daySelect.value.padStart(2, '0')}`,
    phoneNumber: document.getElementById('phone').value.trim(),
    email: document.getElementById('email').value.trim(),
    country: countrySelect?.value || '',
    countryFlag: selectedOption?.dataset.flag || '',
    city: document.getElementById('city').value.trim(),
    addressLine: document.getElementById('address').value.trim(),
  };

  return true;
}

function validateStep2() {
  let isValid = true;
  state.document.docType = dom.docType.value;
  state.document.docNumber = dom.docNumber.value.trim();
  state.document.front = uploads.front.file;
  state.document.back = uploads.back.file;

  if (!state.document.docType) {
    isValid = false;
    showError('documentType', 'Выберите тип документа.');
  }

  if (!state.document.docNumber) {
    isValid = false;
    showError('documentNumber', 'Введите номер документа.');
  }

  if (!state.document.front) {
    isValid = false;
    showError('docFront', 'Загрузите лицевую сторону документа.');
  }

  if (requiresBackSide() && !state.document.back) {
    isValid = false;
    showError('docBack', 'Загрузите обратную сторону документа.');
  }

  updateStatuses();

  if (!isValid) return focusFirstError();
  return true;
}

function validateStep3() {
  let isValid = true;

  state.selfie = uploads.selfie.file;
  state.selfieWithDocument = uploads.selfieWithDocument.file;
  state.hasSelfie = Boolean(state.selfie);
  state.hasSelfieWithDocument = Boolean(state.selfieWithDocument);

  if (!state.selfie) {
    isValid = false;
    showError('selfie', 'Загрузите селфи.');
  }

  if (!state.selfieWithDocument) {
    isValid = false;
    showError('selfieWithDocument', 'Загрузите селфи с документом.');
  }

  updateStatuses();

  if (!isValid) return focusFirstError();
  return true;
}

function validateStep4() {
  let isValid = validateStep1() && validateStep2() && validateStep3();

  state.consent = Boolean(dom.consent?.checked);
  state.acceptTerms = Boolean(dom.acceptTerms?.checked);

  if (!state.consent) {
    isValid = false;
    showError('consent', 'Подтвердите достоверность данных.');
  }

  if (!state.acceptTerms) {
    isValid = false;
    showError('acceptTerms', 'Примите условия обработки данных.');
  }

  if (!isValid) {
    focusFirstError();
  }

  return isValid;
}

function renderSummary() {
  const personalRows = [
    ['Имя', state.personal.firstName],
    ['Фамилия', state.personal.lastName],
    ['Дата рождения', state.personal.birthDate],
    ['Телефон', state.personal.phoneNumber],
    ['Email', state.personal.email],
    ['Страна', `${state.personal.countryFlag} ${state.personal.country}`.trim()],
    ['Город', state.personal.city],
    ['Адрес', state.personal.addressLine],
  ];

  const docRows = [
    ['Тип документа', mapDocType(state.document.docType)],
    ['Номер документа', state.document.docNumber || '—'],
    ['Лицевая сторона', state.document.front?.name || 'Не загружено'],
    ['Обратная сторона', requiresBackSide() ? (state.document.back?.name || 'Не загружено') : 'Не требуется'],
    ['Селфи', state.selfie?.name || 'Не загружено'],
    ['Селфи с документом', state.selfieWithDocument?.name || 'Не загружено'],
    ['hasSelfie', state.hasSelfie ? 'true' : 'false'],
    ['hasSelfieWithDocument', state.hasSelfieWithDocument ? 'true' : 'false'],
  ];

  dom.summaryPersonal.innerHTML = personalRows.map(summaryRow).join('');
  dom.summaryVerification.innerHTML = docRows.map(summaryRow).join('');
}

function updateSubmitState() {
  const canSubmit = state.step === 4 && dom.consent?.checked && dom.acceptTerms?.checked;
  dom.submitBtn.disabled = !canSubmit;
}

function updateStepper() {
  dom.indicators.forEach((item) => {
    const step = Number(item.dataset.stepIndicator);
    const dot = item.querySelector('.c-stepper__dot');
    const label = item.querySelector('.c-stepper__label');
    const line = item.querySelector('[data-step-line]');
    if (!dot || !label) return;

    const completed = step < state.step;
    const active = step === state.step;

    dot.classList.toggle('border-primary-500', active || completed);
    dot.classList.toggle('bg-primary-500', active || completed);
    dot.classList.toggle('text-white', active || completed);
    dot.classList.toggle('border-zinc-200', !active && !completed);
    dot.classList.toggle('bg-zinc-100', !active && !completed);
    dot.classList.toggle('text-zinc-500', !active && !completed);
    dot.classList.toggle('dark:border-zinc-700', !active && !completed);
    dot.classList.toggle('dark:bg-zinc-800', !active && !completed);
    dot.classList.toggle('dark:text-zinc-400', !active && !completed);

    label.classList.toggle('text-primary-600', active || completed);
    label.classList.toggle('dark:text-primary-400', active || completed);
    label.classList.toggle('text-zinc-500', !active && !completed);
    label.classList.toggle('dark:text-zinc-400', !active && !completed);
    item.setAttribute('aria-current', active ? 'step' : 'false');

    if (line) {
      line.classList.toggle('bg-primary-500/60', completed);
      line.classList.toggle('dark:bg-primary-500/50', completed);
      line.classList.toggle('bg-zinc-200', !completed);
      line.classList.toggle('dark:bg-zinc-700', !completed);
    }
  });
}

function bindUpload(key, inputId, previewId) {
  const input = document.getElementById(inputId);
  const preview = document.getElementById(previewId);
  const card = document.querySelector(`[data-upload-card="${key}"]`);
  const previewWrap = document.querySelector(`[data-preview-wrap="${key}"]`);
  const fileName = document.querySelector(`[data-file-name="${key}"]`);
  const replaceBtn = document.querySelector(`[data-replace-upload="${key}"]`);
  const clearBtn = document.querySelector(`[data-clear-upload="${key}"]`);

  const model = { file: null, objectUrl: '' };

  if (!input || !card || !preview || !previewWrap || !fileName || !replaceBtn || !clearBtn) {
    return model;
  }

  const applyFile = (file) => {
    if (!file) return;
    if (model.objectUrl) URL.revokeObjectURL(model.objectUrl);
    model.file = file;
    model.objectUrl = URL.createObjectURL(file);

    preview.src = model.objectUrl;
    previewWrap.classList.remove('hidden');
    fileName.textContent = file.name;
    fileName.classList.remove('hidden');
    replaceBtn.classList.remove('hidden');
    clearBtn.classList.remove('hidden');

    clearError(uploadErrorKey(key));
    updateStatuses();
  };

  input.addEventListener('change', () => applyFile(input.files?.[0]));
  replaceBtn.addEventListener('click', () => input.click());
  clearBtn.addEventListener('click', () => clearUpload(key));

  card.addEventListener('dragover', (event) => {
    event.preventDefault();
    card.classList.add('border-primary-500', 'bg-primary-50/50', 'dark:bg-primary-900/10');
  });

  ['dragleave', 'dragend'].forEach((type) => {
    card.addEventListener(type, () => {
      card.classList.remove('border-primary-500', 'bg-primary-50/50', 'dark:bg-primary-900/10');
    });
  });

  card.addEventListener('drop', (event) => {
    event.preventDefault();
    card.classList.remove('border-primary-500', 'bg-primary-50/50', 'dark:bg-primary-900/10');
    const droppedFile = event.dataTransfer?.files?.[0];
    if (!droppedFile) return;
    const dt = new DataTransfer();
    dt.items.add(droppedFile);
    input.files = dt.files;
    applyFile(droppedFile);
  });

  return model;
}

function clearUpload(key) {
  const upload = uploads[key];
  if (!upload) return;

  const input = document.getElementById(key === 'front' ? 'docFrontInput' : key === 'back' ? 'docBackInput' : key === 'selfie' ? 'selfieInput' : 'selfieWithDocumentInput');
  const preview = document.getElementById(key === 'front' ? 'docFrontPreview' : key === 'back' ? 'docBackPreview' : key === 'selfie' ? 'selfiePreview' : 'selfieWithDocumentPreview');
  const previewWrap = document.querySelector(`[data-preview-wrap="${key}"]`);
  const fileName = document.querySelector(`[data-file-name="${key}"]`);
  const replaceBtn = document.querySelector(`[data-replace-upload="${key}"]`);
  const clearBtn = document.querySelector(`[data-clear-upload="${key}"]`);

  if (upload.objectUrl) URL.revokeObjectURL(upload.objectUrl);
  upload.file = null;
  upload.objectUrl = '';

  if (input) input.value = '';
  if (preview) preview.src = '';
  previewWrap?.classList.add('hidden');
  fileName?.classList.add('hidden');
  fileName && (fileName.textContent = '');
  replaceBtn?.classList.add('hidden');
  clearBtn?.classList.add('hidden');

  clearError(uploadErrorKey(key));
  updateStatuses();
}

function updateStatuses() {
  const hasFront = Boolean(uploads.front.file);
  const hasBack = Boolean(uploads.back.file);
  const requiresBack = requiresBackSide();

  if (dom.statusDoc) {
    const docOk = hasFront && (!requiresBack || hasBack);
    dom.statusDoc.className = `c-verification-status ${docOk ? 'is-success' : 'is-warning'}`;
    dom.statusDoc.textContent = docOk
      ? 'Статус: документы загружены и готовы для ручной проверки.'
      : `Статус: требуется ${requiresBack ? 'лицевая и обратная стороны.' : 'лицевая сторона документа.'}`;
  }

  state.hasSelfie = Boolean(uploads.selfie.file);
  state.hasSelfieWithDocument = Boolean(uploads.selfieWithDocument.file);

  if (dom.statusSelfie) {
    const selfieOk = state.hasSelfie && state.hasSelfieWithDocument;
    dom.statusSelfie.className = `c-verification-status ${selfieOk ? 'is-success' : 'is-warning'}`;
    dom.statusSelfie.textContent = selfieOk
      ? 'Статус: оба селфи загружены и готовы к отправке менеджеру.'
      : 'Статус: загрузите селфи и селфи с документом.';
  }
}

function updateDocumentTypeUI() {
  const showBack = requiresBackSide();
  dom.docBackCard.classList.toggle('hidden', !showBack);
  if (!showBack) {
    clearError('docBack');
  }
  updateStatuses();
}

function requiresBackSide() {
  return dom.docType.value === 'driver_license' || dom.docType.value === 'id_card';
}

function showError(field, message) {
  const errorEl = document.querySelector(`[data-error-for="${field}"]`);
  if (!errorEl) return;
  errorEl.textContent = message;
  errorEl.classList.remove('hidden');
}

function clearError(field) {
  const errorEl = document.querySelector(`[data-error-for="${field}"]`);
  if (!errorEl) return;
  errorEl.textContent = '';
  errorEl.classList.add('hidden');
}

function focusFirstError() {
  const firstError = form.querySelector('.c-form-message:not(.hidden)');
  if (!firstError) return false;
  const fieldKey = firstError.getAttribute('data-error-for');
  let target = fieldKey ? document.getElementById(fieldKey) : null;
  if (!target && fieldKey === 'birthDate') target = monthSelect;
  if (!target && fieldKey === 'docFront') target = document.getElementById('docFrontInput');
  if (!target && fieldKey === 'docBack') target = document.getElementById('docBackInput');
  if (!target && fieldKey === 'selfie') target = document.getElementById('selfieInput');
  if (!target && fieldKey === 'selfieWithDocument') target = document.getElementById('selfieWithDocumentInput');
  target?.focus({ preventScroll: true });
  firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
  return false;
}

function uploadErrorKey(key) {
  if (key === 'front') return 'docFront';
  if (key === 'back') return 'docBack';
  return key;
}

function initBirthDateOptions() {
  const months = ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'];
  months.forEach((label, index) => {
    const opt = document.createElement('option');
    opt.value = String(index + 1).padStart(2, '0');
    opt.textContent = label;
    monthSelect.appendChild(opt);
  });

  for (let day = 1; day <= 31; day += 1) {
    const opt = document.createElement('option');
    opt.value = String(day).padStart(2, '0');
    opt.textContent = String(day);
    daySelect.appendChild(opt);
  }

  const currentYear = new Date().getFullYear();
  for (let year = currentYear; year >= currentYear - 100; year -= 1) {
    const opt = document.createElement('option');
    opt.value = String(year);
    opt.textContent = String(year);
    yearSelect.appendChild(opt);
  }
}

function mapDocType(type) {
  const map = {
    passport: 'Паспорт',
    driver_license: 'Водительское удостоверение',
    id_card: 'Национальное удостоверение личности',
  };
  return map[type] || '—';
}

function summaryRow([title, value]) {
  return `<div class="c-summary-row"><dt>${title}</dt><dd>${escapeHtml(value || '—')}</dd></div>`;
}

async function buildPayload() {
  const documents = [];
  const front = await serializeFile(uploads.front.file);
  const back = requiresBackSide() ? await serializeFile(uploads.back.file) : null;
  if (front) documents.push(front);
  if (back) documents.push(back);

  const selfie = await serializeFile(uploads.selfie.file);
  const selfieWithDocument = await serializeFile(uploads.selfieWithDocument.file);

  return {
    ...state.personal,
    docType: state.document.docType,
    docNumber: state.document.docNumber,
    documents,
    selfie,
    selfieWithDocument,
    hasSelfie: Boolean(selfie),
    hasSelfieWithDocument: Boolean(selfieWithDocument),
    consent: Boolean(dom.consent?.checked),
    acceptTerms: Boolean(dom.acceptTerms?.checked),
  };
}

function serializeFile(file) {
  if (!file) return Promise.resolve(null);
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.onerror = () => reject(reader.error);
    reader.onload = () => {
      const result = typeof reader.result === 'string' ? reader.result : '';
      const [, base64 = ''] = result.split(',');
      const ext = (file.name.split('.').pop() || '').toLowerCase();
      resolve({
        fileName: file.name,
        extension: ext,
        content: base64,
      });
    };
    reader.readAsDataURL(file);
  });
}

function escapeHtml(value) {
  return String(value)
    .replaceAll('&', '&amp;')
    .replaceAll('<', '&lt;')
    .replaceAll('>', '&gt;')
    .replaceAll('"', '&quot;')
    .replaceAll("'", '&#039;');
}
