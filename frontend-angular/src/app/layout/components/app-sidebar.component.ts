import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { ButtonModule } from 'primeng/button';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, ButtonModule],
  template: `
    <aside class="app-sidebar">
      <div class="flex w-full flex-col gap-2">
        <div class="mb-4 flex items-center gap-2 px-2">
          <img src="img/logo-icon-only.svg" alt="DMR" class="h-8 w-8" />
          <span class="font-medium text-surface-700 dark:text-surface-200">DMR</span>
        </div>
        <a routerLink="/showcase" routerLinkActive="font-semibold"
          ><p-button label="UI Showcase" icon="pi pi-palette" severity="secondary" [text]="true" styleClass="w-full justify-start"></p-button
        ></a>
      </div>
    </aside>
  `
})
export class AppSidebarComponent {}
