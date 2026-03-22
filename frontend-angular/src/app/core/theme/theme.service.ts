import { inject, Injectable, Renderer2, RendererFactory2, signal } from '@angular/core';

type ThemeMode = 'light' | 'dark';

@Injectable({ providedIn: 'root' })
export class ThemeService {
  private readonly rendererFactory = inject(RendererFactory2);
  private readonly renderer: Renderer2 = this.rendererFactory.createRenderer(null, null);

  readonly themeMode = signal<ThemeMode>('light');

  constructor() {
    this.initTheme();
  }

  private initTheme(): void {
    const saved = (localStorage.getItem('dmr-theme') as ThemeMode | null) ?? 'light';
    this.setTheme(saved);
  }

  toggleTheme(): void {
    this.setTheme(this.themeMode() === 'light' ? 'dark' : 'light');
  }

  setTheme(mode: ThemeMode): void {
    this.themeMode.set(mode);
    localStorage.setItem('dmr-theme', mode);

    if (mode === 'dark') {
      this.renderer.addClass(document.documentElement, 'dark');
      this.renderer.addClass(document.body, 'dark');
      return;
    }

    this.renderer.removeClass(document.documentElement, 'dark');
    this.renderer.removeClass(document.body, 'dark');
  }
}
