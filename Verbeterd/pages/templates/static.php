<header class="page-hero">
    <div class="overlay">
        <h1><?= htmlspecialchars($pageHeroTitle ?? $pageTitle ?? '', ENT_QUOTES, 'UTF-8') ?></h1>
        <?php if (!empty($pageHeroText)): ?>
            <p><?= htmlspecialchars($pageHeroText, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>
    </div>
</header>

<main class="content-page">
    <?php if (!empty($pageIntro)): ?>
        <section class="content-block intro-block">
            <?= $pageIntro ?>
        </section>
    <?php endif; ?>

    <?php foreach (($pageSections ?? []) as $section): ?>
        <section class="content-block">
            <?php if (!empty($section['title'])): ?>
                <h2><?= htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8') ?></h2>
            <?php endif; ?>
            <div class="content-body">
                <?= $section['body'] ?? '' ?>
            </div>
        </section>
    <?php endforeach; ?>
</main>