import { FACE_MATCH_THRESHOLDS, FACE_STATUSES, MAX_LIVENESS_RETRIES, RISK_FLAGS } from './constants.js';

let visionModule = null;
let imageFaceDetector = null;

async function loadVision() {
  if (!visionModule) {
    visionModule = await import('https://cdn.jsdelivr.net/npm/@mediapipe/tasks-vision@0.10.14');
  }
  return visionModule;
}

async function createFaceLandmarker() {
  const vision = await loadVision();
  const filesetResolver = await vision.FilesetResolver.forVisionTasks('https://cdn.jsdelivr.net/npm/@mediapipe/tasks-vision@0.10.14/wasm');
  return vision.FaceLandmarker.createFromOptions(filesetResolver, {
    baseOptions: {
      modelAssetPath: 'https://storage.googleapis.com/mediapipe-models/face_landmarker/face_landmarker/float16/latest/face_landmarker.task',
    },
    runningMode: 'VIDEO',
    numFaces: 1,
    outputFaceBlendshapes: true,
  });
}


async function createImageFaceDetector() {
  if (imageFaceDetector) return imageFaceDetector;

  const vision = await loadVision();
  const filesetResolver = await vision.FilesetResolver.forVisionTasks('https://cdn.jsdelivr.net/npm/@mediapipe/tasks-vision@0.10.14/wasm');
  imageFaceDetector = await vision.FaceDetector.createFromOptions(filesetResolver, {
    baseOptions: {
      modelAssetPath: 'https://storage.googleapis.com/mediapipe-models/face_detector/blaze_face_short_range/float16/latest/blaze_face_short_range.tflite',
    },
    runningMode: 'IMAGE',
    minDetectionConfidence: 0.5,
  });

  return imageFaceDetector;
}

function cropFaceFromBox(canvas, box) {
  const x = Math.max(0, Math.floor(box.x));
  const y = Math.max(0, Math.floor(box.y));
  const width = Math.max(1, Math.floor(Math.min(canvas.width - x, box.width)));
  const height = Math.max(1, Math.floor(Math.min(canvas.height - y, box.height)));

  const crop = document.createElement('canvas');
  crop.width = 220;
  crop.height = 260;
  crop.getContext('2d').drawImage(canvas, x, y, width, height, 0, 0, 220, 260);
  return crop.toDataURL('image/jpeg', 0.9);
}
function computeYaw(landmarks) {
  if (!landmarks?.length) return null;
  const left = landmarks[234];
  const right = landmarks[454];
  const nose = landmarks[1];
  if (!left || !right || !nose) return null;
  const centerX = (left.x + right.x) / 2;
  const half = Math.max(0.0001, (right.x - left.x) / 2);
  return (nose.x - centerX) / half;
}

function getBlinkScore(blendshapes = []) {
  const categories = blendshapes[0]?.categories ?? [];
  const left = categories.find((c) => c.categoryName === 'eyeBlinkLeft')?.score ?? 0;
  const right = categories.find((c) => c.categoryName === 'eyeBlinkRight')?.score ?? 0;
  return Math.max(left, right);
}

function cropFaceFromVideo(video, landmarks) {
  const xs = landmarks.map((point) => point.x);
  const ys = landmarks.map((point) => point.y);
  const minX = Math.max(0, Math.min(...xs) - 0.08);
  const maxX = Math.min(1, Math.max(...xs) + 0.08);
  const minY = Math.max(0, Math.min(...ys) - 0.12);
  const maxY = Math.min(1, Math.max(...ys) + 0.12);

  const sx = Math.floor(minX * video.videoWidth);
  const sy = Math.floor(minY * video.videoHeight);
  const sw = Math.max(1, Math.floor((maxX - minX) * video.videoWidth));
  const sh = Math.max(1, Math.floor((maxY - minY) * video.videoHeight));

  const canvas = document.createElement('canvas');
  canvas.width = 220;
  canvas.height = 260;
  const ctx = canvas.getContext('2d');
  ctx.drawImage(video, sx, sy, sw, sh, 0, 0, 220, 260);
  return canvas.toDataURL('image/jpeg', 0.9);
}

