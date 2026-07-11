<?php use System\Utils\TimeFormatter; ?>
<header id="sermon">
    <div class="overlay">
        <h1>Preken luisteren</h1>
        <p>Terugluisteren van recente preken en onderwijs.</p>
    </div>
</header>

<main>
    <section id="sermons">
        <div id="sermons-header">
            <h2>Recente Preken</h2>

            <form class="search-bar" method="post" action="">
                <input type="text" name="search_sermon" placeholder="Zoek op spreker of titel" value="<?= htmlspecialchars($searchTerm ?? '', ENT_QUOTES, 'UTF-8') ?>">
                <button type="submit">Zoek</button>
            </form>
        </div>

        <div id="sermon-list">
            <?php if (!empty($result)): ?>
                <?php foreach ($result as $row): ?>
                    <div class="sermon">
                        <p><?= htmlspecialchars(TimeFormatter::formatDutchDate($row['date'])) ?><br class="break"><span class="vertical-dash"> | </span><?= htmlspecialchars($row['name']) ?><br class="break"><span class="vertical-dash"> | </span><?= htmlspecialchars($row['title']) ?></p>
                        <audio controls preload="metadata" name="media">
                            <source src="<?= htmlspecialchars(sermon_audio_url($row['file'])) ?>" type="audio/mpeg">
                        </audio>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Er zijn nog geen preken beschikbaar.</p>
            <?php endif; ?>

            <div id="show-other-container">
                <?php $prev = max(0, $offset - 5); $next = $offset + 5; ?>
                <a class="show-other" href="?offset=<?= $prev ?>">&lt;</a>
                <p class="show-other"><?= htmlspecialchars((string) $offset, ENT_QUOTES, 'UTF-8') ?> / <?= htmlspecialchars((string) ($offset + 5), ENT_QUOTES, 'UTF-8') ?></p>
                <a class="show-other" href="?offset=<?= $next ?>">&gt;</a>
            </div>
        </div>
    </section>
</main><header>
    <h1>Preken</h1>
</header>

<main style="margin-top: 20px;">
    <?php if (!empty($errors)): ?>
        <ul class="form-errors">
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <p class="form-success"><?php echo $success; ?></p>
    <?php endif; ?>

    <?php if (isset($sermon)): ?>
        <section id="upload-form">
            <h2>Upload een Preek</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="sermon-date">*Datum:</label>
                    <input type="date" id="sermon-date" name="date" required value="<?= $sermon->date; ?>">
                </div>

                <div class="form-group">
                    <label for="speaker-name">*Spreker:</label>
                    <input type="text" id="speaker-name" name="name" required value="<?= $sermon->name; ?>">
                </div>

                <div class="form-group">
                    <label for="sermon-title">*Titel:</label>
                    <input type="text" id="sermon-title" name="title" required value="<?= $sermon->title; ?>">
                </div>

                <div class="form-group">
                    <label for="sermon-audio">*Audio bestand: (.mp3)</label>
                    <input type="file" id="sermon-audio" name="audio" accept=".mp3" required>
                </div>

                <button type="submit" name="submit">Versturen</button>
                <?php
                if (isset($message)) {
                    echo '<div class="form-message">' . htmlspecialchars($message) . '</div>';
                }
                ?>
            </form>


            <p style="margin-top: 50px;">Bewerken of verwijderen kan bij de <a href="sermons.php">preken pagina</a>.</p>
        </section>
    <?php endif; ?>
</main>