import {
  LucideCode,
  type LucideIcon,
  LucideKey,
  LucideLock,
  LucideLogIn,
  LucideMail,
  LucideMessageCircle,
  LucidePhone,
  LucideSend,
  LucideShieldCheck,
  LucideShieldQuestionMark,
  LucideSmartphone,
  LucideUserPlus,
} from '@lucide/angular';

export type AuthChannel = 'phone' | 'email' | 'telegram' | 'whatsapp';

export type AuthMethodLink = {
  title: string;
  description: string;
  icon: LucideIcon;
  routerLink: string;
  primary?: boolean;
};

export type AuthField = {
  name: string;
  label: string;
  type: 'text' | 'email' | 'password' | 'tel';
  icon: LucideIcon;
  placeholder: string;
  optional?: boolean;
  autocomplete?: string;
};

export type AuthPageConfig = {
  icon: LucideIcon;
  title: string;
  subtitle: string;
  mode: 'selector' | 'form' | 'otp';
  submitLabel?: string;
  backLabel?: string;
  backLink?: string;
  links?: AuthMethodLink[];
  fields?: AuthField[];
  footerLinks?: { label: string; link: string; prefix?: string }[];
};

export const AUTH_PAGE_CONFIGS: Record<string, AuthPageConfig> = {
  login: {
    icon: LucideLogIn,
    title: 'Выберите способ входа',
    subtitle: 'Выберите предпочтительный способ аутентификации.',
    mode: 'selector',
    links: [
      {
        title: 'Телефон и пароль',
        description: 'Войти с номером телефона и паролем',
        icon: LucidePhone,
        routerLink: '/auth/login/password',
        primary: true,
      },
      {
        title: 'Email OTP',
        description: 'Код подтверждения на почту',
        icon: LucideMail,
        routerLink: '/auth/login/email',
      },
      {
        title: 'Telegram OTP',
        description: 'Код через Telegram-бот',
        icon: LucideSend,
        routerLink: '/auth/login/telegram',
      },
      {
        title: 'WhatsApp OTP',
        description: 'Код через WhatsApp',
        icon: LucideMessageCircle,
        routerLink: '/auth/login/whatsapp',
      },
    ],
    footerLinks: [
      { label: 'Забыли пароль?', link: '/auth/forgot' },
      { label: 'Зарегистрироваться', link: '/auth/register', prefix: 'Нет аккаунта? ' },
    ],
  },
  'login/password': {
    icon: LucideKey,
    title: 'Вход по телефону',
    subtitle: 'Введите номер телефона и пароль.',
    mode: 'form',
    submitLabel: 'Продолжить',
    backLabel: 'Назад',
    backLink: '/auth/login',
    fields: [
      {
        name: 'phone',
        label: 'Номер телефона',
        type: 'tel',
        icon: LucidePhone,
        placeholder: '+7 (999) 123-45-67',
        autocomplete: 'tel',
      },
      {
        name: 'password',
        label: 'Пароль',
        type: 'password',
        icon: LucideLock,
        placeholder: '••••••••',
        autocomplete: 'current-password',
      },
    ],
    footerLinks: [
      { label: 'Забыли пароль?', link: '/auth/forgot' },
      { label: 'Регистрация', link: '/auth/register' },
    ],
  },
  'login/email': {
    icon: LucideMail,
    title: 'Вход через Email OTP',
    subtitle: 'Мы отправим одноразовый код подтверждения на почту.',
    mode: 'form',
    submitLabel: 'Продолжить',
    backLabel: 'Назад',
    backLink: '/auth/login',
    fields: [
      {
        name: 'email',
        label: 'Email',
        type: 'email',
        icon: LucideMail,
        placeholder: 'name@example.com',
        autocomplete: 'email',
      },
    ],
    footerLinks: [
      { label: 'Забыли пароль?', link: '/auth/forgot' },
      { label: 'Регистрация', link: '/auth/register' },
    ],
  },
  'login/telegram': {
    icon: LucideSend,
    title: 'Вход через Telegram OTP',
    subtitle: 'Введите Telegram username или номер для получения кода.',
    mode: 'form',
    submitLabel: 'Продолжить',
    backLabel: 'Назад',
    backLink: '/auth/login',
    fields: [
      {
        name: 'telegram',
        label: 'Telegram',
        type: 'text',
        icon: LucideSend,
        placeholder: '@username или +7...',
        autocomplete: 'username',
      },
    ],
    footerLinks: [
      { label: 'Забыли пароль?', link: '/auth/forgot' },
      { label: 'Регистрация', link: '/auth/register' },
    ],
  },
  'login/whatsapp': {
    icon: LucideMessageCircle,
    title: 'Вход через WhatsApp OTP',
    subtitle: 'Введите WhatsApp номер для отправки одноразового кода.',
    mode: 'form',
    submitLabel: 'Продолжить',
    backLabel: 'Назад',
    backLink: '/auth/login',
    fields: [
      {
        name: 'whatsapp',
        label: 'WhatsApp',
        type: 'tel',
        icon: LucideMessageCircle,
        placeholder: '+7...',
        autocomplete: 'tel',
      },
    ],
    footerLinks: [
      { label: 'Забыли пароль?', link: '/auth/forgot' },
      { label: 'Регистрация', link: '/auth/register' },
    ],
  },
  register: {
    icon: LucideUserPlus,
    title: 'Выберите способ регистрации',
    subtitle: 'Создайте аккаунт через email или телефон.',
    mode: 'selector',
    links: [
      {
        title: 'Регистрация по телефону',
        description: 'Создайте аккаунт с номером телефона и паролем',
        icon: LucideSmartphone,
        routerLink: '/auth/register/phone',
        primary: true,
      },
      {
        title: 'Регистрация через Email',
        description: 'Код подтверждения будет отправлен на почту',
        icon: LucideMail,
        routerLink: '/auth/register/email',
      },
    ],
    footerLinks: [{ label: 'Войти', link: '/auth/login', prefix: 'Уже есть аккаунт? ' }],
  },
  'register/email': {
    icon: LucideUserPlus,
    title: 'Регистрация через Email',
    subtitle: 'Заполните данные, затем подтвердите код из письма.',
    mode: 'form',
    submitLabel: 'Продолжить',
    backLabel: 'Назад',
    backLink: '/auth/register',
    fields: [
      {
        name: 'email',
        label: 'Email',
        type: 'email',
        icon: LucideMail,
        placeholder: 'name@example.com',
        autocomplete: 'email',
      },
      {
        name: 'refCode',
        label: 'Реферальный код (необязательно)',
        type: 'text',
        icon: LucideCode,
        placeholder: 'Введите реферальный код',
        optional: true,
      },
    ],
    footerLinks: [{ label: 'Войти', link: '/auth/login', prefix: 'Уже есть аккаунт? ' }],
  },
  'register/phone': {
    icon: LucideSmartphone,
    title: 'Регистрация по телефону',
    subtitle: 'Введите данные аккаунта для демо-регистрации.',
    mode: 'form',
    submitLabel: 'Создать аккаунт',
    backLabel: 'Назад',
    backLink: '/auth/register',
    fields: [
      {
        name: 'phone',
        label: 'Номер телефона',
        type: 'tel',
        icon: LucidePhone,
        placeholder: '+7 (999) 123-45-67',
        autocomplete: 'tel',
      },
      {
        name: 'password',
        label: 'Пароль',
        type: 'password',
        icon: LucideLock,
        placeholder: 'Создайте пароль',
        autocomplete: 'new-password',
      },
      {
        name: 'confirmPassword',
        label: 'Подтвердите пароль',
        type: 'password',
        icon: LucideLock,
        placeholder: 'Повторите пароль',
        autocomplete: 'new-password',
      },
      {
        name: 'refCode',
        label: 'Реферальный код (необязательно)',
        type: 'text',
        icon: LucideCode,
        placeholder: 'Введите реферальный код',
        optional: true,
      },
    ],
    footerLinks: [{ label: 'Войти', link: '/auth/login', prefix: 'Уже есть аккаунт? ' }],
  },
  forgot: {
    icon: LucideShieldQuestionMark,
    title: 'Выберите способ восстановления',
    subtitle: 'Отправим код подтверждения удобным способом.',
    mode: 'selector',
    links: [
      {
        title: 'Email OTP',
        description: 'Код на почту',
        icon: LucideMail,
        routerLink: '/auth/forgot/email',
        primary: true,
      },
      {
        title: 'Telegram OTP',
        description: 'Код через Telegram',
        icon: LucideSend,
        routerLink: '/auth/forgot/telegram',
      },
      {
        title: 'WhatsApp OTP',
        description: 'Код через WhatsApp',
        icon: LucideMessageCircle,
        routerLink: '/auth/forgot/whatsapp',
      },
    ],
    footerLinks: [{ label: 'Вернуться ко входу', link: '/auth/login', prefix: 'Помните пароль? ' }],
  },
  'forgot/email': {
    icon: LucideMail,
    title: 'Сброс через Email',
    subtitle: 'Введите email для отправки кода подтверждения.',
    mode: 'form',
    submitLabel: 'Продолжить',
    backLabel: 'Назад',
    backLink: '/auth/forgot',
    fields: [
      {
        name: 'email',
        label: 'Email',
        type: 'email',
        icon: LucideMail,
        placeholder: 'name@example.com',
        autocomplete: 'email',
      },
    ],
    footerLinks: [{ label: 'Вернуться ко входу', link: '/auth/login', prefix: 'Помните пароль? ' }],
  },
  'forgot/telegram': {
    icon: LucideSend,
    title: 'Сброс через Telegram',
    subtitle: 'Введите Telegram username или номер для отправки кода.',
    mode: 'form',
    submitLabel: 'Продолжить',
    backLabel: 'Назад',
    backLink: '/auth/forgot',
    fields: [
      {
        name: 'telegram',
        label: 'Telegram',
        type: 'text',
        icon: LucideSend,
        placeholder: '@username или +7...',
        autocomplete: 'username',
      },
    ],
    footerLinks: [{ label: 'Вернуться ко входу', link: '/auth/login', prefix: 'Помните пароль? ' }],
  },
  'forgot/whatsapp': {
    icon: LucideMessageCircle,
    title: 'Сброс через WhatsApp',
    subtitle: 'Введите WhatsApp номер для отправки кода подтверждения.',
    mode: 'form',
    submitLabel: 'Продолжить',
    backLabel: 'Назад',
    backLink: '/auth/forgot',
    fields: [
      {
        name: 'whatsapp',
        label: 'WhatsApp',
        type: 'tel',
        icon: LucideMessageCircle,
        placeholder: '+7...',
        autocomplete: 'tel',
      },
    ],
    footerLinks: [{ label: 'Вернуться ко входу', link: '/auth/login', prefix: 'Помните пароль? ' }],
  },
  otp: {
    icon: LucideShieldCheck,
    title: 'Введите код подтверждения',
    subtitle: 'Код отправлен в выбранный канал. Введите 6 цифр.',
    mode: 'otp',
    submitLabel: 'Подтвердить',
    backLabel: 'Повторно отправить',
    backLink: '/auth/otp',
    footerLinks: [{ label: 'Использовать другой способ', link: '/auth/login' }],
  },
};

export const AUTH_PATH_TO_CHANNEL: Partial<Record<string, AuthChannel>> = {
  'login/password': 'phone',
  'login/email': 'email',
  'login/telegram': 'telegram',
  'login/whatsapp': 'whatsapp',
  'register/email': 'email',
  'register/phone': 'phone',
  'forgot/email': 'email',
  'forgot/telegram': 'telegram',
  'forgot/whatsapp': 'whatsapp',
};
