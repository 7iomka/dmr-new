import { ChangeDetectionStrategy, Component, ViewEncapsulation } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { SelectModule, SelectPassThrough } from 'primeng/select';
import { LucideCheck, LucideChevronDown, LucideGlobe } from '@lucide/angular';

type LanguageOption = {
  code: string;
  nativeLabel: string;
  englishLabel: string;
  flag: string;
};

@Component({
  selector: 'app-language-switcher',
  standalone: true,
  imports: [FormsModule, SelectModule, LucideGlobe, LucideChevronDown, LucideCheck],
  styleUrl: './app-language-switcher.component.css',
  encapsulation: ViewEncapsulation.None,
  changeDetection: ChangeDetectionStrategy.OnPush,
  host: {
    class: 'app-language-switcher',
  },
  template: `
    <p-select
      ariaLabel="Выбор языка"
      dataKey="code"
      optionLabel="nativeLabel"
      panelStyleClass="app-language-switcher__panel"
      scrollHeight="20rem"
      [appendTo]="'body'"
      [checkmark]="false"
      [editable]="false"
      [filter]="false"
      [options]="languages"
      [overlayOptions]="{
        autoZIndex: true,
        baseZIndex: 1000,
      }"
      [pt]="selectPt"
      [showClear]="false"
      [(ngModel)]="selectedLanguage">
      <ng-template #dropdownicon>
        <svg class="app-language-switcher__dropdown-icon" lucideChevronDown></svg>
      </ng-template>

      <ng-template #selectedItem let-item>
        @if (item) {
          <span class="app-language-switcher__value">
            <span class="app-language-switcher__value-flag">{{ item.flag }}</span>
            <span class="app-language-switcher__value-label">{{ item.nativeLabel }}</span>
            <span class="app-language-switcher__value-code">{{ item.code }}</span>
          </span>
        } @else {
          <span class="app-language-switcher__value">
            <span class="app-language-switcher__value-flag">🌐</span>
            <span class="app-language-switcher__value-label app-language-switcher__value-label--placeholder">
              Language
            </span>
            <span class="app-language-switcher__value-code app-language-switcher__value-code--placeholder"> LANG </span>
          </span>
        }
      </ng-template>

      <ng-template #header>
        <div class="app-language-switcher__panel-header">
          <svg class="app-language-switcher__panel-header-icon" lucideGlobe></svg>
          <span>Выберите язык</span>
        </div>
      </ng-template>

      <ng-template #item let-item>
        <div class="app-language-switcher__option-content">
          <span class="app-language-switcher__option-main">
            <span class="app-language-switcher__option-flag">{{ item.flag }}</span>

            <span class="app-language-switcher__option-labels">
              <span class="app-language-switcher__option-native-label">
                {{ item.nativeLabel }}
              </span>
              <span class="app-language-switcher__option-english-label">
                {{ item.englishLabel }}
              </span>
            </span>
          </span>

          @if (selectedLanguage.code === item.code) {
            <svg class="app-language-switcher__option-check" lucideCheck></svg>
          }
        </div>
      </ng-template>
    </p-select>
  `,
})
export class AppLanguageSwitcherComponent {
  protected readonly languages: LanguageOption[] = [
    { code: 'EN', nativeLabel: 'English', englishLabel: 'English', flag: '🇺🇸' },
    { code: 'RU', nativeLabel: 'Русский', englishLabel: 'Russian', flag: '🇷🇺' },
    { code: 'HI', nativeLabel: 'हिन्दी', englishLabel: 'Hindi', flag: '🇮🇳' },
    { code: 'VI', nativeLabel: 'Tiếng Việt', englishLabel: 'Vietnamese', flag: '🇻🇳' },
    { code: 'FR', nativeLabel: 'Français', englishLabel: 'French', flag: '🇫🇷' },
    { code: 'AR', nativeLabel: 'العربية', englishLabel: 'Arabic', flag: '🇸🇦' },
    { code: 'ES', nativeLabel: 'Español', englishLabel: 'Spanish', flag: '🇪🇸' },
    { code: 'KO', nativeLabel: '한국어', englishLabel: 'Korean', flag: '🇰🇷' },
    { code: 'JA', nativeLabel: '日本語', englishLabel: 'Japanese', flag: '🇯🇵' },
    { code: 'BN', nativeLabel: 'বাংলা', englishLabel: 'Bengali', flag: '🇧🇩' },
    { code: 'ZH', nativeLabel: '中文', englishLabel: 'Chinese', flag: '🇨🇳' },
    { code: 'PT', nativeLabel: 'Português', englishLabel: 'Portuguese', flag: '🇵🇹' },
    { code: 'ID', nativeLabel: 'Bahasa Indonesia', englishLabel: 'Indonesian', flag: '🇮🇩' },
    { code: 'RO', nativeLabel: 'Română', englishLabel: 'Romanian', flag: '🇷🇴' },
  ];

  protected selectedLanguage: LanguageOption = this.languages[0];

  protected readonly selectPt: SelectPassThrough = {
    root: {
      class: 'app-language-switcher__select',
    },
    label: {
      class: 'app-language-switcher__select-label',
    },
    dropdown: {
      class: 'app-language-switcher__select-dropdown',
    },
    dropdownIcon: {
      class: 'app-language-switcher__dropdown-icon',
    },
    header: {
      class: 'app-language-switcher__select-header',
    },
    listContainer: {
      class: 'app-language-switcher__list-container',
    },
    list: {
      class: 'app-language-switcher__list',
    },
    option: {
      class: 'app-language-switcher__option',
    },
  };
}
