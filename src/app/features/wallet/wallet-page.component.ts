import { CurrencyPipe, DatePipe } from '@angular/common';
import { Component, DestroyRef, inject, signal } from '@angular/core';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import { LucideArrowUpDown, LucideChevronDown, LucideCopy } from '@lucide/angular';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';
import { PaginatorModule, PaginatorState } from 'primeng/paginator';
import { TabsModule } from 'primeng/tabs';
import { TableModule } from 'primeng/table';

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
  WalletTransaction,
} from './wallet-mock-api.service';

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
    LucideArrowUpDown,
    LucideChevronDown,
    LucideCopy,
    PillTabsNavComponent,
    PillTabComponent,
    PillTabPanelsComponent,
    PillTabPanelComponent,
  ],
  templateUrl: './wallet-page.component.html',
  styleUrl: './wallet-page.component.css',
})
export class WalletPageComponent {
  private readonly destroyRef = inject(DestroyRef);
  private readonly walletApi = inject(WalletMockApiService);

  protected readonly pageSize = 4;
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

  protected readonly paymentExpanded = signal<Record<string, boolean>>({});
  protected readonly walletExpanded = signal<Record<number, boolean>>({});

  constructor() {
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

  protected paymentStatusClass(status: string): string {
    return (
      {
        COMPLETED: 'c-badge c-badge--success',
        CANCELED: 'c-badge c-badge--danger',
        FAILED: 'c-badge c-badge--danger',
        PENDING: 'c-badge c-badge--warning',
      }[status] ?? 'c-badge c-badge--muted'
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

  private loadPaymentTransactions(page: number): void {
    const sort = this.paymentsSort();
    const query = this.buildQuery(page, sort.field, sort.direction);

    this.walletApi
      .getPaymentTransactions(query)
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => this.paymentsPage.set(response));
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
