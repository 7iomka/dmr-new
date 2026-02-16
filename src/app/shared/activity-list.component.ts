import { Component, input } from '@angular/core';
import { NgFor } from '@angular/common';

export interface ActivityItem {
  title: string;
  meta: string;
  amount: string;
}

@Component({
  selector: 'app-activity-list',
  standalone: true,
  imports: [NgFor],
  template: `
    <section class="card activity">
      <h2>{{ title() }}</h2>
      <div class="row" *ngFor="let item of items()">
        <div>
          <p class="name">{{ item.title }}</p>
          <p class="meta">{{ item.meta }}</p>
        </div>
        <strong>{{ item.amount }}</strong>
      </div>
    </section>
  `,
  styles: `
    .activity { padding: 16px; }
    h2 { margin-top: 0; }
    .row {
      display: flex;
      justify-content: space-between;
      padding: 10px 0;
      border-top: 1px solid var(--border);
    }
    .name { margin: 0; }
    .meta { margin: 4px 0 0; color: var(--text-muted); font-size: 0.85rem; }
  `
})
export class ActivityListComponent {
  readonly title = input<string>('Последние операции');
  readonly items = input.required<ActivityItem[]>();
}
