import { KYC_STEPS, FACE_STATUSES, DECISIONS, DOCUMENT_TYPES, RISK_FLAGS } from './constants.js';
import { createInitialKycState, resetDependentVerificationState, touch } from './state.js';
import { runDocumentQualityChecks, recomputeDocumentRiskFlags } from './document-verification.js';
import { runOcr, comparePersonalWithOcr } from './ocr-service.js';
import { extractDocumentFace, startCamera, stopCamera, runLivenessChallenge, runFaceMatch } from './face-verification.js';
import { decideKyc } from './risk-engine.js';
import { submitKycApplication } from './submit-service.js';

const state = createInitialKycState();
let cameraStream = null;

const dom = {
  form: document.getElementById('kycForm'),
  stepSections: [...document.querySelectorAll('[data-kyc-step]')],
  stepIndicators: [...document.querySelectorAll('[data-step-indicator]')],
  stepLines: [...document.querySelectorAll('[data-step-line]')],
  documentType: document.getElementById('documentType'),
  documentNumber: document.getElementById('documentNumber'),
  docFront: document.getElementById('docFront'),
  docBack: document.getElementById('docBack'),
  backCard: document.querySelector('[data-upload-card="back"]'),
  frontCard: document.querySelector('[data-upload-card="front"]'),
  summaryPersonal: document.getElementById('summaryPersonal'),
  summaryDocument: document.getElementById('summaryDocument'),
  summaryDecision: document.getElementById('summaryDecision'),
  riskFlags: document.getElementById('riskFlags'),
  verificationNotice: document.getElementById('verificationNotice'),
  cameraVideo: document.getElementById('livenessVideo'),
  statusNodes: [...document.querySelectorAll('[data-kyc-status]')],
  selfiePreview: document.getElementById('selfiePreview'),
  documentFacePreview: document.getElementById('documentFacePreview'),
  startFaceBtn: document.getElementById('startFaceVerificationBtn'),
  retryFaceBtn: document.getElementById('retryFaceVerificationBtn'),
  proceedReviewBtn: document.getElementById('proceedToReviewBtn'),
  submitBtn: document.getElementById('submitKycBtn'),
  consentAccuracy: document.getElementById('consentAccuracy'),
  consentData: document.getElementById('consentData'),
  decisionBadge: document.getElementById('finalDecisionBadge'),
};

function setStatus(type, message) {
  if (!dom.statusNodes.length) return;
  dom.statusNodes.forEach((statusNode) => {
    statusNode.className = 'c-verification-status';
    statusNode.classList.add(`is-${type}`);
    statusNode.textContent = message;
  });
}

function setError(field, message) {
  const node = dom.form.querySelector(`[data-error-for="${field}"]`);
  if (!node) return;
  node.textContent = message;
  node.classList.toggle('hidden', !message);
}

function getInput(id) {
  return dom.form.querySelector(`#${id}`);
}

function requiredUploads() {
  return dom.documentType.value === DOCUMENT_TYPES.PASSPORT ? ['front'] : ['front', 'back'];
}

