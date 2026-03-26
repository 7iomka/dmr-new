import { Component, Input, TemplateRef, ViewChild } from '@angular/core';

@Component({
  selector: 'app-pill-tabpanel',
  standalone: true,
  template: `
    <ng-template>
      <ng-content />
    </ng-template>
  `,
})
export class PillTabPanelComponent {
  @Input({ required: true }) value!: string;

  @ViewChild(TemplateRef, { static: true }) content!: TemplateRef<unknown>;
}
