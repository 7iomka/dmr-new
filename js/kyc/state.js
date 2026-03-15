import { DECISIONS, FACE_STATUSES } from './constants.js';

export function createInitialKycState() {
  return {
    currentStep: 1,
    personal: {
      firstName: '',
      lastName: '',
      birthMonth: '',
      birthDay: '',
      birthYear: '',
      phone: '',
      phoneCountryCode: '+7',
      email: '',
      country: '',
      city: '',
      address: '',
    },
    document: {
      type: '',
      number: '',
      files: {
        front: null,
        back: null,
      },
      qualityChecks: {
        front: null,
        back: null,
        allPassed: false,
      },
      ocr: {
        status: 'idle',
        fields: {
          documentNumber: '',
          firstName: '',
          lastName: '',
          birthdate: '',
          mrz: '',
        },
        rawText: '',
      },
      face: {
        found: false,
        cropDataUrl: '',
      },
      checksCompleted: false,
    },
    faceVerification: {
      status: FACE_STATUSES.NOT_STARTED,
      challenge: ['look_straight', 'turn_left', 'turn_right', 'blink'],
      progress: 0,
      retries: 0,
      selfieDataUrl: '',
      similarity: null,
      livenessPassed: false,
      faceMatchPassed: false,
      cameraError: '',
      logs: [],
    },
    risk: {
      flags: new Set(),
      mismatches: [],
      score: 0,
    },
    decisions: {
      final: null,
      decisionReason: '',
      canAutoApprove: false,
      canProceedToReview: false,
    },
    consents: {
      accuracy: false,
      dataProcessing: false,
    },
    timestamps: {
      createdAt: new Date().toISOString(),
      updatedAt: new Date().toISOString(),
      submittedAt: null,
    },
    submitResult: {
      status: null,
      notice: '',
    },
  };
}

export function touch(state) {
  state.timestamps.updatedAt = new Date().toISOString();
}

export function resetDependentVerificationState(state) {
  state.document.ocr = {
    status: 'idle',
    fields: {
      documentNumber: '',
      firstName: '',
      lastName: '',
      birthdate: '',
      mrz: '',
    },
    rawText: '',
  };
  state.document.face = {
    found: false,
    cropDataUrl: '',
  };
  state.document.checksCompleted = false;

  state.faceVerification = {
    ...state.faceVerification,
    status: FACE_STATUSES.NOT_STARTED,
    progress: 0,
    livenessPassed: false,
    faceMatchPassed: false,
    selfieDataUrl: '',
    similarity: null,
    cameraError: '',
    logs: [],
  };

  state.decisions.final = null;
  state.decisions.decisionReason = '';
  state.decisions.canAutoApprove = false;
  state.decisions.canProceedToReview = false;

  state.risk.flags.clear();
  state.risk.mismatches = [];
  state.risk.score = 0;
  state.submitResult = { status: null, notice: '' };
  state.timestamps.submittedAt = null;
  touch(state);
}

export function serializeKycPayload(state) {
  return {
    personal: state.personal,
    document: {
      type: state.document.type,
      number: state.document.number,
      files: {
        front: state.document.files.front?.name ?? null,
        back: state.document.files.back?.name ?? null,
      },
      qualityChecks: state.document.qualityChecks,
      ocr: state.document.ocr,
      face: {
        found: state.document.face.found,
        cropDataUrl: state.document.face.cropDataUrl,
      },
    },
    faceVerification: {
      status: state.faceVerification.status,
      challenge: state.faceVerification.challenge,
      progress: state.faceVerification.progress,
      retries: state.faceVerification.retries,
      selfieDataUrl: state.faceVerification.selfieDataUrl,
      similarity: state.faceVerification.similarity,
      livenessPassed: state.faceVerification.livenessPassed,
      faceMatchPassed: state.faceVerification.faceMatchPassed,
      logs: state.faceVerification.logs,
    },
    risk: {
      flags: [...state.risk.flags],
      mismatches: state.risk.mismatches,
      score: state.risk.score,
    },
    decision: state.decisions.final ?? DECISIONS.PENDING,
    decisionReason: state.decisions.decisionReason,
    consents: state.consents,
    timestamps: state.timestamps,
  };
}