function updateStepper() {
  dom.stepSections.forEach((section) => section.classList.toggle('hidden', Number(section.dataset.kycStep) !== state.currentStep));

  dom.stepIndicators.forEach((indicator, index) => {
    const circle = indicator.querySelector('.c-stepper__dot');
    const label = indicator.querySelector('.c-stepper__label');
    const stepNo = Number(indicator.dataset.stepIndicator || index + 1);
    const isActive = stepNo === state.currentStep;
    const isDone = stepNo < state.currentStep;

    indicator.setAttribute('aria-current', isActive ? 'step' : 'false');

    if (!circle) return;

    circle.classList.toggle('border-primary-500', isActive || isDone);
    circle.classList.toggle('bg-primary-500', isActive || isDone);
    circle.classList.toggle('text-white', isActive || isDone);
    circle.classList.toggle('dark:border-primary-600', isActive || isDone);
    circle.classList.toggle('dark:bg-primary-600', isActive || isDone);

    circle.classList.toggle('border-zinc-200', !isActive && !isDone);
    circle.classList.toggle('bg-zinc-100', !isActive && !isDone);
    circle.classList.toggle('text-zinc-500', !isActive && !isDone);
    circle.classList.toggle('dark:border-zinc-700', !isActive && !isDone);
    circle.classList.toggle('dark:bg-zinc-800', !isActive && !isDone);
    circle.classList.toggle('dark:text-zinc-400', !isActive && !isDone);

    if (label) {
      label.classList.toggle('text-primary-700', isActive || isDone);
      label.classList.toggle('dark:text-primary-300', isActive || isDone);
      label.classList.toggle('text-zinc-500', !isActive && !isDone);
      label.classList.toggle('dark:text-zinc-400', !isActive && !isDone);
    }
  });

  dom.stepLines.forEach((line, idx) => {
    const active = idx < state.currentStep - 1;
    line.classList.toggle('bg-primary-500', active);
    line.classList.toggle('dark:bg-primary-600', active);
    line.classList.toggle('bg-zinc-200', !active);
    line.classList.toggle('dark:bg-zinc-700', !active);
  });
}


function syncFileView(side) {
  const input = side === 'front' ? dom.docFront : dom.docBack;
  const wrap = dom.form.querySelector(`[data-file-preview-wrap="${side}"]`);
  const img = dom.form.querySelector(`[data-file-preview="${side}"]`);
  const actions = dom.form.querySelector(`[data-file-actions="${side}"]`);
  const has = !!input.files?.[0];

  if (has && input.files[0].type.startsWith('image/')) {
    img.src = URL.createObjectURL(input.files[0]);
  } else {
    img.src = '';
  }
  wrap.classList.toggle('hidden', !has);
  actions.classList.toggle('hidden', !has);
  actions.classList.toggle('flex', has);
}

function validateStep1() {
  let valid = true;
  const fields = [
    ['firstName', 'Введите имя'], ['lastName', 'Введите фамилию'], ['email', 'Введите email'],
    ['country', 'Выберите страну'], ['city', 'Введите город'], ['address', 'Введите адрес'], ['phone', 'Введите номер телефона'],
  ];
  fields.forEach(([id, err]) => {
    const input = getInput(id);
    const empty = !input?.value?.trim();
    setError(id, empty ? err : '');
    input.dataset.invalid = empty ? 'true' : 'false';
    if (empty) valid = false;
  });
  const month = getInput('birthMonth').value;
  const day = getInput('birthDay').value;
  const year = getInput('birthYear').value;
  const birthInvalid = !month || !day || !year;
  setError('birthDate', birthInvalid ? 'Укажите дату рождения' : '');
  if (birthInvalid) valid = false;
  return valid;
}

