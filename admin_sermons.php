<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="css/admin.css" />
</head>

<body>
    <?php
    include 'menu.html';
    include 'dbconnect.php';

    $sermon_date = '';
    $speaker_name = '';
    $sermon_title = '';
    $sermon_audio = null;

    // Na include/headers: detecteer wanneer POST leeg is door overschrijding van post_max_size
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Als POST & FILES leeg zijn maar CONTENT_LENGTH aanwezig is, is waarschijnlijk post_max_size overschreden
        if (empty($_POST) && empty($_FILES) && !empty($_SERVER['CONTENT_LENGTH'])) {
            echo '<p style="color:red;">Upload mislukt: bestand is groter dan de serverlimiet. Vergroot upload_max_filesize / post_max_size in php.ini.</p>';
        } else {
            // je bestaande formulierverwerking hier...
            if (isset($_POST['send'])) {
                $sermon_date = $_POST['sermon_date'] ?? null;
                $speaker_name = $_POST['speaker_name'] ?? null;
                $sermon_title = $_POST['sermon_title'] ?? null;

                if (isset($_FILES['sermon_audio'])) {
                    $fileName = $_FILES['sermon_audio']['name'];
                    $tmpName = $_FILES['sermon_audio']['tmp_name'];
                    $uploadDir = 'uploads/audio/';
                    $filePath = $uploadDir . basename($fileName);

                    // verplaats bestand naar uploads map
                    if (move_uploaded_file($tmpName, $filePath)) {
                        // opslaan in database (alleen pad)
                        $query_upload = $db->prepare("INSERT INTO sermons(date, name, title, file) VALUES(?, ?, ?, ?)");
                        $query_upload->execute([$sermon_date, $speaker_name, $sermon_title, $filePath]);
                        echo "Upload gelukt!";
                    } else {
                        echo "Fout bij uploaden!";
                    }
                }
            } else {
                $sermon_date = '';
                $speaker_name = '';
                $sermon_title = '';
                $sermon_audio = null;
            }
        }
    }
    ?>
    <main>
        <section id="upload-form" style="margin-top: 100px;">
            <h2>Upload een Preek</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="sermon-date">*Datum:</label>
                    <input type="date" id="sermon-date" name="sermon_date" required value="<?php echo htmlspecialchars($sermon_date, ENT_QUOTES); ?>">
                </div>

                <div class="form-group">
                    <label for="speaker-name">*Spreker:</label>
                    <input type="text" id="speaker-name" name="speaker_name" required value="<?php echo htmlspecialchars($speaker_name, ENT_QUOTES); ?>">
                </div>

                <div class="form-group">
                    <label for="sermon-title">*Titel:</label>
                    <input type="text" id="sermon-title" name="sermon_title" required value="<?php echo htmlspecialchars($sermon_title, ENT_QUOTES); ?>">
                </div>

                <div class="form-group">
                    <span class="file-label">*Audio bestand: (.mp3)</span>
                    <input type="file" id="sermon-audio" name="sermon_audio" accept=".mp3" required>
                </div>

                <button type="submit" name="send" value="Upload Preek">Versturen</button>
            </form>


            <p style="margin-top: 50px;">Bewerken of verwijderen kan bij de <a href="sermons.php">preken pagina</a>.</p>
        </section>
    </main>

    <footer>
        <a href="#">Schuilplaats</a>
        <a href="#">06-12345678</a>
        <a href="#">info@deschuilplaats.nl</a>
    </footer>
</body>

</html>