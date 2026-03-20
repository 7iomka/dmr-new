import { Component, inject } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { TagModule } from 'primeng/tag';

import { ThemeService } from '../../core/theme/theme.service';

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [ButtonModule, TagModule],
  template: `
    <header class="border-b border-surface-200 bg-surface-0 dark:border-surface-800 dark:bg-surface-950">
      <div class="container flex h-16 items-center justify-between gap-3">
        <p-tag value="PrimeNG Styled Mode" severity="info" />
        <p-button
          [label]="themeService.themeMode() === 'light' ? 'Dark mode' : 'Light mode'"
          [icon]="themeService.themeMode() === 'light' ? 'pi pi-moon' : 'pi pi-sun'"
          severity="secondary"
          variant="outlined"
          (onClick)="themeService.toggleTheme()"
        />
      </div>
    </header>
  `
})
export class AppHeaderComponent {
  protected readonly themeService = inject(ThemeService);
}
