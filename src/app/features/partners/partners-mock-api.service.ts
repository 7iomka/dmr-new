import { Injectable } from '@angular/core';
import { delay, Observable, of } from 'rxjs';

export type SortDirection = 'asc' | 'desc';

export type TablePage<T> = {
  content: T[];
  totalElements: number;
  page: number;
  size: number;
  sort: string;
};

export type ReferralTableQuery = {
  accountId: string;
  page: number;
  size: number;
  sortField: keyof ReferralViewDirectItem;
  sortDirection: SortDirection;
  search?: string;
};

export type MyReferralSummaryResponse = {
  referralCode: string;
  activeDescendantsCount: number;
  totalDescendantsCount: number;
};

export type WithdrawalsOverviewResponse = {
  walletId: string;
  walletBalance: number;
  availableBalance: number;
  blockedBalance: number;
  currency: string;
  walletStatus: string;
  kycVerified: boolean;
  totalReferralEarnings: number;
  currentMonthReferralEarnings: number;
  totalWithdrawn: number;
  referralBalance: number;
  maxWithdrawableAmount: number;
  minWithdrawalAmount: number;
  dailyLimit: number;
  weeklyLimit: number;
  monthlyLimit: number;
  dailyUsed: number;
  weeklyUsed: number;
  monthlyUsed: number;
  minBalanceAfterWithdrawal: number;
  cryptoFeePercent: number;
  cryptoFeeMin: number;
  bankTransferFee: number;
  transfersBlocked: boolean;
  canWithdraw: boolean;
  withdrawalBlockedReason: string | null;
};

export type ReferralViewDirectItem = {
  id: string;
  legacyId: number;
  login: string;
  fullName: string;
  email: string;
  phone: string | null;
  referralCode: string;
  referralLevel: number;
  status: string;
  createdDate: string;
  referrerId: string;
  referrerLogin: string;
  referrerFullName: string;
  depthLevel: number;
  directReferralsCount: number;
  totalDescendantsCount: number;
  lastReferralDate: string | null;
};

const ROOT_ACCOUNT_ID = '2a04e1d8-ff5e-4656-8e9e-e641a708b676';
const ROOT_REFERRER_LOGIN = '1@ref.test';
const ROOT_REFERRER_FULL_NAME = 'ref test';
const MAX_DEPTH = 20;

const MY_REFERRAL_SUMMARY: MyReferralSummaryResponse = {
  referralCode: '2A04E1D8',
  activeDescendantsCount: 4,
  totalDescendantsCount: 15,
};

const WITHDRAWALS_OVERVIEW: WithdrawalsOverviewResponse = {
  walletId: 'bb8623ef-3902-4937-95e5-1e64fc6f79c4',
  walletBalance: 350.54,
  availableBalance: 350.54,
  blockedBalance: 0,
  currency: 'USD',
  walletStatus: 'ACTIVE',
  kycVerified: true,
  totalReferralEarnings: 10.21,
  currentMonthReferralEarnings: 0,
  totalWithdrawn: 100,
  referralBalance: 0,
  maxWithdrawableAmount: 0,
  minWithdrawalAmount: 20,
  dailyLimit: 5000,
  weeklyLimit: 20000,
  monthlyLimit: 50000,
  dailyUsed: 0,
  weeklyUsed: 0,
  monthlyUsed: 0,
  minBalanceAfterWithdrawal: 10,
  cryptoFeePercent: 0,
  cryptoFeeMin: 0,
  bankTransferFee: 5,
  transfersBlocked: false,
  canWithdraw: false,
  withdrawalBlockedReason: 'INSUFFICIENT_REFERRAL_BALANCE',
};

