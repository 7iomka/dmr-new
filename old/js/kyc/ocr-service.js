import { RISK_FLAGS } from './constants.js';

let tesseractModule = null;

async function loadTesseract() {
  if (!tesseractModule) {
    tesseractModule = await import('https://cdn.jsdelivr.net/npm/tesseract.js@5.1.1/dist/tesseract.esm.min.js');
  }
  return tesseractModule;
}

function normalizeText(value = '') {
  return value
    .toLowerCase()
    .replace(/ё/g, 'е')
    .replace(/[^\p{L}\p{N}]/gu, '');
}

function extractFields(rawText) {
  const compact = rawText.replace(/\s+/g, ' ').trim();
  const numberMatch = compact.match(/\b[A-ZА-Я0-9]{6,20}\b/u);
  const dateMatch = compact.match(/\b(\d{2}[./-]\d{2}[./-]\d{4}|\d{4}[./-]\d{2}[./-]\d{2})\b/);
  const mrzLines = rawText
    .split('\n')
    .map((line) => line.trim())
    .filter((line) => /</.test(line) && line.length >= 25)
    .slice(0, 2);

  const words = compact
    .split(' ')
    .map((word) => word.trim())
    .filter((word) => /^[A-ZА-ЯЁ]{2,}$/u.test(word));

  return {
    documentNumber: numberMatch?.[0] ?? '',
    firstName: words[0] ?? '',
    lastName: words[1] ?? '',
    birthdate: dateMatch?.[0] ?? '',
    mrz: mrzLines.join('\n'),
    rawText,
  };
}

export async function runOcr(file) {
  const { createWorker } = await loadTesseract();
  const worker = await createWorker('eng+rus', 1, {
    logger: () => {},
  });
  try {
    const result = await worker.recognize(file);
    const rawText = result?.data?.text ?? '';
    return extractFields(rawText);
  } finally {
    await worker.terminate();
  }
}

function normalizeBirthdate(input = '') {
  const value = input.replace(/-/g, '.').replace(/\//g, '.');
  const parts = value.split('.');
  if (parts.length !== 3) return '';
  if (parts[0].length === 4) {
    return `${parts[2].padStart(2, '0')}.${parts[1].padStart(2, '0')}.${parts[0]}`;
  }
  return `${parts[0].padStart(2, '0')}.${parts[1].padStart(2, '0')}.${parts[2]}`;
}

export function comparePersonalWithOcr(state) {
  const { personal, document } = state;
  const fields = document.ocr.fields;
  const mismatches = [];
  const flags = state.risk.flags;

  flags.delete(RISK_FLAGS.OCR_DATA_MISSING);
  flags.delete(RISK_FLAGS.NAME_MISMATCH);
  flags.delete(RISK_FLAGS.BIRTHDATE_MISMATCH);
  flags.delete(RISK_FLAGS.DOCUMENT_NUMBER_MISMATCH);

  if (!fields.documentNumber || !fields.firstName || !fields.lastName) {
    flags.add(RISK_FLAGS.OCR_DATA_MISSING);
  }

  if (fields.documentNumber && normalizeText(fields.documentNumber) !== normalizeText(document.number)) {
    mismatches.push('Номер документа не совпадает с OCR');
    flags.add(RISK_FLAGS.DOCUMENT_NUMBER_MISMATCH);
  }

  if (fields.firstName && normalizeText(fields.firstName) !== normalizeText(personal.firstName)) {
    mismatches.push('Имя не совпадает с OCR');
    flags.add(RISK_FLAGS.NAME_MISMATCH);
  }

  if (fields.lastName && normalizeText(fields.lastName) !== normalizeText(personal.lastName)) {
    mismatches.push('Фамилия не совпадает с OCR');
    flags.add(RISK_FLAGS.NAME_MISMATCH);
  }

  const ocrBirth = normalizeBirthdate(fields.birthdate);
  const personalBirth = `${personal.birthDay}.${personal.birthMonth}.${personal.birthYear}`;
  if (ocrBirth && ocrBirth !== personalBirth) {
    mismatches.push('Дата рождения не совпадает с OCR');
    flags.add(RISK_FLAGS.BIRTHDATE_MISMATCH);
  }

  state.risk.mismatches = mismatches;
}
