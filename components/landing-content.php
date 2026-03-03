<?php
$newsItems = [
  ['title' => 'Раунд A открыт: старт размещения долей', 'date' => '03.03.2026', 'category' => 'Инвестиции', 'excerpt' => 'Открыт ранний доступ для инвесторов. На рынок выведено только 15% долей компании.', 'link' => '#', 'accent' => 'from-emerald-400/30 to-cyan-300/20'],
  ['title' => 'Реферальная сеть: рост активности +28%', 'date' => '27.02.2026', 'category' => 'Партнёрка', 'excerpt' => 'Обновлена логика аналитики по глубине уровней и прозрачности распределения дохода.', 'link' => '#', 'accent' => 'from-emerald-300/30 to-lime-300/20'],
  ['title' => 'Запуск ежемесячного investor report', 'date' => '22.02.2026', 'category' => 'Отчётность', 'excerpt' => 'Единый формат отчётности по росту, метрикам спроса и динамике оборота.', 'link' => '#', 'accent' => 'from-sky-300/30 to-emerald-300/20'],
  ['title' => 'Обновлены юридические документы', 'date' => '15.02.2026', 'category' => 'Юридический блок', 'excerpt' => 'Актуализированы условия владения долями, конвертации в акции и пользовательские политики.', 'link' => '#', 'accent' => 'from-zinc-300/20 to-emerald-200/20'],
  ['title' => 'Новый этап масштабирования продукта', 'date' => '10.02.2026', 'category' => 'Продукт', 'excerpt' => 'Добавлены новые сценарии воронки инвестиций и расширены региональные команды.', 'link' => '#', 'accent' => 'from-teal-300/30 to-cyan-200/20'],
  ['title' => 'Комитет расширен до 100+ участников', 'date' => '05.02.2026', 'category' => 'Комьюнити', 'excerpt' => 'В наблюдательный комитет вошли эксперты из новых стран и отраслей.', 'link' => '#', 'accent' => 'from-emerald-300/30 to-yellow-200/20'],
];

$faqGroups = [
  [
    'title' => 'Инвестиционный блок',
    'items' => [
      ['q' => 'Что я получаю, когда инвестирую?', 'a' => 'Вы приобретаете доли компании. Далее, по дорожной карте и корпоративной структуре, эти доли конвертируются в акции.'],
      ['q' => 'Почему в продаже только 15%?', 'a' => 'Это контролируемый объём текущего раунда: ограниченное предложение помогает сохранять структуру капитала и стратегическую управляемость.'],
      ['q' => 'Кнопка «Инвестировать» куда ведёт?', 'a' => 'Сейчас это заглушка на регистрацию. После запуска страницы регистрации ссылка будет заменена на целевой flow.'],
    ],
  ],
  [
    'title' => 'Реферальная модель',
    'items' => [
      ['q' => 'Как работает «до 40%»?', 'a' => 'База: 10% + 5% + 2%. Остальные 23% распределяются по глубине структуры.'],
      ['q' => 'Что при глубине до 23 уровней?', 'a' => 'Каждый уровень после базовых трёх получает по 1%.'],
      ['q' => 'Что при глубине выше 23 уровней?', 'a' => 'Оставшиеся 23% распределяются равномерно между уровнями: 23/n% (для уровней после базовых трёх).'],
    ],
  ],
  [
    'title' => 'Новости и платформа',
    'items' => [
      ['q' => 'Сколько новостей выводится на лендинге?', 'a' => 'На главном лендинге показываются 6 последних новостей в слайдере.'],
      ['q' => 'Можно раскрывать несколько FAQ одновременно?', 'a' => 'Да, аккордеон мульти-раскрываемый — вы можете держать открытыми несколько ответов.'],
    ],
  ],
];
?>

