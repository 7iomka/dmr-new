import { AfterViewInit, Component, DestroyRef, inject, signal, ViewEncapsulation } from '@angular/core';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import { ActivatedRoute, ParamMap } from '@angular/router';
import { ButtonModule } from 'primeng/button';
import { DialogModule } from 'primeng/dialog';
import { TagModule } from 'primeng/tag';
import {
  LucideCalendar,
  LucideCalendarCheck2,
  LucideChevronDown,
  LucideClockFading,
  LucideDollarSign,
  LucideInfo,
  LucideSettings,
  LucideTriangleAlert,
  LucideX,
} from '@lucide/angular';
import { map } from 'rxjs';
import { PillTabPanelComponent, PillTabPanelsComponent } from '../../../../shared/components/pill-tabs';
import { type AppMenuItem, MenuComponent } from '../../../../shared/components/menu/menu.component';

type PaymentPlanItem = {
  readonly id: string;
  readonly title: string;
  readonly amount: string;
  readonly shares: string;
  readonly issueDate: string;
  readonly dueDate: string;
  readonly status: 'paid' | 'due' | 'overdue' | 'pending';
};

type InstallmentItem = {
  readonly id: string;
  readonly totalAmount: string;
  readonly months: string;
  readonly monthlyPayment: string;
  readonly reservedShares: string;
  readonly startDate: string;
  readonly nextDate: string;
  readonly nextDateDanger: boolean;
  readonly paidAmount: string;
  readonly remainingAmount: string;
  readonly paidShares: string;
  readonly totalShares: string;
  readonly plan: readonly PaymentPlanItem[];
};

type ContractMenuAction = 'payAll' | 'paySome' | 'cancel';

type ContractMenuItem = AppMenuItem & {
  readonly action?: ContractMenuAction;
};

