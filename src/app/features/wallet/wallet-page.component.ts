import { CurrencyPipe, DatePipe } from '@angular/common';
import { Component, DestroyRef, inject, signal } from '@angular/core';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import {
  LucideArrowDownLeft,
  LucideArrowUpRight,
  LucideChevronDown,
  LucideChevronRight,
  LucideCircleAlert,
  LucideCirclePlus,
  LucideCopy,
  LucideDynamicIcon,
  LucideFingerprintPattern,
  type LucideIcon,
  LucideLock,
  LucideSend,
  LucideShieldCheck,
  LucideZap,
} from '@lucide/angular';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';
import { PaginatorModule, PaginatorState } from 'primeng/paginator';
import { TabsModule } from 'primeng/tabs';
import { TableModule } from 'primeng/table';
import { TagModule } from 'primeng/tag';
import { RouterLink } from '@angular/router';

import {
  PillTabComponent,
  PillTabPanelComponent,
  PillTabPanelsComponent,
  PillTabsNavComponent,
} from '../../shared/components/pill-tabs';
import {
  PaymentTransaction,
  SortDirection,
  TablePage,
  TableQuery,
  WalletMockApiService,
  WalletOverview,
  WalletTransaction,
} from './wallet-mock-api.service';
import { FormControlCopyComponent } from '../../shared/components/form-controls/form-control-copy.component';

type MobileVisualTone = 'success' | 'danger' | 'warning' | 'surface';

type PaymentMobileMeta = {
  title: string;
  amountClass: string;
  icon: LucideIcon;
  iconWrapClass: string;
};

type WalletMobileMeta = {
  title: string;
  amountClass: string;
  icon: LucideIcon;
  iconWrapClass: string;
};

const PAYMENT_STATUS_META = {
  COMPLETED: { severity: 'success', label: 'Completed' },
  CANCELED: { severity: 'danger', label: 'Canceled' },
  FAILED: { severity: 'danger', label: 'Failed' },
  PENDING: { severity: 'warn', label: 'Pending' },
} as const;

type PaymentStatus = keyof typeof PAYMENT_STATUS_META;

@Component({
  selector: 'app-wallet-page',
  host: {
    class: 'app-page',
  },
  standalone: true,
  imports: [
    CardModule,
    TabsModule,
    TableModule,
    PaginatorModule,
    ButtonModule,
    CurrencyPipe,
    DatePipe,
    LucideDynamicIcon,
    LucideChevronDown,
    LucideChevronRight,
    LucideCirclePlus,
    LucideCopy,
    LucideSend,
    LucideArrowUpRight,
    PillTabsNavComponent,
    PillTabComponent,
    PillTabPanelsComponent,
    PillTabPanelComponent,
    TagModule,
    RouterLink,
    FormControlCopyComponent,
    LucideArrowUpRight,
  ],
  templateUrl: './wallet-page.component.html',
  styleUrl: './wallet-page.component.css',
})
export class WalletPageComponent {
  private readonly destroyRef = inject(DestroyRef);
  private readonly walletApi = inject(WalletMockApiService);

  protected readonly pageSize = 4;
  protected readonly walletOverview = signal<WalletOverview | null>(null);
  protected readonly paymentsPage = signal<TablePage<PaymentTransaction> | null>(null);
  protected readonly walletPage = signal<TablePage<WalletTransaction> | null>(null);

  protected readonly paymentsSort = signal<{ field: keyof PaymentTransaction; direction: SortDirection }>({
    field: 'createdDate',
    direction: 'desc',
  });
  protected readonly walletSort = signal<{ field: keyof WalletTransaction; direction: SortDirection }>({
    field: 'createdDate',
    direction: 'desc',
  });

  protected readonly activeTab = signal<string>('payments');
  protected readonly paymentExpanded = signal<Record<string, boolean>>({});
  protected readonly walletExpanded = signal<Record<number, boolean>>({});

  protected readonly fingerprintIcon = LucideFingerprintPattern;

  constructor() {
    this.loadWalletOverview();
    this.loadPaymentTransactions(0);
    this.loadWalletTransactions(0);
  }

  protected isPaymentSortable(field: keyof PaymentTransaction): boolean {
    return ['amount', 'provider', 'paymentMethod', 'status', 'createdDate', 'completedDate'].includes(field);
  }

