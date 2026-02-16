import { Routes } from '@angular/router';
import { DashboardPageComponent } from './pages/dashboard/dashboard-page.component';
import { WalletPageComponent } from './pages/wallet/wallet-page.component';

export const appRoutes: Routes = [
  { path: '', pathMatch: 'full', redirectTo: 'dashboard' },
  { path: 'dashboard', component: DashboardPageComponent },
  { path: 'wallet', component: WalletPageComponent },
  { path: '**', redirectTo: 'dashboard' }
];
