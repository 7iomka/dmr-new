import { Component, signal, ViewEncapsulation } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { DialogModule } from 'primeng/dialog';
import { TagModule } from 'primeng/tag';
import {
  LucideCalendar,
  LucideCalendarCheck2,
  LucideChevronDown,
  LucideClockFading,
  LucideDollarSign,
  LucideSettings,
  LucideX,
} from '@lucide/angular';
import { PillTabPanelComponent, PillTabPanelsComponent } from '../../../../shared/components/pill-tabs';
import { type AppMenuItem, MenuComponent } from '../../../../shared/components/menu/menu.component';

type PaymentPlanItem = {
  readonly id: string;
  readonly title: string;
  readonly amount: string;
  readonly shares: string;
  readonly issueDate: string;
  readonly dueDate: string;
  readonly status: 'paid' | 'due' | 'pending';
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
    LucideSettings,
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
                  <tr>
                    <th>ID</th>
                    <th>Общая сумма / План</th>
                    <th>Даты</th>
                    <th>Оплачено / Остаток</th>
                  </tr>
                </thead>
                <tbody>
                  @for (installment of activeInstallments; track installment.id) {
                    <tr class="c-investment-installments-table__main-row">
                      <td class="c-investment-installments-table__id-cell">
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
                      <td>
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
                      <td>
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
                      <td>
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
                        <td colspan="4">
                          <div class="c-investment-installments-plan">
                            <h5 class="c-investment-installments-plan__title">План платежей</h5>
                            <div class="c-investment-installments-plan__items">
                              @for (planItem of installment.plan; track planItem.id) {
                                <article class="c-investment-installments-plan__item">
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
                                      <span class="font-bold text-surface-900 dark:text-surface-50">{{
                                        planItem.amount
                                      }}</span>
                                    </p>
                                    <p>
                                      Доли:
                                      <span class="font-bold text-surface-900 dark:text-surface-50">{{
                                        planItem.shares
                                      }}</span>
                                    </p>
                                  </div>
                                  @if (planItem.status === 'due') {
                                    <p-button label="Оплатить сейчас" size="small" />
                                  }
                                </article>
                              }
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
                <article class="c-investment-installments-mobile-card">
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
                        <article class="c-investment-installments-plan__item">
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
                          @if (planItem.status === 'due') {
                            <p-button label="Оплатить сейчас" size="small" styleClass="w-full" />
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
      [draggable]="false"
      [modal]="true"
      [resizable]="false"
      [style]="{ width: 'min(92vw, 36rem)' }"
      [(visible)]="isPayAllDialogOpen">
      <div class="c-investment-contract-dialog">
        <p>
          ID контракта: <strong>{{ selectedContractId() || '—' }}</strong>
        </p>
        <p>Это действие погасит весь оставшийся баланс по контракту.</p>
      </div>
    </p-dialog>

    <p-dialog
      header="Оплатить несколько месяцев"
      [draggable]="false"
      [modal]="true"
      [resizable]="false"
      [style]="{ width: 'min(92vw, 36rem)' }"
      [(visible)]="isPaySomeDialogOpen">
      <div class="c-investment-contract-dialog">
        <p>
          ID контракта: <strong>{{ selectedContractId() || '—' }}</strong>
        </p>
        <p>Выберите, сколько следующих месяцев нужно оплатить.</p>
      </div>
    </p-dialog>

    <p-dialog
      header="Отменить контракт"
      [draggable]="false"
      [modal]="true"
      [resizable]="false"
      [style]="{ width: 'min(92vw, 36rem)' }"
      [(visible)]="isCancelDialogOpen">
      <div class="c-investment-contract-dialog">
        <p>
          ID контракта: <strong>{{ selectedContractId() || '—' }}</strong>
        </p>
        <p>Это действие отменит неоплаченные платежи по выбранному контракту.</p>
      </div>
    </p-dialog>
  `,
  styleUrl: './c-investment-installments-overview.component.css',
})
export class CInvestmentInstallmentsOverviewComponent {
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

  readonly expandedDesktopId = signal(this.activeInstallments[0]?.id ?? '');
  readonly expandedMobileIds = signal<ReadonlySet<string>>(new Set([this.activeInstallments[0]?.id ?? '']));
  readonly selectedContractId = signal('');
  readonly isPayAllDialogOpen = signal(false);
  readonly isPaySomeDialogOpen = signal(false);
  readonly isCancelDialogOpen = signal(false);

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
}
