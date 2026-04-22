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

export type WithdrawalsOverview = {
  availableAmount: number;
  minWithdrawalAmount: number;
  totalWithdrawn: number;
  totalLimit: number;
  pendingAmount: number;
  canWithdraw: boolean;
  currency: string;
  withdrawalBlockedReason: string | null;
};

export type WithdrawalRequest = {
  id: string;
  amount: number;
  currency: string;
  status: 'COMPLETED' | 'PROCESSING' | 'REJECTED';
  method: 'CRYPTO' | 'BANK_TRANSFER';
  cryptoType: string | null;
  fee: number;
  netAmount: number;
  fraudScore: number;
  flaggedAsFraud: boolean;
  otpVerified: boolean;
  userIp: string | null;
  metadata: string | null;
  deviceFingerprint: string | null;
  requestedDate: string;
  verifiedDate: string | null;
  approvedDate: string | null;
  processedDate: string | null;
  completedDate: string | null;
  failureReason: string | null;
  retryCount: number;
  providerTransactionId: string | null;
  walletId: string;
  requestedById: string;
  cryptoAddressId: string | null;
  userEmail: string;
  userAvatar: string | null;
  userFirstName: string;
  userLastName: string;
  userPhone: string | null;
  userLegacyId: number;
  cryptoAddressValue: string | null;
  configMaxAmount: number | null;
  totalReferralCommissions: number | null;
  totalCompletedWithdrawals: number | null;
  maxWithdrawableAmount: number | null;
};

@Injectable({ providedIn: 'root' })
export class WithdrawalsMockApiService {
  private readonly overview: WithdrawalsOverview = {
    availableAmount: 0,
    minWithdrawalAmount: 20,
    totalWithdrawn: 100,
    totalLimit: 500,
    pendingAmount: 80,
    canWithdraw: false,
    currency: 'USD',
    withdrawalBlockedReason: 'INSUFFICIENT_REFERRAL_BALANCE',
  };