@Component({
  selector: 'app-investment-installments-overview',
  standalone: true,
  encapsulation: ViewEncapsulation.None,
  imports: [
    ButtonModule,
    DialogModule,
    TagModule,
    MenuComponent,
    LucideCalendarCheck2,
    LucideChevronDown,
    LucideClockFading,
    LucideInfo,
    LucideSettings,
    LucideTriangleAlert,
    PillTabPanelsComponent,
    PillTabPanelComponent,
  ],
  template: `
    <section class="c-investment-installments">
      <app-pill-tabpanels>
        <app-pill-tabpanel value="active">
          <div class="c-investment-installments__panel">
            <div class="c-investment-installments__desktop">
              <table class="c-investment-installments-table">
                <thead>
                  <tr class="c-investment-installments-table__head-row">
                    <th class="c-investment-installments-table__head-cell">ID</th>
                    <th class="c-investment-installments-table__head-cell">Общая сумма / План</th>
                    <th class="c-investment-installments-table__head-cell">Даты</th>
                    <th class="c-investment-installments-table__head-cell">Оплачено / Остаток</th>
                  </tr>
                </thead>
                <tbody>
                  @for (installment of activeInstallments; track installment.id) {
                    <tr class="c-investment-installments-table__main-row" [attr.data-installment-row]="installment.id">
                      <td class="c-investment-installments-table__body-cell c-investment-installments-table__id-cell">
                        <div class="flex flex-col gap-0.5">
                          <p class="c-investment-installments-table__id">{{ installment.id }}</p>
                          <div class="c-investment-installments-table__actions">
                            <p-button
                              severity="secondary"
                              size="small"
                              variant="outlined"
                              [ariaLabel]="expandedDesktopId() === installment.id ? 'Скрыть план' : 'Показать план'"
                              (onClick)="toggleDesktopPlan(installment.id)">
                              <span pButtonLabel>План</span>
                              <svg
                                class="h-3.5 w-3.5 transition-transform"
                                lucideChevronDown
                                pButtonIcon
                                [class.rotate-180]="expandedDesktopId() === installment.id"></svg>
                            </p-button>

                            <p-button
                              ariaLabel="Настройки контракта"
                              severity="primary"
                              size="small"
                              styleClass="p-button-icon-only"
                              (onClick)="toggleContractMenu($event, installment.id, actionsMenu)">
                              <svg class="h-3.5 w-3.5" lucideSettings pButtonIcon></svg>
                            </p-button>
                          </div>
                        </div>
                      </td>

                      <td class="c-investment-installments-table__body-cell">
                        <div class="flex flex-col gap-0.5">
                          <p class="c-investment-installments-table__strong text-base">{{ installment.totalAmount }}</p>
                          <p>{{ installment.months }}</p>
                          <p>
                            Платёж в месяц:
                            <span class="c-investment-installments-table__strong">{{
                              installment.monthlyPayment
                            }}</span>
                          </p>
                          <p>
                            Зарезервировано:
                            <span class="c-investment-installments-table__strong">{{
                              installment.reservedShares
                            }}</span>
                            долей
                          </p>
                        </div>
                      </td>

                      <td class="c-investment-installments-table__body-cell">
                        <div class="flex flex-col gap-0.5">
                          <p>
                            Начало:
                            <span class="c-investment-installments-table__strong">{{ installment.startDate }}</span>
                          </p>
                          <p>
                            Следующий:
                            <span
                              class="c-investment-installments-table__strong"
                              [class.text-red-500]="installment.nextDateDanger">
                              {{ installment.nextDate }}
                            </span>
                          </p>
                        </div>
                      </td>

                      <td class="c-investment-installments-table__body-cell">
                        <div class="flex flex-col gap-0.5">
                          <p class="c-investment-installments-table__pair">
                            <span class="text-primary">{{ installment.paidAmount }}</span>
                            <span class="text-surface-400"> / </span>
                            <span class="c-investment-installments-table__strong">{{
                              installment.remainingAmount
                            }}</span>
                          </p>
                          <p>
                            Доли:
                            <span class="text-primary font-bold">{{ installment.paidShares }}</span>
                            <span class="text-surface-400"> / </span>
                            <span class="c-investment-installments-table__strong">{{ installment.totalShares }}</span>
                          </p>
                        </div>
                      </td>
                    </tr>

                    @if (expandedDesktopId() === installment.id) {
                      <tr class="c-investment-installments-table__plan-row">
                        <td class="c-investment-installments-table__plan-cell" colspan="4">
                          <div class="c-investment-installments-plan">
                            <h5 class="c-investment-installments-plan__title">План платежей</h5>
                            <div class="c-investment-installments-plan__table-wrap">
                              <table class="c-investment-installments-plan-table">
                                <thead>
                                  <tr class="c-investment-installments-plan-table__head-row">
                                    <th class="c-investment-installments-plan-table__head-cell">Платёж</th>
                                    <th class="c-investment-installments-plan-table__head-cell">Сумма</th>
                                    <th class="c-investment-installments-plan-table__head-cell">Доли</th>
                                    <th class="c-investment-installments-plan-table__head-cell">Дата выпуска</th>
                                    <th class="c-investment-installments-plan-table__head-cell">Срок</th>
                                    <th class="c-investment-installments-plan-table__head-cell text-right">Действие</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @for (planItem of installment.plan; track planItem.id) {
                                    <tr
                                      class="c-investment-installments-plan-table__body-row"
                                      [attr.data-desktop-payment-item]="planItem.id"
                                      [class.c-investment-installments-plan-table__body-row--current]="
                                        isPayable(planItem.status)
                                      "
                                      [class.c-investment-installments-plan-table__body-row--highlight]="
                                        highlightedPaymentId() === planItem.id
                                      ">
                                      <td class="c-investment-installments-plan-table__cell">
                                        <span class="c-investment-installments-plan-table__payment-title">{{
                                          planItem.title
                                        }}</span>
                                      </td>
                                      <td class="c-investment-installments-plan-table__cell">{{ planItem.amount }}</td>
                                      <td class="c-investment-installments-plan-table__cell">{{ planItem.shares }}</td>
                                      <td class="c-investment-installments-plan-table__cell">
                                        {{ planItem.issueDate }}
                                      </td>
                                      <td class="c-investment-installments-plan-table__cell">
                                        <span
                                          [class.text-amber-600]="planItem.status === 'due'"
                                          [class.text-primary]="planItem.status === 'paid'"
                                          [class.text-red-500]="planItem.status === 'overdue'">
                                          {{ planItem.dueDate }}
                                        </span>
                                      </td>
                                      <td class="c-investment-installments-plan-table__cell text-right">
                                        @if (isPayable(planItem.status)) {
                                          <p-button label="Оплатить" />
                                        } @else {
                                          <p-tag
                                            [severity]="statusSeverity(planItem.status)"
                                            [value]="statusLabel(planItem.status)" />
                                        }
                                      </td>
                                    </tr>
                                  }
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </td>
                      </tr>
                    }
                  }
                </tbody>
              </table>
            </div>

            <div class="c-investment-installments__mobile">
              @for (installment of activeInstallments; track installment.id) {
                <article class="c-investment-installments-mobile-card" [attr.data-mobile-installment]="installment.id">
                  <div class="c-investment-installments-mobile-card__head">
                    <p class="font-bold text-surface-900 dark:text-surface-50">ID: {{ installment.id }}</p>
                    <div class="c-investment-installments-mobile-card__actions">
                      <p-button
                        severity="secondary"
                        size="small"
                        variant="outlined"
                        [ariaLabel]="expandedMobileIds().has(installment.id) ? 'Скрыть план' : 'Показать план'"
                        (onClick)="toggleMobilePlan(installment.id)">
                        <span pButtonLabel>План</span>
                        <svg
                          class="h-3.5 w-3.5 transition-transform"
                          lucideChevronDown
                          pButtonIcon
                          [class.rotate-180]="expandedMobileIds().has(installment.id)"></svg>
                      </p-button>

                      <p-button
                        ariaLabel="Настройки контракта"
                        severity="primary"
                        size="small"
                        styleClass="p-button-icon-only"
                        (onClick)="toggleContractMenu($event, installment.id, actionsMenu)">
                        <svg class="h-3.5 w-3.5" lucideSettings pButtonIcon></svg>
                      </p-button>
                    </div>
                  </div>

                  <div class="c-investment-installments-mobile-card__stats">
                    <div class="c-investment-installments-mobile-card__stat">
                      <p>Общая сумма</p>
                      <strong>{{ installment.totalAmount }}</strong>
                    </div>
                    <div class="c-investment-installments-mobile-card__stat">
                      <p>Даты</p>
                      <p
                        class="c-investment-installments-mobile-card__line c-investment-installments-mobile-card__date">
                        <svg class="h-3.5 w-3.5" lucideCalendarCheck2></svg>
                        <span>{{ installment.startDate }}</span>
                      </p>
                      <p
                        class="c-investment-installments-mobile-card__date font-bold"
                        [class.text-amber-600]="installment.nextDateDanger">
                        <svg class="h-3.5 w-3.5" lucideClockFading></svg>
                        <span>{{ installment.nextDate }}</span>
                      </p>
                    </div>
                    <div class="c-investment-installments-mobile-card__stat">
                      <p>Оплачено / Остаток</p>
                      <p class="font-semibold">
                        <span class="text-primary">{{ installment.paidAmount }}</span>
                        / {{ installment.remainingAmount }}
                      </p>
                    </div>
                    <div class="c-investment-installments-mobile-card__stat">
                      <p>Доли</p>
                      <p class="font-semibold">
                        <span class="text-primary">{{ installment.paidShares }}</span>
                        / {{ installment.totalShares }}
                      </p>
                    </div>
                  </div>

                  @if (expandedMobileIds().has(installment.id)) {
                    <div class="c-investment-installments-mobile-card__plan">
                      @for (planItem of installment.plan; track planItem.id) {
                        <article
                          class="c-investment-installments-plan__item"
                          [attr.data-mobile-payment-item]="planItem.id"
                          [class.c-investment-installments-plan__item--highlight]="
                            highlightedPaymentId() === planItem.id
                          ">
                          <div class="c-investment-installments-plan__item-head">
                            <p class="c-investment-installments-plan__item-title">{{ planItem.title }}</p>
                            <p-tag
                              [severity]="statusSeverity(planItem.status)"
                              [value]="statusLabel(planItem.status)" />
                          </div>
                          <div class="c-investment-installments-plan__item-grid">
                            <p>Дата выпуска: {{ planItem.issueDate }}</p>
                            <p>Срок: {{ planItem.dueDate }}</p>
                            <p>
                              Сумма:
                              <span class="font-bold text-surface-900 dark:text-surface-50">{{ planItem.amount }}</span>
                            </p>
                            <p>
                              Доли:
                              <span class="font-bold text-surface-900 dark:text-surface-50">{{ planItem.shares }}</span>
                            </p>
                          </div>
                          @if (isPayable(planItem.status)) {
                            <p-button label="Оплатить" size="small" styleClass="w-full" />
                          }
                        </article>
                      }
                    </div>
                  }
                </article>
              }
            </div>
          </div>
        </app-pill-tabpanel>

        <app-pill-tabpanel value="closed">
          <div class="c-investment-installments__panel">
            <div class="c-investment-installments__empty">
              <p class="c-investment-installments__empty-title">Пока нет закрытых рассрочек</p>
              <p class="c-investment-installments__empty-subtitle">
                После полной оплаты или закрытия история завершённых рассрочек появится в этом разделе.
              </p>
            </div>
          </div>
        </app-pill-tabpanel>
      </app-pill-tabpanels>
    </section>

    <app-menu #actionsMenu menuClass="c-menu--contract" [items]="contractMenuItems" />

    <p-dialog
      header="Подтверждение оплаты контракта"
      [contentStyle]="{ overflow: 'visible' }"
      [dismissableMask]="true"
      [draggable]="false"
      [modal]="true"
      [resizable]="false"
      [style]="{ width: 'min(92vw, 36rem)' }"
      [(visible)]="isPayAllDialogOpen">
      <div class="c-investment-contract-dialog">
        <div class="c-investment-contract-dialog__rows">
          <div class="c-investment-contract-dialog__row">
            <p>ID контракта</p>
            <strong>{{ contractDialogData.id }}</strong>
          </div>
          <div class="c-investment-contract-dialog__row">
            <p>Доли</p>
            <strong>{{ contractDialogData.shares }}</strong>
          </div>
          <div class="c-investment-contract-dialog__row">
            <p>Сумма платежа</p>
            <strong>{{ contractDialogData.paymentAmount }}</strong>
          </div>
          <div class="c-investment-contract-dialog__row">
            <p>Баланс кошелька</p>
            <strong>{{ contractDialogData.walletBalance }}</strong>
          </div>
        </div>

        <div class="c-investment-contract-dialog__summary">
          <span>Сумма к списанию</span>
          <strong>{{ contractDialogData.summaryAmount }}</strong>
        </div>

        <div class="c-investment-contract-dialog__info">
          <svg class="h-4 w-4 shrink-0" lucideInfo></svg>
          <p>Это действие погасит весь оставшийся баланс по контракту</p>
        </div>

        <div class="c-investment-contract-dialog__footer">
          <p-button
            icon="pi pi-times"
            label="Отмена"
            severity="secondary"
            styleClass="c-investment-contract-dialog__cancel"
            variant="outlined"
            (onClick)="isPayAllDialogOpen.set(false)" />
          <p-button icon="pi pi-check" label="Подтвердить" />
        </div>
      </div>
    </p-dialog>

    <p-dialog
      header="Оплатить несколько месяцев"
      [contentStyle]="{ overflow: 'visible' }"
      [dismissableMask]="true"
      [draggable]="false"
      [modal]="true"
      [resizable]="false"
      [style]="{ width: 'min(92vw, 36rem)' }"
      [(visible)]="isPaySomeDialogOpen">
      <div class="c-investment-contract-dialog">
        <div class="c-investment-contract-dialog__rows">
          <div class="c-investment-contract-dialog__row">
            <p>ID контракта</p>
            <strong>{{ contractDialogData.id }}</strong>
          </div>
          <div class="c-investment-contract-dialog__row">
            <p>Неоплаченные месяцы</p>
            <strong>{{ contractDialogData.unpaidMonths }}</strong>
          </div>
          <div class="c-investment-contract-dialog__row">
            <p>Сумма за месяц</p>
            <strong>{{ contractDialogData.monthlyAmount }}</strong>
          </div>
        </div>

        <div class="c-investment-contract-dialog__months-select-wrap">
          <label class="c-investment-contract-dialog__months-label" for="monthsToPay"
            >Выберите количество месяцев для оплаты</label
          >
          <div class="c-investment-contract-dialog__months-select-box">
            <select class="c-investment-contract-dialog__months-select" id="monthsToPay">
              <option>2 months</option>
            </select>
            <svg class="c-investment-contract-dialog__months-icon" lucideChevronDown></svg>
          </div>
          <p class="c-investment-contract-dialog__months-hint">Доступно 2 - 2 месяцев</p>
        </div>

        <div class="c-investment-contract-dialog__rows">
          <div class="c-investment-contract-dialog__row">
            <p>Доли</p>
            <strong>{{ contractDialogData.shares }}</strong>
          </div>
          <div class="c-investment-contract-dialog__row">
            <p>Сумма платежа</p>
            <strong>{{ contractDialogData.paymentAmount }}</strong>
          </div>
          <div class="c-investment-contract-dialog__row">
            <p>Баланс кошелька</p>
            <strong>{{ contractDialogData.walletBalance }}</strong>
          </div>
        </div>

        <div class="c-investment-contract-dialog__summary">
          <span>Сумма к списанию</span>
          <strong>{{ contractDialogData.summaryAmount }}</strong>
        </div>

        <div class="c-investment-contract-dialog__info">
          <svg class="h-4 w-4 shrink-0" lucideInfo></svg>
          <p>Это оплатит следующие 2 платежа</p>
        </div>

        <div class="c-investment-contract-dialog__footer">
          <p-button
            icon="pi pi-times"
            label="Отмена"
            severity="secondary"
            styleClass="c-investment-contract-dialog__cancel"
            variant="outlined"
            (onClick)="isPaySomeDialogOpen.set(false)" />
          <p-button icon="pi pi-check" label="Подтвердить" />
        </div>
      </div>
    </p-dialog>

    <p-dialog
      header="Отменить контракт"
      [contentStyle]="{ overflow: 'visible' }"
      [dismissableMask]="true"
      [draggable]="false"
      [modal]="true"
      [resizable]="false"
      [style]="{ width: 'min(92vw, 36rem)' }"
      [(visible)]="isCancelDialogOpen">
      <div class="c-investment-contract-dialog">
        <div class="c-investment-contract-dialog__danger">
          <svg class="h-4 w-4 shrink-0" lucideTriangleAlert></svg>
          <p>Внимание: Это действие нельзя отменить</p>
        </div>

        <div class="c-investment-contract-dialog__rows">
          <div class="c-investment-contract-dialog__row">
            <p>ID контракта</p>
            <strong>{{ contractDialogData.id }}</strong>
          </div>
          <div class="c-investment-contract-dialog__row">
            <p>Неоплаченные платежи</p>
            <strong>{{ contractDialogData.unpaidMonths }}</strong>
          </div>
          <div class="c-investment-contract-dialog__row">
            <p>Остаток суммы</p>
            <strong>{{ contractDialogData.paymentAmount }}</strong>
          </div>
          <div class="c-investment-contract-dialog__row">
            <p>Доли, которые вы сохраните</p>
            <strong>{{ contractDialogData.preservedShares }}</strong>
          </div>
        </div>

        <div class="c-investment-contract-dialog__warning">
          <div class="c-investment-contract-dialog__warning-head">
            <svg class="h-4 w-4 shrink-0" lucideInfo></svg>
            <p>Отмена этого контракта приведет к:</p>
          </div>
          <ul>
            <li>Отмене всех неоплаченных платежей</li>
            <li>Вы сохраните доли, полученные из оплаченных платежей</li>
            <li>Возврат средств за оплаченные суммы не производится</li>
          </ul>
        </div>

        <div class="c-investment-contract-dialog__footer">
          <p-button
            icon="pi pi-times"
            label="Отмена"
            severity="secondary"
            styleClass="c-investment-contract-dialog__cancel"
            variant="outlined"
            (onClick)="isCancelDialogOpen.set(false)" />
          <p-button
            icon="pi pi-exclamation-triangle"
            label="Подтвердить отмену"
            severity="danger"
            styleClass="c-investment-contract-dialog__confirm-cancel" />
        </div>
      </div>
    </p-dialog>
  `,
  styleUrl: './c-investment-installments-overview.component.css',
})
export class CInvestmentInstallmentsOverviewComponent implements AfterViewInit {
  private readonly route = inject(ActivatedRoute);
  private readonly destroyRef = inject(DestroyRef);
  private resetHighlightTimeoutId: ReturnType<typeof setTimeout> | null = null;

