<?php
$newsItems = [
  ['title' => 'Открыт ранний раунд инвестиций', 'date' => '03.03.2026', 'category' => 'Инвестиции', 'excerpt' => 'В открытую продажу выведено только 15% долей. Это ограниченное окно для раннего входа.', 'link' => '#'],
  ['title' => 'Обновлена партнёрская программа', 'date' => '28.02.2026', 'category' => 'Партнёрка', 'excerpt' => 'Сделали систему вознаграждений более прозрачной и понятной для новых участников.', 'link' => '#'],
  ['title' => 'Запущен формат ежемесячных отчётов', 'date' => '21.02.2026', 'category' => 'Отчётность', 'excerpt' => 'Ключевые метрики развития теперь доступны в регулярных апдейтах.', 'link' => '#'],
  ['title' => 'Расширена география комитета', 'date' => '16.02.2026', 'category' => 'Комьюнити', 'excerpt' => 'В наблюдательный комитет вошли новые представители из разных стран.', 'link' => '#'],
  ['title' => 'Юридический пакет обновлён', 'date' => '11.02.2026', 'category' => 'Правовая база', 'excerpt' => 'Актуализированы документы по долям, акционерной модели и пользовательским условиям.', 'link' => '#'],
  ['title' => 'Рост активности инвесторов +31%', 'date' => '05.02.2026', 'category' => 'Продукт', 'excerpt' => 'Увеличилось число новых подключений и повторных инвестиций.', 'link' => '#'],
];

$faqGroups = [
  [
    'title' => 'Про инвестиции',
    'items' => [
      ['q' => 'Что я получаю, когда инвестирую?', 'a' => 'Вы получаете доли компании. Позже, по плану развития, эти доли переходят в акции.'],
      ['q' => 'Почему на продажу выставлено только 15%?', 'a' => 'Мы открыли ограниченный объём для раннего раунда, чтобы сохранить управляемую структуру капитала.'],
      ['q' => 'Кнопка «Инвестировать» уже рабочая?', 'a' => 'Пока это заглушка на будущую регистрацию. После запуска регистрации ссылка станет рабочей.'],
    ],
  ],
  [
    'title' => 'Про реферальную программу',
    'items' => [
      ['q' => 'Что значит «до 40%» простыми словами?', 'a' => 'Первые три рекомендации дают вам 10%, 5% и 2%. Дальше остаётся ещё до 23%, который распределяется по вашей расширяющейся сети.'],
      ['q' => 'Если сеть очень глубокая?', 'a' => 'Доход не пропадает: оставшийся процент автоматически делится между уровнями глубже, чтобы система оставалась справедливой.'],
      ['q' => 'Это работает только для маленькой сети?', 'a' => 'Нет, модель рассчитана и на небольшие, и на большие структуры. Вы зарабатываете как с близких, так и с дальних уровней.'],
    ],
  ],
  [
    'title' => 'Про платформу',
    'items' => [
      ['q' => 'Сколько новостей отображается на лендинге?', 'a' => 'Показываются 6 последних новостей, рядом есть ссылка на полный список.'],
      ['q' => 'Можно открывать несколько вопросов FAQ сразу?', 'a' => 'Да, аккордеон мульти-режима: можно раскрыть несколько ответов одновременно.'],
    ],
  ],
];
?>

