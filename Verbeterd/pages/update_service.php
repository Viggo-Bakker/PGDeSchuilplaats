<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$connection = $db->getConnection();
$user_data = check_login($connection, true);

$pageStyles = ['src/css/admin.css', 'src/css/forms.css'];
$pageTitle = 'Dienst bewerken';
$pageTemplate = 'update_service.php';

$success = $_SESSION['flash_success'] ?? null;
unset($_SESSION['flash_success']);

$service = [
    'id' => 0,
    'date' => '',
    'special_occasion' => '',
    'time' => '',
    'speaker' => '',
    'elder' => '',
];
$errors = [];

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$query = $connection->prepare('SELECT * FROM services WHERE id = :id LIMIT 1');
$query->bindValue('id', $id, PDO::PARAM_INT);
$query->execute();
$existing = $query->fetch(PDO::FETCH_ASSOC);

if (!$existing) {
    http_response_code(404);
    $errors[] = 'Dienst niet gevonden.';
} else {
    $service = $existing;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $existing) {
    $service['date'] = trim((string) ($_POST['service_date'] ?? ''));
    $service['special_occasion'] = trim((string) ($_POST['special_occasion'] ?? ''));
    $service['time'] = normalize_time_input($_POST['service_time'] ?? '10:00');
    $service['speaker'] = trim((string) ($_POST['speaker_name'] ?? ''));
    $service['elder'] = trim((string) ($_POST['elder_name'] ?? ''));

    if ($service['date'] === '' || !DateTime::createFromFormat('Y-m-d', $service['date'])) {
        $errors[] = 'Kies een geldige datum.';
    }

    if ($service['speaker'] === '') {
        $errors[] = 'Vul een spreker in.';
    }

    if ($service['elder'] === '') {
        $errors[] = 'Vul de oudste van dienst in.';
    }

    if (empty($errors)) {
        $update = $connection->prepare('UPDATE services SET date = :date, special_occasion = :special_occasion, time = :time, speaker = :speaker, elder = :elder WHERE id = :id');
        $update->execute([
            'date' => $service['date'],
            'special_occasion' => $service['special_occasion'],
            'time' => $service['time'],
            'speaker' => $service['speaker'],
            'elder' => $service['elder'],
            'id' => $id,
        ]);

        $_SESSION['flash_success'] = 'Dienst bijgewerkt.';
        header('Location: ' . BASE_PATH . 'admin_services');
        exit;
    }
}