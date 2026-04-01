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
import { MessageService } from 'primeng/api';
import { FormControlSelectComponent } from '../../shared/components/form-controls/form-control-select.component';
import { FormControlShellComponent } from '../../shared/components/form-controls/form-control-shell.component';
import {
  BackendConversation,
  ChatDateGroup,
  ChatDialog,
  ChatMessage,
  isBackendConversationList,
  mapBackendConversationsToDialogs,
} from './chat-adapter';
import { CHAT_DIALOGS_STORAGE_KEY, CHAT_DIALOGS_UPDATED_EVENT } from './chat-storage.constants';

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
  private readonly messageService = inject(MessageService);

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
  private readonly dialogsStorageKey = CHAT_DIALOGS_STORAGE_KEY;

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
    const restoredDialogs = this.readStoredDialogs() ?? this.buildDemoDialogs();
    this.generatedCounter = this.resolveGeneratedCounter(restoredDialogs);
    this.setDialogs(restoredDialogs);

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

    const now = new Date();
    const messageText = fileName ? `📎 Файл: ${fileName}${trimmed ? `\n${trimmed}` : ''}` : trimmed;
    this.pushMessage(active.id, {
      id: this.generateId('msg-user'),
      text: messageText,
      isMine: true,
      createdDate: now.toISOString(),
    });

    this.chatMessage.set('');
    this.selectedFileName.set(null);
    this.showEmojiPicker.set(false);

    this.scrollMessagesToBottom();

    setTimeout(() => {
      this.pushMessage(active.id, {
        id: this.generateId('msg-auto'),
        text: 'Спасибо! Автоответ: получили ваше сообщение и уже передали специалисту.',
        isMine: false,
        createdDate: new Date().toISOString(),
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
    const now = new Date();
    const firstMessage = fileName ? `📎 Файл: ${fileName}${trimmed ? `\n${trimmed}` : ''}` : trimmed;

    const newDialog: ChatDialog = {
      id: targetId,
      title: topic,
      subtitle: 'Чат поддержки',
      unreadCount: 0,
      groups: [
        {
          id: this.generateId('group'),
          date: this.toIsoDate(now),
          messages: [
            {
              id: this.generateId('msg'),
              text: firstMessage,
              isMine: true,
              createdDate: now.toISOString(),
            },
          ],
        },
      ],
    };

    this.updateDialogs((dialogs) => [newDialog, ...dialogs]);
    this.ticketTopic.set('Общий вопрос');
    this.ticketMessage.set('');
    this.selectedTicketFileName.set(null);
    this.showTicketEmojiPicker.set(false);
    this.messageService.add({
      severity: 'success',
      summary: 'Обращение создано',
      detail: 'Новый диалог добавлен в список.',
    });

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
      this.updateDialogs((dialogs) =>
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

  private setDialogs(dialogs: ChatDialog[]): void {
    const normalized = this.sortDialogsByLastMessage(this.normalizeDialogs(dialogs));
    this.dialogs.set(normalized);
    this.storeDialogs(normalized);
  }

  private updateDialogs(updateFn: (dialogs: ChatDialog[]) => ChatDialog[]): void {
    const nextDialogs = this.sortDialogsByLastMessage(this.normalizeDialogs(updateFn(this.dialogs())));
    this.dialogs.set(nextDialogs);
    this.storeDialogs(nextDialogs);
  }

  private storeDialogs(dialogs: ChatDialog[]): void {
    if (typeof window === 'undefined') {
      return;
    }

    window.localStorage.setItem(this.dialogsStorageKey, JSON.stringify(dialogs));
    window.dispatchEvent(new CustomEvent(CHAT_DIALOGS_UPDATED_EVENT));
  }

  private readStoredDialogs(): ChatDialog[] | null {
    if (typeof window === 'undefined') {
      return null;
    }

    const raw = window.localStorage.getItem(this.dialogsStorageKey);
    if (!raw) {
      return null;
    }

    try {
      const parsed = JSON.parse(raw) as unknown;
      if (!Array.isArray(parsed)) {
        return null;
      }
      if (isBackendConversationList(parsed)) {
        return mapBackendConversationsToDialogs(parsed, {
          generateId: (prefix) => this.generateId(prefix),
          toIsoDate: (date) => this.toIsoDate(date),
        });
      }
      return parsed as ChatDialog[];
    } catch {
      return null;
    }
  }

  private resolveGeneratedCounter(dialogs: ChatDialog[]): number {
    const generatedIds = dialogs
      .map((dialog) => dialog.id)
      .filter((id) => id.startsWith('support-generated-'))
      .map((id) => Number.parseInt(id.replace('support-generated-', ''), 10))
      .filter((id) => Number.isFinite(id));

    return generatedIds.length ? Math.max(...generatedIds) : 0;
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
    this.updateDialogs((dialogs) =>
      dialogs.map((dialog) => {
        if (dialog.id !== dialogId) {
          return dialog;
        }

        const groups = [...dialog.groups];
        const todayGroup = groups.at(-1);
        const messageDate = this.toIsoDate(new Date(message.createdDate));
        if (!todayGroup || todayGroup.date !== messageDate) {
          groups.push({ id: this.generateId('group'), date: messageDate, messages: [message] });
        } else {
          groups[groups.length - 1] = { ...todayGroup, messages: [...todayGroup.messages, message] };
        }

        return {
          ...dialog,
          groups,
        };
      }),
    );
  }

  private buildDemoDialogs(): ChatDialog[] {
    return mapBackendConversationsToDialogs(this.buildDemoBackendConversations(), {
      generateId: (prefix) => this.generateId(prefix),
      toIsoDate: (date) => this.toIsoDate(date),
    });
  }

  protected getDialogPreview(dialog: ChatDialog): string {
    const message = this.getLastMessage(dialog);
    return message ? message.text.replace(/\n/g, ' ').slice(0, 90) : 'Нет сообщений';
  }

  protected getDialogListTimestampLabel(dialog: ChatDialog): string {
    const message = this.getLastMessage(dialog);
    if (!message) {
      return '';
    }

    return this.formatDialogListTimestamp(new Date(message.createdDate));
  }

  protected getMessageTimestampLabel(message: ChatMessage): string {
    return this.formatMessageTimestamp(new Date(message.createdDate));
  }

  protected getGroupDateLabel(group: ChatDateGroup): string {
    return this.formatGroupDateLabel(new Date(group.date));
  }

  private formatMessageTimestamp(date: Date): string {
    const now = new Date();
    if (this.isSameDay(date, now)) {
      return date.toLocaleTimeString('ru-RU', { hour: '2-digit', minute: '2-digit' });
    }

    if (this.dayDiffFromToday(date) === 1) {
      return `Вчера, ${date.toLocaleTimeString('ru-RU', { hour: '2-digit', minute: '2-digit' })}`;
    }

    return `${date.toLocaleDateString('ru-RU')}, ${date.toLocaleTimeString('ru-RU', { hour: '2-digit', minute: '2-digit' })}`;
  }

  private formatDialogListTimestamp(date: Date): string {
    if (this.isSameDay(date, new Date())) {
      return date.toLocaleTimeString('ru-RU', { hour: '2-digit', minute: '2-digit' });
    }

    const dayDiff = this.dayDiffFromToday(date);
    if (dayDiff === 1) {
      return 'Вчера';
    }
    if (dayDiff > 1 && dayDiff <= 7) {
      const dayShort = date.toLocaleDateString('ru-RU', { weekday: 'short' });
      return dayShort.charAt(0).toUpperCase() + dayShort.slice(1);
    }

    return date.toLocaleDateString('ru-RU');
  }

  private formatGroupDateLabel(date: Date): string {
    return this.isSameDay(date, new Date()) ? 'Сегодня' : date.toLocaleDateString('ru-RU');
  }

  private generateId(prefix: string): string {
    return `${prefix}-${Math.random().toString(16).slice(2, 10)}`;
  }

  private getLastMessage(dialog: ChatDialog): ChatMessage | null {
    const group = dialog.groups.at(-1);
    const message = group?.messages.at(-1);
    return message ?? null;
  }

  private sortDialogsByLastMessage(dialogs: ChatDialog[]): ChatDialog[] {
    return [...dialogs].sort((left, right) => {
      const leftTime = this.getLastMessageTime(left);
      const rightTime = this.getLastMessageTime(right);
      return rightTime - leftTime;
    });
  }

  private getLastMessageTime(dialog: ChatDialog): number {
    const message = this.getLastMessage(dialog);
    return message ? new Date(message.createdDate).getTime() : 0;
  }

  private normalizeDialogs(dialogs: ChatDialog[]): ChatDialog[] {
    return dialogs.map((dialog, dialogIndex) => ({
      ...dialog,
      groups: dialog.groups
        .map((group, groupIndex) => ({
          ...group,
          date: this.normalizeGroupDate(group, dialogIndex, groupIndex),
          messages: group.messages
            .map((message, messageIndex) => {
              const parsedDate = new Date((message as Partial<ChatMessage>).createdDate ?? '');
              const createdDate = Number.isNaN(parsedDate.getTime())
                ? new Date(Date.now() - (dialogIndex + groupIndex + messageIndex) * 60_000).toISOString()
                : parsedDate.toISOString();

              return {
                ...message,
                createdDate,
              };
            })
            .sort((left, right) => new Date(left.createdDate).getTime() - new Date(right.createdDate).getTime()),
        }))
        .sort((left, right) => new Date(left.date).getTime() - new Date(right.date).getTime()),
    }));
  }

  private isSameDay(left: Date, right: Date): boolean {
    return (
      left.getFullYear() === right.getFullYear() &&
      left.getMonth() === right.getMonth() &&
      left.getDate() === right.getDate()
    );
  }

  private startOfDay(date: Date): Date {
    return new Date(date.getFullYear(), date.getMonth(), date.getDate());
  }

  private dayDiffFromToday(date: Date): number {
    return Math.floor(
      (this.startOfDay(new Date()).getTime() - this.startOfDay(date).getTime()) / (24 * 60 * 60 * 1000),
    );
  }

  private toIsoDate(date: Date): string {
    if (Number.isNaN(date.getTime())) {
      return this.startOfDay(new Date()).toISOString();
    }

    return this.startOfDay(date).toISOString();
  }

  private normalizeGroupDate(group: ChatDateGroup, dialogIndex: number, groupIndex: number): string {
    const parsedGroupDate = new Date(group.date);
    if (!Number.isNaN(parsedGroupDate.getTime())) {
      return this.toIsoDate(parsedGroupDate);
    }

    const fallbackMessage = group.messages.at(0);
    if (fallbackMessage) {
      const fallbackMessageDate = new Date(fallbackMessage.createdDate);
      if (!Number.isNaN(fallbackMessageDate.getTime())) {
        return this.toIsoDate(fallbackMessageDate);
      }
    }

    return this.toIsoDate(new Date(Date.now() - (dialogIndex + groupIndex) * 60_000));
  }

  private buildDemoBackendConversations(): BackendConversation[] {
    return [
      {
        id: 28,
        type: 'OPERATOR_TO_OPERATOR',
        status: 'CUSTOMER_PENDING',
        subject: 'Предупреждение',
        lastMessageAt: new Date().toISOString(),
        createdDate: new Date().toISOString(),
        lastModifiedDate: new Date().toISOString(),
        createdBy: 'demo@invest.me',
        lastModifiedBy: 'demo@invest.me',
        initiatorId: 'demo-1',
        initiatorFullName: 'Demo User',
        initiatorEmail: 'demo@invest.me',
        initiatorPhone: '000',
        initiatorAvatarUrl: null,
        messageCount: null,
        participants: null,
        lastMessage: { id: 206, content: 'Последнее сообщение сегодня', createdDate: new Date().toISOString() },
        unreadCount: 2,
      } as BackendConversation,
      {
        id: 27,
        type: 'USER_TO_OPERATOR',
        status: 'PENDING_ACCEPTANCE',
        subject: 'Счета и платежи',
        lastMessageAt: new Date(Date.now() - 24 * 60 * 60 * 1000).toISOString(),
        createdDate: new Date().toISOString(),
        lastModifiedDate: new Date().toISOString(),
        createdBy: 'demo@invest.me',
        lastModifiedBy: 'demo@invest.me',
        initiatorId: 'demo-2',
        initiatorFullName: 'Demo User',
        initiatorEmail: 'demo@invest.me',
        initiatorPhone: '000',
        initiatorAvatarUrl: null,
        messageCount: null,
        participants: null,
        lastMessage: {
          id: 205,
          content: 'Последнее сообщение было вчера',
          createdDate: new Date(Date.now() - 24 * 60 * 60 * 1000).toISOString(),
        },
        unreadCount: 1,
      } as BackendConversation,
      {
        id: 24,
        type: 'USER_TO_OPERATOR',
        status: 'ACTIVE',
        subject: 'Предупреждение тест',
        lastMessageAt: new Date(Date.now() - 3 * 24 * 60 * 60 * 1000).toISOString(),
        createdDate: new Date().toISOString(),
        lastModifiedDate: new Date().toISOString(),
        createdBy: 'demo@invest.me',
        lastModifiedBy: 'demo@invest.me',
        initiatorId: 'demo-3',
        initiatorFullName: 'Demo User',
        initiatorEmail: 'demo@invest.me',
        initiatorPhone: '000',
        initiatorAvatarUrl: null,
        messageCount: null,
        participants: null,
        lastMessage: {
          id: 169,
          content: 'Сообщение в пределах недели',
          createdDate: new Date(Date.now() - 3 * 24 * 60 * 60 * 1000).toISOString(),
        },
        unreadCount: 0,
      } as BackendConversation,
      {
        id: 22,
        type: 'USER_TO_OPERATOR',
        status: 'ACTIVE',
        subject: 'Общий вопрос',
        lastMessageAt: new Date(Date.now() - 15 * 24 * 60 * 60 * 1000).toISOString(),
        createdDate: new Date().toISOString(),
        lastModifiedDate: new Date().toISOString(),
        createdBy: 'demo@invest.me',
        lastModifiedBy: 'demo@invest.me',
        initiatorId: 'demo-4',
        initiatorFullName: 'Demo User',
        initiatorEmail: 'demo@invest.me',
        initiatorPhone: '000',
        initiatorAvatarUrl: null,
        messageCount: null,
        participants: null,
        lastMessage: {
          id: 167,
          content: 'Старое сообщение',
          createdDate: new Date(Date.now() - 15 * 24 * 60 * 60 * 1000).toISOString(),
        },
        unreadCount: 0,
      } as BackendConversation,
    ];
  }
}
