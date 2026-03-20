import { Routes } from '@angular/router';

import { DashboardPageComponent } from './features/dashboard/dashboard-page.component';

export const appRoutes: Routes = [
  { path: '', pathMatch: 'full', redirectTo: 'dashboard' },
  { path: 'dashboard', component: DashboardPageComponent },
  { path: 'dashboard/investments', component: DashboardPageComponent },
  { path: 'dashboard/wallet', component: DashboardPageComponent },
  { path: 'dashboard/withdrawals', component: DashboardPageComponent },
  { path: 'dashboard/report', component: DashboardPageComponent },
  { path: 'dashboard/profile', component: DashboardPageComponent },
  { path: 'dashboard/partners', component: DashboardPageComponent },
  { path: 'dashboard/settings', component: DashboardPageComponent },
  { path: '**', redirectTo: 'dashboard' }
];
