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
    <title>Route</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="route-header">
        </section>
        <section class="info" id="route-info">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2465.889292935635!2d4.343340776894165!3d51.82645278734534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c449c5344ccc45%3A0x7443e266d0ea1e13!2sPG%20de%20Schuilplaats!5e0!3m2!1snl!2snl!4v1763057559202!5m2!1snl!2snl" 
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div id="route-text">
                <h2>Route</h2>
                <p><b>Adres: Dorpsstraat 105, 3209 AE Hekelingen (Spijkenisse)</b></p>

                <p>Vanuit Rotterdam:
                A15 richting Europoort, afslag Spijkenisse. Richting Nieuw-Beijerland aanhouden. Op de Hekelingseweg na anderhalve kilometer linksaf de Dorpsstraat op (u rijdt nu Hekelingen binnen). 
                Het gebouw bevindt zich na 900 meter aan de linkerhand. Achter het gebouw ligt de parkeerplaats, waar u uw auto kan neerzetten.</p>

                <p>Vanuit de Hoeksche Waard:
                Via het veer richting Spijkenisse. Op de Hekelingseweg rechtsaf de Dorpsstraat richting Hekelingen enz.</p>

                <p>Met het openbaar vervoer:
                Met de metro ligt Metrostation Heemraadlaan het dichtst bij (ongeveer 15 minuten lopen), van daar verder in zuidelijke richting langs de Hekelingseweg enz.<br>
                Komt u met de bus, dan kunt u het beste op Metrostation Spijkenisse Centrum overstappen op buslijn 105 richting De Akkers. Uitstappen bij de Vlinderveen (winkelcentrum Waterland), oversteken richting de Sterrenwacht en de straat uitlopen. 
                Vanaf de bushalte is het 5 minuten lopen.</p>
            </div>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>