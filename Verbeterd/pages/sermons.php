<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$connection = $db->getConnection();
$user_data = check_login($connection, false);

$pageStyles = ['src/css/sermons.css', 'src/css/suppages.css'];
$pageTitle = 'Preken luisteren';

$searchTerm = trim((string) ($_POST['search_sermon'] ?? $_GET['search_sermon'] ?? ''));
$offset = isset($_GET['offset']) ? max(0, (int) $_GET['offset']) : 0;

if ($searchTerm !== '') {
    $query = $connection->prepare('SELECT * FROM sermons WHERE name LIKE :search OR title LIKE :search ORDER BY date DESC');
    $likeSearch = '%' . $searchTerm . '%';
    $query->bindValue('search', $likeSearch);
} else {
    $query = $connection->prepare('SELECT * FROM sermons ORDER BY date DESC LIMIT 5 OFFSET :offset');
    $query->bindValue('offset', $offset, PDO::PARAM_INT);
}

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$pageTemplate = 'sermons.php';
