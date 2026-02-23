<!doctype html>
<html lang="ru" class="dark">

<?php include __DIR__ . '/partials/head.php'; ?>

<style>
.chart-segment {
  transition: all 0.3s ease;
  cursor: pointer;
  stroke-width: 8;
  opacity: 0.8;
}

.chart-segment:hover,
.chart-segment.active {
  stroke-width: 11;
  opacity: 1;
}

/* Исправленный конфликт стилей: используем !important для победы над специфичностью Tailwind dark: */
.category-item.active {
  background-color: rgba(0, 176, 116, 0.08) !important;
  /* Устанавливаем бордер цвета accent/10 (rgba) */
  border-color: rgba(0, 176, 116, 0.1) !important;
}
</style>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">

    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>
    <div class="flex-1 flex flex-col min-w-0 h-screen relative pb-15 lg:pb-0">
      <?php include __DIR__ . '/partials/header.php'; ?>

      <main class="flex-1 overflow-y-auto px-4 py-6 lg:p-10">
        <div class="max-w-7xl mx-auto space-y-6">
          <div class="flex flex-col items-start md:flex-row md:items-center justify-between gap-4">
            <div>
              <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-white text-left">
                Финансовый отчёт</h1>
              <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Статистика расходов по категориям</p>
            </div>
            <div class="flex items-center gap-3">
              <!-- Селект Года -->
              <div class="relative">
                <select
                  class="bg-white dark:bg-zinc-800/50 border border-zinc-200 dark:border-zinc-700 text-zinc-800 dark:text-zinc-200 text-sm font-bold py-2.5 pl-4 pr-10 rounded-xl appearance-none focus:outline-none focus:ring-2 focus:ring-accent/50 transition-all cursor-pointer">
                  <option>2025</option>
                  <option>2024</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  aria-hidden="true"
                  class="lucide lucide-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-zinc-400 dark:text-zinc-500 w-4 h-4 pointer-events-none">
                  <path d="m6 9 6 6 6-6"></path>
                </svg>
              </div>

              <!-- Селект Месяца -->
              <div class="relative">
                <select
                  class="bg-white dark:bg-zinc-800/50 border border-zinc-200 dark:border-zinc-700 text-zinc-800 dark:text-zinc-200 text-sm font-bold py-2.5 pl-4 pr-10 rounded-xl appearance-none focus:outline-none focus:ring-2 focus:ring-accent/50 transition-all cursor-pointer">
                  <option>Декабрь</option>
                  <option>Ноябрь</option>
                  <option>Октябрь</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  aria-hidden="true"
                  class="lucide lucide-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-zinc-400 dark:text-zinc-500 w-4 h-4 pointer-events-none">
                  <path d="m6 9 6 6 6-6"></path>
                </svg>
              </div>
            </div>
          </div>
          <!-- Main area -->
          <div class="flex flex-col lg:flex-row gap-6 xl:gap-10 items-start">
            <!-- List Column -->
            <div class="flex-1 w-full order-1 md:order-0">
              <div class="space-y-2" id="category-container">
                <!-- Items will be injected by JS -->
              </div>
              <!-- CTA -->
              <div class="mt-8 p-5 bg-accent/10 border border-accent/20 rounded-2xl max-w-md mx-auto">
                <h4 class="text-base font-bold text-accent uppercase  mb-2">Наблюдательный комитет</h4>
                <p class="text-sm text-zinc-600 dark:text-zinc-400  mb-4">Заинтересованным партнерам отчёты доступны с
                  указанием точных сумм в долларах.</p>
                <button
                  class="px-4 py-3 bg-accent hover:bg-accent/90 text-white text-sm font-bold rounded-lg transition-all w-full">
                  Подать заявку
                </button>
              </div>
            </div>
            <!-- Sticky Chart Column -->
            <div class="w-full lg:w-auto xl:w-[320px] lg:sticky lg:top-0 flex flex-col items-center">
              <div class="relative w-[240px] h-[240px] md:w-[280px] md:h-[280px]">
                <svg id="main-svg" viewBox="0 0 100 100" class="transform -rotate-90 w-full h-full">
                  <circle cx="50" cy="50" r="40" fill="transparent" stroke="currentColor"
                    class="text-zinc-200 dark:text-zinc-800" stroke-width="8" />
                  <!-- Segments will be injected by JS -->
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center pointer-events-none">
                  <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-500 mb-1">Всего</span>
                  <span class="text-3xl font-black text-zinc-900 dark:text-white">100%</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>

  <?php include __DIR__ . '/partials/mobile-sidebar.php'; ?>
  <?php include __DIR__ . '/partials/mobile-user-drawer.php'; ?>
  <?php include __DIR__ . '/partials/mobile-bottom-nav.php'; ?>

  <?php include __DIR__ . '/partials/overlays.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>

  <script>
  (function() {
    const data = [{
        label: "Выплата по партнерской программе",
        value: 31.45,
        color: "#EAB308"
      },
      {
        label: "Патентование",
        value: 26.05,
        color: "#6366F1"
      },
      {
        label: "Аренда платформы",
        value: 11.87,
        color: "#10B981"
      },
      {
        label: "Заработная плата сотрудников",
        value: 11.25,
        color: "#0EA5E9"
      },
      {
        label: "Мероприятие (Россия)",
        value: 5.16,
        color: "#D946EF"
      },
      {
        label: "Аренда офисов",
        value: 4.89,
        color: "#F97316"
      },
      {
        label: "Транспортные расходы",
        value: 2.62,
        color: "#64748B"
      },
      {
        label: "Оплата партнёров компаний инженеров",
        value: 2.08,
        color: "#F43F5E"
      },
      {
        label: "Оплата кредита транспортного средства",
        value: 1.77,
        color: "#8B5CF6"
      },
      {
        label: "Юридические услуги",
        value: 1.12,
        color: "#06B6D4"
      },
      {
        label: "Расходы на транспортные средства",
        value: 0.77,
        color: "#84CC16"
      },
      {
        label: "Организация клипов",
        value: 0.66,
        color: "#EC4899"
      },
      {
        label: "Товарный знак (Китай)",
        value: 0.31,
        color: "#F59E0B"
      }
    ];

    const svg = document.getElementById('main-svg');
    const container = document.getElementById('category-container');
    const circleLength = 2 * Math.PI * 40;
    let currentOffset = 0;

    data.forEach((item, index) => {
      const dashArrayValue = (item.value / 100) * circleLength;

      // SVG Segment
      const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
      circle.setAttribute("cx", "50");
      circle.setAttribute("cy", "50");
      circle.setAttribute("r", "40");
      circle.setAttribute("fill", "transparent");
      circle.setAttribute("stroke", item.color);
      circle.setAttribute("stroke-dasharray", `${dashArrayValue} ${circleLength}`);
      circle.setAttribute("stroke-dashoffset", -currentOffset);
      circle.classList.add("chart-segment");
      circle.dataset.index = index;
      svg.appendChild(circle);

      // List Item
      const div = document.createElement('div');
      div.className =
        "category-item flex items-center justify-between card-simple py-2 transition-all hover:border-accent/30 cursor-pointer group fade-in";
      div.style.animationDelay = `${index * 0.05}s`;
      div.dataset.index = index;
      div.innerHTML = `
                <div class="flex items-start gap-4 pr-4">
                    <div class="w-2.5 h-2.5 rounded-full mt-1 shrink-0 shadow-sm" style="background-color: ${item.color}"></div>
                    <span class="text-[13px] md:text-sm font-semibold text-zinc-600 dark:text-zinc-400 group-hover:text-zinc-900 dark:group-hover:text-white transition-colors leading-snug">
                        ${item.label}
                    </span>
                </div>
                <div class="shrink-0 text-right">
                    <span class="text-sm font-bold tabular-nums tracking-tight" style="color: ${item.color}">${item.value.toFixed(2)}%</span>
                </div>
            `;
      container.appendChild(div);

      currentOffset += dashArrayValue;
    });

    // Interactivity
    const segments = document.querySelectorAll('.chart-segment');
    const items = document.querySelectorAll('.category-item');

    function highlight(idx) {
      segments.forEach(s => s.classList.remove('active'));
      items.forEach(i => i.classList.remove('active'));
      if (idx !== null) {
        segments[idx].classList.add('active');
        items[idx].classList.add('active');
      }
    }

    segments.forEach((s, idx) => {
      s.onmouseenter = () => highlight(idx);
      s.onmouseleave = () => highlight(null);
    });

    items.forEach((i, idx) => {
      i.onmouseenter = () => highlight(idx);
      i.onmouseleave = () => highlight(null);
    });

  })();
  </script>
</body>

</html>