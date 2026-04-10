import { CurrencyPipe, DatePipe, NgStyle } from '@angular/common';
import { Component, computed, DestroyRef, ElementRef, HostListener, inject, signal, viewChild } from '@angular/core';
import { takeUntilDestroyed } from '@angular/core/rxjs-interop';
import {
  LucideArrowLeft,
  LucideChevronDown,
  LucideChevronLeft,
  LucideChevronRight,
  LucideDollarSign,
  LucideHouse,
  LucideSearch,
  LucideUsers,
} from '@lucide/angular';
import { ButtonModule } from 'primeng/button';
import { CardModule, CardPassThroughOptions } from 'primeng/card';
import { PaginatorModule, PaginatorState } from 'primeng/paginator';
import { TableModule } from 'primeng/table';
import { TagModule } from 'primeng/tag';
import { InputText } from 'primeng/inputtext';

import { AccountMockApiService, AccountResponse } from '../../core/api/account-mock-api.service';
import { FormControlCopyComponent } from '../../shared/components/form-controls/form-control-copy.component';
import {
  MyReferralSummaryResponse,
  PartnersMockApiService,
  ReferralViewDirectItem,
  SortDirection,
  TablePage,
  WithdrawalsOverviewResponse,
} from './partners-mock-api.service';
import { AvatarModule } from 'primeng/avatar';

type ReferralStatusSeverity = 'success' | 'warn' | 'secondary';

@Component({
  selector: 'app-partners-page',
  host: {
    class: 'app-page',
  },
  standalone: true,
  imports: [
    CardModule,
    ButtonModule,
    TableModule,
    PaginatorModule,
    TagModule,
    InputText,
    NgStyle,
    CurrencyPipe,
    DatePipe,
    AvatarModule,
    FormControlCopyComponent,
    LucideDollarSign,
    LucideUsers,
    LucideSearch,
    LucideHouse,
    LucideChevronDown,
    LucideChevronLeft,
    LucideChevronRight,
    LucideArrowLeft,
  ],
  templateUrl: './partners-page.component.html',
  styleUrl: './partners-page.component.css',
})
export class PartnersPageComponent {
  private readonly destroyRef = inject(DestroyRef);
  private readonly accountApi = inject(AccountMockApiService);
  private readonly partnersApi = inject(PartnersMockApiService);
  private readonly breadcrumbContainer = viewChild<ElementRef<HTMLElement>>('breadcrumbContainer');
  private breadcrumbSyncTimer: ReturnType<typeof setTimeout> | null = null;

  protected readonly pageSize = 10;
  protected readonly account = signal<AccountResponse | null>(null);
  protected readonly referralSummary = signal<MyReferralSummaryResponse | null>(null);
  protected readonly withdrawalsOverview = signal<WithdrawalsOverviewResponse | null>(null);
  protected readonly referralsPage = signal<TablePage<ReferralViewDirectItem> | null>(null);
  protected readonly currentPath = signal<ReferralViewDirectItem[]>([]);
  protected readonly searchTerm = signal('');
  protected readonly mobileExpanded = signal<Record<string, boolean>>({});
  protected readonly showLeftMask = signal(false);
  protected readonly showRightMask = signal(false);
  protected readonly sort = signal<{ field: keyof ReferralViewDirectItem; direction: SortDirection }>({
    field: 'createdDate',
    direction: 'desc',
  });

  protected readonly tableCardPt: CardPassThroughOptions = {
    header: { class: 'p-0' },
    body: { class: 'px-0 py-0' },
    content: { class: 'px-0 py-0' },
  };

  protected readonly currentParent = computed(() => {
    const path = this.currentPath();
    return path.length > 0 ? path[path.length - 1] : null;
  });

  protected readonly currentParentId = computed(() => this.currentParent()?.id ?? this.account()?.id ?? '');

  protected readonly activeDescendantsCount = computed(() => this.referralSummary()?.activeDescendantsCount ?? 0);
  protected readonly totalDescendantsCount = computed(() => this.referralSummary()?.totalDescendantsCount ?? 0);
  protected readonly totalReferralEarnings = computed(() => this.withdrawalsOverview()?.totalReferralEarnings ?? 0);
  protected readonly currentMonthReferralEarnings = computed(
    () => this.withdrawalsOverview()?.currentMonthReferralEarnings ?? 0,
  );
  protected readonly maxWithdrawableAmount = computed(() => this.withdrawalsOverview()?.maxWithdrawableAmount ?? 0);
  protected readonly referralBalance = computed(() => this.withdrawalsOverview()?.referralBalance ?? 0);

  protected readonly referralCode = computed(
    () => this.referralSummary()?.referralCode ?? this.account()?.referralCode ?? '--------',
  );

  protected readonly platformReferralLink = computed(() => `https://invest.awsarhitect.me/?ref=${this.referralCode()}`);

