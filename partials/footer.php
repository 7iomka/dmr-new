  <!-- ═══════════════════ FOOTER ═══════════════════ -->
  <footer class="app-footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a class="flex items-center shrink-0" href="/home.php">
            <img class="h-12 w-auto hidden dark:block" src="/img/logo-light.svg" alt="Logo">
            <img class="h-12 w-auto dark:hidden" src="/img/logo-dark.svg" alt="Logo">
          </a>
          <p>Инвестируйте в проект умного зеркала. Ранний раунд. Ограниченное количество долей.</p>
          <div class="footer-socials">
            <a href="#" class="footer-soc"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m22 2-7 20-4-9-9-4Z" />
                <path d="M22 2 11 13" />
              </svg></a>
            <a href="#" class="footer-soc"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
              </svg></a>
            <a href="#" class="footer-soc"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z" />
                <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" />
              </svg></a>
          </div>
        </div>
        <div class="footer-col">
          <h4>Навигация</h4>
          <ul>
            <li><a href="#">Dashboard Login</a></li>
            <li><a href="#">Affiliates Login</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Блог</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Поддержка</h4>
          <ul>
            <li><a href="#">Help Center</a></li>
            <li><a href="#">Refund Policy</a></li>
            <li><a href="#">Disclaimers</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Юридическое</h4>
          <ul>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Cookie Policy</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© 2026 Dilan Mirror Investment. All rights reserved.</p>
      </div>
    </div>
  </footer>
  <style type="text/tailwindcss">

    /* ── FOOTER ── */
  .app-footer {
    @apply border-t border-zinc-200 dark:border-zinc-800 bg-card;
    padding: 48px 0 32px;
  }

  .footer-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr 1fr;
    gap: 32px;
  }

  .footer-brand p {
    color: var(--color-muted-foreground);
    font-size: var(--text-sm);
    margin: 12px 0 20px;
    line-height: 1.7;
    max-width: 280px;
  }

  .footer-socials {
    display: flex;
    gap: 8px;
  }

  .footer-soc {
    width: 36px;
    height: 36px;
    border-radius: 9px;
    background: var(--color-surface-2);
    border: 1px solid var(--color-border);
    display: grid;
    place-items: center;
    text-decoration: none;
    transition: border-color .2s, background .2s;
  }

  .footer-soc:hover {
    @apply bg-primary/10 border-primary/50;
  }

  .footer-soc svg {
    width: 16px;
    height: 16px;
    color: var(--color-muted-foreground);
  }

  .footer-col h4 {
    font-family: var(--ff-head);
    font-weight: 700;
    font-size: var(--text-sm);
    margin-bottom: 16px;
    color: var(--text);
  }

  .footer-col ul {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .footer-col a {
    font-size: var(--text-sm);
    color: var(--color-muted-foreground);
    text-decoration: none;
    transition: color .15s;
  }

  .footer-col a:hover {
    color: var(--color-primary);
  }

  .footer-bottom {
    margin-top: 40px;
    padding-top: 24px;
    border-top: 1px solid var(--color-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .footer-bottom p {
    font-size: var(--text-xs);
    color: var(--color-muted-foreground);
  }
  </style>