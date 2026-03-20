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
      { label: 'Дашборд', icon: 'pi pi-th-large', route: '/dashboard' },
      { label: 'Инвестиции', icon: 'pi pi-briefcase', route: '/dashboard/investments' }
    ]
  },
  {
    title: 'Финансы',
    items: [
      { label: 'Кошелёк', icon: 'pi pi-wallet', route: '/dashboard/wallet' },
      { label: 'Выводы', icon: 'pi pi-arrow-up-right', route: '/dashboard/withdrawals' },
      { label: 'Отчёт', icon: 'pi pi-file', route: '/dashboard/report' }
    ]
  },
  {
    title: 'Аккаунт',
    items: [
      { label: 'Профиль', icon: 'pi pi-user', route: '/dashboard/profile' },
      { label: 'Рефералы', icon: 'pi pi-users', route: '/dashboard/partners' },
      { label: 'Настройки', icon: 'pi pi-cog', route: '/dashboard/settings' }
    ]
  }
];
