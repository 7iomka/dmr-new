import { Component, computed, DestroyRef, inject, signal } from '@angular/core';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { RouterLink } from '@angular/router';
import { LucideCheck, LucideDynamicIcon, LucideList, LucidePlusCircle, LucideTrash2 } from '@lucide/angular';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';
import { DialogModule } from 'primeng/dialog';
import { TagModule } from 'primeng/tag';

import { AppAlertComponent } from '../../shared/components/alert/alert.component';
import {
  FormControlSelectComponent,
  type FormControlSelectOption,
} from '../../shared/components/form-controls/form-control-select.component';
import { FormControlTextComponent } from '../../shared/components/form-controls/form-control-text.component';
import { FormControlOtpComponent } from '../../shared/components/form-controls/form-control-otp.component';
import {
  type CryptoAddress,
  type CryptoAddressStatus,
  type CryptoAddressType,
  WithdrawalAddressesMockApiService,
} from './withdrawal-addresses-mock-api.service';
import { FormControlErrorMessages } from '../../shared/components/form-controls/form-control-errors';

type AddressStatusMeta = {
  severity: 'success' | 'warn' | 'secondary' | 'danger';
  label: string;
};

const ADDRESS_STATUS_LABELS = {
  PENDING_APPROVAL: 'Ожидает одобрения',
  PENDING_VERIFICATION: 'Ожидает проверки',
  PROCESSING: 'Обработка',
  COMPLETED: 'Завершенный',
  FAILED: 'Неуспешный',
  REJECTED: 'Отклоненный',
  CANCELLED: 'Отменено',
  VERIFIED: 'Подтверждён',
} as const;

const ADDRESS_NETWORK_OPTIONS: (FormControlSelectOption & { value: CryptoAddressType; notice: string })[] = [
  {
    label: 'USDT (BEP20)',
    value: 'USDT_BEP20',
    notice: 'Рекомендуемая сеть для вывода.',
  },
  {
    label: 'USDT (TRC20)',
    value: 'USDT_TRC20',
    notice: 'Для вывода через TRC20 может взиматься комиссия сети. Рекомендуем USDT (BEP20), если доступно.',
  },
];

const OTP_ERROR_MESSAGES: FormControlErrorMessages = {
  required: 'Введите 6-значный код подтверждения.',
  minlength: 'Введите 6-значный код подтверждения.',
  maxlength: 'Введите 6-значный код подтверждения.',
  invalidOtp: 'Неверный OTP-код. Проверьте код и попробуйте снова.',
};

@Component({
  selector: 'app-withdrawal-addresses-page',
  standalone: true,
  host: {
    class: 'app-page',
  },
  imports: [
    CardModule,
    ButtonModule,
    DialogModule,
    TagModule,
    ReactiveFormsModule,
    RouterLink,
    LucideDynamicIcon,
    AppAlertComponent,
    FormControlSelectComponent,
    FormControlTextComponent,
    FormControlOtpComponent,
  ],
  templateUrl: './withdrawal-addresses-page.component.html',
  styleUrl: './withdrawal-addresses-page.component.css',
})
export class WithdrawalAddressesPageComponent {
  private readonly destroyRef = inject(DestroyRef);
  private readonly formBuilder = inject(FormBuilder);
  private readonly api = inject(WithdrawalAddressesMockApiService);
  private otpResendTimerId: ReturnType<typeof setInterval> | null = null;

  protected readonly addresses = signal<CryptoAddress[]>([]);
  protected readonly isAddDialogOpen = signal(false);
  protected readonly confirmDialogAddressId = signal<string | null>(null);
  protected readonly otpResendSecondsLeft = signal(0);

  protected readonly addAddressForm = this.formBuilder.group({
    cryptoType: this.formBuilder.nonNullable.control<CryptoAddressType>('USDT_BEP20', {
      validators: [Validators.required],
    }),
    address: this.formBuilder.nonNullable.control('', { validators: [Validators.required] }),
    label: this.formBuilder.nonNullable.control('', { validators: [Validators.required] }),
  });

  protected readonly otpForm = this.formBuilder.group({
    otp: this.formBuilder.nonNullable.control('', {
      validators: [Validators.required, Validators.minLength(6), Validators.maxLength(6)],
    }),
  });

  protected readonly networkOptions = ADDRESS_NETWORK_OPTIONS;
  protected readonly otpErrorMessages = OTP_ERROR_MESSAGES;

  protected readonly selectedNetworkNotice = computed(() => {
    const selectedNetwork = this.addAddressForm.controls.cryptoType.value;
    return this.networkOptions.find((option) => option.value === selectedNetwork)?.notice ?? '';
  });

  protected readonly selectedNetworkNoticeSeverity = computed<'info' | 'warn'>(() =>
    this.addAddressForm.controls.cryptoType.value === 'USDT_TRC20' ? 'warn' : 'info',
  );

  protected readonly addressPlaceholder = computed(() =>
    this.addAddressForm.controls.cryptoType.value === 'USDT_TRC20'
      ? 'Введите адрес TRC20 (начинается с T...)'
      : 'Введите адрес BEP20 (0x...)',
  );

  protected readonly confirmDialogAddress = computed(
    () => this.addresses().find((address) => address.id === this.confirmDialogAddressId()) ?? null,
  );

  constructor() {
    this.destroyRef.onDestroy(() => {
      this.clearOtpResendTimer();
    });

    this.loadAddresses();
  }

