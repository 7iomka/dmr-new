import { Briefcase, CircleArrowUp, CircleUser, FileText, Home, Newspaper, Phone, LayoutDashboard, type LucideIconData, Settings, Users, Wallet } from 'lucide-angular';

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
      { label: 'Инвестиции', icon: Briefcase, route: '/investments' }
    ]
  },
  {
    title: 'Финансы',
    items: [
      { label: 'Кошелёк', icon: Wallet, route: '/wallet' },
      { label: 'Выводы', icon: CircleArrowUp, route: '/withdrawals' },
      { label: 'Отчёт', icon: FileText, route: '/report' }
    ]
  },
  {
    title: 'Аккаунт',
    items: [
      { label: 'Профиль', icon: CircleUser, route: '/profile' },
      { label: 'Рефералы', icon: Users, route: '/referrals' },
      { label: 'Настройки', icon: Settings, route: '/settings' }
    ]
  },
  {
    title: 'Информация',
    items: [
      { label: 'Главная', icon: Home, route: '/home' },
      { label: 'Новости', icon: Newspaper, route: '/news' },
      { label: 'Контакты', icon: Phone, route: '/contacts' }
    ]
  }
];
