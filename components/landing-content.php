<style>
  .dm-landing {
    --bg: #f3f6f8;
    --bg2: #f3f6f8;
    --section-alt-bg: #f9fffd;
    --card: #ffffff;
    --border: rgba(15, 23, 42, .12);
    --border2: rgba(0, 176, 116, .28);
    --accent: #00b074;
    --accent2: #00ffaa;
    --cyan: #0891b2;
    --text: #0f172a;
    --muted: #5f6469;
    --label: #0f766e;
    --surface-1: rgba(15, 23, 42, .04);
    --surface-2: rgba(15, 23, 42, .06);
    --surface-3: rgba(15, 23, 42, .08);
    --surface-strong: rgba(255, 255, 255, .82);
    --chip-bg: rgba(255, 255, 255, .78);
    --chip-date-bg: rgba(255, 255, 255, .62);
    --hero-image-bg: linear-gradient(160deg, #d8f3eb 0%, #e5eff8 100%);
    --overlay-bg: rgba(255, 255, 255, .88);
    --header-bg: rgba(243, 246, 248, .9);
    --scroll-thumb: #9db3a8;
    --news-card-bg: linear-gradient(135deg, #edf7f2, #e7eef7);
    --cta-bg: linear-gradient(135deg, #e8f8ef 0%, #e5f7f4 50%, #e8effc 100%);
    --grid-line: rgba(0, 176, 116, .24);
    --grid-opacity: .58;
    --ff-head: 'Noto Sans', 'Noto Sans SC', sans-serif;
    --ff-body: 'Noto Sans', 'Noto Sans SC', sans-serif;
  }

  .dark .dm-landing {
    --bg: #0B0E11;
    --bg2: #0b1017;
    --section-alt-bg: #0b1017;
    --card: #0e1520;
    --border: rgba(255, 255, 255, .07);
    --border2: rgba(0, 200, 130, .18);
    --accent: #00c87a;
    --accent2: #00ffaa;
    --cyan: #22d3ee;
    --text: #e8edf2;
    --muted: #8b9095;
    --label: #3a8f68;
    --surface-1: rgba(255, 255, 255, .03);
    --surface-2: rgba(255, 255, 255, .05);
    --surface-3: rgba(255, 255, 255, .07);
    --surface-strong: rgba(6, 10, 13, .9);
    --chip-bg: rgba(0, 0, 0, .6);
    --chip-date-bg: rgba(0, 0, 0, .5);
    --hero-image-bg: linear-gradient(160deg, #0b1d1b 0%, #081218 100%);
    --overlay-bg: rgba(6, 10, 13, .9);
    --header-bg: rgba(6, 10, 13, .85);
    --scroll-thumb: #1e3a2a;
    --news-card-bg: linear-gradient(135deg, #0d1f1a, #0c1620);
    --cta-bg: linear-gradient(135deg, #071a12 0%, #0a1f1a 50%, #071218 100%);
    --grid-line: rgba(0, 200, 122, .1);
    --grid-opacity: .3;
  }

  .dm-landing .hero {
    min-height: auto;
    padding-top: 24px;
  }

  .dm-landing {
    scroll-behavior: smooth;
  }

  .dm-landing {
    color: var(--text);
    font-family: var(--ff-body);
    font-size: var(--text-base);
    line-height: 1.65;
  }

  /* ── Scrollbar ── */
  .dm-landing ::-webkit-scrollbar {
    width: 4px;
  }

  .dm-landing ::-webkit-scrollbar-track {
    background: var(--bg2);
  }

  .dm-landing ::-webkit-scrollbar-thumb {
    background: var(--scroll-thumb);
    border-radius: 4px;
  }

  /* ── Utilities ── */
  .dm-landing .container {
    width: 100%;
    max-width: calc(var(--container-7xl) + 16px*2);
    margin: 0 auto;
    padding: 0 16px;
  }

  @media(min-width:1024px) {
    .dm-landing .container {
      padding: 0 40px;
      max-width: calc(var(--container-7xl) + 40px*2);
    }
  }

  .dm-landing .section {
    padding: 48px 0;
  }

  .dm-landing .section-sm {
    padding: 40px 0;
  }

  .dm-landing .section-alt {
    background: var(--section-alt-bg);
  }

  @media(min-width:1024px) {
    .dm-landing .section {
      padding: 64px 0;
    }

    .dm-landing .section-sm {
      padding: 56px 0;
    }
  }

  .dm-landing .tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-family: var(--ff-head);
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--accent);
    padding: 5px 12px;
    background: rgba(0, 200, 122, .1);
    border: 1px solid rgba(0, 200, 122, .2);
    border-radius: 100px;
  }

  .dm-landing .tag svg {
    width: 12px;
    height: 12px;
  }

  .dm-landing h1,
  .dm-landing h2,
  .dm-landing h3,
  .dm-landing h4 {
    font-family: var(--ff-head);
    line-height: 1.1;
  }

  .dm-landing h1 {
    font-size: clamp(2.2rem, 4.8vw, 3.8rem);
    font-weight: 800;
  }

  .dm-landing h2 {
    font-size: clamp(2rem, 4vw, 3.2rem);
    font-weight: 800;
  }

  .dm-landing h3 {
    font-size: clamp(1.1rem, 2.5vw, 1.5rem);
    font-weight: 700;
  }

  .text-accent {
    color: var(--accent);
  }

  .text-cyan {
    color: var(--cyan);
  }

  .text-muted {
    color: var(--muted);
  }

  .btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--accent);
    color: #000;
    font-family: var(--ff-head);
    font-weight: 700;
    font-size: var(--text-sm);
    letter-spacing: .1em;
    text-transform: uppercase;
    padding: 14px 32px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: transform .2s, box-shadow .2s;
    box-shadow: 0 8px 32px rgba(0, 200, 122, .3);
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 16px 48px rgba(0, 200, 122, .45);
  }

  .btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: transparent;
    color: var(--text);
    font-family: var(--ff-head);
    font-weight: 700;
    font-size: var(--text-sm);
    letter-spacing: .1em;
    text-transform: uppercase;
    padding: 13px 28px;
    border-radius: 8px;
    border: 1px solid var(--border);
    cursor: pointer;
    text-decoration: none;
    transition: border-color .2s, color .2s;
  }

  .btn-ghost:hover {
    border-color: var(--accent);
    color: var(--accent);
  }

  /* ── Glassmorphism card ── */
  .card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
  }

  .card-glow {
    background: linear-gradient(135deg, rgba(0, 200, 122, .06) 0%, var(--card) 60%);
    border: 1px solid var(--border2);
  }

  /* ── HEADER ── */
  .dm-landing header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100;
    border-bottom: 1px solid var(--border);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    background: var(--header-bg);
  }

  .header-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 32px;
    height: 68px;
    max-width: calc(var(--container-7xl) + 32px*2);
    margin: 0 auto;
  }

  .logo {
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: var(--ff-head);
    font-weight: 800;
    font-size: var(--text-lg);
    color: var(--text);
    text-decoration: none;
    letter-spacing: -.02em;
  }

  .logo-icon {
    width: 36px;
    height: 36px;
    background: var(--accent);
    border-radius: 8px;
    display: grid;
    place-items: center;
  }

  .logo-icon svg {
    width: 20px;
    height: 20px;
    color: #000;
  }

  .dm-landing nav {
    display: flex;
    align-items: center;
    gap: 4px;
  }

  .dm-landing nav a {
    color: var(--muted);
    font-size: var(--text-sm);
    font-weight: 500;
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none;
    transition: color .15s, background .15s;
  }

  .dm-landing nav a:hover {
    color: var(--text);
    background: var(--surface-2);
  }

  .header-cta {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  /* ── HERO ── */
  .hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
    padding-top: 16px;
  }

  .hero-bg {
    position: absolute;
    inset: 0;
    z-index: 0;
    background:
      radial-gradient(ellipse 70% 60% at 15% 50%, rgba(0, 200, 122, .12) 0%, transparent 60%),
      radial-gradient(ellipse 50% 40% at 85% 30%, rgba(34, 211, 238, .07) 0%, transparent 55%),
      radial-gradient(ellipse 80% 80% at 50% 110%, rgba(0, 200, 122, .06) 0%, transparent 50%);
  }

  .hero-grid {
    position: absolute;
    inset: 0;
    opacity: var(--grid-opacity);
    z-index: 0;
    background-image:
      linear-gradient(var(--grid-line) 1px, transparent 1px),
      linear-gradient(90deg, var(--grid-line) 1px, transparent 1px);
    background-size: 60px 60px;
    mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 80%);
  }

  .hero-inner {
    position: relative;
    z-index: 1;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
    width: 100%;
    max-width: calc(var(--container-7xl) + 16px*2);
    margin: 0 auto;
    padding: 80px 16px;
  }

  .hero-eyebrow {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
  }

  @media(min-width:1024px) {
    .hero-inner {
      padding: 80px 40px;
      max-width: calc(var(--container-7xl) + 40px*2);
    }
  }

  .live-dot {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: var(--text-xs);
    font-weight: 600;
    color: var(--accent);
    background: rgba(0, 200, 122, .1);
    border: 1px solid rgba(0, 200, 122, .2);
    border-radius: 100px;
    padding: 4px 10px;
  }

  .live-dot::before {
    content: '';
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--accent);
    animation: pulse 1.8s infinite;
  }

  @keyframes pulse {

    0%,
    100% {
      opacity: 1;
      transform: scale(1)
    }

    50% {
      opacity: .5;
      transform: scale(1.4)
    }
  }


  .dm-landing .hero h1 {
    font-size: clamp(2rem, 4.2vw, 3.35rem);
  }

  .dm-landing .hero h1 {
    margin-bottom: 20px;
  }

  .dm-landing .hero h1 .line2 {
    color: var(--accent);
  }

  .hero-desc {
    color: var(--muted);
    font-size: var(--text-lg);
    margin-bottom: 32px;
    max-width: 480px;
    line-height: 1.7;
  }

  .hero-btns {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
  }

  .hero-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    margin-top: 40px;
  }

  .hstat {
    background: var(--surface-1);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 16px 18px;
  }

  .hstat-val {
    font-family: var(--ff-head);
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--text);
    line-height: 1;
  }

  .hstat-label {
    font-size: var(--text-xs);
    font-weight: 600;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--muted);
    margin-top: 6px;
  }

  /* mirror image card */
  .hero-visual {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .hero-img-wrap {
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid var(--border2);
    background: var(--hero-image-bg);
    position: relative;
  }

  .hero-img-wrap img {
    width: 100%;
    display: block;
    height: 420px;
    object-fit: contain;
  }

  .hero-badge {
    position: absolute;
    display: flex;
    align-items: center;
    gap: 8px;
    background: var(--overlay-bg);
    border: 1px solid var(--border2);
    border-radius: 12px;
    padding: 10px 14px;
    backdrop-filter: blur(8px);
  }

  .hero-badge svg {
    width: 18px;
    height: 18px;
    color: var(--accent);
    flex-shrink: 0;
  }

  .hero-badge-top {
    top: 16px;
    right: 16px;
  }

  .hero-badge-bottom {
    bottom: 16px;
    left: 16px;
  }

  .hero-badge .val {
    font-family: var(--ff-head);
    font-weight: 700;
    font-size: var(--text-sm);
  }

  .hero-badge .sub {
    font-size: var(--text-xs);
    color: var(--muted);
  }

  /* ── STATS BAND ── */
  .stats-band {
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    background: var(--section-alt-bg);
    padding: 40px 0;
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
  }

  .stat-item {
    padding: 20px 32px;
    text-align: center;
    border-right: 1px solid var(--border);
  }

  .stat-item:last-child {
    border-right: none;
  }

  .stat-num {
    font-family: var(--ff-head);
    font-size: 2.4rem;
    font-weight: 800;
    line-height: 1;
  }

  .stat-num.green {
    color: var(--accent);
  }

  .stat-num.cyan {
    color: var(--cyan);
  }

  .stat-label {
    font-size: var(--text-xs);
    color: var(--muted);
    font-weight: 500;
    margin-top: 6px;
    text-transform: uppercase;
    letter-spacing: .1em;
  }

  .stat-icon {
    width: 36px;
    height: 36px;
    margin: 0 auto 10px;
    background: rgba(0, 200, 122, .1);
    border-radius: 8px;
    display: grid;
    place-items: center;
  }

  .stat-icon svg {
    width: 18px;
    height: 18px;
    color: var(--accent);
  }

  /* ── MIRROR TECH ── */
  .tech-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
  }

  .tech-card {
    padding: 32px;
    border-radius: 16px;
    position: relative;
    overflow: hidden;
  }

  .tech-icon-big {
    width: 56px;
    height: 56px;
    border-radius: 14px;
    display: grid;
    place-items: center;
    margin-bottom: 20px;
    background: rgba(0, 200, 122, .1);
    border: 1px solid rgba(0, 200, 122, .2);
  }

  .tech-icon-big svg {
    width: 28px;
    height: 28px;
    color: var(--accent);
  }

  .tech-card p {
    color: var(--muted);
    margin-top: 8px;
    font-size: var(--text-sm);
    line-height: 1.7;
  }

  /* philosophy 4-grid */
  .phil-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    margin-top: 24px;
  }

  .phil-item {
    padding: 24px;
    border-radius: 12px;
    background: var(--surface-1);
    border: 1px solid var(--border);
    display: flex;
    gap: 14px;
  }

  .phil-num {
    font-family: var(--ff-head);
    font-size: var(--text-xs);
    font-weight: 700;
    color: var(--label);
    letter-spacing: .1em;
    margin-bottom: 4px;
  }

  .phil-item h4 {
    font-size: var(--text-sm);
    font-weight: 700;
    margin-bottom: 4px;
  }

  .phil-item p {
    font-size: var(--text-sm);
    color: var(--muted);
    line-height: 1.6;
  }

  .phil-ico {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: rgba(0, 200, 122, .08);
    display: grid;
    place-items: center;
    flex-shrink: 0;
    margin-top: 2px;
  }

  .phil-ico svg {
    width: 20px;
    height: 20px;
    color: var(--accent);
  }

  /* ── REFERRAL SECTION ── */
  .ref-wrapper {
    display: grid;
    grid-template-columns: 1fr 1.1fr;
    gap: 48px;
    align-items: start;
  }

  .ref-title {
    margin-bottom: 12px;
  }

  .ref-desc {
    color: var(--muted);
    margin-bottom: 32px;
    font-size: var(--text-base);
    max-width: 440px;
  }

  .ref-levels {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .ref-level {
    display: flex;
    align-items: center;
    gap: 16px;
    background: var(--surface-1);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 18px 20px;
    position: relative;
    overflow: hidden;
    transition: border-color .2s;
  }

  .ref-level:hover {
    border-color: var(--border2);
  }

  .ref-level-num {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    flex-shrink: 0;
    display: grid;
    place-items: center;
    font-family: var(--ff-head);
    font-weight: 800;
    font-size: var(--text-base);
  }

  .lvl-1 {
    background: rgba(0, 200, 122, .15);
    color: var(--accent);
  }

  .lvl-2 {
    background: rgba(34, 211, 238, .12);
    color: var(--cyan);
  }

  .lvl-3 {
    background: rgba(168, 85, 247, .12);
    color: #a855f7;
  }

  .ref-level-body {
    flex: 1;
  }

  .ref-level-body .l-label {
    font-size: var(--text-xs);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .12em;
    color: var(--muted);
  }

  .ref-level-body .l-name {
    font-family: var(--ff-head);
    font-weight: 700;
    font-size: var(--text-base);
    margin: 2px 0 6px;
  }

  .ref-bar-wrap {
    height: 6px;
    background: var(--surface-3);
    border-radius: 100px;
    overflow: hidden;
  }

  .ref-bar {
    height: 100%;
    border-radius: 100px;
    transition: width 1s ease;
  }

  .bar-1 {
    background: var(--accent);
  }

  .bar-2 {
    background: var(--cyan);
  }

  .bar-3 {
    background: #a855f7;
  }

  .ref-pct {
    font-family: var(--ff-head);
    font-weight: 800;
    font-size: 2rem;
    flex-shrink: 0;
    text-align: right;
  }

  .pct-1 {
    color: var(--accent);
  }

  .pct-2 {
    color: var(--cyan);
  }

  .pct-3 {
    color: #a855f7;
  }

  /* pyramid visual */
  .ref-visual {
    position: relative;
  }

  .pyramid-card {
    background: linear-gradient(160deg, rgba(0, 200, 122, .06) 0%, var(--card) 70%);
    border: 1px solid var(--border2);
    border-radius: 20px;
    padding: 32px;
  }

  .pyramid-title {
    font-family: var(--ff-head);
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 28px;
  }

  .pyramid-tree {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0;
  }

  .pyramid-row {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 8px;
    position: relative;
  }

  .pyramid-row::before {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 1px;
    height: 8px;
    background: var(--border2);
  }

  .pyramid-row:last-child::before {
    display: none;
  }

  .pnode {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 2px solid;
    display: grid;
    place-items: center;
    font-size: var(--text-xs);
    font-weight: 700;
    position: relative;
  }

  .pnode-you {
    border-color: var(--accent);
    background: rgba(0, 200, 122, .15);
    color: var(--accent);
    font-size: var(--text-xs);
  }

  .pnode-l1 {
    border-color: var(--accent);
    background: rgba(0, 200, 122, .1);
    color: var(--accent);
  }

  .pnode-l2 {
    border-color: var(--cyan);
    background: rgba(34, 211, 238, .08);
    color: var(--cyan);
  }

  .pnode-l3 {
    border-color: #a855f7;
    background: rgba(168, 85, 247, .07);
    color: #a855f7;
  }

  .pnode svg {
    width: 16px;
    height: 16px;
  }

  .py-connector {
    width: 100%;
    height: 20px;
    position: relative;
    display: flex;
    justify-content: center;
    margin-bottom: 8px;
  }

  .py-connector::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    transform: translateX(-50%);
    width: 1px;
    height: 100%;
    background: var(--border2);
  }

  .branch-line {
    width: 100%;
    height: 20px;
    position: relative;
    margin-bottom: 8px;
    display: flex;
    justify-content: center;
  }

  .branch-line::before {
    content: '';
    position: absolute;
    top: 0;
    left: 25%;
    right: 25%;
    height: 1px;
    background: var(--border2);
  }

  .branch-line::after {
    content: '';
    position: absolute;
    top: 0;
    left: 25%;
    right: 25%;
    height: 20px;
    border-left: 1px solid var(--border2);
    border-right: 1px solid var(--border2);
    border-top: none;
  }

  .deep-card {
    margin-top: 16px;
    padding: 16px;
    background: var(--surface-1);
    border: 1px solid var(--border);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .deep-label {
    font-size: var(--text-xs);
    color: var(--muted);
  }

  .deep-val {
    font-family: var(--ff-head);
    font-weight: 800;
    color: var(--accent);
    font-size: 1.4rem;
  }

  .deep-bar-wrap {
    height: 4px;
    background: var(--surface-3);
    border-radius: 100px;
    margin-top: 8px;
    overflow: hidden;
  }

  .deep-bar {
    height: 100%;
    width: 57.5%;
    border-radius: 100px;
    background: linear-gradient(90deg, var(--cyan), var(--accent));
  }

  /* ── NEWS ── */
  .news-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
  }

  .news-link {
    font-size: var(--text-xs);
    font-weight: 700;
    color: var(--accent);
    text-decoration: none;
    letter-spacing: .08em;
    text-transform: uppercase;
  }

  .news-track-wrap {
    overflow: hidden;
    border-radius: 16px;
  }

  .news-track {
    display: flex;
    transition: transform .35s cubic-bezier(.4, 0, .2, 1);
  }

  .news-card {
    flex-shrink: 0;
    width: 33.333%;
    padding: 8px;
  }

  @media(max-width:900px) {
    .news-card {
      width: 50%;
    }
  }

  @media(max-width:600px) {
    .news-card {
      width: 100%;
    }
  }

  .news-inner {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 14px;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    cursor: pointer;
    transition: border-color .2s, transform .2s;
  }

  .news-inner:hover {
    border-color: var(--border2);
    transform: translateY(-2px);
  }

  .news-thumb {
    height: 160px;
    position: relative;
    overflow: hidden;
    background: var(--news-card-bg);
  }

  .news-thumb-glow {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 30% 40%, rgba(0, 200, 122, .25) 0%, transparent 60%),
      radial-gradient(circle at 75% 60%, rgba(34, 211, 238, .12) 0%, transparent 50%);
  }

  .news-thumb-icon {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: .15;
  }

  .news-thumb-icon svg {
    width: 80px;
    height: 80px;
    color: var(--accent);
  }

  .news-chips {
    position: absolute;
    top: 12px;
    left: 12px;
    display: flex;
    gap: 6px;
  }

  .chip {
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    padding: 3px 10px;
    border-radius: 100px;
    border: 1px solid;
  }

  .chip-cat {
    background: var(--chip-bg);
    border-color: rgba(255, 255, 255, .15);
    color: var(--text);
    backdrop-filter: blur(8px);
  }

  .chip-date {
    background: var(--chip-date-bg);
    border-color: rgba(255, 255, 255, .1);
    color: var(--muted);
    backdrop-filter: blur(8px);
  }

  .news-body {
    padding: 18px;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .news-body h3 {
    font-size: var(--text-lg);
    font-weight: 700;
    line-height: 1.4;
  }

  .news-body p {
    font-size: var(--text-sm);
    color: var(--muted);
    line-height: 1.6;
    flex: 1;
  }

  .news-controls {
    display: flex;
    gap: 8px;
    justify-content: flex-end;
    margin-top: 16px;
  }

  .news-btn {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    border: 1px solid var(--border);
    background: transparent;
    color: var(--text);
    cursor: pointer;
    display: grid;
    place-items: center;
    transition: border-color .2s;
  }

  .news-btn:hover {
    border-color: var(--accent);
    color: var(--accent);
  }

  .news-btn svg {
    width: 16px;
    height: 16px;
  }

  /* ── WHY NOW ── */
  .why-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
  }

  .why-card {
    padding: 28px 24px;
    border-radius: 14px;
    background: var(--surface-1);
    border: 1px solid var(--border);
    transition: border-color .2s, transform .2s;
  }

  .why-card:hover {
    border-color: var(--border2);
    transform: translateY(-3px);
  }

  .why-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    margin-bottom: 18px;
    display: grid;
    place-items: center;
    background: rgba(0, 200, 122, .1);
    border: 1px solid rgba(0, 200, 122, .2);
  }

  .why-icon svg {
    width: 26px;
    height: 26px;
    color: var(--accent);
  }

  .why-card h3 {
    font-size: var(--text-base);
    font-weight: 700;
    margin-bottom: 6px;
  }

  .why-card p {
    font-size: var(--text-sm);
    color: var(--muted);
    line-height: 1.65;
  }

  .why-highlight {
    color: var(--accent);
    font-weight: 700;
  }

  /* ── FAQ ── */
  .faq-tabs {
    display: flex;
    gap: 8px;
    margin-bottom: 32px;
    flex-wrap: wrap;
  }

  .faq-tab {
    font-family: var(--ff-head);
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: .08em;
    padding: 8px 20px;
    border-radius: 8px;
    border: 1px solid var(--border);
    background: transparent;
    color: var(--muted);
    cursor: pointer;
    text-transform: uppercase;
    transition: all .2s;
  }

  .faq-tab.active {
    background: rgba(0, 200, 122, .1);
    border-color: var(--border2);
    color: var(--accent);
  }

  .faq-tab:hover:not(.active) {
    border-color: rgba(255, 255, 255, .15);
    color: var(--text);
  }

  .faq-group {
    display: none;
  }

  .faq-group.active {
    display: block;
  }

  .faq-item {
    border-bottom: 1px solid var(--border);
  }

  .faq-btn {
    width: 100%;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 16px;
    padding: 22px 0;
    background: none;
    border: none;
    cursor: pointer;
    color: var(--text);
    text-align: left;
  }

  .faq-btn:hover .faq-q {
    color: var(--accent);
  }

  .faq-q {
    font-family: var(--ff-head);
    font-weight: 600;
    font-size: var(--text-base);
    transition: color .2s;
  }

  .faq-icon {
    width: 28px;
    height: 28px;
    border-radius: 8px;
    background: var(--surface-2);
    border: 1px solid var(--border);
    display: grid;
    place-items: center;
    flex-shrink: 0;
    transition: transform .3s, background .2s;
  }

  .faq-icon svg {
    width: 14px;
    height: 14px;
    color: var(--accent);
  }

  .faq-btn[aria-expanded=true] .faq-icon {
    transform: rotate(45deg);
    background: rgba(0, 200, 122, .15);
    border-color: var(--border2);
  }

  .faq-panel {
    max-height: 0;
    overflow: hidden;
    transition: max-height .35s ease, opacity .35s ease;
    opacity: 0;
  }

  .faq-panel.open {
    max-height: 300px;
    opacity: 1;
  }

  .faq-panel-inner {
    padding: 0 0 22px;
    background: rgba(0, 200, 122, .05);
    border: 1px solid rgba(0, 200, 122, .12);
    border-radius: 10px;
    padding: 16px 20px;
    margin-bottom: 16px;
    font-size: var(--text-base);
    color: var(--muted);
    line-height: 1.75;
  }

  /* ── COMMITTEE ── */
  .committee-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(88px, 1fr));
    gap: 16px;
    margin-bottom: 24px;
  }

  .cm-member {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    transition: transform .2s;
  }

  .cm-member:hover {
    transform: translateY(-4px);
  }

  .cm-avatar {
    width: 80px;
    height: 80px;
    border-radius: 16px;
    overflow: hidden;
    border: 2px solid var(--border);
    position: relative;
    transition: border-color .2s;
  }

  .cm-member:hover .cm-avatar {
    border-color: var(--border2);
  }

  .cm-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .cm-flag {
    position: absolute;
    bottom: 4px;
    right: 4px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    font-size: var(--text-sm);
    display: grid;
    place-items: center;
    background: var(--chip-date-bg);
    backdrop-filter: blur(4px);
  }

  .cm-name {
    font-size: var(--text-xs);
    font-weight: 600;
    text-align: center;
    color: var(--muted);
  }

  /* country select */
  .country-wrap {
    position: relative;
    max-width: 320px;
    margin-top: 24px;
  }

  .country-trigger {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 10px 14px;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 10px;
    cursor: pointer;
    color: var(--text);
    font-size: var(--text-sm);
    font-family: var(--ff-body);
  }

  .country-trigger:hover {
    border-color: var(--border2);
  }

  .country-menu {
    position: absolute;
    top: calc(100% + 6px);
    left: 0;
    right: 0;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 12px;
    max-height: 220px;
    overflow-y: auto;
    z-index: 30;
    display: none;
    box-shadow: 0 16px 48px rgba(0, 0, 0, .5);
  }

  .country-menu.open {
    display: block;
  }

  .country-opt {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 9px 14px;
    font-size: var(--text-sm);
    cursor: pointer;
    transition: background .15s;
  }

  .country-opt:hover {
    background: var(--surface-1);
  }

  .cm-carousel-wrap {
    margin-top: 20px;
    overflow: hidden;
  }

  .cm-track {
    display: flex;
    transition: transform .35s cubic-bezier(.4, 0, .2, 1);
  }

  .cm-card {
    flex-shrink: 0;
    width: 33.333%;
    padding: 8px;
  }

  @media(max-width:900px) {
    .cm-card {
      width: 50%;
    }
  }

  @media(max-width:600px) {
    .cm-card {
      width: 100%;
    }
  }

  .cm-card-inner {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 20px;
    display: flex;
    gap: 14px;
    align-items: flex-start;
  }

  .cm-card-inner img {
    width: 56px;
    height: 56px;
    border-radius: 12px;
    object-fit: cover;
    flex-shrink: 0;
  }

  .cm-card-body h4 {
    font-size: var(--text-sm);
    font-weight: 700;
  }

  .cm-card-body .loc {
    font-size: var(--text-xs);
    color: var(--muted);
    margin: 2px 0 4px;
  }

  .cm-card-body .id {
    font-size: var(--text-xs);
    font-weight: 600;
    color: var(--label);
  }

  .cm-socials {
    display: flex;
    gap: 6px;
    margin-top: 10px;
  }

  .cm-soc {
    width: 28px;
    height: 28px;
    border-radius: 7px;
    background: var(--surface-2);
    border: 1px solid var(--border);
    display: grid;
    place-items: center;
  }

  .cm-soc svg {
    width: 12px;
    height: 12px;
    color: var(--muted);
  }

  .cm-carousel-controls {
    display: flex;
    gap: 8px;
    justify-content: flex-end;
    margin-bottom: 12px;
  }

  .cm-ctrl-btn {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    border: 1px solid var(--border);
    background: transparent;
    color: var(--text);
    cursor: pointer;
    display: grid;
    place-items: center;
    transition: border-color .2s;
  }

  .cm-ctrl-btn:hover {
    border-color: var(--accent);
    color: var(--accent);
  }

  .cm-ctrl-btn svg {
    width: 14px;
    height: 14px;
  }

  /* ── MODAL ── */
  .modal {
    position: fixed;
    inset: 0;
    z-index: 200;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 16px;
  }

  .modal.open {
    display: flex;
  }

  .modal-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, .75);
    backdrop-filter: blur(8px);
  }

  .modal-box {
    position: relative;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 28px;
    max-width: 400px;
    width: 100%;
    z-index: 1;
  }

  .modal-close {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: var(--surface-3);
    border: none;
    color: var(--text);
    cursor: pointer;
    display: grid;
    place-items: center;
  }

  .modal-close:hover {
    background: rgba(255, 255, 255, .12);
  }

  .modal-close svg {
    width: 14px;
    height: 14px;
  }

  /* ── CTA SECTION ── */
  .cta-section {
    position: relative;
    overflow: hidden;
    border-radius: 24px;
    padding: 72px 48px;
    background: var(--cta-bg);
    border: 1px solid var(--border2);
    margin: 0 0 32px;
  }

  .cta-bg {
    position: absolute;
    inset: 0;
    z-index: 0;
    background: radial-gradient(ellipse 60% 80% at 80% 50%, rgba(0, 200, 122, .12) 0%, transparent 60%);
  }

  .cta-grid-bg {
    position: absolute;
    inset: 0;
    opacity: .15;
    background-image: linear-gradient(rgba(0, 200, 122, .2) 1px, transparent 1px), linear-gradient(90deg, rgba(0, 200, 122, .2) 1px, transparent 1px);
    background-size: 40px 40px;
  }

  .cta-inner {
    position: relative;
    z-index: 1;
    display: grid;
    grid-template-columns: 2fr 1fr;
    align-items: center;
    gap: 32px;
  }

  .cta-inner h2 {
    font-size: clamp(1.6rem, 3.5vw, 2.6rem);
  }

  .cta-inner p {
    color: var(--muted);
    margin-top: 8px;
  }

  .cta-btns {
    display: flex;
    gap: 10px;
    flex-direction: column;
    flex-wrap: wrap;
  }

  .cta-btns .btn-primary,
  .cta-btns .btn-ghost {
    padding: 12px 18px;
    justify-content: center;
  }

  .roi-steps {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    text-align: center;
  }

  .roi-step {
    padding: 16px;
    border-right: 1px solid var(--border);
  }

  .roi-step:last-child {
    border-right: none;
  }

  .roi-step-label {
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 10px;
  }

  .roi-step-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: rgba(0, 200, 122, .1);
    border: 1px solid rgba(0, 200, 122, .2);
    display: grid;
    place-items: center;
    margin: 0 auto 12px;
  }

  .roi-step-title {
    font-weight: 700;
    font-size: var(--text-base);
  }

  .roi-step-sub {
    font-size: var(--text-sm);
    color: var(--muted);
    margin-top: 4px;
  }

  .contact-strip {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 16px;
    margin-top: 16px;
  }



  /* ── RESPONSIVE ── */
  @media(max-width:1024px) {
    .hero-inner {
      grid-template-columns: 1fr;
      gap: 40px;
      padding: 60px 16px;
    }

    .dm-landing .hero h1 {
      font-size: clamp(2.4rem, 6vw, 3.8rem);
    }

    .tech-grid {
      grid-template-columns: 1fr;
    }

    .ref-wrapper {
      grid-template-columns: 1fr;
    }

    .stats-grid {
      grid-template-columns: repeat(2, 1fr);
    }

    .why-grid {
      grid-template-columns: 1fr;
    }

    .footer-grid {
      grid-template-columns: 1fr 1fr;
    }

    .cta-inner {
      grid-template-columns: 1fr;
    }

    .cta-btns {
      flex-direction: row;
      flex-wrap: wrap;
    }

    .roi-steps {
      grid-template-columns: repeat(2, 1fr);
    }

    .roi-step {
      border-right: none;
      border-bottom: 1px solid var(--border);
    }

    .roi-step:nth-child(2n+1) {
      border-right: 1px solid var(--border);
    }

    .roi-step-wide {
      grid-column: 1 / -1;
      border-right: none !important;
    }

    .contact-strip {
      grid-template-columns: 1fr;
    }
  }

  @media(max-width:640px) {
    .hero-stats {
      grid-template-columns: 1fr 1fr;
    }

    .stats-grid {
      grid-template-columns: 1fr 1fr;
    }

    .stat-item {
      border-right: none;
      border-bottom: 1px solid var(--border);
    }

    .phil-grid {
      grid-template-columns: 1fr;
    }

    .footer-grid {
      grid-template-columns: 1fr;
    }

    .cta-section {
      padding: 32px 16px;
    }

    .cta-btns {
      flex-direction: column;
      width: 100%;
    }

    .cta-btns .btn-primary,
    .cta-btns .btn-ghost {
      width: 100%;
    }

    .dm-landing nav {
      display: none;
    }

    .roi-steps {
      grid-template-columns: 1fr;
    }

    .roi-step,
    .roi-step:nth-child(2n+1),
    .roi-step-wide {
      border-right: none;
    }

    .roi-step:last-child {
      border-bottom: none;
    }

    .card,
    .tech-card,
    .pyramid-card,
    .news-card-inner,
    .why-card,
    .cm-card-inner,
    .faq-panel-inner,
    .cta-section {
      padding-left: 16px !important;
      padding-right: 16px !important;
    }

    .ref-level,
    .deep-level {
      padding-left: 16px;
      padding-right: 16px;
    }
  }

  /* ── Scroll reveal ── */
  .reveal {
    opacity: 0;
    transform: translateY(28px);
    transition: opacity .7s ease, transform .7s ease;
  }

  .reveal.visible {
    opacity: 1;
    transform: none;
  }
