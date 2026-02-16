import { Component, input } from '@angular/core';

@Component({
  selector: 'app-page-header',
  standalone: true,
  template: `
    <header class="page-header card">
      <div>
        <h1>{{ title() }}</h1>
        <p>{{ subtitle() }}</p>
      </div>
      <button type="button">{{ actionLabel() }}</button>
    </header>
  `,
  styles: `
    .page-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
      padding: 16px;
    }

    h1 {
      margin: 0;
      font-size: 1.25rem;
    }

    p {
      margin: 4px 0 0;
      color: var(--text-muted);
      font-size: 0.9rem;
    }

    button {
      border: 0;
      border-radius: 10px;
      background: var(--accent);
      color: #00150d;
      font-weight: 700;
      padding: 10px 14px;
    }
  `
})
export class PageHeaderComponent {
  readonly title = input.required<string>();
  readonly subtitle = input.required<string>();
  readonly actionLabel = input<string>('Обновить');
}
