import { DECISIONS, RISK_FLAGS } from './constants.js';

const CRITICAL_FLAGS = new Set([
  RISK_FLAGS.DOCUMENT_FACE_NOT_FOUND,
  RISK_FLAGS.SELFIE_FACE_NOT_FOUND,
  RISK_FLAGS.FACE_SIMILARITY_LOW,
  RISK_FLAGS.DOCUMENT_QUALITY_LOW,
  RISK_FLAGS.TOO_MANY_RETRIES,
]);

const MODERATE_FLAGS = new Set([
  RISK_FLAGS.OCR_DATA_MISSING,
  RISK_FLAGS.NAME_MISMATCH,
  RISK_FLAGS.BIRTHDATE_MISMATCH,
  RISK_FLAGS.DOCUMENT_NUMBER_MISMATCH,
  RISK_FLAGS.LIVENESS_SUSPICIOUS,
  RISK_FLAGS.CAMERA_ACCESS_PROBLEM,
  RISK_FLAGS.MANUAL_OVERRIDE_REQUIRED,
]);

export function calculateRiskScore(flags) {
  let score = 0;
  for (const flag of flags) {
    if (CRITICAL_FLAGS.has(flag)) score += 40;
    else if (MODERATE_FLAGS.has(flag)) score += 15;
    else score += 5;
  }
  return score;
}

export function decideKyc(state) {
  const flags = state.risk.flags;
  const score = calculateRiskScore(flags);
  state.risk.score = score;

  const requiredDocumentOk = state.document.checksCompleted;
  const livenessOk = state.faceVerification.livenessPassed;
  const faceMatchOk = state.faceVerification.faceMatchPassed;

  const hasCritical = [...flags].some((flag) => CRITICAL_FLAGS.has(flag));
  const hasModerate = [...flags].some((flag) => MODERATE_FLAGS.has(flag));

  if (!requiredDocumentOk || !livenessOk) {
    return {
      decision: DECISIONS.REJECTED,
      reason: 'Блокирующие проверки документа или liveness не пройдены',
      canProceedToReview: false,
      canAutoApprove: false,
    };
  }

  if (hasCritical || !faceMatchOk) {
    return {
      decision: DECISIONS.REJECTED,
      reason: 'Обнаружены критические антифрод-сигналы',
      canProceedToReview: false,
      canAutoApprove: false,
    };
  }

  if (hasModerate || score >= 30) {
    return {
      decision: DECISIONS.PENDING,
      reason: 'Требуется ручная модерация из-за риск-флагов',
      canProceedToReview: true,
      canAutoApprove: false,
    };
  }

  return {
    decision: DECISIONS.APPROVED,
    reason: 'Проверки пройдены автоматически',
    canProceedToReview: true,
    canAutoApprove: true,
  };
}