  readonly activeInstallments: readonly InstallmentItem[] = [
    {
      id: '88421',
      totalAmount: '$200.00',
      months: '3 месяца',
      monthlyPayment: '$66.67',
      reservedShares: '52 707',
      startDate: '05.02.2026',
      nextDate: '05.03.2026',
      nextDateDanger: true,
      paidAmount: '$66.67',
      remainingAmount: '$133.33',
      paidShares: '17 569',
      totalShares: '52 707',
      plan: [
        {
          id: '88421-1',
          title: 'Платёж #1',
          amount: '$66.67',
          shares: '17 569',
          issueDate: '05.02.2026',
          dueDate: '05.02.2026',
          status: 'paid',
        },
        {
          id: '88421-2',
          title: 'Платёж #2',
          amount: '$66.67',
          shares: '17 569',
          issueDate: '05.03.2026',
          dueDate: 'до 17.03.2026',
          status: 'due',
        },
        {
          id: '88421-3',
          title: 'Платёж #3',
          amount: '$66.67',
          shares: '17 569',
          issueDate: '05.04.2026',
          dueDate: 'до 12.04.2026',
          status: 'pending',
        },
      ],
    },
    {
      id: '88422',
      totalAmount: '$100.00',
      months: '3 месяца',
      monthlyPayment: '$33.33',
      reservedShares: '26 543',
      startDate: '10.12.2025',
      nextDate: '01.03.2026',
      nextDateDanger: false,
      paidAmount: '$0.00',
      remainingAmount: '$100.00',
      paidShares: '0',
      totalShares: '26 543',
      plan: [
        {
          id: '88422-1',
          title: 'Платёж #1',
          amount: '$33.33',
          shares: '8 847',
          issueDate: '01.03.2026',
          dueDate: 'до 12.03.2026',
          status: 'pending',
        },
        {
          id: '88422-2',
          title: 'Платёж #2',
          amount: '$33.33',
          shares: '8 848',
          issueDate: '01.04.2026',
          dueDate: 'до 12.04.2026',
          status: 'pending',
        },
        {
          id: '88422-3',
          title: 'Платёж #3',
          amount: '$33.34',
          shares: '8 848',
          issueDate: '01.05.2026',
          dueDate: 'до 12.05.2026',
          status: 'pending',
        },
      ],
    },
  ];

