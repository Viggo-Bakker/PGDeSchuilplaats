<?php use System\Utils\TimeFormatter; ?>
<header class="admin-header" aria-labelledby="admin-services-title">
    <h1 id="admin-services-title">Diensten beheren</h1>
    <p>Nieuwe diensten toevoegen en bestaande items beheren.</p>
</header>

<main class="admin-layout">
    <?php if (!empty($errors)): ?>
        <aside class="form-errors admin-feedback" role="alert">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </aside>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p class="form-success admin-feedback" role="status"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <section id="upload-form" class="admin-panel" aria-labelledby="upload-service-title">
        <h2 id="upload-service-title">Nieuwe dienst</h2>
        <form action="" method="post" class="admin-form">
            <div class="form-group">
                <label for="service-date">Datum</label>
                <input type="date" id="service-date" name="service_date" required value="<?= htmlspecialchars($service['date'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <div class="form-group">
                <label for="special_occasion">Bijzondere gelegenheid</label>
                <input type="text" id="special_occasion" name="special_occasion" value="<?= htmlspecialchars($service['special_occasion'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <div class="form-group">
                <label for="service-time">Tijd</label>
                <input type="time" id="service-time" name="service_time" required value="<?= htmlspecialchars(normalize_time_input($service['time'] ?? '10:00'), ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <div class="form-group">
                <label for="speaker_name">Spreker</label>
                <input type="text" id="speaker_name" name="speaker_name" required value="<?= htmlspecialchars($service['speaker'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <div class="form-group">
                <label for="elder_name">Oudste van dienst</label>
                <input type="text" id="elder_name" name="elder_name" required value="<?= htmlspecialchars($service['elder'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <button type="submit">Opslaan</button>
        </form>
    </section>

    <section id="services" class="admin-panel" aria-labelledby="services-overview-title">
        <h2 id="services-overview-title">Overzicht</h2>
        <?php if (!empty($services)): ?>
            <div class="admin-list" role="list">
                <?php foreach ($services as $row): ?>
                    <article class="service-card admin-list-item" role="listitem">
                        <header>
                            <h3><?= htmlspecialchars(TimeFormatter::formatDutchDate($row['date'])) ?></h3>
                        </header>
                        <p><?= htmlspecialchars($row['special_occasion'] ?? '') ?></p>
                        <p><?= htmlspecialchars(normalize_time_input($row['time'] ?? '10:00')) ?> | <?= htmlspecialchars($row['speaker']) ?> | OvD: <?= htmlspecialchars($row['elder']) ?></p>
                        <footer class="admin-card-actions">
                            <a href="update_service?id=<?= (int) $row['id'] ?>">Bewerk</a>
                            <a href="admin_services?id=<?= (int) $row['id'] ?>" class="delete-link">Verwijder</a>
                        </footer>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="admin-empty">Er zijn nog geen diensten ingepland.</p>
        <?php endif; ?>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('a.delete-link').forEach(function(link) {
        link.addEventListener('click', function(event) {
            if (!confirm('Weet je zeker dat je deze dienst wilt verwijderen?')) {
                event.preventDefault();
            }
        });
    });
});
</script>