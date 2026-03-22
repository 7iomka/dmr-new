import { Component, computed, inject } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { LucideDynamicIcon, LucideMoon, LucideSun } from '@lucide/angular';
import { ThemeService } from '../../core/theme/theme.service';

@Component({
  selector: 'app-theme-toggle',
  standalone: true,
  imports: [ButtonModule, LucideDynamicIcon],
  template: `
    <p-button
      [styleClass]="buttonClass()"
      severity="secondary"
      variant="outlined"
      (onClick)="themeService.toggleTheme()"
    >
      <ng-template #icon>
        <svg [lucideIcon]="themeToggleIcon()" class="h-4.5 w-4.5"></svg>
      </ng-template>
    </p-button>
  `
})
export class AppThemeToggleComponent {
  protected readonly themeService = inject(ThemeService);

  protected readonly isDark = computed(() => this.themeService.themeMode() === 'dark');

  protected readonly themeToggleIcon = computed(() =>
    this.isDark() ? LucideSun : LucideMoon
  );

  protected readonly buttonClass = computed(() =>
    this.isDark() ? 'text-yellow-500' : ''
  );
}