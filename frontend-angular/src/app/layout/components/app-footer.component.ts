import { Component } from '@angular/core';

@Component({
  selector: 'app-footer',
  standalone: true,
  template: `
    <footer class="border-t border-surface-200 bg-surface-0 py-4 dark:border-surface-800 dark:bg-surface-950">
      <div class="container text-sm text-muted-color">Foundation aligned to PrimeNG + Tailwind plugin strategy.</div>
    </footer>
  `
})
export class AppFooterComponent {}
