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
    <title>Diensten</title>
    <link rel="stylesheet" href="css/suppages.css">
</head>

<body>
    <main>
        <section class="header" id="services-header">
        </section>
        <section class="info">
            <h2>Informatie over onze diensten</h2>
            <p>Elke zondag om 10.00 uur komen wij samen in De Schuilplaats om daar onze Heer te loven en prijzen voor wie Hij is en wat hij doet. Dit doen wij door het zingen van liederen, het opheffen van handen en uitspreken van gebeden. Soms wordt er ook gedanst. Dit alles onderleiding van een aanbiddingsleider, zangers en een band. Kinderen vanaf 3 jaar zijn hier ongeveer 15 min bij aanwezig. Daarna gaan zij naar hun eigen groepen toe zondagsschoolklassen. Om daar op hun eigen leeftijdsniveau onderwijs uit de bijbel te krijgen en spelletjes te doen of te knutselen.
                <br><br>
                De Bijbel is onze basis voor de predikingen. Deze worden verzorgt door eigen sprekers en gastsprekers. Uitleg van Bijbelgedeelten maar ook actuele onderwerpen komen aan bod.
                <br><br>
                Na de samenkomst is er achter in de zaal gelegenheid voor een persoonlijk gesprek en gebed. Mensen van het gebedsteam staan daar voor u klaar. Beneden in de ontmoetingsruimte krijgt u een kopje koffie of thee aangeboden, waarbij u nog even kunt napraten en kontakten kunt leggen. Ook worden er tegen een geringe vergoeding snacks aangeboden.
                <br><br>
                De samenkomsten duren over het algemeen ongeveer 2 uur met soms.
                <br><br>
                Voor mensen die wat minder vlot ter been zijn: de bovenzaal is behalve via de trap ook bereikbaar met een stoellift.

                <br><br>
                <h3>Kidspraise</h3>
                1 keer per maand is er kids praise. Tijdens de begin van de (reguliere zondag) dienst willen we God groot maken met de kinderen tot de tienerleeftijd. We zingen voornamelijk liederen uit ‘opwekking voor kinderen’.
            </p>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>