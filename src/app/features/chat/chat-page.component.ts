import { NgClass } from '@angular/common';
import {
  AfterViewInit,
  Component,
  computed,
  DestroyRef,
  ElementRef,
  HostListener,
  inject,
  signal,
  ViewChild,
  ViewEncapsulation,
} from '@angular/core';
import { FormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import {
  LucideChevronLeft,
  LucideCirclePlus,
  LucideMessageCircle,
  LucidePaperclip,
  LucideSendHorizontal,
  LucideSmile,
  LucideX,
} from '@lucide/angular';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import { ButtonModule } from 'primeng/button';
import { DividerModule } from 'primeng/divider';
import { CardModule } from 'primeng/card';
import { TextareaModule } from 'primeng/textarea';
import { PopoverModule } from 'primeng/popover';
import { FormControlSelectComponent } from '../../shared/components/form-controls/form-control-select.component';
import { FormControlShellComponent } from '../../shared/components/form-controls/form-control-shell.component';

type ChatMessage = { id: string; text: string; isMine: boolean; timeLabel: string };
type ChatDateGroup = { id: string; rangeLabel: string; messages: ChatMessage[] };
type ChatDialog = {
  id: string;
  title: string;
  subtitle: string;
  lastPreview: string;
  lastTimeLabel: string;
  unreadCount: number;
  groups: ChatDateGroup[];
};
type TicketTopicOption = { label: string; value: string };

type ComposerKind = 'chat' | 'ticket';

@Component({
  selector: 'app-chat-page',
  host: { class: 'app-page' },
  standalone: true,
  imports: [
    FormsModule,
    NgClass,
    CardModule,
    ButtonModule,
    DividerModule,
    TextareaModule,
    PopoverModule,
    FormControlSelectComponent,
    FormControlShellComponent,
    LucideMessageCircle,
    LucideChevronLeft,
    LucideCirclePlus,
    LucidePaperclip,
    LucideSmile,
    LucideSendHorizontal,
    LucideX,
  ],
  templateUrl: './chat-page.component.html',
  styleUrl: './chat-page.component.css',
  encapsulation: ViewEncapsulation.None,
})
export class ChatPageComponent implements AfterViewInit {
  @ViewChild('messagesScrollContainer')
  private readonly messagesScrollContainer?: ElementRef<HTMLDivElement>;

  @ViewChild('dialogsScrollContainer')
  private readonly dialogsScrollContainer?: ElementRef<HTMLDivElement>;

  private readonly destroyRef = inject(DestroyRef);
  private readonly router = inject(Router);
  private readonly route = inject(ActivatedRoute);

  private readonly listScrollTop = signal(this.readStoredListScroll());
  private readonly isMobile = signal(typeof window !== 'undefined' ? window.innerWidth < 1024 : false);
  private readonly chatCaret = signal({ start: 0, end: 0 });
  private readonly ticketCaret = signal({ start: 0, end: 0 });

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

  protected readonly dialogs = signal<ChatDialog[]>([]);
  protected readonly activeDialogId = signal('');
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
  protected readonly mobileDetailOpen = computed(
    () => this.isMobile() && (this.newTicketMode() || Boolean(this.activeDialogId())),
  );
  protected readonly showWelcome = computed(() => !this.newTicketMode() && !this.activeDialogId());
  protected readonly hasDialogs = computed(() => this.dialogs().length > 0);

  protected readonly cardPt = { body: { class: 'p-0' }, content: { class: 'p-0' } };

  constructor() {
    this.dialogs.set(this.buildDemoDialogs());

    this.route.url.pipe(takeUntilDestroyed(this.destroyRef)).subscribe(() => {
      this.applyRouteState();
      this.restoreDialogListScroll();
      this.scrollMessagesToBottom();
    });
  }

  ngAfterViewInit(): void {
    this.applyRouteState();
    this.restoreDialogListScroll();
    this.scrollMessagesToBottom();
  }

  protected onTicketTopicChange(value: unknown): void {
    if (typeof value === 'string') {
      this.ticketTopic.set(value);
    }
  }

  protected openDialog(dialogId: string): void {
    this.router.navigate(['/chat/conversation', dialogId]);
  }

  protected openNewTicket(): void {
    this.router.navigate(['/chat/new']);
  }

  protected closeDetailOnMobile(): void {
    if (!this.isMobile()) {
      return;
    }
    this.router.navigate(['/chat']);
  }

  protected appendEmoji(emoji: string, isTicket = false): void {
    const kind: ComposerKind = isTicket ? 'ticket' : 'chat';
    this.insertEmojiAtCaret(kind, emoji);
  }

  protected rememberCaret(event: Event, kind: ComposerKind): void {
    const textarea = event.target as HTMLTextAreaElement;
    const nextCaret = { start: textarea.selectionStart ?? 0, end: textarea.selectionEnd ?? 0 };
    if (kind === 'ticket') {
      this.ticketCaret.set(nextCaret);
      return;
    }
    this.chatCaret.set(nextCaret);
  }

  protected onDialogsScroll(event: Event): void {
    const nextScrollTop = (event.target as HTMLDivElement).scrollTop;
    this.listScrollTop.set(nextScrollTop);
    this.storeListScroll(nextScrollTop);
  }

  protected onChatFileSelected(event: Event): void {
    const file = (event.target as HTMLInputElement).files?.[0];
    this.selectedFileName.set(file?.name ?? null);
  }

  protected onTicketFileSelected(event: Event): void {
    const file = (event.target as HTMLInputElement).files?.[0];
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
    const active = this.activeDialog();
    if ((!trimmed && !fileName) || !active) {
      return;
    }

    const time = this.formatTime();
    const messageText = fileName ? `📎 Файл: ${fileName}${trimmed ? `\n${trimmed}` : ''}` : trimmed;
    this.pushMessage(active.id, { id: this.generateId('msg-user'), text: messageText, isMine: true, timeLabel: time });

    this.chatMessage.set('');
    this.selectedFileName.set(null);
    this.showEmojiPicker.set(false);

    this.scrollMessagesToBottom();

    setTimeout(() => {
      this.pushMessage(active.id, {
        id: this.generateId('msg-auto'),
        text: 'Спасибо! Автоответ: получили ваше сообщение и уже передали специалисту.',
        isMine: false,
        timeLabel: this.formatTime(),
      });
      this.scrollMessagesToBottom();
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
          messages: [{ id: this.generateId('msg'), text: firstMessage, isMine: true, timeLabel: time }],
        },
      ],
    };

    this.dialogs.update((dialogs) => [newDialog, ...dialogs]);
    this.ticketTopic.set('Общий вопрос');
    this.ticketMessage.set('');
    this.selectedTicketFileName.set(null);
    this.showTicketEmojiPicker.set(false);

    this.router.navigate(['/chat/conversation', targetId]);
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
    this.isMobile.set(window.innerWidth < 1024);
    this.restoreDialogListScroll();
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

  private insertEmojiAtCaret(kind: ComposerKind, emoji: string): void {
    const value = kind === 'ticket' ? this.ticketMessage() : this.chatMessage();
    const caret = kind === 'ticket' ? this.ticketCaret() : this.chatCaret();
    const nextValue = `${value.slice(0, caret.start)}${emoji}${value.slice(caret.end)}`;
    const nextPos = caret.start + emoji.length;

    if (kind === 'ticket') {
      this.ticketMessage.set(nextValue);
      this.ticketCaret.set({ start: nextPos, end: nextPos });
      queueMicrotask(() => this.restoreCaret('ticket'));
      return;
    }

    this.chatMessage.set(nextValue);
    this.chatCaret.set({ start: nextPos, end: nextPos });
    queueMicrotask(() => this.restoreCaret('chat'));
  }

  private restoreCaret(kind: ComposerKind): void {
    const selector = kind === 'ticket' ? '#ticket-message' : '#chat-message';
    const textarea = document.querySelector<HTMLTextAreaElement>(selector);
    const caret = kind === 'ticket' ? this.ticketCaret() : this.chatCaret();
    textarea?.focus();
    textarea?.setSelectionRange(caret.start, caret.end);
  }

  private applyRouteState(): void {
    const snapshot = this.route.snapshot;
    const mode = snapshot.url[1]?.path ?? '';
    const routeDialogId = snapshot.paramMap.get('id') ?? '';

    if (mode === 'new') {
      this.newTicketMode.set(true);
      this.activeDialogId.set('');
      return;
    }

    if (mode === 'conversation' && routeDialogId) {
      const exists = this.dialogs().some((dialog) => dialog.id === routeDialogId);
      if (!exists) {
        this.router.navigate(['/chat']);
        return;
      }

      this.newTicketMode.set(false);
      this.activeDialogId.set(routeDialogId);
      this.dialogs.update((dialogs) =>
        dialogs.map((dialog) => (dialog.id === routeDialogId ? { ...dialog, unreadCount: 0 } : dialog)),
      );
      return;
    }

    this.newTicketMode.set(false);
    this.activeDialogId.set('');
  }

  private restoreDialogListScroll(): void {
    queueMicrotask(() => {
      const node = this.dialogsScrollContainer?.nativeElement;
      if (node) {
        node.scrollTop = this.listScrollTop();
      }
    });
  }

  private storeListScroll(value: number): void {
    if (typeof window === 'undefined') {
      return;
    }

    window.sessionStorage.setItem('chat-dialogs-scroll-top', String(value));
  }

  private readStoredListScroll(): number {
    if (typeof window === 'undefined') {
      return 0;
    }

    const storedValue = window.sessionStorage.getItem('chat-dialogs-scroll-top');
    return storedValue ? Number.parseFloat(storedValue) || 0 : 0;
  }

  private scrollMessagesToBottom(): void {
    const scrollToLatest = (): void => {
      const node = this.messagesScrollContainer?.nativeElement;
      if (!node) {
        return;
      }

      node.scrollTop = node.scrollHeight;
    };

    queueMicrotask(() => {
      scrollToLatest();
      requestAnimationFrame(scrollToLatest);
    });
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
          groups.push({ id: this.generateId('group'), rangeLabel: 'Сегодня', messages: [message] });
        } else {
          groups[groups.length - 1] = { ...todayGroup, messages: [...todayGroup.messages, message] };
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

  private buildDemoDialogs(): ChatDialog[] {
    const base: ChatDialog[] = [
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
            rangeLabel: 'Сегодня',
            messages: [
              {
                id: 'm-1',
                isMine: false,
                text: 'Здравствуйте! Это старт диалога. Если нужна помощь — просто ответьте в этом чате.',
                timeLabel: '09:30',
              },
            ],
          },
        ],
      },
    ];

    for (let index = 1; index <= 18; index += 1) {
      base.push({
        id: `support-demo-${index}`,
        title: `Диалог #${index}`,
        subtitle: 'Чат поддержки',
        lastPreview: `Демо-сообщение для проверки скролла списка диалогов #${index}.`,
        lastTimeLabel: `${String((index % 12) + 10).padStart(2, '0')}:15`,
        unreadCount: index % 4 === 0 ? 2 : 0,
        groups: [
          {
            id: this.generateId('group'),
            rangeLabel: 'Сегодня',
            messages: [
              {
                id: this.generateId('msg'),
                isMine: index % 2 === 0,
                text: `Это демо-диалог #${index}.`,
                timeLabel: 'сегодня',
              },
            ],
          },
        ],
      });
    }

    return base;
  }

  private formatTime(): string {
    return new Date().toLocaleTimeString('ru-RU', { hour: '2-digit', minute: '2-digit' });
  }

  private generateId(prefix: string): string {
    return `${prefix}-${Math.random().toString(16).slice(2, 10)}`;
  }
}
