<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$connection = $db->getConnection();
$user_data = check_login($connection, true);

$pageStyles = ['src/css/admin.css'];
$pageTitle = 'Preek bewerken';
$pageTemplate = 'update_sermon.php';

$sermon = new \System\SermonsCollection\Sermon();
$errors = [];
$success = null;

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$query = $connection->prepare('SELECT * FROM sermons WHERE id = :id LIMIT 1');
$query->bindValue('id', $id, PDO::PARAM_INT);
$query->execute();
$existing = $query->fetch(PDO::FETCH_ASSOC);

if (!$existing) {
    http_response_code(404);
    $errors[] = 'Preek niet gevonden.';
} else {
    $sermon->id = (int) $existing['id'];
    $sermon->date = $existing['date'];
    $sermon->name = $existing['name'];
    $sermon->title = $existing['title'];
    $sermon->file = $existing['file'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $existing) {
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

    if (isset($_FILES['audio']) && $_FILES['audio']['error'] !== UPLOAD_ERR_NO_FILE) {
        try {
            $file = new \System\Utils\File();
            $sermon->file = $file->store($_FILES['audio']);
        } catch (Throwable $throwable) {
            $errors[] = $throwable->getMessage();
        }
    }

    if (empty($errors)) {
        if ($sermon->update($connection)) {
            $success = 'Preek bijgewerkt.';
        } else {
            $errors[] = 'Er is een fout opgetreden bij het opslaan.';
        }
    }
}