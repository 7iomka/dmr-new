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

<main class="flex-1 overflow-y-auto">
  <div class="px-4 lg:px-10 py-6 lg:py-10 space-y-12 lg:space-y-16">
    <section class="relative overflow-hidden rounded-xl border border-white/10 bg-[linear-gradient(135deg,#081217_0%,#0a1419_55%,#0b151b_100%)] text-white dark:border-zinc-200 dark:bg-[linear-gradient(135deg,#f3fbf8_0%,#eef8ff_45%,#f7fbff_100%)] dark:text-zinc-900">
      <div class="absolute inset-0 opacity-65 dark:opacity-45 bg-[linear-gradient(rgba(255,255,255,.09)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,.09)_1px,transparent_1px)] dark:bg-[linear-gradient(rgba(15,23,42,.13)_1px,transparent_1px),linear-gradient(90deg,rgba(15,23,42,.13)_1px,transparent_1px)] bg-[size:120px_120px]"></div>
      <div class="absolute inset-0 bg-[radial-gradient(circle_at_18%_20%,rgba(16,185,129,.18),transparent_38%),radial-gradient(circle_at_75%_35%,rgba(16,185,129,.12),transparent_34%),radial-gradient(circle_at_55%_82%,rgba(34,211,238,.08),transparent_32%)] dark:bg-[radial-gradient(circle_at_18%_20%,rgba(16,185,129,.26),transparent_40%),radial-gradient(circle_at_75%_35%,rgba(16,185,129,.16),transparent_36%),radial-gradient(circle_at_55%_82%,rgba(34,211,238,.11),transparent_34%)]"></div>

      <div class="relative max-w-6xl mx-auto grid lg:grid-cols-[0.95fr_1.05fr] gap-7 lg:gap-10 p-6 md:p-10 lg:p-12">
        <div class="space-y-5">
          <h1 class="text-3xl md:text-[3.35rem] leading-[1.03] font-bold">Посмотрите на себя из зазеркалья</h1>
          <p class="text-zinc-200 dark:text-zinc-700 max-w-xl text-lg">Инвестируйте в проект умного зеркала с технологией, позволяющей показывать обратную сторону тела.</p>
          <a href="#" class="inline-flex items-center justify-center px-7 py-3 rounded-lg bg-accent text-white text-[11px] uppercase tracking-[0.12em] font-bold shadow-[0_12px_30px_rgba(0,176,116,0.32)] hover:-translate-y-0.5 transition-all">Инвестировать</a>
        </div>

        <div class="space-y-3">
          <div class="rounded-lg overflow-hidden border border-white/15 dark:border-zinc-200 bg-black/20 dark:bg-white/70">
            <img src="https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?auto=format&fit=crop&w=1400&q=80" alt="Dilan Mirror campaign visual" class="w-full h-[250px] md:h-[300px] object-cover">
          </div>
          <div class="grid sm:grid-cols-3 gap-3">
            <div class="rounded-lg bg-white/10 dark:bg-white/80 border border-white/15 dark:border-zinc-200 p-4">
              <p class="text-2xl md:text-3xl font-bold">$2.5M</p>
              <p class="text-xs uppercase tracking-wider text-emerald-100/80 dark:text-zinc-600 mt-1">Already Invested</p>
            </div>
            <div class="rounded-lg bg-white/10 dark:bg-white/80 border border-white/15 dark:border-zinc-200 p-4">
              <p class="text-2xl md:text-3xl font-bold">850+</p>
              <p class="text-xs uppercase tracking-wider text-emerald-100/80 dark:text-zinc-600 mt-1">Active Investors</p>
            </div>
            <div class="rounded-lg bg-white/10 dark:bg-white/80 border border-white/15 dark:border-zinc-200 p-4">
              <p class="text-2xl md:text-3xl font-bold">15%</p>
              <p class="text-xs uppercase tracking-wider text-emerald-100/80 dark:text-zinc-600 mt-1">Projected ROI</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-6xl mx-auto space-y-8">
      <div class="text-center space-y-3">
        <p class="text-[11px] uppercase tracking-[0.16em] text-accent font-semibold">Referral</p>
        <h2 class="text-2xl md:text-4xl font-bold">Реферальная программа «до 40%» — просто и понятно</h2>
        <p class="text-zinc-600 dark:text-zinc-300 max-w-3xl mx-auto">Вы получаете доход от ближайших рекомендаций и от роста вашей структуры. Чем сильнее ваша команда, тем заметнее результат.</p>
      </div>

      <div class="grid lg:grid-cols-2 gap-6 lg:gap-10 items-start">
        <div class="space-y-4">
          <div class="flex items-center gap-3">
            <span class="shrink-0 w-9 h-9 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300 grid place-items-center font-bold">1</span>
            <p class="font-semibold">Первые три уровня дают фиксированный доход: <span class="font-bold">10% + 5% + 2%</span>.</p>
          </div>
          <div class="flex items-center gap-3">
            <span class="shrink-0 w-9 h-9 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300 grid place-items-center font-bold">2</span>
            <p class="font-semibold">После этого остаётся дополнительная часть — до <span class="font-bold">23%</span> — она распределяется вглубь команды.</p>
          </div>
          <div class="flex items-center gap-3">
            <span class="shrink-0 w-9 h-9 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300 grid place-items-center font-bold">3</span>
            <p class="font-semibold">Если команда большая, система автоматически и равномерно делит эту часть между глубокими уровнями.</p>
          </div>
        </div>

        <div class="relative rounded-xl p-6 bg-[linear-gradient(155deg,rgba(16,185,129,.10),rgba(34,211,238,.08),rgba(255,255,255,.4))] dark:bg-[linear-gradient(155deg,rgba(16,185,129,.14),rgba(34,211,238,.08),rgba(255,255,255,.03))]">
          <p class="text-xs uppercase tracking-wider text-zinc-500 mb-4">Как распределяется доход</p>
          <div class="space-y-4">
            <div>
              <div class="flex justify-between text-sm mb-1 font-semibold"><span>Ближайшие уровни</span><span>17%</span></div>
              <div class="h-3 rounded-lg bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-[42.5%] bg-gradient-to-r from-emerald-500 to-emerald-400"></div></div>
            </div>
            <div>
              <div class="flex justify-between text-sm mb-1 font-semibold"><span>Глубина команды</span><span>до 23%</span></div>
              <div class="h-3 rounded-lg bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-[57.5%] bg-gradient-to-r from-cyan-400 to-emerald-300"></div></div>
            </div>
            <div>
              <div class="flex justify-between text-sm mb-1 font-semibold"><span>Максимальный потолок</span><span>до 40%</span></div>
              <div class="h-3 rounded-lg bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-full bg-gradient-to-r from-emerald-500 via-cyan-400 to-emerald-300"></div></div>
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
                <a href="<?= $item['link']; ?>" class="group block h-full rounded-xl overflow-hidden border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#10161b]">
                  <div class="h-44 relative bg-[linear-gradient(155deg,#eef7f3_0%,#e7f2f7_50%,#ffffff_100%)] dark:bg-[linear-gradient(155deg,#111a1f_0%,#0f1917_50%,#0c1116_100%)]">
                    <div class="absolute inset-0 opacity-35 bg-[radial-gradient(circle_at_20%_20%,#10b981_0%,transparent_45%),radial-gradient(circle_at_80%_40%,#22d3ee_0%,transparent_40%)]"></div>
                    <div class="absolute left-3 top-3 flex items-center gap-2 text-[10px]">
                      <span class="uppercase tracking-[0.14em] font-semibold px-2 py-1 rounded-lg bg-white/80 dark:bg-black/35"><?= $item['category']; ?></span>
                      <span class="px-2 py-1 rounded-lg bg-white/80 dark:bg-black/35 text-zinc-600 dark:text-zinc-200 font-semibold"><?= $item['date']; ?></span>
                    </div>
                  </div>
                  <div class="p-4 space-y-2">
                    <h3 class="font-bold text-zinc-900 dark:text-white group-hover:text-accent transition-colors overflow-hidden" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;"><?= $item['title']; ?></h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-300 overflow-hidden" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;"><?= $item['excerpt']; ?></p>
                  </div>
                </a>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="flex justify-end gap-2 mt-2">
          <button class="w-10 h-10 rounded-lg border border-zinc-200 dark:border-white/15 hover:border-accent" data-news-prev><i data-lucide="arrow-left" class="w-4 h-4 mx-auto"></i></button>
          <button class="w-10 h-10 rounded-lg border border-zinc-200 dark:border-white/15 hover:border-accent" data-news-next><i data-lucide="arrow-right" class="w-4 h-4 mx-auto"></i></button>
        </div>
      </div>
    </section>

    <section id="faq" class="max-w-6xl mx-auto rounded-xl border border-zinc-200 bg-zinc-50 text-zinc-900 px-4 md:px-8 py-8 md:py-10 dark:border-white/10 dark:bg-[#071015] dark:text-white">
      <div class="space-y-5">
        <h2 class="text-3xl md:text-5xl leading-none font-bold text-accent dark:text-[#33f7b5]">Frequently Asked Questions</h2>

        <div class="flex flex-wrap gap-2" id="faqGroupTabs">
          <?php foreach ($faqGroups as $groupIndex => $group): ?>
            <button type="button" data-faq-group-btn data-group-index="<?= $groupIndex; ?>" data-active="<?= $groupIndex === 0 ? 'true' : 'false'; ?>" class="px-5 py-2.5 rounded-lg border border-zinc-300 dark:border-white/25 text-sm md:text-base font-semibold transition-colors data-[active=true]:border-accent dark:data-[active=true]:border-[#1fe7ad] data-[active=true]:text-zinc-900 dark:data-[active=true]:text-white data-[active=true]:bg-emerald-100 dark:data-[active=true]:bg-[#0b1e24] data-[active=false]:text-zinc-600 dark:data-[active=false]:text-zinc-300 data-[active=false]:bg-transparent hover:border-accent/60">
              <?= $group['title']; ?>
            </button>
          <?php endforeach; ?>
        </div>

        <?php foreach ($faqGroups as $groupIndex => $group): ?>
          <div data-faq-group-panel="<?= $groupIndex; ?>" class="space-y-1 <?= $groupIndex === 0 ? '' : 'hidden'; ?>">
            <?php foreach ($group['items'] as $item): ?>
              <div class="border-b border-zinc-300 dark:border-white/20">
                <button class="w-full flex items-start justify-between gap-4 py-4 md:py-5 text-left" data-faq-btn data-open="false">
                  <span class="font-semibold text-base md:text-xl leading-snug"><?= $item['q']; ?></span>
                  <i data-lucide="chevron-down" class="w-5 h-5 text-accent dark:text-[#1fe7ad] shrink-0 mt-1 transition-transform duration-300"></i>
                </button>
                <div class="faq-panel max-h-0 opacity-0 overflow-hidden transition-all duration-300 ease-out pb-0 pr-9 text-zinc-600 dark:text-zinc-300 text-sm md:text-base leading-7" data-faq-panel><?= $item['a']; ?></div>
              </div>
            <?php endforeach; ?>
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
        <button id="committeeLoadMore" class="px-5 py-2.5 rounded-lg bg-zinc-100 dark:bg-white/10 text-sm font-semibold hover:bg-zinc-200 dark:hover:bg-white/15">Показать ещё</button>
      </div>

      <div class="space-y-4">
        <div class="relative max-w-sm">
          <p class="text-[11px] uppercase tracking-wider font-semibold text-zinc-500 mb-1.5">Select by country</p>
          <button id="countrySelectTrigger" type="button" class="w-full flex items-center justify-between gap-2 rounded-lg border border-zinc-200 dark:border-white/15 bg-white dark:bg-white/5 px-3 py-2 text-sm">
            <span class="flex items-center gap-2" id="countrySelectValue"><span class="text-base">🌍</span><span>Выберите страну</span></span>
            <i data-lucide="chevron-down" class="w-4 h-4 text-zinc-500"></i>
          </button>
          <div id="countrySelectMenu" class="hidden absolute z-20 mt-2 w-full rounded-lg border border-zinc-200 dark:border-white/15 bg-white dark:bg-[#11171c] shadow-xl max-h-64 overflow-auto"></div>
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
      btn.addEventListener('click', () => {
        const target = btn.dataset.groupIndex;
        document.querySelectorAll('[data-faq-group-btn]').forEach((b) => {
          b.dataset.active = b === btn ? 'true' : 'false';
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
              ans.classList.remove('pb-4');
            });
          }
        });
      });
    });

    document.querySelectorAll('[data-faq-btn]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const panel = btn.parentElement.querySelector('[data-faq-panel]');
        const icon = btn.querySelector('i');
        const isOpen = btn.dataset.open === 'true';
        btn.dataset.open = isOpen ? 'false' : 'true';

        if (isOpen) {
          panel.style.maxHeight = '0px';
          panel.classList.add('opacity-0');
          panel.classList.remove('pb-4');
          icon.classList.remove('rotate-180');
        } else {
          panel.style.maxHeight = panel.scrollHeight + 'px';
          panel.classList.remove('opacity-0');
          panel.classList.add('pb-4');
          icon.classList.add('rotate-180');
        }
      });
    });

    const preview = document.getElementById('committeePreview');
    const loadMoreBtn = document.getElementById('committeeLoadMore');
    const modal = document.getElementById('committeeModal');
    const modalBody = document.getElementById('committeeModalBody');

    const countrySelectTrigger = document.getElementById('countrySelectTrigger');
    const countrySelectValue = document.getElementById('countrySelectValue');
    const countrySelectMenu = document.getElementById('countrySelectMenu');

    const carouselWrap = document.getElementById('committeeCarouselWrap');
    const carousel = document.getElementById('committeeCarousel');

    let previewCount = 0;
    const batch = 30;
    let filtered = [];
    let cIndex = 0;

    const memberCard = (m) => `
      <div class="min-w-full md:min-w-[50%] xl:min-w-[33.3333%] p-1.5">
        <div class="rounded-lg bg-zinc-50 dark:bg-white/5 p-4 h-full">
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
        btn.className = 'group relative w-[92px] h-[92px] md:w-[100px] md:h-[100px] mx-auto rounded-lg overflow-hidden hover:-translate-y-0.5 transition-all';
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
