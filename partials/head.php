<?php require 'components/copy-button.php'; ?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Skill Code Pro Exchange - Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap">
  <script src="https://unpkg.com/lucide@latest"></script>

  <style type="text/tailwindcss">
    @import "tailwindcss";

        @custom-variant dark (&:where(.dark, .dark *));

        @theme {
            --color-card: #ffffff;
            --color-accent: #00B074;
            --color-dark-bg: #0B0E11;
            --color-card-dark: #14171A;
        }

        @variant dark {
            --color-card: #14171A;
        }

        @layer base {
            button:not(:disabled),
            [role="button"]:not(:disabled) {
                cursor: pointer;
            }
        }

				@layer utilities {
					.no-scrollbar::-webkit-scrollbar {
						display: none;
					}
					.no-scrollbar {
						-ms-overflow-style: none;
						scrollbar-width: none;
					}
					.no-spinner::-webkit-outer-spin-button,
					.no-spinner::-webkit-inner-spin-button {
						-webkit-appearance: none;
						margin: 0;
					}

					.no-spinner {
						-moz-appearance: textfield;
					}
				}

				@layer components {
					/* общая база для всех карточек */
					.card,
					.card-simple {
						@apply rounded-xl border bg-card border-zinc-200 dark:border-zinc-800 shadow-sm;
					}

					/* 1) простая карточка */
					.card-simple {
						@apply px-4 lg:px-6 py-6;
					}

					/* 2) карточка со структурой */
					.card-header {
						@apply px-4 lg:px-6 py-4 border-b flex items-center justify-between gap-2 flex-wrap
									bg-zinc-100 dark:bg-[#1E2023]
									border-zinc-200 dark:border-zinc-800
									rounded-t-[inherit];
					}

					/* базовый padding card-body */
					.card-body {
						@apply p-4 lg:p-6;
					}

					/* full-bleed (снимаем паддинги через отрицательные margins) */
					.card-body-bleed {
						@apply -m-4 lg:-m-6;
					}
					.card-body-bleed-x {
						@apply -mx-4 lg:-mx-6;
					}
					.card-body-bleed-y {
						@apply -my-4 lg:-my-6;
					}

					/* inset (возвращаем паддинги обратно внутри bleed-контейнера) */
					.card-body-inset {
						@apply p-4 lg:p-6;
					}
					.card-body-inset-x {
						@apply px-4 lg:px-6;
					}
					.card-body-inset-y {
						@apply py-4 lg:py-6;
					}
				}

    </style>

  <style>
  body {
    font-family: 'Inter', sans-serif;
    transition: background-color 0.3s, color 0.3s;
  }

  .sidebar-transition {
    transition: width 0.3s ease-in-out;
  }

  .section-content {
    display: none;
  }

  .section-content.active {
    display: block;
  }

  /* Custom Scrollbar */
  ::-webkit-scrollbar {
    width: 3px;
    height: 3px;
  }

  .dark ::-webkit-scrollbar-thumb {
    background: #27272A;
    border-radius: 10px;
  }

  ::-webkit-scrollbar-thumb {
    background: #E2E8F0;
    border-radius: 10px;
  }

  .c-transition-slider {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1),
      width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }
  </style>

  <style>
  /* ===== USER DRAWER (mobile) ===== */
  #mobile-user-drawer {
    transform: translateY(100%);
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
  }

  #mobile-user-drawer.active {
    transform: translateY(0);
  }

  #mobile-user-drawer.dragging {
    transition: none !important;
  }

  /* ===== MOBILE SIDEBAR DRAWER ===== */
  #mobile-sidebar-drawer {
    transform: translateX(-100%);
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
  }

  #mobile-sidebar-drawer.active {
    transform: translateX(0);
  }

  /* Overlays */
  .overlay {
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
  }

  .overlay.active {
    opacity: 1;
    pointer-events: auto;
  }

  #user-swipe-handle {
    cursor: grab;
  }

  #user-swipe-handle:active {
    cursor: grabbing;
  }

  /* Плавное появление контента */
  .fade-in {
    animation: fadeIn 0.5s ease-out forwards;
  }

  /* Кастомный класс для появления на время тултипа */
  .c-copy-tooltip {
    animation: fadeInOut 2s forwards;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fadeInOut {
    0% {
      opacity: 0;
      transform: translateY(5px);
    }

    20%,
    80% {
      opacity: 1;
      transform: translateY(0);
    }

    100% {
      opacity: 0;
      transform: translateY(-5px);
    }
  }
  </style>
</head>