  private readonly requests: WithdrawalRequest[] = [
    {
      id: '575232fb-d103-4137-9c29-89507a7e5516',
      amount: 100,
      currency: 'USD',
      status: 'COMPLETED',
      method: 'CRYPTO',
      cryptoType: 'USDT_TRC20',
      fee: 2,
      netAmount: 98,
      fraudScore: 40,
      flaggedAsFraud: false,
      otpVerified: true,
      userIp: '212.56.197.2',
      metadata: null,
      deviceFingerprint: null,
      requestedDate: '2026-02-05T09:47:34.658200Z',
      verifiedDate: '2026-02-05T09:47:44.547552Z',
      approvedDate: '2026-02-05T09:48:35.811676Z',
      processedDate: '2026-02-05T09:48:52.336850Z',
      completedDate: '2026-02-05T09:48:52.336861Z',
      failureReason: null,
      retryCount: 0,
      providerTransactionId: 'TX_0dc225f7',
      walletId: 'bb8623ef-3902-4937-95e5-1e64fc6f79c4',
      requestedById: '2a04e1d8-ff5e-4656-8e9e-e641a708b676',
      cryptoAddressId: 'e0a42c6a-e9e0-479e-b040-27f11e4fb1be',
      userEmail: '1@ref.test',
      userAvatar: null,
      userFirstName: 'ref',
      userLastName: 'test',
      userPhone: '376700001',
      userLegacyId: 55085,
      cryptoAddressValue: 'TN3W4H6rK2ce4vX9YnFQHwKENnHjoxb3m9',
      configMaxAmount: null,
      totalReferralCommissions: null,
      totalCompletedWithdrawals: null,
      maxWithdrawableAmount: null,
    },
    {
      id: 'b9d7bfe8-4e5b-44aa-9d54-5d9c9c2a1e72',
      amount: 80,
      currency: 'USD',
      status: 'PROCESSING',
      method: 'CRYPTO',
      cryptoType: 'USDT_BEP20',
      fee: 1,
      netAmount: 79,
      fraudScore: 18,
      flaggedAsFraud: false,
      otpVerified: true,
      userIp: '212.56.197.2',
      metadata: null,
      deviceFingerprint: null,
      requestedDate: '2026-02-13T17:41:00Z',
      verifiedDate: '2026-02-13T17:41:12Z',
      approvedDate: '2026-02-13T17:42:04Z',
      processedDate: null,
      completedDate: null,
      failureReason: null,
      retryCount: 0,
      providerTransactionId: null,
      walletId: 'bb8623ef-3902-4937-95e5-1e64fc6f79c4',
      requestedById: '2a04e1d8-ff5e-4656-8e9e-e641a708b676',
      cryptoAddressId: 'ce6ce1de-1c60-4043-8aa2-c4a7c208da1a',
      userEmail: '1@ref.test',
      userAvatar: null,
      userFirstName: 'ref',
      userLastName: 'test',
      userPhone: '376700001',
      userLegacyId: 55085,
      cryptoAddressValue: '0x34fA5f2CD8Fc5c4B7A3a67E5dfEA3B12A8B392cB',
      configMaxAmount: null,
      totalReferralCommissions: null,
      totalCompletedWithdrawals: null,
      maxWithdrawableAmount: null,
    },
    {
      id: '05a59f08-1d1c-4527-90a0-8450d7977a32',
      amount: 150,
      currency: 'USD',
      status: 'REJECTED',
      method: 'CRYPTO',
      cryptoType: 'USDT_TRC20',
      fee: 2.5,
      netAmount: 147.5,
      fraudScore: 71,
      flaggedAsFraud: true,
      otpVerified: true,
      userIp: '212.56.197.2',
      metadata: null,
      deviceFingerprint: null,
      requestedDate: '2026-02-10T09:04:00Z',
      verifiedDate: '2026-02-10T09:04:19Z',
      approvedDate: null,
      processedDate: null,
      completedDate: null,
      failureReason: 'FRAUD_REVIEW_REJECTED',
      retryCount: 1,
      providerTransactionId: null,
      walletId: 'bb8623ef-3902-4937-95e5-1e64fc6f79c4',
      requestedById: '2a04e1d8-ff5e-4656-8e9e-e641a708b676',
      cryptoAddressId: '88e0f598-b507-4b35-b8c0-c6aeb3b4012a',
      userEmail: '1@ref.test',
      userAvatar: null,
      userFirstName: 'ref',
      userLastName: 'test',
      userPhone: '376700001',
      userLegacyId: 55085,
      cryptoAddressValue: 'TN3W4H6rK2ce4vX9YnFQHwKENnHjoxb3m9',
      configMaxAmount: null,
      totalReferralCommissions: null,
      totalCompletedWithdrawals: null,
      maxWithdrawableAmount: null,
    },
    {
      id: 'ddf3f298-fc67-4f56-8b1d-c85795ddfdf2',
      amount: 95,
      currency: 'USD',
      status: 'COMPLETED',
      method: 'CRYPTO',
      cryptoType: 'USDT_TRC20',
      fee: 1,
      netAmount: 94,
      fraudScore: 11,
      flaggedAsFraud: false,
      otpVerified: true,
      userIp: '212.56.197.2',
      metadata: null,
      deviceFingerprint: null,
      requestedDate: '2026-02-08T14:18:00Z',
      verifiedDate: '2026-02-08T14:18:13Z',
      approvedDate: '2026-02-08T14:18:49Z',
      processedDate: '2026-02-08T14:19:03Z',
      completedDate: '2026-02-08T14:19:05Z',
      failureReason: null,
      retryCount: 0,
      providerTransactionId: 'TX_11bcf290',
      walletId: 'bb8623ef-3902-4937-95e5-1e64fc6f79c4',
      requestedById: '2a04e1d8-ff5e-4656-8e9e-e641a708b676',
      cryptoAddressId: '91b4d493-cc99-4d47-9b97-44f2c0f9aa0d',
      userEmail: '1@ref.test',
      userAvatar: null,
      userFirstName: 'ref',
      userLastName: 'test',
      userPhone: '376700001',
      userLegacyId: 55085,
      cryptoAddressValue: 'TKv4z3o1o5as8hGL3o4Hnryq3h2x4s7pLA',
      configMaxAmount: null,
      totalReferralCommissions: null,
      totalCompletedWithdrawals: null,
      maxWithdrawableAmount: null,
    },
    {
      id: '4d4f8857-52bc-4319-aa58-0be8eca4e0f7',
      amount: 60,
      currency: 'USD',
      status: 'COMPLETED',
      method: 'CRYPTO',
      cryptoType: 'USDT_ERC20',
      fee: 0.5,
      netAmount: 59.5,
      fraudScore: 9,
      flaggedAsFraud: false,
      otpVerified: true,
      userIp: '212.56.197.2',
      metadata: null,
      deviceFingerprint: null,
      requestedDate: '2026-02-05T12:37:00Z',
      verifiedDate: '2026-02-05T12:37:14Z',
      approvedDate: '2026-02-05T12:37:58Z',
      processedDate: '2026-02-05T12:38:12Z',
      completedDate: '2026-02-05T12:38:13Z',
      failureReason: null,
      retryCount: 0,
      providerTransactionId: 'TX_7b550e01',
      walletId: 'bb8623ef-3902-4937-95e5-1e64fc6f79c4',
      requestedById: '2a04e1d8-ff5e-4656-8e9e-e641a708b676',
      cryptoAddressId: 'd0c6d4ba-95ce-49b9-b0ab-6b0286a4098f',
      userEmail: '1@ref.test',
      userAvatar: null,
      userFirstName: 'ref',
      userLastName: 'test',
      userPhone: '376700001',
      userLegacyId: 55085,
      cryptoAddressValue: '0x22dE1975fF782Aa9D0b8B6EecA1dbBe060A0a61E',
      configMaxAmount: null,
      totalReferralCommissions: null,
      totalCompletedWithdrawals: null,
      maxWithdrawableAmount: null,
    },
  ];

  getOverview(): Observable<WithdrawalsOverview> {
    return of(this.overview).pipe(delay(180));
  }

  getRequests(query: TableQuery): Observable<TablePage<WithdrawalRequest>> {
    const sorted = [...this.requests].sort((left, right) => {
      const leftValue = left[query.sortField as keyof WithdrawalRequest];
      const rightValue = right[query.sortField as keyof WithdrawalRequest];

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
      totalElements: this.requests.length,
      page: query.page,
      size: query.size,
      sort: `${query.sortField},${query.sortDirection}`,
    }).pipe(delay(180));
  }
}
