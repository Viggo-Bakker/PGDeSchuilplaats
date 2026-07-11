<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$connection = $db->getConnection();
$user_data = check_login($connection, true);

$pageStyles = ['src/css/admin.css', 'src/css/suppages.css'];
$pageTitle = 'Diensten beheren';
$pageTemplate = 'admin_services.php';
$service = [
    'date' => '',
    'special_occasion' => '',
    'time' => '',
    'speaker' => '',
    'elder' => '',
];
$errors = [];
$success = null;

if (isset($_GET['id'])) {
    $queryDelete = $connection->prepare('DELETE FROM services WHERE id = :id');
    $queryDelete->bindValue('id', (int) $_GET['id'], PDO::PARAM_INT);
    if ($queryDelete->execute()) {
        $success = 'De dienst is verwijderd.';
    } else {
        $errors[] = 'Er is een fout opgetreden bij verwijderen.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service['date'] = trim((string) ($_POST['service_date'] ?? ''));
    $service['special_occasion'] = trim((string) ($_POST['special_occasion'] ?? ''));
    $service['time'] = trim((string) ($_POST['service_time'] ?? ''));
    $service['speaker'] = trim((string) ($_POST['speaker_name'] ?? ''));
    $service['elder'] = trim((string) ($_POST['elder_name'] ?? ''));

    if ($service['date'] === '' || !DateTime::createFromFormat('Y-m-d', $service['date'])) {
        $errors[] = 'Kies een geldige datum.';
    }

    if ($service['time'] === '') {
        $errors[] = 'Vul een tijd in.';
    }

    if ($service['speaker'] === '') {
        $errors[] = 'Vul een spreker in.';
    }

    if ($service['elder'] === '') {
        $errors[] = 'Vul de oudste van dienst in.';
    }

    if (empty($errors)) {
        $queryInsert = $connection->prepare('INSERT INTO services(date, special_occasion, time, speaker, elder) VALUES(?, ?, ?, ?, ?)');
        $queryInsert->execute([
            $service['date'],
            $service['special_occasion'],
            $service['time'],
            $service['speaker'],
            $service['elder'],
        ]);
        $success = 'Dienst succesvol opgeslagen.';
        $service = ['date' => '', 'special_occasion' => '', 'time' => '', 'speaker' => '', 'elder' => ''];
    }
}

$services = $connection->query('SELECT * FROM services WHERE DATE(date) >= ' . $connection->quote(date('Y-m-d')) . ' ORDER BY date ASC')->fetchAll(PDO::FETCH_ASSOC);