  private readonly payableStatuses = new Set(['due', 'overdue']);

  isPayable(status: PaymentPlanItem['status']): boolean {
    return this.payableStatuses.has(status);
  }

  readonly expandedDesktopId = signal(this.activeInstallments[0]?.id ?? '');
  readonly expandedMobileIds = signal<ReadonlySet<string>>(new Set([this.activeInstallments[0]?.id ?? '']));
  readonly selectedContractId = signal('');
  readonly contractDialogData = {
    id: '09022700',
    shares: '35 138',
    paymentAmount: '133.33 $',
    walletBalance: '350.54 $',
    summaryAmount: '133.33 $',
    unpaidMonths: '2',
    monthlyAmount: '66.67 $',
    preservedShares: '17 569',
  } as const;
  readonly isPayAllDialogOpen = signal(false);
  readonly isPaySomeDialogOpen = signal(false);
  readonly isCancelDialogOpen = signal(false);
  readonly highlightedPaymentId = signal('');

  readonly contractMenuItems: ContractMenuItem[] = [
    {
      label: 'Оплатить весь контракт',
      action: 'payAll',
      icon: LucideDollarSign,
      command: () => this.openContractDialog('payAll'),
    },
    {
      label: 'Оплатить несколько месяцев',
      action: 'paySome',
      icon: LucideCalendar,
      command: () => this.openContractDialog('paySome'),
    },
    {
      label: 'Отменить контракт',
      action: 'cancel',
      icon: LucideX,
      danger: true,
      command: () => this.openContractDialog('cancel'),
    },
  ];

