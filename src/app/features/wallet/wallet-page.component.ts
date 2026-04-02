import { CurrencyPipe, DatePipe, NgClass } from '@angular/common';
import { Component, DestroyRef, inject, OnInit, signal, ViewEncapsulation } from '@angular/core';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import { LucideArrowUpDown, LucideCopy } from '@lucide/angular';
import { CardModule } from 'primeng/card';
import { PaginatorModule, PaginatorState } from 'primeng/paginator';
import { TableModule } from 'primeng/table';
import { TabsModule } from 'primeng/tabs';
import { delay, map, Observable, of } from 'rxjs';

import { PillTabComponent, PillTabsNavComponent } from '../../shared/components/pill-tabs';

type SortDirection = 'asc' | 'desc';

type QueryState = {
  page: number;
  size: number;
  sortField: string;
  sortDirection: SortDirection;
};

type PaginatedResponse<T> = {
  items: T[];
  total: number;
};

type PaymentTransaction = {
  id: string;
  provider: string;
  providerTransactionId: string;
  amount: number;
  currency: string;
  status: string;
  paymentMethod: string;
  paymentDetails: string;
  createdDate: string;
  completedDate: string | null;
};

type WalletTransaction = {
  id: number;
  type: string;
  amount: number;
  balanceAfter: number;
  currency: string;
  referenceType: string;
  description: string;
  createdDate: string;
};

class WalletMockApiService {
  getPaymentTransactions(query: QueryState): Observable<PaginatedResponse<PaymentTransaction>> {
    return of(this.paymentTransactions).pipe(
      map((rows) => this.paginateAndSort(rows, query)),
      delay(160),
    );
  }

  getWalletTransactions(query: QueryState): Observable<PaginatedResponse<WalletTransaction>> {
    return of(this.walletTransactions).pipe(
      map((rows) => this.paginateAndSort(rows, query)),
      delay(160),
    );
  }

  private paginateAndSort<T extends Record<string, unknown>>(rows: T[], query: QueryState): PaginatedResponse<T> {
    const sorted = [...rows].sort((left, right) => {
      const leftValue = left[query.sortField];
      const rightValue = right[query.sortField];

      if (leftValue === rightValue) {
        return 0;
      }

      const order = query.sortDirection === 'asc' ? 1 : -1;

      if (leftValue === null || leftValue === undefined) {
        return 1;
      }
      if (rightValue === null || rightValue === undefined) {
        return -1;
      }

      if (typeof leftValue === 'number' && typeof rightValue === 'number') {
        return (leftValue - rightValue) * order;
      }

      return String(leftValue).localeCompare(String(rightValue), 'ru-RU') * order;
    });

    const start = query.page * query.size;
    const end = start + query.size;

    return {
      items: sorted.slice(start, end),
      total: sorted.length,
    };
  }

  private readonly paymentTransactions: PaymentTransaction[] = [
    {
      id: '3cff3382-065b-4a1c-920e-c495070ea327',
      provider: 'INTERNAL',
      providerTransactionId: 'ca948d1c-ac89-4022-b31a-1750c48701c0',
      amount: 10,
      currency: 'USD',
      status: 'COMPLETED',
      paymentMethod: 'MANUAL_DEPOSIT',
      paymentDetails: 'ADMIN ADD FUNDS: stripe nu lucra 2eff5754-f533-4924-b9e7-e178ad187e10',
      createdDate: '2026-02-05T09:56:47.603425Z',
      completedDate: '2026-02-05T09:56:47.603427Z',
    },
    {
      id: '2eff5754-f533-4924-b9e7-e178ad187e10',
      provider: 'STRIPE',
      providerTransactionId: '10285',
      amount: 1,
      currency: 'USD',
      status: 'CANCELED',
      paymentMethod: 'CARD',
      paymentDetails: 'Deposit initiated via STRIPE',
      createdDate: '2026-02-05T09:36:43.660661Z',
      completedDate: null,
    },
    {
      id: '08931bf7-55dc-4b79-ab50-05da4d23137e',
      provider: 'MERCHANT_RU',
      providerTransactionId: '844197',
      amount: 250.01,
      currency: 'USD',
      status: 'FAILED',
      paymentMethod: 'TEST',
      paymentDetails: 'Deposit initiated via MERCHANT_RU',
      createdDate: '2026-02-05T09:36:07.388042Z',
      completedDate: null,
    },
    {
      id: 'edc8ba21-97b5-4901-b611-f3e2641ea253',
      provider: 'BANK_TRANSFER',
      providerTransactionId: 'cabf50d9-93be-4001-8dd6-f13beeb2bc23',
      amount: 500,
      currency: 'USD',
      status: 'COMPLETED',
      paymentMethod: 'CARD',
      paymentDetails: 'ADMIN ADD FUNDS',
      createdDate: '2026-01-06T05:55:53.780630Z',
      completedDate: '2026-01-06T05:55:53.780633Z',
    },
  ];