function descriptorFromDataUrl(dataUrl) {
  return new Promise((resolve, reject) => {
    const image = new Image();
    image.onload = () => {
      const canvas = document.createElement('canvas');
      canvas.width = 64;
      canvas.height = 64;
      const ctx = canvas.getContext('2d', { willReadFrequently: true });
      ctx.drawImage(image, 0, 0, 64, 64);
      const { data } = ctx.getImageData(0, 0, 64, 64);
      const bins = new Float32Array(64);
      for (let i = 0; i < data.length; i += 4) {
        const gray = Math.round(0.299 * data[i] + 0.587 * data[i + 1] + 0.114 * data[i + 2]);
        bins[Math.min(63, Math.floor(gray / 4))] += 1;
      }
      const norm = Math.sqrt(bins.reduce((acc, val) => acc + val * val, 0)) || 1;
      resolve(Array.from(bins).map((v) => v / norm));
    };
    image.onerror = reject;
    image.src = dataUrl;
  });
}

function cosineSimilarity(a, b) {
  if (!a?.length || !b?.length || a.length !== b.length) return 0;
  let dot = 0;
  for (let i = 0; i < a.length; i += 1) dot += a[i] * b[i];
  return dot;
}

export async function extractDocumentFace(dataUrl) {
  const image = new Image();
  await new Promise((resolve, reject) => {
    image.onload = resolve;
    image.onerror = reject;
    image.src = dataUrl;
  });

  const canvas = document.createElement('canvas');
  canvas.width = image.width;
  canvas.height = image.height;
  const ctx = canvas.getContext('2d');
  ctx.drawImage(image, 0, 0);

  if ('FaceDetector' in window) {
    try {
      const detector = new window.FaceDetector({ fastMode: true, maxDetectedFaces: 1 });
      const faces = await detector.detect(canvas);
      if (faces.length) {
        const { x, y, width, height } = faces[0].boundingBox;
        return { found: true, cropDataUrl: cropFaceFromBox(canvas, { x, y, width, height }) };
      }
    } catch (error) {
      // continue with MediaPipe fallback
    }
  }

  try {
    const detector = await createImageFaceDetector();
    const result = detector.detect(canvas);
    const detection = result?.detections?.[0];
    const box = detection?.boundingBox;

    if (box) {
      return {
        found: true,
        cropDataUrl: cropFaceFromBox(canvas, {
          x: box.originX ?? 0,
          y: box.originY ?? 0,
          width: box.width ?? canvas.width,
          height: box.height ?? canvas.height,
        }),
      };
    }
  } catch (error) {
    // fallthrough: treat as not found (manual review risk path)
  }

  return { found: false, cropDataUrl: '' };
}

export async function startCamera(videoEl) {
  const stream = await navigator.mediaDevices.getUserMedia({
    video: { facingMode: 'user', width: { ideal: 1280 }, height: { ideal: 720 } },
    audio: false,
  });
  videoEl.srcObject = stream;
  await videoEl.play();
  return stream;
}

export function stopCamera(stream) {
  stream?.getTracks?.().forEach((track) => track.stop());
}

