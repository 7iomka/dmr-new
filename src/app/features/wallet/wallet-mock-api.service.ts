import { Injectable } from '@angular/core';
import { delay, Observable, of } from 'rxjs';

export type SortDirection = 'asc' | 'desc';

export type TableQuery = {
  page: number;
  size: number;
  sortField: string;
  sortDirection: SortDirection;
};

export type TablePage<T> = {
  content: T[];
  totalElements: number;
  page: number;
  size: number;
  sort: string;
};

export type PaymentTransaction = {
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

export type WalletTransaction = {
  id: number;
  type: string;
  amount: number;
  balanceAfter: number;
  currency: string;
  referenceType: string;
  description: string;
  createdDate: string;
};

@Injectable({ providedIn: 'root' })
export class WalletMockApiService {
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
    {
      id: '223ea2a0-6d40-49d1-b0aa-2cf774510af8',
      provider: 'STRIPE',
      providerTransactionId: '11872',
      amount: 73,
      currency: 'USD',
      status: 'PENDING',
      paymentMethod: 'CARD',
      paymentDetails: 'Deposit initiated via STRIPE',
      createdDate: '2026-01-05T12:14:11.780633Z',
      completedDate: null,
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
        'Payment for Installment Contract ID: 8 Contract CODE: 09022700 for Plan ID: 49 Installment Number : 1',
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
  ];

  getPaymentTransactions(query: TableQuery): Observable<TablePage<PaymentTransaction>> {
    return this.queryList(this.paymentTransactions, query);
  }

  getWalletTransactions(query: TableQuery): Observable<TablePage<WalletTransaction>> {
    return this.queryList(this.walletTransactions, query);
  }

  private queryList<T extends Record<string, string | number | null>>(
    items: T[],
    query: TableQuery,
  ): Observable<TablePage<T>> {
    const sorted = [...items].sort((left, right) => {
      const leftValue = left[query.sortField];
      const rightValue = right[query.sortField];

      if (leftValue === rightValue) {
        return 0;
      }

      if (leftValue === null) {
        return 1;
      }

      if (rightValue === null) {
        return -1;
      }

      const leftComparable = typeof leftValue === 'number' ? leftValue : String(leftValue).toLowerCase();
      const rightComparable = typeof rightValue === 'number' ? rightValue : String(rightValue).toLowerCase();
      const baseResult = leftComparable > rightComparable ? 1 : -1;

      return query.sortDirection === 'asc' ? baseResult : -baseResult;
    });

    const start = query.page * query.size;
    const content = sorted.slice(start, start + query.size);

    return of({
      content,
      totalElements: items.length,
      page: query.page,
      size: query.size,
      sort: `${query.sortField},${query.sortDirection}`,
    }).pipe(delay(180));
  }
}