  constructor() {
    this.destroyRef.onDestroy(() => {
      if (this.resetHighlightTimeoutId) {
        clearTimeout(this.resetHighlightTimeoutId);
      }
    });
  }

  ngAfterViewInit(): void {
    this.route.queryParamMap
      .pipe(
        map((params) => this.parseInstallmentTarget(params)),
        takeUntilDestroyed(this.destroyRef),
      )
      .subscribe(({ targetId, payment }) => {
        if (!targetId) {
          return;
        }

        this.navigateToInstallmentTarget(targetId, payment);
      });
  }

  toggleDesktopPlan(id: string): void {
    this.expandedDesktopId.set(this.expandedDesktopId() === id ? '' : id);
  }

  toggleMobilePlan(id: string): void {
    const nextSet = new Set(this.expandedMobileIds());

    if (nextSet.has(id)) {
      nextSet.delete(id);
    } else {
      nextSet.add(id);
    }

    this.expandedMobileIds.set(nextSet);
  }

  statusLabel(status: PaymentPlanItem['status']): string {
    if (status === 'paid') {
      return 'Оплачен';
    }

    if (status === 'due') {
      return 'К оплате';
    }

    return 'Ожидается';
  }

  statusSeverity(status: PaymentPlanItem['status']): 'success' | 'warn' | 'secondary' {
    if (status === 'paid') {
      return 'success';
    }

    if (status === 'due') {
      return 'warn';
    }

    return 'secondary';
  }

