import { NgClass, ViewportScroller } from '@angular/common';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import { CardModule } from 'primeng/card';
import { Component, computed, DestroyRef, HostListener, inject, signal, ViewEncapsulation } from '@angular/core';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import {
  LucideArrowUpDown,
  LucideBell,
  LucideBellRing,
  LucideChevronLeft,
  LucideDynamicIcon,
  LucideListChecks,
  LucideSearch,
  LucideSearchX,
} from '@lucide/angular';
import { ButtonModule } from 'primeng/button';
import { CheckboxModule } from 'primeng/checkbox';

import { FormControlTextComponent } from '../../shared/components/form-controls/form-control-text.component';
import { AppMenuItem, MenuComponent } from '../../shared/components/menu/menu.component';
import {
  NotificationsKnowledgeBaseService,
  NotificationSort,
  NotificationType,
} from './notifications-knowledge-base.service';

@Component({
  selector: 'app-notifications-page',
  standalone: true,
  imports: [
    FormsModule,
    ReactiveFormsModule,
    NgClass,
    CardModule,
    ButtonModule,
    CheckboxModule,
    FormControlTextComponent,
    MenuComponent,
    LucideBell,
    LucideBellRing,
    LucideSearchX,
    LucideListChecks,
    LucideArrowUpDown,
    LucideChevronLeft,
    LucideDynamicIcon,
  ],
  styleUrl: './notifications-page.component.css',
  encapsulation: ViewEncapsulation.None,
  templateUrl: './notifications-page.component.html',
})
export class NotificationsPageComponent {
  protected readonly store = inject(NotificationsKnowledgeBaseService);
  protected readonly route = inject(ActivatedRoute);
  protected readonly router = inject(Router);
  protected readonly viewportScroller = inject(ViewportScroller);
  private readonly destroyRef = inject(DestroyRef);

  protected readonly searchIcon = LucideSearch;

  protected readonly filtersForm = new FormGroup({
    search: new FormControl('', { nonNullable: true }),
  });

  protected readonly typeFilter = signal<NotificationType | 'all'>('all');
  protected readonly sort = signal<NotificationSort>('date_desc');
  protected readonly selectedNotificationId = signal<string | null>(null);
  protected readonly selectMode = signal(false);
  protected readonly mobileDetailOpen = signal(false);
  protected readonly selectedBulkIds = signal(new Set<string>());

  protected readonly typeSegments = [
    { value: 'all', label: 'Все' },
    { value: 'info', label: 'Info' },
    { value: 'warning', label: 'Warning' },
    { value: 'critical', label: 'Critical' },
  ] as const;

  protected readonly rows = computed(() =>
    this.store.getFilteredRows({
      type: this.typeFilter(),
      search: this.filtersForm.controls.search.value,
      sort: this.sort(),
    }),
  );

  protected readonly selectedItem = computed(() => this.store.getById(this.selectedNotificationId()));

  protected readonly sortOptions: { value: NotificationSort; label: string }[] = [
    { value: 'date_desc', label: 'Сначала новые' },
    { value: 'date_asc', label: 'Сначала старые' },
    { value: 'unread_first', label: 'Сначала непрочитанные' },
    { value: 'read_first', label: 'Сначала прочитанные' },
  ];

  protected readonly cardPt = {
    body: { class: 'p-0 h-full' },
    content: { class: 'p-0 h-full' },
  };

  constructor() {
    this.filtersForm.controls.search.valueChanges.pipe(takeUntilDestroyed(this.destroyRef)).subscribe(() => {
      this.selectedBulkIds.set(new Set<string>());
    });

    this.route.paramMap.pipe(takeUntilDestroyed(this.destroyRef)).subscribe((params) => {
      const routeId = params.get('id');
      if (!routeId) {
        return;
      }

      const item = this.store.getById(routeId);
      if (!item) {
        return;
      }

      this.selectedNotificationId.set(item.id);
      if (!item.isRead) {
        this.store.markAsRead(item.id);
      }

      if (window.innerWidth < 1024) {
        this.mobileDetailOpen.set(true);
      }
    });
  }

  protected get sortMenuItems(): AppMenuItem[] {
    return this.sortOptions.map((option) => ({
      label: option.label,
      active: this.sort() === option.value,
      linkClass: 'notifications-sort-menu__item-link',
      command: () => this.sort.set(option.value),
    }));
  }

  protected openSortMenu(event: MouseEvent, sortMenu: MenuComponent): void {
    sortMenu.toggle(event);
  }

  @HostListener('window:resize')
  protected onResize(): void {
    if (window.innerWidth >= 1024) {
      this.mobileDetailOpen.set(false);
    }
  }

  protected setTypeFilter(type: NotificationType | 'all'): void {
    this.typeFilter.set(type);
  }

  protected toggleSelectMode(): void {
    const next = !this.selectMode();
    this.selectMode.set(next);

    if (!next) {
      this.selectedBulkIds.set(new Set<string>());
      return;
    }

    this.closeDetailOnMobile();
  }

  protected onBulkToggle(id: string, checked: boolean): void {
    const next = new Set(this.selectedBulkIds());
    if (checked) {
      next.add(id);
    } else {
      next.delete(id);
    }
    this.selectedBulkIds.set(next);
  }

  protected bulkMark(isRead: boolean): void {
    this.store.markMany(this.selectedBulkIds(), isRead);
    this.selectedBulkIds.set(new Set<string>());
    this.selectMode.set(false);
  }

  protected bulkDelete(): void {
    const ids = this.selectedBulkIds();
    this.store.removeMany(ids);

    const selectedId = this.selectedNotificationId();
    if (selectedId && ids.has(selectedId)) {
      this.selectedNotificationId.set(null);
      void this.router.navigate(['/notifications']);
    }

    this.selectedBulkIds.set(new Set<string>());
    this.selectMode.set(false);
  }

  protected openItem(id: string): void {
    if (this.selectMode()) {
      const next = new Set(this.selectedBulkIds());
      if (next.has(id)) {
        next.delete(id);
      } else {
        next.add(id);
      }
      this.selectedBulkIds.set(next);
      return;
    }

    this.selectedNotificationId.set(id);
    this.store.markAsRead(id);
    void this.router.navigate(['/notifications', id]);

    if (window.innerWidth < 1024) {
      this.mobileDetailOpen.set(true);
      this.viewportScroller.scrollToPosition([0, 0]);
    }
  }

  protected closeDetailOnMobile(): void {
    if (window.innerWidth >= 1024) {
      return;
    }
    this.mobileDetailOpen.set(false);
  }

  protected relativeDate(iso: string): string {
    const date = new Date(iso);
    const diff = Date.now() - date.getTime();
    const hours = Math.floor(diff / 3600000);

    if (hours < 1) {
      return 'только что';
    }
    if (hours < 24) {
      return `${hours} ч назад`;
    }

    const days = Math.floor(hours / 24);
    if (days < 7) {
      return `${days} д назад`;
    }

    return date.toLocaleDateString('ru-RU', { day: '2-digit', month: 'short' });
  }

  protected fullDate(iso: string): string {
    return new Date(iso).toLocaleString('ru-RU', {
      day: '2-digit',
      month: 'long',
      year: 'numeric',
      hour: '2-digit',
      minute: '2-digit',
    });
  }
}