export async function runLivenessChallenge({ videoEl, statusEl, onStatus, state }) {
  const faceLandmarker = await createFaceLandmarker();
  const challenge = state.faceVerification.challenge;
  state.faceVerification.status = FACE_STATUSES.LIVENESS_IN_PROGRESS;

  let currentStep = 0;
  let stableFrames = 0;
  let blinkDetected = false;
  let turnDirectionSign = 1;

  return new Promise((resolve) => {
    let active = true;

    const fail = (message) => {
      active = false;
      state.faceVerification.status = FACE_STATUSES.LIVENESS_FAILED;
      state.faceVerification.retries += 1;
      if (state.faceVerification.retries > MAX_LIVENESS_RETRIES) {
        state.risk.flags.add(RISK_FLAGS.TOO_MANY_RETRIES);
      }
      onStatus('error', message);
      resolve({ passed: false, selfieDataUrl: '' });
    };

    const succeed = (selfieDataUrl) => {
      active = false;
      state.faceVerification.status = FACE_STATUSES.LIVENESS_PASSED;
      onStatus('success', 'Liveness проверка пройдена');
      resolve({ passed: true, selfieDataUrl });
    };

    const loop = () => {
      if (!active) return;

      const result = faceLandmarker.detectForVideo(videoEl, performance.now());
      const landmarks = result?.faceLandmarks?.[0];
      const blend = result?.faceBlendshapes ?? [];

      if (!landmarks) {
        state.faceVerification.status = FACE_STATUSES.FACE_NOT_FOUND;
        onStatus('warning', 'Лицо не найдено в кадре');
        requestAnimationFrame(loop);
        return;
      }

      const yaw = computeYaw(landmarks);
      const blinkScore = getBlinkScore(blend);

      const step = challenge[currentStep];
      let ok = false;
      let hint = 'Смотрите в камеру';

      if (step === 'look_straight') {
        hint = 'Посмотрите прямо';
        ok = yaw !== null && Math.abs(yaw) < 0.18;
      } else if (step === 'turn_left') {
        hint = 'Поверните голову влево';
        if (yaw !== null) {
          const leftDetected = yaw < -0.22;
          const rightDetected = yaw > 0.22;

          if (leftDetected) {
            ok = true;
            turnDirectionSign = 1;
          } else if (rightDetected) {
            ok = true;
            turnDirectionSign = -1;
            hint = 'Определили зеркальную камеру, продолжаем с учётом инверсии';
          }
        }
      } else if (step === 'turn_right') {
        hint = 'Поверните голову вправо';
        if (yaw !== null) {
          const expected = 0.22 * turnDirectionSign;
          ok = turnDirectionSign === 1 ? yaw > expected : yaw < expected;
        }
      } else if (step === 'blink') {
        hint = 'Моргните один раз';
        ok = blinkScore > 0.42;
      }

      if (ok) {
        stableFrames += 1;
        if (step === 'blink') blinkDetected = true;
      } else {
        stableFrames = 0;
      }

      onStatus('processing', `Шаг ${currentStep + 1}/${challenge.length}: ${hint}`);

      if (stableFrames > 8) {
        currentStep += 1;
        stableFrames = 0;
        state.faceVerification.progress = currentStep;
      }

      if (currentStep >= challenge.length) {
        if (!blinkDetected) {
          fail('Не удалось подтвердить моргание');
          return;
        }
        const selfieDataUrl = cropFaceFromVideo(videoEl, landmarks);
        state.faceVerification.status = FACE_STATUSES.SELFIE_CAPTURED;
        succeed(selfieDataUrl);
        return;
      }

      if (state.faceVerification.retries > MAX_LIVENESS_RETRIES + 1) {
        fail('Слишком много неудачных попыток liveness');
        return;
      }

      requestAnimationFrame(loop);
    };

    requestAnimationFrame(loop);
  });
}

export async function runFaceMatch({ selfieDataUrl, documentFaceDataUrl, state }) {
  state.faceVerification.status = FACE_STATUSES.FACE_MATCH_PROCESSING;
  if (!selfieDataUrl || !documentFaceDataUrl) {
    state.risk.flags.add(RISK_FLAGS.SELFIE_FACE_NOT_FOUND);
    return { passed: false, pending: true, similarity: 0 };
  }

  const [selfieDescriptor, docDescriptor] = await Promise.all([
    descriptorFromDataUrl(selfieDataUrl),
    descriptorFromDataUrl(documentFaceDataUrl),
  ]);
  const similarity = cosineSimilarity(selfieDescriptor, docDescriptor);

  if (similarity >= FACE_MATCH_THRESHOLDS.approved) {
    state.faceVerification.status = FACE_STATUSES.FACE_MATCH_PASSED;
    return { passed: true, pending: false, similarity };
  }

  if (similarity >= FACE_MATCH_THRESHOLDS.pending) {
    state.risk.flags.add(RISK_FLAGS.LIVENESS_SUSPICIOUS);
    return { passed: false, pending: true, similarity };
  }

  state.faceVerification.status = FACE_STATUSES.FACE_MATCH_FAILED;
  state.risk.flags.add(RISK_FLAGS.FACE_SIMILARITY_LOW);
  return { passed: false, pending: false, similarity };
}
