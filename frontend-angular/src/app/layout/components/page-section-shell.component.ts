import { Component, input } from '@angular/core';

@Component({
  selector: 'app-page-section-shell',
  standalone: true,
  template: `
    <section class="space-y-4">
      <header class="flex flex-wrap items-start justify-between gap-3">
        <div>
          <h2 class="text-xl font-bold text-surface-900 dark:text-surface-50">{{ title() }}</h2>
          @if (description()) {
            <p class="mt-1 text-sm text-surface-500 dark:text-surface-400">{{ description() }}</p>
          }
        </div>
        <div><ng-content select="[section-actions]" /></div>
      </header>
      <div><ng-content /></div>
    </section>
  `
})
export class PageSectionShellComponent {
  readonly title = input.required<string>();
  readonly description = input<string>('');
}
