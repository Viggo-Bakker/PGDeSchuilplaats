<header style="margin-top: 100px;">
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
        <section id="upload-form" >
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