async function runDocumentPipeline() {
  state.document.type = dom.documentType.value;
  state.document.number = dom.documentNumber.value.trim();
  state.document.files.front = dom.docFront.files?.[0] || null;
  state.document.files.back = dom.docBack.files?.[0] || null;

  if (!state.document.type) {
    setError('documentType', 'Выберите тип документа');
    return false;
  }
  if (!state.document.number) {
    setError('documentNumber', 'Введите номер документа');
    return false;
  }

  const required = requiredUploads();
  const missingFront = required.includes('front') && !state.document.files.front;
  const missingBack = required.includes('back') && !state.document.files.back;
  setError('docFront', missingFront ? 'Загрузите лицевую сторону' : '');
  setError('docBack', missingBack ? 'Загрузите обратную сторону' : '');
  if (missingFront || missingBack) return false;

  setStatus('processing', 'Проверяем качество документа...');

  const frontCheck = await runDocumentQualityChecks(state.document.files.front);
  const backCheck = state.document.files.back ? await runDocumentQualityChecks(state.document.files.back) : null;

  state.document.qualityChecks.front = frontCheck;
  state.document.qualityChecks.back = backCheck;
  state.document.qualityChecks.allPassed = frontCheck.passed && (!required.includes('back') || backCheck?.passed);

  if (!frontCheck.passed) setError('docFront', frontCheck.errors[0]);
  if (required.includes('back') && backCheck && !backCheck.passed) setError('docBack', backCheck.errors[0]);

  if (!state.document.qualityChecks.allPassed) {
    setStatus('error', 'Проверка качества документа не пройдена');
    recomputeDocumentRiskFlags(state);
    return false;
  }

  setStatus('processing', 'Запускаем OCR...');
  state.document.ocr.status = 'processing';
  try {
    const ocr = await runOcr(state.document.files.front);
    state.document.ocr.fields = {
      documentNumber: ocr.documentNumber,
      firstName: ocr.firstName,
      lastName: ocr.lastName,
      birthdate: ocr.birthdate,
      mrz: ocr.mrz,
    };
    state.document.ocr.rawText = ocr.rawText;
    state.document.ocr.status = 'done';
  } catch (error) {
    state.document.ocr.status = 'error';
    state.risk.flags.add(RISK_FLAGS.OCR_DATA_MISSING);
    setStatus('warning', 'OCR завершился частично. Заявка может уйти на ручную проверку.');
  }

  comparePersonalWithOcr(state);

  const frontDataUrl = await new Promise((resolve) => {
    const reader = new FileReader();
    reader.onload = () => resolve(reader.result);
    reader.readAsDataURL(state.document.files.front);
  });

  const faceResult = await extractDocumentFace(frontDataUrl);
  state.document.face = faceResult;
  dom.documentFacePreview.src = faceResult.cropDataUrl || '';
  dom.documentFacePreview.classList.toggle('hidden', !faceResult.found);

  recomputeDocumentRiskFlags(state);

  state.document.checksCompleted = state.document.qualityChecks.allPassed;
  setStatus('success', 'Документ проверен. Можно переходить к face verification.');
  return true;
}

async function runFaceVerificationPipeline() {
  if (!state.document.face.found) {
    state.risk.flags.add(RISK_FLAGS.DOCUMENT_FACE_NOT_FOUND);
    setStatus('error', 'Не найдено лицо на документе. Вернитесь на шаг 2, загрузите более крупное и чёткое фото, затем повторите проверку документа.');
    return;
  }

  try {
    setStatus('processing', 'Запрашиваем доступ к камере...');
    cameraStream = await startCamera(dom.cameraVideo);
    state.faceVerification.status = FACE_STATUSES.CAMERA_READY;

    const liveness = await runLivenessChallenge({
      videoEl: dom.cameraVideo,
      statusEl: dom.statusNodes[0] || null,
      onStatus: setStatus,
      state,
    });

    if (!liveness.passed) {
      state.risk.flags.add(RISK_FLAGS.LIVENESS_SUSPICIOUS);
      return;
    }

    state.faceVerification.livenessPassed = true;
    state.faceVerification.selfieDataUrl = liveness.selfieDataUrl;
    dom.selfiePreview.src = liveness.selfieDataUrl;
    dom.selfiePreview.classList.remove('hidden');

    const faceMatch = await runFaceMatch({
      selfieDataUrl: liveness.selfieDataUrl,
      documentFaceDataUrl: state.document.face.cropDataUrl,
      state,
    });

    state.faceVerification.similarity = faceMatch.similarity;
    state.faceVerification.faceMatchPassed = faceMatch.passed;

    if (faceMatch.passed) {
      state.faceVerification.status = FACE_STATUSES.SUCCESS;
      setStatus('success', `Face match пройден (score: ${faceMatch.similarity.toFixed(3)})`);
    } else if (faceMatch.pending) {
      state.risk.flags.add(RISK_FLAGS.MANUAL_OVERRIDE_REQUIRED);
      setStatus('warning', `Face match пограничный (score: ${faceMatch.similarity.toFixed(3)}). Вероятна ручная проверка.`);
    } else {
      setStatus('error', `Face match не пройден (score: ${faceMatch.similarity.toFixed(3)})`);
    }
  } catch (error) {
    state.faceVerification.status = FACE_STATUSES.CAMERA_DENIED;
    state.faceVerification.cameraError = error?.message ?? 'camera error';
    state.risk.flags.add(RISK_FLAGS.CAMERA_ACCESS_PROBLEM);
    setStatus('error', 'Доступ к камере отклонён или недоступен');
  } finally {
    stopCamera(cameraStream);
    cameraStream = null;
    const decision = decideKyc(state);
    Object.assign(state.decisions, {
      final: decision.decision,
      decisionReason: decision.reason,
      canProceedToReview: decision.canProceedToReview,
      canAutoApprove: decision.canAutoApprove,
    });

    dom.proceedReviewBtn.disabled = !state.decisions.canProceedToReview && state.decisions.final !== DECISIONS.PENDING;
    if (state.decisions.final === DECISIONS.PENDING) dom.proceedReviewBtn.disabled = false;
  }
}

