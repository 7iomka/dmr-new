import { Injectable } from '@angular/core';
import { delay, Observable, of } from 'rxjs';

export type WithdrawalNewPageState = 'no_addresses' | 'no_verified_addresses' | 'withdrawal_unavailable' | 'ready';

export type WithdrawalNewAddressOption = {
  id: string;
  label: string;
  address: string;
  cryptoType: string;
  status: 'VERIFIED' | 'PENDING_VERIFICATION';
};

export type WithdrawalNewSummary = {
  currency: 'USD';
  availableAmount: number;
  minWithdrawalAmount: number;
  fee: number;
  canWithdraw: boolean;
  dailyLimitLabel: string | null;
  withdrawalBlockedReasonLabel: string | null;
};

export type WithdrawalNewScreenData = {
  state: WithdrawalNewPageState;
  summary: WithdrawalNewSummary;
  addresses: WithdrawalNewAddressOption[];
};

@Injectable({ providedIn: 'root' })
export class WithdrawalNewMockApiService {
  private readonly screenData: WithdrawalNewScreenData = {
    state: 'ready',
    summary: {
      currency: 'USD',
      availableAmount: 350.54,
      minWithdrawalAmount: 20,
      fee: 2.5,
      canWithdraw: true,
      dailyLimitLabel: 'Временный лимит: не более $300.00 в сутки.',
      withdrawalBlockedReasonLabel: null,
    },
    addresses: [
      {
        id: 'e0a42c6a-e9e0-479e-b040-27f11e4fb1be',
        label: 'test',
        address: 'TN3W4H6rK2ce4vX9YnFQHwKENnHjoxb3m9',
        cryptoType: 'USDT_TRC20',
        status: 'VERIFIED',
      },
      {
        id: 'c7856708-0c65-4f26-8f30-eac16c9755fe',
        label: 'fake',
        address: 'TN443W4H6rK2ce4vX9YnFQHwKENnHjoxb3',
        cryptoType: 'USDT_TRC20',
        status: 'PENDING_VERIFICATION',
      },
    ],
  };

  getScreenData(): Observable<WithdrawalNewScreenData> {
    return of({
      state: this.screenData.state,
      summary: { ...this.screenData.summary },
      addresses: this.screenData.addresses.map((address) => ({ ...address })),
    }).pipe(delay(120));
  }
}