<main class="flex-1 overflow-y-auto">
  <div class="px-4 lg:px-10 py-6 lg:py-10 space-y-12 lg:space-y-16">
    <section class="relative overflow-hidden rounded-[2.2rem] px-6 py-10 md:px-10 lg:px-14 lg:py-14 bg-[linear-gradient(135deg,#f8fffb_0%,#ecf8f3_35%,#edf3f8_100%)] dark:bg-[linear-gradient(135deg,#0d1317_0%,#0f1b17_38%,#0c1116_100%)]">
      <div class="absolute -left-20 -top-20 w-64 h-64 rounded-full bg-emerald-400/15 blur-3xl"></div>
      <div class="absolute -right-20 top-10 w-72 h-72 rounded-full bg-cyan-300/15 blur-3xl"></div>
      <div class="absolute inset-0 opacity-[0.18] bg-[radial-gradient(circle_at_20%_20%,#10b981_0%,transparent_50%),radial-gradient(circle_at_80%_30%,#22d3ee_0%,transparent_45%)]"></div>

      <div class="relative max-w-6xl mx-auto grid lg:grid-cols-[1.08fr_0.92fr] gap-10 items-center">
        <div class="space-y-5">
          <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/80 dark:bg-white/10 text-[11px] uppercase tracking-[0.16em] font-semibold text-emerald-700 dark:text-emerald-300">Round A • Limited Access</div>
          <h1 class="text-3xl md:text-5xl leading-tight font-bold text-zinc-900 dark:text-white">Инвестируйте в доли сейчас — получите акции на следующем этапе</h1>
          <p class="text-zinc-600 dark:text-zinc-300 max-w-2xl">Вы входите в проект на раннем этапе роста. Текущая инвестиция оформляется в долях, которые позже конвертируются в акции. В этом раунде в открытом доступе только <span class="font-bold text-zinc-900 dark:text-white">15% общего объёма</span>.</p>
          <div class="flex flex-wrap items-center gap-3">
            <a href="#" class="inline-flex items-center justify-center px-7 py-3 rounded-xl bg-accent text-white text-[11px] uppercase tracking-[0.12em] font-bold shadow-[0_12px_30px_rgba(0,176,116,0.35)] hover:-translate-y-0.5 transition-all">Инвестировать (регистрация)</a>
            <span class="text-xs text-zinc-500">временная ссылка-заглушка</span>
          </div>
        </div>

        <div class="relative">
          <div class="aspect-square max-w-[420px] mx-auto rounded-full border border-white/60 dark:border-white/15 bg-white/70 dark:bg-white/[0.04] backdrop-blur-md grid place-items-center">
            <div class="w-[76%] h-[76%] rounded-full border border-emerald-400/40 grid place-items-center relative">
              <div class="absolute inset-2 rounded-full border border-emerald-400/25"></div>
              <div class="text-center">
                <p class="text-xs uppercase tracking-wider text-zinc-500">Доступно сейчас</p>
                <p class="text-5xl md:text-6xl font-bold text-zinc-900 dark:text-white">15%</p>
                <p class="text-sm text-zinc-500">ограниченный пул</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-6xl mx-auto space-y-8">
      <div class="text-center space-y-3">
        <p class="text-[11px] uppercase tracking-[0.16em] text-accent font-semibold">Referral</p>
        <h2 class="text-2xl md:text-4xl font-bold">Реферальная программа «до 40%» — без сложной математики</h2>
        <p class="text-zinc-600 dark:text-zinc-300 max-w-3xl mx-auto">Мы сделали объяснение максимально простым: чем больше растёт ваша команда, тем шире распределяется вознаграждение, а общий лимит сохраняется прозрачным.</p>
      </div>

      <div class="grid lg:grid-cols-2 gap-6 lg:gap-10 items-start">
        <div class="space-y-4">
          <div class="flex items-center gap-3">
            <span class="w-9 h-9 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300 grid place-items-center font-bold">1</span>
            <p class="font-semibold">Первые три уровня дают фиксированный доход: <span class="font-bold">10% + 5% + 2%</span>.</p>
          </div>
          <div class="flex items-center gap-3">
            <span class="w-9 h-9 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300 grid place-items-center font-bold">2</span>
            <p class="font-semibold">После этого остаётся дополнительный процент — до <span class="font-bold">23%</span> — который идёт вглубь структуры.</p>
          </div>
          <div class="flex items-center gap-3">
            <span class="w-9 h-9 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300 grid place-items-center font-bold">3</span>
            <p class="font-semibold">Если уровней много, система автоматически делит вознаграждение между ними справедливо.</p>
          </div>
          <div class="pt-2 text-sm text-zinc-600 dark:text-zinc-300">Итог: вы получаете доход не только с ближайших приглашений, но и с дальнейшего развития вашей сети.</div>
        </div>

        <div class="relative rounded-[1.8rem] p-6 bg-[linear-gradient(155deg,rgba(16,185,129,.10),rgba(34,211,238,.08),rgba(255,255,255,.4))] dark:bg-[linear-gradient(155deg,rgba(16,185,129,.14),rgba(34,211,238,.08),rgba(255,255,255,.03))]">
          <p class="text-xs uppercase tracking-wider text-zinc-500 mb-4">Как это выглядит</p>
          <div class="space-y-4">
            <div>
              <div class="flex justify-between text-sm mb-1 font-semibold"><span>Ближайшие уровни</span><span>17%</span></div>
              <div class="h-3 rounded-full bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-[42.5%] bg-gradient-to-r from-emerald-500 to-emerald-400"></div></div>
            </div>
            <div>
              <div class="flex justify-between text-sm mb-1 font-semibold"><span>Глубина команды</span><span>до 23%</span></div>
              <div class="h-3 rounded-full bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-[57.5%] bg-gradient-to-r from-cyan-400 to-emerald-300"></div></div>
            </div>
            <div>
              <div class="flex justify-between text-sm mb-1 font-semibold"><span>Максимальный суммарный потолок</span><span>до 40%</span></div>
              <div class="h-3 rounded-full bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-full bg-gradient-to-r from-emerald-500 via-cyan-400 to-emerald-300"></div></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="news" class="max-w-6xl mx-auto space-y-4">
      <div class="flex items-center justify-between gap-4">
        <h2 class="text-2xl md:text-4xl font-bold">Последние новости и обновления</h2>
        <a href="#" class="text-xs md:text-sm uppercase tracking-wider font-semibold text-accent hover:underline">Все новости</a>
      </div>

      <div class="relative">
        <div class="overflow-hidden" data-news-viewport>
          <div class="flex transition-transform duration-300" data-news-track>
            <?php foreach ($newsItems as $item): ?>
              <article class="min-w-full md:min-w-[50%] xl:min-w-[33.3333%] p-2">
                <a href="<?= $item['link']; ?>" class="group block h-full">
                  <div class="h-48 rounded-[1.6rem] overflow-hidden relative bg-[linear-gradient(155deg,#eef7f3_0%,#e7f2f7_50%,#ffffff_100%)] dark:bg-[linear-gradient(155deg,#111a1f_0%,#0f1917_50%,#0c1116_100%)]">
                    <div class="absolute inset-0 opacity-40 bg-[radial-gradient(circle_at_20%_20%,#10b981_0%,transparent_45%),radial-gradient(circle_at_80%_40%,#22d3ee_0%,transparent_40%)]"></div>
                    <div class="absolute left-4 top-4 text-[10px] uppercase tracking-[0.14em] font-semibold px-2 py-1 rounded-full bg-white/70 dark:bg-black/35"><?= $item['category']; ?></div>
                    <div class="absolute inset-x-4 bottom-4 space-y-1.5">
                      <p class="text-[11px] text-zinc-500 font-semibold"><?= $item['date']; ?></p>
                      <h3 class="font-bold text-zinc-900 dark:text-white group-hover:text-accent transition-colors"><?= $item['title']; ?></h3>
                      <p class="text-sm text-zinc-600 dark:text-zinc-300"><?= $item['excerpt']; ?></p>
                    </div>
                  </div>
                </a>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="flex justify-end gap-2 mt-2">
          <button class="w-10 h-10 rounded-full border border-zinc-200 dark:border-white/15 hover:border-accent" data-news-prev><i data-lucide="arrow-left" class="w-4 h-4 mx-auto"></i></button>
          <button class="w-10 h-10 rounded-full border border-zinc-200 dark:border-white/15 hover:border-accent" data-news-next><i data-lucide="arrow-right" class="w-4 h-4 mx-auto"></i></button>
        </div>
      </div>
    </section>

    <section id="faq" class="max-w-6xl mx-auto grid lg:grid-cols-[0.9fr_1.1fr] gap-8 lg:gap-12 items-start">
      <div>
        <p class="text-[11px] uppercase tracking-[0.16em] text-accent font-semibold">FAQ</p>
        <h2 class="mt-2 text-2xl md:text-4xl font-bold">Ответы на частые вопросы</h2>
        <p class="mt-3 text-zinc-600 dark:text-zinc-300">Ниже собраны самые важные ответы по инвестициям, реферальной программе и работе платформы.</p>
      </div>
      <div class="space-y-4">
        <?php foreach ($faqGroups as $group): ?>
          <div class="rounded-[1.3rem] px-4 py-3 bg-zinc-50/70 dark:bg-white/[0.03]">
            <h3 class="text-xs uppercase tracking-[0.14em] font-semibold text-zinc-500 mb-2"><?= $group['title']; ?></h3>
            <div class="space-y-1.5">
              <?php foreach ($group['items'] as $item): ?>
                <div>
                  <button class="w-full flex items-center justify-between gap-3 px-2 py-2 text-left" data-faq-btn>
                    <span class="font-semibold text-sm text-zinc-900 dark:text-zinc-100"><?= $item['q']; ?></span>
                    <i data-lucide="plus" class="w-4 h-4 text-zinc-500 transition-transform"></i>
                  </button>
                  <div class="hidden px-2 pb-2 text-sm text-zinc-600 dark:text-zinc-300" data-faq-panel><?= $item['a']; ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="committee" class="max-w-6xl mx-auto space-y-6">
      <div class="flex flex-wrap items-end justify-between gap-3">
        <div>
          <h2 class="text-2xl md:text-4xl font-bold">Наблюдательный комитет</h2>
          <p class="text-zinc-600 dark:text-zinc-300 mt-1">Около 100 участников. Клик по аватару открывает подробную информацию.</p>
        </div>
      </div>

      <div id="committeePreview" class="grid gap-x-6 gap-y-6 [grid-template-columns:repeat(auto-fill,minmax(5.5rem,1fr))]"></div>
      <div class="flex justify-center">
        <button id="committeeLoadMore" class="px-5 py-2.5 rounded-full bg-zinc-100 dark:bg-white/10 text-sm font-semibold hover:bg-zinc-200 dark:hover:bg-white/15">Показать ещё</button>
      </div>

      <div class="grid md:grid-cols-[280px_1fr] gap-4 items-start">
        <div>
          <label for="committeeCountry" class="text-[11px] uppercase tracking-wider font-semibold text-zinc-500">Select by country</label>
          <select id="committeeCountry" class="mt-2 w-full rounded-xl border border-zinc-200 dark:border-white/15 bg-white/70 dark:bg-white/5 px-3 py-2 text-sm">
            <option value="">Выберите страну</option>
          </select>
        </div>

        <div id="committeeCarouselWrap" class="hidden">
          <div class="flex justify-end gap-2 mb-2">
            <button class="w-9 h-9 rounded-full border border-zinc-200 dark:border-white/15" data-committee-prev><i data-lucide="chevron-left" class="w-4 h-4 mx-auto"></i></button>
            <button class="w-9 h-9 rounded-full border border-zinc-200 dark:border-white/15" data-committee-next><i data-lucide="chevron-right" class="w-4 h-4 mx-auto"></i></button>
          </div>
          <div class="overflow-hidden">
            <div id="committeeCarousel" class="flex transition-transform duration-300"></div>
          </div>
        </div>
      </div>
    </section>

    <footer class="max-w-6xl mx-auto pt-2 pb-8 border-t border-zinc-200 dark:border-white/10">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 pt-5">
        <div class="flex flex-wrap gap-4 text-sm font-semibold">
          <a href="#" class="hover:text-accent">Terms and Conditions</a>
          <a href="#" class="hover:text-accent">Privacy Policy</a>
          <a href="#" class="hover:text-accent">Contact Us</a>
        </div>
        <p class="text-xs text-zinc-500">© <?= date('Y'); ?> Dilan Mirror Investment. All rights reserved.</p>
      </div>
    </footer>
  </div>
