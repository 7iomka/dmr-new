import { computed, Injectable, signal } from '@angular/core';

type SidebarMode = 'fixed' | 'collapse';

const SIDEBAR_STATE_KEY = 'sidebar-mode';

@Injectable({ providedIn: 'root' })
export class SidebarModeService {
  private readonly mode = signal<SidebarMode>(
    localStorage.getItem(SIDEBAR_STATE_KEY) === 'collapse' ? 'collapse' : 'fixed',
  );

  readonly isCollapsed = computed(() => this.mode() === 'collapse');

  toggleSidebar(): void {
    const next = this.isCollapsed() ? 'fixed' : 'collapse';
    this.mode.set(next);
    localStorage.setItem(SIDEBAR_STATE_KEY, next);
  }
}
