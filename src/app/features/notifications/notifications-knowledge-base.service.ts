import { computed, effect, Injectable, signal } from '@angular/core';
import { LucideAlertTriangle, type LucideIcon, LucideInfo, LucideOctagonAlert } from '@lucide/angular';

export type NotificationType = 'info' | 'warning' | 'critical';

export type NotificationItem = {
  id: string;
  type: NotificationType;
  title: string;
  message: string;
  createdAt: string;
  isRead: boolean;
};

export type NotificationSort = 'date_desc' | 'date_asc' | 'unread_first' | 'read_first';

export type NotificationTypeMeta = {
  label: string;
  icon: LucideIcon;
  iconClass: string;
  wrapClass: string;
  chipClass: string;
};

const STORAGE_KEY = 'demo-notifications-v1';

const SEED_NOTIFICATIONS: NotificationItem[] = [
  {
    id: '1001',
    type: 'critical',
    title: 'Подозрительный вход в аккаунт',
    message:
      'Мы зафиксировали вход с нового устройства. Если это были не вы, срочно смените пароль и включите двухфакторную защиту.',
    createdAt: '2026-03-12T10:20:00.000Z',
    isRead: false,
  },
  {
    id: '1002',
    type: 'warning',
    title: 'Рассрочка скоро завершится',
    message: 'По заявке #4829 осталось 3 дня до следующего платежа. Проверьте баланс, чтобы избежать задержки.',
    createdAt: '2026-03-11T16:00:00.000Z',
    isRead: false,
  },
  {
    id: '1003',
    type: 'info',
    title: 'Пополнение успешно завершено',
    message: 'Баланс пополнен на 500 USD через STRIPE. Средства уже доступны в кошельке.',
    createdAt: '2026-03-11T08:40:00.000Z',
    isRead: true,
  },
  {
    id: '1004',
    type: 'info',
    title: 'Новый реферал зарегистрирован',
    message: 'Пользователь по вашей ссылке успешно завершил регистрацию и пополнил счёт.',
    createdAt: '2026-03-10T14:30:00.000Z',
    isRead: false,
  },
  {
    id: '1005',
    type: 'warning',
    title: 'Серверные работы в воскресенье',
    message:
      'В воскресенье с 02:00 до 04:00 UTC будут технические работы. Часть операций может выполняться с задержкой.',
    createdAt: '2026-03-09T09:15:00.000Z',
    isRead: true,
  },
];

@Injectable({ providedIn: 'root' })
export class NotificationsKnowledgeBaseService {
  private readonly itemsState = signal<NotificationItem[]>(this.loadInitial());
  readonly drawerOpen = signal(false);

  readonly items = computed(() => this.itemsState());
  readonly unreadCount = computed(() => this.itemsState().filter((item) => !item.isRead).length);

  readonly typeMeta: Record<NotificationType, NotificationTypeMeta> = {
    info: {
      label: 'Info',
      icon: LucideInfo,
      iconClass: 'text-sky-600 dark:text-sky-300',
      wrapClass: 'bg-sky-500/10 dark:bg-sky-400/10',
      chipClass: 'bg-sky-500/10 text-sky-600 dark:text-sky-300',
    },
    warning: {
      label: 'Warning',
      icon: LucideAlertTriangle,
      iconClass: 'text-amber-600 dark:text-amber-300',
      wrapClass: 'bg-amber-500/10 dark:bg-amber-400/10',
      chipClass: 'bg-amber-500/10 text-amber-700 dark:text-amber-300',
    },
    critical: {
      label: 'Critical',
      icon: LucideOctagonAlert,
      iconClass: 'text-red-600 dark:text-red-300',
      wrapClass: 'bg-red-500/10 dark:bg-red-400/10',
      chipClass: 'bg-red-500/10 text-red-600 dark:text-red-300',
    },
  };

  constructor() {
    effect(() => {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(this.itemsState()));
    });
  }

  getById(id: string | null): NotificationItem | undefined {
    if (!id) {
      return undefined;
    }
    return this.itemsState().find((item) => item.id === id);
  }

  getFilteredRows(params: {
    type?: NotificationType | 'all';
    onlyUnread?: boolean;
    search?: string;
    sort?: NotificationSort;
  }): NotificationItem[] {
    const { type = 'all', onlyUnread = false, search = '', sort = 'date_desc' } = params;

    let rows = this.itemsState().filter((row) => (type === 'all' ? true : row.type === type));

    if (onlyUnread) {
      rows = rows.filter((row) => !row.isRead);
    }

    const normalizedSearch = search.trim().toLowerCase();
    if (normalizedSearch) {
      rows = rows.filter((row) => `${row.title} ${row.message}`.toLowerCase().includes(normalizedSearch));
    }

    return [...rows].sort((a, b) => {
      if (sort === 'unread_first') {
        const delta = Number(a.isRead) - Number(b.isRead);
        if (delta !== 0) {
          return delta;
        }
      }

      if (sort === 'read_first') {
        const delta = Number(b.isRead) - Number(a.isRead);
        if (delta !== 0) {
          return delta;
        }
      }

      return sort === 'date_asc'
        ? new Date(a.createdAt).getTime() - new Date(b.createdAt).getTime()
        : new Date(b.createdAt).getTime() - new Date(a.createdAt).getTime();
    });
  }

  markAsRead(id: string): void {
    this.itemsState.update((items) => items.map((item) => (item.id === id ? { ...item, isRead: true } : item)));
  }

  markMany(ids: Set<string>, isRead: boolean): void {
    this.itemsState.update((items) => items.map((item) => (ids.has(item.id) ? { ...item, isRead } : item)));
  }

  removeMany(ids: Set<string>): void {
    this.itemsState.update((items) => items.filter((item) => !ids.has(item.id)));
  }

  openDrawer(): void {
    this.drawerOpen.set(true);
  }

  closeDrawer(): void {
    this.drawerOpen.set(false);
  }

  toggleDrawer(): void {
    this.drawerOpen.update((open) => !open);
  }

  private loadInitial(): NotificationItem[] {
    try {
      const raw = localStorage.getItem(STORAGE_KEY);
      if (!raw) {
        return [...SEED_NOTIFICATIONS];
      }

      const parsed = JSON.parse(raw) as unknown;
      if (!Array.isArray(parsed)) {
        return [...SEED_NOTIFICATIONS];
      }

      const normalized = parsed
        .map((item, index) => this.normalizeItem(item, index))
        .filter((item): item is NotificationItem => Boolean(item));

      return normalized.length ? normalized : [...SEED_NOTIFICATIONS];
    } catch {
      return [...SEED_NOTIFICATIONS];
    }
  }

  private normalizeItem(raw: unknown, index: number): NotificationItem | null {
    if (!raw || typeof raw !== 'object') {
      return null;
    }

    const candidate = raw as Partial<NotificationItem>;
    const createdAt = typeof candidate.createdAt === 'string' ? candidate.createdAt : '';
    const isDateValid = !Number.isNaN(new Date(createdAt).getTime());
    const type = candidate.type;
    const isTypeValid = type === 'info' || type === 'warning' || type === 'critical';

    if (
      !isTypeValid ||
      typeof candidate.title !== 'string' ||
      !candidate.title.trim() ||
      typeof candidate.message !== 'string' ||
      !candidate.message.trim() ||
      !isDateValid
    ) {
      return null;
    }

    return {
      id: typeof candidate.id === 'string' && candidate.id.trim() ? candidate.id : String(1000 + index),
      type,
      title: candidate.title,
      message: candidate.message,
      createdAt,
      isRead: Boolean(candidate.isRead),
    };
  }
}
