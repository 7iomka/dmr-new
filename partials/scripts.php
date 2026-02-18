	<script>
		lucide.createIcons();

		function toggleDarkMode() {
			document.documentElement.classList.toggle('dark');
		}

		function toggleSidebar() {
			const sidebar = document.getElementById('sidebar');
			const labels = document.querySelectorAll('.js-sidebar-label');
			sidebar.classList.toggle('w-64');
			sidebar.classList.toggle('w-20');
			labels.forEach(el => el.classList.toggle('hidden'));
		}

		function toggleUserMenu() {
			const dropdown = document.getElementById('user-dropdown');
			const chevron = document.getElementById('user-chevron');
			dropdown.classList.toggle('hidden');
			chevron.classList.toggle('rotate-180');
		}

		function switchTab(tab) {
			const sectionInfo = document.getElementById('section-info');
			const sectionRefs = document.getElementById('section-refs');
			if (sectionInfo) sectionInfo.classList.remove('active');
			if (sectionRefs) sectionRefs.classList.remove('active');
			const btnInfo = document.getElementById('btn-info');
			const btnRefs = document.getElementById('btn-refs');
			const inactiveClass = "px-6 py-2 rounded-lg text-[11px] font-bold transition-all text-zinc-500 hover:text-zinc-400";
			const activeClass =
				"px-6 py-2 rounded-lg text-[11px] font-bold transition-all bg-accent text-white shadow-lg shadow-emerald-500/10";
			if (btnInfo) btnInfo.className = inactiveClass;
			if (btnRefs) btnRefs.className = inactiveClass;
			if (tab === 'info') {
				if (sectionInfo) sectionInfo.classList.add('active');
				if (btnInfo) btnInfo.className = activeClass;
			} else {
				if (sectionRefs) sectionRefs.classList.add('active');
				if (btnRefs) btnRefs.className = activeClass;
			}
		}

		function copyToClipboard(text) {
			const el = document.createElement('textarea');
			el.value = text;
			document.body.appendChild(el);
			el.select();
			document.execCommand('copy');
			document.body.removeChild(el);
		}
		let isInstallment = false;

		function toggleInstallment() {
			isInstallment = !isInstallment;
			const field = document.getElementById('installmentField');
			const toggle = document.getElementById('installmentToggle');
			const circle = document.getElementById('toggleCircle');
			const buttonText = document.getElementById('buttonText');
			if (isInstallment) {
				if (field) field.classList.remove('hidden');
				if (toggle) {
					toggle.classList.remove('bg-zinc-400', 'dark:bg-zinc-700');
					toggle.classList.add('bg-accent');
				}
				if (circle) circle.style.transform = 'translateX(1.125rem)';
				if (buttonText) buttonText.innerText = 'Зарезервировать 132 806 долей';
			} else {
				if (field) field.classList.add('hidden');
				if (toggle) {
					toggle.classList.add('bg-zinc-400', 'dark:bg-zinc-700');
					toggle.classList.remove('bg-accent');
				}
				if (circle) circle.style.transform = 'translateX(0)';
				if (buttonText) buttonText.innerText = 'Купить 132 806 долей за 504 $';
			}
		}
		window.onclick = function(event) {
			if (!event.target.closest('.relative')) {
				const dropdown = document.getElementById('user-dropdown');
				if (dropdown) dropdown.classList.add('hidden');
				const chevron = document.getElementById('user-chevron');
				if (chevron) chevron.classList.remove('rotate-180');
			}
		}
	</script>

	<script>
		/**
		 * Инициализация всех систем табов на странице
		 */
		function initTabs() {
			const containers = document.querySelectorAll('.js-tabs-container');
			containers.forEach(container => {
				const buttons = container.querySelectorAll('.js-tab-btn');
				const highlight = container.querySelector('.js-tab-highlight');
				const contents = container.querySelectorAll('.js-tab-content');
				const updateTabs = (activeBtn, isInitial = false) => {
					if (!activeBtn) return;
					buttons.forEach(btn => btn.setAttribute('data-active', 'false'));
					activeBtn.setAttribute('data-active', 'true');
					const {
						offsetLeft,
						offsetWidth
					} = activeBtn;
					if (highlight) {
						if (isInitial) highlight.style.transition = 'none';
						highlight.style.width = `${offsetWidth}px`;
						highlight.style.transform = `translateX(${offsetLeft}px)`;
						if (isInitial) {
							highlight.offsetHeight;
							highlight.style.transition = '';
						}
					}
					const targetId = activeBtn.getAttribute('data-target');
					contents.forEach(content => {
						const isTarget = content.getAttribute('data-id') === targetId;
						content.classList.toggle('hidden', !isTarget);
						content.classList.toggle('block', isTarget);
					});
				};
				buttons.forEach(btn => {
					btn.addEventListener('click', () => updateTabs(btn));
				});
				const defaultActive = container.querySelector('.js-tab-btn[data-active="true"]') || buttons[0];
				updateTabs(defaultActive, true);
				window.addEventListener('resize', () => {
					const currentActive = container.querySelector('.js-tab-btn[data-active="true"]');
					updateTabs(currentActive);
				});
			});
		}
		document.addEventListener('DOMContentLoaded', initTabs);
	</script>

	<script>
		// ===== MOBILE USER DRAWER =====
		(function() {
			const drawer = document.getElementById('mobile-user-drawer');
			const overlay = document.getElementById('user-overlay');
			const trigger = document.getElementById('user-trigger');
			const handle = document.getElementById('user-swipe-handle');
			let isDragging = false;
			let startY = 0;
			let currentY = 0;

			function openDrawer() {
				drawer.classList.add('active');
				overlay.classList.add('active');
				trigger.classList.add('text-accent');
				document.body.style.overflow = 'hidden';
				drawer.style.transform = 'translateY(0)';
			}

			function closeDrawer() {
				drawer.classList.remove('active');
				overlay.classList.remove('active');
				trigger.classList.remove('text-accent');
				document.body.style.overflow = '';
				drawer.style.transform = 'translateY(100%)';
			}
			trigger.addEventListener('click', (e) => {
				e.preventDefault();
				drawer.classList.contains('active') ? closeDrawer() : openDrawer();
			});
			overlay.addEventListener('click', closeDrawer);

			function startDrag(e) {
				isDragging = true;
				startY = e.type.includes('mouse') ? e.clientY : e.touches[0].clientY;
				drawer.classList.add('dragging');
			}

			function onDrag(e) {
				if (!isDragging) return;
				const clientY = e.type.includes('mouse') ? e.clientY : e.touches[0].clientY;
				currentY = clientY - startY;
				if (currentY > 0) {
					drawer.style.transform = `translateY(${currentY}px)`;
					const opacity = 1 - (currentY / 400);
					overlay.style.opacity = Math.max(0, opacity);
				}
			}

			function stopDrag() {
				if (!isDragging) return;
				isDragging = false;
				drawer.classList.remove('dragging');
				overlay.style.opacity = '';
				if (currentY > 100) closeDrawer();
				else drawer.style.transform = 'translateY(0)';
				currentY = 0;
			}
			handle.addEventListener('touchstart', startDrag, {
				passive: true
			});
			window.addEventListener('touchmove', onDrag, {
				passive: false
			});
			window.addEventListener('touchend', stopDrag);
			handle.addEventListener('mousedown', startDrag);
			window.addEventListener('mousemove', onDrag);
			window.addEventListener('mouseup', stopDrag);
			// Public close on navigation, if needed later:
			drawer.addEventListener('click', (e) => {
				const a = e.target.closest('a');
				if (a) closeDrawer();
			});
		})();
	</script>

	<script>
		// ===== MOBILE SIDEBAR DRAWER (Menu button) =====
		(function() {
			const drawer = document.getElementById('mobile-sidebar-drawer');
			const overlay = document.getElementById('sidebar-overlay');
			const trigger = document.getElementById('sidebar-trigger');
			const closeBtn = document.getElementById('mobile-sidebar-close');

			function openSidebar() {
				drawer.classList.add('active');
				overlay.classList.add('active');
				trigger.classList.add('text-accent');
				document.body.style.overflow = 'hidden';
			}

			function closeSidebar() {
				drawer.classList.remove('active');
				overlay.classList.remove('active');
				trigger.classList.remove('text-accent');
				document.body.style.overflow = '';
			}
			trigger.addEventListener('click', (e) => {
				e.preventDefault();
				drawer.classList.contains('active') ? closeSidebar() : openSidebar();
			});
			overlay.addEventListener('click', closeSidebar);
			closeBtn.addEventListener('click', closeSidebar);
			// Close on navigation
			drawer.addEventListener('click', (e) => {
				const a = e.target.closest('a');
				if (a) closeSidebar();
			});
		})();
	</script>

