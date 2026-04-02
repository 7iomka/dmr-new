import { Routes } from '@angular/router';

import { AuthPageComponent } from './features/auth/auth-page.component';
import { DashboardPageComponent } from './features/dashboard/dashboard-page.component';
import { InvestmentsPageComponent } from './features/investments/investments-page.component';
import { NotificationsPageComponent } from './features/notifications/notifications-page.component';
import { ChatPageComponent } from './features/chat/chat-page.component';
import { StubPageComponent } from './features/stubs/stub-page.component';
import { WalletPageComponent } from './features/wallet/wallet-page.component';

export const appRoutes: Routes = [
  { path: '', component: StubPageComponent, data: { title: 'Главная (Лендинг)' } },
  { path: 'dashboard', component: DashboardPageComponent },
  { path: 'auth', pathMatch: 'full', redirectTo: 'auth/login' },
  { path: 'auth/:mode', component: AuthPageComponent },
  { path: 'auth/:mode/:method', component: AuthPageComponent },
  { path: 'investments', component: InvestmentsPageComponent },
  { path: 'notifications', component: NotificationsPageComponent },
  { path: 'chat', component: ChatPageComponent },
  { path: 'chat/new', component: ChatPageComponent },
  { path: 'chat/conversation/:id', component: ChatPageComponent },
  { path: 'notifications/:id', component: NotificationsPageComponent },
  { path: 'wallet', component: WalletPageComponent },
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