  toggleContractMenu(event: Event, contractId: string, menu: MenuComponent): void {
    this.selectedContractId.set(contractId);
    menu.toggle(event);
  }

  openContractDialog(type: ContractMenuAction): void {
    if (type === 'payAll') {
      this.isPayAllDialogOpen.set(true);
      return;
    }

    if (type === 'paySome') {
      this.isPaySomeDialogOpen.set(true);
      return;
    }

    this.isCancelDialogOpen.set(true);
  }

  private parseInstallmentTarget(params: ParamMap): { targetId: string; payment: string } {
    const targetId = params.get('installment') ?? params.get('installmentId') ?? '';
    const payment = params.get('payment') ?? params.get('paymentNumber') ?? '';

    return {
      targetId: targetId.trim(),
      payment: payment.trim(),
    };
  }

  private navigateToInstallmentTarget(targetId: string, payment: string): void {
    const targetInstallment = this.activeInstallments.find((installment) => installment.id === targetId);

    if (!targetInstallment) {
      return;
    }

    if (this.isMobileViewport()) {
      const nextExpanded = new Set(this.expandedMobileIds());
      nextExpanded.add(targetId);
      this.expandedMobileIds.set(nextExpanded);
    } else {
      this.expandedDesktopId.set(targetId);
    }

    this.runAfterRender(() => {
      const paymentTargetId = payment ? `${targetId}-${payment}` : '';
      const paymentElement = paymentTargetId ? this.findPaymentElement(paymentTargetId) : null;

      if (paymentElement) {
        this.highlightPayment(paymentTargetId);
        this.scrollToElement(paymentElement);
        return;
      }

      const installmentElement = this.findInstallmentElement(targetId);
      if (installmentElement) {
        this.scrollToElement(installmentElement);
      }
    });
  }

