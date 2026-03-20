import { Routes } from '@angular/router';

import { DashboardPageComponent } from './features/dashboard/dashboard-page.component';
import { StubPageComponent } from './features/stubs/stub-page.component';

export const appRoutes: Routes = [
  { path: '', pathMatch: 'full', redirectTo: 'dashboard' },
  { path: 'dashboard', component: DashboardPageComponent },
  { path: 'investments', component: StubPageComponent, data: { title: 'Инвестиции' } },
  { path: 'wallet', component: StubPageComponent, data: { title: 'Кошелёк' } },
  { path: 'withdrawals', component: StubPageComponent, data: { title: 'Выводы' } },
  { path: 'report', component: StubPageComponent, data: { title: 'Отчёт' } },
  { path: 'profile', component: StubPageComponent, data: { title: 'Профиль' } },
  { path: 'referrals', component: StubPageComponent, data: { title: 'Рефералы' } },
  { path: 'settings', component: StubPageComponent, data: { title: 'Настройки' } },
  { path: 'home', component: StubPageComponent, data: { title: 'Главная' } },
  { path: 'news', component: StubPageComponent, data: { title: 'Новости' } },
  { path: 'contacts', component: StubPageComponent, data: { title: 'Контакты' } },
  { path: '**', redirectTo: 'dashboard' }
];
