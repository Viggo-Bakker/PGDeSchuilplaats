<?php use System\Utils\TimeFormatter; ?>
<header class="page-hero page-hero--sermons" aria-labelledby="sermons-page-title">
    <div class="overlay">
        <h1 id="sermons-page-title">Preken luisteren</h1>
        <p>Terugluisteren van recente preken en onderwijs.</p>
    </div>
</header>

<main class="content-page sermon-overview">
    <section class="content-block sermon-overview__toolbar" aria-label="Zoek preken">
        <h2>Recente preken</h2>

        <form class="search-bar" method="GET" action="">
            <label class="sr-only" for="sermon-search">Zoek op spreker of titel</label>
            <input type="text" id="sermon-search" name="q" placeholder="Zoek op spreker of titel" value="<?= htmlspecialchars($searchTerm ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <button type="submit">Zoek</button>
        </form>
    </section>

    <section class="content-block sermon-overview__list" aria-labelledby="sermons-list-title">
        <h2 id="sermons-list-title">Beschikbare preken</h2>
        <div class="sermon-list" role="list">
            <?php if (!empty($result)): ?>
                <?php foreach ($result as $row): ?>
                    <article class="sermon-card" role="listitem">
                        <header class="sermon-card__meta">
                            <p><?= htmlspecialchars(TimeFormatter::formatDutchDate($row['date'])) ?> <span class="vertical-dashes"><?= htmlspecialchars($row['name']) ?></span> <?= htmlspecialchars($row['title']) ?></p>
                        </header>
                        <audio controls preload="metadata" name="media">
                            <source src="<?= htmlspecialchars(sermon_audio_url($row['file'])) ?>" type="audio/mpeg">
                        </audio>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Er zijn nog geen preken beschikbaar.</p>
            <?php endif; ?>
        </div>

        <nav class="sermon-overview__pagination" aria-label="Preken navigatie">
            <?php $prev = max(0, $offset - 5); $next = $offset + 5; ?>
            <a class="sermon-overview__page-button" href="?offset=<?= $prev ?>" aria-label="Vorige preken">&lt;</a>
            <p class="sermon-overview__page-label"><?= htmlspecialchars((string) $offset, ENT_QUOTES, 'UTF-8') ?> / <?= htmlspecialchars((string) ($offset + 5), ENT_QUOTES, 'UTF-8') ?></p>
            <a class="sermon-overview__page-button" href="?offset=<?= $next ?>" aria-label="Volgende preken">&gt;</a>
        </nav>
    </section>
</main>