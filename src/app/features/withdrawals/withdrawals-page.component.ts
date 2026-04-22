import { CurrencyPipe, DatePipe } from '@angular/common';
import { Component, DestroyRef, inject, signal } from '@angular/core';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import {
  LucideCheck,
  LucideChevronDown,
  LucideCircleAlert,
  LucideClock3,
  LucideDynamicIcon,
  type LucideIcon,
  LucideList,
  LucideLock,
  LucidePlusCircle,
  LucideShieldCheck,
} from '@lucide/angular';
import { RouterLink } from '@angular/router';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';
import { PaginatorModule, PaginatorState } from 'primeng/paginator';
import { TableModule } from 'primeng/table';
import { TagModule } from 'primeng/tag';

import {
  SortDirection,
  TablePage,
  WithdrawalRequest,
  WithdrawalsMockApiService,
  WithdrawalsOverview,
} from './withdrawals-mock-api.service';

type MobileVisualTone = 'success' | 'warning' | 'danger' | 'surface';

type WithdrawalMobileMeta = {
  amountClass: string;
  icon: LucideIcon;
  iconWrapClass: string;
};

const WITHDRAWAL_STATUS_META = {
  COMPLETED: { severity: 'success', label: 'Завершён', tone: 'success' as MobileVisualTone, icon: LucideCheck },
  PROCESSING: { severity: 'warn', label: 'В обработке', tone: 'warning' as MobileVisualTone, icon: LucideClock3 },
  REJECTED: { severity: 'danger', label: 'Отклонён', tone: 'danger' as MobileVisualTone, icon: LucideCircleAlert },
} as const;

const WITHDRAWAL_BLOCK_REASON_LABELS = {
  INSUFFICIENT_AVAILABLE_BALANCE: 'Недостаточно доступного баланса',
  INSUFFICIENT_REFERRAL_BALANCE: 'Недостаточный реферальный баланс. Для вывода средств вам нужны реферальные доходы.',
  KYC_NOT_SUBMITTED: 'KYC не отправлен. Пожалуйста, завершите проверку личности.',
  KYC_NOT_VERIFIED: 'KYC не проверен. Проверка вашей личности ожидает одобрения.',
  ACCOUNT_NOT_ACTIVE: 'Аккаунт не активен. Пожалуйста, свяжитесь со службой поддержки.',
  WALLET_NOT_ACTIVE: 'Кошелек не активен. Пожалуйста, активируйте свой кошелек.',
  WITHDRAWAL_PENDING:
    'У вас уже есть ожидающий запрос на вывод средств. Пожалуйста, подождите, пока оно будет обработано, прежде чем отправлять новое.',
} as const;

type WithdrawalStatus = keyof typeof WITHDRAWAL_STATUS_META;
type WithdrawalBlockedReason = keyof typeof WITHDRAWAL_BLOCK_REASON_LABELS;

@Component({
  selector: 'app-withdrawals-page',
  standalone: true,
  host: {
    class: 'app-page',
  },
  imports: [
    CardModule,
    TableModule,
    PaginatorModule,
    ButtonModule,
    TagModule,
    RouterLink,
    CurrencyPipe,
    DatePipe,
    LucideDynamicIcon,
    LucideChevronDown,
    LucideList,
    LucidePlusCircle,
  ],
  templateUrl: './withdrawals-page.component.html',
  styleUrl: './withdrawals-page.component.css',
})
export class WithdrawalsPageComponent {
  private readonly destroyRef = inject(DestroyRef);
  private readonly withdrawalsApi = inject(WithdrawalsMockApiService);

  protected readonly pageSize = 4;
  protected readonly overview = signal<WithdrawalsOverview | null>(null);
  protected readonly requestsPage = signal<TablePage<WithdrawalRequest> | null>(null);
  protected readonly expanded = signal<Record<string, boolean>>({});
  protected readonly sort = signal<{ field: keyof WithdrawalRequest; direction: SortDirection }>({
    field: 'requestedDate',
    direction: 'desc',
  });

