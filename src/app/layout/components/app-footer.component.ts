import { Component, ViewEncapsulation } from '@angular/core';
import { RouterLink } from '@angular/router';
import { ButtonModule } from 'primeng/button';
import { SiInstagramIcon, SiTelegramIcon, SiYoutubeIcon } from '@semantic-icons/simple-icons';

type FooterLink = {
  label: string;
  href: string;
};

type SocialLink = {
  label: string;
  href: string;
  icon: 'telegram' | 'instagram' | 'youtube';
};

@Component({
  selector: 'app-footer',
  standalone: true,
  imports: [RouterLink, ButtonModule, SiTelegramIcon, SiInstagramIcon, SiYoutubeIcon],
  styleUrl: './app-footer.component.css',
  encapsulation: ViewEncapsulation.None,
  template: `
    <footer class="app-shell__footer app-footer">
      <div class="container app-footer__container">
        <div class="app-footer__grid">
          <section class="app-footer__brand">
            <a class="app-footer__logo" routerLink="/">
              <img alt="DMR" class="app-footer__logo-light" src="assets/img/logo-light.svg" />
              <img alt="DMR" class="app-footer__logo-dark" src="assets/img/logo-dark.svg" />
            </a>
            <p class="app-footer__brand-text">
              Инвестируйте в проект умного зеркала. Ранний раунд. Ограниченное количество долей.
            </p>

            <div class="app-footer__socials">
              @for (social of socialLinks; track social.label) {
                <a
                  class="app-footer__social-btn"
                  pButton
                  rel="noopener noreferrer"
                  severity="secondary"
                  target="_blank"
                  variant="outlined"
                  [attr.aria-label]="social.label"
                  [attr.title]="social.label"
                  [href]="social.href">
                  @switch (social.icon) {
                    @case ('telegram') {
                      <svg class="app-footer__social-icon" pButtonIcon siTelegramIcon></svg>
                    }
                    @case ('instagram') {
                      <svg class="app-footer__social-icon" pButtonIcon siInstagramIcon></svg>
                    }
                    @case ('youtube') {
                      <svg class="app-footer__social-icon" pButtonIcon siYoutubeIcon></svg>
                    }
                  }
                </a>
              }
            </div>
          </section>

          <section class="app-footer__col">
            <h4 class="app-footer__col-title">Навигация</h4>
            <span aria-hidden="true" class="app-footer__col-divider"></span>
            <ul class="app-footer__links">
              @for (link of navigationLinks; track link.href) {
                <li>
                  <a class="app-footer__link" [routerLink]="link.href">{{ link.label }}</a>
                </li>
              }
            </ul>
          </section>

          <section class="app-footer__col">
            <h4 class="app-footer__col-title">Информация</h4>
            <span aria-hidden="true" class="app-footer__col-divider"></span>
            <ul class="app-footer__links">
              @for (link of infoLinks; track link.href) {
                <li>
                  <a class="app-footer__link" [routerLink]="link.href">{{ link.label }}</a>
                </li>
              }
            </ul>
          </section>
        </div>

        <div class="app-footer__bottom">
          <p class="app-footer__copyright">© 2026 Dilan Mirror Investment. All rights reserved.</p>
        </div>
      </div>
    </footer>
  `,
})
export class AppFooterComponent {
  protected readonly socialLinks: readonly SocialLink[] = [
    { label: 'Telegram', href: 'https://telegram.org/', icon: 'telegram' },
    { label: 'Instagram', href: 'https://www.instagram.com/', icon: 'instagram' },
    { label: 'YouTube', href: 'https://www.youtube.com/', icon: 'youtube' },
  ];

  protected readonly navigationLinks: readonly FooterLink[] = [
    { label: 'Главная', href: '/' },
    { label: 'FAQ', href: '/faq' },
    { label: 'Связаться с нами', href: '/contacts' },
  ];

  protected readonly infoLinks: readonly FooterLink[] = [
    { label: 'Условия и положения', href: '/terms' },
    { label: 'Политика конфиденциальности', href: '/privacy' },
  ];
}
