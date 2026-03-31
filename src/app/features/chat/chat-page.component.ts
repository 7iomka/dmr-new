import { NgClass } from '@angular/common';
import { Component, computed, HostListener, signal, ViewEncapsulation } from '@angular/core';
import { FormsModule } from '@angular/forms';
import {
  LucideChevronDown,
  LucideChevronLeft,
  LucideCirclePlus,
  LucideMessageCircle,
  LucidePaperclip,
  LucideSendHorizontal,
  LucideSmile,
  LucideX,
} from '@lucide/angular';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';

type ChatMessage = {
  id: string;
  text: string;
  isMine: boolean;
  timeLabel: string;
};

type ChatDateGroup = {
  id: string;
  rangeLabel: string;
  messages: ChatMessage[];
};

type ChatDialog = {
  id: string;
  title: string;
  subtitle: string;
  lastPreview: string;
  lastTimeLabel: string;
  unreadCount: number;
  groups: ChatDateGroup[];
};

type TicketTopicOption = {
  label: string;
  value: string;
};

@Component({
  selector: 'app-chat-page',
  host: {
    class: 'app-page',
  },
  standalone: true,
  imports: [
    FormsModule,
    NgClass,
    CardModule,
    ButtonModule,
    LucideMessageCircle,
    LucideChevronLeft,
    LucideCirclePlus,
    LucidePaperclip,
    LucideSmile,
    LucideSendHorizontal,
    LucideX,
    LucideChevronDown,
  ],
  templateUrl: './chat-page.component.html',
  styleUrl: './chat-page.component.css',
  encapsulation: ViewEncapsulation.None,
})
export class ChatPageComponent {
  protected readonly ticketTopics: TicketTopicOption[] = [
    { label: 'Техническая проблема', value: 'Техническая проблема' },
    { label: 'Счета и платежи', value: 'Счета и платежи' },
    { label: 'Настройки учетной записи', value: 'Настройки учетной записи' },
    { label: 'Запрос функции', value: 'Запрос функции' },
    { label: 'Отчет об ошибке', value: 'Отчет об ошибке' },
    { label: 'Общий вопрос', value: 'Общий вопрос' },
  ];

  protected readonly emojiOptions = [
    '😀',
    '😁',
    '😂',
    '😊',
    '😉',
    '😍',
    '😎',
    '🤔',
    '😴',
    '😢',
    '😭',
    '😡',
    '😱',
    '👍',
    '👎',
    '👏',
    '🙏',
    '🔥',
    '🎉',
    '✅',
  ];

  protected readonly dialogs = signal<ChatDialog[]>([
    {
      id: 'support-technical',
      title: 'Общий вопрос',
      subtitle: 'Чат поддержки',
      lastPreview: 'Проверяем статус транзакции и скоро ответим.',
      lastTimeLabel: '09:43',
      unreadCount: 0,
      groups: [
        {
          id: 'g-1',
          rangeLabel: '25.01.2025',
          messages: [
            {
              id: 'm-1',
              isMine: false,
              text: 'Здравствуйте! Это старт диалога. Если нужна помощь — просто ответьте в этом чате.',
              timeLabel: '14.05.2024',
            },
            { id: 'm-2', isMine: true, text: 'Принял, спасибо!', timeLabel: '14.05.2024' },
          ],
        },
        {
          id: 'g-2',
          rangeLabel: '27.01.2025',
          messages: [
            {
              id: 'm-3',
              isMine: true,
              text: 'Подскажите, где посмотреть историю начислений?',
              timeLabel: '12.01.2026',
            },
            {
              id: 'm-4',
              isMine: false,
              text: 'История доступна в разделе «Отчёт» — выгрузил вам свежий файл.',
              timeLabel: '12.01.2026',
            },
            {
              id: 'm-5',
              isMine: true,
              text: 'Увидел, спасибо. Можно ещё разбивку по месяцам?',
              timeLabel: '12.01.2026',
            },
          ],
        },
        {
          id: 'g-3',
          rangeLabel: 'Сегодня',
          messages: [
            {
              id: 'm-6',
              isMine: false,
              text: 'Поняли вас. Последние начисления добавили в отчёт по аккаунту.',
              timeLabel: 'вчера, 19:30',
            },
            { id: 'm-7', isMine: true, text: 'Проверил, всё корректно 👌', timeLabel: 'вчера, 19:34' },
            {
              id: 'm-8',
              isMine: false,
              text: 'Дополнительно отправили вам файл с разбивкой по месяцам.',
              timeLabel: 'сегодня, 09:12',
            },
            {
              id: 'm-9',
              isMine: true,
              text: 'Файл загрузился, благодарю за оперативность.',
              timeLabel: 'сегодня, 09:15',
            },
          ],
        },
      ],
    },
    {
      id: 'support-notice',
      title: 'Отчет об ошибке',
      subtitle: 'Чат поддержки',
      lastPreview: 'Поддержка начала диалог по безопасности аккаунта.',
      lastTimeLabel: 'Вчера',
      unreadCount: 2,
      groups: [
        {
          id: 'g-4',
          rangeLabel: '26.01.2025',
          messages: [
            {
              id: 'm-10',
              isMine: false,
              text: 'Система обнаружила вход в аккаунт с нового устройства.',
              timeLabel: '26.01.2025, 08:05',
            },
            { id: 'm-11', isMine: true, text: 'Подтверждаю, это был мой вход.', timeLabel: '26.01.2025, 08:07' },
          ],
        },
        {
          id: 'g-5',
          rangeLabel: 'Сегодня',
          messages: [
            {
              id: 'm-12',
              isMine: false,
              text: 'Поддержка инициировала диалог: зафиксирован вход с нового устройства.',
              timeLabel: 'вчера, 18:05',
            },
            { id: 'm-13', isMine: true, text: 'Это был я, вход подтверждаю.', timeLabel: 'вчера, 18:07' },
            { id: 'm-14', isMine: false, text: 'Спасибо, отметили вход как безопасный.', timeLabel: 'вчера, 18:08' },
          ],
        },
      ],
    },
  ]);