function updateReview() {
  const p = state.personal;
  const d = state.document;
  const rowsPersonal = [
    ['Имя', p.firstName], ['Фамилия', p.lastName], ['Дата рождения', `${p.birthDay}.${p.birthMonth}.${p.birthYear}`],
    ['Телефон', `${p.phoneCountryCode} ${p.phone}`], ['Email', p.email], ['Страна', p.country], ['Город', p.city], ['Адрес', p.address],
  ];
  const rowsDocument = [
    ['Тип документа', d.type], ['Номер документа', d.number], ['OCR номер', d.ocr.fields.documentNumber || '—'], ['OCR дата рождения', d.ocr.fields.birthdate || '—'],
    ['MRZ', d.ocr.fields.mrz || '—'], ['Face similarity', state.faceVerification.similarity ? state.faceVerification.similarity.toFixed(3) : '—'],
  ];

  const renderRows = (target, rows) => {
    target.innerHTML = rows.map(([label, value]) => `<div class="c-summary-row"><dt>${label}</dt><dd>${value || '—'}</dd></div>`).join('');
  };

  renderRows(dom.summaryPersonal, rowsPersonal);
  renderRows(dom.summaryDocument, rowsDocument);

  const flags = [...state.risk.flags];
  dom.riskFlags.innerHTML = flags.length ? flags.map((flag) => `<li>${flag}</li>`).join('') : '<li>Риск-флаги не обнаружены</li>';

  const mapDecision = {
    [DECISIONS.APPROVED]: ['success', 'Автоматически подтверждено'],
    [DECISIONS.PENDING]: ['warning', 'Будет отправлено на ручную проверку'],
    [DECISIONS.REJECTED]: ['error', 'Отклонено автоматическими проверками'],
  };
  const [tone, text] = mapDecision[state.decisions.final] || ['warning', 'Проверка не завершена'];
  dom.decisionBadge.className = `c-verification-status is-${tone}`;
  dom.decisionBadge.textContent = `${text}. ${state.decisions.decisionReason || ''}`;
}

function syncPersonalToState() {
  state.personal.firstName = getInput('firstName').value.trim();
  state.personal.lastName = getInput('lastName').value.trim();
  state.personal.birthMonth = getInput('birthMonth').value;
  state.personal.birthDay = getInput('birthDay').value;
  state.personal.birthYear = getInput('birthYear').value;
  state.personal.phone = getInput('phone').value.trim();
  state.personal.phoneCountryCode = getInput('phone-country-code')?.value || '+7';
  state.personal.email = getInput('email').value.trim();
  state.personal.country = getInput('country').value;
  state.personal.city = getInput('city').value.trim();
  state.personal.address = getInput('address').value.trim();
  touch(state);
}

function attachResetListeners() {
  ['firstName', 'lastName', 'birthMonth', 'birthDay', 'birthYear', 'email', 'country', 'city', 'address', 'phone'].forEach((id) => {
    getInput(id)?.addEventListener('change', () => {
      syncPersonalToState();
      resetDependentVerificationState(state);
    });
  });


  ['front', 'back'].forEach((side) => {
    const input = side === 'front' ? dom.docFront : dom.docBack;
    input?.addEventListener('change', () => syncFileView(side));

    dom.form.querySelector(`[data-file-replace="${side}"]`)?.addEventListener('click', () => input?.click());
    dom.form.querySelector(`[data-file-remove="${side}"]`)?.addEventListener('click', () => {
      if (input) input.value = '';
      syncFileView(side);
      resetDependentVerificationState(state);
    });
  });

  dom.documentType.addEventListener('change', () => {
    const needsBack = requiredUploads().includes('back');
    dom.backCard.classList.toggle('hidden', !needsBack);
    resetDependentVerificationState(state);
  });

  [dom.docFront, dom.docBack, dom.documentNumber].forEach((el) => {
    el?.addEventListener('change', () => resetDependentVerificationState(state));
  });
}

