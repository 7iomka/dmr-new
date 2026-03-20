import { Component, inject } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { LucideAngularModule, Moon, Sun } from 'lucide-angular';

import { ThemeService } from '../../core/theme/theme.service';

@Component({
  selector: 'app-theme-toggle',
  standalone: true,
  imports: [ButtonModule, LucideAngularModule],
  template: `
    <p-button severity="secondary" [text]="true" [rounded]="true" styleClass="shell-icon-btn" (onClick)="themeService.toggleTheme()">
      <ng-template pTemplate="icon">
        <lucide-icon [img]="themeService.themeMode() === 'light' ? moonIcon : sunIcon" class="h-[18px] w-[18px]" />
      </ng-template>
    </p-button>
  `
})
export class AppThemeToggleComponent {
  protected readonly themeService = inject(ThemeService);
  protected readonly moonIcon = Moon;
  protected readonly sunIcon = Sun;
}