  private isMobileViewport(): boolean {
    if (typeof window === 'undefined') {
      return false;
    }

    return window.matchMedia('(max-width: 1023.98px)').matches;
  }

  private findInstallmentElement(installmentId: string): HTMLElement | null {
    const selector = this.isMobileViewport()
      ? `[data-mobile-installment="${installmentId}"]`
      : `[data-installment-row="${installmentId}"]`;

    return document.querySelector<HTMLElement>(selector);
  }

  private findPaymentElement(paymentId: string): HTMLElement | null {
    const selector = this.isMobileViewport()
      ? `[data-mobile-payment-item="${paymentId}"]`
      : `[data-desktop-payment-item="${paymentId}"]`;

    return document.querySelector<HTMLElement>(selector);
  }

  private scrollToElement(element: HTMLElement): void {
    element.scrollIntoView({
      behavior: 'smooth',
      block: 'center',
    });
  }

  private highlightPayment(paymentId: string): void {
    this.highlightedPaymentId.set(paymentId);

    if (this.resetHighlightTimeoutId) {
      clearTimeout(this.resetHighlightTimeoutId);
    }

    this.resetHighlightTimeoutId = setTimeout(() => {
      this.highlightedPaymentId.set('');
      this.resetHighlightTimeoutId = null;
    }, 2800);
  }

  private runAfterRender(callback: () => void): void {
    if (typeof window === 'undefined') {
      callback();
      return;
    }

    setTimeout(() => {
      requestAnimationFrame(callback);
    }, 0);
  }
}
