import { type LucideIcon, LucideBriefcase, LucideCircleArrowUp, LucideCircleUser, LucideFileText, LucideHouse, LucideNewspaper, LucidePhone, LucideLayoutDashboard, LucideSettings, LucideUsers, LucideWallet } from '@lucide/angular';

export interface NavItem {
  label: string;
  icon: LucideIcon;
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
      { label: 'Дашборд', icon: LucideLayoutDashboard, route: '/dashboard' },
      { label: 'Инвестиции', icon: LucideBriefcase, route: '/investments' }
    ]
  },
  {
    title: 'Финансы',
    items: [
      { label: 'Кошелёк', icon: LucideWallet, route: '/wallet' },
      { label: 'Выводы', icon: LucideCircleArrowUp, route: '/withdrawals' },
      { label: 'Отчёт', icon: LucideFileText, route: '/report' }
    ]
  },
  {
    title: 'Аккаунт',
    items: [
      { label: 'Профиль', icon: LucideCircleUser, route: '/profile' },
      { label: 'Рефералы', icon: LucideUsers, route: '/referrals' },
      { label: 'Настройки', icon: LucideSettings, route: '/settings' }
    ]
  },
  {
    title: 'Информация',
    items: [
      { label: 'Главная', icon: LucideHouse, route: '/home' },
      { label: 'Новости', icon: LucideNewspaper, route: '/news' },
      { label: 'Контакты', icon: LucidePhone, route: '/contacts' }
    ]
  }
];

