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
      severity="secondary"
      variant="outlined"
      [styleClass]="buttonClass()"
      (onClick)="themeService.toggleTheme()">
      <ng-template #icon>
        <svg class="h-[18px] w-[18px]" [lucideIcon]="themeToggleIcon()"></svg>
      </ng-template>
    </p-button>
  `,
})
export class AppThemeToggleComponent {
  protected readonly themeService = inject(ThemeService);

  protected readonly isDark = computed(() => this.themeService.themeMode() === 'dark');

  protected readonly themeToggleIcon = computed(() => (this.isDark() ? LucideSun : LucideMoon));

  protected readonly buttonClass = computed(() => (this.isDark() ? '!text-yellow-500' : ''));
}
