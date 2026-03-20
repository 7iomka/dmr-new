export interface NavItem {
  label: string;
  icon: string;
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
      { label: 'Дашборд', icon: 'layout-dashboard', route: '/dashboard' },
      { label: 'Инвестиции', icon: 'briefcase', route: '/dashboard/investments' }
    ]
  },
  {
    title: 'Финансы',
    items: [
      { label: 'Кошелёк', icon: 'wallet', route: '/dashboard/wallet' },
      { label: 'Выводы', icon: 'circle-arrow-up', route: '/dashboard/withdrawals' },
      { label: 'Отчёт', icon: 'file-text', route: '/dashboard/report' }
    ]
  },
  {
    title: 'Аккаунт',
    items: [
      { label: 'Профиль', icon: 'circle-user', route: '/dashboard/profile' },
      { label: 'Рефералы', icon: 'users', route: '/dashboard/partners' },
      { label: 'Настройки', icon: 'settings', route: '/dashboard/settings' }
    ]
  }
];
