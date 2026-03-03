<?php
$newsItems = [
  ['title' => 'Открыт новый раунд инвестиций', 'date' => '02.03.2026', 'excerpt' => 'Компания открыла новый раунд с ограниченным пулом долей для ранних инвесторов.', 'link' => '#'],
  ['title' => 'Запущена расширенная партнёрская программа', 'date' => '27.02.2026', 'excerpt' => 'Обновлены уровни вознаграждений и добавлены инструменты для аналитики сети.', 'link' => '#'],
  ['title' => 'Внедрены ежемесячные отчёты по росту', 'date' => '20.02.2026', 'excerpt' => 'Теперь ключевые метрики доступны в личном кабинете и новостной ленте.', 'link' => '#'],
  ['title' => 'Обновление юридической документации', 'date' => '15.02.2026', 'excerpt' => 'Подготовлены новые версии пользовательского соглашения и инвестиционного меморандума.', 'link' => '#'],
  ['title' => 'Старт интеграции с аналитической платформой', 'date' => '10.02.2026', 'excerpt' => 'Появится детализация по доходности и прогнозам в одном дашборде.', 'link' => '#'],
  ['title' => 'Расширение наблюдательного комитета', 'date' => '05.02.2026', 'excerpt' => 'В комитет вошли представители из 7 новых стран и отраслей.', 'link' => '#'],
];

$faqGroups = [
  [
    'title' => 'Инвестиции и доли',
    'items' => [
      ['q' => 'Что я получаю при инвестировании?', 'a' => 'Вы получаете доли компании, которые в дальнейшем конвертируются в акции в соответствии с корпоративной структурой и юридическими условиями раунда.'],
      ['q' => 'Сколько долей доступно в текущем раунде?', 'a' => 'В открытую продажу выведено только 15% от общего объёма долей компании.'],
      ['q' => 'Можно ли увеличить инвестицию позже?', 'a' => 'Да, при наличии свободного объёма вы можете докупить доли в рамках активного раунда.'],
    ],
  ],
  [
    'title' => 'Реферальная система',
    'items' => [
      ['q' => 'Что означает «до 40%»?', 'a' => 'Базовые уровни распределяются как 10% + 5% + 2%. Оставшиеся 23% распределяются по глубине структуры.'],
      ['q' => 'Как работает глубина?', 'a' => 'При глубине до 23 уровней каждый уровень получает 1%. Если уровней больше 23 — оставшиеся 23% делятся равномерно по всем уровням (23/n).'],
      ['q' => 'Есть ли ограничение на количество уровней?', 'a' => 'Система поддерживает глубокие структуры и автоматически перераспределяет процент по формуле.'],
    ],
  ],
  [
    'title' => 'Платформа и безопасность',
    'items' => [
      ['q' => 'Где отслеживать новости и обновления?', 'a' => 'Последние обновления публикуются в блоке «Новости», а полный архив доступен по ссылке «Все новости».'],
      ['q' => 'Можно ли связаться с поддержкой?', 'a' => 'Да, внизу страницы доступен раздел Contact Us. Пока это заглушка, но структура уже предусмотрена.'],
    ],
  ],
];
?>

