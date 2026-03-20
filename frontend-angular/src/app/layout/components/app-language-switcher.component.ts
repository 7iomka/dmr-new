import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { SelectModule } from 'primeng/select';

interface LanguageOption {
  code: string;
  label: string;
  flag: string;
}

@Component({
  selector: 'app-language-switcher',
  standalone: true,
  imports: [FormsModule, SelectModule],
  template: `
    <p-select
      [options]="languages"
      [(ngModel)]="selected"
      optionLabel="label"
      styleClass="shell-language-select"
      appendTo="body"
    >
      <ng-template let-item pTemplate="selectedItem">
        <span class="inline-flex items-center gap-2 text-sm">
          <span>{{ item.flag }}</span>
          <span class="hidden md:inline">{{ item.label }}</span>
          <span class="md:hidden uppercase">{{ item.code }}</span>
        </span>
      </ng-template>

      <ng-template let-item pTemplate="item">
        <span class="inline-flex items-center gap-2 text-sm">
          <span>{{ item.flag }}</span>
          <span>{{ item.label }}</span>
        </span>
      </ng-template>
    </p-select>
  `
})
export class AppLanguageSwitcherComponent {
  protected readonly languages: LanguageOption[] = [
    { code: 'EN', label: 'English', flag: '🇺🇸' },
    { code: 'RU', label: 'Русский', flag: '🇷🇺' },
    { code: 'ES', label: 'Español', flag: '🇪🇸' }
  ];

  protected selected = this.languages[0];
}
