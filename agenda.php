<?php 
    session_start();

    include 'dbconnect.php';
    include 'functions.php';

    $user_data = check_login($db, false);

    include 'menu.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href='css/suppages.css'>
</head>
<body>
    <main>
        <section class="header" id="agenda-header">
        </section>
        <section class="info">
            <h2>Agenda</h2>
            <p>
            Hier komt de agenda te staan.
            </p>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>
</html>