  protected isWalletSortable(field: keyof WalletTransaction): boolean {
    return ['type', 'amount', 'balanceAfter', 'referenceType', 'createdDate'].includes(field);
  }

  protected sortPayments(field: keyof PaymentTransaction): void {
    if (!this.isPaymentSortable(field)) {
      return;
    }

    const current = this.paymentsSort();
    this.paymentsSort.set({
      field,
      direction: current.field === field && current.direction === 'asc' ? 'desc' : 'asc',
    });

    this.loadPaymentTransactions(0);
  }

  protected sortWalletTransactions(field: keyof WalletTransaction): void {
    if (!this.isWalletSortable(field)) {
      return;
    }

    const current = this.walletSort();
    this.walletSort.set({
      field,
      direction: current.field === field && current.direction === 'asc' ? 'desc' : 'asc',
    });

    this.loadWalletTransactions(0);
  }

  protected onTabChange(nextValue: string | number | undefined): void {
    if (typeof nextValue !== 'string') {
      return;
    }

    this.activeTab.set(nextValue);
  }

  protected onPaymentsPageChange(event: PaginatorState): void {
    const first = event.first ?? 0;
    const rows = event.rows ?? this.pageSize;

    this.loadPaymentTransactions(Math.floor(first / rows));
  }

  protected onWalletPageChange(event: PaginatorState): void {
    const first = event.first ?? 0;
    const rows = event.rows ?? this.pageSize;

    this.loadWalletTransactions(Math.floor(first / rows));
  }

  protected paymentStatusMeta(status: string) {
    return (
      PAYMENT_STATUS_META[status as PaymentStatus] ?? {
        severity: 'secondary',
        label: status,
      }
    );
  }

  protected walletTypeClass(type: string): string {
    return (
      {
        CREDIT: 'c-badge c-badge--success',
        DEBIT: 'c-badge c-badge--danger',
        BLOCKED: 'c-badge c-badge--danger',
        UNBLOCKED: 'c-badge c-badge--success',
      }[type] ?? 'c-badge c-badge--muted'
    );
  }

  protected paymentMethodLabel(value: string): string {
    return value.replaceAll('_', ' ');
  }

  protected providerLabel(value: string): string {
    return value.replaceAll('_', ' ');
  }

  protected referenceTypeLabel(value: string): string {
    return (
      {
        TRANSFER: 'Передача',
        SHARE_PURCHASE: 'Покупка акций',
        WITHDRAWAL_FEE: 'Комиссия за снятие',
        WITHDRAWAL: 'Снятие',
        INSTALLMENT_CONTRACT: 'Договор рассрочки',
        REFERRAL_COMMISSION: 'Реферальная комиссия',
      }[value] ?? value.replaceAll('_', ' ')
    );
  }

  protected walletTypeLabel(type: string): string {
    return (
      {
        CREDIT: 'Кредит',
        DEBIT: 'Дебет',
        BLOCKED: 'Заблокировано',
        UNBLOCKED: 'Разблокировано',
      }[type] ?? type
    );
  }

  protected copyText(value: string): void {
    void navigator.clipboard.writeText(value);
  }

  protected togglePaymentDetails(id: string): void {
    this.paymentExpanded.update((state) => ({ ...state, [id]: !state[id] }));
  }

  protected toggleWalletDetails(id: number): void {
    this.walletExpanded.update((state) => ({ ...state, [id]: !state[id] }));
  }

  protected paymentMobileMeta(row: PaymentTransaction): PaymentMobileMeta {
    const tone = this.paymentTone(row);

    return {
      title: this.providerLabel(row.provider),
      amountClass: this.amountClassByTone(tone),
      icon: this.paymentIcon(row),
      iconWrapClass: this.iconWrapClassByTone(tone),
    };
  }

  protected walletMobileMeta(row: WalletTransaction): WalletMobileMeta {
    const tone = this.walletTone(row);

    return {
      title: this.walletMobileTitle(row),
      amountClass: this.amountClassByTone(tone),
      icon: this.walletIcon(row),
      iconWrapClass: this.iconWrapClassByTone(tone),
    };
  }

