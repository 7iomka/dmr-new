import { Component, input } from '@angular/core';

@Component({
  selector: 'app-stat-card',
  standalone: true,
  template: `
    <article class="stat card">
      <p class="label">{{ label() }}</p>
      <h3>{{ value() }}</h3>
      <p class="change" [class.pos]="isPositive()">{{ change() }}</p>
    </article>
  `,
  styles: `
    .stat { padding: 16px; }
    .label { margin: 0 0 8px; color: var(--text-muted); }
    h3 { margin: 0; font-size: 1.35rem; }
    .change { margin: 8px 0 0; color: #f97373; }
    .change.pos { color: var(--accent); }
  `
})
export class StatCardComponent {
  readonly label = input.required<string>();
  readonly value = input.required<string>();
  readonly change = input.required<string>();
  readonly isPositive = input<boolean>(false);
}
