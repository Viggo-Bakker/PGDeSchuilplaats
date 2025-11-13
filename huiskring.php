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
    <title>Huiskringen</title>
    <link rel="stylesheet" href="css/suppages.css">
</head>

<body>
    <main>
        <section class="header" id="huiskring-header">
        </section>
        <section class="info">
            <h2>Huiskringen</h2>
            <p>
                Naast de zondagse samenkomst is er gelegenheid om deel te nemen aan huiskringen, kleine groepen van vijf tot vijftien mensen waarin persoonlijk contact, vriendschap en inspiratie voorop staan. De Schuilplaats heeft meerdere huiskringen, die samenkomen op een doordeweekse avond. Op die avonden is ruimte voor gesprekken, Bijbelstudie, gebed en voor het delen van persoonlijke ervaringen. Ontmoet Jezus in de ander. De huiskringen staan onder leiding van kringleiders en hebben meestal hun eigen programma. De kringen kunnen ook kiezen voor samen dingen doen. Dat kan gaan van het houden van een barbecue of een fietstocht tot het geven van een Alphacursus.
                <br><br>
                Informatie: Rienkje Achterberg [06 20269910]
            </p>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>