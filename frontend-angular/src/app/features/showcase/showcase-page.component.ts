import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { ButtonModule } from 'primeng/button';
import { CardModule } from 'primeng/card';
import { DialogModule } from 'primeng/dialog';
import { DrawerModule } from 'primeng/drawer';
import { InputTextModule } from 'primeng/inputtext';
import { SelectModule } from 'primeng/select';
import { TableModule } from 'primeng/table';
import { TagModule } from 'primeng/tag';
import { ToggleSwitchModule } from 'primeng/toggleswitch';

@Component({
  selector: 'app-showcase-page',
  standalone: true,
  imports: [
    CommonModule,
    FormsModule,
    ButtonModule,
    CardModule,
    DialogModule,
    DrawerModule,
    InputTextModule,
    SelectModule,
    TableModule,
    TagModule,
    ToggleSwitchModule
  ],
  template: `
    <div class="space-y-6">
      <p-card header="Buttons (legacy mapping through PrimeNG APIs)">
        <div class="flex flex-wrap gap-3">
          <p-button label="Primary" />
          <p-button label="Secondary" severity="secondary" />
          <p-button label="Danger" severity="danger" />
          <p-button label="Outlined" severity="secondary" variant="outlined" />
          <p-button label="Text" severity="secondary" variant="text" />
          <p-button icon="pi pi-bell" [rounded]="true" [text]="true" severity="secondary" />
        </div>
      </p-card>

      <div class="grid gap-6 lg:grid-cols-2">
        <p-card header="Form controls">
          <div class="space-y-3">
            <input pInputText [(ngModel)]="form.name" class="w-full" placeholder="Name" />
            <p-select [(ngModel)]="form.plan" [options]="plans" optionLabel="label" placeholder="Select plan" class="w-full" />
            <div class="flex items-center gap-2">
              <p-toggleswitch [(ngModel)]="form.notifications" inputId="notifications" />
              <label for="notifications" class="text-sm text-muted-color">Enable notifications</label>
            </div>
          </div>
        </p-card>

        <p-card header="Tags / statuses">
          <div class="flex flex-wrap gap-2">
            <p-tag value="Active" severity="success" />
            <p-tag value="Pending" severity="warn" />
            <p-tag value="Blocked" severity="danger" />
            <p-tag value="Info" severity="info" />
          </div>
        </p-card>
      </div>

      <p-card header="Table fragment">
        <p-table [value]="rows" [tableStyle]="{ 'min-width': '40rem' }">
          <ng-template pTemplate="header">
            <tr>
              <th>Asset</th>
              <th>Amount</th>
              <th>Status</th>
            </tr>
          </ng-template>
          <ng-template pTemplate="body" let-row>
            <tr>
              <td>{{ row.asset }}</td>
              <td>{{ row.amount }}</td>
              <td><p-tag [value]="row.status" [severity]="row.severity" /></td>
            </tr>
          </ng-template>
        </p-table>
      </p-card>

      <p-card header="Overlays">
        <div class="flex flex-wrap gap-3">
          <p-button label="Open Dialog" severity="secondary" (onClick)="dialogVisible = true" />
          <p-button label="Open Drawer" variant="outlined" (onClick)="drawerVisible = true" />
        </div>
      </p-card>

      <p-dialog header="Dialog" [(visible)]="dialogVisible" [modal]="true" [style]="{ width: '28rem' }">
        <p class="text-sm text-muted-color">Styled mode dialog with token-driven colors.</p>
      </p-dialog>

      <p-drawer header="Drawer" [(visible)]="drawerVisible" position="right">
        <p class="text-sm text-muted-color">Drawer content for mobile/quick actions mapping.</p>
      </p-drawer>
    </div>
  `
})
export class ShowcasePageComponent {
  protected dialogVisible = false;
  protected drawerVisible = false;

  protected form = {
    name: '',
    plan: null as { label: string; value: string } | null,
    notifications: true
  };

  protected readonly plans = [
    { label: 'Starter', value: 'starter' },
    { label: 'Pro', value: 'pro' },
    { label: 'Enterprise', value: 'enterprise' }
  ];

  protected readonly rows: Array<{ asset: string; amount: string; status: string; severity: 'success' | 'warn' | 'danger' }> = [
    { asset: 'USDT', amount: '1,250.00', status: 'Active', severity: 'success' },
    { asset: 'BTC', amount: '0.245', status: 'Pending', severity: 'warn' },
    { asset: 'ETH', amount: '4.12', status: 'Blocked', severity: 'danger' }
  ];
}