  constructor() {
    this.loadOverview();
    this.loadRequests(0);
  }

  protected statusMeta(status: string) {
    return (
      WITHDRAWAL_STATUS_META[status as WithdrawalStatus] ?? {
        severity: 'secondary',
        label: status,
        tone: 'surface' as MobileVisualTone,
        icon: LucideCircleAlert,
      }
    );
  }

  protected sortRequests(field: keyof WithdrawalRequest): void {
    const current = this.sort();
    this.sort.set({
      field,
      direction: current.field === field && current.direction === 'asc' ? 'desc' : 'asc',
    });
    this.loadRequests(0);
  }

  protected onPageChange(event: PaginatorState): void {
    const first = event.first ?? 0;
    const rows = event.rows ?? this.pageSize;
    this.loadRequests(Math.floor(first / rows));
  }

  protected toggleDetails(id: string): void {
    this.expanded.update((state) => ({ ...state, [id]: !state[id] }));
  }

  protected withdrawalAvailabilitySeverity(canWithdraw: boolean): 'success' | 'danger' {
    return canWithdraw ? 'success' : 'danger';
  }

  protected withdrawalAvailabilityText(canWithdraw: boolean): string {
    return canWithdraw ? 'Доступен' : 'Ограничен';
  }

  protected withdrawalAvailabilityIcon(canWithdraw: boolean): LucideIcon {
    return canWithdraw ? LucideShieldCheck : LucideLock;
  }

  protected withdrawalBlockedReasonLabel(reason: string | null): string | null {
    if (!reason) {
      return null;
    }

    return WITHDRAWAL_BLOCK_REASON_LABELS[reason as WithdrawalBlockedReason] ?? reason;
  }

  protected mobileMeta(row: WithdrawalRequest): WithdrawalMobileMeta {
    const tone = this.statusMeta(row.status).tone;

    return {
      amountClass: this.amountClassByTone(tone),
      icon: this.statusMeta(row.status).icon,
      iconWrapClass: this.iconWrapClassByTone(tone),
    };
  }

  protected requestedDate(row: WithdrawalRequest): string {
    return row.requestedDate;
  }

  protected networkLabel(row: WithdrawalRequest): string {
    return row.cryptoType ? row.cryptoType.replace('_', ' ') : row.method.replace('_', ' ');
  }

  protected destinationAddress(row: WithdrawalRequest): string {
    return row.cryptoAddressValue ?? '-';
  }

  private iconWrapClassByTone(tone: MobileVisualTone): string {
    return (
      {
        success: 'wallet-mobile-item__icon-wrap wallet-mobile-item__icon-wrap--success',
        warning: 'wallet-mobile-item__icon-wrap wallet-mobile-item__icon-wrap--warning',
        danger: 'wallet-mobile-item__icon-wrap wallet-mobile-item__icon-wrap--danger',
        surface: 'wallet-mobile-item__icon-wrap wallet-mobile-item__icon-wrap--surface',
      }[tone] ?? 'wallet-mobile-item__icon-wrap wallet-mobile-item__icon-wrap--surface'
    );
  }

  private amountClassByTone(tone: MobileVisualTone): string {
    return (
      {
        success: 'wallet-mobile-item__amount wallet-mobile-item__amount--success',
        warning: 'wallet-mobile-item__amount wallet-mobile-item__amount--warning',
        danger: 'wallet-mobile-item__amount wallet-mobile-item__amount--danger',
        surface: 'wallet-mobile-item__amount',
      }[tone] ?? 'wallet-mobile-item__amount'
    );
  }

  private loadOverview(): void {
    this.withdrawalsApi
      .getOverview()
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => this.overview.set(response));
  }

  private loadRequests(page: number): void {
    const sort = this.sort();

    this.withdrawalsApi
      .getRequests({
        page,
        size: this.pageSize,
        sortField: sort.field,
        sortDirection: sort.direction,
      })
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => this.requestsPage.set(response));
  }
}
