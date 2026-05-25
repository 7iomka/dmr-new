import { DOCUMENT } from '@angular/common';
import { inject, Injectable } from '@angular/core';
import { UseStyle } from 'primeng/usestyle';

type PrimeNgUseStyleOptions = {
  first?: boolean;
  id?: string;
  immediate?: boolean;
  manual?: boolean;
  media?: string;
  name?: string;
  nonce?: string;
  props?: Record<string, string>;
};

let styleId = 0;

@Injectable()
export class AppPrimeNgUseStyle extends UseStyle {
  override document = inject(DOCUMENT);

  override use(css: string, options: PrimeNgUseStyleOptions = {}) {
    const { id, media, name = `style_${++styleId}`, nonce, first = false, props = {} } = options;

    const styleRef =
      this.document.querySelector<HTMLStyleElement>(`style[data-primeng-style-id="${name}"]`) ??
      this.getStyleElementById(id) ??
      this.document.createElement('style');

    if (!styleRef.isConnected) {
      styleRef.setAttribute('type', 'text/css');
      styleRef.setAttribute('data-primeng-style-id', name);

      if (media) {
        styleRef.setAttribute('media', media);
      }
      if (nonce) {
        styleRef.setAttribute('nonce', nonce);
      }
      for (const [prop, value] of Object.entries(props)) {
        styleRef.setAttribute(prop, value);
      }

      this.insertPrimeNgStyle(styleRef, first);
    }

    if (styleRef.textContent !== css) {
      styleRef.textContent = css;
    }

    return {
      id,
      name,
      el: styleRef,
      css,
    };
  }

  private insertPrimeNgStyle(styleRef: HTMLStyleElement, first: boolean): void {
    const head = this.document.head;

    if (first && head.firstChild) {
      head.insertBefore(styleRef, head.firstChild);
      return;
    }

    const appStylesheet = head.querySelector<HTMLLinkElement>('link[rel="stylesheet"][href*="styles"]');

    if (appStylesheet) {
      head.insertBefore(styleRef, appStylesheet);
      return;
    }

    head.appendChild(styleRef);
  }

  private getStyleElementById(id: string | undefined): HTMLStyleElement | null {
    if (!id) {
      return null;
    }

    const element = this.document.getElementById(id);

    return element instanceof HTMLStyleElement ? element : null;
  }
}