</main>

<div id="committeeModal" class="fixed inset-0 z-[90] hidden">
  <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" data-modal-close></div>
  <div class="absolute inset-0 p-4 flex items-center justify-center">
    <div class="w-full max-w-md rounded-[1.6rem] bg-white dark:bg-[#111821] p-5 relative">
      <button class="absolute right-3 top-3 w-9 h-9 rounded-full bg-zinc-100 dark:bg-white/10" data-modal-close><i data-lucide="x" class="w-4 h-4 mx-auto"></i></button>
      <div id="committeeModalBody"></div>
    </div>
  </div>
</div>

<script>
  (() => {
    const members = [];
    const firstNames = ['Alex', 'Maria', 'Ivan', 'Sofia', 'Dmitry', 'Nora', 'Liam', 'Emma', 'Noah', 'Olivia'];
    const lastNames = ['Petrov', 'Johnson', 'Miller', 'Smirnova', 'Kim', 'Brown', 'Garcia', 'Wilson', 'Taylor', 'Lee'];
    const countries = [
      { country: 'Russia', city: 'Moscow', flag: '🇷🇺' },
      { country: 'Germany', city: 'Berlin', flag: '🇩🇪' },
      { country: 'France', city: 'Paris', flag: '🇫🇷' },
      { country: 'USA', city: 'New York', flag: '🇺🇸' },
      { country: 'UAE', city: 'Dubai', flag: '🇦🇪' },
      { country: 'Turkey', city: 'Istanbul', flag: '🇹🇷' },
      { country: 'Kazakhstan', city: 'Astana', flag: '🇰🇿' },
      { country: 'Spain', city: 'Madrid', flag: '🇪🇸' },
      { country: 'Portugal', city: 'Lisbon', flag: '🇵🇹' },
      { country: 'Italy', city: 'Milan', flag: '🇮🇹' }
    ];
    const socials = ['telegram', 'linkedin', 'twitter', 'facebook', 'instagram', 'vk'];

    for (let i = 1; i <= 100; i++) {
      const c = countries[i % countries.length];
      members.push({
        avatar: `https://i.pravatar.cc/160?img=${(i % 70) + 1}`,
        city: c.city,
        country: c.country,
        countryFlag: c.flag,
        firstName: firstNames[i % firstNames.length],
        lastName: lastNames[(i * 2) % lastNames.length],
        legacyId: 7000 + i,
        socialLinks: socials.slice(0, 1 + (i % 3)).map((type) => ({ type, url: '#' }))
      });
    }

    const socialIcon = (type) => ({ telegram: 'send', linkedin: 'linkedin', twitter: 'twitter', facebook: 'facebook', instagram: 'instagram', vk: 'circle' }[type] || 'link');

    const newsTrack = document.querySelector('[data-news-track]');
    const newsCards = newsTrack ? Array.from(newsTrack.children) : [];
    let newsPage = 0;
    const cardsPerView = () => window.innerWidth >= 1280 ? 3 : (window.innerWidth >= 768 ? 2 : 1);
    const maxNewsPage = () => Math.max(0, Math.ceil(newsCards.length / cardsPerView()) - 1);
    const updateNews = () => {
      if (!newsTrack) return;
      newsPage = Math.min(newsPage, maxNewsPage());
      newsTrack.style.transform = `translateX(-${newsPage * 100}%)`;
    };

    document.querySelector('[data-news-prev]')?.addEventListener('click', () => {
      newsPage = Math.max(0, newsPage - 1);
      updateNews();
    });
    document.querySelector('[data-news-next]')?.addEventListener('click', () => {
      newsPage = Math.min(maxNewsPage(), newsPage + 1);
      updateNews();
    });

    document.querySelectorAll('[data-faq-btn]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const panel = btn.parentElement.querySelector('[data-faq-panel]');
        const icon = btn.querySelector('i');
        panel.classList.toggle('hidden');
        icon.classList.toggle('rotate-45');
      });
    });

    const preview = document.getElementById('committeePreview');
    const loadMoreBtn = document.getElementById('committeeLoadMore');
    const modal = document.getElementById('committeeModal');
    const modalBody = document.getElementById('committeeModalBody');
    const countrySelect = document.getElementById('committeeCountry');
    const carouselWrap = document.getElementById('committeeCarouselWrap');
    const carousel = document.getElementById('committeeCarousel');
    let previewCount = 0;
    const batch = 30;
    let filtered = [];
    let cIndex = 0;

    const memberCard = (m) => `
      <div class="min-w-full md:min-w-[50%] xl:min-w-[33.3333%] p-1.5">
        <div class="rounded-[1.1rem] bg-zinc-50 dark:bg-white/5 p-4 h-full">
          <div class="flex gap-3 items-center mb-3">
            <div class="relative">
              <img src="${m.avatar}" alt="${m.firstName}" class="w-14 h-14 rounded-full object-cover">
              <span class="absolute -bottom-1 -right-1 text-base">${m.countryFlag}</span>
            </div>
            <div>
              <p class="font-bold text-zinc-900 dark:text-white">${m.firstName} ${m.lastName}</p>
              <p class="text-xs text-zinc-500">${m.city}, ${m.country}</p>
              <p class="text-xs text-zinc-500 font-semibold">ID: ${m.legacyId}</p>
            </div>
          </div>
          <div class="flex flex-wrap gap-2">${m.socialLinks.map((s) => `<a href="${s.url}" class="w-8 h-8 rounded-lg bg-white dark:bg-white/10 grid place-items-center"><i data-lucide="${socialIcon(s.type)}" class="w-4 h-4"></i></a>`).join('')}</div>
        </div>
      </div>`;

    const renderPreviewBatch = () => {
      const next = members.slice(previewCount, previewCount + batch);
      next.forEach((m) => {
        const btn = document.createElement('button');
        btn.className = 'group relative w-[92px] h-[92px] md:w-[100px] md:h-[100px] mx-auto rounded-2xl overflow-hidden hover:-translate-y-0.5 transition-all';
        btn.innerHTML = `<img src="${m.avatar}" alt="${m.firstName}" class="w-full h-full object-cover"><span class="absolute bottom-1 right-1 text-lg">${m.countryFlag}</span><span class="absolute inset-0 opacity-0 group-hover:opacity-100 bg-gradient-to-t from-black/35 to-transparent transition-opacity"></span>`;
        btn.addEventListener('click', () => {
          modalBody.innerHTML = memberCard(m).replace('min-w-full md:min-w-[50%] xl:min-w-[33.3333%] p-1.5', '');
          modal.classList.remove('hidden');
          if (window.lucide) window.lucide.createIcons();
        });
        preview.appendChild(btn);
      });
      previewCount += next.length;
      if (previewCount >= members.length) loadMoreBtn.classList.add('hidden');
      if (window.lucide) window.lucide.createIcons();
    };

    loadMoreBtn?.addEventListener('click', renderPreviewBatch);
    renderPreviewBatch();

    [...new Set(members.map((m) => m.country))].sort().forEach((country) => {
      const option = document.createElement('option');
      option.value = country;
      option.textContent = country;
      countrySelect.appendChild(option);
    });

    const perViewCommittee = () => window.innerWidth >= 1280 ? 3 : (window.innerWidth >= 768 ? 2 : 1);
    const updateCommitteeCarousel = () => {
      if (!filtered.length) {
        carouselWrap.classList.add('hidden');
        return;
      }
      const pages = Math.ceil(filtered.length / perViewCommittee());
      cIndex = Math.min(cIndex, Math.max(0, pages - 1));
      carouselWrap.classList.remove('hidden');
      carousel.style.transform = `translateX(-${cIndex * 100}%)`;
    };

    countrySelect.addEventListener('change', (e) => {
      const value = e.target.value;
      filtered = value ? members.filter((m) => m.country === value) : [];
      cIndex = 0;
      carousel.innerHTML = filtered.map(memberCard).join('');
      updateCommitteeCarousel();
      if (window.lucide) window.lucide.createIcons();
    });

    document.querySelector('[data-committee-prev]')?.addEventListener('click', () => {
      cIndex = Math.max(0, cIndex - 1);
      updateCommitteeCarousel();
    });
    document.querySelector('[data-committee-next]')?.addEventListener('click', () => {
      const pages = Math.ceil(filtered.length / perViewCommittee());
      cIndex = Math.min(Math.max(0, pages - 1), cIndex + 1);
      updateCommitteeCarousel();
    });

    window.addEventListener('resize', () => {
      updateNews();
      updateCommitteeCarousel();
    });

    modal.querySelectorAll('[data-modal-close]').forEach((el) => el.addEventListener('click', () => modal.classList.add('hidden')));

    updateNews();
    if (window.lucide) window.lucide.createIcons();
  })();
</script>
