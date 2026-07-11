<header class="admin-header" aria-labelledby="edit-sermon-title">
    <h1 id="edit-sermon-title">Preek bewerken</h1>
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

    <?php if (!empty($sermon->date)): ?>
        <section class="admin-panel" aria-labelledby="edit-sermon-form-title">
            <h2 id="edit-sermon-form-title">Preekgegevens aanpassen</h2>
            <form action="" method="post" enctype="multipart/form-data" class="admin-form">
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
        </section>
    <?php endif; ?>
</main>