  private readonly walletTransactions: WalletTransaction[] = [
    {
      id: 197,
      type: 'CREDIT',
      amount: 10,
      balanceAfter: 350.54,
      currency: 'USD',
      referenceType: 'TRANSFER',
      description: 'ADMIN ADD FUNDS: stripe nu lucra 2eff5754-f533-4924-b9e7-e178ad187e10',
      createdDate: '2026-02-05T09:56:47.615766Z',
    },
    {
      id: 196,
      type: 'DEBIT',
      amount: -51,
      balanceAfter: 340.54,
      currency: 'USD',
      referenceType: 'SHARE_PURCHASE',
      description: 'Share purchase - Skillkode Project (13440 shares) with 50.99852847711992267520 USD',
      createdDate: '2026-02-05T09:52:26.240132Z',
    },
    {
      id: 195,
      type: 'DEBIT',
      amount: -2,
      balanceAfter: 391.54,
      currency: 'USD',
      referenceType: 'WITHDRAWAL_FEE',
      description: 'Withdrawal fee',
      createdDate: '2026-02-05T09:48:52.330831Z',
    },
    {
      id: 194,
      type: 'DEBIT',
      amount: -100,
      balanceAfter: 393.54,
      currency: 'USD',
      referenceType: 'WITHDRAWAL',
      description: 'Withdrawal to CRYPTO',
      createdDate: '2026-02-05T09:48:52.316102Z',
    },
    {
      id: 193,
      type: 'UNBLOCKED',
      amount: 102,
      balanceAfter: 493.54,
      currency: 'USD',
      referenceType: 'WITHDRAWAL',
      description: 'Funds unblocked - withdrawal processing',
      createdDate: '2026-02-05T09:48:52.308899Z',
    },
    {
      id: 192,
      type: 'BLOCKED',
      amount: -102,
      balanceAfter: 493.54,
      currency: 'USD',
      referenceType: 'WITHDRAWAL',
      description: 'Funds blocked for withdrawal request (amount + fee)',
      createdDate: '2026-02-05T09:47:34.668771Z',
    },
    {
      id: 191,
      type: 'DEBIT',
      amount: -66.67,
      balanceAfter: 493.54,
      currency: 'USD',
      referenceType: 'INSTALLMENT_CONTRACT',
      description:
        'Payment for Installment Contract ID: 8 Contract CODE: 09022700 for Plan ID: 49 Installment Number : 1 Issue date: 2026-02-05',
      createdDate: '2026-02-05T09:39:45.935056Z',
    },
    {
      id: 123,
      type: 'CREDIT',
      amount: 10.21,
      balanceAfter: 560.21,
      currency: 'USD',
      referenceType: 'REFERRAL_COMMISSION',
      description: 'Referral commission from user e810a2f9-fe21-4a57-bea7-b52385a62610, amount: 10.21',
      createdDate: '2026-01-07T21:36:48.477514Z',
    },
    {
      id: 85,
      type: 'CREDIT',
      amount: 500,
      balanceAfter: 550,
      currency: 'USD',
      referenceType: 'TRANSFER',
      description: 'ADMIN ADD FUNDS: paymentTransaction:edc8ba21-97b5-4901-b611-f3e2641ea253',
      createdDate: '2026-01-06T05:55:53.785322Z',
    },
    {
      id: 52,
      type: 'CREDIT',
      amount: 50,
      balanceAfter: 50,
      currency: 'USD',
      referenceType: 'TRANSFER',
      description: 'Transfer from wallet 7600f5e0-66f6-40fc-8e93-b7550c02f1b8',
      createdDate: '2026-01-05T10:02:30.822567Z',
    },
  ];
}

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
    PillTabsNavComponent,
    PillTabComponent,
    CurrencyPipe,
    DatePipe,
    NgClass,
    LucideArrowUpDown,
    LucideCopy,
  ],
  styleUrl: './wallet-page.component.css',
  encapsulation: ViewEncapsulation.None,
  template: `
    <section class="c-page-heading">
      <h1 class="c-page-heading__title">Кошелёк</h1>
      <p class="c-page-heading__subtitle">Управляйте балансом, пополнениями и транзакциями.</p>
    </section>

    <section>
      <p-card [pt]="walletCardPt">
        <p-tabs [value]="activeTab()" (valueChange)="onTabChange($event)">
          <ng-template #header>
            <h3 class="text-sm font-bold uppercase tracking-wide text-surface-900 dark:text-surface-50">Транзакции</h3>
            <app-pill-tabs-nav size="sm" theme="secondary">
              <app-pill-tab value="payments">Платежные Транзакции</app-pill-tab>
              <app-pill-tab value="wallet">Wallet Transactions</app-pill-tab>
            </app-pill-tabs-nav>
          </ng-template>

          <p-tabpanels>
            <p-tabpanel value="payments">
              <div class="hidden lg:block">
                <p-table styleClass="c-data-table c-data-table--payments" [pt]="tablePt" [value]="paymentRows()">
                  <ng-template pTemplate="header">
                    <tr>
                      @for (column of paymentColumns; track column.field) {
                        <th [class]="column.className">
                          <button class="c-data-sort-btn" type="button" (click)="toggleSort('payments', column.field)">
                            <span>{{ column.header }}</span>
                            <lucide-angular class="c-data-sort-icon" [img]="sortIcon" />
                          </button>
                        </th>
                      }
                    </tr>
                  </ng-template>
                  <ng-template let-row pTemplate="body">
                    <tr>
                      <td class="font-bold text-surface-900 dark:text-surface-0">
                        {{ row.amount | currency: row.currency : 'symbol' : '1.2-2' }}
                      </td>
                      <td>
                        <span class="c-provider-chip">{{ providerLabel(row.provider) }}</span>
                      </td>
                      <td class="font-semibold">{{ methodLabel(row.paymentMethod) }}</td>
                      <td>
                        <span [ngClass]="paymentStatusClass(row.status)">{{ paymentStatusLabel(row.status) }}</span>
                      </td>
                      <td class="text-xs text-muted-color">{{ row.paymentDetails }}</td>
                      <td>
                        <div class="flex items-center gap-2">
                          <span>{{ truncateValue(row.providerTransactionId) }}</span>
                          <button
                            class="c-copy-btn"
                            type="button"
                            [attr.aria-label]="'Copy TXID ' + row.providerTransactionId">
                            <lucide-angular size="16" [img]="copyIcon" />
                          </button>
                        </div>
                      </td>
                      <td>{{ row.createdDate | date: 'dd.MM.yyyy HH:mm' }}</td>
                      <td>{{ row.completedDate ? (row.completedDate | date: 'dd.MM.yyyy HH:mm') : '-' }}</td>
                    </tr>
                  </ng-template>
                </p-table>
              </div>

              <div class="lg:hidden c-wallet-mobile-list">
                @for (row of paymentRows(); track row.id) {
                  <article class="c-wallet-mobile-card">
                    <header class="c-wallet-mobile-card__header">
                      <span class="c-provider-chip">{{ providerLabel(row.provider) }}</span>
                      <span [ngClass]="paymentStatusClass(row.status)">{{ paymentStatusLabel(row.status) }}</span>
                    </header>
                    <dl class="c-wallet-mobile-grid">
                      <div>
                        <dt>Сумма</dt>
                        <dd>{{ row.amount | currency: row.currency : 'symbol' : '1.2-2' }}</dd>
                      </div>
                      <div>
                        <dt>Метод</dt>
                        <dd>{{ methodLabel(row.paymentMethod) }}</dd>
                      </div>
                      <div>
                        <dt>Дата создания</dt>
                        <dd>{{ row.createdDate | date: 'dd.MM.yyyy HH:mm' }}</dd>
                      </div>
                      <div>
                        <dt>Дата завершения</dt>
                        <dd>{{ row.completedDate ? (row.completedDate | date: 'dd.MM.yyyy HH:mm') : '-' }}</dd>
                      </div>
                    </dl>
                    <p class="text-sm text-muted-color">{{ row.paymentDetails }}</p>
                  </article>
                }
              </div>

              <div class="c-table-footer">
                <span class="text-sm text-muted-color">{{ summaryText(paymentsTotal(), paymentsQuery()) }}</span>
                <p-paginator
                  [first]="paymentsQuery().page * paymentsQuery().size"
                  [pt]="paginatorPt"
                  [rows]="paymentsQuery().size"
                  [rowsPerPageOptions]="[4, 8, 12]"
                  [totalRecords]="paymentsTotal()"
                  (onPageChange)="onPageChange('payments', $event)" />
              </div>
            </p-tabpanel>

            <p-tabpanel value="wallet">
              <div class="hidden lg:block">
                <p-table styleClass="c-data-table c-data-table--wallet" [pt]="tablePt" [value]="walletRows()">
                  <ng-template pTemplate="header">
                    <tr>
                      @for (column of walletColumns; track column.field) {
                        <th [class]="column.className">
                          <button class="c-data-sort-btn" type="button" (click)="toggleSort('wallet', column.field)">
                            <span>{{ column.header }}</span>
                            <lucide-angular class="c-data-sort-icon" [img]="sortIcon" />
                          </button>
                        </th>
                      }
                    </tr>
                  </ng-template>
                  <ng-template let-row pTemplate="body">
                    <tr>
                      <td>
                        <span [ngClass]="walletTypeClass(row.type)">{{ walletTypeLabel(row.type) }}</span>
                      </td>
                      <td [ngClass]="row.amount >= 0 ? 'text-emerald-500 font-bold' : 'text-red-500 font-bold'">
                        {{ row.amount | currency: row.currency : 'symbol' : '1.2-2' }}
                      </td>
                      <td class="font-bold text-surface-900 dark:text-surface-0">
                        {{ row.balanceAfter | currency: row.currency : 'symbol' : '1.2-2' }}
                      </td>
                      <td class="text-muted-color">{{ referenceTypeLabel(row.referenceType) }}</td>
                      <td>{{ row.description }}</td>
                      <td>{{ row.createdDate | date: 'dd.MM.yyyy' }}</td>
                    </tr>
                  </ng-template>
                </p-table>
              </div>

              <div class="lg:hidden c-wallet-mobile-list">
                @for (row of walletRows(); track row.id) {
                  <article class="c-wallet-mobile-card">
                    <header class="c-wallet-mobile-card__header">
                      <span [ngClass]="walletTypeClass(row.type)">{{ walletTypeLabel(row.type) }}</span>
                      <span [ngClass]="row.amount >= 0 ? 'text-emerald-500 font-bold' : 'text-red-500 font-bold'">
                        {{ row.amount | currency: row.currency : 'symbol' : '1.2-2' }}
                      </span>
                    </header>
                    <dl class="c-wallet-mobile-grid">
                      <div>
                        <dt>Баланс после</dt>
                        <dd>{{ row.balanceAfter | currency: row.currency : 'symbol' : '1.2-2' }}</dd>
                      </div>
                      <div>
                        <dt>Тип ссылки</dt>
                        <dd>{{ referenceTypeLabel(row.referenceType) }}</dd>
                      </div>
                      <div>
                        <dt>Дата</dt>
                        <dd>{{ row.createdDate | date: 'dd.MM.yyyy' }}</dd>
                      </div>
                    </dl>
                    <p class="text-sm text-muted-color">{{ row.description }}</p>
                  </article>
                }
              </div>

              <div class="c-table-footer">
                <span class="text-sm text-muted-color">{{ summaryText(walletTotal(), walletQuery()) }}</span>
                <p-paginator
                  [first]="walletQuery().page * walletQuery().size"
                  [pt]="paginatorPt"
                  [rows]="walletQuery().size"
                  [rowsPerPageOptions]="[4, 8, 12]"
                  [totalRecords]="walletTotal()"
                  (onPageChange)="onPageChange('wallet', $event)" />
              </div>
            </p-tabpanel>
          </p-tabpanels>
        </p-tabs>
      </p-card>
    </section>
  `,
})
export class WalletPageComponent implements OnInit {
  protected readonly sortIcon = LucideArrowUpDown;
  protected readonly copyIcon = LucideCopy;