<main class="flex-1 overflow-y-auto px-4 py-6 lg:p-10">
  <div class="max-w-7xl mx-auto space-y-6 lg:space-y-8">
    <section class="card-simple overflow-hidden relative">
      <div class="absolute inset-0 bg-gradient-to-br from-accent/10 via-transparent to-emerald-500/10 pointer-events-none"></div>
      <div class="relative grid lg:grid-cols-[1.2fr_0.8fr] gap-6 items-center">
        <div class="space-y-4">
          <p class="text-[10px] sm:text-xs font-bold tracking-[0.2em] uppercase text-accent">Investment Opportunity</p>
          <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 dark:text-white">Инвестируйте в доли компании до выхода в акционерный формат</h1>
          <p class="text-zinc-600 dark:text-zinc-300 text-sm sm:text-base">Вы инвестируете в доли, которые впоследствии станут акциями. В текущем раунде на продажу выставлено только <span class="font-bold text-zinc-900 dark:text-white">15% всех долей</span>, что формирует ограниченное предложение для ранних инвесторов.</p>
          <a href="#" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-accent hover:bg-[#009663] text-white text-[11px] font-bold rounded-lg transition-all shadow-lg shadow-emerald-500/20 uppercase tracking-widest">Инвестировать сейчас</a>
        </div>
        <div class="card p-5 sm:p-6 space-y-4 bg-white/80 dark:bg-[#111417]/80 backdrop-blur">
          <h3 class="text-sm uppercase tracking-wider font-bold text-zinc-500">Ключевые параметры</h3>
          <div class="space-y-3 text-sm">
            <div class="flex items-center justify-between border-b border-zinc-200 dark:border-zinc-700 pb-2"><span>Общий пул долей</span><span class="font-bold">100%</span></div>
            <div class="flex items-center justify-between border-b border-zinc-200 dark:border-zinc-700 pb-2"><span>Доступно в раунде</span><span class="font-bold text-accent">15%</span></div>
            <div class="flex items-center justify-between"><span>Формат владения</span><span class="font-bold">Доли → Акции</span></div>
          </div>
        </div>
      </div>
    </section>

    <section class="card">
      <div class="card-header">
        <h2 class="text-sm font-bold uppercase tracking-wider text-zinc-900 dark:text-white">Реферальная система — до 40%</h2>
      </div>
      <div class="card-body grid lg:grid-cols-2 gap-6">
        <div class="space-y-3 text-sm text-zinc-600 dark:text-zinc-300">
          <p>Базовое распределение: <span class="font-bold text-zinc-900 dark:text-white">10% / 5% / 2%</span>.</p>
          <p>Далее поддерживается глубина сети:</p>
          <ul class="list-disc pl-5 space-y-1">
            <li>10 5 2</li>
            <li>10 5 2 1</li>
            <li>10 5 2 1 1</li>
            <li>10 5 2 1 1 1 … n</li>
          </ul>
          <p>При <span class="font-semibold">n ≤ 23</span> — каждому дополнительному уровню по 1%.</p>
          <p>При <span class="font-semibold">n &gt; 23</span> — остаток 23% делится равномерно: <span class="font-bold">23/n%</span> на каждый уровень после базовых трёх.</p>
        </div>
        <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 p-4 sm:p-5 bg-zinc-50 dark:bg-[#0B0E11]">
          <h3 class="text-xs uppercase tracking-wider font-bold text-zinc-500 mb-4">Визуализация распределения</h3>
          <div class="space-y-3 text-xs font-semibold">
            <div><div class="flex justify-between mb-1"><span>1 уровень</span><span>10%</span></div><div class="h-2 rounded bg-accent/90"></div></div>
            <div><div class="flex justify-between mb-1"><span>2 уровень</span><span>5%</span></div><div class="h-2 rounded bg-accent/70 w-1/2"></div></div>
            <div><div class="flex justify-between mb-1"><span>3 уровень</span><span>2%</span></div><div class="h-2 rounded bg-accent/60 w-1/4"></div></div>
            <div><div class="flex justify-between mb-1"><span>Уровни 4...n</span><span>до 23%</span></div><div class="h-2 rounded bg-emerald-300 dark:bg-emerald-500/70 w-[70%]"></div></div>
          </div>
        </div>
      </div>
    </section>

    <section class="card" id="news">
      <div class="card-header">
        <h2 class="text-sm font-bold uppercase tracking-wider text-zinc-900 dark:text-white">Последние новости и обновления</h2>
        <a href="#" class="text-xs font-bold uppercase tracking-wide text-accent hover:underline">Все новости</a>
      </div>
      <div class="card-body">
        <div class="relative">
          <div class="overflow-hidden" data-news-track-wrapper>
            <div class="flex transition-transform duration-300 ease-out" data-news-track>
              <?php foreach ($newsItems as $item): ?>
                <article class="min-w-full md:min-w-[50%] xl:min-w-[33.333%] p-2">
                  <div class="h-full rounded-xl border border-zinc-200 dark:border-zinc-700 p-4 flex flex-col bg-zinc-50 dark:bg-[#0B0E11]">
                    <p class="text-[11px] font-bold text-zinc-500 mb-2"><?= $item['date']; ?></p>
                    <h3 class="font-bold text-zinc-900 dark:text-white mb-2"><?= $item['title']; ?></h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-300 flex-1"><?= $item['excerpt']; ?></p>
                    <a href="<?= $item['link']; ?>" class="mt-4 text-xs font-bold uppercase tracking-wide text-accent hover:underline">Читать подробнее</a>
                  </div>
                </article>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="flex justify-end gap-2 mt-4">
            <button class="px-3 py-2 rounded-lg border border-zinc-200 dark:border-zinc-700" data-news-prev><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
            <button class="px-3 py-2 rounded-lg border border-zinc-200 dark:border-zinc-700" data-news-next><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
          </div>
        </div>
      </div>
    </section>

    <section class="card" id="faq">
      <div class="card-header">
        <h2 class="text-sm font-bold uppercase tracking-wider text-zinc-900 dark:text-white">FAQ (Часто задаваемые вопросы)</h2>
      </div>
      <div class="card-body space-y-4">
        <?php foreach ($faqGroups as $groupIndex => $group): ?>
          <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 overflow-hidden">
            <div class="px-4 py-3 bg-zinc-50 dark:bg-[#1E2023]">
              <h3 class="text-xs sm:text-sm font-bold uppercase tracking-wider text-zinc-700 dark:text-zinc-200"><?= $group['title']; ?></h3>
            </div>
            <div class="divide-y divide-zinc-200 dark:divide-zinc-700">
              <?php foreach ($group['items'] as $itemIndex => $item): ?>
                <div>
                  <button class="w-full px-4 py-3 text-left flex items-center justify-between gap-3 font-semibold text-sm" data-faq-btn>
                    <span><?= $item['q']; ?></span>
                    <i data-lucide="chevron-down" class="w-4 h-4 shrink-0 transition-transform"></i>
                  </button>
                  <div class="px-4 pb-4 text-sm text-zinc-600 dark:text-zinc-300 hidden" data-faq-panel>
                    <?= $item['a']; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="card" id="committee">
      <div class="card-header">
        <h2 class="text-sm font-bold uppercase tracking-wider text-zinc-900 dark:text-white">Наблюдательный комитет</h2>
        <span class="text-xs text-zinc-500 font-semibold">~100 участников</span>
      </div>
      <div class="card-body space-y-5">
        <div id="committeePreview" class="grid gap-x-8 md:gap-x-12 gap-y-8 [grid-template-columns:repeat(auto-fill,minmax(5.5rem,1fr))]"></div>

        <div class="space-y-2">
          <label for="committeeCountry" class="text-[11px] font-bold uppercase tracking-wider text-zinc-500">Select by country</label>
          <select id="committeeCountry" class="w-full md:w-80 rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-[#0B0E11] px-3 py-2 text-sm">
            <option value="">Все страны</option>
          </select>
        </div>

        <div id="committeeCarouselWrap" class="hidden">
          <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-bold text-zinc-900 dark:text-white">Участники по выбранной стране</h3>
            <div class="flex gap-2">
              <button class="px-3 py-2 rounded-lg border border-zinc-200 dark:border-zinc-700" data-committee-prev><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
              <button class="px-3 py-2 rounded-lg border border-zinc-200 dark:border-zinc-700" data-committee-next><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
            </div>
          </div>
          <div class="overflow-hidden">
            <div id="committeeCarousel" class="flex transition-transform duration-300 ease-out"></div>
          </div>
        </div>
      </div>
    </section>

    <footer class="card-simple">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex flex-wrap gap-4 text-sm font-semibold text-zinc-600 dark:text-zinc-300">
          <a href="#" class="hover:text-accent">Terms and Conditions</a>
          <a href="#" class="hover:text-accent">Privacy Policy</a>
          <a href="#" class="hover:text-accent">Contact Us</a>
        </div>
        <p class="text-xs text-zinc-500">© <?= date('Y'); ?> Demo Investment Platform. All rights reserved.</p>
      </div>
    </footer>
  </div>
</main>

<div id="committeeModal" class="fixed inset-0 z-[80] hidden">
  <div class="absolute inset-0 bg-black/60" data-modal-close></div>
  <div class="absolute inset-0 p-4 sm:p-6 flex items-center justify-center">
    <div class="w-full max-w-md rounded-2xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-[#14171A] p-5 relative">
      <button class="absolute right-3 top-3 p-2 rounded-lg border border-zinc-200 dark:border-zinc-700" data-modal-close><i data-lucide="x" class="w-4 h-4"></i></button>
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
    ];
    const socials = ['telegram', 'linkedin', 'twitter', 'facebook', 'instagram', 'vk'];

    for (let i = 1; i <= 100; i++) {
      const f = firstNames[i % firstNames.length];
      const l = lastNames[(i * 2) % lastNames.length];
      const c = countries[i % countries.length];
      const linkCount = 1 + (i % 3);
      members.push({
        avatar: `https://i.pravatar.cc/200?img=${(i % 70) + 1}`,
        city: c.city,
        country: c.country,
        countryFlag: c.flag,
        firstName: f,
        lastName: l,
        legacyId: 5000 + i,
        socialLinks: socials.slice(0, linkCount).map((type) => ({ type, url: '#' }))
      });
    }

    const preview = document.getElementById('committeePreview');
    const modal = document.getElementById('committeeModal');
    const modalBody = document.getElementById('committeeModalBody');
    const countrySelect = document.getElementById('committeeCountry');
    const carouselWrap = document.getElementById('committeeCarouselWrap');
    const carousel = document.getElementById('committeeCarousel');
    let carouselIndex = 0;
    let filtered = [];

    const socialIcon = (type) => {
      const map = { telegram: 'send', linkedin: 'linkedin', twitter: 'twitter', facebook: 'facebook', instagram: 'instagram', vk: 'circle' };
      return map[type] || 'link';
    };

    const memberFullCard = (m) => `
      <div class="min-w-full md:min-w-[50%] xl:min-w-[33.333%] p-2">
        <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 p-4 bg-zinc-50 dark:bg-[#0B0E11] h-full">
          <div class="flex items-center gap-3 mb-3">
            <div class="relative">
              <img src="${m.avatar}" alt="${m.firstName}" class="w-14 h-14 rounded-full object-cover">
              <span class="absolute -bottom-1 -right-1 text-lg">${m.countryFlag}</span>
            </div>
            <div>
              <p class="font-bold text-zinc-900 dark:text-white">${m.firstName} ${m.lastName}</p>
              <p class="text-xs text-zinc-500">${m.city}, ${m.country}</p>
              <p class="text-xs font-semibold text-zinc-500">ID: ${m.legacyId}</p>
            </div>
          </div>
          <div class="flex flex-wrap gap-2">${m.socialLinks.map((s) => `<a href="${s.url}" class="p-2 rounded-lg border border-zinc-200 dark:border-zinc-700"><i data-lucide="${socialIcon(s.type)}" class="w-4 h-4"></i></a>`).join('')}</div>
        </div>
      </div>`;

    members.forEach((m) => {
      const btn = document.createElement('button');
      btn.className = 'relative mx-auto w-[100px] h-[100px] rounded-2xl border border-zinc-200 dark:border-zinc-700 overflow-hidden hover:scale-105 transition-transform';
      btn.innerHTML = `<img src="${m.avatar}" alt="${m.firstName}" class="w-full h-full object-cover"><span class="absolute bottom-1 right-1 text-lg">${m.countryFlag}</span>`;
      btn.addEventListener('click', () => {
        modalBody.innerHTML = memberFullCard(m).replace('min-w-full md:min-w-[50%] xl:min-w-[33.333%] p-2', '');
        modal.classList.remove('hidden');
        if (window.lucide) window.lucide.createIcons();
      });
      preview.appendChild(btn);
    });

    [...new Set(members.map((m) => m.country))].sort().forEach((country) => {
      const option = document.createElement('option');
      option.value = country;
      option.textContent = country;
      countrySelect.appendChild(option);
    });

    const updateCarousel = () => {
      if (!filtered.length) {
        carouselWrap.classList.add('hidden');
        return;
      }
      carouselWrap.classList.remove('hidden');
      carousel.style.transform = `translateX(-${carouselIndex * 100}%)`;
    };

    countrySelect.addEventListener('change', (e) => {
      const country = e.target.value;
      filtered = country ? members.filter((m) => m.country === country) : [];
      carouselIndex = 0;
      carousel.innerHTML = filtered.map(memberFullCard).join('');
      updateCarousel();
      if (window.lucide) window.lucide.createIcons();
    });

    document.querySelector('[data-committee-prev]')?.addEventListener('click', () => {
      if (!filtered.length) return;
      carouselIndex = Math.max(0, carouselIndex - 1);
      updateCarousel();
    });
    document.querySelector('[data-committee-next]')?.addEventListener('click', () => {
      if (!filtered.length) return;
      carouselIndex = Math.min(filtered.length - 1, carouselIndex + 1);
      updateCarousel();
    });

    modal.querySelectorAll('[data-modal-close]').forEach((el) => el.addEventListener('click', () => modal.classList.add('hidden')));

    document.querySelectorAll('[data-faq-btn]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const panel = btn.parentElement.querySelector('[data-faq-panel]');
        const icon = btn.querySelector('i');
        panel.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
      });
    });

    const newsTrack = document.querySelector('[data-news-track]');
    const newsItems = newsTrack?.children.length || 0;
    let newsIndex = 0;
    const shiftNews = () => {
      if (!newsTrack) return;
      newsTrack.style.transform = `translateX(-${newsIndex * 100}%)`;
    };

    document.querySelector('[data-news-prev]')?.addEventListener('click', () => {
      newsIndex = Math.max(0, newsIndex - 1);
      shiftNews();
    });
    document.querySelector('[data-news-next]')?.addEventListener('click', () => {
      newsIndex = Math.min(newsItems - 1, newsIndex + 1);
      shiftNews();
    });

    if (window.lucide) window.lucide.createIcons();
  })();
</script>
