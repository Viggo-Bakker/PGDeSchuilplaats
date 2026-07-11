<?php use System\Utils\TimeFormatter; ?>
<header class="admin-header">
    <h1>Diensten beheren</h1>
    <p>Nieuwe diensten toevoegen en bestaande items beheren.</p>
</header>

<main class="admin-layout">
    <?php if (!empty($errors)): ?>
        <ul class="form-errors">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p class="form-success"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <section id="upload-form">
        <h2>Nieuwe dienst</h2>
        <form action="" method="post">
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
                <input type="text" id="service-time" name="service_time" required placeholder="10:00" value="<?= htmlspecialchars($service['time'] ?? '10:00', ENT_QUOTES, 'UTF-8') ?>">
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

    <section id="services">
        <h2>Overzicht</h2>
        <?php if (!empty($services)): ?>
            <?php foreach ($services as $row): ?>
                <article class="service-card">
                    <h3><?= htmlspecialchars(TimeFormatter::formatDutchDate($row['date'])) ?></h3>
                    <p><?= htmlspecialchars($row['special_occasion'] ?? '') ?></p>
                    <p><?= htmlspecialchars(date('H:i', strtotime($row['time']))) ?> | <?= htmlspecialchars($row['speaker']) ?> | OvD: <?= htmlspecialchars($row['elder']) ?></p>
                    <p><a href="update_service?id=<?= (int) $row['id'] ?>">Bewerk</a> | <a href="admin_services?id=<?= (int) $row['id'] ?>" class="delete-link">Verwijder</a></p>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Er zijn nog geen diensten ingepland.</p>
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