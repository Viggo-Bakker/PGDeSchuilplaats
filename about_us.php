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
    <title>Over ons</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="about_us-header">
            <h1>Over ons</h1>
        </section>
        <section class="info">
            <h2>Over ons</h2>
            <p>Wij zijn met elkaar Pinkstergemeente De Schuilplaats, een hecht en toch open gezin, waar iedereen welkom is en iedereen zichzelf mag zijn. Waarin we met elkaar God beter willen leren kennen. Ons motto is dan ook “Vanuit de relatie met God bouwen aan relaties.”
            <br><br>
            Dit betekent dat wij regelmatig (elke zondagochtend en op een doordeweekse dag met de huiskring of bijbelstudie) elkaar ontmoeten en samen God zoeken (zie ook de agenda).</p>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>