  protected readonly productReferralLink = computed(() => `https://awsarhitect.me/?ref=${this.referralCode()}`);

  protected readonly pageReport = computed(() => {
    const page = this.referralsPage();

    if (!page || page.totalElements === 0) {
      return 'Показано 0 из 0 партнёров';
    }

    const start = page.page * page.size + 1;
    const end = Math.min(page.totalElements, start + page.content.length - 1);
    return `Показано ${start}-${end} из ${page.totalElements} партнёров`;
  });

  constructor() {
    this.destroyRef.onDestroy(() => {
      if (this.breadcrumbSyncTimer) {
        clearTimeout(this.breadcrumbSyncTimer);
      }
    });

    this.loadAccount();
    this.loadReferralSummary();
    this.loadWithdrawalsOverview();
  }

  protected isSortable(field: keyof ReferralViewDirectItem): boolean {
    return ['legacyId', 'fullName', 'email', 'status', 'createdDate', 'totalDescendantsCount'].includes(field);
  }

  protected sortBy(field: keyof ReferralViewDirectItem): void {
    if (!this.isSortable(field)) {
      return;
    }

    const current = this.sort();

    this.sort.set({
      field,
      direction: current.field === field && current.direction === 'asc' ? 'desc' : 'asc',
    });

    this.loadReferralsPage(0);
  }

  protected onSearchInput(event: Event): void {
    const target = event.target as HTMLInputElement | null;
    this.searchTerm.set(target?.value ?? '');
    this.loadReferralsPage(0);
  }

  protected onPaginatorChange(event: PaginatorState): void {
    const first = event.first ?? 0;
    const rows = event.rows ?? this.pageSize;
    this.loadReferralsPage(Math.floor(first / rows));
  }

  protected goToRoot(): void {
    this.currentPath.set([]);
    this.searchTerm.set('');
    this.scheduleBreadcrumbSync();
    this.loadReferralsPage(0);
  }

  protected goBack(): void {
    const path = this.currentPath();

    if (path.length === 0) {
      return;
    }

    this.currentPath.set(path.slice(0, -1));
    this.searchTerm.set('');
    this.scheduleBreadcrumbSync();
    this.loadReferralsPage(0);
  }

  protected goToBreadcrumb(index: number): void {
    const path = this.currentPath();
    this.currentPath.set(path.slice(0, index + 1));
    this.searchTerm.set('');
    this.scheduleBreadcrumbSync(true);
    this.loadReferralsPage(0);
  }

  protected openReferralBranch(referral: ReferralViewDirectItem): void {
    if (!this.canOpenBranch(referral)) {
      return;
    }

    this.currentPath.update((path) => [...path, referral]);
    this.searchTerm.set('');
    this.scheduleBreadcrumbSync(true, true);
    this.loadReferralsPage(0);
  }

  protected canOpenBranch(referral: ReferralViewDirectItem): boolean {
    return referral.directReferralsCount > 0 && referral.depthLevel < 20;
  }

  protected statusSeverity(status: string): ReferralStatusSeverity {
    const severityMap: Record<string, ReferralStatusSeverity> = {
      ACTIVE: 'success',
      PENDING: 'warn',
    };

    return severityMap[status] ?? 'secondary';
  }

  protected statusLabel(status: string): string {
    return (
      {
        ACTIVE: 'Активен',
        PENDING: 'Ожидает',
      }[status] ?? status
    );
  }

  protected displayName(referral: ReferralViewDirectItem): string {
    return referral.fullName.trim() || 'Без имени';
  }

  protected referrerBadgeLabel(): string {
    return 'Zelikova Angelina';
  }

  protected initials(value: string): string {
    const parts = value.trim().split(/\s+/).filter(Boolean).slice(0, 2);

    if (parts.length === 0) {
      return 'NO';
    }

    return (
      parts
        .map((part) => part[0]?.toUpperCase() ?? '')
        .join('')
        .slice(0, 2) || 'NO'
    );
  }

  protected referralCountLabel(referral: ReferralViewDirectItem): string {
    return `${referral.directReferralsCount} прямых / ${referral.totalDescendantsCount} всего`;
  }

  protected levelBadgeStyle(level: number): Record<string, string> {
    const style = this.getAaaStyle(level - 1);

    return {
      background: style.bg,
      color: style.text,
    };
  }

  protected trackReferral(_: number, referral: ReferralViewDirectItem): string {
    return referral.id;
  }

  protected toggleMobileDetails(id: string): void {
    this.mobileExpanded.update((state) => ({ ...state, [id]: !state[id] }));
  }

  protected scrollBreadcrumbs(direction: 'left' | 'right'): void {
    const container = this.breadcrumbContainer()?.nativeElement;

    if (!container) {
      return;
    }

    container.scrollBy({
      left: direction === 'left' ? -180 : 180,
      behavior: 'smooth',
    });
  }