  protected walletSignedAmount(row: WalletTransaction): string {
    const absoluteAmount = Math.abs(row.amount);
    const formattedAmount = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: row.currency,
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    }).format(absoluteAmount);

    if (row.amount > 0) {
      return `+ ${formattedAmount}`;
    }

    if (row.amount < 0) {
      return `- ${formattedAmount}`;
    }

    return formattedAmount;
  }

  private paymentTone(row: PaymentTransaction): MobileVisualTone {
    if (row.status === 'COMPLETED') {
      return 'success';
    }

    if (row.status === 'FAILED' || row.status === 'CANCELED') {
      return 'danger';
    }

    if (row.status === 'PENDING') {
      return 'warning';
    }

    return 'surface';
  }

  private walletTone(row: WalletTransaction): MobileVisualTone {
    if (row.amount > 0 || row.type === 'UNBLOCKED') {
      return 'success';
    }

    if (row.amount < 0 || row.type === 'BLOCKED') {
      return 'danger';
    }

    return 'surface';
  }

  private paymentIcon(row: PaymentTransaction): LucideIcon {
    if (row.status === 'FAILED' || row.status === 'CANCELED') {
      return LucideCircleAlert;
    }

    if (row.status === 'PENDING') {
      return LucideShieldCheck;
    }

    return LucideZap;
  }

  private walletIcon(row: WalletTransaction): LucideIcon {
    if (row.type === 'BLOCKED') {
      return LucideLock;
    }

    if (row.type === 'UNBLOCKED') {
      return LucideShieldCheck;
    }

    return row.amount >= 0 ? LucideArrowDownLeft : LucideArrowUpRight;
  }

  private walletMobileTitle(row: WalletTransaction): string {
    if (row.referenceType === 'WITHDRAWAL' || row.type === 'BLOCKED') {
      return 'Вывод средств';
    }

    if (row.referenceType === 'TRANSFER' || row.type === 'CREDIT') {
      return 'Пополнение счета';
    }

    if (row.referenceType === 'SHARE_PURCHASE') {
      return 'Покупка акций';
    }

    if (row.referenceType === 'WITHDRAWAL_FEE') {
      return 'Комиссия за вывод';
    }

    if (row.referenceType === 'INSTALLMENT_CONTRACT') {
      return 'Оплата рассрочки';
    }

    if (row.referenceType === 'REFERRAL_COMMISSION') {
      return 'Реферальная комиссия';
    }

    return this.walletTypeLabel(row.type);
  }

  private iconWrapClassByTone(tone: MobileVisualTone): string {
    return (
      {
        success: 'wallet-mobile-item__icon-wrap wallet-mobile-item__icon-wrap--success',
        danger: 'wallet-mobile-item__icon-wrap wallet-mobile-item__icon-wrap--danger',
        warning: 'wallet-mobile-item__icon-wrap wallet-mobile-item__icon-wrap--warning',
        surface: 'wallet-mobile-item__icon-wrap wallet-mobile-item__icon-wrap--surface',
      }[tone] ?? 'wallet-mobile-item__icon-wrap wallet-mobile-item__icon-wrap--surface'
    );
  }

  private amountClassByTone(tone: MobileVisualTone): string {
    return (
      {
        success: 'wallet-mobile-item__amount wallet-mobile-item__amount--success',
        danger: 'wallet-mobile-item__amount wallet-mobile-item__amount--danger',
        warning: 'wallet-mobile-item__amount wallet-mobile-item__amount--warning',
        surface: 'wallet-mobile-item__amount',
      }[tone] ?? 'wallet-mobile-item__amount'
    );
  }

  private loadPaymentTransactions(page: number): void {
    const sort = this.paymentsSort();
    const query = this.buildQuery(page, sort.field, sort.direction);

    this.walletApi
      .getPaymentTransactions(query)
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => this.paymentsPage.set(response));
  }

  private loadWalletOverview(): void {
    this.walletApi
      .getMyWalletOverview()
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => this.walletOverview.set(response));
  }

  private loadWalletTransactions(page: number): void {
    const sort = this.walletSort();
    const query = this.buildQuery(page, sort.field, sort.direction);

    this.walletApi
      .getWalletTransactions(query)
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => this.walletPage.set(response));
  }

  private buildQuery(page: number, sortField: string, sortDirection: SortDirection): TableQuery {
    return {
      page,
      size: this.pageSize,
      sortField,
      sortDirection,
    };
  }
}
