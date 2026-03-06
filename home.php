<!doctype html>
<html lang="ru" class="dark">
<?php include __DIR__ . '/partials/head.php'; ?>
<style type="text/tailwindcss">
  <?php include __DIR__ . '/css/landing.css'; ?>
</style>

<body>
  <div id="app" class="flex overflow-hidden min-h-screen">
    <?php include __DIR__ . '/partials/desktop-sidebar.php'; ?>
    <div class="page-content-area">
      <?php include __DIR__ . '/partials/header.php'; ?>
      <div class="flex-1 overflow-y-auto">
        <!-- Main View -->
        <main class="page-main-landing">
          <!-- ═══════════════════ HERO ═══════════════════ -->
          <section class="hero">
            <div class="hero-bg"></div>
            <div class="hero-grid"></div>
            <div class="container">
              <div class="hero-inner">
                <div class="hero-content">
                  <div class="hero-eyebrow">
                    <div class="live-dot">Инвестирование открыто</div>
                    <span class="tag">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                        <polyline points="16 7 22 7 22 13" />
                      </svg>
                      Проецированный ROI 15%
                    </span>
                  </div>

                  <h1>
                    Посмотрите на себя<br>
                    <span class="line2">из зазеркалья</span>
                  </h1>

                  <p class="hero-desc">
                    Инвестируйте в проект умного зеркала с технологией, позволяющей показывать обратную сторону тела. Ранний раунд — только 15% долей в продаже.
                  </p>

                  <div class="hero-btns">
                    <a href="deposit.php" class="btn-primary">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <polygon points="10 8 16 12 10 16 10 8" />
                      </svg>
                      Начать инвестировать
                    </a>
                    <a href="#tech" class="btn-ghost">Узнать больше</a>
                  </div>

                  <div class="hero-stats">
                    <div class="hstat">
                      <div class="hstat-val text-accent">$2.5M</div>
                      <div class="hstat-label">Уже инвестировано</div>
                    </div>
                    <div class="hstat">
                      <div class="hstat-val">850+</div>
                      <div class="hstat-label">Активных инвесторов</div>
                    </div>
                    <div class="hstat">
                      <div class="hstat-val text-cyan">15%</div>
                      <div class="hstat-label">Проецируемый ROI</div>
                    </div>
                  </div>
                </div>

                <div class="hero-visual">
                  <div class="hero-img-wrap">
                    <img src="https://ik.imagekit.io/dilanmirror/dmr/dmr3.png" alt="Dilan Mirror">
                    <div class="hero-badge hero-badge-top">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                        <polyline points="22 4 12 14.01 9 11.01" />
                      </svg>
                      <div>
                        <div class="val">Только 15%</div>
                        <div class="sub">долей доступно</div>
                      </div>
                    </div>
                    <div class="hero-badge hero-badge-bottom">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                        <polyline points="17 6 23 6 23 12" />
                      </svg>
                      <div>
                        <div class="val">+31% рост</div>
                        <div class="sub">активности за месяц</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- ═══════════════════ STATS BAND ═══════════════════ -->
          <div class="stats-band">
            <div class="container">
              <div class="stats-grid">
                <div class="stat-item">
                  <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                    </svg>
                  </div>
                  <div class="stat-num green" data-count="2.5" data-prefix="$" data-suffix="M">$0M</div>
                  <div class="stat-label">Суммарно инвестировано</div>
                </div>
                <div class="stat-item">
                  <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                      <circle cx="9" cy="7" r="4" />
                      <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                      <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                  </div>
                  <div class="stat-num" data-count="850" data-suffix="+">0</div>
                  <div class="stat-label">Активных инвесторов</div>
                </div>
                <div class="stat-item">
                  <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                      <polyline points="16 7 22 7 22 13" />
                    </svg>
                  </div>
                  <div class="stat-num cyan" data-count="15" data-suffix="%">0%</div>
                  <div class="stat-label">Проецируемый ROI</div>
                </div>
                <div class="stat-item">
                  <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                      <path d="m9 12 2 2 4-4" />
                    </svg>
                  </div>
                  <div class="stat-num green" data-count="40" data-suffix="%">0%</div>
                  <div class="stat-label">Реферальный доход</div>
                </div>
              </div>
            </div>
          </div>

          <!-- ═══════════════════ TECH SECTION ═══════════════════ -->
          <section class="section" id="tech">
            <div class="container">
              <div class="tech-grid reveal">
                <!-- Left: mirror tech -->
                <div class="landing-card card-glow tech-main-card">
                  <div class="tag tag-mb-20">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="11" cy="11" r="8" />
                      <path d="m21 21-4.35-4.35" />
                    </svg>
                    Технология
                  </div>
                  <h2 class="mb-16">Умное зеркало<br><span class="text-accent">нового поколения</span></h2>
                  <p class="text-muted mb-32 lh-175">
                    Dilan Mirror — это технология, позволяющая видеть обратную сторону собственного тела в реальном времени. Революционный продукт, открывающий новое измерение самопознания и заботы о здоровье.
                  </p>

                  <div class="phil-grid">
                    <div class="phil-item phil-item-split">
                      <div class="phil-head">
                        <div class="phil-ico">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                            <circle cx="12" cy="12" r="3" />
                          </svg>
                        </div>
                        <div>
                          <div class="phil-num">01 / Vision</div>
                          <h4>360° обзор тела</h4>
                        </div>
                      </div>
                      <p class="phil-desc">Полный угол обзора без слепых зон.</p>
                    </div>
                    <div class="phil-item phil-item-split">
                      <div class="phil-head">
                        <div class="phil-ico">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                          </svg>
                        </div>
                        <div>
                          <div class="phil-num">02 / Research</div>
                          <h4>Реальная экспертиза</h4>
                        </div>
                      </div>
                      <p class="phil-desc">Модель создана практиками рынка.</p>
                    </div>
                    <div class="phil-item phil-item-split">
                      <div class="phil-head">
                        <div class="phil-ico">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" />
                            <line x1="8" y1="21" x2="16" y2="21" />
                            <line x1="12" y1="17" x2="12" y2="21" />
                          </svg>
                        </div>
                        <div>
                          <div class="phil-num">03 / Scale</div>
                          <h4>Данные в центре</h4>
                        </div>
                      </div>
                      <p class="phil-desc">Решения на основе аналитики.</p>
                    </div>
                    <div class="phil-item phil-item-split">
                      <div class="phil-head">
                        <div class="phil-ico">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3v18h18" />
                            <path d="m19 9-5 5-4-4-3 3" />
                          </svg>
                        </div>
                        <div>
                          <div class="phil-num">04 / Risk</div>
                          <h4>Лидирующий рост</h4>
                        </div>
                      </div>
                      <p class="phil-desc">Стабильное расширение экосистемы.</p>
                    </div>
                  </div>
                </div>

                <!-- Right: philosophy -->
                <div class="tech-side-stack">
                  <div class="landing-card tech-side-card">
                    <div class="tech-icon-big">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 8v4l3 3" />
                      </svg>
                    </div>
                    <h3>Ограниченный раунд</h3>
                    <p class="text-muted mt-8">Только 15% долей компании выставлено в открытую продажу. Ограниченное окно — ранний вход по лучшей цене.</p>
                    <div class="mt-20">
                      <div class="row-between mb-6">
                        <span class="text-xs text-muted">Доступно для продажи</span>
                        <span class="text-xs font-bold text-accent">15%</span>
                      </div>
                      <div class="progress-track">
                        <div class="progress-fill-15"></div>
                      </div>
                    </div>
                  </div>

                  <div class="landing-card tech-side-card">
                    <div class="tech-icon-big tech-icon-big-cyan">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-cyan">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                        <polyline points="22 4 12 14.01 9 11.01" />
                      </svg>
                    </div>
                    <h3>Прозрачная структура</h3>
                    <p class="text-muted mt-8">Все условия документированы. Доли конвертируются в акции по утверждённой модели после завершения этапов развития.</p>
                    <div class="chip-row">
                      <span class="chip chip-cat text-xs">Доли → Акции</span>
                      <span class="chip chip-cat text-xs">Юридический пакет</span>
                      <span class="chip chip-cat text-xs">Контролируемый рост</span>
                    </div>
                  </div>

                  <div class="landing-card tech-side-card tech-side-card-last">
                    <div class="row-center-16">
                      <div class="violet-icon-box">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#a855f7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                          <circle cx="9" cy="7" r="4" />
                          <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                          <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                      </div>
                      <div>
                        <div class="text-xl font-extrabold leading-none text-violet-500 ff-head">100+</div>
                        <div class="mt-1 text-xs text-muted">участников наблюдательного комитета</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- ═══════════════════ REFERRAL ═══════════════════ -->
          <section class="section section-alt" id="referral">
            <div class="container">
              <div class="reveal text-center mb-56">
                <div class="tag tag-mb-14">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                  </svg>
                  Реферальная программа
                </div>
                <h2>Доход от роста вашей команды</h2>
                <p class="text-muted mt-12 maxw-560 mx-auto">
                  Прозрачная механика выплат с фокусом на стабильный рост структуры и понятное распределение для каждого уровня.
                </p>
              </div>

              <div class="ref-wrapper reveal">
                <!-- Levels -->
                <div>
                  <div class="ref-levels">
                    <div class="ref-level">
                      <div class="ref-level-num lvl-1">L1</div>
                      <div class="ref-level-body">
                        <div class="l-label">Уровень 1 · Прямые рефералы</div>
                        <div class="l-name">Ваши приглашённые</div>
                        <div class="ref-bar-wrap">
                          <div class="ref-bar bar-1 w-100"></div>
                        </div>
                      </div>
                      <div class="ref-pct pct-1">10%</div>
                    </div>

                    <div class="ref-level">
                      <div class="ref-level-num lvl-2">L2</div>
                      <div class="ref-level-body">
                        <div class="l-label">Уровень 2 · Команда рефералов</div>
                        <div class="l-name">Их приглашённые</div>
                        <div class="ref-bar-wrap">
                          <div class="ref-bar bar-2 w-50"></div>
                        </div>
                      </div>
                      <div class="ref-pct pct-2">5%</div>
                    </div>

                    <div class="ref-level">
                      <div class="ref-level-num lvl-3">L3</div>
                      <div class="ref-level-body">
                        <div class="l-label">Уровень 3 · Глубокая сеть</div>
                        <div class="l-name">Расширенная структура</div>
                        <div class="ref-bar-wrap">
                          <div class="ref-bar bar-3 w-20"></div>
                        </div>
                      </div>
                      <div class="ref-pct pct-3">2%</div>
                    </div>

                    <div class="landing-card p-24 mt-8">
                      <div class="row-between-center mb-12">
                        <div>
                          <div class="mb-1 text-xs text-muted">Суммарная глубина структуры</div>
                          <div class="text-xl font-extrabold text-accent ff-head">до 23%</div>
                        </div>
                        <div class="text-right">
                          <div class="text-xs text-muted">Максимальный пул</div>
                          <div class="text-xl font-extrabold ff-head">до 40%</div>
                        </div>
                      </div>
                      <div class="deep-bar-wrap deep-bar-wrap-lg">
                        <div class="deep-bar"></div>
                      </div>
                      <p class="mt-3 text-sm leading-relaxed text-muted">
                        При росте глубины команда продолжает участвовать в распределении. Система автоматически делит долю справедливо по активным уровням.
                      </p>
                    </div>
                  </div>
                </div>

                <!-- Pyramid visual -->
                <div class="ref-visual">
                  <div class="pyramid-card">
                    <div class="pyramid-title">Визуализация реферальной структуры</div>

                    <div class="pyramid-tree">
                      <!-- YOU -->
                      <div class="pyramid-row">
                        <div class="pnode pnode-you">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg>
                        </div>
                      </div>
                      <!-- connector -->
                      <div class="py-connector-line"></div>
                      <!-- L1 row label -->
                      <div class="pyramid-label-row">
                        <div class="line-flex border2"></div>
                        <span class="text-xs font-bold tracking-[0.1em] text-accent">L1 · 10%</span>
                        <div class="line-flex border2"></div>
                      </div>
                      <!-- L1 nodes -->
                      <div class="pyramid-row pyramid-row-l1">
                        <div class="pnode pnode-l1">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg>
                        </div>
                        <div class="pnode pnode-l1">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg>
                        </div>
                        <div class="pnode pnode-l1">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg>
                        </div>
                      </div>
                      <div class="line-80 border2"></div>
                      <!-- L2 label -->
                      <div class="pyramid-label-row l2">
                        <div class="line-flex cyan"></div>
                        <span class="text-xs font-bold tracking-[0.1em] text-cyan">L2 · 5%</span>
                        <div class="line-flex cyan"></div>
                      </div>
                      <!-- L2 nodes -->
                      <div class="pyramid-row pyramid-row-l2">
                        <div class="pnode pnode-l2 h-8 w-8 text-xs">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="12" height="12">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg>
                        </div>
                        <div class="pnode pnode-l2 h-8 w-8 text-xs">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="12" height="12">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg>
                        </div>
                        <div class="pnode pnode-l2 h-8 w-8 text-xs">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="12" height="12">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg>
                        </div>
                        <div class="pnode pnode-l2 h-8 w-8 text-xs">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="12" height="12">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg>
                        </div>
                        <div class="pnode pnode-l2 h-8 w-8 text-xs">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="12" height="12">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg>
                        </div>
                        <div class="pnode pnode-l2 h-8 w-8 text-xs">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="12" height="12">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg>
                        </div>
                      </div>
                      <div class="line-90 violet"></div>
                      <!-- L3 label -->
                      <div class="pyramid-label-row l3">
                        <div class="line-flex violet"></div>
                        <span class="text-xs font-bold tracking-[0.1em] text-violet-500">L3 · 2%</span>
                        <div class="line-flex violet"></div>
                      </div>
                      <!-- L3 nodes -->
                      <div class="pyramid-row pyramid-row-l3">
                        <div class="pnode pnode-l3 h-[26px] w-[26px] text-xs"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="10" height="10">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg></div>
                        <div class="pnode pnode-l3 h-[26px] w-[26px] text-xs"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="10" height="10">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg></div>
                        <div class="pnode pnode-l3 h-[26px] w-[26px] text-xs"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="10" height="10">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg></div>
                        <div class="pnode pnode-l3 h-[26px] w-[26px] text-xs"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="10" height="10">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg></div>
                        <div class="pnode pnode-l3 h-[26px] w-[26px] text-xs"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="10" height="10">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg></div>
                        <div class="pnode pnode-l3 h-[26px] w-[26px] text-xs"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="10" height="10">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg></div>
                        <div class="pnode pnode-l3 h-[26px] w-[26px] text-xs"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="10" height="10">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg></div>
                        <div class="pnode pnode-l3 h-[26px] w-[26px] text-xs"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="10" height="10">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                          </svg></div>
                      </div>
                    </div>

                    <div class="ref-summary">
                      <div>
                        <div class="text-xs text-muted">Максимум с реф. структуры</div>
                        <div class="text-xl font-extrabold leading-tight text-accent ff-head">40%</div>
                      </div>
                      <div class="text-right">
                        <div class="text-xs text-muted">Глубина</div>
                        <div class="text-lg font-extrabold ff-head">Нет лимита</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- ═══════════════════ NEWS ═══════════════════ -->
          <section class="section" id="news">
            <div class="container">
              <div class="news-header reveal">
                <div>
                  <div class="tag tag-mb-10">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                      <path d="M18 14h-8" />
                      <path d="M15 18h-5" />
                      <path d="M10 6h8v4h-8V6Z" />
                    </svg>
                    Обновления
                  </div>
                  <h2>Последние новости</h2>
                </div>
                <a href="#" class="news-link">Все новости →</a>
              </div>

              <div class="news-track-wrap reveal">
                <div class="news-track" id="newsTrack">
                  <!-- News cards -->
                  <div class="news-card">
                    <div class="news-inner">
                      <div class="news-thumb">
                        <div class="news-thumb-glow"></div>
                        <div class="news-thumb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                            <polyline points="16 7 22 7 22 13" />
                          </svg></div>
                        <div class="news-chips">
                          <span class="chip chip-cat">Инвестиции</span>
                          <span class="chip chip-date">03.03.2026</span>
                        </div>
                      </div>
                      <div class="news-body">
                        <h3 class="line-clamp-2">Открыт ранний раунд инвестиций</h3>
                        <p class="line-clamp-3">В открытую продажу выведено только 15% долей. Это ограниченное окно для раннего входа.</p>
                      </div>
                    </div>
                  </div>
                  <div class="news-card">
                    <div class="news-inner">
                      <div class="news-thumb">
                        <div class="news-thumb-glow"></div>
                        <div class="news-thumb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                          </svg></div>
                        <div class="news-chips">
                          <span class="chip chip-cat">Партнёрка</span>
                          <span class="chip chip-date">28.02.2026</span>
                        </div>
                      </div>
                      <div class="news-body">
                        <h3 class="line-clamp-2">Обновлена партнёрская программа с новой аналитикой уровней</h3>
                        <p class="line-clamp-3">Сделали систему вознаграждений более прозрачной и понятной для новых участников.</p>
                      </div>
                    </div>
                  </div>
                  <div class="news-card">
                    <div class="news-inner">
                      <div class="news-thumb">
                        <div class="news-thumb-glow news-thumb-glow-cyan"></div>
                        <div class="news-thumb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                          </svg></div>
                        <div class="news-chips">
                          <span class="chip chip-cat">Отчётность</span>
                          <span class="chip chip-date">21.02.2026</span>
                        </div>
                      </div>
                      <div class="news-body">
                        <h3 class="line-clamp-2">Запущен формат ежемесячных отчётов</h3>
                        <p class="line-clamp-3">Ключевые метрики развития теперь доступны в регулярных апдейтах с акцентом на рост.</p>
                      </div>
                    </div>
                  </div>
                  <div class="news-card">
                    <div class="news-inner">
                      <div class="news-thumb">
                        <div class="news-thumb-glow news-thumb-glow-violet"></div>
                        <div class="news-thumb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                          </svg></div>
                        <div class="news-chips">
                          <span class="chip chip-cat">Комьюнити</span>
                          <span class="chip chip-date">16.02.2026</span>
                        </div>
                      </div>
                      <div class="news-body">
                        <h3 class="line-clamp-2">Расширена география комитета</h3>
                        <p class="line-clamp-3">В наблюдательный комитет вошли новые представители из разных стран и отраслей.</p>
                      </div>
                    </div>
                  </div>
                  <div class="news-card">
                    <div class="news-inner">
                      <div class="news-thumb">
                        <div class="news-thumb-glow"></div>
                        <div class="news-thumb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                          </svg></div>
                        <div class="news-chips">
                          <span class="chip chip-cat">Правовая база</span>
                          <span class="chip chip-date">11.02.2026</span>
                        </div>
                      </div>
                      <div class="news-body">
                        <h3 class="line-clamp-2">Юридический пакет обновлён</h3>
                        <p class="line-clamp-3">Актуализированы документы по долям, акционерной модели и пользовательским условиям.</p>
                      </div>
                    </div>
                  </div>
                  <div class="news-card">
                    <div class="news-inner">
                      <div class="news-thumb">
                        <div class="news-thumb-glow news-thumb-glow-mix"></div>
                        <div class="news-thumb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                            <polyline points="17 6 23 6 23 12" />
                          </svg></div>
                        <div class="news-chips">
                          <span class="chip chip-cat">Продукт</span>
                          <span class="chip chip-date">05.02.2026</span>
                        </div>
                      </div>
                      <div class="news-body">
                        <h3 class="line-clamp-2">Рост активности инвесторов +31%</h3>
                        <p class="line-clamp-3">Увеличилось число новых подключений и повторных инвестиций.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="news-controls">
                <button class="news-btn" id="newsPrev">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6" />
                  </svg>
                </button>
                <button class="news-btn" id="newsNext">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </button>
              </div>
            </div>
          </section>

          <!-- ═══════════════════ WHY NOW ═══════════════════ -->
          <section class="section section-alt">
            <div class="container">
              <div class="reveal text-center mb-48">
                <div class="tag tag-mb-14">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <polyline points="12 6 12 12 16 14" />
                  </svg>
                  Почему сейчас
                </div>
                <h2>Инвесторы заходят <span class="text-accent">сегодня</span></h2>
              </div>

              <div class="why-grid reveal">
                <div class="why-card">
                  <div class="why-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                      <path d="m9 12 2 2 4-4" />
                    </svg>
                  </div>
                  <h3>Ограниченный пул</h3>
                  <p>В продаже только <span class="why-highlight">15%</span> — это создаёт дефицит предложения и защищает цену доли для ранних инвесторов.</p>
                </div>
                <div class="why-card">
                  <div class="why-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                      <circle cx="12" cy="12" r="3" />
                    </svg>
                  </div>
                  <h3>Прозрачная модель</h3>
                  <p>Реферальная система «до <span class="why-highlight">40%</span>» объяснима, масштабируется с глубиной сети и не требует скрытых условий.</p>
                </div>
                <div class="why-card">
                  <div class="why-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                      <circle cx="9" cy="7" r="4" />
                      <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                      <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                  </div>
                  <h3>Сильное комьюнити</h3>
                  <p>Наблюдательный комитет из <span class="why-highlight">100+</span> участников и регулярные новости повышают доверие к проекту.</p>
                </div>
              </div>

              <!-- ROI infographic strip -->
              <div class="landing-card reveal mt-24 p-24-16">
                <div class="roi-steps">
                  <div class="roi-step">
                    <div class="roi-step-label">Шаг 1</div>
                    <div class="roi-step-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <line x1="19" y1="8" x2="19" y2="14" />
                        <line x1="22" y1="11" x2="16" y2="11" />
                      </svg></div>
                    <div class="roi-step-title">Регистрация</div>
                    <div class="roi-step-sub">Создайте аккаунт</div>
                  </div>
                  <div class="roi-step">
                    <div class="roi-step-label">Шаг 2</div>
                    <div class="roi-step-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                      </svg></div>
                    <div class="roi-step-title">Инвестиция</div>
                    <div class="roi-step-sub">Покупка долей</div>
                  </div>
                  <div class="roi-step roi-step-wide">
                    <div class="roi-step-label">Результат</div>
                    <div class="roi-step-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v18h18" />
                        <path d="m19 9-5 5-4-4-3 3" />
                      </svg></div>
                    <div class="roi-step-title">Ожидание IPO</div>
                    <div class="roi-step-sub">Доли станут акциями после выхода компании на IPO</div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- ═══════════════════ FAQ ═══════════════════ -->
          <section class="section" id="faq">
            <div class="container">
              <div class="faq-wrap">
                <div class="reveal mb-36">
                  <div class="tag tag-mb-14">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="10" />
                      <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                      <path d="M12 17h.01" />
                    </svg>
                    FAQ
                  </div>
                  <h2>Частые вопросы</h2>
                </div>

                <div class="faq-tabs reveal">
                  <button class="faq-tab active" data-group="0">Про инвестиции</button>
                  <button class="faq-tab" data-group="1">Про реферальную программу</button>
                  <button class="faq-tab" data-group="2">Про платформу</button>
                </div>

                <!-- Group 0 -->
                <div class="faq-group active reveal" data-faq-group="0">
                  <div class="faq-item">
                    <button class="faq-btn" aria-expanded="false">
                      <span class="faq-q">Что я получаю, когда инвестирую?</span>
                      <div class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="12" y1="5" x2="12" y2="19" />
                          <line x1="5" y1="12" x2="19" y2="12" />
                        </svg></div>
                    </button>
                    <div class="faq-panel">
                      <div class="faq-panel-inner">Вы получаете доли компании. Позже, по плану развития, эти доли переходят в акции в рамках утверждённой корпоративной модели.</div>
                    </div>
                  </div>
                  <div class="faq-item">
                    <button class="faq-btn" aria-expanded="false">
                      <span class="faq-q">Почему на продажу выставлено только 15%?</span>
                      <div class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="12" y1="5" x2="12" y2="19" />
                          <line x1="5" y1="12" x2="19" y2="12" />
                        </svg></div>
                    </button>
                    <div class="faq-panel">
                      <div class="faq-panel-inner">Мы открыли ограниченный объём для раннего раунда, чтобы сохранить управляемую структуру капитала и обеспечить качественный рост проекта.</div>
                    </div>
                  </div>
                  <div class="faq-item">
                    <button class="faq-btn" aria-expanded="false">
                      <span class="faq-q">Какой сценарий после покупки долей?</span>
                      <div class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="12" y1="5" x2="12" y2="19" />
                          <line x1="5" y1="12" x2="19" y2="12" />
                        </svg></div>
                    </button>
                    <div class="faq-panel">
                      <div class="faq-panel-inner">После завершения этапов развития и корпоративных процедур доли конвертируются в акции в рамках утверждённой модели.</div>
                    </div>
                  </div>
                </div>

                <!-- Group 1 -->
                <div class="faq-group" data-faq-group="1">
                  <div class="faq-item">
                    <button class="faq-btn" aria-expanded="false">
                      <span class="faq-q">Что значит «до 40%» простыми словами?</span>
                      <div class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="12" y1="5" x2="12" y2="19" />
                          <line x1="5" y1="12" x2="19" y2="12" />
                        </svg></div>
                    </button>
                    <div class="faq-panel">
                      <div class="faq-panel-inner">Первые три рекомендации дают вам 10%, 5% и 2%. Далее остаётся часть вознаграждения, которая распределяется по вашей растущей структуре.</div>
                    </div>
                  </div>
                  <div class="faq-item">
                    <button class="faq-btn" aria-expanded="false">
                      <span class="faq-q">Если сеть очень глубокая — доход теряется?</span>
                      <div class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="12" y1="5" x2="12" y2="19" />
                          <line x1="5" y1="12" x2="19" y2="12" />
                        </svg></div>
                    </button>
                    <div class="faq-panel">
                      <div class="faq-panel-inner">Доход не пропадает: оставшийся процент автоматически делится между более глубокими уровнями, чтобы система оставалась справедливой для всех участников.</div>
                    </div>
                  </div>
                  <div class="faq-item">
                    <button class="faq-btn" aria-expanded="false">
                      <span class="faq-q">Это работает только для маленькой сети?</span>
                      <div class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="12" y1="5" x2="12" y2="19" />
                          <line x1="5" y1="12" x2="19" y2="12" />
                        </svg></div>
                    </button>
                    <div class="faq-panel">
                      <div class="faq-panel-inner">Нет. Модель рассчитана и на небольшие, и на большие структуры — вы зарабатываете не только с ближних, но и с дальних уровней.</div>
                    </div>
                  </div>
                </div>

                <!-- Group 2 -->
                <div class="faq-group" data-faq-group="2">
                  <div class="faq-item">
                    <button class="faq-btn" aria-expanded="false">
                      <span class="faq-q">Сколько новостей отображается на лендинге?</span>
                      <div class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="12" y1="5" x2="12" y2="19" />
                          <line x1="5" y1="12" x2="19" y2="12" />
                        </svg></div>
                    </button>
                    <div class="faq-panel">
                      <div class="faq-panel-inner">Показываются 6 последних новостей. Рядом есть ссылка на полный список всех обновлений проекта.</div>
                    </div>
                  </div>
                  <div class="faq-item">
                    <button class="faq-btn" aria-expanded="false">
                      <span class="faq-q">Можно открывать несколько вопросов FAQ сразу?</span>
                      <div class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="12" y1="5" x2="12" y2="19" />
                          <line x1="5" y1="12" x2="19" y2="12" />
                        </svg></div>
                    </button>
                    <div class="faq-panel">
                      <div class="faq-panel-inner">Да, аккордеон работает в мульти-режиме — можно раскрыть несколько ответов одновременно.</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- ═══════════════════ COMMITTEE ═══════════════════ -->
          <section class="section section-alt" id="committee">
            <div class="container">
              <div class="reveal committee-head">
                <div>
                  <div class="tag tag-mb-12">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                      <circle cx="9" cy="7" r="4" />
                      <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                      <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                    Наблюдательный комитет
                  </div>
                  <h2>100+ участников</h2>
                </div>
              </div>

              <div class="committee-grid reveal" id="committeeGrid"></div>
              <div class="reveal load-more-wrap">
                <button id="loadMoreBtn" class="btn-ghost">Показать ещё</button>
              </div>

              <!-- Country select + carousel -->
              <div class="reveal">
                <div class="country-wrap">
                  <p class="mb-2 text-xs font-bold uppercase tracking-[0.12em] text-muted">Фильтр по стране</p>
                  <button class="country-trigger" id="countryTrigger">
                    <span id="countryVal" class="country-val">🌍 Выберите страну</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                      <path d="m6 9 6 6 6-6" />
                    </svg>
                  </button>
                  <div class="country-menu" id="countryMenu"></div>
                </div>

                <div id="carouselWrap" class="carousel-wrap">
                  <div class="cm-carousel-wrap">
                    <div class="cm-track" id="cmTrack"></div>
                  </div>
                  <div class="cm-carousel-controls">
                    <button class="cm-ctrl-btn" id="cmPrev"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6" />
                      </svg></button>
                    <button class="cm-ctrl-btn" id="cmNext"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                      </svg></button>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- ═══════════════════ CTA ═══════════════════ -->
          <section class="section">
            <div class="container">
              <div class="cta-section">
                <div class="cta-bg"></div>
                <div class="cta-grid-bg"></div>
                <div class="cta-inner">
                  <div>
                    <h2>Готовы стать частью<br><span class="text-accent">Dilan Mirror?</span></h2>
                    <p>Присоединяйтесь к ранним инвесторам и участвуйте в росте экосистемы. Осталось ограниченное количество долей.</p>
                  </div>
                  <div class="cta-btns">
                    <a href="deposit.php" class="btn-primary">
                      <i data-lucide="plus" class="icon-16"></i>
                      Инвестировать
                    </a>
                    <a href="/chat" class="btn-ghost">
                      <i data-lucide="message-circle" class="icon-16"></i>
                      Поддержка
                    </a>
                  </div>
                </div>
              </div>

              <!-- Contact strip -->
              <div class="contact-strip">
                <a href="#" class="landing-card contact-link">
                  <div class="contact-link-left">
                    <div class="contact-link-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m22 2-7 20-4-9-9-4Z" />
                        <path d="M22 2 11 13" />
                      </svg>
                    </div>
                    <span class="text-sm font-semibold">Telegram</span>
                  </div>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </a>
                <a href="#" class="landing-card contact-link">
                  <div class="contact-link-left">
                    <div class="contact-link-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                      </svg>
                    </div>
                    <span class="text-sm font-semibold">Instagram</span>
                  </div>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </a>
                <a href="#" class="landing-card contact-link">
                  <div class="contact-link-left">
                    <div class="contact-link-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z" />
                        <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" />
                      </svg>
                    </div>
                    <span class="text-sm font-semibold">YouTube</span>
                  </div>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </a>
              </div>
            </div>
          </section>

          <!-- Member modal -->
          <div class="modal animate-in fade-in duration-300" data-modal="member-details" aria-hidden="true">
            <div class="modal-backdrop animate-in fade-in duration-300" data-modal-overlay data-modal-close></div>
            <div class="modal-box p-5 pr-14 max-w-3xl animate-in zoom-in-95 fade-in duration-300" role="dialog" aria-modal="true" aria-label="Детали участника">
              <button class="modal-close absolute right-2 top-2 z-20" type="button" data-modal-close aria-label="Закрыть модалку">
                <i data-lucide="x" class="h-5 w-5"></i>
              </button>
              <div data-modal-body></div>
            </div>
          </div>

          <script>
            // ═══════════ DATA ═══════════
            const firstNames = ['Alex', 'Maria', 'Ivan', 'Sofia', 'Dmitry', 'Nora', 'Liam', 'Emma', 'Noah', 'Olivia'];
            const lastNames = ['Petrov', 'Johnson', 'Miller', 'Smirnova', 'Kim', 'Brown', 'Garcia', 'Wilson', 'Taylor', 'Lee'];
            const countries = [{
                country: 'Russia',
                city: 'Moscow',
                flag: '🇷🇺'
              },
              {
                country: 'Germany',
                city: 'Berlin',
                flag: '🇩🇪'
              },
              {
                country: 'France',
                city: 'Paris',
                flag: '🇫🇷'
              },
              {
                country: 'USA',
                city: 'New York',
                flag: '🇺🇸'
              },
              {
                country: 'UAE',
                city: 'Dubai',
                flag: '🇦🇪'
              },
              {
                country: 'Turkey',
                city: 'Istanbul',
                flag: '🇹🇷'
              },
              {
                country: 'Kazakhstan',
                city: 'Astana',
                flag: '🇰🇿'
              },
              {
                country: 'Spain',
                city: 'Madrid',
                flag: '🇪🇸'
              },
              {
                country: 'Portugal',
                city: 'Lisbon',
                flag: '🇵🇹'
              },
              {
                country: 'Italy',
                city: 'Milan',
                flag: '🇮🇹'
              },
            ];
            const socials = ['telegram', 'linkedin', 'twitter'];

            const members = Array.from({
              length: 100
            }, (_, i) => {
              const c = countries[i % countries.length];
              return {
                avatar: `https://i.pravatar.cc/160?img=${(i%70)+1}`,
                city: c.city,
                country: c.country,
                flag: c.flag,
                firstName: firstNames[i % firstNames.length],
                lastName: lastNames[(i * 2) % lastNames.length],
                id: 7000 + i,
                socials: socials.slice(0, 1 + (i % 3))
              };
            });

            // ═══════════ COUNTER ANIMATION ═══════════
            document.querySelectorAll('[data-count]').forEach(el => {
              const target = parseFloat(el.dataset.count);
              const prefix = el.dataset.prefix || '';
              const suffix = el.dataset.suffix || '';
              const decimals = String(target).includes('.') ? String(target).split('.')[1].length : 0;
              let start = null;
              const duration = 2000;
              const step = ts => {
                if (!start) start = ts;
                const progress = Math.min((ts - start) / duration, 1);
                const ease = 1 - Math.pow(1 - progress, 3);
                const val = (target * ease).toFixed(decimals);
                el.textContent = prefix + val + suffix;
                if (progress < 1) requestAnimationFrame(step);
              };
              const obs = new IntersectionObserver(entries => {
                if (entries[0].isIntersecting) {
                  requestAnimationFrame(step);
                  obs.disconnect();
                }
              }, {
                threshold: 0.5
              });
              obs.observe(el);
            });

            // ═══════════ SCROLL REVEAL ═══════════
            const revealObs = new IntersectionObserver(entries => {
              entries.forEach(e => {
                if (e.isIntersecting) {
                  e.target.classList.add('visible');
                  revealObs.unobserve(e.target);
                }
              });
            }, {
              threshold: 0.1,
              rootMargin: '0px 0px -40px 0px'
            });
            document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

            // ═══════════ NEWS SLIDER ═══════════
            let newsPage = 0;
            const track = document.getElementById('newsTrack');
            const cards = track.querySelectorAll('.news-card');
            const perView = () => window.innerWidth >= 1280 ? 3 : window.innerWidth >= 768 ? 2 : 1;
            const maxPage = () => Math.max(0, Math.ceil(cards.length / perView()) - 1);
            const updateNews = () => {
              newsPage = Math.min(newsPage, maxPage());
              track.style.transform = `translateX(-${newsPage * 100}%)`;
            };
            document.getElementById('newsPrev').addEventListener('click', () => {
              newsPage = Math.max(0, newsPage - 1);
              updateNews();
            });
            document.getElementById('newsNext').addEventListener('click', () => {
              newsPage = Math.min(maxPage(), newsPage + 1);
              updateNews();
            });
            window.addEventListener('resize', updateNews);

            // ═══════════ FAQ ═══════════
            document.querySelectorAll('.faq-tab').forEach(tab => {
              tab.addEventListener('click', () => {
                document.querySelectorAll('.faq-tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                const gi = tab.dataset.group;
                document.querySelectorAll('.faq-group').forEach(g => {
                  g.classList.toggle('active', g.dataset.faqGroup === gi);
                });
              });
            });
            document.querySelectorAll('.faq-btn').forEach(btn => {
              btn.addEventListener('click', () => {
                const expanded = btn.getAttribute('aria-expanded') === 'true';
                btn.setAttribute('aria-expanded', !expanded);
                const panel = btn.nextElementSibling;
                panel.classList.toggle('open', !expanded);
              });
            });

            // ═══════════ COMMITTEE ═══════════
            const grid = document.getElementById('committeeGrid');
            const memberModal = document.querySelector('[data-modal="member-details"]');
            const modalBody = memberModal?.querySelector('[data-modal-body]');
            let shown = 0;
            const batch = 30;

            const socialSVG = {
              telegram: '<path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>',
              linkedin: '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/>',
              twitter: '<path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>',
            };

            const renderMember = m => `
<div class="member-modal-head">
  <img src="${m.avatar}" class="member-modal-avatar">
  <div>
    <h3 class="text-lg">${m.firstName} ${m.lastName} <span class="text-lg">${m.flag}</span></h3>
    <p class="my-[2px] mt-1 text-sm text-muted">${m.city}, ${m.country}</p>
    <p class="text-xs font-bold text-label">ID: ${m.id}</p>
    <div class="member-socials">
      ${m.socials.map(s=>`<a href="#" class="member-social-link"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="var(--color-muted-foreground)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">${socialSVG[s]||''}</svg></a>`).join('')}
    </div>
  </div>
</div>`;

            const renderBatch = () => {
              const next = members.slice(shown, shown + batch);
              next.forEach((m, idx) => {
                const el = document.createElement('button');
                el.type = 'button';
                el.className = 'cm-member';
                el.setAttribute('data-member-index', String(shown + idx));
                el.setAttribute('data-modal-open', 'member-details');
                el.innerHTML = `
      <div class="cm-avatar">
        <img src="${m.avatar}" alt="${m.firstName}" loading="lazy">
        <span class="cm-flag">${m.flag}</span>
      </div>`;
                grid.appendChild(el);
              });
              shown += next.length;
              if (shown >= members.length) document.getElementById('loadMoreBtn').style.display = 'none';
            };

            grid.addEventListener('click', (e) => {
              const card = e.target.closest('.cm-member[data-member-index]');
              if (!card) return;
              const index = Number(card.getAttribute('data-member-index'));
              const member = members[index];
              if (!member || !modalBody) return;
              modalBody.innerHTML = renderMember(member);
            });

            renderBatch();
            document.getElementById('loadMoreBtn').addEventListener('click', renderBatch);

            // Country filter
            const countryMenu = document.getElementById('countryMenu');
            const uniqueCountries = [...new Set(members.map(m => m.country))].sort();
            uniqueCountries.forEach(c => {
              const first = members.find(m => m.country === c);
              const opt = document.createElement('div');
              opt.className = 'country-opt';
              opt.innerHTML = `<span class="text-base">${first.flag}</span><span>${c}</span>`;
              opt.addEventListener('click', () => {
                document.getElementById('countryVal').innerHTML = `<span class="text-base">${first.flag}</span><span>${c}</span>`;
                countryMenu.classList.remove('open');
                renderCarousel(members.filter(m => m.country === c));
              });
              countryMenu.appendChild(opt);
            });
            document.getElementById('countryTrigger').addEventListener('click', () => countryMenu.classList.toggle('open'));
            document.addEventListener('click', e => {
              if (!e.target.closest('.country-wrap')) countryMenu.classList.remove('open');
            });

            // Carousel
            let cmPage = 0;
            let cmData = [];
            const cmTrack = document.getElementById('cmTrack');
            const carouselWrap = document.getElementById('carouselWrap');
            const cmPerView = () => window.innerWidth >= 1280 ? 3 : window.innerWidth >= 768 ? 2 : 1;
            const cmMaxPage = () => Math.max(0, Math.ceil(cmData.length / cmPerView()) - 1);
            const updateCarousel = () => {
              cmPage = Math.min(cmPage, cmMaxPage());
              cmTrack.style.transform = `translateX(-${cmPage * 100}%)`;
            };
            const renderCarousel = data => {
              cmData = data;
              cmPage = 0;
              cmTrack.innerHTML = data.map(m => `
    <div class="cm-card" data-member-index="${members.indexOf(m)}" data-modal-open="member-details">
      <div class="cm-card-inner">
        <img src="${m.avatar}" alt="${m.firstName}" loading="lazy" class="member-modal-avatar">
        <div class="cm-card-body">
          <h4 class="text-lg">${m.firstName} ${m.lastName} <span class="text-lg">${m.flag}</span></h4>
          <p class="my-[2px] mt-1 text-sm text-muted">${m.city}, ${m.country}</p>
          <p class="text-xs font-bold text-label">ID: ${m.id}</p>
          <div class="member-socials">${m.socials.map(s=>`<a href="#" class="member-social-link" aria-label="${s}"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="var(--color-muted-foreground)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">${socialSVG[s]||''}</svg></a>`).join('')}</div>
        </div>
      </div>
    </div>`).join('');
              carouselWrap.style.display = 'block';
              updateCarousel();
            };

            cmTrack.addEventListener('click', (e) => {
              const card = e.target.closest('.cm-card[data-member-index]');
              if (!card || e.target.closest('.member-social-link')) return;
              const index = Number(card.getAttribute('data-member-index'));
              const member = members[index];
              if (!member || !modalBody) return;
              modalBody.innerHTML = renderMember(member);
            });
            document.getElementById('cmPrev').addEventListener('click', () => {
              cmPage = Math.max(0, cmPage - 1);
              updateCarousel();
            });
            document.getElementById('cmNext').addEventListener('click', () => {
              cmPage = Math.min(cmMaxPage(), cmPage + 1);
              updateCarousel();
            });

          </script>
        </main>
        <?php include __DIR__ . '/partials/footer.php'; ?>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/partials/app-shell/index.php'; ?>
  <?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>
