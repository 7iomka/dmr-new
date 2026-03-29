import { CommonModule } from '@angular/common';
import { ChangeDetectionStrategy, Component, DestroyRef, inject, Input, OnInit } from '@angular/core';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { InputGroupModule } from 'primeng/inputgroup';
import { InputGroupAddonModule } from 'primeng/inputgroupaddon';
import { InputTextModule } from 'primeng/inputtext';
import { SelectModule, SelectPassThrough } from 'primeng/select';

type PhoneCountryOption = {
  iso2: string;
  name: string;
  flag: string;
  dialCode: string;
  formatGroups: number[];
};

const PHONE_COUNTRIES: PhoneCountryOption[] = [
  { iso2: 'RU', name: 'Россия', flag: '🇷🇺', dialCode: '+7', formatGroups: [3, 3, 2, 2] },
  { iso2: 'KZ', name: 'Казахстан', flag: '🇰🇿', dialCode: '+7', formatGroups: [3, 3, 2, 2] },
  { iso2: 'US', name: 'Соединённые Штаты', flag: '🇺🇸', dialCode: '+1', formatGroups: [3, 3, 4] },
  { iso2: 'CA', name: 'Канада', flag: '🇨🇦', dialCode: '+1', formatGroups: [3, 3, 4] },
  { iso2: 'GB', name: 'Великобритания', flag: '🇬🇧', dialCode: '+44', formatGroups: [4, 3, 3] },
  { iso2: 'DE', name: 'Германия', flag: '🇩🇪', dialCode: '+49', formatGroups: [3, 3, 4] },
  { iso2: 'FR', name: 'Франция', flag: '🇫🇷', dialCode: '+33', formatGroups: [1, 2, 2, 2, 2] },
  { iso2: 'ES', name: 'Испания', flag: '🇪🇸', dialCode: '+34', formatGroups: [3, 3, 3] },
  { iso2: 'IT', name: 'Италия', flag: '🇮🇹', dialCode: '+39', formatGroups: [3, 3, 4] },
  { iso2: 'PT', name: 'Португалия', flag: '🇵🇹', dialCode: '+351', formatGroups: [3, 3, 3] },
  { iso2: 'NL', name: 'Нидерланды', flag: '🇳🇱', dialCode: '+31', formatGroups: [2, 3, 4] },
  { iso2: 'PL', name: 'Польша', flag: '🇵🇱', dialCode: '+48', formatGroups: [3, 3, 3] },
  { iso2: 'TR', name: 'Турция', flag: '🇹🇷', dialCode: '+90', formatGroups: [3, 3, 2, 2] },
  { iso2: 'AE', name: 'ОАЭ', flag: '🇦🇪', dialCode: '+971', formatGroups: [2, 3, 4] },
  { iso2: 'SA', name: 'Саудовская Аравия', flag: '🇸🇦', dialCode: '+966', formatGroups: [2, 3, 4] },
  { iso2: 'IN', name: 'Индия', flag: '🇮🇳', dialCode: '+91', formatGroups: [5, 5] },
  { iso2: 'CN', name: 'Китай', flag: '🇨🇳', dialCode: '+86', formatGroups: [3, 4, 4] },
  { iso2: 'JP', name: 'Япония', flag: '🇯🇵', dialCode: '+81', formatGroups: [2, 4, 4] },
  { iso2: 'KR', name: 'Южная Корея', flag: '🇰🇷', dialCode: '+82', formatGroups: [2, 4, 4] },
  { iso2: 'SG', name: 'Сингапур', flag: '🇸🇬', dialCode: '+65', formatGroups: [4, 4] },
  { iso2: 'TH', name: 'Таиланд', flag: '🇹🇭', dialCode: '+66', formatGroups: [2, 3, 4] },
  { iso2: 'VN', name: 'Вьетнам', flag: '🇻🇳', dialCode: '+84', formatGroups: [3, 3, 3] },
  { iso2: 'ID', name: 'Индонезия', flag: '🇮🇩', dialCode: '+62', formatGroups: [3, 4, 4] },
  { iso2: 'AU', name: 'Австралия', flag: '🇦🇺', dialCode: '+61', formatGroups: [3, 3, 3] },
  { iso2: 'BR', name: 'Бразилия', flag: '🇧🇷', dialCode: '+55', formatGroups: [2, 5, 4] },
  { iso2: 'MX', name: 'Мексика', flag: '🇲🇽', dialCode: '+52', formatGroups: [2, 4, 4] },
  { iso2: 'AR', name: 'Аргентина', flag: '🇦🇷', dialCode: '+54', formatGroups: [2, 4, 4] },
  { iso2: 'MD', name: 'Молдова', flag: '🇲🇩', dialCode: '+373', formatGroups: [2, 3, 3] },
  { iso2: 'UA', name: 'Украина', flag: '🇺🇦', dialCode: '+380', formatGroups: [2, 3, 2, 2] },
  { iso2: 'BY', name: 'Беларусь', flag: '🇧🇾', dialCode: '+375', formatGroups: [2, 3, 2, 2] },
  { iso2: 'UZ', name: 'Узбекистан', flag: '🇺🇿', dialCode: '+998', formatGroups: [2, 3, 2, 2] },
  { iso2: 'KG', name: 'Кыргызстан', flag: '🇰🇬', dialCode: '+996', formatGroups: [3, 3, 3] },
  { iso2: 'TJ', name: 'Таджикистан', flag: '🇹🇯', dialCode: '+992', formatGroups: [2, 3, 2, 2] },
];

