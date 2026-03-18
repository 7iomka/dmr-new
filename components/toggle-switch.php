<?php

function toggleSwitch(array $props = []) {
  $name = $props['name'] ?? null;
  $id = $props['id'] ?? ('toggle-' . uniqid());
  $checked = !empty($props['checked']);
  $disabled = !empty($props['disabled']);
  $ariaLabel = $props['ariaLabel'] ?? null;
  $onchange = $props['onchange'] ?? null;

  $defaultClass = "c-toggleswitch";

  if (!empty($props['classOverride'])) {
    $class = $props['classOverride'];
  } else {
    $class = $defaultClass . ' ' . ($props['class'] ?? '');
  }

  ob_start();
?>

  <label
    class="<?= htmlspecialchars($class) ?>"
    <?= $ariaLabel ? 'aria-label="' . htmlspecialchars($ariaLabel) . '"' : '' ?>>
    <input
      type="checkbox"
      <?= $name ? 'name="' . htmlspecialchars($name) . '"' : '' ?>
      id="<?= htmlspecialchars($id) ?>"
      class="c-toggleswitch-input js-toggleswitch"
      role="switch"
      aria-checked="<?= $checked ? 'true' : 'false' ?>"
      <?= $checked ? 'checked' : '' ?>
      <?= $disabled ? 'disabled' : '' ?>
      <?= $onchange ? 'onchange="' . htmlspecialchars($onchange) . '"' : '' ?>>

    <span class="c-toggleswitch-slider">
      <span class="c-toggleswitch-handle"></span>
    </span>
  </label>

<?php
  return ob_get_clean();
}
