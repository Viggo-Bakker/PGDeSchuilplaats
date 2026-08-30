<header class="page-hero">
    <div class="overlay">
        <h1 id="search-page-title">Zoeken</h1>
        <p>Zoeken door pagina's en titels</p>
    </div>
</header>

<main class="content-page">
    <section class="content-block">
        <h2 id="search-list-title">Resultaten</h2>

        <?php if ($searchTerm === ''): ?>
            <p>Vul een zoekterm in.</p>
        <?php elseif (empty($results)): ?>
            <p>Geen resultaten</p>
        <?php else: ?>
            <p>Zoekterm: <?= htmlspecialchars($searchTerm, ENT_QUOTES, 'UTF-8') ?></p>

            <?php if (!empty($results)): ?>
                <ul>
                    <?php foreach ($results as $result): ?>
                        <li>
                            <a href="<?= htmlspecialchars($result['url'], ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($result['pagetitle'], ENT_QUOTES, 'UTF-8') ?>
                            </a>
                            (score: <?= (int) $result['score'] ?>)
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Geen resultaten gevonden.</p>
            <?php endif; ?>
        <?php endif; ?>
    </section>
</main>