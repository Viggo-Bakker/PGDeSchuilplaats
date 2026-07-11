<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$connection = $db->getConnection();
$user_data = check_login($connection, true);

$pageStyles = ['src/css/admin.css', 'src/css/sermons.css'];
$pageTitle = 'Preken beheren';

$sermon = new \System\SermonsCollection\Sermon();
$errors = [];
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sermon->date = trim((string) ($_POST['date'] ?? ''));
    $sermon->name = trim((string) ($_POST['name'] ?? ''));
    $sermon->title = trim((string) ($_POST['title'] ?? ''));

    if ($sermon->date === '' || !DateTime::createFromFormat('Y-m-d', $sermon->date)) {
        $errors[] = 'Kies een geldige datum.';
    }

    if ($sermon->name === '') {
        $errors[] = 'Vul een spreker in.';
    }

    if ($sermon->title === '') {
        $errors[] = 'Vul een titel in.';
    }

    if (!isset($_FILES['audio']) || $_FILES['audio']['error'] === UPLOAD_ERR_NO_FILE) {
        $errors[] = 'Kies een audio bestand.';
    }

    if (empty($errors)) {
        try {
            $file = new \System\Utils\File();
            $sermon->file = $file->store($_FILES['audio']);

            if (\System\SermonsCollection\Sermon::create($sermon, $connection)) {
                $success = 'Preek succesvol opgeslagen.';
                $sermon = new \System\SermonsCollection\Sermon();
            } else {
                $errors[] = 'Er is een fout opgetreden bij het opslaan van de preek.';
            }
        } catch (Throwable $throwable) {
            $errors[] = $throwable->getMessage();
        }
    }
}

if (isset($_GET['id'])) {
    $queryDelete = $connection->prepare('DELETE FROM sermons WHERE id = :id');
    $queryDelete->bindValue('id', (int) $_GET['id'], PDO::PARAM_INT);

    if ($queryDelete->execute()) {
        $success = 'De preek is verwijderd.';
    } else {
        $errors[] = 'Er is een fout opgetreden bij verwijderen.';
    }
}

$sermons = \System\SermonsCollection\Sermon::getAll($connection);
$pageTemplate = 'admin_sermons.php';