  protected readonly activeDialogId = signal<string>('support-technical');
  protected readonly mobileDetailOpen = signal(false);
  protected readonly newTicketMode = signal(false);
  protected readonly chatMessage = signal('');
  protected readonly ticketTopic = signal('Общий вопрос');
  protected readonly ticketMessage = signal('');
  protected readonly selectedFileName = signal<string | null>(null);
  protected readonly selectedTicketFileName = signal<string | null>(null);
  protected readonly showEmojiPicker = signal(false);
  protected readonly showTicketEmojiPicker = signal(false);

  private generatedCounter = 0;

  protected readonly activeDialog = computed(
    () => this.dialogs().find((dialog) => dialog.id === this.activeDialogId()) ?? null,
  );
  protected readonly hasDialogs = computed(() => this.dialogs().length > 0);
  protected readonly showWelcome = computed(() => !this.newTicketMode() && !this.activeDialog() && !this.hasDialogs());

  protected readonly cardPt = {
    body: { class: 'p-0 h-full' },
    content: { class: 'p-0 h-full' },
  };

  constructor() {
    if (window.innerWidth < 1024) {
      this.mobileDetailOpen.set(false);
    }
  }

  protected openDialog(dialogId: string): void {
    this.activeDialogId.set(dialogId);
    this.newTicketMode.set(false);
    this.showEmojiPicker.set(false);

    this.dialogs.update((dialogs) =>
      dialogs.map((dialog) => (dialog.id === dialogId ? { ...dialog, unreadCount: 0 } : dialog)),
    );

    if (window.innerWidth < 1024) {
      this.mobileDetailOpen.set(true);
    }
  }

  protected openNewTicket(): void {
    this.newTicketMode.set(true);
    this.activeDialogId.set('');
    this.mobileDetailOpen.set(window.innerWidth < 1024);
  }

  protected closeDetailOnMobile(): void {
    if (window.innerWidth >= 1024) {
      return;
    }
    this.mobileDetailOpen.set(false);
  }

  protected appendEmoji(emoji: string, isTicket = false): void {
    if (isTicket) {
      this.ticketMessage.update((message) => `${message}${emoji}`);
      return;
    }
    this.chatMessage.update((message) => `${message}${emoji}`);
  }

  protected onChatFileSelected(event: Event): void {
    const target = event.target as HTMLInputElement;
    const file = target.files?.[0];
    this.selectedFileName.set(file?.name ?? null);
  }

  protected onTicketFileSelected(event: Event): void {
    const target = event.target as HTMLInputElement;
    const file = target.files?.[0];
    this.selectedTicketFileName.set(file?.name ?? null);
  }

  protected clearChatAttachment(input: HTMLInputElement): void {
    this.selectedFileName.set(null);
    input.value = '';
  }

  protected clearTicketAttachment(input: HTMLInputElement): void {
    this.selectedTicketFileName.set(null);
    input.value = '';
  }

