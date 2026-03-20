import { Component } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { SkeletonModule } from 'primeng/skeleton';
import { TableModule } from 'primeng/table';

import { PageCardShellComponent } from '../../layout/components/page-card-shell.component';
import { PageSectionShellComponent } from '../../layout/components/page-section-shell.component';

@Component({
  selector: 'app-dashboard-page',
  standalone: true,
  imports: [PageSectionShellComponent, PageCardShellComponent, ButtonModule, SkeletonModule, TableModule],
  template: `
    <div class="space-y-8">
      <app-page-section-shell title="Дашборд" description="Обзор портфеля, активности и ключевых действий.">
        <div section-actions>
          <p-button label="Пополнить" icon="pi pi-plus" />
        </div>

        <div class="grid gap-4 xl:grid-cols-3">
          <app-page-card-shell title="Баланс" subtitle="Общий портфель">
            <div class="space-y-3">
              <p-skeleton width="10rem" height="2rem" />
              <p-skeleton width="6rem" height="1rem" />
            </div>
          </app-page-card-shell>

          <app-page-card-shell title="Активные инвестиции" subtitle="Статус сделок">
            <div class="space-y-3">
              <p-skeleton width="100%" height="0.75rem" />
              <p-skeleton width="85%" height="0.75rem" />
              <p-skeleton width="70%" height="0.75rem" />
            </div>
          </app-page-card-shell>

          <app-page-card-shell title="Доход" subtitle="Последние 24 часа">
            <div class="space-y-3">
              <p-skeleton width="9rem" height="2rem" />
              <p-skeleton width="5rem" height="1rem" />
            </div>
          </app-page-card-shell>
        </div>
      </app-page-section-shell>

      <div class="grid gap-4 xl:grid-cols-3">
        <div class="xl:col-span-2">
          <app-page-card-shell title="Динамика портфеля" subtitle="Chart container skeleton">
            <p-skeleton width="100%" height="18rem" />
          </app-page-card-shell>
        </div>
        <app-page-card-shell title="Быстрые действия" subtitle="Action zone">
          <div class="grid grid-cols-2 gap-3">
            <p-button label="Инвестировать" severity="secondary" variant="outlined" />
            <p-button label="Вывести" severity="secondary" variant="outlined" />
            <p-button label="Отчёт" severity="secondary" variant="text" />
            <p-button label="Поддержка" severity="secondary" variant="text" />
          </div>
        </app-page-card-shell>
      </div>

      <app-page-card-shell title="Последние операции" subtitle="Table skeleton / mapped container">
        <p-table [value]="rows" styleClass="dashboard-table-shell">
          <ng-template pTemplate="header">
            <tr>
              <th>Дата</th>
              <th>Операция</th>
              <th>Сумма</th>
              <th>Статус</th>
            </tr>
          </ng-template>
          <ng-template pTemplate="body" let-row>
            <tr>
              <td>{{ row.date }}</td>
              <td>{{ row.type }}</td>
              <td>{{ row.amount }}</td>
              <td>{{ row.status }}</td>
            </tr>
          </ng-template>
        </p-table>
      </app-page-card-shell>
    </div>
  `
})
export class DashboardPageComponent {
  protected readonly rows = [
    { date: '20.03.2026', type: 'Deposit', amount: '$1,250', status: 'Completed' },
    { date: '19.03.2026', type: 'Investment', amount: '$500', status: 'In progress' },
    { date: '18.03.2026', type: 'Withdrawal', amount: '$320', status: 'Pending' }
  ];
}