  private readonly destroyRef = inject(DestroyRef);
  private readonly walletApi = new WalletMockApiService();

  protected readonly activeTab = signal<'payments' | 'wallet'>('payments');
  protected readonly paymentRows = signal<PaymentTransaction[]>([]);
  protected readonly walletRows = signal<WalletTransaction[]>([]);
  protected readonly paymentsTotal = signal(0);
  protected readonly walletTotal = signal(0);

  protected readonly paymentsQuery = signal<QueryState>({
    page: 0,
    size: 4,
    sortField: 'createdDate',
    sortDirection: 'desc',
  });
  protected readonly walletQuery = signal<QueryState>({
    page: 0,
    size: 4,
    sortField: 'createdDate',
    sortDirection: 'desc',
  });

  protected readonly walletCardPt = {
    header: { class: 'flex flex-wrap items-center justify-between gap-3' },
    body: { class: 'px-0 pb-0 pt-0' },
    content: { class: 'px-0 pb-0 pt-0' },
  };

  protected readonly tablePt = {
    table: { class: 'w-full' },
    thead: { class: 'bg-surface-100/80 dark:bg-surface-800/80' },
  };

  protected readonly paginatorPt = {
    root: { class: 'c-page-paginator' },
    pages: { class: 'c-page-paginator__pages' },
    pageButton: { class: 'c-page-paginator__page-btn' },
    firstPageButton: { class: 'c-page-paginator__icon-btn' },
    prevPageButton: { class: 'c-page-paginator__icon-btn' },
    nextPageButton: { class: 'c-page-paginator__icon-btn' },
    lastPageButton: { class: 'c-page-paginator__icon-btn' },
    rowsPerPageDropdown: { class: 'c-page-paginator__rows' },
  };

