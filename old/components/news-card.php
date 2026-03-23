<?php

if (!function_exists('renderNewsCard')) {
  function renderNewsCard(array $newsItem, array $options = []): void
  {
    $href = $options['href'] ?? ('news-detail.php?id=' . $newsItem['id']);
    $titleClampClass = $options['titleClampClass'] ?? 'line-clamp-2';
    $excerptClampClass = $options['excerptClampClass'] ?? 'line-clamp-3';
    ?>
    <article class="project-news-card">
      <a href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>" class="project-news-card__link">
        <div class="project-news-card__media-wrap">
          <img
            src="<?= htmlspecialchars($newsItem['image'], ENT_QUOTES, 'UTF-8') ?>"
            alt="<?= htmlspecialchars($newsItem['title'], ENT_QUOTES, 'UTF-8') ?>"
            class="project-news-card__media"
            loading="lazy"
          >
          <div class="project-news-card__media-overlay"></div>
          <span class="project-news-card__date"><?= htmlspecialchars($newsItem['date'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>
        <div class="project-news-card__body">
          <h3 class="project-news-card__title <?= htmlspecialchars($titleClampClass, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($newsItem['title'], ENT_QUOTES, 'UTF-8') ?></h3>
          <p class="project-news-card__excerpt <?= htmlspecialchars($excerptClampClass, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($newsItem['excerpt'], ENT_QUOTES, 'UTF-8') ?></p>
        </div>
      </a>
    </article>
    <?php
  }
}
