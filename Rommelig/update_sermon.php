<?php
session_start();

include 'dbconnect.php';
include 'functions.php';

$user_data = check_login($db, false);


?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update dienst</title>
    <link rel="stylesheet" href="css/admin.css" />
</head>

<body>
    <?php
    try {
        // Als POST & FILES leeg zijn maar CONTENT_LENGTH aanwezig is, is waarschijnlijk post_max_size overschreden
        if (empty($_POST) && empty($_FILES) && !empty($_SERVER['CONTENT_LENGTH'])) {
            $message = '<p style="color:red;">Upload mislukt: bestand is groter dan de serverlimiet. Vergroot upload_max_filesize / post_max_size in php.ini.</p>';
        } else {
            if (isset($_POST['send'])) {
                $sermon_date = $_POST['sermon_date'] ?? null;
                $speaker_name = $_POST['speaker_name'] ?? null;
                $sermon_title = $_POST['sermon_title'] ?? null;
                $existing_file = $_POST['existing_file'] ?? null;

                // default: behoud bestaand bestand
                $filePathToSave = $existing_file;

                // Als er een nieuw bestand is geüpload, verwerk dat
                if (isset($_FILES['sermon_audio']) && $_FILES['sermon_audio']['error'] === UPLOAD_ERR_OK) {
                    $fileName = $_FILES['sermon_audio']['name'];
                    $tmpName = $_FILES['sermon_audio']['tmp_name'];

                    $uploadDir = __DIR__ . '/uploads/audio/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

                    $targetFullPath = $uploadDir . basename($fileName);
                    $filePathToSave = 'uploads/audio/' . basename($fileName);

                    $allowedTypes = ['audio/mpeg', 'audio/mp3'];
                    $allowedExtensions = ['mp3'];
                    $filetype = $_FILES['sermon_audio']['type'];
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

                    if (in_array($filetype, $allowedTypes) && in_array($fileExtension, $allowedExtensions)) {
                        if (!move_uploaded_file($tmpName, $targetFullPath)) {
                            $message = "Fout bij uploaden nieuw bestand.";
                        }
                    } else {
                        $message = "Ongeldig bestandstype. Alleen .mp3 bestanden zijn toegestaan.";
                    }
                    // verplaats bestand naar uploads map
                }
                // opslaan in database 
                $id = $_GET['id'] ?? null;
                if (!$id) {
                    $message = "Geen geldige id om bij te werken.";
                } else {
                    $query_upload = $db->prepare("UPDATE sermons SET date = :date,
                                                name = :name,
                                                title = :title,
                                                file = :file
                             WHERE id = :id");
                    $query_upload->execute([
                        'date'  => $sermon_date,
                        'name'  => $speaker_name,
                        'title' => $sermon_title,
                        'file'  => $filePathToSave,
                        'id'    => $id
                    ]);
                    header("Location: sermons.php");
                    exit();               
                }
            } else {
                $query = $db->prepare("SELECT * FROM sermons 
                                    WHERE id = :id");
                $query->bindParam("id", $_GET['id']);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as &$data) {
                    $sermon_date = $data["date"];
                    $speaker_name = $data["name"];
                    $sermon_title = $data["title"];
                    $sermon_file = $data["file"];
                }
            }
        }
    } catch (PDOException $e) {
        die("Error! ");
    }

    include 'menu.php';

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

                    <?php if (!empty($sermon_file)): ?>
                        <div>Huidig bestand: <a href="<?php echo htmlspecialchars($sermon_file, ENT_QUOTES); ?>" target="_blank">Bekijk / Download</a></div>
                    <?php endif; ?>

                    <input type="hidden" name="existing_file" value="<?php echo htmlspecialchars($sermon_file ?? '', ENT_QUOTES); ?>">
                    <input type="file" id="sermon-audio" name="sermon_audio" accept=".mp3">
                </div>

                <button type="submit" name="send" value="Upload Preek">Versturen</button>
                <?php
                if (isset($message)) {
                    echo '<div class="form-message">' . htmlspecialchars($message) . '</div>';
                }
                ?>
            </form>
        </section>
    </main>
</body>

</html>