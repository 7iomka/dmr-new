<?php

function copyButton(array $props = [])
{
    $text = $props['text'] ?? null;
    $target = $props['target'] ?? null;
    $tooltip = $props['tooltip'] ?? 'Скопировано';

    // дефолтные классы (ровно твои)
    $defaultClass = "relative p-2 bg-white dark:bg-zinc-800 shadow-sm border border-zinc-200 dark:border-transparent hover:bg-zinc-50 dark:hover:bg-zinc-700 text-zinc-700 dark:text-white rounded-lg transition-all active:scale-95 flex-shrink-0";

    // логика классов
    if (!empty($props['classOverride'])) {
        $class = $props['classOverride'];
    } else {
        $class = $defaultClass . ' ' . ($props['class'] ?? '');
    }

    // дефолт idle SVG (твоя иконка copy)
    $idleDefault = '
    <svg class="lucide lucide-copy w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="copy" aria-hidden="true">
        <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
        <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
    </svg>';

    // дефолт success SVG (твоя галочка)
    $successDefault = '
    <svg class="lucide lucide-check-icon lucide-check w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M20 6 9 17l-5-5"/>
    </svg>';

    ob_start();
    ?>

<button data-copy <?= $text ? 'data-copy-text="' . htmlspecialchars($text) . '"' : '' ?>
  <?= $target ? 'data-copy-target="' . htmlspecialchars($target) . '"' : '' ?>
  data-copy-tooltip="<?= htmlspecialchars($tooltip) ?>" class="<?= $class ?>">
  <!-- idle -->
  <span data-copy-idle>
    <?= $props['idle'] ?? $idleDefault ?>
  </span>

  <!-- success -->
  <span data-copy-success class="hidden text-emerald-500">
    <?= $props['success'] ?? $successDefault ?>
  </span>

  <!-- tooltip -->
  <span data-copy-tooltip-el class="hidden absolute -top-8 right-0 text-xs bg-accent text-white px-2 py-1 rounded-md">
    <?= htmlspecialchars($tooltip) ?>
  </span>
</button>

<?php
    return ob_get_clean();
}