@Component({
  selector: 'app-form-control-phone',
  standalone: true,
  imports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
    InputGroupModule,
    InputGroupAddonModule,
    SelectModule,
    InputTextModule,
  ],
  changeDetection: ChangeDetectionStrategy.OnPush,
  template: `
    <div class="c-form-control c-phone-control">
      @if (label) {
        <label class="c-form-control__label" [for]="controlName">{{ label }}</label>
      }

      <div class="c-form-control__control" [formGroup]="formGroup">
        <p-inputgroup class="c-phone-inputgroup">
          <p-inputgroup-addon class="c-phone-inputgroup__addon">
            <p-select
              ariaLabel="Код страны"
              class="c-phone-country-select"
              dataKey="iso2"
              optionLabel="name"
              optionValue="iso2"
              panelStyleClass="c-phone-country-select__panel"
              scrollHeight="16rem"
              [appendTo]="'body'"
              [filter]="true"
              [filterBy]="countryFilterBy"
              [filterPlaceholder]="countryFilterPlaceholder"
              [ngModelOptions]="{ standalone: true }"
              [options]="countries"
              [overlayOptions]="{ autoZIndex: true, baseZIndex: 1200 }"
              [pt]="countrySelectPt"
              [showClear]="false"
              [(ngModel)]="selectedCountryIso"
              (ngModelChange)="onCountrySelected($event)">
              <ng-template #selectedItem let-item>
                @if (item) {
                  <span class="c-phone-country-current">
                    <span class="c-phone-country-current__flag">{{ item.flag }}</span>
                  </span>
                }
              </ng-template>

              <ng-template #item let-item>
                <div class="c-phone-country-option">
                  <span class="c-phone-country-option__main">
                    <span class="c-phone-country-option__flag">{{ item.flag }}</span>
                    <span class="c-phone-country-option__name">{{ item.name }}</span>
                  </span>

                  <span class="c-phone-country-option__code">{{ item.dialCode }}</span>
                </div>
              </ng-template>
            </p-select>
          </p-inputgroup-addon>

          <input
            class="c-form-control__input c-phone-input"
            pInputText
            type="tel"
            [attr.aria-label]="resolvedAriaLabel"
            [attr.autocomplete]="autocomplete"
            [formControlName]="controlName"
            [id]="controlName"
            [placeholder]="placeholder" />
        </p-inputgroup>
      </div>
    </div>
  `,
})
export class FormControlPhoneComponent implements OnInit {
  @Input({ required: true }) formGroup!: FormGroup;
  @Input({ required: true }) controlName!: string;
  @Input() label?: string;
  @Input() ariaLabel?: string;
  @Input() placeholder = '';
  @Input() autocomplete?: string;

  protected readonly countries = PHONE_COUNTRIES;
  protected readonly countryFilterBy = 'name,dialCode,iso2';
  protected readonly countryFilterPlaceholder = 'Поиск страны...';

  protected selectedCountryIso = 'RU';

  protected readonly countrySelectPt: SelectPassThrough = {
    root: { class: 'c-phone-country-select__root' },
    label: { class: 'c-phone-country-select__label' },
    dropdown: { class: 'c-phone-country-select__trigger' },
    dropdownIcon: { class: 'c-phone-country-select__icon' },
    listContainer: { class: 'c-phone-country-select__list-container' },
    list: { class: 'c-phone-country-select__list' },
    option: { class: 'c-phone-country-select__option' },
    header: { class: 'c-phone-country-select__header' },
    pcFilter: {
      root: { class: 'c-phone-country-select__filter' },
    },
  };

  private isPatchingValue = false;
  private readonly destroyRef = inject(DestroyRef);

  ngOnInit(): void {
    this.syncCountryWithValue(this.control.value, false);
    this.ensureInitialDialCode();

    this.control.valueChanges.pipe(takeUntilDestroyed(this.destroyRef)).subscribe((value) => {
      if (this.isPatchingValue) {
        return;
      }

      this.syncCountryWithValue(value, true);
    });
  }

