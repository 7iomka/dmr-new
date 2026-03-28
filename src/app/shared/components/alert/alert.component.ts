import { ChangeDetectionStrategy, Component, computed, input } from '@angular/core';
import { Message } from 'primeng/message';
import {
  LucideCircleAlert,
  LucideCircleCheck,
  LucideDynamicIcon,
  type LucideIcon,
  LucideInfo,
  LucideTriangleAlert,
} from '@lucide/angular';
import { MessagePassThrough } from 'primeng/types/message';

export type AppAlertSeverity = Message['severity'];
export type AppAlertSize = 'small' | 'large' | undefined;
export type AppAlertVariant = 'outlined' | 'simple' | undefined;

@Component({
  selector: 'app-alert',
  standalone: true,
  imports: [Message, LucideDynamicIcon],
  template: `
    <p-message [closable]="closable()" [pt]="pt()" [severity]="severity()" [size]="size()" [variant]="variant()">
      <ng-template #icon>
        <svg aria-hidden="true" class="c-alert__icon" [lucideIcon]="alertIcon()"></svg>
      </ng-template>

      <ng-content />
    </p-message>
  `,
  changeDetection: ChangeDetectionStrategy.OnPush,
})
export class AppAlertComponent {
  severity = input<AppAlertSeverity>('info');
  title = input<string>();
  closable = input(false);
  size = input<AppAlertSize>(undefined);
  variant = input<AppAlertVariant>(undefined);

  readonly alertIcon = computed<LucideIcon>(() => {
    switch (this.severity()) {
      case 'success':
        return LucideCircleCheck;
      case 'warn':
        return LucideTriangleAlert;
      case 'error':
        return LucideCircleAlert;
      default:
        return LucideInfo;
    }
  });

  readonly pt = computed<MessagePassThrough>(() => {
    return {
      root: {
        class: ['c-alert', `c-alert--${this.severity()}`].join(' '),
      },
      content: {
        class: 'c-alert__content',
      },
      icon: {
        class: 'c-alert__icon',
      },
      text: {
        class: 'c-alert__text',
      },
      closeButton: {
        class: 'c-alert__close-button',
      },
      closeIcon: {
        class: 'c-alert__close-icon',
      },
    };
  });
}
