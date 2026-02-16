import { Component } from '@angular/core';
import { NgFor } from '@angular/common';
import { PageHeaderComponent } from '../../shared/page-header.component';
import { StatCardComponent } from '../../shared/stat-card.component';
import { ActivityItem, ActivityListComponent } from '../../shared/activity-list.component';

@Component({
  selector: 'app-wallet-page',
  standalone: true,
  imports: [NgFor, PageHeaderComponent, StatCardComponent, ActivityListComponent],
  templateUrl: './wallet-page.component.html',
  styleUrl: './wallet-page.component.css'
})
export class WalletPageComponent {
  readonly walletStats = [
    { label: 'Wallet Balance', value: '$12,050', change: '+$235', isPositive: true },
    { label: 'Staking', value: '$5,200', change: '+$52', isPositive: true },
    { label: 'Locked', value: '$2,100', change: '$0', isPositive: false }
  ];

  readonly walletActivity: ActivityItem[] = [
    { title: 'USDT Transfer', meta: 'TRC20 • 1 мин назад', amount: '-250 USDT' },
    { title: 'Reward claim', meta: 'SOL staking', amount: '+3.25 SOL' },
    { title: 'Card top-up', meta: 'Visa • вчера', amount: '+$500' }
  ];

  readonly wallets = [
    { name: 'Main wallet', address: '0x8f31...a3c1', network: 'Ethereum' },
    { name: 'Trading wallet', address: 'TQ4n...1xzw', network: 'TRON' },
    { name: 'Cold wallet', address: 'bc1q...2pkj', network: 'Bitcoin' }
  ];
}