  private ensureInitialDialCode(): void {
    if (this.control.value?.trim()) {
      return;
    }

    this.patchControlValue(this.selectedCountry.dialCode);
  }

  protected onCountrySelected(iso2: string): void {
    this.selectedCountryIso = iso2;

    const selectedCountry = this.getCountryByIso(iso2);
    if (!selectedCountry) {
      return;
    }

    this.patchControlValue(this.formatPhone(selectedCountry.dialCode, selectedCountry));
  }

  private get control(): FormControl<string | null> {
    return this.formGroup.get(this.controlName) as FormControl<string | null>;
  }

  private get selectedCountry(): PhoneCountryOption {
    return this.getCountryByIso(this.selectedCountryIso) ?? PHONE_COUNTRIES[0];
  }

  private getCountryByIso(iso2: string): PhoneCountryOption | undefined {
    return PHONE_COUNTRIES.find((country) => country.iso2 === iso2);
  }

  private syncCountryWithValue(rawValue: string | null, applyFormatting: boolean): void {
    const value = (rawValue ?? '').trim();
    if (!value) {
      return;
    }

    const sanitized = this.sanitizePhone(value);
    const matchedCountry = this.matchCountryByPhoneValue(sanitized);

    if (matchedCountry) {
      this.selectedCountryIso = matchedCountry.iso2;
    }

    if (!applyFormatting) {
      return;
    }

    const formatted = this.formatPhone(sanitized, matchedCountry ?? this.selectedCountry);
    if (formatted !== rawValue) {
      this.patchControlValue(formatted);
    }
  }

  private patchControlValue(value: string): void {
    this.isPatchingValue = true;
    this.control.setValue(value, { emitEvent: false });
    this.isPatchingValue = false;
  }

  private sanitizePhone(value: string): string {
    const compact = value.replace(/[^\d+]/g, '');
    if (!compact) {
      return '';
    }

    if (compact.startsWith('+')) {
      return `+${compact.slice(1).replace(/\+/g, '')}`;
    }

    return compact.replace(/\D/g, '');
  }

  private matchCountryByPhoneValue(phoneValue: string): PhoneCountryOption | undefined {
    if (!phoneValue.startsWith('+')) {
      return undefined;
    }

    const matches = PHONE_COUNTRIES.filter((country) => phoneValue.startsWith(country.dialCode));
    if (matches.length === 0) {
      return undefined;
    }

    const sortedMatches = matches.sort((a, b) => b.dialCode.length - a.dialCode.length);
    return sortedMatches.find((country) => country.iso2 === this.selectedCountryIso) ?? sortedMatches[0];
  }

  private formatPhone(phoneValue: string, country: PhoneCountryOption): string {
    const startsWithPlus = phoneValue.startsWith('+');
    const digits = phoneValue.replace(/\D/g, '');
    const codeDigits = country.dialCode.replace(/\D/g, '');

    if (startsWithPlus && !digits.startsWith(codeDigits)) {
      return `+${digits}`;
    }

    const nationalDigits = startsWithPlus ? digits.slice(codeDigits.length) : digits;
    const groups = this.splitByGroups(nationalDigits, country.formatGroups);

    if (this.isCisCountry(country.iso2)) {
      return this.formatCisNumber(country.dialCode, groups);
    }

    return [country.dialCode, ...groups].join(' ').trim();
  }

  private splitByGroups(value: string, groups: number[]): string[] {
    const chunks: string[] = [];
    let pointer = 0;

    for (const groupSize of groups) {
      if (pointer >= value.length) {
        break;
      }

      chunks.push(value.slice(pointer, pointer + groupSize));
      pointer += groupSize;
    }

    if (pointer < value.length) {
      chunks.push(value.slice(pointer));
    }

    return chunks;
  }

  private formatCisNumber(dialCode: string, groups: string[]): string {
    if (groups.length === 0) {
      return dialCode;
    }

    const [first, second, third, fourth, ...tail] = groups;
    const formattedParts = [dialCode, `(${first})`];

    if (second) {
      formattedParts.push(second);
    }

    const hyphenTail = [third, fourth, ...tail].filter(Boolean).join('-');
    if (hyphenTail) {
      formattedParts.push(hyphenTail);
    }

    return formattedParts.join(' ').trim();
  }

  private isCisCountry(iso2: string): boolean {
    return iso2 === 'RU' || iso2 === 'KZ' || iso2 === 'BY' || iso2 === 'UA';
  }

  protected get resolvedAriaLabel(): string | null {
    if (this.label) {
      return null;
    }

    return (this.ariaLabel ?? this.placeholder) || this.controlName;
  }
}
