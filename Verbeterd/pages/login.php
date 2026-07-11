<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$connection = $db->getConnection();

$pageStyles = ['src/css/login_system.css'];
$pageTitle = 'Inloggen';
$pageTemplate = 'login.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = trim((string) ($_POST['username'] ?? ''));
    $password = trim((string) ($_POST['password'] ?? ''));

    if ($userName !== '' && $password !== '') {
        $statement = $connection->prepare('SELECT * FROM users WHERE user_name = ? LIMIT 1');
        $statement->execute([$userName]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            header('Location: ' . BASE_PATH . 'home');
            exit;
        }

        $error = 'Ongeldige gebruikersnaam of wachtwoord.';
    } else {
        $error = 'Vul een gebruikersnaam en wachtwoord in.';
    }
}