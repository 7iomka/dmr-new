import { Component, Input, TemplateRef, ViewChild } from '@angular/core';

@Component({
  selector: 'app-pill-tab',
  standalone: true,
  template: `
    <ng-template>
      <ng-content />
    </ng-template>
  `,
})
export class PillTabComponent {
  @Input({ required: true }) value!: string;

  @ViewChild(TemplateRef, { static: true }) content!: TemplateRef<unknown>;
}