  protected openAddDialog(): void {
    this.isAddDialogOpen.set(true);
  }

  protected closeAddDialog(): void {
    this.isAddDialogOpen.set(false);
    this.addAddressForm.reset({
      cryptoType: 'USDT_BEP20',
      address: '',
      label: '',
    });
  }

  protected submitAddAddress(): void {
    if (this.addAddressForm.invalid) {
      this.addAddressForm.markAllAsTouched();
      return;
    }

    const rawValue = this.addAddressForm.getRawValue();

    this.api
      .addCryptoAddress({
        cryptoType: rawValue.cryptoType,
        address: rawValue.address,
        label: rawValue.label,
      })
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => {
        this.addresses.set(response);
        this.closeAddDialog();
      });
  }

  protected onAddDialogVisibleChange(visible: boolean): void {
    if (!visible) {
      this.closeAddDialog();
    }
  }

  protected openConfirmDialog(id: string): void {
    this.confirmDialogAddressId.set(id);
    this.otpForm.reset({ otp: '' });

    this.api
      .sendCryptoAddressOtp(id)
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe(() => this.startOtpResendTimer());
  }

  protected closeConfirmDialog(): void {
    this.confirmDialogAddressId.set(null);
    this.clearOtpResendTimer();
    this.otpResendSecondsLeft.set(0);
    this.otpForm.reset({ otp: '' });
  }

  protected onConfirmDialogVisibleChange(visible: boolean): void {
    if (!visible) {
      this.closeConfirmDialog();
    }
  }

  protected confirmAddress(): void {
    const otp = this.otpForm.controls.otp.value;

    if (otp.length !== 6) {
      this.otpForm.controls.otp.markAsTouched();
      return;
    }

    const addressId = this.confirmDialogAddressId();
    if (!addressId) {
      return;
    }

    this.api
      .confirmCryptoAddress(addressId, otp)
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => {
        this.addresses.set(response);
        this.closeConfirmDialog();
      });
  }

  protected resendOtp(): void {
    const addressId = this.confirmDialogAddressId();
    if (!addressId || this.otpResendSecondsLeft() > 0) {
      return;
    }

    this.api
      .sendCryptoAddressOtp(addressId)
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe(() => this.startOtpResendTimer());
  }

  protected setDefault(id: string): void {
    this.api
      .refreshAfterSetDefault(id)
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => this.addresses.set(response));
  }

  protected deleteAddress(id: string): void {
    this.api
      .deleteCryptoAddress(id)
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => {
        this.addresses.set(response);
        if (this.confirmDialogAddressId() === id) {
          this.closeConfirmDialog();
        }
      });
  }

  protected statusMeta(address: CryptoAddress): AddressStatusMeta {
    const severityMap: Record<CryptoAddressStatus, AddressStatusMeta['severity']> = {
      VERIFIED: 'success',
      PENDING_VERIFICATION: 'warn',
      PENDING_APPROVAL: 'secondary',
      PROCESSING: 'secondary',
      COMPLETED: 'success',
      FAILED: 'danger',
      REJECTED: 'danger',
      CANCELLED: 'secondary',
    };

    return {
      severity: severityMap[address.status] ?? 'secondary',
      label: ADDRESS_STATUS_LABELS[address.status] ?? address.status,
    };
  }

  protected networkLabel(network: CryptoAddressType): string {
    return network === 'USDT_TRC20' ? 'USDT (TRC20)' : 'USDT (BEP20)';
  }

  protected onNetworkChange(value: unknown): void {
    if (value === 'USDT_BEP20' || value === 'USDT_TRC20') {
      this.addAddressForm.controls.cryptoType.setValue(value);
    }
  }

  protected isPendingVerification(address: CryptoAddress): boolean {
    return address.status === 'PENDING_VERIFICATION';
  }

  protected pendingVerificationMessage(address: CryptoAddress): string {
    return `Ваш кошелек ${address.cryptoType} ожидает проверки. Завершите проверку, чтобы активировать свой кошелек.`;
  }

  protected confirmDialogNetworkTag(address: CryptoAddress): string {
    return address.cryptoType;
  }

  protected otpResendCountdownText(): string | null {
    const secondsLeft = this.otpResendSecondsLeft();
    if (secondsLeft <= 0) {
      return null;
    }

    return `Повторно отправить код через ${secondsLeft}s`;
  }

  private startOtpResendTimer(): void {
    this.clearOtpResendTimer();
    this.otpResendSecondsLeft.set(300);

    this.otpResendTimerId = setInterval(() => {
      const nextValue = this.otpResendSecondsLeft() - 1;
      if (nextValue <= 0) {
        this.otpResendSecondsLeft.set(0);
        this.clearOtpResendTimer();
        return;
      }

      this.otpResendSecondsLeft.set(nextValue);
    }, 1000);
  }

  private clearOtpResendTimer(): void {
    if (this.otpResendTimerId) {
      clearInterval(this.otpResendTimerId);
      this.otpResendTimerId = null;
    }
  }

  private loadAddresses(): void {
    this.api
      .getCryptoAddresses()
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => this.addresses.set(response));
  }

  protected readonly listIcon = LucideList;
  protected readonly plusCircleIcon = LucidePlusCircle;
  protected readonly checkIcon = LucideCheck;
  protected readonly trashIcon = LucideTrash2;
}
