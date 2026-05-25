import { ChangeDetectionStrategy, Component } from '@angular/core';
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
  changeDetection: ChangeDetectionStrategy.OnPush,
  template: `
    <p-select
      ariaLabel="Выбор языка"
      dataKey="code"
      optionLabel="nativeLabel"
      panelStyleClass="!mt-2"
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
        <svg class="w-4 h-4" lucideChevronDown></svg>
      </ng-template>

      <ng-template #selectedItem let-item>
        @if (item) {
          <span class="inline-flex min-w-0 items-center gap-2">
            <span class="text-base leading-none">{{ item.flag }}</span>
            <span class="hidden text-sm font-bold sm:inline">{{ item.nativeLabel }}</span>
            <span class="text-xsfont-bold  uppercase sm:hidden">{{ item.code }}</span>
          </span>
        } @else {
          <span class="inline-flex items-center gap-2">
            <span class="text-base leading-none">🌐</span>
            <span class="hidden text-sm sm:inline">Language</span>
            <span class="text-xs uppercase sm:hidden">LANG</span>
          </span>
        }
      </ng-template>

      <ng-template #header>
        <div
          class="flex items-center gap-2 border-b border-surface-200/80 px-4 py-3 text-[11px] font-bold uppercase text-surface-500 dark:border-surface-800 dark:text-surface-400">
          <svg class="w-4 h-4" lucideGlobe></svg>
          <span>Выберите язык</span>
        </div>
      </ng-template>

      <ng-template #item let-item>
        <div class="flex w-full items-center justify-between gap-3">
          <span class="flex min-w-0 flex-1 items-center gap-3">
            <span class="shrink-0 text-lg leading-none">{{ item.flag }}</span>

            <span class="min-w-0">
              <span class="block truncate text-sm font-semibold text-surface-800 dark:text-surface-100">
                {{ item.nativeLabel }}
              </span>
              <span class="mt-0.5 block truncate text-xs text-surface-500 dark:text-surface-400">
                {{ item.englishLabel }}
              </span>
            </span>
          </span>

          @if (selectedLanguage.code === item.code) {
            <svg class="w-4 h-4 shrink-0 text-primary-500 dark:text-primary-400" lucideCheck></svg>
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
      class: [
        'min-h-10 rounded-lg',
        'border-surface-200 dark:border-surface-700',
        'bg-surface-50 dark:bg-surface-800/70',
        'text-surface-700 dark:text-surface-300',
        'hover:bg-surface-100 dark:hover:bg-surface-800',
        'dark:hover:border-surface-600',
        'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/35',
      ].join(' '),
    },
    label: {
      class: 'py-2 pl-2.5 pr-0 min-w-0 flex items-center text-sm font-medium',
    },
    dropdown: {
      class: 'py-2 pr-2.5 pl-2 w-auto group',
    },
    dropdownIcon: {
      class:
        'h-4 w-4 shrink-0 transition-transform duration-200 group-aria-expanded:rotate-180 text-surface-500 dark:text-surface-400',
    },
    header: {
      class: 'border-b border-surface-200/80 px-4 py-3 dark:border-surface-800',
    },
    listContainer: {
      class: 'min-w-60 max-h-80',
    },
    list: {
      class: 'flex flex-col gap-0.5 p-1',
    },
    option: {
      class: [
        'flex w-full items-center justify-between gap-3 rounded-md px-3 py-2 text-left transition-all duration-150',
        'text-surface-800 dark:text-surface-100',
        'hover:bg-surface-100 dark:hover:bg-surface-800/80',
        'p-focus:bg-surface-100 dark:p-focus:bg-surface-800/80',
        'p-selected!: bg-primary-100/80 p-selected!: text-surface-900',
        'dark:p-selected!: bg-primary-900/35 dark:p-selected!: text-primary-100',
      ].join(' '),
    },
  };
}
