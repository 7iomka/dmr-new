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
  .landing-glow::before {
    content: '';
    position: absolute;
    inset: -30% auto auto -10%;
    width: 380px;
    height: 380px;
    background: radial-gradient(circle, rgba(16,185,129,.25), transparent 65%);
    pointer-events: none;
    filter: blur(4px);
  }

  .landing-glow::after {
    content: '';
    position: absolute;
    inset: auto -14% -34% auto;
    width: 420px;
    height: 420px;
    background: radial-gradient(circle, rgba(59,130,246,.2), transparent 64%);
    pointer-events: none;
  }
</style>

<main class="flex-1 overflow-y-auto bg-zinc-50 dark:bg-[#03070c]">
  <div class="px-4 lg:px-8 xl:px-10 py-6 lg:py-10 space-y-10 lg:space-y-14">
    <section class="landing-glow relative overflow-hidden rounded-3xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#060d14]">
      <div class="relative z-10 p-6 md:p-10 lg:p-12 grid lg:grid-cols-[1.2fr_0.8fr] gap-8 lg:gap-12 items-center">
        <div>
          <p class="inline-flex items-center gap-2 rounded-full border border-accent/40 bg-accent/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-accent">DMR investment platform</p>
          <h1 class="mt-5 text-3xl md:text-5xl font-bold leading-tight text-zinc-900 dark:text-white">Инвестируйте в компанию на раннем этапе <span class="text-accent">и масштабируйте доход с командой.</span></h1>
          <p class="mt-5 max-w-2xl text-zinc-600 dark:text-zinc-300 text-base md:text-lg leading-7">Полностью обновлённый лендинг без сайдбара: акцент на капитализацию долей, прозрачную реферальную модель и понятные инструменты внутри кабинета.</p>
          <div class="mt-8 flex flex-wrap gap-3">
            <a href="/investments.php" class="px-6 py-3 rounded-xl bg-accent text-white font-semibold hover:brightness-95 transition">Начать инвестировать</a>
            <a href="#faq" class="px-6 py-3 rounded-xl border border-zinc-300 dark:border-white/20 font-semibold text-zinc-700 dark:text-zinc-100 hover:bg-zinc-100 dark:hover:bg-white/10 transition">Частые вопросы</a>
          </div>
          <div class="mt-8 grid sm:grid-cols-3 gap-3">
            <div class="rounded-xl border border-zinc-200 dark:border-white/10 bg-zinc-50 dark:bg-white/5 px-4 py-3">
              <p class="text-xs uppercase tracking-wider text-zinc-500">Раунд</p>
              <p class="mt-1 text-xl font-bold text-zinc-900 dark:text-white">15% долей</p>
            </div>
            <div class="rounded-xl border border-zinc-200 dark:border-white/10 bg-zinc-50 dark:bg-white/5 px-4 py-3">
              <p class="text-xs uppercase tracking-wider text-zinc-500">Реферальная сеть</p>
              <p class="mt-1 text-xl font-bold text-zinc-900 dark:text-white">До 40%</p>
            </div>
            <div class="rounded-xl border border-zinc-200 dark:border-white/10 bg-zinc-50 dark:bg-white/5 px-4 py-3">
              <p class="text-xs uppercase tracking-wider text-zinc-500">Комитет</p>
              <p class="mt-1 text-xl font-bold text-zinc-900 dark:text-white">100+ участников</p>
            </div>
          </div>
        </div>
        <div class="space-y-3">
          <div class="rounded-2xl border border-zinc-200 dark:border-white/10 bg-gradient-to-br from-zinc-100 to-white dark:from-[#0a141f] dark:to-[#08111a] p-5">
            <p class="text-xs uppercase tracking-wider text-zinc-500">Путь инвестора</p>
            <ol class="mt-4 space-y-3 text-sm md:text-base">
              <li class="flex items-start gap-3"><span class="w-7 h-7 shrink-0 rounded-lg bg-accent/15 text-accent grid place-items-center font-bold">1</span><span class="text-zinc-700 dark:text-zinc-200">Выбираете объём долей и фиксируете вход в раунд.</span></li>
              <li class="flex items-start gap-3"><span class="w-7 h-7 shrink-0 rounded-lg bg-accent/15 text-accent grid place-items-center font-bold">2</span><span class="text-zinc-700 dark:text-zinc-200">Следите за динамикой через отчёты и публичные метрики.</span></li>
              <li class="flex items-start gap-3"><span class="w-7 h-7 shrink-0 rounded-lg bg-accent/15 text-accent grid place-items-center font-bold">3</span><span class="text-zinc-700 dark:text-zinc-200">Строите партнёрскую структуру и усиливаете общий доход.</span></li>
            </ol>
          </div>
          <div class="rounded-2xl border border-zinc-200 dark:border-white/10 bg-zinc-50 dark:bg-white/5 p-5">
            <p class="text-sm text-zinc-600 dark:text-zinc-300">Система адаптирована под <span class="font-semibold text-zinc-900 dark:text-white">светлую и тёмную темы</span> с проверенным контрастом, чтобы ключевые CTA и текст легко читались в любом режиме.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-7xl mx-auto space-y-5">
      <div class="flex items-end justify-between gap-3">
        <div>
          <h2 class="text-2xl md:text-4xl font-bold text-zinc-900 dark:text-white">Последние новости</h2>
          <p class="text-zinc-600 dark:text-zinc-300 mt-1">Рабочий слайдер сохранён, визуальная подача обновлена.</p>
        </div>
        <div class="flex gap-2">
          <button class="w-10 h-10 rounded-xl border border-zinc-300 dark:border-white/20 hover:bg-zinc-100 dark:hover:bg-white/10" data-news-prev><i data-lucide="chevron-left" class="w-4 h-4 mx-auto"></i></button>
          <button class="w-10 h-10 rounded-xl border border-zinc-300 dark:border-white/20 hover:bg-zinc-100 dark:hover:bg-white/10" data-news-next><i data-lucide="chevron-right" class="w-4 h-4 mx-auto"></i></button>
        </div>
      </div>

      <div class="overflow-hidden">
        <div data-news-track class="flex transition-transform duration-300 ease-out">
          <?php foreach ($newsItems as $item): ?>
            <article class="w-full md:w-1/2 xl:w-1/3 shrink-0 p-1.5">
              <a href="<?= $item['link']; ?>" class="h-full block rounded-2xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#060f17] p-5 hover:-translate-y-1 transition-transform">
                <div class="flex items-center justify-between gap-2 text-xs uppercase tracking-wider">
                  <span class="text-accent font-semibold"><?= $item['category']; ?></span>
                  <time class="text-zinc-500"><?= $item['date']; ?></time>
                </div>
                <h3 class="mt-3 text-lg font-bold text-zinc-900 dark:text-white leading-snug"><?= $item['title']; ?></h3>
                <p class="mt-3 text-sm leading-6 text-zinc-600 dark:text-zinc-300"><?= $item['excerpt']; ?></p>
              </a>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="faq" class="max-w-7xl mx-auto rounded-3xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#060f17] p-5 md:p-8">
      <div class="flex flex-wrap items-center gap-2 mb-6">
        <?php foreach ($faqGroups as $groupIndex => $group): ?>
          <button
            class="px-4 py-2 rounded-xl border text-sm md:text-base font-semibold transition"
            data-faq-group-btn
            data-group-index="<?= $groupIndex; ?>"
            data-active="<?= $groupIndex === 0 ? 'true' : 'false'; ?>"
          >
            <?= $group['title']; ?>
          </button>
        <?php endforeach; ?>
      </div>

      <?php foreach ($faqGroups as $groupIndex => $group): ?>
        <div class="space-y-3 <?= $groupIndex === 0 ? '' : 'hidden'; ?>" data-faq-group-panel="<?= $groupIndex; ?>">
          <?php foreach ($group['items'] as $item): ?>
            <div class="rounded-xl border border-zinc-200 dark:border-white/10 px-4 md:px-5">
              <button class="w-full py-4 flex items-start justify-between gap-3 text-left" data-faq-btn data-open="false">
                <span class="font-semibold text-zinc-900 dark:text-white"><?= $item['q']; ?></span>
                <i data-lucide="chevron-down" class="w-5 h-5 text-accent transition-transform"></i>
              </button>
              <div class="faq-panel max-h-0 opacity-0 overflow-hidden transition-all duration-300" data-faq-panel>
                <p class="pb-4 text-zinc-600 dark:text-zinc-300 leading-7"><?= $item['a']; ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </section>

    <section id="committee" class="max-w-7xl mx-auto space-y-6">
      <div>
        <h2 class="text-2xl md:text-4xl font-bold text-zinc-900 dark:text-white">Наблюдательный комитет</h2>
        <p class="text-zinc-600 dark:text-zinc-300 mt-1">Около 100 участников. Клик по аватару открывает подробную информацию.</p>
      </div>

      <div id="committeePreview" class="grid gap-x-6 gap-y-6 [grid-template-columns:repeat(auto-fill,minmax(5.5rem,1fr))]"></div>
      <div class="flex justify-center">
        <button id="committeeLoadMore" class="px-5 py-2.5 rounded-xl bg-zinc-200 dark:bg-white/10 text-sm font-semibold hover:bg-zinc-300 dark:hover:bg-white/15">Показать ещё</button>
      </div>

      <div class="space-y-4 rounded-2xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#060f17] p-4 md:p-5">
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