const ROOT_DIRECT_REFERRALS: ReferralViewDirectItem[] = [
  {
    id: 'd4a93766-67cc-4fe5-b70a-c076bb7b0eeb',
    legacyId: 55015,
    login: '13@ref.test',
    fullName: ' ',
    email: '13@ref.test',
    phone: null,
    referralCode: 'D4A93766',
    referralLevel: 1,
    status: 'PENDING',
    createdDate: '2025-12-23T21:33:29.057333Z',
    referrerId: ROOT_ACCOUNT_ID,
    referrerLogin: ROOT_REFERRER_LOGIN,
    referrerFullName: ROOT_REFERRER_FULL_NAME,
    depthLevel: 1,
    directReferralsCount: 0,
    totalDescendantsCount: 0,
    lastReferralDate: null,
  },
  {
    id: '862609bc-d37b-4ec1-aa81-95bbadb17d2e',
    legacyId: 55023,
    login: '12@ref.test',
    fullName: ' ',
    email: '12@ref.test',
    phone: null,
    referralCode: '862609BC',
    referralLevel: 1,
    status: 'PENDING',
    createdDate: '2025-12-23T21:33:16.076392Z',
    referrerId: ROOT_ACCOUNT_ID,
    referrerLogin: ROOT_REFERRER_LOGIN,
    referrerFullName: ROOT_REFERRER_FULL_NAME,
    depthLevel: 1,
    directReferralsCount: 0,
    totalDescendantsCount: 0,
    lastReferralDate: null,
  },
  {
    id: '286f938a-3521-4e17-9bd1-7908d3888e44',
    legacyId: 55024,
    login: '11@ref.test',
    fullName: 'ref11 test',
    email: '11@ref.test',
    phone: '376700011',
    referralCode: '286F938A',
    referralLevel: 1,
    status: 'ACTIVE',
    createdDate: '2025-12-23T21:33:08.940489Z',
    referrerId: ROOT_ACCOUNT_ID,
    referrerLogin: ROOT_REFERRER_LOGIN,
    referrerFullName: ROOT_REFERRER_FULL_NAME,
    depthLevel: 1,
    directReferralsCount: 3,
    totalDescendantsCount: 12,
    lastReferralDate: '2025-12-23T21:33:58.140469Z',
  },
];

@Injectable({ providedIn: 'root' })
export class PartnersMockApiService {
  private readonly childrenCache = new Map<string, ReferralViewDirectItem[]>();
  private readonly nodeIndex = new Map<string, ReferralViewDirectItem>();

  constructor() {
    this.childrenCache.set(ROOT_ACCOUNT_ID, ROOT_DIRECT_REFERRALS);

    for (const referral of ROOT_DIRECT_REFERRALS) {
      this.nodeIndex.set(referral.id, referral);
    }
  }

  getMyReferralSummary(): Observable<MyReferralSummaryResponse> {
    return of(MY_REFERRAL_SUMMARY).pipe(delay(160));
  }

  getWithdrawalsOverview(): Observable<WithdrawalsOverviewResponse> {
    return of(WITHDRAWALS_OVERVIEW).pipe(delay(180));
  }

  getDirectReferrals(query: ReferralTableQuery): Observable<TablePage<ReferralViewDirectItem>> {
    const items = this.getChildren(query.accountId);
    const filtered = this.filterItems(items, query.search);
    const sorted = this.sortItems(filtered, query.sortField, query.sortDirection);
    const start = query.page * query.size;
    const content = sorted.slice(start, start + query.size);

    return of({
      content,
      totalElements: sorted.length,
      page: query.page,
      size: query.size,
      sort: `${String(query.sortField)},${query.sortDirection}`,
    }).pipe(delay(220));
  }

  private getChildren(parentId: string): ReferralViewDirectItem[] {
    const cached = this.childrenCache.get(parentId);

    if (cached) {
      return cached;
    }

    const parent = this.nodeIndex.get(parentId);

    if (!parent || parent.directReferralsCount === 0 || parent.depthLevel >= MAX_DEPTH) {
      return [];
    }

    const generated = this.generateChildren(parent);
    this.childrenCache.set(parentId, generated);

    for (const child of generated) {
      this.nodeIndex.set(child.id, child);
    }

    return generated;
  }

  private generateChildren(parent: ReferralViewDirectItem): ReferralViewDirectItem[] {
    const childCount = Math.max(0, Math.min(parent.directReferralsCount, parent.totalDescendantsCount));
    const nestedTotal = Math.max(0, parent.totalDescendantsCount - childCount);
    const childNestedTotals = this.distribute(nestedTotal, childCount, parent.id);
    const nextDepth = parent.depthLevel + 1;

    return childNestedTotals.map((childNestedTotal, index) => {
      const loginNumber = 100 + parent.depthLevel * 10 + index + 1 + (this.hash(`${parent.id}:${index}`) % 9);
      const personCode = `${loginNumber}`;
      const hasFullName = index % 2 === 0;
      const status = this.resolveStatus(parent, index, childNestedTotal);
      const createdDate = this.shiftIsoDate(parent.createdDate, (index + 1) * 11 + parent.depthLevel * 7);
      const lastReferralDate = childNestedTotal > 0 ? this.shiftIsoDate(createdDate, childNestedTotal * 9 + 13) : null;
      const directReferralsCount =
        childNestedTotal === 0 || nextDepth >= MAX_DEPTH
          ? 0
          : Math.min(childNestedTotal, this.resolveDirectCount(childNestedTotal, `${parent.id}:${index}`, nextDepth));

      return {
        id: this.formatUuid(parent.id, index),
        legacyId: 56000 + ((this.hash(`${parent.id}:${index}:legacy`) + index) % 3000),
        login: `${personCode}@ref.test`,
        fullName: hasFullName ? `ref${personCode} test` : ' ',
        email: `${personCode}@ref.test`,
        phone: hasFullName ? `3767${personCode.padStart(5, '0')}` : null,
        referralCode: this.formatReferralCode(`${parent.id}:${index}:code`),
        referralLevel: nextDepth,
        status,
        createdDate,
        referrerId: parent.id,
        referrerLogin: parent.login,
        referrerFullName: this.normalizeFullName(parent.fullName, parent.login),
        depthLevel: nextDepth,
        directReferralsCount,
        totalDescendantsCount: childNestedTotal,
        lastReferralDate,
      };
    });
  }

