<?php
$newsItems = [
  ['title' => 'Открыт ранний раунд инвестиций', 'date' => '03.03.2026', 'category' => 'Инвестиции', 'excerpt' => 'В открытую продажу выведено только 15% долей. Это ограниченное окно для раннего входа.', 'link' => '#'],
  ['title' => 'Обновлена партнёрская программа с новой аналитикой уровней', 'date' => '28.02.2026', 'category' => 'Партнёрка', 'excerpt' => 'Сделали систему вознаграждений более прозрачной и понятной для новых участников, включая отчёты по динамике команды.', 'link' => '#'],
  ['title' => 'Запущен формат ежемесячных отчётов', 'date' => '21.02.2026', 'category' => 'Отчётность', 'excerpt' => 'Ключевые метрики развития теперь доступны в регулярных апдейтах, с акцентом на рост и структуру инвесторов.', 'link' => '#'],
  ['title' => 'Расширена география комитета', 'date' => '16.02.2026', 'category' => 'Комьюнити', 'excerpt' => 'В наблюдательный комитет вошли новые представители из разных стран и отраслей.', 'link' => '#'],
  ['title' => 'Юридический пакет обновлён', 'date' => '11.02.2026', 'category' => 'Правовая база', 'excerpt' => 'Актуализированы документы по долям, акционерной модели и пользовательским условиям.', 'link' => '#'],
  ['title' => 'Рост активности инвесторов +31%', 'date' => '05.02.2026', 'category' => 'Продукт', 'excerpt' => 'Увеличилось число новых подключений и повторных инвестиций. Показатели опубликованы в блоке новостей.', 'link' => '#'],
];

