import { Component, inject } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { LucideDynamicIcon, LucideIcon, LucideMoon, LucideSun } from '@lucide/angular';
import { ThemeService } from '../../core/theme/theme.service';

@Component({
  selector: 'app-theme-toggle',
  standalone: true,
  imports: [ButtonModule, LucideDynamicIcon],
  template: `
    <p-button severity="secondary" [text]="true" [rounded]="true" class="shell-icon-btn" (onClick)="themeService.toggleTheme()">
      <svg [lucideIcon]="themeToggleIcon" class="h-4.5 w-4.5" ></svg>
    </p-button>
  `
})
export class AppThemeToggleComponent {
  protected readonly themeService = inject(ThemeService);
  protected readonly moonIcon = LucideMoon;
  protected readonly sunIcon = LucideSun;

  public get themeToggleIcon(): LucideIcon {
    return this.themeService.themeMode() === 'light' ? this.moonIcon : this.sunIcon;
  }
}

