<?php 

session_start();

include 'dbconnect.php';
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($user_name) && !empty($password)) {
        try {
           // check if user exists
            $stmt = $db->prepare("SELECT * FROM users WHERE user_name = ?");
            $stmt->execute([$user_name]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: index.php");
                die();
            } else {
                $error = "Ongeldige gebruikersnaam of wachtwoord.";
            }
        } catch (Exception $e) {
            $error = "Fout bij inloggen: ";
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
    <title>login</title>
    <link rel="stylesheet" href="css/login_system.css">
</head>

<body>
    <section id="login">
        <h2>Log in</h2>

        <?php if (isset($error)): ?>
            <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="username" placeholder="Gebruikersnaam" required>
            <input type="password" name="password" placeholder="Wachtwoord" required>

            <button type="submit">Log in</button>
        </form>
    </section>
</body>

</html>