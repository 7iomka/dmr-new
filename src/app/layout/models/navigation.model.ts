import {
  LucideBriefcase,
  LucideCircleArrowUp,
  LucideCircleUser,
  LucideFileText,
  LucideHouse,
  type LucideIcon,
  LucideLayoutDashboard,
  LucideMessageCircle,
  LucideNewspaper,
  LucidePhone,
  LucideSettings,
  LucideUsers,
  LucideWallet,
} from '@lucide/angular';

export type NavItem = {
  label: string;
  icon: LucideIcon;
  route: string;
};

export type NavGroup = {
  title: string;
  items: NavItem[];
};

export const APP_NAVIGATION: NavGroup[] = [
  {
    title: 'Основное',
    items: [
      { label: 'Дашборд', icon: LucideLayoutDashboard, route: '/dashboard' },
      { label: 'Инвестиции', icon: LucideBriefcase, route: '/investments' },
    ],
  },
  {
    title: 'Финансы',
    items: [
      { label: 'Кошелёк', icon: LucideWallet, route: '/wallet' },
      { label: 'Выводы', icon: LucideCircleArrowUp, route: '/withdrawals' },
      { label: 'Отчёт', icon: LucideFileText, route: '/report' },
    ],
  },
  {
    title: 'Аккаунт',
    items: [
      { label: 'Профиль', icon: LucideCircleUser, route: '/profile' },
      { label: 'Рефералы', icon: LucideUsers, route: '/partners' },
      { label: 'Настройки', icon: LucideSettings, route: '/settings' },
      { label: 'Чат поддержки', icon: LucideMessageCircle, route: '/chat' },
    ],
  },
  {
    title: 'Информация',
    items: [
      { label: 'Главная', icon: LucideHouse, route: '/home' },
      { label: 'Новости', icon: LucideNewspaper, route: '/news' },
      { label: 'Контакты', icon: LucidePhone, route: '/contacts' },
    ],
  },
];