  protected submitChatMessage(): void {
    const trimmed = this.chatMessage().trim();
    const fileName = this.selectedFileName();
    if (!trimmed && !fileName) {
      return;
    }

    const active = this.activeDialog();
    if (!active) {
      return;
    }

    const time = this.formatTime();
    const messageText = fileName ? `📎 Файл: ${fileName}${trimmed ? `\n${trimmed}` : ''}` : trimmed;
    const userMessage: ChatMessage = {
      id: this.generateId('msg-user'),
      text: messageText,
      isMine: true,
      timeLabel: time,
    };

    this.pushMessage(active.id, userMessage);

    this.chatMessage.set('');
    this.selectedFileName.set(null);
    this.showEmojiPicker.set(false);

    setTimeout(() => {
      const reply: ChatMessage = {
        id: this.generateId('msg-auto'),
        text: 'Спасибо! Автоответ: получили ваше сообщение и уже передали специалисту.',
        isMine: false,
        timeLabel: this.formatTime(),
      };
      this.pushMessage(active.id, reply);
    }, 900);
  }

  protected submitNewTicket(): void {
    const topic = this.ticketTopic();
    const trimmed = this.ticketMessage().trim();
    const fileName = this.selectedTicketFileName();

    if (!trimmed && !fileName) {
      return;
    }

    this.generatedCounter += 1;
    const targetId = `support-generated-${this.generatedCounter}`;
    const time = this.formatTime();
    const firstMessage = fileName ? `📎 Файл: ${fileName}${trimmed ? `\n${trimmed}` : ''}` : trimmed;

    const newDialog: ChatDialog = {
      id: targetId,
      title: topic,
      subtitle: 'Чат поддержки',
      lastPreview: trimmed || 'Прикреплен файл',
      lastTimeLabel: time,
      unreadCount: 0,
      groups: [
        {
          id: this.generateId('group'),
          rangeLabel: 'Сегодня',
          messages: [
            {
              id: this.generateId('msg'),
              text: firstMessage,
              isMine: true,
              timeLabel: time,
            },
            {
              id: this.generateId('msg'),
              text: `Здравствуйте! Тема «${topic}» принята в работу. Мы скоро ответим подробнее.`,
              isMine: false,
              timeLabel: time,
            },
          ],
        },
      ],
    };

    this.dialogs.update((dialogs) => [newDialog, ...dialogs]);
    this.ticketTopic.set('Общий вопрос');
    this.ticketMessage.set('');
    this.selectedTicketFileName.set(null);
    this.showTicketEmojiPicker.set(false);

    this.openDialog(targetId);
  }

  @HostListener('document:click', ['$event'])
  protected onDocumentClick(event: Event): void {
    const target = event.target as HTMLElement;
    if (!target.closest('.chat-page__composer')) {
      this.showEmojiPicker.set(false);
      this.showTicketEmojiPicker.set(false);
    }
  }

  @HostListener('window:resize')
  protected onResize(): void {
    if (window.innerWidth >= 1024) {
      this.mobileDetailOpen.set(false);
    }
  }

  protected onChatEnter(event: Event): void {
    const keyboardEvent = event as KeyboardEvent;
    if (keyboardEvent.key === 'Enter' && !keyboardEvent.shiftKey) {
      keyboardEvent.preventDefault();
      this.submitChatMessage();
    }
  }

  protected onTicketEnter(event: Event): void {
    const keyboardEvent = event as KeyboardEvent;
    if (keyboardEvent.key === 'Enter' && !keyboardEvent.shiftKey) {
      keyboardEvent.preventDefault();
      this.submitNewTicket();
    }
  }

  private pushMessage(dialogId: string, message: ChatMessage): void {
    this.dialogs.update((dialogs) =>
      dialogs.map((dialog) => {
        if (dialog.id !== dialogId) {
          return dialog;
        }

        const groups = [...dialog.groups];
        const todayGroup = groups.at(-1);
        if (!todayGroup || todayGroup.rangeLabel !== 'Сегодня') {
          groups.push({
            id: this.generateId('group'),
            rangeLabel: 'Сегодня',
            messages: [message],
          });
        } else {
          groups[groups.length - 1] = {
            ...todayGroup,
            messages: [...todayGroup.messages, message],
          };
        }

        return {
          ...dialog,
          groups,
          lastPreview: message.text.replace(/\n/g, ' ').slice(0, 90),
          lastTimeLabel: this.formatTime(),
        };
      }),
    );
  }

  private formatTime(): string {
    return new Date().toLocaleTimeString('ru-RU', { hour: '2-digit', minute: '2-digit' });
  }

  private generateId(prefix: string): string {
    return `${prefix}-${Math.random().toString(16).slice(2, 10)}`;
  }
}