</style>

<main class="dm-landing">
  <!-- ═══════════════════ HERO ═══════════════════ -->
  <section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>
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
        <div class="card card-glow" style="padding:40px;">
          <div class="tag" style="margin-bottom:20px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8" />
              <path d="m21 21-4.35-4.35" />
            </svg>
            Технология
          </div>
          <h2 style="margin-bottom:16px;">Умное зеркало<br><span class="text-accent">нового поколения</span></h2>
          <p style="color:var(--muted);margin-bottom:32px;line-height:1.75;">
            Dilan Mirror — это технология, позволяющая видеть обратную сторону собственного тела в реальном времени. Революционный продукт, открывающий новое измерение самопознания и заботы о здоровье.
          </p>

          <div class="phil-grid">
            <div class="phil-item">
              <div class="phil-ico">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                  <circle cx="12" cy="12" r="3" />
                </svg>
              </div>
              <div>
                <div class="phil-num">01 / Vision</div>
                <h4>360° обзор тела</h4>
                <p>Полный угол обзора без слепых зон.</p>
              </div>
            </div>
            <div class="phil-item">
              <div class="phil-ico">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                </svg>
              </div>
              <div>
                <div class="phil-num">02 / Research</div>
                <h4>Реальная экспертиза</h4>
                <p>Модель создана практиками рынка.</p>
              </div>
            </div>
            <div class="phil-item">
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
                <p>Решения на основе аналитики.</p>
              </div>
            </div>
            <div class="phil-item">
              <div class="phil-ico">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M3 3v18h18" />
                  <path d="m19 9-5 5-4-4-3 3" />
                </svg>
              </div>
              <div>
                <div class="phil-num">04 / Risk</div>
                <h4>Лидирующий рост</h4>
                <p>Стабильное расширение экосистемы.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Right: philosophy -->
        <div style="display:flex;flex-direction:column;gap:16px;">
          <div class="card" style="padding:28px;flex:1;">
            <div class="tech-icon-big">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 8v4l3 3" />
              </svg>
            </div>
            <h3>Ограниченный раунд</h3>
            <p style="margin-top:8px;color:var(--muted);">Только 15% долей компании выставлено в открытую продажу. Ограниченное окно — ранний вход по лучшей цене.</p>
            <div style="margin-top:20px;">
              <div style="display:flex;justify-content:space-between;margin-bottom:6px;">
                <span class="text-xs text-muted">Доступно для продажи</span>
                <span class="text-xs font-bold text-accent">15%</span>
              </div>
              <div style="height:6px;background:var(--surface-3);border-radius:100px;overflow:hidden;">
                <div style="width:15%;height:100%;background:var(--accent);border-radius:100px;"></div>
              </div>
            </div>
          </div>

          <div class="card" style="padding:28px;flex:1;">
            <div class="tech-icon-big" style="background:rgba(34,211,238,.1);border-color:rgba(34,211,238,.2);">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--cyan)">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                <polyline points="22 4 12 14.01 9 11.01" />
              </svg>
            </div>
            <h3>Прозрачная структура</h3>
            <p style="margin-top:8px;color:var(--muted);">Все условия документированы. Доли конвертируются в акции по утверждённой модели после завершения этапов развития.</p>
            <div style="display:flex;gap:8px;margin-top:20px;flex-wrap:wrap;">
              <span class="chip chip-cat text-xs">Доли → Акции</span>
              <span class="chip chip-cat text-xs">Юридический пакет</span>
              <span class="chip chip-cat text-xs">Контролируемый рост</span>
            </div>
          </div>

          <div class="card" style="padding:28px;">
            <div style="display:flex;align-items:center;gap:16px;">
              <div style="width:48px;height:48px;border-radius:12px;background:rgba(168,85,247,.1);border:1px solid rgba(168,85,247,.2);display:grid;place-items:center;flex-shrink:0;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#a855f7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                  <circle cx="9" cy="7" r="4" />
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
              </div>
              <div>
                <div class="text-xl font-extrabold leading-none text-violet-500" style="font-family:var(--ff-head);">100+</div>
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
      <div style="text-align:center;margin-bottom:56px;" class="reveal">
        <div class="tag" style="margin-bottom:14px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
          </svg>
          Реферальная программа
        </div>
        <h2>Зарабатывайте до <span class="text-accent">40%</span></h2>
        <p style="color:var(--muted);margin-top:12px;max-width:560px;margin-left:auto;margin-right:auto;">
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
                  <div class="ref-bar bar-1" style="width:100%"></div>
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
                  <div class="ref-bar bar-2" style="width:50%"></div>
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
                  <div class="ref-bar bar-3" style="width:20%"></div>
                </div>
              </div>
              <div class="ref-pct pct-3">2%</div>
            </div>

            <div class="card" style="padding:24px;margin-top:8px;">
              <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
                <div>
                  <div class="mb-1 text-xs text-muted">Суммарная глубина структуры</div>
                  <div class="text-xl font-extrabold text-accent" style="font-family:var(--ff-head);">до 23%</div>
                </div>
                <div style="text-align:right;">
                  <div class="text-xs text-muted">Максимальный пул</div>
                  <div class="text-xl font-extrabold" style="font-family:var(--ff-head);">до 40%</div>
                </div>
              </div>
              <div class="deep-bar-wrap" style="height:6px;">
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
              <div style="width:1px;height:20px;background:var(--border2);margin:0 auto;"></div>
              <!-- L1 row label -->
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                <div style="flex:1;height:1px;background:var(--border2);"></div>
                <span class="text-xs font-bold tracking-[0.1em] text-accent">L1 · 10%</span>
                <div style="flex:1;height:1px;background:var(--border2);"></div>
              </div>
              <!-- L1 nodes -->
              <div class="pyramid-row" style="gap:12px;margin-bottom:0;">
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
              <div style="width:80%;height:1px;background:var(--border2);margin:8px auto;"></div>
              <!-- L2 label -->
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;width:80%;margin-left:auto;margin-right:auto;">
                <div style="flex:1;height:1px;background:rgba(34,211,238,.2);"></div>
                <span class="text-xs font-bold tracking-[0.1em] text-cyan">L2 · 5%</span>
                <div style="flex:1;height:1px;background:rgba(34,211,238,.2);"></div>
              </div>
              <!-- L2 nodes -->
              <div class="pyramid-row" style="gap:8px;margin-bottom:0;">
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
              <div style="width:90%;height:1px;background:rgba(168,85,247,.2);margin:8px auto;"></div>
              <!-- L3 label -->
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;width:90%;margin-left:auto;margin-right:auto;">
                <div style="flex:1;height:1px;background:rgba(168,85,247,.2);"></div>
                <span class="text-xs font-bold tracking-[0.1em] text-violet-500">L3 · 2%</span>
                <div style="flex:1;height:1px;background:rgba(168,85,247,.2);"></div>
              </div>
              <!-- L3 nodes -->
              <div class="pyramid-row" style="gap:5px;margin-bottom:0;flex-wrap:wrap;">
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

            <div style="margin-top:20px;padding:14px 16px;background:var(--surface-1);border:1px solid var(--border);border-radius:10px;display:flex;justify-content:space-between;align-items:center;">
              <div>
                <div class="text-xs text-muted">Максимум с реф. структуры</div>
                <div class="text-xl font-extrabold leading-tight text-accent" style="font-family:var(--ff-head);">40%</div>
              </div>
              <div style="text-align:right;">
                <div class="text-xs text-muted">Глубина</div>
                <div class="text-lg font-extrabold" style="font-family:var(--ff-head);">Нет лимита</div>
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
          <div class="tag" style="margin-bottom:10px;">
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
                <div class="news-thumb-glow" style="background:radial-gradient(circle at 30% 40%,rgba(34,211,238,.2) 0%,transparent 60%),radial-gradient(circle at 75% 60%,rgba(0,200,122,.1) 0%,transparent 50%);"></div>
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
                <div class="news-thumb-glow" style="background:radial-gradient(circle at 30% 40%,rgba(168,85,247,.2) 0%,transparent 60%);"></div>
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
                <div class="news-thumb-glow" style="background:radial-gradient(circle at 30% 40%,rgba(34,211,238,.15) 0%,transparent 60%),radial-gradient(circle at 75% 60%,rgba(0,200,122,.15) 0%,transparent 50%);"></div>
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
      <div style="text-align:center;margin-bottom:48px;" class="reveal">
        <div class="tag" style="margin-bottom:14px;">
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
      <div class="card reveal" style="margin-top:24px;padding:24px 16px;">
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
      <div style="max-width:800px;">
        <div class="reveal" style="margin-bottom:36px;">
          <div class="tag" style="margin-bottom:14px;">
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
      <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:36px;flex-wrap:wrap;gap:16px;" class="reveal">
        <div>
          <div class="tag" style="margin-bottom:12px;">
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
      <div class="reveal" style="display:flex;justify-content:center;margin-top:16px;">
        <button id="loadMoreBtn" class="btn-ghost">Показать ещё</button>
      </div>

      <!-- Country select + carousel -->
      <div class="reveal">
        <div class="country-wrap">
          <p class="mb-2 text-xs font-bold uppercase tracking-[0.12em] text-muted">Фильтр по стране</p>
          <button class="country-trigger" id="countryTrigger">
            <span id="countryVal" style="display:flex;align-items:center;gap:8px;">🌍 Выберите страну</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="m6 9 6 6 6-6" />
            </svg>
          </button>
          <div class="country-menu" id="countryMenu"></div>
        </div>

        <div id="carouselWrap" style="display:none;margin-top:20px;">
          <div class="cm-carousel-controls">
            <button class="cm-ctrl-btn" id="cmPrev"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6" />
              </svg></button>
            <button class="cm-ctrl-btn" id="cmNext"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
              </svg></button>
          </div>
          <div class="cm-carousel-wrap">
            <div class="cm-track" id="cmTrack"></div>
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
              <i data-lucide="plus" style="width:16px;height:16px;"></i>
              Инвестировать
            </a>
            <a href="/chat" class="btn-ghost">
              <i data-lucide="message-circle" style="width:16px;height:16px;"></i>
              Поддержка
            </a>
          </div>
        </div>
      </div>

      <!-- Contact strip -->
      <div class="contact-strip">
        <a href="#" class="card" style="padding:20px 24px;display:flex;align-items:center;justify-content:space-between;text-decoration:none;color:var(--text);transition:border-color .2s;" onmouseover="this.style.borderColor='var(--border2)'" onmouseout="this.style.borderColor='var(--border)'">
          <div style="display:flex;align-items:center;gap:12px;">
            <div style="width:36px;height:36px;background:rgba(0,200,122,.1);border-radius:9px;display:grid;place-items:center;">
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
        <a href="#" class="card" style="padding:20px 24px;display:flex;align-items:center;justify-content:space-between;text-decoration:none;color:var(--text);transition:border-color .2s;" onmouseover="this.style.borderColor='var(--border2)'" onmouseout="this.style.borderColor='var(--border)'">
          <div style="display:flex;align-items:center;gap:12px;">
            <div style="width:36px;height:36px;background:rgba(0,200,122,.1);border-radius:9px;display:grid;place-items:center;">
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
        <a href="#" class="card" style="padding:20px 24px;display:flex;align-items:center;justify-content:space-between;text-decoration:none;color:var(--text);transition:border-color .2s;" onmouseover="this.style.borderColor='var(--border2)'" onmouseout="this.style.borderColor='var(--border)'">
          <div style="display:flex;align-items:center;gap:12px;">
            <div style="width:36px;height:36px;background:rgba(0,200,122,.1);border-radius:9px;display:grid;place-items:center;">
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
  <div class="modal" id="memberModal">
    <div class="modal-backdrop" id="modalBackdrop"></div>
    <div class="modal-box">
      <button class="modal-close" id="modalClose">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18" />
          <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </button>
      <div id="modalBody"></div>
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
    const perView = () => window.innerWidth >= 900 ? 3 : window.innerWidth >= 600 ? 2 : 1;
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
    const modal = document.getElementById('memberModal');
    const modalBody = document.getElementById('modalBody');
    let shown = 0;
    const batch = 30;

    const socialSVG = {
      telegram: '<path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>',
      linkedin: '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/>',
      twitter: '<path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>',
    };

    const renderMember = m => `
<div style="display:flex;gap:16px;align-items:flex-start;">
  <img src="${m.avatar}" style="width:72px;height:72px;border-radius:14px;object-fit:cover;flex-shrink:0;border:2px solid var(--border2);">
  <div>
    <h3 class="text-lg">${m.firstName} ${m.lastName} <span class="text-lg">${m.flag}</span></h3>
    <p class="my-[2px] mt-1 text-sm text-muted">${m.city}, ${m.country}</p>
    <p class="text-xs font-bold" style="color:var(--label);">ID: ${m.id}</p>
    <div style="display:flex;gap:8px;margin-top:12px;">
      ${m.socials.map(s=>`<a href="#" style="width:32px;height:32px;border-radius:8px;background:var(--surface-2);border:1px solid var(--border);display:grid;place-items:center;"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">${socialSVG[s]||''}</svg></a>`).join('')}
    </div>
  </div>
