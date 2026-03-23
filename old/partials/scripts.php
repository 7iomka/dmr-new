	<script>
		lucide.createIcons({
			inTemplates: true
		});

		const SIDEBAR_STATE_KEY = 'sidebar-mode';

		function applySidebarMode(mode) {
			document.body.classList.remove('sidebar-fixed', 'sidebar-collapse');
			document.body.classList.add(mode === 'collapse' ? 'sidebar-collapse' : 'sidebar-fixed');
		}

		function initSidebarMode() {
			const savedMode = localStorage.getItem(SIDEBAR_STATE_KEY);
			applySidebarMode(savedMode === 'collapse' ? 'collapse' : 'fixed');
		}

		function toggleDarkMode() {
			document.documentElement.classList.toggle('dark');
		}

		function toggleSidebar() {
			const isCollapse = document.body.classList.contains('sidebar-collapse');
			const nextMode = isCollapse ? 'fixed' : 'collapse';
			localStorage.setItem(SIDEBAR_STATE_KEY, nextMode);
			applySidebarMode(nextMode);
		}

		function toggleUserMenu() {
			if (window.AppDropdown) window.AppDropdown.toggle('user-menu');
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
				"px-6 py-2 rounded-lg text-[11px] font-bold btn-primary shadow-lg shadow-primary-500/10";
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
			const toggle = document.getElementById('installmentToggle');
			const field = document.getElementById('installmentField');
			const buttonText = document.getElementById('buttonText');

			if (!toggle) return;

			isInstallment = toggle.checked;

			if (isInstallment) {
				if (field) field.classList.remove('hidden');
				if (buttonText) buttonText.innerText = 'Зарезервировать 132 806 долей';
			} else {
				if (field) field.classList.add('hidden');
				if (buttonText) buttonText.innerText = 'Купить 132 806 долей за 504 $';
			}
		}

		(async function initHeaderDropdowns() {
			const roots = Array.from(document.querySelectorAll('[data-dropdown][data-dropdown-id]'));
			if (!roots.length) return;

			const {
				computePosition,
				autoUpdate,
				offset,
				flip,
				shift,
				size,
			} = await import('https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.10/+esm');

			const instances = new Map();

			const parseBoolean = (value, fallback = true) => {
				if (value === undefined) return fallback;
				return value !== 'false';
			};

			const parseNumber = (value, fallback) => {
				const parsed = Number(value);
				return Number.isFinite(parsed) ? parsed : fallback;
			};

			const renderTemplate = (template, vars = {}) => template.replace(/\{\{\s*(\w+)\s*\}\}/g, (_, key) => `${vars[key] ?? ''}`);

			function createDropdownInstance(root) {
				const id = root.dataset.dropdownId;
				const trigger = root.querySelector('[data-dropdown-trigger]');
				const panel = root.querySelector('[data-dropdown-panel]');
				if (!id || !trigger || !panel) return null;

				const config = {
					id,
					placement: root.dataset.dropdownPlacement || 'bottom-end',
					offset: parseNumber(root.dataset.dropdownOffset, 10),
					overlay: parseBoolean(root.dataset.dropdownOverlay, true),
					closeMs: parseNumber(root.dataset.dropdownCloseMs, 140),
					fallbackPlacements: (root.dataset.dropdownFlip || 'top-end,bottom-start').split(',').map((part) => part.trim()).filter(Boolean),
					padding: parseNumber(root.dataset.dropdownPadding, 12),
				};

				const templateId = panel.dataset.dropdownTemplateId;
				if (templateId) {
					const templateNode = document.getElementById(templateId);
					if (templateNode?.content) panel.replaceChildren(templateNode.content.cloneNode(true));
				}

				panel.classList.add(`dd-${id}__panel`);
				panel.setAttribute('data-dd-instance', id);
				trigger.setAttribute('data-dd-instance', id);
				root.setAttribute('data-open', 'false');
				panel.setAttribute('data-state', 'closed');

				const chevron = root.querySelector('[data-dropdown-chevron]');
				let isOpen = false;
				let closeTimer = null;
				let stopAutoUpdate = null;

				const api = {
					id,
					root,
					trigger,
					panel,
					config,
					isOpen: () => isOpen,
					onOpenHandlers: [],
					onCloseHandlers: [],
					onOpen(handler) {
						if (typeof handler === 'function') this.onOpenHandlers.push(handler);
					},
					onClose(handler) {
						if (typeof handler === 'function') this.onCloseHandlers.push(handler);
					},
				};

				function createOverlay() {
					const overlayNode = document.createElement('div');
					overlayNode.className = `overlay fixed inset-0 z-[39] header-dropdown-overlay dd-${id}__overlay`;
					overlayNode.setAttribute('data-dd-instance', id);
					overlayNode.setAttribute('aria-hidden', 'true');
					overlayNode.addEventListener('click', () => {
						if (isOpen) closeDropdown(true);
					});
					return overlayNode;
				}

				function mountOverlay() {
					if (!config.overlay) return;
					const existingOverlay = document.querySelector(`.dd-${id}__overlay`);
					if (existingOverlay) existingOverlay.remove();
					const overlayNode = createOverlay();
					document.body.appendChild(overlayNode);
					requestAnimationFrame(() => overlayNode.classList.add('active'));
				}

				function unmountOverlay() {
					const overlayNode = document.querySelector(`.dd-${id}__overlay`);
					if (!overlayNode) return;
					overlayNode.classList.remove('active');
					overlayNode.remove();
				}

				function updatePosition() {
					return computePosition(trigger, panel, {
						placement: config.placement,
						strategy: 'fixed',
						middleware: [
							offset(config.offset),
							flip({
								fallbackPlacements: config.fallbackPlacements,
								padding: config.padding,
							}),
							shift({
								padding: config.padding,
							}),
							size({
								padding: config.padding,
								apply({
									availableWidth,
									elements
								}) {
									elements.floating.style.width = `${Math.min(272, Math.max(220, availableWidth))}px`;
								},
							}),
						],
					}).then(({
						x,
						y
					}) => {
						panel.style.left = `${Math.round(x)}px`;
						panel.style.top = `${Math.round(y)}px`;
					});
				}

				function stopPositioning() {
					if (!stopAutoUpdate) return;
					stopAutoUpdate();
					stopAutoUpdate = null;
				}

				function startPositioning() {
					stopPositioning();
					stopAutoUpdate = autoUpdate(trigger, panel, updatePosition, {
						animationFrame: true,
					});
				}

				function openDropdown({
					focusPanel = false
				} = {}) {
					if (isOpen) return;
					if (closeTimer) clearTimeout(closeTimer);
					isOpen = true;
					root.setAttribute('data-open', 'true');
					trigger.setAttribute('aria-expanded', 'true');
					panel.setAttribute('data-state', 'open');
					panel.classList.remove('is-closing');
					panel.classList.add('is-open');
					if (chevron) chevron.classList.add('rotate-180');
					mountOverlay();
					updatePosition();
					startPositioning();
					api.onOpenHandlers.forEach((handler) => handler(api));
					if (focusPanel) panel.focus();
				}

				function closeDropdown(restoreFocus = false) {
					if (!isOpen) return;
					isOpen = false;
					root.setAttribute('data-open', 'false');
					trigger.setAttribute('aria-expanded', 'false');
					panel.setAttribute('data-state', 'closed');
					panel.classList.remove('is-open');
					panel.classList.add('is-closing');
					if (chevron) chevron.classList.remove('rotate-180');
					if (closeTimer) clearTimeout(closeTimer);
					closeTimer = setTimeout(() => {
						panel.classList.remove('is-closing');
						closeTimer = null;
					}, config.closeMs);
					unmountOverlay();
					stopPositioning();
					api.onCloseHandlers.forEach((handler) => handler(api));
					if (restoreFocus) trigger.focus();
				}

				function toggleDropdown() {
					if (isOpen) closeDropdown();
					else openDropdown();
				}

				trigger.addEventListener('click', (e) => {
					e.preventDefault();
					toggleDropdown();
				});

				trigger.addEventListener('keydown', (e) => {
					if (e.key === 'Enter' || e.key === ' ') {
						e.preventDefault();
						toggleDropdown();
						return;
					}
					if (e.key === 'ArrowDown') {
						e.preventDefault();
						openDropdown({
							focusPanel: true
						});
					}
				});

				panel.addEventListener('keydown', (e) => {
					if (e.key === 'Escape') {
						e.preventDefault();
						closeDropdown(true);
					}
				});

				document.addEventListener('click', (e) => {
					if (!isOpen) return;
					if (!root.contains(e.target) && !panel.contains(e.target)) closeDropdown();
				});

				document.addEventListener('keydown', (e) => {
					if (e.key === 'Escape' && isOpen) closeDropdown(true);
				});

				api.open = openDropdown;
				api.close = closeDropdown;
				api.toggle = toggleDropdown;
				return api;
			}

			roots.forEach((root) => {
				const instance = createDropdownInstance(root);
				if (instance) instances.set(instance.id, instance);
			});

			window.AppDropdown = {
				get(id) {
					return instances.get(id) || null;
				},
				toggle(id) {
					const instance = instances.get(id);
					if (!instance) return;
					instance.toggle();
				},
				open(id, options = {}) {
					const instance = instances.get(id);
					if (!instance) return;
					instance.open(options);
				},
				close(id, restoreFocus = false) {
					const instance = instances.get(id);
					if (!instance) return;
					instance.close(restoreFocus);
				},
			};

			const languageInstance = instances.get('language-menu');
			if (languageInstance) {
				const languages = [{
						code: 'EN',
						nativeLabel: 'English',
						englishLabel: 'English',
						flag: '🇺🇸'
					},
					{
						code: 'RU',
						nativeLabel: 'Русский',
						englishLabel: 'Russian',
						flag: '🇷🇺'
					},
					{
						code: 'HI',
						nativeLabel: 'हिन्दी',
						englishLabel: 'Hindi',
						flag: '🇮🇳'
					},
					{
						code: 'VI',
						nativeLabel: 'Tiếng Việt',
						englishLabel: 'Vietnamese',
						flag: '🇻🇳'
					},
					{
						code: 'FR',
						nativeLabel: 'Français',
						englishLabel: 'French',
						flag: '🇫🇷'
					},
					{
						code: 'AR',
						nativeLabel: 'العربية',
						englishLabel: 'Arabic',
						flag: '🇸🇦'
					},
					{
						code: 'ES',
						nativeLabel: 'Español',
						englishLabel: 'Spanish',
						flag: '🇪🇸'
					},
					{
						code: 'KO',
						nativeLabel: '한국어',
						englishLabel: 'Korean',
						flag: '🇰🇷'
					},
					{
						code: 'JA',
						nativeLabel: '日本語',
						englishLabel: 'Japanese',
						flag: '🇯🇵'
					},
					{
						code: 'BN',
						nativeLabel: 'বাংলা',
						englishLabel: 'Bengali',
						flag: '🇧🇩'
					},
					{
						code: 'ZH',
						nativeLabel: '中文',
						englishLabel: 'Chinese',
						flag: '🇨🇳'
					},
					{
						code: 'PT',
						nativeLabel: 'Português',
						englishLabel: 'Portuguese',
						flag: '🇵🇹'
					},
					{
						code: 'ID',
						nativeLabel: 'Bahasa Indonesia',
						englishLabel: 'Indonesian',
						flag: '🇮🇩'
					},
					{
						code: 'RO',
						nativeLabel: 'Română',
						englishLabel: 'Romanian',
						flag: '🇷🇴'
					},
				];

				const list = languageInstance.panel.querySelector('[data-language-list]');
				const flagNode = languageInstance.root.querySelector('[data-language-flag]');
				const nativeNode = languageInstance.root.querySelector('[data-language-native]');
				const codeNode = languageInstance.root.querySelector('[data-language-code]');
				const optionTplNode = document.getElementById('tpl-language-option');
				const optionTemplate = optionTplNode ? optionTplNode.innerHTML : '';
				if (list && optionTemplate) {
					let selectedCode = 'EN';
					let activeIndex = 0;

					const panelId = languageInstance.panel.id || 'header-language-menu';
					const getSelectedIndex = () => Math.max(0, languages.findIndex((lang) => lang.code === selectedCode));
					const getOptions = () => Array.from(list.querySelectorAll('[data-language-option]'));

					function syncTriggerLabel() {
						const current = languages.find((lang) => lang.code === selectedCode) || languages[0];
						if (flagNode) flagNode.textContent = current.flag;
						if (nativeNode) nativeNode.textContent = current.nativeLabel;
						if (codeNode) codeNode.textContent = current.code;
					}

					function updateOptionStates() {
						getOptions().forEach((node, index) => {
							const lang = languages[index];
							const isSelected = lang.code === selectedCode;
							const isActive = index === activeIndex;
							node.setAttribute('aria-selected', isSelected ? 'true' : 'false');
							node.setAttribute('tabindex', isActive ? '0' : '-1');
							node.classList.toggle('is-selected', isSelected);
							node.classList.toggle('is-active', isActive);
							const check = node.querySelector('[data-language-check]');
							if (check) check.classList.toggle('hidden', !isSelected);
						});
					}

					function focusActiveOption() {
						const option = getOptions()[activeIndex];
						if (!option) return;
						option.focus();
						option.scrollIntoView({
							block: 'nearest'
						});
						languageInstance.panel.setAttribute('aria-activedescendant', option.id);
					}

					function moveActive(step) {
						activeIndex = (activeIndex + step + languages.length) % languages.length;
						updateOptionStates();
						focusActiveOption();
					}

					function selectActive() {
						const lang = languages[activeIndex];
						if (!lang) return;
						selectedCode = lang.code;
						syncTriggerLabel();
						updateOptionStates();
						languageInstance.close(true);
					}

					list.innerHTML = '';
					languages.forEach((lang, index) => {
						const wrap = document.createElement('div');
						wrap.innerHTML = renderTemplate(optionTemplate, lang).trim();
						const option = wrap.firstElementChild;
						if (!option) return;
						option.id = `${panelId}-option-${lang.code.toLowerCase()}`;
						option.setAttribute('data-language-option', '');
						option.setAttribute('data-language-code', lang.code);
						option.setAttribute('data-dd-instance', languageInstance.id);
						option.classList.add(`dd-${languageInstance.id}__option`);
						option.addEventListener('click', () => {
							selectedCode = lang.code;
							activeIndex = index;
							syncTriggerLabel();
							updateOptionStates();
							languageInstance.close(true);
						});
						option.addEventListener('mouseenter', () => {
							activeIndex = index;
							updateOptionStates();
						});
						list.appendChild(option);
					});

					updateOptionStates();
					syncTriggerLabel();

					languageInstance.onOpen(() => {
						activeIndex = getSelectedIndex();
						updateOptionStates();
						setTimeout(focusActiveOption, 0);
					});

					languageInstance.trigger.addEventListener('keydown', (e) => {
						if (e.key === 'ArrowDown') {
							e.preventDefault();
							if (!languageInstance.isOpen()) languageInstance.open({
								focusPanel: true
							});
							else moveActive(1);
							return;
						}
						if (e.key === 'ArrowUp') {
							e.preventDefault();
							if (!languageInstance.isOpen()) languageInstance.open({
								focusPanel: true
							});
							else moveActive(-1);
						}
					});

					languageInstance.panel.addEventListener('keydown', (e) => {
						if (e.key === 'ArrowDown') {
							e.preventDefault();
							moveActive(1);
							return;
						}
						if (e.key === 'ArrowUp') {
							e.preventDefault();
							moveActive(-1);
							return;
						}
						if (e.key === 'Enter' || e.key === ' ') {
							e.preventDefault();
							selectActive();
						}
					});
				}
			}
		})();

		document.addEventListener('DOMContentLoaded', initSidebarMode);
	</script>

	<script>
		// ===== TOGGLE SWITCH (data-attributes) =====
		document.addEventListener('change', function(event) {
			const input = event.target.closest('.js-toggleswitch');
			if (!input) return;

			input.setAttribute('aria-checked', input.checked ? 'true' : 'false');
		});

		document.querySelectorAll('.js-toggleswitch').forEach((input) => {
			input.setAttribute('aria-checked', input.checked ? 'true' : 'false');
		});
	</script>

	<script>
		// ===== GLOBAL MODAL MANAGER (data-attributes) =====
		(function() {
			const CLOSE_ANIMATION_MS = 300;
			const closeTimers = new WeakMap();
			const getModal = (name) => document.querySelector(`[data-modal="${name}"]`);
			const getOpenModals = () => Array.from(document.querySelectorAll('.modal.open[data-modal]'));

			function setEnterClasses(modal) {
				const backdrop = modal.querySelector('.modal-backdrop');
				const box = modal.querySelector('.modal-box');

				modal.classList.remove('animate-out');
				modal.classList.add('animate-in');

				if (backdrop) {
					backdrop.classList.remove('animate-out', 'fade-out');
					backdrop.classList.add('animate-in', 'fade-in');
				}

				if (box) {
					box.classList.remove('animate-out', 'fade-out', 'zoom-out-95');
					box.classList.add('animate-in', 'fade-in', 'zoom-in-95');
				}
			}

			function setExitClasses(modal) {
				const backdrop = modal.querySelector('.modal-backdrop');
				const box = modal.querySelector('.modal-box');

				modal.classList.remove('animate-in');
				modal.classList.add('animate-out');

				if (backdrop) {
					backdrop.classList.remove('animate-in', 'fade-in');
					backdrop.classList.add('animate-out', 'fade-out');
				}

				if (box) {
					box.classList.remove('animate-in', 'fade-in', 'zoom-in-95');
					box.classList.add('animate-out', 'fade-out', 'zoom-out-95');
				}
			}

			function syncScrollLock() {
				document.body.style.overflow = getOpenModals().length ? 'hidden' : '';
			}

			function open(modalOrName) {
				const modal = typeof modalOrName === 'string' ? getModal(modalOrName) : modalOrName;
				if (!modal) return;

				const prevTimer = closeTimers.get(modal);
				if (prevTimer) {
					clearTimeout(prevTimer);
					closeTimers.delete(modal);
				}

				modal.removeAttribute('data-closing');
				setEnterClasses(modal);
				modal.classList.add('open');
				modal.setAttribute('aria-hidden', 'false');
				syncScrollLock();
			}

			function close(modalOrName) {
				const modal = typeof modalOrName === 'string' ? getModal(modalOrName) : modalOrName;
				if (!modal) return;
				if (modal.getAttribute('data-closing') === 'true') return;

				modal.setAttribute('data-closing', 'true');
				setExitClasses(modal);

				const timer = setTimeout(() => {
					modal.classList.remove('open', 'animate-out');
					modal.setAttribute('aria-hidden', 'true');
					modal.removeAttribute('data-closing');
					setEnterClasses(modal);
					closeTimers.delete(modal);
					syncScrollLock();
				}, CLOSE_ANIMATION_MS);

				closeTimers.set(modal, timer);
			}

			function closeTop() {
				const openModals = getOpenModals();
				if (!openModals.length) return;
				close(openModals[openModals.length - 1]);
			}

			document.addEventListener('click', (e) => {
				const openTrigger = e.target.closest('[data-modal-open]');
				if (openTrigger) {
					const modalName = openTrigger.getAttribute('data-modal-open');
					if (modalName) open(modalName);
				}

				const closeTrigger = e.target.closest('[data-modal-close]');
				if (closeTrigger) {
					const modal = closeTrigger.closest('[data-modal]');
					if (modal) close(modal);
				}
			});

			document.addEventListener('keydown', (e) => {
				if (e.key === 'Escape') closeTop();
			});

			window.AppModal = {
				open,
				close,
				closeTop,
			};
		})();
	</script>


	<script>
		/**
		 * Инициализация всех систем табов на странице
		 */
		function initTabs() {
			const containers = document.querySelectorAll('.js-tabs-container');

			containers.forEach(container => {
				// ВАЖНО: считаем "официальными" кнопками табов те, что в самом таб-баре/хедере.
				// Если у тебя другой селектор — подстрой.
				const headerButtons = container.querySelectorAll('.js-tabs-nav .js-tab-btn');
				const highlight = container.querySelector('.js-tab-highlight');
				const contents = container.querySelectorAll('.js-tab-content');

				const setActive = (activeTarget, isInitial = false) => {
					if (!activeTarget) return;

					// 1) Переключаем контент
					contents.forEach(content => {
						const isTarget = content.getAttribute('data-id') === activeTarget;
						content.classList.toggle('hidden', !isTarget);
						content.classList.toggle('block', isTarget);
					});

					// 2) Включаем активность в хедере (ищем кнопку таба по data-target)
					const headerActiveBtn =
						container.querySelector(`.js-tabs-nav .js-tab-btn[data-target="${CSS.escape(activeTarget)}"]`);

					if (headerButtons && headerButtons.length) {
						headerButtons.forEach(btn => btn.setAttribute('data-active', 'false'));
					}

					if (headerActiveBtn) {
						headerActiveBtn.setAttribute('data-active', 'true');

						// 3) Обновляем highlight (если он есть)
						if (highlight) {
							const {
								offsetLeft,
								offsetWidth
							} = headerActiveBtn;

							if (isInitial) highlight.style.transition = 'none';
							highlight.style.width = `${offsetWidth}px`;
							highlight.style.transform = `translateX(${offsetLeft}px)`;
							if (isInitial) {
								highlight.offsetHeight; // reflow
								highlight.style.transition = '';
							}
						}
					}
				};

				// Делегирование кликов: работает и для кнопок в контенте, и для кнопок в хедере
				container.addEventListener('click', (e) => {
					const btn = e.target.closest('.js-tab-btn[data-target]');
					if (!btn || !container.contains(btn)) return;

					const targetId = btn.getAttribute('data-target');
					if (!targetId) return;

					setActive(targetId, false);
				});

				// Инициализация
				const defaultActiveBtn =
					container.querySelector('.js-tabs-nav .js-tab-btn[data-active="true"]') ||
					(headerButtons && headerButtons[0]);

				const defaultTarget =
					defaultActiveBtn?.getAttribute('data-target') ||
					contents[0]?.getAttribute('data-id');

				setActive(defaultTarget, true);

				// Ресайз: пересчитать highlight под текущий активный таргет
				window.addEventListener('resize', () => {
					const currentActive =
						container.querySelector('.js-tabs-nav .js-tab-btn[data-active="true"]');

					const target = currentActive?.getAttribute('data-target') || defaultTarget;
					setActive(target, false);
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

			if (!drawer || !overlay || !trigger || !handle) return;
			let isDragging = false;
			let startY = 0;
			let currentY = 0;

			function openDrawer() {
				drawer.classList.add('active');
				overlay.classList.add('active');
				trigger.classList.add('text-primary');
				document.body.style.overflow = 'hidden';
				drawer.style.transform = 'translateY(0)';
			}

			function closeDrawer() {
				drawer.classList.remove('active');
				overlay.classList.remove('active');
				trigger.classList.remove('text-primary');
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

			if (!drawer || !overlay || !trigger || !closeBtn) return;

			function openSidebar() {
				drawer.classList.add('active');
				overlay.classList.add('active');
				trigger.classList.add('text-primary');
				document.body.style.overflow = 'hidden';
			}

			function closeSidebar() {
				drawer.classList.remove('active');
				overlay.classList.remove('active');
				trigger.classList.remove('text-primary');
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
				const tip = btn.querySelector('[data-copy-tooltip-el]');

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

	<script>
		(() => {
			const STORAGE_KEY = 'demo-notifications-v1';
			const seed = [{
				id: 'n1',
				type: 'critical',
				title: 'Подозрительный вход в аккаунт',
				message: 'Мы зафиксировали вход с нового устройства. Если это были не вы, срочно смените пароль и включите двухфакторную защиту.',
				createdAt: '2026-03-12T10:20:00.000Z',
				isRead: false,
			}, {
				id: 'n2',
				type: 'warning',
				title: 'Рассрочка скоро завершится',
				message: 'По заявке #4829 осталось 3 дня до следующего платежа. Проверьте баланс, чтобы избежать задержки.',
				createdAt: '2026-03-11T16:00:00.000Z',
				isRead: false,
			}, {
				id: 'n3',
				type: 'info',
				title: 'Пополнение успешно завершено',
				message: 'Баланс пополнен на 500 USD через STRIPE. Средства уже доступны в кошельке.',
				createdAt: '2026-03-11T08:40:00.000Z',
				isRead: true,
			}, {
				id: 'n4',
				type: 'info',
				title: 'Новый реферал зарегистрирован',
				message: 'Пользователь по вашей ссылке успешно завершил регистрацию и пополнил счёт.',
				createdAt: '2026-03-10T14:30:00.000Z',
				isRead: false,
			}, {
				id: 'n5',
				type: 'warning',
				title: 'Серверные работы в воскресенье',
				message: 'В воскресенье с 02:00 до 04:00 UTC будут технические работы. Часть операций может выполняться с задержкой.',
				createdAt: '2026-03-09T09:15:00.000Z',
				isRead: true,
			}];

			const typeMap = {
				info: {
					label: 'Info',
					icon: 'info',
					iconClass: 'text-sky-600 dark:text-sky-300',
					wrapClass: 'bg-sky-500/10 dark:bg-sky-400/10',
					chipClass: 'bg-sky-500/10 text-sky-600 dark:text-sky-300'
				},
				warning: {
					label: 'Warning',
					icon: 'alert-triangle',
					iconClass: 'text-amber-600 dark:text-amber-300',
					wrapClass: 'bg-amber-500/10 dark:bg-amber-400/10',
					chipClass: 'bg-amber-500/10 text-amber-700 dark:text-amber-300'
				},
				critical: {
					label: 'Critical',
					icon: 'octagon-alert',
					iconClass: 'text-red-600 dark:text-red-300',
					wrapClass: 'bg-red-500/10 dark:bg-red-400/10',
					chipClass: 'bg-red-500/10 text-red-600 dark:text-red-300'
				},
			};
			const defaultSort = 'date_desc';
			const sortOptions = [{
				value: 'date_desc',
				label: 'Новые'
			}, {
				value: 'date_asc',
				label: 'Старые'
			}, {
				value: 'unread_first',
				label: 'Непрочитанные'
			}, {
				value: 'read_first',
				label: 'Прочитанные'
			}];

			const relDate = (iso) => {
				const d = new Date(iso);
				const diff = Date.now() - d.getTime();
				const hours = Math.floor(diff / 3600000);
				if (hours < 1) return 'только что';
				if (hours < 24) return `${hours} ч назад`;
				const days = Math.floor(hours / 24);
				if (days < 7) return `${days} д назад`;
				return d.toLocaleDateString('ru-RU', {
					day: '2-digit',
					month: 'short'
				});
			};
			const fullDate = (iso) => new Date(iso).toLocaleString('ru-RU', {
				day: '2-digit',
				month: 'long',
				year: 'numeric',
				hour: '2-digit',
				minute: '2-digit'
			});
			const isMobile = () => window.innerWidth < 1024;

			function loadItems() {
				try {
					const raw = localStorage.getItem(STORAGE_KEY);
					return raw ? JSON.parse(raw) : [...seed];
				} catch {
					return [...seed];
				}
			}

			let items = loadItems();
			const state = {
				pageType: 'all',
				sort: defaultSort,
				search: '',
				selectedId: null,
				selectedBulk: new Set(),
				selectMode: false
			};
			let drawerOverlay = null;

			const drawer = {
				trigger: document.querySelector('[data-notifications-trigger]'),
				drawer: document.querySelector('[data-notifications-drawer]'),
				list: document.querySelector('[data-notifications-drawer-list]'),
				count: document.querySelector('[data-notifications-drawer-count]'),
				dot: document.querySelector('[data-notifications-dot]'),
				badge: document.querySelector('[data-notifications-badge]'),
				close: document.querySelector('[data-notifications-close]'),
				label: document.querySelector('[data-notifications-unread-label]'),
				isOpen: false,
				lastFocused: null,
			};

			const page = {
				root: document.querySelector('[data-notifications-page]'),
				shell: document.querySelector('.notifications-page-shell'),
				listPanel: document.querySelector('[data-notifications-list-panel]'),
				detailPanel: document.querySelector('[data-notifications-detail-panel]'),
				list: document.querySelector('[data-notifications-page-list]'),
				detail: document.querySelector('[data-notifications-detail]'),
				search: document.querySelector('[data-notifications-search]'),
				bulkbar: document.querySelector('[data-notifications-bulkbar]'),
				counter: document.querySelector('[data-notifications-selected-counter]'),
				back: document.querySelector('[data-notifications-back]'),
				sortTrigger: document.querySelector('[data-notifications-sort-trigger]'),
				selectModeToggle: document.querySelector('[data-notifications-select-mode-toggle]'),
				selectCount: document.querySelector('[data-notifications-select-count]'),
			};

			const persist = () => localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
			const unreadCount = () => items.filter((n) => !n.isRead).length;
			const byId = (id) => items.find((n) => n.id === id);
			const saveRender = () => {
				persist();
				renderAll();
			};
			const cloneTemplate = (id) => {
				const tpl = document.getElementById(id);
				return tpl?.content?.firstElementChild?.cloneNode(true) || null;
			};

			const preselectedNotificationId = new URLSearchParams(window.location.search).get('notification');
			if (preselectedNotificationId && byId(preselectedNotificationId)) {
				state.selectedId = preselectedNotificationId;
				const target = byId(preselectedNotificationId);
				if (target && !target.isRead) {
					target.isRead = true;
					persist();
				}
			}

			function filterAndSort({
				type = 'all',
				onlyUnread = false,
				search = '',
				sort = defaultSort
			} = {}) {
				let rows = items.filter((row) => (type === 'all' ? true : row.type === type));
				if (onlyUnread) rows = rows.filter((row) => !row.isRead);
				if (search.trim()) {
					const q = search.trim().toLowerCase();
					rows = rows.filter((row) => `${row.title} ${row.message}`.toLowerCase().includes(q));
				}
				rows.sort((a, b) => {
					if (sort === 'unread_first') {
						const delta = Number(a.isRead) - Number(b.isRead);
						if (delta !== 0) return delta;
					}
					if (sort === 'read_first') {
						const delta = Number(b.isRead) - Number(a.isRead);
						if (delta !== 0) return delta;
					}
					return sort === 'date_asc' ?
						new Date(a.createdAt) - new Date(b.createdAt) :
						new Date(b.createdAt) - new Date(a.createdAt);
				});
				return rows;
			}

			function ensureDrawerOverlay() {
				if (drawerOverlay?.isConnected) return drawerOverlay;
				drawerOverlay = document.createElement('div');
				drawerOverlay.className = 'overlay fixed inset-0 z-[1090] notifications-drawer-overlay';
				drawerOverlay.setAttribute('aria-hidden', 'true');
				document.body.appendChild(drawerOverlay);
				drawerOverlay.addEventListener('click', closeDrawer);
				return drawerOverlay;
			}

			function openDrawer() {
				if (!drawer.drawer || drawer.isOpen) return;
				drawer.isOpen = true;
				drawer.lastFocused = document.activeElement;
				drawer.drawer.classList.add('active');
				drawer.trigger?.setAttribute('aria-expanded', 'true');
				drawer.trigger?.classList.add('bg-primary-100', 'dark:bg-primary-900/35', 'text-primary-700', 'dark:text-primary-200', 'border-primary-300', 'dark:border-primary-700/60');
				document.body.style.overflow = 'hidden';
				const ov = ensureDrawerOverlay();
				requestAnimationFrame(() => ov.classList.add('active'));
				setTimeout(() => drawer.drawer.focus(), 0);
			}

			function closeDrawer() {
				if (!drawer.isOpen) return;
				drawer.isOpen = false;
				drawer.drawer?.classList.remove('active');
				drawer.trigger?.setAttribute('aria-expanded', 'false');
				drawer.trigger?.classList.remove('bg-primary-100', 'dark:bg-primary-900/35', 'text-primary-700', 'dark:text-primary-200', 'border-primary-300', 'dark:border-primary-700/60');
				document.body.style.overflow = '';
				if (drawerOverlay) {
					drawerOverlay.classList.remove('active');
					drawerOverlay.remove();
				}
				drawer.lastFocused?.focus?.();
			}

			function renderDrawer() {
				if (!drawer.list) return;
				const rows = filterAndSort({
					sort: 'date_desc'
				}).slice(0, 10);
				drawer.list.replaceChildren();
				if (!rows.length) {
					const emptyNode = cloneTemplate('tpl-notifications-empty');
					if (emptyNode) {
						emptyNode.querySelector('[data-empty-icon]')?.setAttribute('data-lucide', 'bell');
						emptyNode.querySelector('[data-empty-title]')?.replaceChildren(document.createTextNode('Здесь пока пусто'));
						emptyNode.querySelector('[data-empty-message]')?.replaceChildren(document.createTextNode('Новые уведомления появятся автоматически.'));
						drawer.list.appendChild(emptyNode);
					}
				} else {
					const fragment = document.createDocumentFragment();
					rows.forEach((n) => {
						const t = typeMap[n.type];
						const item = cloneTemplate('tpl-notifications-drawer-item');
						if (!item) return;
						item.classList.toggle('is-unread', !n.isRead);
						item.querySelector('[data-item-icon-wrap]')?.classList.add(...t.wrapClass.split(' '));
						const icon = item.querySelector('[data-item-icon]');
						if (icon) {
							icon.setAttribute('data-lucide', t.icon);
							icon.classList.add(...t.iconClass.split(' '));
						}
						item.querySelector('[data-item-title]')?.replaceChildren(document.createTextNode(n.title));
						item.querySelector('[data-item-message]')?.replaceChildren(document.createTextNode(n.message));
						item.querySelector('[data-item-date]')?.replaceChildren(document.createTextNode(relDate(n.createdAt)));
						const drawerGo = item.matches('[data-drawer-go]') ? item : item.querySelector('[data-drawer-go]');
						drawerGo?.setAttribute('href', `/notifications.php?notification=${encodeURIComponent(n.id)}`);
						item.querySelector('[data-item-unread-dot]')?.classList.toggle('hidden', n.isRead);
						fragment.appendChild(item);
					});
					drawer.list.appendChild(fragment);
				}
				const un = unreadCount();
				if (drawer.count) drawer.count.textContent = `Непрочитанных: ${un} · Показаны последние 10`;
				drawer.dot?.classList.toggle('hidden', un === 0);
				drawer.badge?.classList.toggle('hidden', un === 0);
				if (drawer.badge) drawer.badge.textContent = String(un);
				if (drawer.label) drawer.label.textContent = `Непрочитанных: ${un}`;
			}

			function openDetailOnMobile() {
				if (!page.shell || !isMobile()) return;
				page.shell.classList.add('mobile-detail-open');
				page.listPanel?.classList.add('hidden');
				page.detailPanel?.classList.remove('hidden');
				page.detailPanel?.classList.add('flex');
			}

			function closeDetailOnMobile() {
				if (!page.shell || !isMobile()) return;
				page.shell.classList.remove('mobile-detail-open');
				page.listPanel?.classList.remove('hidden');
				page.detailPanel?.classList.add('hidden');
				page.detailPanel?.classList.remove('flex');
			}

			function renderPage() {
				if (!page.root || !page.list || !page.detail) return;
				const rows = filterAndSort({
					type: state.pageType,
					search: state.search,
					sort: state.sort
				});
				page.list.replaceChildren();
				if (!rows.length) {
					const emptyNode = cloneTemplate('tpl-notifications-empty');
					if (emptyNode) {
						emptyNode.querySelector('[data-empty-icon]')?.setAttribute('data-lucide', 'search-x');
						emptyNode.querySelector('[data-empty-title]')?.replaceChildren(document.createTextNode('Ничего не найдено'));
						emptyNode.querySelector('[data-empty-message]')?.replaceChildren(document.createTextNode('Попробуйте сбросить фильтры или изменить запрос.'));
						page.list.appendChild(emptyNode);
					}
				} else {
					const fragment = document.createDocumentFragment();
					rows.forEach((n) => {
						const t = typeMap[n.type];
						const checked = state.selectedBulk.has(n.id);
						const item = cloneTemplate('tpl-notifications-page-item');
						if (!item) return;
						item.dataset.pageId = n.id;
						item.classList.toggle('is-unread', !n.isRead);
						item.classList.toggle('is-selected', state.selectedId === n.id);
						item.querySelector('[data-item-icon-wrap]')?.classList.add(...t.wrapClass.split(' '));
						const icon = item.querySelector('[data-item-icon]');
						if (icon) {
							icon.setAttribute('data-lucide', t.icon);
							icon.classList.add(...t.iconClass.split(' '));
						}
						item.querySelector('[data-item-title]')?.replaceChildren(document.createTextNode(n.title));
						item.querySelector('[data-item-message]')?.replaceChildren(document.createTextNode(n.message));
						item.querySelector('[data-item-type]')?.replaceChildren(document.createTextNode(t.label));
						item.querySelector('[data-item-date]')?.replaceChildren(document.createTextNode(relDate(n.createdAt)));
						item.querySelector('[data-item-unread-dot]')?.classList.toggle('hidden', n.isRead);
						const checkbox = item.querySelector('[data-bulk-checkbox]');
						if (checkbox) {
							checkbox.checked = checked;
							checkbox.dataset.bulkCheckbox = n.id;
						}
						fragment.appendChild(item);
					});
					page.list.appendChild(fragment);
				}

				const active = byId(state.selectedId);
				page.detail.replaceChildren();
				if (!active) {
					const emptyDetail = cloneTemplate('tpl-notifications-detail-empty');
					if (emptyDetail) page.detail.appendChild(emptyDetail);
				} else {
					const t = typeMap[active.type];
					const detail = cloneTemplate('tpl-notifications-detail');
					if (detail) {
						const chip = detail.querySelector('[data-detail-chip]');
						chip?.classList.add(...t.chipClass.split(' '));
						const icon = detail.querySelector('[data-detail-icon]');
						if (icon) icon.setAttribute('data-lucide', t.icon);
						detail.querySelector('[data-detail-type]')?.replaceChildren(document.createTextNode(t.label));
						detail.querySelector('[data-detail-title]')?.replaceChildren(document.createTextNode(active.title));
						detail.querySelector('[data-detail-date]')?.replaceChildren(document.createTextNode(fullDate(active.createdAt)));
						detail.querySelector('[data-detail-message]')?.replaceChildren(document.createTextNode(active.message));
						page.detail.appendChild(detail);
					}
				}

				const selectedCount = state.selectedBulk.size;
				if (page.bulkbar) page.bulkbar.classList.toggle('hidden', selectedCount === 0);
				if (page.counter) page.counter.textContent = `Выбрано: ${selectedCount}`;
				if (page.sortTrigger) {
					const isCustom = state.sort !== defaultSort;
					page.sortTrigger.classList.toggle('text-primary-700', isCustom);
					page.sortTrigger.classList.toggle('dark:text-primary-300', isCustom);
					page.sortTrigger.classList.toggle('bg-primary-100', isCustom);
					page.sortTrigger.classList.toggle('dark:bg-primary-900/35', isCustom);
					page.sortTrigger.classList.toggle('border-primary-300', isCustom);
					page.sortTrigger.classList.toggle('dark:border-primary-700/60', isCustom);
				}
				if (page.selectModeToggle) {
					const active = state.selectMode;
					page.selectModeToggle.setAttribute('aria-pressed', active ? 'true' : 'false');
					page.selectModeToggle.classList.toggle('bg-primary-100', active);
					page.selectModeToggle.classList.toggle('dark:bg-primary-900/35', active);
					page.selectModeToggle.classList.toggle('text-primary-700', active);
					page.selectModeToggle.classList.toggle('dark:text-primary-200', active);
					page.selectModeToggle.classList.toggle('border-primary-300', active);
					page.selectModeToggle.classList.toggle('dark:border-primary-700/60', active);
				}
				if (page.selectCount) page.selectCount.textContent = String(selectedCount);
			}

			function renderAll() {
				renderDrawer();
				renderPage();
				lucide.createIcons({
					inTemplates: true
				});
			}

			function initSortDropdown() {
				if (!page.root || !window.AppDropdown) return false;
				const instance = window.AppDropdown.get('notifications-sort');
				if (!instance) return false;
				const panel = instance.panel;
				const list = panel.querySelector('[data-notifications-sort-list]');
				const tplNode = document.getElementById('tpl-notifications-sort-option');
				const template = tplNode?.innerHTML || '';
				if (!list || !template) return false;

				const render = () => {
					list.innerHTML = sortOptions.map((opt) => template.replace('{{value}}', opt.value).replace('{{label}}', opt.label)).join('');
					list.querySelectorAll('[data-sort-option]').forEach((el) => {
						const active = el.dataset.sortOption === state.sort;
						el.classList.toggle('is-selected', active);
						el.querySelector('[data-sort-check]')?.classList.toggle('hidden', !active);
						el.addEventListener('click', () => {
							state.sort = el.dataset.sortOption;
							renderPage();
							render();
							instance.close(true);
							lucide.createIcons({
								inTemplates: true
							});
						});
					});
					lucide.createIcons({
						inTemplates: true
					});
				};

				render();
				return true;
			}


			function initSortDropdownWhenReady() {
				if (initSortDropdown()) return;
				let attempts = 0;
				const timer = setInterval(() => {
					attempts += 1;
					if (initSortDropdown() || attempts > 40) clearInterval(timer);
				}, 100);
			}


			function bindDrawer() {
				if (!drawer.trigger || !drawer.drawer || !drawer.list) return;
				const focusables = () => drawer.drawer.querySelectorAll('button,[href],input,select,textarea,[tabindex]:not([tabindex="-1"])');
				drawer.trigger.addEventListener('click', () => drawer.isOpen ? closeDrawer() : openDrawer());
				drawer.close?.addEventListener('click', closeDrawer);
				document.addEventListener('keydown', (e) => {
					if (!drawer.isOpen) return;
					if (e.key === 'Escape') return closeDrawer();
					if (e.key !== 'Tab') return;
					const list = Array.from(focusables()).filter((el) => !el.hasAttribute('disabled'));
					if (!list.length) return;
					const first = list[0];
					const last = list[list.length - 1];
					if (e.shiftKey && document.activeElement === first) {
						e.preventDefault();
						last.focus();
					} else if (!e.shiftKey && document.activeElement === last) {
						e.preventDefault();
						first.focus();
					}
				});
			}

			function bindPage() {
				if (!page.root || !page.list) return;
				page.search?.addEventListener('input', () => {
					state.search = page.search.value;
					renderPage();
					lucide.createIcons({
						inTemplates: true
					});
				});
				page.root.querySelectorAll('[data-type-filter]').forEach((btn) => btn.addEventListener('click', () => {
					state.pageType = btn.dataset.typeFilter;
					page.root.querySelectorAll('[data-type-filter]').forEach((node) => node.classList.toggle('is-active', node === btn));
					renderPage();
					lucide.createIcons({
						inTemplates: true
					});
				}));
				page.list.addEventListener('click', (e) => {
					const checkbox = e.target.closest('[data-bulk-checkbox]');
					if (checkbox) {
						e.stopPropagation();
						const id = checkbox.dataset.bulkCheckbox;
						if (checkbox.checked) state.selectedBulk.add(id);
						else state.selectedBulk.delete(id);
						renderPage();
						lucide.createIcons({
							inTemplates: true
						});
						return;
					}
					const row = e.target.closest('[data-page-id]');
					if (!row) return;
					const id = row.dataset.pageId;
					if (state.selectMode) {
						if (state.selectedBulk.has(id)) state.selectedBulk.delete(id);
						else state.selectedBulk.add(id);
						renderPage();
						lucide.createIcons({
							inTemplates: true
						});
						return;
					}
					state.selectedId = id;
					const target = byId(id);
					if (target) target.isRead = true;
					saveRender();
					openDetailOnMobile();
				});
				page.list.addEventListener('keydown', (e) => {
					const row = e.target.closest('[data-page-id]');
					if (!row) return;
					if (e.key !== 'Enter' && e.key !== ' ') return;
					e.preventDefault();
					row.click();
				});

				page.selectModeToggle?.addEventListener('click', () => {
					state.selectMode = !state.selectMode;
					if (state.selectMode) closeDetailOnMobile();
					if (!state.selectMode) state.selectedBulk.clear();
					page.shell?.classList.toggle('select-mode', state.selectMode);
					renderPage();
					lucide.createIcons({
						inTemplates: true
					});
				});

				page.back?.addEventListener('click', closeDetailOnMobile);
				page.bulkbar?.addEventListener('click', (e) => {
					const btn = e.target.closest('[data-bulk-action]');
					if (!btn || !state.selectedBulk.size) return;
					if (btn.dataset.bulkAction === 'delete') items = items.filter((row) => !state.selectedBulk.has(row.id));
					if (btn.dataset.bulkAction === 'read') items = items.map((row) => state.selectedBulk.has(row.id) ? {
						...row,
						isRead: true
					} : row);
					if (btn.dataset.bulkAction === 'unread') items = items.map((row) => state.selectedBulk.has(row.id) ? {
						...row,
						isRead: false
					} : row);
					state.selectedBulk.clear();
					state.selectMode = false;
					page.shell?.classList.remove('select-mode');
					saveRender();
				});
				const syncResponsivePanels = () => {
					if (!page.shell) return;
					if (!isMobile()) {
						page.shell.classList.remove('mobile-detail-open');
						page.shell.classList.toggle('select-mode', state.selectMode);
						page.listPanel?.classList.remove('hidden');
						page.detailPanel?.classList.remove('hidden');
						page.detailPanel?.classList.add('flex');
						renderPage();
						lucide.createIcons({
							inTemplates: true
						});
						return;
					}

					page.shell.classList.toggle('select-mode', state.selectMode);
					const isDetailOpen = page.shell.classList.contains('mobile-detail-open');
					if (isDetailOpen) {
						page.listPanel?.classList.add('hidden');
						page.detailPanel?.classList.remove('hidden');
						page.detailPanel?.classList.add('flex');
					} else {
						page.listPanel?.classList.remove('hidden');
						page.detailPanel?.classList.add('hidden');
						page.detailPanel?.classList.remove('flex');
					}
				};

				syncResponsivePanels();
				window.addEventListener('resize', syncResponsivePanels);
			}

			bindDrawer();
			bindPage();
			renderAll();
			initSortDropdownWhenReady();
		})();
	</script>