$faqGroups = [
  [
    'title' => 'Про инвестиции',
    'items' => [
      ['q' => 'Что я получаю, когда инвестирую?', 'a' => 'Вы получаете доли компании. Позже, по плану развития, эти доли переходят в акции.'],
      ['q' => 'Почему на продажу выставлено только 15%?', 'a' => 'Мы открыли ограниченный объём для раннего раунда, чтобы сохранить управляемую структуру капитала.'],
      ['q' => 'Какой сценарий после покупки долей?', 'a' => 'После завершения этапов развития и корпоративных процедур доли конвертируются в акции в рамках утверждённой модели.'],
    ],
  ],
  [
    'title' => 'Про реферальную программу',
    'items' => [
      ['q' => 'Что значит «до 40%» простыми словами?', 'a' => 'Первые три рекомендации дают вам 10%, 5% и 2%. Далее остаётся ещё часть вознаграждения, которая распределяется по вашей растущей структуре.'],
      ['q' => 'Если сеть очень глубокая?', 'a' => 'Доход не пропадает: оставшийся процент автоматически делится между более глубокими уровнями, чтобы система оставалась справедливой.'],
      ['q' => 'Это работает только для маленькой сети?', 'a' => 'Нет. Модель рассчитана и на небольшие, и на большие структуры — вы зарабатываете не только с ближних, но и с дальних уровней.'],
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

<style>
  .landing-grid-bg {
    background-image:
      linear-gradient(to right, rgba(113, 113, 122, 0.08) 1px, transparent 1px),
      linear-gradient(to bottom, rgba(113, 113, 122, 0.08) 1px, transparent 1px);
    background-size: 26px 26px;
  }

  .dark .landing-grid-bg {
    background-image:
      linear-gradient(to right, rgba(161, 161, 170, 0.1) 1px, transparent 1px),
      linear-gradient(to bottom, rgba(161, 161, 170, 0.1) 1px, transparent 1px);
  }
</style>

<main class="flex-1 overflow-y-auto bg-zinc-100 dark:bg-[#04070b]">
  <div class="mx-auto max-w-7xl px-4 lg:px-8 py-6 lg:py-10 space-y-7 lg:space-y-10">
    <section class="relative overflow-hidden rounded-3xl border border-zinc-200/80 dark:border-white/10 bg-white dark:bg-[#0b1219]">
      <div class="absolute inset-0 landing-grid-bg"></div>
      <div class="absolute -top-32 -left-16 h-72 w-72 rounded-full bg-emerald-400/20 blur-3xl"></div>
      <div class="absolute -bottom-20 -right-20 h-72 w-72 rounded-full bg-cyan-400/20 blur-3xl"></div>
      <div class="relative p-6 md:p-10 lg:p-12 grid gap-8 lg:grid-cols-[1.1fr_0.9fr] items-center">
        <div>
          <p class="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-emerald-500/10 px-3 py-1 text-xs uppercase tracking-[0.14em] font-semibold text-emerald-700 dark:text-emerald-300">DMR · новая версия лендинга</p>
          <h1 class="mt-4 text-3xl md:text-5xl font-bold tracking-tight text-zinc-900 dark:text-white leading-tight">Инвестиционная платформа с фокусом на рост капитала и прозрачную партнёрскую модель.</h1>
          <p class="mt-4 text-zinc-600 dark:text-zinc-300 md:text-lg leading-7 max-w-2xl">Обновили визуальный стиль, структуру блоков и акценты на главном: ограниченный ранний раунд, ясная механика рефералов и рабочие инструменты для управления командой и отчётностью.</p>
          <div class="mt-7 flex flex-wrap gap-3">
            <a href="investments.php" class="px-5 py-3 rounded-xl bg-accent text-white font-semibold hover:opacity-90">Инвестировать сейчас</a>
            <a href="#faq" class="px-5 py-3 rounded-xl border border-zinc-300 dark:border-white/20 bg-white/80 dark:bg-white/5 font-semibold text-zinc-800 dark:text-zinc-200">Частые вопросы</a>
          </div>
        </div>
        <div class="space-y-4">
          <div class="grid sm:grid-cols-2 gap-4">
            <div class="rounded-2xl border border-zinc-200 dark:border-white/10 bg-zinc-50 dark:bg-white/5 p-4">
              <p class="text-xs uppercase tracking-wide text-zinc-500">На продаже долей</p>
              <p class="mt-2 text-3xl font-bold text-zinc-900 dark:text-white">15%</p>
              <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-300">Ограниченный пул раннего раунда</p>
            </div>
            <div class="rounded-2xl border border-zinc-200 dark:border-white/10 bg-zinc-50 dark:bg-white/5 p-4">
              <p class="text-xs uppercase tracking-wide text-zinc-500">Реферальная модель</p>
              <p class="mt-2 text-3xl font-bold text-zinc-900 dark:text-white">до 40%</p>
              <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-300">С распределением по глубине сети</p>
            </div>
          </div>
          <div class="rounded-2xl border border-zinc-200 dark:border-white/10 bg-zinc-50 dark:bg-white/5 p-5">
            <p class="text-sm font-semibold text-zinc-900 dark:text-white">Что уже работает в кабинете:</p>
            <ul class="mt-3 space-y-2 text-sm text-zinc-600 dark:text-zinc-300">
              <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="mt-0.5 w-4 h-4 text-emerald-500"></i>Новости и апдейты проекта в формате ленты.</li>
              <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="mt-0.5 w-4 h-4 text-emerald-500"></i>Гибкая FAQ-секция с независимым раскрытием вопросов.</li>
              <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="mt-0.5 w-4 h-4 text-emerald-500"></i>Комитет на ~100 участников с фильтрами и карточками.</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="grid lg:grid-cols-3 gap-4">
      <div class="rounded-2xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#0e151d] p-5">
        <p class="text-xs uppercase tracking-wide text-zinc-500">Этап 1</p>
        <h3 class="mt-2 text-lg font-bold text-zinc-900 dark:text-white">Капитализация долей</h3>
        <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">Фиксируем вход ранних инвесторов и прозрачно формируем структуру владения.</p>
      </div>
      <div class="rounded-2xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#0e151d] p-5">
        <p class="text-xs uppercase tracking-wide text-zinc-500">Этап 2</p>
        <h3 class="mt-2 text-lg font-bold text-zinc-900 dark:text-white">Рост экосистемы</h3>
        <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">Усиливаем реферальный контур и аналитические инструменты внутри платформы.</p>
      </div>
      <div class="rounded-2xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#0e151d] p-5">
        <p class="text-xs uppercase tracking-wide text-zinc-500">Этап 3</p>
        <h3 class="mt-2 text-lg font-bold text-zinc-900 dark:text-white">Конверсия в акции</h3>
        <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">После корпоративных этапов доли переводятся в акции по утверждённой дорожной карте.</p>
      </div>
    </section>

    <section id="news" class="space-y-4">
      <div class="flex items-center justify-between gap-3">
        <div>
          <h2 class="text-2xl md:text-3xl font-bold text-zinc-900 dark:text-white">Новости проекта</h2>
          <p class="text-zinc-600 dark:text-zinc-300">6 последних обновлений команды и платформы.</p>
        </div>
        <div class="flex gap-2">
          <button data-news-prev class="w-9 h-9 rounded-lg border border-zinc-300 dark:border-white/15 bg-white dark:bg-white/5"><i data-lucide="chevron-left" class="w-4 h-4 mx-auto"></i></button>
          <button data-news-next class="w-9 h-9 rounded-lg border border-zinc-300 dark:border-white/15 bg-white dark:bg-white/5"><i data-lucide="chevron-right" class="w-4 h-4 mx-auto"></i></button>
        </div>
      </div>
      <div class="overflow-hidden">
        <div data-news-track class="flex transition-transform duration-300">
          <?php foreach ($newsItems as $news): ?>
            <article class="w-full md:w-1/2 xl:w-1/3 flex-shrink-0 p-1.5">
              <div class="h-full rounded-2xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#0e151d] p-5">
                <p class="text-xs text-zinc-500"><?= $news['date']; ?> · <?= $news['category']; ?></p>
                <h3 class="mt-3 text-lg font-bold text-zinc-900 dark:text-white leading-snug"><?= $news['title']; ?></h3>
                <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300 leading-6"><?= $news['excerpt']; ?></p>
                <a href="<?= $news['link']; ?>" class="mt-4 inline-flex text-sm font-semibold text-accent">Подробнее →</a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="faq" class="space-y-5">
      <div>
        <h2 class="text-2xl md:text-3xl font-bold text-zinc-900 dark:text-white">FAQ</h2>
      </div>
      <div class="flex flex-wrap gap-2">
        <?php foreach ($faqGroups as $i => $group): ?>
          <button
            data-faq-group-btn
            data-group-index="<?= $i; ?>"
            data-active="<?= $i === 0 ? 'true' : 'false'; ?>"
            class="px-4 py-2 rounded-xl text-sm font-semibold border transition-colors">
            <?= $group['title']; ?>
          </button>
        <?php endforeach; ?>
      </div>

      <?php foreach ($faqGroups as $i => $group): ?>
        <div data-faq-group-panel="<?= $i; ?>" class="space-y-3 <?= $i === 0 ? '' : 'hidden'; ?>">
          <?php foreach ($group['items'] as $item): ?>
            <div class="rounded-xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#0e151d] px-4">
              <button data-faq-btn data-open="false" class="w-full py-4 text-left flex items-center justify-between gap-2">
                <span class="font-semibold text-zinc-900 dark:text-white"><?= $item['q']; ?></span>
                <i data-lucide="chevron-down" class="w-5 h-5 text-accent transition-transform"></i>
              </button>
              <div data-faq-panel class="max-h-0 opacity-0 overflow-hidden transition-all duration-300">
                <p class="pb-4 text-zinc-600 dark:text-zinc-300 leading-7"><?= $item['a']; ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </section>

    <section id="committee" class="space-y-5">
      <div>
        <h2 class="text-2xl md:text-3xl font-bold text-zinc-900 dark:text-white">Наблюдательный комитет</h2>
        <p class="text-zinc-600 dark:text-zinc-300">Кликайте по аватару и фильтруйте по странам.</p>
      </div>

      <div id="committeePreview" class="grid gap-x-5 gap-y-5 [grid-template-columns:repeat(auto-fill,minmax(5.5rem,1fr))]"></div>
      <div class="flex justify-center">
        <button id="committeeLoadMore" class="px-5 py-2.5 rounded-xl bg-zinc-200 dark:bg-white/10 text-sm font-semibold hover:bg-zinc-300 dark:hover:bg-white/15">Показать ещё</button>
      </div>

      <div class="space-y-4 rounded-2xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#0e151d] p-4 md:p-5">
        <div class="relative max-w-sm">
          <p class="text-[11px] uppercase tracking-wider font-semibold text-zinc-500 mb-1.5">Select by country</p>
          <button id="countrySelectTrigger" type="button" class="w-full flex items-center justify-between gap-2 rounded-xl border border-zinc-200 dark:border-white/15 bg-white dark:bg-white/5 px-3 py-2 text-sm">
            <span class="flex items-center gap-2" id="countrySelectValue"><span class="text-base">🌍</span><span>Выберите страну</span></span>
            <i data-lucide="chevron-down" class="w-4 h-4 text-zinc-500"></i>
          </button>
          <div id="countrySelectMenu" class="hidden absolute z-20 mt-2 w-full rounded-xl border border-zinc-200 dark:border-white/15 bg-white dark:bg-[#11171c] shadow-xl max-h-64 overflow-auto"></div>
        </div>

        <div id="committeeCarouselWrap" class="hidden">
          <div class="flex justify-end gap-2 mb-2">
            <button class="w-9 h-9 rounded-lg border border-zinc-200 dark:border-white/15" data-committee-prev><i data-lucide="chevron-left" class="w-4 h-4 mx-auto"></i></button>
            <button class="w-9 h-9 rounded-lg border border-zinc-200 dark:border-white/15" data-committee-next><i data-lucide="chevron-right" class="w-4 h-4 mx-auto"></i></button>
          </div>
          <div class="overflow-hidden">
            <div id="committeeCarousel" class="flex transition-transform duration-300"></div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<div id="committeeModal" class="fixed inset-0 z-[90] hidden">
  <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" data-modal-close></div>
  <div class="absolute inset-0 p-4 flex items-center justify-center">
    <div class="w-full max-w-md rounded-xl bg-white dark:bg-[#111821] p-5 relative">
      <button class="absolute right-3 top-3 w-9 h-9 rounded-lg bg-zinc-100 dark:bg-white/10" data-modal-close><i data-lucide="x" class="w-4 h-4 mx-auto"></i></button>
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

    document.querySelectorAll('[data-faq-group-btn]').forEach((btn) => {
      const isActive = btn.dataset.active === 'true';
      btn.classList.toggle('bg-accent', isActive);
      btn.classList.toggle('text-white', isActive);
      btn.classList.toggle('border-accent', isActive);
      btn.classList.toggle('border-zinc-300', !isActive);
      btn.classList.toggle('dark:border-white/20', !isActive);

      btn.addEventListener('click', () => {
        const target = btn.dataset.groupIndex;
        document.querySelectorAll('[data-faq-group-btn]').forEach((b) => {
          const active = b === btn;
          b.dataset.active = active ? 'true' : 'false';
          b.classList.toggle('bg-accent', active);
          b.classList.toggle('text-white', active);
          b.classList.toggle('border-accent', active);
          b.classList.toggle('border-zinc-300', !active);
          b.classList.toggle('dark:border-white/20', !active);
        });

        document.querySelectorAll('[data-faq-group-panel]').forEach((panel) => {
          const active = panel.dataset.faqGroupPanel === target;
          panel.classList.toggle('hidden', !active);
          if (!active) {
            panel.querySelectorAll('[data-faq-btn]').forEach((qBtn) => {
              qBtn.dataset.open = 'false';
              qBtn.querySelector('i')?.classList.remove('rotate-180');
            });
            panel.querySelectorAll('[data-faq-panel]').forEach((ans) => {
              ans.style.maxHeight = '0px';
              ans.classList.add('opacity-0');
            });
          }
        });
      });
    });

    document.querySelectorAll('[data-faq-btn]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const panel = btn.nextElementSibling;
        const icon = btn.querySelector('i');
        const isOpen = btn.dataset.open === 'true';
        btn.dataset.open = isOpen ? 'false' : 'true';
        icon?.classList.toggle('rotate-180', !isOpen);
        panel.style.maxHeight = isOpen ? '0px' : `${panel.scrollHeight}px`;
        panel.classList.toggle('opacity-0', isOpen);
      });
    });

    const modal = document.getElementById('committeeModal');
    const modalBody = document.getElementById('committeeModalBody');
    const preview = document.getElementById('committeePreview');
    const loadMoreBtn = document.getElementById('committeeLoadMore');

    const countrySelectValue = document.getElementById('countrySelectValue');
    const countrySelectTrigger = document.getElementById('countrySelectTrigger');
    const countrySelectMenu = document.getElementById('countrySelectMenu');

    const carouselWrap = document.getElementById('committeeCarouselWrap');
    const carousel = document.getElementById('committeeCarousel');

    let previewCount = 0;
    const batch = 30;
    let filtered = [];
    let cIndex = 0;

    const memberCard = (m) => `
      <div class="min-w-full md:min-w-[50%] xl:min-w-[33.3333%] p-1.5">
        <div class="rounded-lg bg-zinc-50 dark:bg-white/5 p-4 h-full border border-zinc-200 dark:border-white/10">
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
          <div class="flex flex-wrap gap-2">${m.socialLinks.map((s) => `<a href="${s.url}" class="w-8 h-8 rounded-lg bg-white dark:bg-white/10 border border-zinc-200 dark:border-white/10 grid place-items-center"><i data-lucide="${socialIcon(s.type)}" class="w-4 h-4"></i></a>`).join('')}</div>
        </div>
      </div>`;

    const renderPreviewBatch = () => {
      const next = members.slice(previewCount, previewCount + batch);
      next.forEach((m) => {
        const btn = document.createElement('button');
        btn.className = 'group relative w-[92px] h-[92px] md:w-[100px] md:h-[100px] mx-auto rounded-xl overflow-hidden hover:-translate-y-0.5 transition-all';
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

    const countriesUnique = [...new Set(members.map((m) => m.country))].sort();
    countriesUnique.forEach((country) => {
      const first = members.find((m) => m.country === country);
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'w-full flex items-center gap-2 px-3 py-2 text-sm hover:bg-zinc-100 dark:hover:bg-white/5';
      btn.innerHTML = `<span class="text-base">${first?.countryFlag || '🌍'}</span><span>${country}</span>`;
      btn.addEventListener('click', () => {
        countrySelectValue.innerHTML = `<span class="text-base">${first?.countryFlag || '🌍'}</span><span>${country}</span>`;
        closeCountryMenu();
        filtered = members.filter((m) => m.country === country);
        cIndex = 0;
        carousel.innerHTML = filtered.map(memberCard).join('');
        updateCommitteeCarousel();
        if (window.lucide) window.lucide.createIcons();
      });
      countrySelectMenu.appendChild(btn);
    });

    const openCountryMenu = () => {
      countrySelectMenu.classList.remove('hidden');
      countrySelectMenu.classList.remove('bottom-full', 'mb-2');
      countrySelectMenu.classList.add('top-full', 'mt-2');

      const triggerRect = countrySelectTrigger.getBoundingClientRect();
      const estimatedHeight = Math.min(countrySelectMenu.scrollHeight || 256, 256);
      const spaceBelow = window.innerHeight - triggerRect.bottom;
      const spaceAbove = triggerRect.top;

      if (spaceBelow < estimatedHeight && spaceAbove > spaceBelow) {
        countrySelectMenu.classList.remove('top-full', 'mt-2');
        countrySelectMenu.classList.add('bottom-full', 'mb-2');
      }
    };

    const closeCountryMenu = () => {
      countrySelectMenu.classList.add('hidden');
    };

    countrySelectTrigger?.addEventListener('click', () => {
      if (countrySelectMenu.classList.contains('hidden')) openCountryMenu();
      else closeCountryMenu();
    });

    document.addEventListener('click', (e) => {
      if (!countrySelectTrigger?.contains(e.target) && !countrySelectMenu?.contains(e.target)) {
        closeCountryMenu();
      }
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

    document.querySelector('[data-committee-prev]')?.addEventListener('click', () => {
      cIndex = Math.max(0, cIndex - 1);
      updateCommitteeCarousel();
    });
    document.querySelector('[data-committee-next]')?.addEventListener('click', () => {
      const pages = Math.ceil(filtered.length / perViewCommittee());
      cIndex = Math.min(Math.max(0, pages - 1), cIndex + 1);
      updateCommitteeCarousel();
    });

    loadMoreBtn?.addEventListener('click', renderPreviewBatch);
    renderPreviewBatch();

    window.addEventListener('resize', () => {
      updateNews();
      updateCommitteeCarousel();
    });

    modal.querySelectorAll('[data-modal-close]').forEach((el) => el.addEventListener('click', () => modal.classList.add('hidden')));

    updateNews();
    if (window.lucide) window.lucide.createIcons();
  })();
</script>
