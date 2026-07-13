<?php

use System\Utils\TimeFormatter; ?>
<header class="page-hero page-hero--services" aria-labelledby="services-page-title">
    <div class="overlay">
        <h1 id="services-page-title">Diensten</h1>
        <p>Overzicht van de eerstvolgende diensten en bijeenkomsten.</p>
    </div>
</header>

<main class="content-page service-overview">
    <section class="content-block">
        <h2>Uitleg</h2>
        <p>Elke zondag om 10.00 uur komen wij samen in De Schuilplaats om daar onze Heer te loven en prijzen voor wie Hij is en wat hij doet. Dit doen wij door het zingen van liederen, het opheffen van handen en uitspreken van gebeden.
            Soms wordt er ook gedanst. Dit alles onderleiding van een aanbiddingsleider, zangers en een band. Kinderen vanaf 3 jaar zijn hier ongeveer 30 min bij aanwezig. Daarna gaan zij naar hun eigen groepen toe zondagsschoolklassen.
            Om daar op hun eigen leeftijdsniveau onderwijs uit de bijbel te krijgen en spelletjes te doen of te knutselen.</p>
    </section>

    <section class="content-block service-overview__list" aria-labelledby="services-list-title">
        <form class="search-bar" method="post" action="">
            <label class="sr-only" for="service-search">Zoek op spreker of gelegenheid</label>
            <input type="text" id="service-search" name="search_service" placeholder="Zoek op spreker of gelegenheid" value="<?= htmlspecialchars($searchTerm ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <button type="submit">Zoek</button>
        </form>
        <h2 id="services-list-title">Planning</h2>
        <div class="service-list" role="list">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $service): ?>
                    <article class="service-card" role="listitem">
                        <header>
                            <h3><?= htmlspecialchars(TimeFormatter::formatDutchDate($service['date'])) ?></h3>
                        </header>
                        <p><?= htmlspecialchars($service['special_occasion'] ?? '') ?></p>
                        <p><?= htmlspecialchars(date('H:i', strtotime($service['time']))) ?> | <?= htmlspecialchars($service['speaker']) ?> | OvD: <?= htmlspecialchars($service['elder']) ?></p>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Er zijn nog geen diensten gevonden.</p>
            <?php endif; ?>
        </div>
    </section>
</main>