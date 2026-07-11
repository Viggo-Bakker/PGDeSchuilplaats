<header class="admin-header">
    <h1>Preek bewerken</h1>
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

    <?php if (!empty($sermon->date)): ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="sermon-date">Datum</label>
                <input type="date" id="sermon-date" name="date" required value="<?= htmlspecialchars($sermon->date, ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="form-group">
                <label for="speaker-name">Spreker</label>
                <input type="text" id="speaker-name" name="name" required value="<?= htmlspecialchars($sermon->name, ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="form-group">
                <label for="sermon-title">Titel</label>
                <input type="text" id="sermon-title" name="title" required value="<?= htmlspecialchars($sermon->title, ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="form-group">
                <label for="sermon-audio">Nieuw audio bestand (optioneel)</label>
                <input type="file" id="sermon-audio" name="audio" accept=".mp3,audio/mpeg">
            </div>
            <button type="submit">Opslaan</button>
        </form>
    <?php endif; ?>
</main>