<?php

if (!function_exists('renderPhoneInput')) {
    /**
     * @param array{
     *   id?:string,
     *   name?:string,
     *   hidden_name?:string,
     *   hidden_id?:string,
     *   placeholder?:string,
     *   required?:bool,
     *   autocomplete?:string,
     *   inputmode?:string,
     *   value?:string,
     *   country_code?:string,
     *   country_flag?:string,
     *   input_class?:string,
     *   shell_class?:string,
     *   root_class?:string
     * } $config
     */
    function renderPhoneInput(array $config = []): string
    {
        $id = (string)($config['id'] ?? 'phone');
        $name = (string)($config['name'] ?? 'phone');
        $hiddenName = (string)($config['hidden_name'] ?? 'phone_country_code');
        $hiddenId = (string)($config['hidden_id'] ?? $id . '-country-code');
        $placeholder = (string)($config['placeholder'] ?? '(999) 123-45-67');
        $autocomplete = (string)($config['autocomplete'] ?? 'tel');
        $inputmode = (string)($config['inputmode'] ?? 'tel');
        $value = (string)($config['value'] ?? '');
        $countryCode = (string)($config['country_code'] ?? '+7');
        $countryFlag = (string)($config['country_flag'] ?? '🇷🇺');
        $inputClass = trim('auth-phone-input ' . (string)($config['input_class'] ?? ''));
        $shellClass = trim('auth-phone-shell ' . (string)($config['shell_class'] ?? ''));
        $rootClass = trim((string)($config['root_class'] ?? ''));
        $required = array_key_exists('required', $config) ? (bool)$config['required'] : true;

        $requiredAttr = $required ? ' required' : '';

        return sprintf(
            '<div class="%1$s" data-phone-input-root>' .
            '<div class="%2$s">' .
            '<div class="auth-phone-prefix">' .
            '<button data-phone-country-trigger type="button" class="auth-phone-country-trigger" aria-haspopup="listbox" aria-expanded="false">' .
            '<span data-phone-country-flag class="text-base leading-none">%3$s</span>' .
            '<span data-phone-country-code>%4$s</span>' .
            '<i data-lucide="chevron-down" class="auth-phone-country-chevron"></i>' .
            '</button>' .
            '</div>' .
            '<input id="%5$s" name="%6$s" type="tel"%7$s placeholder="%8$s" class="%9$s" autocomplete="%10$s" inputmode="%11$s" value="%12$s">' .
            '</div>' .
            '<input data-phone-country-hidden id="%13$s" type="hidden" name="%14$s" value="%4$s">' .
            '<div data-phone-country-panel class="auth-phone-country-panel hidden" role="dialog" aria-label="Выбор страны">' .
            '<input data-phone-country-search class="auth-phone-country-search" type="text" placeholder="Поиск страны" autocomplete="off">' .
            '<div data-phone-country-list class="auth-phone-country-list" role="listbox" aria-label="Список стран"></div>' .
            '</div>' .
            '</div>',
            htmlspecialchars($rootClass, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($shellClass, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($countryFlag, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($countryCode, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($id, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
            $requiredAttr,
            htmlspecialchars($placeholder, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($inputClass, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($autocomplete, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($inputmode, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($value, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($hiddenId, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($hiddenName, ENT_QUOTES, 'UTF-8')
        );
    }
}

if (!function_exists('renderPhoneInputScript')) {
    function renderPhoneInputScript(): string
    {
        return <<<'HTML'
<script type="module">
  import { computePosition, autoUpdate, offset, flip, shift } from 'https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.10/+esm';

  (() => {
    if (window.__authPhoneInputInitialized) return;
    window.__authPhoneInputInitialized = true;

    const countries = [
      { name: 'Russia', native: 'Россия', flag: '🇷🇺', code: '+7' },
      { name: 'Moldova', native: 'Moldova', flag: '🇲🇩', code: '+373' },
      { name: 'Ukraine', native: 'Україна', flag: '🇺🇦', code: '+380' },
      { name: 'Belarus', native: 'Беларусь', flag: '🇧🇾', code: '+375' },
      { name: 'Uzbekistan', native: 'Oʻzbekiston', flag: '🇺🇿', code: '+998' },
      { name: 'Kazakhstan', native: 'Қазақстан', flag: '🇰🇿', code: '+7' },
      { name: 'United States', native: 'United States', flag: '🇺🇸', code: '+1' },
    ];

    const roots = [...document.querySelectorAll('[data-phone-input-root]')];

    roots.forEach((root) => {
      const trigger = root.querySelector('[data-phone-country-trigger]');
      const panel = root.querySelector('[data-phone-country-panel]');
      const list = root.querySelector('[data-phone-country-list]');
      const search = root.querySelector('[data-phone-country-search]');
      const flag = root.querySelector('[data-phone-country-flag]');
      const code = root.querySelector('[data-phone-country-code]');
      const hiddenCode = root.querySelector('[data-phone-country-hidden]');
      const phone = root.querySelector('input[type="tel"]');

      if (!trigger || !panel || !list || !search || !flag || !code || !hiddenCode || !phone) return;

      let cleanup = null;

      function renderList(filter = '') {
        const q = filter.trim().toLowerCase();
        list.innerHTML = '';

        countries
          .filter((c) => (`${c.name} ${c.native} ${c.code}`).toLowerCase().includes(q))
          .forEach((c) => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'auth-phone-country-item';
            btn.setAttribute('role', 'option');
            btn.innerHTML = `
              <span class="flex items-center gap-3 min-w-0">
                <span class="text-base leading-none">${c.flag}</span>
                <span class="truncate">${c.name} (${c.native})</span>
              </span>
              <span class="text-zinc-400 dark:text-zinc-500">${c.code}</span>
            `;
            btn.addEventListener('click', () => {
              flag.textContent = c.flag;
              code.textContent = c.code;
              hiddenCode.value = c.code;
              closePanel();
            });
            list.appendChild(btn);
          });
      }

      async function positionPanel() {
        const { x, y } = await computePosition(trigger, panel, {
          placement: 'bottom-start',
          strategy: 'fixed',
          middleware: [offset(8), flip(), shift({ padding: 8 })],
        });
        panel.style.left = `${x}px`;
        panel.style.top = `${y}px`;
      }

      function openPanel() {
        panel.classList.remove('hidden');
        trigger.setAttribute('aria-expanded', 'true');
        cleanup = autoUpdate(trigger, panel, positionPanel);
        positionPanel();
        search.value = '';
        renderList('');
        setTimeout(() => search.focus(), 0);
      }

      function closePanel() {
        panel.classList.add('hidden');
        trigger.setAttribute('aria-expanded', 'false');
        cleanup?.();
        cleanup = null;
      }

      renderList();

      trigger.addEventListener('click', () => {
        const isOpen = !panel.classList.contains('hidden');
        if (isOpen) closePanel();
        else openPanel();
      });

      search.addEventListener('input', () => renderList(search.value));

      document.addEventListener('click', (event) => {
        if (panel.classList.contains('hidden')) return;
        const insidePanel = panel.contains(event.target);
        const insideTrigger = trigger.contains(event.target);
        if (!insidePanel && !insideTrigger) closePanel();
      });

      document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closePanel();
      });

      phone.addEventListener('input', () => {
        const raw = phone.value.replace(/\D/g, '').slice(0, 10);
        const parts = [];
        if (raw.length > 0) parts.push('(' + raw.slice(0, 3));
        if (raw.length >= 4) parts[0] += ')';
        if (raw.length > 3) parts.push(' ' + raw.slice(3, 6));
        if (raw.length > 6) parts.push('-' + raw.slice(6, 8));
        if (raw.length > 8) parts.push('-' + raw.slice(8, 10));
        phone.value = parts.join('');
      });
    });

    if (window.lucide) {
      window.lucide.createIcons({ inTemplates: true });
    }
  })();
</script>
HTML;
    }
}
