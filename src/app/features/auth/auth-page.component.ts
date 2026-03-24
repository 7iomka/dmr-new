import { CommonModule } from '@angular/common';
import { Component, computed, effect, inject } from '@angular/core';
import {
  AbstractControl,
  FormControl,
  FormGroup,
  FormsModule,
  ReactiveFormsModule,
  ValidationErrors,
  ValidatorFn,
  Validators,
} from '@angular/forms';
import { ActivatedRoute, ParamMap, Router, RouterLink } from '@angular/router';
import { toSignal } from '@angular/core/rxjs-interop';
import { LucideChevronRight, LucideDynamicIcon } from '@lucide/angular';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';

import { FormControlOtpComponent } from '../../shared/components/form-control-otp.component';
import { FormControlPasswordComponent } from '../../shared/components/form-control-password.component';
import { FormControlTextComponent } from '../../shared/components/form-control-text.component';
import { FormControlPhoneComponent } from '../../shared/components/form-control-phone.component';

import { AuthMockService } from './auth-mock.service';
import { AUTH_PAGE_CONFIGS, AUTH_PATH_TO_CHANNEL, AuthField, AuthPageConfig } from './auth-page.config';

@Component({
  selector: 'app-auth-page',
  standalone: true,
  imports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
    RouterLink,
    CardModule,
    ButtonModule,
    FormControlTextComponent,
    FormControlPhoneComponent,
    FormControlPasswordComponent,
    FormControlOtpComponent,
    LucideChevronRight,
    LucideDynamicIcon,
  ],
  template: `
    <section class="auth-shell">
      <div class="auth-shell-glow"></div>

      <p-card class="auth-card">
        <div class="auth-card-dot auth-card-dot-1"></div>
        <div class="auth-card-dot auth-card-dot-2"></div>

        <div class="auth-head">
          <div class="auth-card-icon">
            <svg class="h-6 w-6" [lucideIcon]="config().icon"></svg>
          </div>
          <h1 class="auth-title">{{ config().title }}</h1>
          <p class="auth-subtitle">{{ subtitle() }}</p>
        </div>

        @if (config().mode === 'selector') {
          <div class="auth-method-list">
            @for (link of config().links; track link.routerLink) {
              <a class="auth-method-btn" [class.auth-method-btn-primary]="link.primary" [routerLink]="link.routerLink">
                <div class="auth-method-row">
                  <div class="auth-method-left">
                    <span class="auth-method-icon">
                      <svg class="h-5 w-5" [lucideIcon]="link.icon"></svg>
                    </span>
                    <div class="min-w-0">
                      <p class="auth-method-title">{{ link.title }}</p>
                      <p class="auth-method-desc">{{ link.description }}</p>
                    </div>
                  </div>
                  <svg class="auth-method-arrow" lucideChevronRight></svg>
                </div>
              </a>
            }
          </div>
        }

        @if (config().mode === 'form') {
          <form class="auth-form" [formGroup]="form" (ngSubmit)="submitForm()">
            <div class="auth-form-fields">
              @for (field of config().fields ?? []; track field.name) {
                @if (field.type === 'password') {
                  <app-form-control-password
                    [autocomplete]="field.autocomplete ?? 'new-password'"
                    [controlName]="field.name"
                    [formGroup]="form"
                    [icon]="field.icon"
                    [label]="field.label"
                    [placeholder]="field.placeholder"
                    [showStrength]="shouldShowPasswordStrength(field)" />
                } @else if (field.type === 'tel') {
                  <app-form-control-phone
                    [autocomplete]="field.autocomplete"
                    [controlName]="field.name"
                    [formGroup]="form"
                    [label]="field.label"
                    [placeholder]="field.placeholder" />
                } @else {
                  <app-form-control-text
                    [autocomplete]="field.autocomplete"
                    [controlName]="field.name"
                    [formGroup]="form"
                    [icon]="field.icon"
                    [label]="field.label"
                    [placeholder]="field.placeholder"
                    [type]="field.type" />
                }
              }

              @if (
                routeKey() === 'register/phone' &&
                form.hasError('passwordMismatch') &&
                (form.get('confirmPassword')?.touched || form.get('password')?.touched)
              ) {
                <p class="c-form-control__meta c-form-control__meta--error">Пароли не совпадают.</p>
              }
            </div>

            <div class="auth-actions">
              <p-button type="submit" [label]="config().submitLabel ?? 'Продолжить'" />
              <p-button
                severity="secondary"
                type="button"
                variant="outlined"
                [label]="config().backLabel ?? 'Назад'"
                [routerLink]="config().backLink ?? '/auth/login'" />
            </div>
          </form>
        }

        @if (config().mode === 'otp') {
          <form class="auth-form" (ngSubmit)="submitOtp()">
            <div class="auth-form-fields">
              <app-form-control-otp
                inputId="auth-otp-input"
                label="Код подтверждения"
                metaText="Код действителен 02:00"
                name="otpCode"
                [length]="6"
                [(value)]="otpCode" />
            </div>
            <div class="auth-actions">
              <p-button type="submit" [label]="config().submitLabel ?? 'Подтвердить'" />
              <p-button
                icon="pi pi-refresh"
                severity="secondary"
                type="button"
                variant="outlined"
                [label]="config().backLabel ?? 'Повторно отправить'"
                (onClick)="resendOtp()" />
            </div>
          </form>
        }

        <div class="auth-divider auth-footer" [class.justify-start]="config().footerLinks?.length === 1">
          @for (link of config().footerLinks ?? []; track link.label) {
            <span class="auth-muted">
              {{ link.prefix }}<a class="auth-link" [routerLink]="link.link">{{ link.label }}</a>
            </span>
          }
        </div>
      </p-card>
    </section>
  `,
  styleUrl: './auth-page.component.css',
})
export class AuthPageComponent {
  private readonly route = inject(ActivatedRoute);
  private readonly router = inject(Router);
  private readonly authMockService = inject(AuthMockService);
  private readonly routeParams = toSignal(this.route.paramMap, { initialValue: this.route.snapshot.paramMap });

