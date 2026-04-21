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
    <title>Kinderen</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="children-header">
            <h1>Kinderen</h1>
        </section>
        <section class="info" id="children-info" style="display:flex; flex-direction: column; gap: 1rem;">      <!-- LET OP, HIER STAAT NOG CSS -->
            <h2>Zondagsschool</h2>
            <p>
                Op zondagochtend zitten de kinderen ongeveer 20 minuten in de “volwassen” dienst. Daarna gaan ze naar hun eigen groepen. Momenteel zijn er 5 groepen, verdeeld naar leeftijd en niveau van het kind. We streven ernaar,
                dat de kinderen in de basisschoolleeftijd alle verhalen van de Bijbel horen. Daarom is er een 8-jarenprogramma ontwikkeld, dat ervoor zorgt, dat ook daadwerkelijk de hele Bijbel in 8 jaar behandeld wordt.
                Daartoe gebruiken we verschillende programmaboeken, van Kinderwerk Timotheus, Promiseland of andere organisaties. Soms wordt er les gegeven aan de hand van het leven van een persoon uit de Bijbel, soms juist meer aan de hand van een thema.
            </p>
            <h3>1. De crèche.</h3>
            <p>
                De baby's en kinderen tot ongeveer 3 jaar worden opgevangen in “De Schatkamer”. Elke zondag zijn er daar twee ervaren leid(st)ers die de kinderen veiligheid en geborgenheid bieden. De kinderen kunnen daar spelen of nog een ochtendslaapje doen.
                Een vast deel tijdens de ochtend is samen wat drinken en eten en eventueel naar een verhaaltje luisteren.
            </p>
            <h3>2. De kleuters.</h3>
            <p>
                In “De Schaapskooi” krijgen de kleuters van 3 jaar tot en met groep 2 hun eigen verhaal met uitleg op hun niveau. Er wordt nog veel spelenderwijs aangeleerd en verteld. Ook worden in deze groep vaak bewegingsliedjes gezongen.
                In deze groep komt de schepping aan bod, met de meest bekende verhalen van het Oude Testament. God is een Vader voor alle mensen, Hij is machtig en krachtig. Zijn Zoon Jezus kwam op aarde, omdat Hij zoveel van ons houdt.
                Hij is de Goede herder, die heel goed voor Zijn schapen zorgt. Er wordt veel geknutseld en soms mogen de kinderen ook nog even spelen.
            </p>

            <h3>3. De middengroep.</h3>
            <p>
                In “De Arena” zijn de kinderen van groep 3 tot en met groep 5 welkom. In deze groep worden verschillende personen en geschiedenissen uit het Oude en Nieuwe Testament behandeld. Er wordt een begin gemaakt met het lezen in de Bijbel.
                Elke zondag wordt er een link gelegd naar het leven van de kinderen op school en thuis. God heeft regels gegeven die goed zijn om na te volgen. Doe jij thuis en op school wat God jou leert in de Bijbel?
                Ook in deze groep is er altijd een verwerking naar eigen niveau, soms een knutsel, soms een spel.
            </p>

            <h3>4. De minitieners.</h3>
            <p>
                De kinderen uit groep 6, 7 en 8 kunnen terecht in “Het Paleis”. Deze kinderen lezen in de Bijbel en leren veel waarheden uit de Bijbel toepassen in hun eigen leven. Dat kan zijn via een spel, maar er worden ook wel groepsopdrachten gemaakt,
                die tot nadenken stemmen. De verhalen uit de Bijbel worden uitgediept, soms aan de hand van een thema, bijv. “De wapenrusting van God” of “De tabernakel”. De kinderen worden gestimuleerd om zelf uit de Bijbel te gaan lezen en zo gaan de kinderen goed
                voorbereid naar de tienergroep en de middelbare school.
            </p>

            <p>Heeft u nog vragen, dan kunt u terecht bij Silvia Quevedo Klein Haneveld, via kinderwerkpgdeschuilplaats.nl tel. 0653730012.</p>

            <h2 id="kidspraise">Kidspraise</h2>
            <p>1 keer per maand is er kids praise. Tijdens de begin van de (reguliere zondag) dienst willen we God groot maken met de kinderen tot de tienerleeftijd. We zingen voornamelijk liederen uit 'opwekking voor kinderen'.</p>

        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>