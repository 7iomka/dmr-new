import { Injectable } from '@angular/core';
import { delay, Observable, of } from 'rxjs';

export type AccountSocialLink = {
  url: string;
  type: string;
};

export type AccountAvatarDoc = {
  fileName: string | null;
  content: string;
  extension: string;
};

export type AccountResponse = {
  id: string;
  login: string;
  firstName: string;
  lastName: string;
  email: string;
  phone: string | null;
  langKey: string;
  status: string;
  birthDate: string;
  country: string;
  addressLine: string;
  docs: string[];
  selfieDocs: string[];
  docType: string;
  docNumber: string;
  reviewMessage: string | null;
  authorities: string[];
  createdDate: string;
  lastModifiedDate: string;
  createdBy: string;
  lastModifiedBy: string;
  hasAcceptTerms: boolean;
  referralCode: string;
  supervisorStatus: string;
  city: string | null;
  countryFlag: string | null;
  socialLinks: AccountSocialLink[];
  avatar: string | null;
  legacyId: string;
  avatarDoc: AccountAvatarDoc;
};

const MOCK_ACCOUNT: AccountResponse = {
  id: '2a04e1d8-ff5e-4656-8e9e-e641a708b676',
  login: '1@ref.test',
  firstName: 'ref',
  lastName: 'test',
  email: '1@ref.test',
  phone: '376700001',
  langKey: 'RU',
  status: 'ACTIVE',
  birthDate: '2007-12-04',
  country: 'Andorra',
  addressLine: 'andora test',
  docs: ['2a04e1d8-ff5e-4656-8e9e-e641a708b676/0.png'],
  selfieDocs: [],
  docType: 'PASSPORT',
  docNumber: '1',
  reviewMessage: null,
  authorities: ['ROLE_USER', 'ROLE_INVESTOR'],
  createdDate: '2025-12-23T21:32:51.045245Z',
  lastModifiedDate: '2026-03-19T00:29:35.957833Z',
  createdBy: 'anonymousUser',
  lastModifiedBy: '1@ref.test',
  hasAcceptTerms: true,
  referralCode: '2A04E1D8',
  supervisorStatus: 'APPROVED',
  city: null,
  countryFlag: null,
  socialLinks: [
    {
      url: 'https://www.facebook.com/7iomka/',
      type: 'facebook',
    },
  ],
  avatar: null,
  legacyId: '55085',
  avatarDoc: {
    fileName: null,
    content: '',
    extension: '',
  },
};

@Injectable({ providedIn: 'root' })
export class AccountMockApiService {
  getAccount(): Observable<AccountResponse> {
    return of(MOCK_ACCOUNT).pipe(delay(120));
  }
}
