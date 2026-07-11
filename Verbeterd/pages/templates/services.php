<?php use System\Utils\TimeFormatter; ?>
<header class="page-hero">
    <div class="overlay">
        <h1>Diensten</h1>
        <p>Overzicht van de eerstvolgende diensten en bijeenkomsten.</p>
    </div>
</header>

<main class="content-page">
    <section class="content-block">
        <form class="search-bar" method="post" action="">
            <input type="text" name="search_service" placeholder="Zoek op spreker of gelegenheid" value="<?= htmlspecialchars($searchTerm ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <button type="submit">Zoek</button>
        </form>
    </section>

    <section class="content-block">
        <?php if (!empty($services)): ?>
            <?php foreach ($services as $service): ?>
                <article class="service-card">
                    <h2><?= htmlspecialchars(TimeFormatter::formatDutchDate($service['date'])) ?></h2>
                    <p><?= htmlspecialchars($service['special_occasion'] ?? '') ?></p>
                    <p><?= htmlspecialchars(date('H:i', strtotime($service['time']))) ?> | <?= htmlspecialchars($service['speaker']) ?> | OvD: <?= htmlspecialchars($service['elder']) ?></p>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Er zijn nog geen diensten gevonden.</p>
        <?php endif; ?>
    </section>
</main>