import { DECISIONS } from './constants.js';
import { serializeKycPayload } from './state.js';

export async function submitKycApplication(state) {
  const payload = serializeKycPayload(state);
  await new Promise((resolve) => setTimeout(resolve, 500));

  // Единая точка для будущей backend-интеграции.
  console.info('[KYC_MOCK_SUBMIT]', payload);

  if (state.decisions.final === DECISIONS.REJECTED) {
    return {
      ok: false,
      status: DECISIONS.REJECTED,
      message: 'Заявка отклонена автоматическими проверками. Пожалуйста, загрузите новые данные.',
      payload,
    };
  }

  if (state.decisions.final === DECISIONS.PENDING) {
    return {
      ok: true,
      status: DECISIONS.PENDING,
      message: 'Данные отправлены на ручную проверку. Мы уведомим вас после модерации.',
      payload,
    };
  }

  return {
    ok: true,
    status: DECISIONS.APPROVED,
    message: 'Верификация успешно завершена автоматически.',
    payload,
  };
}
