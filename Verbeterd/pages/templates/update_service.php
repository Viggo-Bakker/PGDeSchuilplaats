<header class="admin-header" aria-labelledby="edit-service-title">
    <h1 id="edit-service-title">Dienst bewerken</h1>
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

    <?php if (!empty($service['id'])): ?>
        <section class="admin-panel" aria-labelledby="edit-service-form-title">
            <h2 id="edit-service-form-title">Dienstgegevens aanpassen</h2>
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
    <?php endif; ?>
</main>