  protected readonly paymentColumns = [
    { field: 'amount', header: 'Сумма', className: 'w-[9rem]' },
    { field: 'provider', header: 'Провайдер', className: 'w-[12rem]' },
    { field: 'paymentMethod', header: 'Метод оплаты', className: 'w-[12rem]' },
    { field: 'status', header: 'Статус', className: 'w-[10rem]' },
    { field: 'paymentDetails', header: 'Детали оплаты', className: 'min-w-[18rem]' },
    { field: 'providerTransactionId', header: 'TXID провайдера', className: 'w-[12rem]' },
    { field: 'createdDate', header: 'Дата создания', className: 'w-[11rem]' },
    { field: 'completedDate', header: 'Дата завершения', className: 'w-[11rem]' },
  ] as const;

  protected readonly walletColumns = [
    { field: 'type', header: 'Тип', className: 'w-[10rem]' },
    { field: 'amount', header: 'Сумма', className: 'w-[8rem]' },
    { field: 'balanceAfter', header: 'Баланс после', className: 'w-[10rem]' },
    { field: 'referenceType', header: 'Тип ссылки', className: 'w-[12rem]' },
    { field: 'description', header: 'Описание', className: 'min-w-[24rem]' },
    { field: 'createdDate', header: 'Дата', className: 'w-[8rem]' },
  ] as const;