<main class="flex-1 overflow-y-auto px-3 py-4 lg:px-8 lg:py-8">
  <div class="max-w-[1220px] mx-auto space-y-8 lg:space-y-12">
    <section class="relative overflow-hidden rounded-[2rem] border border-white/60 dark:border-white/10 bg-gradient-to-br from-white via-emerald-50/40 to-zinc-100 dark:from-[#0e1216] dark:via-[#101a16] dark:to-[#0b0e11] shadow-[0_20px_80px_rgba(0,0,0,0.08)]">
      <div class="absolute -top-24 -left-24 w-72 h-72 rounded-full bg-emerald-400/20 blur-3xl"></div>
      <div class="absolute -bottom-20 -right-10 w-64 h-64 rounded-full bg-cyan-300/20 blur-3xl"></div>
      <div class="relative p-6 md:p-10 lg:p-12 grid lg:grid-cols-[1.1fr_0.9fr] gap-8 items-center">
        <div class="space-y-5">
          <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-emerald-400/30 bg-emerald-400/10 text-[11px] uppercase tracking-[0.18em] font-bold text-emerald-700 dark:text-emerald-300">Early Investment Access · Round A</div>
          <h1 class="text-3xl md:text-5xl font-black tracking-tight leading-[1.05] text-zinc-900 dark:text-white">Инвестируйте в доли сегодня — получите акции в будущем</h1>
          <p class="text-zinc-600 dark:text-zinc-300 max-w-2xl text-sm md:text-base">Вы входите в компанию на этапе роста: текущая инвестиция оформляется в долях, которые затем конвертируются в акции. В размещении только <span class="font-bold text-zinc-900 dark:text-white">15% общего пула</span> — ограниченное предложение для ранних инвесторов.</p>
          <div class="flex flex-wrap items-center gap-3">
            <a href="#" class="inline-flex items-center justify-center px-7 py-3 rounded-xl bg-accent text-white text-[11px] uppercase tracking-[0.14em] font-bold shadow-[0_14px_35px_rgba(0,176,116,0.35)] hover:-translate-y-0.5 transition-all">Инвестировать (регистрация)</a>
            <span class="text-xs text-zinc-500 dark:text-zinc-400">* временная ссылка-заглушка</span>
          </div>
          <div class="grid grid-cols-3 gap-3 pt-2 max-w-xl">
            <div class="rounded-xl p-3 bg-white/80 dark:bg-white/5 border border-zinc-200/70 dark:border-white/10">
              <p class="text-[10px] uppercase tracking-wider text-zinc-500">Пул раунда</p>
              <p class="text-xl font-extrabold text-zinc-900 dark:text-white">15%</p>
            </div>
            <div class="rounded-xl p-3 bg-white/80 dark:bg-white/5 border border-zinc-200/70 dark:border-white/10">
              <p class="text-[10px] uppercase tracking-wider text-zinc-500">Конвертация</p>
              <p class="text-xl font-extrabold text-zinc-900 dark:text-white">Доли → Акции</p>
            </div>
            <div class="rounded-xl p-3 bg-white/80 dark:bg-white/5 border border-zinc-200/70 dark:border-white/10">
              <p class="text-[10px] uppercase tracking-wider text-zinc-500">Формат</p>
              <p class="text-xl font-extrabold text-zinc-900 dark:text-white">Public landing</p>
            </div>
          </div>
        </div>

        <div class="relative">
          <div class="rounded-3xl p-5 md:p-6 border border-zinc-200/80 dark:border-white/10 bg-white/80 dark:bg-white/[0.04] backdrop-blur-xl">
            <div class="flex items-center justify-between mb-4">
              <h2 class="font-bold text-zinc-900 dark:text-white">Инфографика раунда</h2>
              <span class="text-[10px] px-2 py-1 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300 font-bold uppercase">Live demo</span>
            </div>
            <div class="space-y-4">
              <div>
                <div class="flex justify-between text-xs mb-1"><span class="text-zinc-500">Доступно инвесторам</span><span class="font-bold text-zinc-900 dark:text-white">15%</span></div>
                <div class="h-3 rounded-full bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-[15%] bg-gradient-to-r from-emerald-400 to-emerald-600"></div></div>
              </div>
              <div>
                <div class="flex justify-between text-xs mb-1"><span class="text-zinc-500">Остаётся в структуре</span><span class="font-bold text-zinc-900 dark:text-white">85%</span></div>
                <div class="h-3 rounded-full bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-[85%] bg-gradient-to-r from-zinc-400 to-zinc-500 dark:from-zinc-600 dark:to-zinc-700"></div></div>
              </div>
              <div class="grid grid-cols-2 gap-3 pt-1">
                <div class="rounded-xl p-3 bg-zinc-50 dark:bg-black/30 border border-zinc-200/80 dark:border-white/10">
                  <p class="text-[10px] uppercase tracking-wider text-zinc-500">Этап 1</p>
                  <p class="text-sm font-bold">Инвестиция в доли</p>
                </div>
                <div class="rounded-xl p-3 bg-zinc-50 dark:bg-black/30 border border-zinc-200/80 dark:border-white/10">
                  <p class="text-[10px] uppercase tracking-wider text-zinc-500">Этап 2</p>
                  <p class="text-sm font-bold">Конвертация в акции</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="grid xl:grid-cols-[1.1fr_0.9fr] gap-4 lg:gap-6">
      <article class="rounded-[1.6rem] p-6 md:p-8 border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#101419] shadow-sm">
        <div class="flex items-start justify-between gap-3">
          <h2 class="text-xl md:text-2xl font-extrabold tracking-tight text-zinc-900 dark:text-white">Реферальная модель «до 40%»</h2>
          <span class="text-[11px] px-2 py-1 rounded-full bg-accent/10 text-accent font-bold">до 40%</span>
        </div>
        <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-300">Базовые уровни фиксированы, глубина поддерживается динамически — модель остаётся предсказуемой и масштабируемой.</p>

        <div class="mt-5 space-y-3">
          <div class="grid grid-cols-[88px_1fr_58px] items-center gap-3 text-sm">
            <span class="font-semibold">1 уровень</span>
            <div class="h-2.5 rounded-full bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-full bg-emerald-500"></div></div>
            <span class="font-bold text-right">10%</span>
          </div>
          <div class="grid grid-cols-[88px_1fr_58px] items-center gap-3 text-sm">
            <span class="font-semibold">2 уровень</span>
            <div class="h-2.5 rounded-full bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-1/2 bg-emerald-400"></div></div>
            <span class="font-bold text-right">5%</span>
          </div>
          <div class="grid grid-cols-[88px_1fr_58px] items-center gap-3 text-sm">
            <span class="font-semibold">3 уровень</span>
            <div class="h-2.5 rounded-full bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-[20%] bg-emerald-300"></div></div>
            <span class="font-bold text-right">2%</span>
          </div>
          <div class="grid grid-cols-[88px_1fr_58px] items-center gap-3 text-sm">
            <span class="font-semibold">4...n</span>
            <div class="h-2.5 rounded-full bg-zinc-200 dark:bg-zinc-800 overflow-hidden"><div class="h-full w-[57.5%] bg-gradient-to-r from-cyan-300 to-emerald-300"></div></div>
            <span class="font-bold text-right">до 23%</span>
          </div>
        </div>

        <div class="mt-5 grid md:grid-cols-2 gap-3 text-sm">
          <div class="rounded-xl border border-zinc-200 dark:border-white/10 p-3 bg-zinc-50 dark:bg-black/25">Если <strong>n ≤ 23</strong>: после базовых трёх уровней каждый получает по <strong>1%</strong>.</div>
          <div class="rounded-xl border border-zinc-200 dark:border-white/10 p-3 bg-zinc-50 dark:bg-black/25">Если <strong>n &gt; 23</strong>: действует формула <strong>23/n%</strong> (равномерно по уровням после базовых трёх).</div>
        </div>
      </article>

      <article class="rounded-[1.6rem] p-6 md:p-8 border border-zinc-200 dark:border-white/10 bg-gradient-to-b from-zinc-50 to-white dark:from-[#11171d] dark:to-[#0d1217] shadow-sm">
        <h3 class="text-lg font-extrabold text-zinc-900 dark:text-white">Динамика глубины</h3>
        <p class="text-sm text-zinc-600 dark:text-zinc-300 mt-2">Пример распределения по уровням с визуализацией остатка 23%.</p>
        <div class="mt-5 space-y-4">
          <div class="rounded-xl p-4 border border-zinc-200 dark:border-white/10 bg-white dark:bg-black/20">
            <p class="text-xs font-bold uppercase tracking-wider text-zinc-500 mb-3">Паттерны</p>
            <div class="flex flex-wrap gap-2 text-xs font-semibold">
              <span class="px-2.5 py-1 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300">10 5 2</span>
              <span class="px-2.5 py-1 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300">10 5 2 1</span>
              <span class="px-2.5 py-1 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300">10 5 2 1 1</span>
              <span class="px-2.5 py-1 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300">10 5 2 1 1 1 … n</span>
            </div>
          </div>
          <div class="h-40 rounded-xl border border-zinc-200 dark:border-white/10 bg-[linear-gradient(to_top,rgba(16,185,129,.08),transparent)] relative overflow-hidden">
            <div class="absolute inset-x-3 bottom-3 h-28 flex items-end gap-2">
              <div class="flex-1 rounded-t-md bg-emerald-500/80 h-full"></div>
              <div class="flex-1 rounded-t-md bg-emerald-400/80 h-[72%]"></div>
              <div class="flex-1 rounded-t-md bg-emerald-300/80 h-[46%]"></div>
              <div class="flex-1 rounded-t-md bg-cyan-300/80 h-[38%]"></div>
              <div class="flex-1 rounded-t-md bg-cyan-200/80 h-[34%]"></div>
              <div class="flex-1 rounded-t-md bg-cyan-100/80 h-[31%]"></div>
            </div>
          </div>
        </div>
      </article>
    </section>

    <section class="space-y-4" id="news">
      <div class="flex items-center justify-between gap-3">
        <h2 class="text-2xl md:text-3xl font-black tracking-tight">Последние новости и обновления</h2>
        <a href="#" class="text-xs md:text-sm font-bold text-accent hover:underline uppercase tracking-wider">Все новости</a>
      </div>
      <div class="relative">
        <div class="overflow-hidden" data-news-viewport>
          <div class="flex transition-transform duration-300" data-news-track>
            <?php foreach ($newsItems as $item): ?>
              <article class="min-w-full md:min-w-[50%] xl:min-w-[33.3333%] p-1.5">
                <a href="<?= $item['link']; ?>" class="group block h-full rounded-3xl border border-zinc-200 dark:border-white/10 overflow-hidden bg-white dark:bg-[#0f1419]">
                  <div class="h-36 bg-gradient-to-br <?= $item['accent']; ?> relative">
                    <div class="absolute inset-0 opacity-40 bg-[radial-gradient(circle_at_20%_20%,white,transparent_55%)]"></div>
                    <div class="absolute left-4 top-4 text-[10px] font-bold uppercase tracking-[0.15em] px-2 py-1 rounded-full bg-black/20 text-white"><?= $item['category']; ?></div>
                  </div>
                  <div class="p-4 flex flex-col gap-2">
                    <p class="text-[11px] font-semibold text-zinc-500"><?= $item['date']; ?></p>
                    <h3 class="font-bold text-zinc-900 dark:text-white leading-snug group-hover:text-accent transition-colors"><?= $item['title']; ?></h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-300"><?= $item['excerpt']; ?></p>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-accent pt-1">Открыть новость →</span>
                  </div>
                </a>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="flex justify-end gap-2 mt-3">
          <button class="w-10 h-10 rounded-xl border border-zinc-200 dark:border-white/10 hover:border-accent" data-news-prev><i data-lucide="arrow-left" class="w-4 h-4 mx-auto"></i></button>
          <button class="w-10 h-10 rounded-xl border border-zinc-200 dark:border-white/10 hover:border-accent" data-news-next><i data-lucide="arrow-right" class="w-4 h-4 mx-auto"></i></button>
        </div>
      </div>
    </section>

    <section class="grid xl:grid-cols-[0.92fr_1.08fr] gap-4 lg:gap-6" id="faq">
      <div class="rounded-[1.6rem] p-6 md:p-8 border border-zinc-200 dark:border-white/10 bg-gradient-to-b from-white to-zinc-50 dark:from-[#10151b] dark:to-[#0c1116]">
        <h2 class="text-2xl md:text-3xl font-black tracking-tight">FAQ</h2>
        <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">Частые вопросы по инвестициям, рефералке и работе платформы.</p>
        <div class="mt-5 flex flex-wrap gap-2 text-xs">
          <span class="px-3 py-1 rounded-full bg-emerald-500/15 text-emerald-700 dark:text-emerald-300 font-semibold">Часто задаваемые вопросы</span>
          <span class="px-3 py-1 rounded-full bg-zinc-800/10 dark:bg-white/10 font-semibold">Мульти-аккордеон</span>
          <span class="px-3 py-1 rounded-full bg-zinc-800/10 dark:bg-white/10 font-semibold">Группы тем</span>
        </div>
      </div>

      <div class="space-y-4">
        <?php foreach ($faqGroups as $group): ?>
          <div class="rounded-2xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#10161c] overflow-hidden">
            <div class="px-4 py-3 border-b border-zinc-200 dark:border-white/10 bg-zinc-50 dark:bg-white/[0.02]">
              <h3 class="text-xs uppercase tracking-[0.15em] font-bold text-zinc-500"><?= $group['title']; ?></h3>
            </div>
            <div class="divide-y divide-zinc-200 dark:divide-white/10">
              <?php foreach ($group['items'] as $item): ?>
                <div>
                  <button class="w-full flex items-center justify-between gap-3 px-4 py-3 text-left" data-faq-btn>
                    <span class="font-semibold text-sm text-zinc-900 dark:text-zinc-100"><?= $item['q']; ?></span>
                    <i data-lucide="plus" class="w-4 h-4 text-zinc-500 transition-transform"></i>
                  </button>
                  <div class="hidden px-4 pb-4 text-sm text-zinc-600 dark:text-zinc-300" data-faq-panel><?= $item['a']; ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="committee" class="rounded-[1.8rem] border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#0f1419] p-5 md:p-8 space-y-6">
      <div class="flex flex-wrap items-end justify-between gap-4">
        <div>
          <h2 class="text-2xl md:text-3xl font-black tracking-tight">Наблюдательный комитет</h2>
          <p class="text-sm text-zinc-600 dark:text-zinc-300 mt-1">Около 100 участников. Быстрый обзор + детальная карточка по клику.</p>
        </div>
        <div class="text-xs font-semibold text-zinc-500">Визуальный формат: preview grid + modal + country focus</div>
      </div>

      <div id="committeePreview" class="grid gap-x-6 gap-y-6 [grid-template-columns:repeat(auto-fill,minmax(5.5rem,1fr))]"></div>
      <div class="flex justify-center">
        <button id="committeeLoadMore" class="px-5 py-2.5 rounded-xl border border-zinc-200 dark:border-white/10 text-sm font-bold hover:border-accent">Показать ещё</button>
      </div>

      <div class="grid md:grid-cols-[280px_1fr] gap-4 items-start pt-1">
        <div>
          <label for="committeeCountry" class="text-[11px] uppercase tracking-wider font-bold text-zinc-500">Select by country</label>
          <select id="committeeCountry" class="mt-2 w-full rounded-xl border border-zinc-200 dark:border-white/10 bg-zinc-50 dark:bg-white/5 px-3 py-2 text-sm">
            <option value="">Выберите страну</option>
          </select>
        </div>

        <div id="committeeCarouselWrap" class="hidden">
          <div class="flex justify-end gap-2 mb-2">
            <button class="w-9 h-9 rounded-lg border border-zinc-200 dark:border-white/10" data-committee-prev><i data-lucide="chevron-left" class="w-4 h-4 mx-auto"></i></button>
            <button class="w-9 h-9 rounded-lg border border-zinc-200 dark:border-white/10" data-committee-next><i data-lucide="chevron-right" class="w-4 h-4 mx-auto"></i></button>
          </div>
          <div class="overflow-hidden">
            <div id="committeeCarousel" class="flex transition-transform duration-300"></div>
          </div>
        </div>
      </div>
    </section>

    <footer class="rounded-3xl border border-zinc-200 dark:border-white/10 bg-zinc-50 dark:bg-[#0d1217] px-5 py-6">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
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
    <div class="w-full max-w-md rounded-3xl border border-zinc-200 dark:border-white/10 bg-white dark:bg-[#111821] p-5 relative">
      <button class="absolute right-3 top-3 w-9 h-9 rounded-xl border border-zinc-200 dark:border-white/10" data-modal-close><i data-lucide="x" class="w-4 h-4 mx-auto"></i></button>
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

    window.addEventListener('resize', updateNews);

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
        <div class="rounded-2xl border border-zinc-200 dark:border-white/10 bg-zinc-50 dark:bg-white/5 p-4 h-full">
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
          <div class="flex flex-wrap gap-2">${m.socialLinks.map((s) => `<a href="${s.url}" class="w-8 h-8 rounded-lg border border-zinc-200 dark:border-white/10 grid place-items-center"><i data-lucide="${socialIcon(s.type)}" class="w-4 h-4"></i></a>`).join('')}</div>
        </div>
      </div>`;

    const renderPreviewBatch = () => {
      const next = members.slice(previewCount, previewCount + batch);
      next.forEach((m) => {
        const btn = document.createElement('button');
        btn.className = 'group relative w-[92px] h-[92px] md:w-[100px] md:h-[100px] mx-auto rounded-2xl overflow-hidden border border-zinc-200 dark:border-white/10 hover:border-accent hover:-translate-y-0.5 transition-all';
        btn.innerHTML = `<img src="${m.avatar}" alt="${m.firstName}" class="w-full h-full object-cover"><span class="absolute bottom-1 right-1 text-lg">${m.countryFlag}</span><span class="absolute inset-0 opacity-0 group-hover:opacity-100 bg-gradient-to-t from-black/40 to-transparent transition-opacity"></span>`;
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

    if (window.lucide) window.lucide.createIcons();
  })();
</script>