</div>`;

    const renderBatch = () => {
      const next = members.slice(shown, shown + batch);
      next.forEach(m => {
        const el = document.createElement('div');
        el.className = 'cm-member';
        el.innerHTML = `
      <div class="cm-avatar">
        <img src="${m.avatar}" alt="${m.firstName}" loading="lazy">
        <span class="cm-flag">${m.flag}</span>
      </div>
      <div class="cm-name">${m.firstName}</div>`;
        el.addEventListener('click', () => {
          modalBody.innerHTML = renderMember(m);
          modal.classList.add('open');
        });
        grid.appendChild(el);
      });
      shown += next.length;
      if (shown >= members.length) document.getElementById('loadMoreBtn').style.display = 'none';
    };
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
    const cmPerView = () => window.innerWidth >= 900 ? 3 : window.innerWidth >= 600 ? 2 : 1;
    const cmMaxPage = () => Math.max(0, Math.ceil(cmData.length / cmPerView()) - 1);
    const updateCarousel = () => {
      cmPage = Math.min(cmPage, cmMaxPage());
      cmTrack.style.transform = `translateX(-${cmPage * 100}%)`;
    };
    const renderCarousel = data => {
      cmData = data;
      cmPage = 0;
      cmTrack.innerHTML = data.map(m => `
    <div class="cm-card">
      <div class="cm-card-inner">
        <img src="${m.avatar}" alt="${m.firstName}" loading="lazy">
        <div class="cm-card-body">
          <h4>${m.firstName} ${m.lastName} ${m.flag}</h4>
          <div class="loc">${m.city}, ${m.country}</div>
          <div class="id">ID: ${m.id}</div>
          <div class="cm-socials">${m.socials.map(s=>`<div class="cm-soc"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">${socialSVG[s]||''}</svg></div>`).join('')}</div>
        </div>
      </div>
    </div>`).join('');
      carouselWrap.style.display = 'block';
      updateCarousel();
    };
    document.getElementById('cmPrev').addEventListener('click', () => {
      cmPage = Math.max(0, cmPage - 1);
      updateCarousel();
    });
    document.getElementById('cmNext').addEventListener('click', () => {
      cmPage = Math.min(cmMaxPage(), cmPage + 1);
      updateCarousel();
    });

    // Modal close
    document.getElementById('modalBackdrop').addEventListener('click', () => modal.classList.remove('open'));
    document.getElementById('modalClose').addEventListener('click', () => modal.classList.remove('open'));
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') modal.classList.remove('open');
    });
  </script>

</main>