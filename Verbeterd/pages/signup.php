<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$connection = $db->getConnection();
$user_data = check_login($connection, true);

$pageStyles = ['src/css/login_system.css'];
$pageTitle = 'Registreren';
$pageTemplate = 'signup.php';

$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = trim((string) ($_POST['username'] ?? ''));
    $password = trim((string) ($_POST['password'] ?? ''));

    if ($userName === '' || $password === '') {
        $error = 'Vul een gebruikersnaam en wachtwoord in.';
    } else {
        $statement = $connection->prepare('SELECT user_id FROM users WHERE user_name = ? LIMIT 1');
        $statement->execute([$userName]);

        if ($statement->fetch()) {
            $error = 'Deze gebruikersnaam bestaat al.';
        } else {
            $userId = random_num(20);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insert = $connection->prepare('INSERT INTO users (user_id, user_name, password) VALUES (?, ?, ?)');

            if ($insert->execute([$userId, $userName, $hashedPassword])) {
                $success = 'Gebruiker succesvol aangemaakt.';
            } else {
                $error = 'Registratie mislukt.';
            }
        }
    }
}