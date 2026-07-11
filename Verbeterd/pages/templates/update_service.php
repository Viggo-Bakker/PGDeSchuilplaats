<header class="admin-header">
    <h1>Dienst bewerken</h1>
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

    <?php if (!empty($service['id'])): ?>
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
                <input type="text" id="service-time" name="service_time" required value="<?= htmlspecialchars($service['time'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
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
    <?php endif; ?>
</main>