  private distribute(total: number, count: number, seed: string): number[] {
    if (count === 0) {
      return [];
    }

    const result = new Array<number>(count).fill(0);
    let remaining = total;

    for (let index = 0; index < count; index += 1) {
      const slotsLeft = count - index - 1;

      if (slotsLeft === 0) {
        result[index] = remaining;
        break;
      }

      const ratio = Math.max(1, count - index + (this.hash(`${seed}:${index}`) % 3));
      const proposed = Math.floor(remaining / ratio);
      const minReserved = 0;
      const maxAllowed = remaining - slotsLeft * minReserved;
      const value = Math.max(0, Math.min(maxAllowed, proposed));
      result[index] = value;
      remaining -= value;
    }

    return result.sort((left, right) => right - left);
  }

  private resolveDirectCount(totalDescendantsCount: number, seed: string, depthLevel: number): number {
    if (depthLevel >= MAX_DEPTH) {
      return 0;
    }

    if (totalDescendantsCount <= 2) {
      return totalDescendantsCount;
    }

    return 1 + (this.hash(seed) % Math.min(3, totalDescendantsCount));
  }

  private resolveStatus(parent: ReferralViewDirectItem, index: number, totalDescendantsCount: number): string {
    if (totalDescendantsCount > 0) {
      return 'ACTIVE';
    }

    if (parent.status === 'ACTIVE' && index === 0) {
      return 'ACTIVE';
    }

    return index % 2 === 0 ? 'PENDING' : 'ACTIVE';
  }

  private filterItems(items: ReferralViewDirectItem[], rawSearch?: string): ReferralViewDirectItem[] {
    const search = rawSearch?.trim().toLowerCase();

    if (!search) {
      return items;
    }

    return items.filter((item) =>
      [String(item.legacyId), item.email, item.phone ?? '', item.login, item.fullName]
        .join(' ')
        .toLowerCase()
        .includes(search),
    );
  }

  private sortItems(
    items: ReferralViewDirectItem[],
    sortField: keyof ReferralViewDirectItem,
    sortDirection: SortDirection,
  ): ReferralViewDirectItem[] {
    return [...items].sort((left, right) => {
      const leftValue = left[sortField];
      const rightValue = right[sortField];

      if (leftValue === rightValue) {
        return 0;
      }

      if (leftValue === null) {
        return 1;
      }

      if (rightValue === null) {
        return -1;
      }

      const result = String(leftValue).localeCompare(String(rightValue), 'ru', {
        numeric: true,
        sensitivity: 'base',
      });

      return sortDirection === 'asc' ? result : result * -1;
    });
  }

  private normalizeFullName(fullName: string, login: string): string {
    return fullName.trim() || login;
  }

  private shiftIsoDate(isoDate: string, minutes: number): string {
    const nextDate = new Date(isoDate);
    nextDate.setUTCMinutes(nextDate.getUTCMinutes() + minutes);
    return nextDate.toISOString();
  }

  private formatReferralCode(seed: string): string {
    return Math.abs(this.hash(seed)).toString(16).toUpperCase().padStart(8, '0').slice(0, 8);
  }

  private formatUuid(seed: string, index: number): string {
    const hex = `${Math.abs(this.hash(`${seed}:${index}:uuid`))
      .toString(16)
      .padStart(8, '0')}${Math.abs(this.hash(`${seed}:${index}:uuid:2`))
      .toString(16)
      .padStart(8, '0')}${Math.abs(this.hash(`${seed}:${index}:uuid:3`))
      .toString(16)
      .padStart(8, '0')}${Math.abs(this.hash(`${seed}:${index}:uuid:4`))
      .toString(16)
      .padStart(8, '0')}`;

    return `${hex.slice(0, 8)}-${hex.slice(8, 12)}-${hex.slice(12, 16)}-${hex.slice(16, 20)}-${hex.slice(20, 32)}`;
  }

  private hash(value: string): number {
    let hash = 0;

    for (let index = 0; index < value.length; index += 1) {
      hash = (hash * 31 + value.charCodeAt(index)) | 0;
    }

    return Math.abs(hash);
  }
}