  protected otpCode = '';
  protected readonly routeKey = computed(() => this.resolveRouteKey(this.routeParams()));
  protected readonly config = computed<AuthPageConfig>(
    () => AUTH_PAGE_CONFIGS[this.routeKey()] ?? AUTH_PAGE_CONFIGS['login'],
  );
  protected readonly subtitle = computed(() => {
    if (this.routeKey() !== 'otp') {
      return this.config().subtitle;
    }

    const context = this.authMockService.getOtpContext();
    const channelLabelMap: Record<string, string> = {
      email: 'Email',
      telegram: 'Telegram',
      whatsapp: 'WhatsApp',
      phone: 'Телефон',
    };

    return `Код отправлен на ${channelLabelMap[context.channel]}: ${context.target}.`;
  });

  protected readonly form = new FormGroup({});

  constructor() {
    effect(() => {
      this.syncFormControls(this.config().fields ?? []);
      this.form.reset();
      this.otpCode = '';
    });
  }

  protected submitForm(): void {
    if (this.form.invalid) {
      this.form.markAllAsTouched();
      return;
    }

    const path = this.routeKey();
    if (path === 'login/password' || path === 'register/phone') {
      void this.router.navigateByUrl('/dashboard');
      return;
    }

    const contextChannel = AUTH_PATH_TO_CHANNEL[path] ?? 'email';
    const targetField = contextChannel === 'email' ? 'email' : contextChannel;
    const target = this.readControlValue(targetField) ?? this.readControlValue('phone') ?? 'demo-user';

    const purpose = path.startsWith('register') ? 'register' : path.startsWith('forgot') ? 'forgot' : 'login';

    this.authMockService.saveOtpContext({
      purpose,
      channel: contextChannel,
      target,
      backLink: `/auth/${path}`,
    });
    void this.router.navigateByUrl('/auth/otp');
  }

  protected submitOtp(): void {
    if (this.otpCode.length < 6) {
      return;
    }

    void this.router.navigateByUrl('/dashboard');
  }

  protected resendOtp(): void {
    this.otpCode = '';
  }

  protected shouldShowPasswordStrength(field: AuthField): boolean {
    return this.routeKey() === 'register/phone' && field.name === 'password';
  }

  private passwordRulesValidator(control: AbstractControl): ValidationErrors | null {
    const value = typeof control.value === 'string' ? control.value : '';

    if (!value) {
      return { required: true };
    }

    const isValid =
      value.length >= 8 &&
      value.length <= 16 &&
      /[A-ZА-ЯЁ]/.test(value) &&
      /[a-zа-яё]/.test(value) &&
      /\d/.test(value) &&
      /[^A-Za-zА-Яа-яЁё0-9]/.test(value);

    return isValid ? null : { passwordRules: true };
  }

  private passwordMatchValidator(group: AbstractControl): ValidationErrors | null {
    const password = group.get('password')?.value;
    const confirmPassword = group.get('confirmPassword')?.value;

    if (typeof password !== 'string' || typeof confirmPassword !== 'string') {
      return null;
    }

    if (!confirmPassword) {
      return null;
    }

    return password === confirmPassword ? null : { passwordMismatch: true };
  }

  private resolveControlValidators(field: AuthField): ValidatorFn[] {
    if (field.optional) {
      return [];
    }

    if (this.routeKey() === 'register/phone' && field.name === 'password') {
      return [this.passwordRulesValidator.bind(this)];
    }

    return [Validators.required];
  }

  private readControlValue(controlName: string): string | null {
    const value = this.form.get(controlName)?.value;

    return typeof value === 'string' && value.trim().length > 0 ? value : null;
  }

  private resolveRouteKey(params: ParamMap): string {
    const mode = params.get('mode');
    const method = params.get('method');

    if (!mode) {
      return 'login';
    }

    return method ? `${mode}/${method}` : mode;
  }

  private syncFormControls(fields: AuthField[]): void {
    const nextControlNames = new Set(fields.map((field) => field.name));

    for (const field of fields) {
      if (this.form.contains(field.name)) {
        continue;
      }

      this.form.addControl(field.name, new FormControl('', this.resolveControlValidators(field), []));
    }

    for (const controlName of Object.keys(this.form.controls)) {
      if (!nextControlNames.has(controlName)) {
        this.form.removeControl(controlName);
      }
    }

    const hasPasswordPair = nextControlNames.has('password') && nextControlNames.has('confirmPassword');
    this.form.setValidators(hasPasswordPair ? this.passwordMatchValidator.bind(this) : null);
    this.form.updateValueAndValidity({ emitEvent: false });
  }
}