  protected onBreadcrumbScroll(): void {
    this.updateScrollMasks();
  }

  @HostListener('window:resize')
  protected onWindowResize(): void {
    this.scheduleBreadcrumbSync();
  }

  private loadAccount(): void {
    this.accountApi
      .getAccount()
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((account) => {
        this.account.set(account);
        this.loadReferralsPage(0);
      });
  }

  private loadReferralSummary(): void {
    this.partnersApi
      .getMyReferralSummary()
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => this.referralSummary.set(response));
  }

  private loadWithdrawalsOverview(): void {
    this.partnersApi
      .getWithdrawalsOverview()
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => this.withdrawalsOverview.set(response));
  }

  private loadReferralsPage(page: number): void {
    const accountId = this.currentParentId();

    if (!accountId) {
      return;
    }

    const sort = this.sort();

    this.partnersApi
      .getDirectReferrals({
        accountId,
        page,
        size: this.pageSize,
        sortField: sort.field,
        sortDirection: sort.direction,
        search: this.searchTerm(),
      })
      .pipe(takeUntilDestroyed(this.destroyRef))
      .subscribe((response) => this.referralsPage.set(response));
  }

  private scheduleBreadcrumbSync(scrollToEnd = false, delayed = false): void {
    if (this.breadcrumbSyncTimer) {
      clearTimeout(this.breadcrumbSyncTimer);
    }

    this.breadcrumbSyncTimer = setTimeout(
      () => {
        if (scrollToEnd) {
          this.scrollBreadcrumbsToEnd();
        }

        this.updateScrollMasks();
        this.breadcrumbSyncTimer = null;
      },
      delayed ? 50 : 0,
    );
  }

  private scrollBreadcrumbsToEnd(): void {
    const container = this.breadcrumbContainer()?.nativeElement;

    if (!container) {
      return;
    }

    container.scrollLeft = container.scrollWidth;
  }

  private updateScrollMasks(): void {
    const container = this.breadcrumbContainer()?.nativeElement;

    if (!container) {
      this.showLeftMask.set(false);
      this.showRightMask.set(false);
      return;
    }

    const maxScrollLeft = Math.max(0, container.scrollWidth - container.clientWidth);
    this.showLeftMask.set(container.scrollLeft > 4);
    this.showRightMask.set(container.scrollLeft < maxScrollLeft - 4);
  }

  private getAaaStyle(levelIndex: number): { bg: string; text: string } {
    const hue = (140 - (levelIndex % 23) * (360 / 23) + 360) % 360;
    const hex = this.hslToHex(hue, 80, 50);
    const rgb = this.hexToRgb(hex);

    if (!rgb) {
      return { bg: '#00B074', text: '#FFFFFF' };
    }

    const luminance = this.getLuminance(rgb.r, rgb.g, rgb.b);
    const whiteLuminance = this.getLuminance(255, 255, 255);
    const blackLuminance = this.getLuminance(0, 0, 0);

    if (this.getContrastRatio(luminance, whiteLuminance) >= 4.5) {
      return { bg: hex, text: '#FFFFFF' };
    }

    if (this.getContrastRatio(luminance, blackLuminance) >= 4.5) {
      return { bg: hex, text: '#000000' };
    }

    return { bg: '#00B074', text: '#FFFFFF' };
  }

  private hexToRgb(hex: string): { r: number; g: number; b: number } | null {
    const match = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);

    if (!match) {
      return null;
    }

    return {
      r: parseInt(match[1], 16),
      g: parseInt(match[2], 16),
      b: parseInt(match[3], 16),
    };
  }

  private getLuminance(r: number, g: number, b: number): number {
    const values = [r, g, b].map((value) => {
      const normalized = value / 255;
      return normalized <= 0.03928 ? normalized / 12.92 : ((normalized + 0.055) / 1.055) ** 2.4;
    });

    return values[0] * 0.2126 + values[1] * 0.7152 + values[2] * 0.0722;
  }

  private getContrastRatio(left: number, right: number): number {
    return (Math.max(left, right) + 0.05) / (Math.min(left, right) + 0.05);
  }

  private hslToHex(h: number, s: number, l: number): string {
    const normalizedLightness = l / 100;
    const amplitude = (s * Math.min(normalizedLightness, 1 - normalizedLightness)) / 100;
    const channel = (value: number) => {
      const key = (value + h / 30) % 12;
      const color = normalizedLightness - amplitude * Math.max(Math.min(key - 3, 9 - key, 1), -1);
      return Math.round(255 * color)
        .toString(16)
        .padStart(2, '0');
    };

    return `#${channel(0)}${channel(8)}${channel(4)}`;
  }
}
