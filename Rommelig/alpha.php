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
    <title>Alpha</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="alpha-header">
            <h1>Is er meer?</h1>
        </section>
        <section class="info">
            <h2>Wat is Alpha?</h2>
            <p>Alpha is een cursus die bedoeld is om mensen op een laagdrempelige manier kennis te laten maken met het christelijk geloof. Het bestaat uit een reeks bijeenkomsten waarin verschillende onderwerpen rondom het geloof worden besproken, vaak onder het genot van een maaltijd.</p>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>