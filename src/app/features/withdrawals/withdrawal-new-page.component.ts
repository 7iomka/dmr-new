import { CurrencyPipe } from '@angular/common';
import { Component, computed, DestroyRef, inject, signal } from '@angular/core';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { RouterLink } from '@angular/router';
import { LucideCircleAlert, LucideCirclePlus, LucideList } from '@lucide/angular';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';

import {
  FormControlSelectComponent,
  type FormControlSelectOption,
} from '../../shared/components/form-controls/form-control-select.component';
import { FormControlTextComponent } from '../../shared/components/form-controls/form-control-text.component';
import {
  type WithdrawalNewAddressOption,
  WithdrawalNewMockApiService,
  type WithdrawalNewPageState,
  type WithdrawalNewScreenData,
} from './withdrawal-new-mock-api.service';

type StatePanelMeta = {
  actionLabel: string | null;
  actionLink: string | null;
  body: string;
  title: string;
};

const STATE_PANEL_META: Record<WithdrawalNewPageState, StatePanelMeta> = {
  ready: {
    title: 'Готово к подтверждению заявки',
    body: 'Проверьте сумму, адрес и итоговую сумму к получению перед подтверждением по OTP.',
    actionLabel: null,
    actionLink: null,
  },
  no_addresses: {
    title: 'У вас пока нет адресов для вывода',
    body: 'Сначала добавьте адрес для вывода средств, после этого вы сможете создать заявку.',
    actionLabel: 'Добавить адрес',
    actionLink: '/withdrawals/addresses',
  },
  no_verified_addresses: {
    title: 'Нет подтверждённых адресов для вывода',
    body: 'Для создания заявки нужен хотя бы один подтверждённый адрес. Подтвердите существующий адрес или добавьте новый.',
    actionLabel: 'Управлять адресами',
    actionLink: '/withdrawals/addresses',
  },
  withdrawal_unavailable: {
    title: 'Вывод временно недоступен',
    body: 'Сейчас создание новой заявки ограничено. Проверьте причину блокировки и попробуйте позже.',
    actionLabel: null,
    actionLink: null,
  },
};

@Component({
  selector: 'app-withdrawal-new-page',
  standalone: true,
  host: {
    class: 'app-page',
  },
  imports: [
    CardModule,
    ButtonModule,
    ReactiveFormsModule,
    RouterLink,
    CurrencyPipe,
    LucideCirclePlus,
    LucideList,
    LucideCircleAlert,
    FormControlTextComponent,
    FormControlSelectComponent,
  ],
  templateUrl: './withdrawal-new-page.component.html',
  styleUrl: './withdrawal-new-page.component.css',
})
export class WithdrawalNewPageComponent {
  private readonly destroyRef = inject(DestroyRef);
  private readonly formBuilder = inject(FormBuilder);
  private readonly api = inject(WithdrawalNewMockApiService);

  protected readonly screenData = signal<WithdrawalNewScreenData | null>(null);

  protected readonly form = this.formBuilder.group({
    amount: this.formBuilder.nonNullable.control('', {
      validators: [Validators.required],
    }),
    addressId: this.formBuilder.nonNullable.control('', {
      validators: [Validators.required],
    }),
  });

  protected readonly verifiedAddressOptions = computed<FormControlSelectOption[]>(() =>
    (this.screenData()?.addresses ?? [])
      .filter((address) => address.status === 'VERIFIED')
      .map((address) => ({
        label: `${address.label} — ${this.truncateAddress(address.address)}`,
        value: address.id,
      })),
  );

  protected readonly selectedAddress = computed<WithdrawalNewAddressOption | null>(() => {
    const addressId = this.form.controls.addressId.value;
    return (this.screenData()?.addresses ?? []).find((address) => address.id === addressId) ?? null;
  });

  protected readonly summaryRows = computed(() => {
    const data = this.screenData();
    if (!data) {
      return null;
    }

    const amount = Number(this.form.controls.amount.value || 0);
    const normalizedAmount = Number.isFinite(amount) ? amount : 0;
    const fee = normalizedAmount > 0 ? data.summary.fee : 0;
    const netAmount = Math.max(normalizedAmount - fee, 0);

    return {
      fee,
      netAmount,
    };
  });

  protected readonly statePanelMeta = computed(() => {
    const state = this.screenData()?.state ?? 'ready';
    return STATE_PANEL_META[state];
  });

  protected readonly unverifiedAddresses = computed(() =>
    (this.screenData()?.addresses ?? []).filter((address) => address.status === 'PENDING_VERIFICATION'),
  );

  constructor() {
    this.api
      .getScreenData()
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => {
        this.screenData.set(response);

        const firstVerifiedAddress = response.addresses.find((address) => address.status === 'VERIFIED');
        this.form.patchValue({
          addressId: firstVerifiedAddress?.id ?? '',
        });
      });
  }

  protected canSubmit(): boolean {
    const data = this.screenData();
    return !!data && data.state === 'ready' && this.form.valid;
  }

  protected statePanelClass(): string {
    const state = this.screenData()?.state ?? 'ready';
    return `withdrawal-new-state-panel withdrawal-new-state-panel--${state.replace(/_/g, '-')}`;
  }

  protected onAddressChange(value: unknown): void {
    this.form.controls.addressId.setValue(typeof value === 'string' ? value : '');
  }

  protected submit(): void {
    this.form.markAllAsTouched();
  }

  private truncateAddress(address: string): string {
    return address.length > 18 ? `${address.slice(0, 8)}...${address.slice(-6)}` : address;
  }
}
