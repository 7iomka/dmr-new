import { Component, inject } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { ChevronsLeft, LucideAngularModule } from 'lucide-angular';

import { SidebarModeService } from '../../core/theme/sidebar-mode.service';
import { APP_NAVIGATION } from '../models/navigation.model';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, LucideAngularModule],
  template: `
    <aside id="sidebar" class="page-sidebar">
      <div class="relative h-20 px-2 flex items-center justify-between">
        <a class="sidebar-logo-link h-full pl-4 flex items-center shrink-0 transition-all" routerLink="/dashboard">
          <img class="sidebar-logo-full h-10 w-auto hidden dark:block" src="img/logo-light.svg" alt="Logo" />
          <img class="sidebar-logo-full h-10 w-auto dark:hidden" src="img/logo-dark.svg" alt="Logo" />
          <img class="sidebar-logo-icon h-10 w-auto hidden" src="img/logo-icon-only.svg" alt="Logo" />
        </a>
        <button
          type="button"
          (click)="sidebarModeService.toggleSidebar()"
          class="js-desktop-sidebar-toggle absolute -right-3.5 top-0 bottom-0 my-auto hidden lg:flex w-7 h-7 items-center justify-center text-zinc-500 bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 border border-zinc-200 dark:border-zinc-700 rounded-md transition-colors"
          aria-label="Toggle sidebar"
        >
          <lucide-icon [img]="chevronsLeftIcon" class="w-4.5 h-4.5 transition-transform duration-300 [.sidebar-collapse_&]:rotate-180" />
        </button>
      </div>

      <div class="page-sidebar-nav">
        @for (group of navigation; track group.title) {
          <section class="sidebar-group">
            <p class="sidebar-section-title px-4 text-[10px] font-bold uppercase tracking-widest mb-3 text-zinc-400 dark:text-zinc-600">
              <span class="sidebar-label">{{ group.title }}</span>
            </p>
            <nav class="flex flex-col gap-1">
              @for (item of group.items; track item.route) {
                <a [routerLink]="item.route" routerLinkActive="is-active" [routerLinkActiveOptions]="{ exact: true }" class="sidebar-nav-link w-full flex items-center gap-3 pl-4 pr-3 py-3 rounded-lg transition-all text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800/50 dark:hover:text-white">
                  <span class="sidebar-link-icon flex items-center justify-center">
                    <lucide-icon [img]="item.icon" class="w-5 h-5" />
                  </span>
                  <span class="sidebar-label text-sm font-semibold">{{ item.label }}</span>
                </a>
              }
            </nav>
          </section>
        }
      </div>
    </aside>
  `
})
export class AppSidebarComponent {
  protected readonly navigation = APP_NAVIGATION;
  protected readonly chevronsLeftIcon = ChevronsLeft;
  protected readonly sidebarModeService = inject(SidebarModeService);
}
