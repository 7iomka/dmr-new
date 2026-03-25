import { Component, input, output, ViewEncapsulation } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { ToggleSwitchModule } from 'primeng/toggleswitch';

@Component({
  selector: 'app-c-investment-switch-card',
  standalone: true,
  encapsulation: ViewEncapsulation.None,
  imports: [FormsModule, ToggleSwitchModule],
  template: `
    <div class="c-investment-switch-card">
      <div class="c-investment-switch-card__content">
        <p class="c-investment-switch-card__title">{{ title() }}</p>
        <p class="c-investment-switch-card__description">{{ description() }}</p>
      </div>
      <p-toggleswitch
        [ariaLabel]="title()"
        [inputId]="inputId()"
        [ngModel]="checked()"
        (ngModelChange)="checkedChange.emit($event)" />
    </div>
  `,
  styleUrl: './c-investment-switch-card.component.css',
})
export class CInvestmentSwitchCardComponent {
  readonly title = input('Рассрочка');
  readonly description = input('Резервируйте доли для покупки на срок от 2 до 24 месяцев');
  readonly inputId = input('installmentToggle');
  readonly checked = input(false);

  readonly checkedChange = output<boolean>();
}
