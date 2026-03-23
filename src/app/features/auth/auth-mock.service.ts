import { Injectable } from '@angular/core';

import { AuthChannel } from './auth-page.config';

export type OtpContext = {
  purpose: 'login' | 'register' | 'forgot';
  channel: AuthChannel;
  target: string;
  backLink: string;
};

@Injectable({ providedIn: 'root' })
export class AuthMockService {
  private otpContext: OtpContext = {
    purpose: 'login',
    channel: 'email',
    target: 'name@example.com',
    backLink: '/auth/login',
  };

  saveOtpContext(context: OtpContext): void {
    this.otpContext = context;
  }

  getOtpContext(): OtpContext {
    return this.otpContext;
  }
}
