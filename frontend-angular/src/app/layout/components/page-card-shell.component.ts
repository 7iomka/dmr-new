import { Component, input } from '@angular/core';
import { CardModule } from 'primeng/card';

@Component({
  selector: 'app-page-card-shell',
  standalone: true,
  imports: [CardModule],
  template: `
    <p-card class="page-card-shell">
      <ng-template #header>
        <div class="page-card-shell__header">
          <div>
            <h3 class="page-card-shell__title">{{ title() }}</h3>
            @if (subtitle()) {
              <p class="page-card-shell__subtitle">{{ subtitle() }}</p>
            }
          </div>
          <div><ng-content select="[card-actions]" /></div>
        </div>
      </ng-template>
      <ng-content />
    </p-card>
  `
})
export class PageCardShellComponent {
  readonly title = input.required<string>();
  readonly subtitle = input<string>('');
}
