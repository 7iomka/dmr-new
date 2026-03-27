import { Routes } from '@angular/router';

import { AuthPageComponent } from './features/auth/auth-page.component';
import { DashboardPageComponent } from './features/dashboard/dashboard-page.component';
import { InvestmentsPageComponent } from './features/investments/investments-page.component';
import { StubPageComponent } from './features/stubs/stub-page.component';

export const appRoutes: Routes = [
  { path: '', component: StubPageComponent, data: { title: 'Главная (Лендинг)' } },
  { path: 'dashboard', component: DashboardPageComponent },
  { path: 'auth', pathMatch: 'full', redirectTo: 'auth/login' },
  { path: 'auth/:mode', component: AuthPageComponent },
  { path: 'auth/:mode/:method', component: AuthPageComponent },
  { path: 'investments', component: InvestmentsPageComponent },
  { path: 'wallet', component: StubPageComponent, data: { title: 'Кошелёк' } },
  { path: 'withdrawals', component: StubPageComponent, data: { title: 'Выводы' } },
  { path: 'report', component: StubPageComponent, data: { title: 'Отчёт' } },
  { path: 'profile', component: StubPageComponent, data: { title: 'Профиль' } },
  { path: 'referrals', component: StubPageComponent, data: { title: 'Рефералы' } },
  { path: 'settings', component: StubPageComponent, data: { title: 'Настройки' } },
  { path: 'home', component: StubPageComponent, data: { title: 'Главная' } },
  { path: 'news', component: StubPageComponent, data: { title: 'Новости' } },
  { path: 'contacts', component: StubPageComponent, data: { title: 'Связаться с нами' } },
  { path: 'faq', component: StubPageComponent, data: { title: 'FAQ' } },
  { path: 'terms', component: StubPageComponent, data: { title: 'Условия и положения' } },
  { path: 'privacy', component: StubPageComponent, data: { title: 'Политика конфиденциальности' } },
  { path: '**', redirectTo: '' },
];