  ngOnInit(): void {
    this.loadPayments();
    this.loadWalletTransactions();
  }

  protected onTabChange(value: string | number): void {
    if (value === 'payments' || value === 'wallet') {
      this.activeTab.set(value);
    }
  }

  protected onPageChange(type: 'payments' | 'wallet', event: PaginatorState): void {
    if (!event.rows || event.page === undefined) {
      return;
    }

    if (type === 'payments') {
      this.paymentsQuery.update((query) => ({ ...query, page: event.page ?? 0, size: event.rows ?? query.size }));
      this.loadPayments();
      return;
    }

    this.walletQuery.update((query) => ({ ...query, page: event.page ?? 0, size: event.rows ?? query.size }));
    this.loadWalletTransactions();
  }

  protected toggleSort(type: 'payments' | 'wallet', field: string): void {
    if (type === 'payments') {
      this.paymentsQuery.update((query) => ({
        ...query,
        page: 0,
        sortField: field,
        sortDirection: query.sortField === field && query.sortDirection === 'asc' ? 'desc' : 'asc',
      }));
      this.loadPayments();
      return;
    }

    this.walletQuery.update((query) => ({
      ...query,
      page: 0,
      sortField: field,
      sortDirection: query.sortField === field && query.sortDirection === 'asc' ? 'desc' : 'asc',
    }));
    this.loadWalletTransactions();
  }