function validateConsents() {
  state.consents.accuracy = dom.consentAccuracy.checked;
  state.consents.dataProcessing = dom.consentData.checked;
  setError('consentAccuracy', state.consents.accuracy ? '' : 'Подтвердите достоверность данных');
  setError('consentData', state.consents.dataProcessing ? '' : 'Требуется согласие на обработку данных');
  dom.submitBtn.disabled = !(state.consents.accuracy && state.consents.dataProcessing);
}

function gotoStep(step) {
  state.currentStep = Math.min(4, Math.max(1, step));
  updateStepper();
  if (state.currentStep === 4) updateReview();
}

function bindActions() {
  dom.form.querySelector('[data-action="next-step-1"]').addEventListener('click', () => {
    if (!validateStep1()) return;
    syncPersonalToState();
    gotoStep(2);
  });

  dom.form.querySelector('[data-action="verify-document"]').addEventListener('click', async () => {
    syncPersonalToState();
    const ok = await runDocumentPipeline();
    if (ok) gotoStep(3);
  });

  dom.startFaceBtn.addEventListener('click', runFaceVerificationPipeline);
  dom.retryFaceBtn.addEventListener('click', runFaceVerificationPipeline);
  dom.proceedReviewBtn.addEventListener('click', () => gotoStep(4));

  dom.form.querySelectorAll('[data-prev-step]').forEach((btn) => {
    btn.addEventListener('click', () => gotoStep(Number(btn.dataset.prevStep)));
  });

  [dom.consentAccuracy, dom.consentData].forEach((el) => el.addEventListener('change', validateConsents));

  dom.form.addEventListener('submit', async (event) => {
    event.preventDefault();
    validateConsents();
    if (!(state.consents.accuracy && state.consents.dataProcessing)) return;

    if (state.decisions.final === DECISIONS.REJECTED) {
      dom.verificationNotice.className = 'c-review-notice is-error';
      dom.verificationNotice.textContent = 'Заявка отклонена. Исправьте данные и попробуйте снова.';
      return;
    }

    const result = await submitKycApplication(state);
    state.timestamps.submittedAt = new Date().toISOString();

    if (!result.ok && result.status === DECISIONS.REJECTED) {
      dom.verificationNotice.className = 'c-review-notice is-error';
      dom.verificationNotice.textContent = result.message;
      return;
    }

    const notice = result.status === DECISIONS.PENDING ? 'manual_review' : 'approved';
    window.location.href = `dashboard.php?kyc=${notice}`;
  });
}

function hydrateMonths() {
  const monthSelect = getInput('birthMonth');
  const daySelect = getInput('birthDay');
  const yearSelect = getInput('birthYear');
  const months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
  months.forEach((m, i) => monthSelect.insertAdjacentHTML('beforeend', `<option value="${String(i + 1).padStart(2, '0')}">${m}</option>`));
  for (let d = 1; d <= 31; d += 1) daySelect.insertAdjacentHTML('beforeend', `<option value="${String(d).padStart(2, '0')}">${d}</option>`);
  const year = new Date().getFullYear();
  for (let y = year - 18; y >= year - 100; y -= 1) yearSelect.insertAdjacentHTML('beforeend', `<option value="${y}">${y}</option>`);
}

export function initKycApp() {
  if (!dom.form) return;
  hydrateMonths();
  attachResetListeners();
  bindActions();
  validateConsents();
  updateStepper();
  syncFileView('front');
  syncFileView('back');
  setStatus('warning', 'Запустите проверку документа и liveness перед отправкой.');
}

initKycApp();
