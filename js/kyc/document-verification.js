import { DOCUMENT_QUALITY_THRESHOLDS, RISK_FLAGS } from './constants.js';

function loadImage(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.onload = () => {
      const img = new Image();
      img.onload = () => resolve(img);
      img.onerror = reject;
      img.src = reader.result;
    };
    reader.onerror = reject;
    reader.readAsDataURL(file);
  });
}

function sampleCanvas(image, maxWidth = 900) {
  const ratio = Math.min(1, maxWidth / image.width);
  const width = Math.floor(image.width * ratio);
  const height = Math.floor(image.height * ratio);
  const canvas = document.createElement('canvas');
  canvas.width = width;
  canvas.height = height;
  const ctx = canvas.getContext('2d', { willReadFrequently: true });
  ctx.drawImage(image, 0, 0, width, height);
  return { canvas, ctx, width, height };
}

function grayscaleData(imageData) {
  const data = imageData.data;
  const gray = new Uint8Array(imageData.width * imageData.height);
  for (let i = 0, j = 0; i < data.length; i += 4, j += 1) {
    gray[j] = Math.round(0.299 * data[i] + 0.587 * data[i + 1] + 0.114 * data[i + 2]);
  }
  return gray;
}

function estimateBlur(gray, width, height) {
  let sum = 0;
  let sumSq = 0;
  let n = 0;
  for (let y = 1; y < height - 1; y += 1) {
    for (let x = 1; x < width - 1; x += 1) {
      const i = y * width + x;
      const lap = 4 * gray[i] - gray[i - 1] - gray[i + 1] - gray[i - width] - gray[i + width];
      sum += lap;
      sumSq += lap * lap;
      n += 1;
    }
  }
  const mean = sum / Math.max(1, n);
  return sumSq / Math.max(1, n) - mean * mean;
}

function brightness(gray) {
  let sum = 0;
  for (let i = 0; i < gray.length; i += 1) sum += gray[i];
  return sum / gray.length;
}

function edgeDensity(gray, width, height) {
  let edges = 0;
  const total = (width - 2) * (height - 2);
  for (let y = 1; y < height - 1; y += 1) {
    for (let x = 1; x < width - 1; x += 1) {
      const i = y * width + x;
      const gx = -gray[i - width - 1] - 2 * gray[i - 1] - gray[i + width - 1] + gray[i - width + 1] + 2 * gray[i + 1] + gray[i + width + 1];
      const gy = -gray[i - width - 1] - 2 * gray[i - width] - gray[i - width + 1] + gray[i + width - 1] + 2 * gray[i + width] + gray[i + width + 1];
      const magnitude = Math.sqrt(gx * gx + gy * gy);
      if (magnitude > 120) edges += 1;
    }
  }
  return edges / Math.max(1, total);
}

function borderEdgeRatio(gray, width, height) {
  const border = [];
  const center = [];
  const bw = Math.max(8, Math.floor(width * 0.08));
  const bh = Math.max(8, Math.floor(height * 0.08));

  for (let y = 0; y < height; y += 1) {
    for (let x = 0; x < width; x += 1) {
      const isBorder = x < bw || x >= width - bw || y < bh || y >= height - bh;
      (isBorder ? border : center).push(gray[y * width + x]);
    }
  }

  const variance = (arr) => {
    const mean = arr.reduce((a, b) => a + b, 0) / Math.max(1, arr.length);
    return arr.reduce((acc, val) => acc + (val - mean) ** 2, 0) / Math.max(1, arr.length);
  };

  return (variance(border) + 1) / (variance(center) + 1);
}

export async function runDocumentQualityChecks(file) {
  if (!file) return { passed: false, errors: ['Файл не загружен'] };
  if (!file.type.startsWith('image/')) return { passed: false, errors: ['Поддерживаются только изображения для проверки качества'] };

  const image = await loadImage(file);
  const { ctx, width, height } = sampleCanvas(image);
  const imageData = ctx.getImageData(0, 0, width, height);
  const gray = grayscaleData(imageData);

  const blurScore = estimateBlur(gray, width, height);
  const brightnessScore = brightness(gray);
  const edgeScore = edgeDensity(gray, width, height);
  const borderRatio = borderEdgeRatio(gray, width, height);

  const errors = [];
  const shortSide = Math.min(image.width, image.height);
  const pixelCount = image.width * image.height;
  if (
    shortSide < DOCUMENT_QUALITY_THRESHOLDS.minShortSide
    || pixelCount < DOCUMENT_QUALITY_THRESHOLDS.minPixels
  ) {
    errors.push(`Слишком низкое разрешение документа (${image.width}x${image.height})`);
  }
  if (blurScore < DOCUMENT_QUALITY_THRESHOLDS.blurMin) errors.push('Изображение размыто');
  if (brightnessScore < DOCUMENT_QUALITY_THRESHOLDS.brightnessMin) errors.push('Слишком тёмное изображение');
  if (brightnessScore > DOCUMENT_QUALITY_THRESHOLDS.brightnessMax) errors.push('Слишком яркое изображение');
  if (edgeScore < DOCUMENT_QUALITY_THRESHOLDS.edgeDensityMin) errors.push('Недостаточно деталей, документ может быть не в фокусе');
  if (edgeScore > DOCUMENT_QUALITY_THRESHOLDS.edgeDensityMax) errors.push('Слишком шумное изображение, возможна съёмка с экрана');
  if (borderRatio > DOCUMENT_QUALITY_THRESHOLDS.borderEdgeMaxRatio) errors.push('Документ сильно обрезан по краям');

  return {
    passed: errors.length === 0,
    errors,
    metrics: {
      resolution: `${image.width}x${image.height}`,
      shortSide,
      pixelCount,
      blurScore,
      brightnessScore,
      edgeScore,
      borderRatio,
    },
  };
}

export function recomputeDocumentRiskFlags(state) {
  const flags = state.risk.flags;
  const checks = state.document.qualityChecks;

  flags.delete(RISK_FLAGS.DOCUMENT_QUALITY_LOW);
  if (checks.front && !checks.front.passed) flags.add(RISK_FLAGS.DOCUMENT_QUALITY_LOW);
  if (checks.back && !checks.back.passed) flags.add(RISK_FLAGS.DOCUMENT_QUALITY_LOW);

  if (!state.document.face.found) {
    flags.add(RISK_FLAGS.DOCUMENT_FACE_NOT_FOUND);
  } else {
    flags.delete(RISK_FLAGS.DOCUMENT_FACE_NOT_FOUND);
  }
}