  protected paymentStatusLabel(status: string): string {
    if (status === 'CANCELED') {
      return 'ОТМЕНЕНО';
    }
    return status;
  }

  protected paymentStatusClass(status: string): string {
    if (status === 'COMPLETED') {
      return 'c-status-chip c-status-chip--success';
    }
    if (status === 'FAILED' || status === 'CANCELED') {
      return 'c-status-chip c-status-chip--danger';
    }
    return 'c-status-chip c-status-chip--muted';
  }

  protected walletTypeLabel(type: string): string {
    const labels: Record<string, string> = {
      CREDIT: 'КРЕДИТ',
      DEBIT: 'ДЕБЕТ',
      BLOCKED: 'ЗАБЛОКИРОВАНО',
      UNBLOCKED: 'РАЗБЛОКИРОВАНО',
    };

    return labels[type] ?? type;
  }

  protected walletTypeClass(type: string): string {
    if (type === 'CREDIT' || type === 'UNBLOCKED') {
      return 'c-status-chip c-status-chip--success';
    }

    if (type === 'DEBIT' || type === 'BLOCKED') {
      return 'c-status-chip c-status-chip--danger';
    }

    return 'c-status-chip c-status-chip--muted';
  }

  protected methodLabel(method: string): string {
    return method
      .replaceAll('_', ' ')
      .toLowerCase()
      .replace(/(^\w|\s\w)/g, (match) => match.toUpperCase());
  }

  protected providerLabel(provider: string): string {
    const labels: Record<string, string> = {
      INTERNAL: 'ВНУТРЕННИЙ',
      BANK_TRANSFER: 'БАНКОВСКИЙ ПЕРЕВОД',
      MERCHANT_RU: 'MERCHANT RU',
      STRIPE: 'STRIPE',
    };

    return labels[provider] ?? provider;
  }

  protected referenceTypeLabel(type: string): string {
    const labels: Record<string, string> = {
      TRANSFER: 'Передача',
      SHARE_PURCHASE: 'Покупка акций',
      WITHDRAWAL_FEE: 'Комиссия за снятие средств',
      WITHDRAWAL: 'Снятие',
      INSTALLMENT_CONTRACT: 'Договор рассрочки',
      REFERRAL_COMMISSION: 'Реферальная комиссия',
    };

    return labels[type] ?? type;
  }

  protected truncateValue(value: string): string {
    if (value.length <= 10) {
      return value;
    }

    return `${value.slice(0, 8)}...`;
  }

  protected summaryText(total: number, query: QueryState): string {
    const first = total === 0 ? 0 : query.page * query.size + 1;
    const last = Math.min(total, query.page * query.size + query.size);

    return `Отображение ${first}-${last} для ${total} записей`;
  }

  private loadPayments(): void {
    this.walletApi
      .getPaymentTransactions(this.paymentsQuery())
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => {
        this.paymentRows.set(response.items);
        this.paymentsTotal.set(response.total);
      });
  }

  private loadWalletTransactions(): void {
    this.walletApi
      .getWalletTransactions(this.walletQuery())
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => {
        this.walletRows.set(response.items);
        this.walletTotal.set(response.total);
      });
  }
}
