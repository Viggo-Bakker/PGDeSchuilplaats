<?php use System\Utils\TimeFormatter; ?>
<header class="admin-header">
    <h1>Preken beheren</h1>
    <p>Upload nieuwe preken en beheer bestaande audio-opnames.</p>
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
        <h2>Nieuwe preek uploaden</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="sermon-date">Datum</label>
                <input type="date" id="sermon-date" name="date" required value="<?= htmlspecialchars($sermon->date ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <div class="form-group">
                <label for="speaker-name">Spreker</label>
                <input type="text" id="speaker-name" name="name" required value="<?= htmlspecialchars($sermon->name ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <div class="form-group">
                <label for="sermon-title">Titel</label>
                <input type="text" id="sermon-title" name="title" required value="<?= htmlspecialchars($sermon->title ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <div class="form-group">
                <label for="sermon-audio">Audio bestand</label>
                <input type="file" id="sermon-audio" name="audio" accept=".mp3,audio/mpeg" required>
            </div>

            <button type="submit">Opslaan</button>
        </form>
    </section>

    <section id="sermon-list">
        <h2>Bestaande preken</h2>
        <?php if (!empty($sermons)): ?>
            <?php foreach ($sermons as $row): ?>
                <div class="sermon">
                    <p><?= htmlspecialchars(TimeFormatter::formatDutchDate($row['date'])) ?> | <?= htmlspecialchars($row['name']) ?> | <?= htmlspecialchars($row['title']) ?></p>
                    <audio controls preload="metadata" name="media">
                        <source src="<?= htmlspecialchars(sermon_audio_url($row['file'])) ?>" type="audio/mpeg">
                    </audio>
                    <div>
                        <a href="update_sermon?id=<?= (int) $row['id'] ?>">Bewerk</a>
                        |
                        <a href="admin_sermons?id=<?= (int) $row['id'] ?>" class="delete-link">Verwijder</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nog geen preken opgeslagen.</p>
        <?php endif; ?>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('a.delete-link').forEach(function(link) {
        link.addEventListener('click', function(event) {
            if (!confirm('Weet je zeker dat je deze preek wilt verwijderen?')) {
                event.preventDefault();
            }
        });
    });
});
</script>