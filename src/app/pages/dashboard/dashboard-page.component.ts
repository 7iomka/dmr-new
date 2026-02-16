import { Component } from '@angular/core';
import { NgFor } from '@angular/common';
import { PageHeaderComponent } from '../../shared/page-header.component';
import { StatCardComponent } from '../../shared/stat-card.component';
import { ActivityItem, ActivityListComponent } from '../../shared/activity-list.component';

@Component({
  selector: 'app-dashboard-page',
  standalone: true,
  imports: [NgFor, PageHeaderComponent, StatCardComponent, ActivityListComponent],
  templateUrl: './dashboard-page.component.html',
  styleUrl: './dashboard-page.component.css'
})
export class DashboardPageComponent {
  readonly stats = [
    { label: 'Общий баланс', value: '$128,430', change: '+4.2%', isPositive: true },
    { label: 'Инвестировано', value: '$87,912', change: '+1.1%', isPositive: true },
    { label: 'Доступно', value: '$40,518', change: '-0.3%', isPositive: false }
  ];

  readonly activity: ActivityItem[] = [
    { title: 'Покупка BTC', meta: 'Сегодня, 11:20', amount: '-$1,200' },
    { title: 'Продажа ETH', meta: 'Вчера, 20:45', amount: '+$840' },
    { title: 'Пополнение', meta: '13 фев, 15:00', amount: '+$3,000' }
  ];
}
