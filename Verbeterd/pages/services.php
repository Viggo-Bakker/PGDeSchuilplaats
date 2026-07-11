<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$connection = $db->getConnection();
$user_data = check_login($connection, false);

$pageStyles = ['src/css/suppages.css'];
$pageTitle = 'Diensten';
$pageTemplate = 'services.php';

$searchTerm = trim((string) ($_POST['search_service'] ?? $_GET['search_service'] ?? ''));

if ($searchTerm !== '') {
    $query = $connection->prepare('SELECT * FROM services WHERE special_occasion LIKE :search OR speaker LIKE :search ORDER BY date ASC');
    $query->bindValue('search', '%' . $searchTerm . '%');
} else {
    $query = $connection->prepare('SELECT * FROM services WHERE DATE(date) >= :today ORDER BY date ASC');
    $query->bindValue('today', date('Y-m-d'));
}

$query->execute();
$services = $query->fetchAll(PDO::FETCH_ASSOC);