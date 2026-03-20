import { Briefcase, CircleArrowUp, CircleUser, FileText, LayoutDashboard, type LucideIconData, Settings, Users, Wallet } from 'lucide-angular';

export interface NavItem {
  label: string;
  icon: LucideIconData;
  route: string;
}

export interface NavGroup {
  title: string;
  items: NavItem[];
}

export const APP_NAVIGATION: NavGroup[] = [
  {
    title: 'Основное',
    items: [
      { label: 'Дашборд', icon: LayoutDashboard, route: '/dashboard' },
      { label: 'Инвестиции', icon: Briefcase, route: '/dashboard/investments' }
    ]
  },
  {
    title: 'Финансы',
    items: [
      { label: 'Кошелёк', icon: Wallet, route: '/dashboard/wallet' },
      { label: 'Выводы', icon: CircleArrowUp, route: '/dashboard/withdrawals' },
      { label: 'Отчёт', icon: FileText, route: '/dashboard/report' }
    ]
  },
  {
    title: 'Аккаунт',
    items: [
      { label: 'Профиль', icon: CircleUser, route: '/dashboard/profile' },
      { label: 'Рефералы', icon: Users, route: '/dashboard/partners' },
      { label: 'Настройки', icon: Settings, route: '/dashboard/settings' }
    ]
  }
];
