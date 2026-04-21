<?php

session_start();

include 'dbconnect.php';
include 'functions.php';

$user_data = check_login($db, true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($user_name) && !empty($password)) {
        try {
           // check if username already exists
            $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE user_name = ?");
            $stmt->execute([$user_name]);
            if ($stmt->fetchColumn() > 0) {
                $error = "Gebruikersnaam bestaat al.";
            } else {
                $user_id = random_num(20);
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $insert = $db->prepare("INSERT INTO users (user_id, user_name, password) VALUES (?, ?, ?)");
                $insert->execute([$user_id, $user_name, $password_hash]);

                header("Location: login.php");
                die();
            }
        } catch (Exception $e) {
            $error = "Fout bij registratie: ";
        }
    } else {
        echo "Voer alstublieft een geldige gebruikersnaam en wachtwoord in.";
    }
}


include 'menu.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="stylesheet" href="css/login_system.css">
</head>

<body>
    <section id="signup">
        <h2>Registreren</h2>

        <?php if (isset($error)): ?>
            <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="username" placeholder="Gebruikersnaam" required>
            <input type="password" name="password" placeholder="Wachtwoord" required>

            <button type="submit">Registreren</button>
        </form>
    </section>
</body>

</html>