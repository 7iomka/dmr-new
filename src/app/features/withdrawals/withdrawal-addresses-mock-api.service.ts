import { Injectable } from '@angular/core';
import { delay, Observable, of, switchMap } from 'rxjs';

export type CryptoAddressStatus =
  | 'PENDING_APPROVAL'
  | 'PENDING_VERIFICATION'
  | 'PROCESSING'
  | 'COMPLETED'
  | 'FAILED'
  | 'REJECTED'
  | 'CANCELLED'
  | 'VERIFIED';

export type CryptoAddressType = 'USDT_BEP20' | 'USDT_TRC20';

export type CryptoAddress = {
  id: string;
  address: string;
  cryptoType: CryptoAddressType;
  label: string;
  status: CryptoAddressStatus;
  isDefault: boolean;
  createdDate: string;
  verifiedDate: string | null;
  lastUsedDate: string | null;
  usageCount: number;
  verificationMethod: 'OTP_EMAIL' | null;
  userId: string;
  userEmail: string;
};

@Injectable({ providedIn: 'root' })
export class WithdrawalAddressesMockApiService {
  private addresses: CryptoAddress[] = [
    {
      id: '8bf85150-29d6-42b6-97dc-fcd5f7282ed5',
      address: 'TN3W4H6rK2ce4vX9YnFQHwKENnHjoxb3m2',
      cryptoType: 'USDT_TRC20',
      label: 'Т2',
      status: 'VERIFIED',
      isDefault: false,
      createdDate: '2026-03-17T10:24:58.057259Z',
      verifiedDate: '2026-03-17T10:27:43.107321Z',
      lastUsedDate: null,
      usageCount: 0,
      verificationMethod: 'OTP_EMAIL',
      userId: '2a04e1d8-ff5e-4656-8e9e-e641a708b676',
      userEmail: '1@ref.test',
    },
    {
      id: 'e0a42c6a-e9e0-479e-b040-27f11e4fb1be',
      address: 'TN3W4H6rK2ce4vX9YnFQHwKENnHjoxb3m9',
      cryptoType: 'USDT_TRC20',
      label: 'test',
      status: 'VERIFIED',
      isDefault: true,
      createdDate: '2026-02-05T09:46:10.653438Z',
      verifiedDate: '2026-02-05T09:46:30.932075Z',
      lastUsedDate: '2026-02-05T09:48:52.340071Z',
      usageCount: 1,
      verificationMethod: 'OTP_EMAIL',
      userId: '2a04e1d8-ff5e-4656-8e9e-e641a708b676',
      userEmail: '1@ref.test',
    },
    {
      id: 'c7856708-0c65-4f26-8f30-eac16c9755fe',
      address: 'TN443W4H6rK2ce4vX9YnFQHwKENnHjoxb3',
      cryptoType: 'USDT_TRC20',
      label: 'fake',
      status: 'PENDING_VERIFICATION',
      isDefault: false,
      createdDate: '2026-03-17T17:41:00.974925Z',
      verifiedDate: null,
      lastUsedDate: null,
      usageCount: 0,
      verificationMethod: null,
      userId: '2a04e1d8-ff5e-4656-8e9e-e641a708b676',
      userEmail: '1@ref.test',
    },
  ];

  getCryptoAddresses(): Observable<CryptoAddress[]> {
    return of(this.snapshot()).pipe(delay(180));
  }

  addCryptoAddress(input: Pick<CryptoAddress, 'label' | 'cryptoType' | 'address'>): Observable<CryptoAddress[]> {
    this.addresses = [
      {
        id: crypto.randomUUID(),
        address: input.address,
        cryptoType: input.cryptoType,
        label: input.label,
        status: 'PENDING_VERIFICATION',
        isDefault: false,
        createdDate: new Date().toISOString(),
        verifiedDate: null,
        lastUsedDate: null,
        usageCount: 0,
        verificationMethod: null,
        userId: '2a04e1d8-ff5e-4656-8e9e-e641a708b676',
        userEmail: '1@ref.test',
      },
      ...this.addresses,
    ];

    return this.getCryptoAddresses().pipe(delay(80));
  }

  sendCryptoAddressOtp(id: string): Observable<{ success: true }> {
    const target = this.addresses.find((address) => address.id === id);

    if (!target) {
      return of({ success: true } as const).pipe(delay(120));
    }

    return of({ success: true } as const).pipe(delay(220));
  }

  confirmCryptoAddress(id: string, otp: string): Observable<CryptoAddress[]> {
    if (!otp.trim()) {
      return this.getCryptoAddresses().pipe(delay(80));
    }

    this.addresses = this.addresses.map((address) =>
      address.id === id
        ? {
            ...address,
            status: 'VERIFIED',
            verifiedDate: new Date().toISOString(),
            verificationMethod: 'OTP_EMAIL',
          }
        : address,
    );

    return this.getCryptoAddresses().pipe(delay(80));
  }

  setDefaultCryptoAddress(id: string): Observable<CryptoAddress> {
    this.addresses = this.addresses.map((address) => ({
      ...address,
      isDefault: address.id === id,
    }));

    const updated = this.addresses.find((address) => address.id === id)!;
    return of({ ...updated }).pipe(delay(120));
  }

  refreshAfterSetDefault(id: string): Observable<CryptoAddress[]> {
    return this.setDefaultCryptoAddress(id).pipe(switchMap(() => this.getCryptoAddresses()));
  }

  deleteCryptoAddress(id: string): Observable<CryptoAddress[]> {
    const nextAddresses = this.addresses.filter((address) => address.id !== id);
    const hasDefault = nextAddresses.some((address) => address.isDefault);

    this.addresses = nextAddresses.map((address, index) => ({
      ...address,
      isDefault: hasDefault ? address.isDefault : index === 0,
    }));

    return this.getCryptoAddresses().pipe(delay(80));
  }

  private snapshot(): CryptoAddress[] {
    return this.addresses.map((address) => ({ ...address }));
  }
}
