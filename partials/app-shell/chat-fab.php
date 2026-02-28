<div class="chat-fab-container fixed bottom-14 right-4 xl:bottom-8 xl:right-8 z-[101]">
  <a
    href="/chat"
    class="group relative h-10 w-10 xl:h-12 xl:w-12 flex items-center justify-center rounded-full
           border border-accent/25
           bg-white/60 dark:bg-zinc-900/40
           backdrop-blur
           text-accent
           shadow-sm shadow-black/5 dark:shadow-black/20
           transition
           hover:shadow-md hover:shadow-black/10 dark:hover:shadow-black/30
           hover:-translate-y-0.5
           focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-accent/40
           active:translate-y-0"
    aria-label="Открыть чат поддержки">
    <svg
      class="w-4 h-4 xl:w-6 xl:h-6 opacity-90 group-hover:opacity-100 transition"
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round">
      <path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719" />
      <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
      <path d="M12 17h.01" />
    </svg>

    <!-- badge: показывай только если count > 0 -->
    <span class="absolute -top-1 -right-1">
      <!-- ping: строго круг -->
      <span
        class="absolute inset-0 w-5 h-5 xl:w-6 xl:h-6 rounded-full bg-accent/35 blur-[0.5px] animate-ping"></span>

      <!-- badge: строго круг, 2 цифры -->
      <span
        class="relative w-5 h-5 xl:w-6 xl:h-6 rounded-full
               inline-flex items-center justify-center
               text-[11px] xl:text-[12px] font-bold leading-none tabular-nums
               bg-accent text-white
               border border-white/70 dark:border-zinc-900/70
               shadow-sm shadow-black/10">
        99
      </span>
    </span>
  </a>
</div>