import { DOCUMENT } from '@angular/common';
import { Directive, effect, ElementRef, EventEmitter, inject, input, NgZone, OnDestroy, Output } from '@angular/core';

@Directive({
  selector: '[appBottomSheetDragDismiss]',
  standalone: true,
  host: {
    '(pointerdown)': 'onPointerDown($event)',
  },
})
export class BottomSheetDragDismissDirective implements OnDestroy {
  readonly appBottomSheetDragDismissVisible = input(false);
  readonly appBottomSheetDragDismissThreshold = input(100);

  @Output() readonly appBottomSheetDragDismiss = new EventEmitter<void>();

  private readonly document = inject(DOCUMENT);
  private readonly elementRef = inject<ElementRef<HTMLElement>>(ElementRef);
  private readonly ngZone = inject(NgZone);

  private drawerElement: HTMLElement | null = null;
  private maskElement: HTMLElement | null = null;
  private dragging = false;
  private startY = 0;
  private currentOffset = 0;
  private initialMaskOpacity = 1;
  private removePointerMoveListener: (() => void) | null = null;
  private removePointerUpListener: (() => void) | null = null;
  private removePointerCancelListener: (() => void) | null = null;
  private dismissTimeoutId: number | null = null;
  private readonly visibleEffect = effect(() => {
    if (this.appBottomSheetDragDismissVisible()) {
      this.resetStyles();
    }
  });

  onPointerDown(event: PointerEvent): void {
    if (!this.appBottomSheetDragDismissVisible()) {
      return;
    }
    if (event.pointerType === 'mouse' && event.button !== 0) {
      return;
    }

    this.drawerElement = this.elementRef.nativeElement.closest('.p-drawer');
    this.maskElement = this.document.body.querySelector('.p-drawer-mask.p-overlay-mask:last-of-type');

    if (!this.drawerElement) {
      return;
    }

    this.dragging = true;
    this.startY = event.clientY;
    this.currentOffset = 0;
    this.initialMaskOpacity =
      this.parseOpacity(this.maskElement ? getComputedStyle(this.maskElement).opacity : null) ?? 1;

    this.drawerElement.style.transition = 'none';
    this.drawerElement.style.willChange = 'transform';
    this.drawerElement.classList.add('app-bottom-sheet--dragging');

    this.elementRef.nativeElement.setPointerCapture(event.pointerId);
    event.preventDefault();

    this.ngZone.runOutsideAngular(() => {
      this.removePointerMoveListener = this.listen('pointermove', (moveEvent) =>
        this.onPointerMove(moveEvent as PointerEvent),
      );
      this.removePointerUpListener = this.listen('pointerup', () => this.onPointerEnd());
      this.removePointerCancelListener = this.listen('pointercancel', () => this.onPointerEnd());
    });
  }

  ngOnDestroy(): void {
    this.clearListeners();
    this.clearDismissTimeout();
    this.visibleEffect.destroy();
    this.resetStyles();
  }

  private onPointerMove(event: PointerEvent): void {
    if (!this.dragging || !this.drawerElement) {
      return;
    }

    const nextOffset = Math.max(0, event.clientY - this.startY);
    this.currentOffset = nextOffset;
    this.drawerElement.style.transform = `translateY(${nextOffset}px)`;
    this.updateMaskOpacity(nextOffset);
  }

  private onPointerEnd(): void {
    if (!this.dragging) {
      return;
    }

    this.dragging = false;
    this.clearListeners();

    if (this.currentOffset > this.appBottomSheetDragDismissThreshold()) {
      this.animateDismiss();
      return;
    }

    if (this.drawerElement) {
      this.drawerElement.style.transition = '';
      this.drawerElement.style.transform = 'translateY(0)';
      this.drawerElement.style.willChange = '';
      this.drawerElement.classList.remove('app-bottom-sheet--dragging');
    }

    if (this.maskElement) {
      this.maskElement.style.transition = '';
      this.maskElement.style.opacity = `${this.initialMaskOpacity}`;
    }

    this.currentOffset = 0;
  }

  private resetStyles(): void {
    if (this.drawerElement) {
      this.drawerElement.style.transition = '';
      this.drawerElement.style.transform = '';
      this.drawerElement.style.willChange = '';
      this.drawerElement.classList.remove('app-bottom-sheet--dragging');
    }

    if (this.maskElement) {
      this.maskElement.style.transition = '';
      this.maskElement.style.opacity = '';
    }

    this.currentOffset = 0;
    this.initialMaskOpacity = 1;
  }

  private animateDismiss(): void {
    if (!this.drawerElement) {
      this.ngZone.run(() => this.appBottomSheetDragDismiss.emit());
      return;
    }

    const remainingRatio = Math.max(0, Math.min(1, 1 - this.currentOffset / 400));
    const dismissDuration = Math.max(80, Math.round(180 * remainingRatio));

    this.drawerElement.style.transition = `transform ${dismissDuration}ms cubic-bezier(0.4, 0, 1, 1)`;
    this.drawerElement.style.transform = 'translateY(100%)';
    this.drawerElement.style.willChange = '';
    this.drawerElement.classList.remove('app-bottom-sheet--dragging');

    if (this.maskElement) {
      this.maskElement.style.transition = `opacity ${dismissDuration}ms linear`;
      this.maskElement.style.opacity = '0';
    }

    this.clearDismissTimeout();
    this.dismissTimeoutId = window.setTimeout(() => {
      this.dismissTimeoutId = null;
      this.ngZone.run(() => this.appBottomSheetDragDismiss.emit());
    }, dismissDuration);
  }

  private updateMaskOpacity(offset: number): void {
    if (!this.maskElement) {
      return;
    }

    const opacityRatio = Math.max(0, 1 - offset / 400);
    this.maskElement.style.opacity = `${this.initialMaskOpacity * opacityRatio}`;
  }

  private parseOpacity(value: string | null): number | null {
    if (!value) {
      return null;
    }

    const parsed = Number.parseFloat(value);
    return Number.isFinite(parsed) ? parsed : null;
  }

  private listen(type: keyof DocumentEventMap, listener: EventListenerOrEventListenerObject): () => void {
    this.document.addEventListener(type, listener, { passive: false });
    return () => this.document.removeEventListener(type, listener);
  }

  private clearListeners(): void {
    this.removePointerMoveListener?.();
    this.removePointerUpListener?.();
    this.removePointerCancelListener?.();
    this.removePointerMoveListener = null;
    this.removePointerUpListener = null;
    this.removePointerCancelListener = null;
  }

  private clearDismissTimeout(): void {
    if (this.dismissTimeoutId === null) {
      return;
    }

    window.clearTimeout(this.dismissTimeoutId);
    this.dismissTimeoutId = null;
  }
}
