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
    <title>Geschiedenis</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="history-header">
            <h1>Geschiedenis</h1>
        </section>
        <section class="info">
            <h2>Het ontstaan van Pinkstergemeente De Schuilplaats</h2>
            <p>
                De Schuilplaats is in 1984 ontstaan onder de naam Pinkstergemeente Spijkenisse. Deze gemeente ontstond als dochtergemeente uit een initiatief van Pinkstergemeente Hoogvliet. 
                Sinds maart 1991 is het een zelfstandige gemeente geworden met een eigen gezicht en visie. Vroeger kwam de toen nog Pinkstergemeente Spijkenisse zondags bijeen in gehuurde ruimtes. 
                Sinds november 2000 hebben wij ons eigen gebouw in het dorp Hekelingen, dat tegen Spijkenisse aanligt. Met de opening van het gebouw op 24 november 2001 hebben wij ook onze naam veranderd in Pinkstergemeente De Schuilplaats.
            </p>

            <br><br>

            <h2>De Schuilplaats (het gebouw)</h2>

            <h3>1800-1969</h3>
            <p>
                Het gebouw waarin wij elke week samenkomen is van oorsprong een boerderij. Rond 1800 werd de boerderij gebouwd. Tot 1969 was de boerderij in handen van de familie Qualm. 
                Het is moeilijk in te denken dat op de begane grond, waar nu de keuken en de zondagsschoolruimtes gevestigd zijn, vroeger zo'n vijftig koeien en tien paarden gehuisvest waren.
            </p>
            
            <br>

            <h3>1969-2000</h3>
            <p>
                Vanaf 1969 tot 1999 was de familie Van Vark eigenaar van de boerderij. In de loop der tijden is het vroegere boerderijgedeelte gebruikt als garage en oefenruimte van een harmonieorkest. 
                Een gedeelte van de begane grond, was het woonhuis van de familie. In 1998 is er een grote verbouwing aan het gebouw gepleegd om het te verbouwen tot een dansschool. 
                De spiegelwand in de zaal van samenkomst is hier een stille getuige van. Maar de dansschool kwam niet af. Het gebouw bleef onbewoond tot Pinkstergemeente De Schuilplaats" het kocht.
            </p>

            <br>

            <h3>2000-2010</h3>
            <p>
                Zoals al eerder genoemd, kwam het gebouw in het jaar 2000 in handen van Pinkstergemeente Spijkenisse. Om van een vroegere boerderij die ook als dansschool had gefunctioneerd een kerkgebouw te maken, was een grote verbouwing noodzakelijk. 
                Bijna een jaar duurde het voordat het kerkgebouw geheel verbouwd was. Onder leiding van een aantal deskundige gemeenteleden mocht het resultaat er dan ook zijn: op de bovenverdieping werd een kerkzaal (compleet met een in het podium weggewerkt doopvont) gemaakt. 
                Beneden kwam er een gezellige zithoek, een ruime keuken, verschillende zondagsschoolruimtes en een crècheruimte. De Schuilplaats, zoals het gebouw genoemd werd, was een feit.
            </p>
            
            <br>

            <h3>2010-2015</h3>
            <p>
                Door de aankoop van de 2 woonhuizen naast het gebouw hebben we de ontvangstruimte flink kunnen uitbreiden. 1 woning is verhuurd en de andere woning wordt gebruikt voor de kindergroepen en boven een mooie opslagruimte. Nu we ook de beschikking hebben over de tuin aan de achterzijde van het gebouw willen we die multifunctioneel in gaan richten.
            </p>

            <br>

            <h3>2015-2020</h3>
            <p>
                De woning naast het gebouw heeft sinds 2015 dienst gedaan als crisiswoning. Speciaal voor personen die door omstandigheden zonder woning zijn gekomen. De andere woning is ingericht geweest voor de kledingruilbeurs Noppes. Ook is een begin gemaakt aan het opknappen van de tuin achter het gebouw. Zo is de verharde weg achterom bestraat.
            </p>

            <br>

            <h3>2020-heden</h3>
            <p>
                De huisjes naast de Schuilplaats en de schuren achter de Schuilplaats zijn afgestoten.
            </p>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>