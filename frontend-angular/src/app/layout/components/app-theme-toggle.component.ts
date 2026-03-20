import { Component, inject } from '@angular/core';
import { ButtonModule } from 'primeng/button';

import { ThemeService } from '../../core/theme/theme.service';

@Component({
  selector: 'app-theme-toggle',
  standalone: true,
  imports: [ButtonModule],
  template: `
    <p-button
      [icon]="themeService.themeMode() === 'light' ? 'pi pi-moon' : 'pi pi-sun'"
      severity="secondary"
      [text]="true"
      [rounded]="true"
      styleClass="shell-icon-btn"
      (onClick)="themeService.toggleTheme()"
      [ariaLabel]="themeService.themeMode() === 'light' ? 'Включить тёмную тему' : 'Включить светлую тему'"
    />
  `
})
export class AppThemeToggleComponent {
  protected readonly themeService = inject(ThemeService);
}
