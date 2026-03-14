export const KYC_STEPS = [
  { id: 1, label: 'Личные данные' },
  { id: 2, label: 'Документ' },
  { id: 3, label: 'Face & Liveness' },
  { id: 4, label: 'Проверка' },
];

export const FACE_STATUSES = {
  NOT_STARTED: 'not_started',
  CAMERA_READY: 'camera_ready',
  FACE_NOT_FOUND: 'face_not_found',
  POSITION_BAD: 'position_bad',
  LIVENESS_IN_PROGRESS: 'liveness_in_progress',
  LIVENESS_FAILED: 'liveness_failed',
  LIVENESS_PASSED: 'liveness_passed',
  SELFIE_CAPTURED: 'selfie_captured',
  FACE_MATCH_PROCESSING: 'face_match_processing',
  FACE_MATCH_FAILED: 'face_match_failed',
  FACE_MATCH_PASSED: 'face_match_passed',
  SUCCESS: 'success',
  CAMERA_DENIED: 'camera_denied',
  ERROR: 'error',
};

export const DECISIONS = {
  APPROVED: 'approved',
  PENDING: 'pending_manual_review',
  REJECTED: 'rejected',
};

export const DOCUMENT_TYPES = {
  PASSPORT: 'Паспорт',
  DL: 'Водительское удостоверение',
  NATIONAL_ID: 'Национальное удостоверение личности',
};

export const RISK_FLAGS = {
  DOCUMENT_QUALITY_LOW: 'document_quality_low',
  OCR_DATA_MISSING: 'ocr_data_missing',
  NAME_MISMATCH: 'name_mismatch',
  BIRTHDATE_MISMATCH: 'birthdate_mismatch',
  DOCUMENT_NUMBER_MISMATCH: 'document_number_mismatch',
  DOCUMENT_FACE_NOT_FOUND: 'document_face_not_found',
  SELFIE_FACE_NOT_FOUND: 'selfie_face_not_found',
  FACE_SIMILARITY_LOW: 'face_similarity_low',
  LIVENESS_SUSPICIOUS: 'liveness_suspicious',
  TOO_MANY_RETRIES: 'too_many_retries',
  CAMERA_ACCESS_PROBLEM: 'camera_access_problem',
  MANUAL_OVERRIDE_REQUIRED: 'manual_override_required',
};

export const DOCUMENT_QUALITY_THRESHOLDS = {
  minWidth: 900,
  minHeight: 600,
  blurMin: 30,
  brightnessMin: 40,
  brightnessMax: 220,
  edgeDensityMin: 0.02,
  edgeDensityMax: 0.28,
  borderEdgeMaxRatio: 1.45,
};

export const FACE_MATCH_THRESHOLDS = {
  approved: 0.82,
  pending: 0.65,
};

export const MAX_LIVENESS_RETRIES = 2;
