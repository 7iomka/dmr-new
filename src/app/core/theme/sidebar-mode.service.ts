import { Injectable } from '@angular/core';

type SidebarMode = 'fixed' | 'collapse';

const SIDEBAR_STATE_KEY = 'sidebar-mode';

@Injectable({ providedIn: 'root' })
export class SidebarModeService {
  private mode: SidebarMode = 'fixed';

  constructor() {
    const stored = localStorage.getItem(SIDEBAR_STATE_KEY);
    this.mode = stored === 'collapse' ? 'collapse' : 'fixed';
    this.applySidebarMode(this.mode);
  }

  toggleSidebar(): void {
    this.mode = this.mode === 'collapse' ? 'fixed' : 'collapse';
    localStorage.setItem(SIDEBAR_STATE_KEY, this.mode);
    this.applySidebarMode(this.mode);
  }

  private applySidebarMode(mode: SidebarMode): void {
    document.body.classList.remove('sidebar-fixed', 'sidebar-collapse');
    document.body.classList.add(mode === 'collapse' ? 'sidebar-collapse' : 'sidebar-fixed');
  }
}