<script>
(() => {
  const DURATION = 1800;

  // Получаем текст для копирования
  const getText = (btn) => {
    if (btn.dataset.copyText) return btn.dataset.copyText;

    if (btn.dataset.copyTarget) {
      const el = document.querySelector(btn.dataset.copyTarget);
      return el ? (el.value ?? el.textContent ?? '').trim() : '';
    }

    return '';
  };

  // Копирование (modern + fallback)
  const copy = async (text) => {
    if (!text) throw new Error();

    if (navigator.clipboard?.writeText && window.isSecureContext) {
      return navigator.clipboard.writeText(text);
    }

    const ta = document.createElement('textarea');
    ta.value = text;
    ta.style.position = 'fixed';
    ta.style.left = '-9999px';
    document.body.appendChild(ta);
    ta.select();

    const ok = document.execCommand('copy');
    ta.remove();

    if (!ok) throw new Error();
  };

  // UI состояние
  const showState = (btn, success) => {
    const idle = btn.querySelector('[data-copy-idle]');
    const done = btn.querySelector('[data-copy-success]');
    const tip  = btn.querySelector('[data-copy-tooltip-el]');

    // переключение контента
    if (idle && done) {
      idle.classList.toggle('hidden', success);
      done.classList.toggle('hidden', !success);
    }

    // тултип
    if (tip) {
      tip.textContent =
        btn.dataset.copyTooltip ||
        (success ? 'Скопировано!' : 'Ошибка');

      tip.classList.remove('hidden');

			tip.classList.remove('c-copy-tooltip');
			void tip.offsetWidth;
			tip.classList.add('c-copy-tooltip');

      clearTimeout(tip._t);
      tip._t = setTimeout(() => {
        tip.classList.add('hidden');
      }, DURATION);
    }

    // возврат в idle
    clearTimeout(btn._t);
    btn._t = setTimeout(() => {
      if (idle && done) {
        idle.classList.remove('hidden');
        done.classList.add('hidden');
      }
    }, DURATION);
  };

  // Делегирование клика
  document.addEventListener('click', async (e) => {
    const btn = e.target.closest('[data-copy]');
    if (!btn) return;

    e.preventDefault();

    // защита от спама
    if (btn.dataset.busy) return;
    btn.dataset.busy = '1';

    try {
      await copy(getText(btn));
      showState(btn, true);
    } catch {
      showState(btn, false);
    }

    setTimeout(() => {
      delete btn.dataset.busy;
    }, 200);
  });
})();
</script>