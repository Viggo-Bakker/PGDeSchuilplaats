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
    <title>Jeugd</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="youth-header">
            <h1>Jeugd</h1>
        </section>
        <section class="info">
            <div style="display:flex; flex-direction: column; gap: 1rem;">      <!-- LET OP, HIER STAAT NOG CSS -->
                <h2>Jeugd</h2>
                <p>De jeugdgroep is een groep jongeren vanaf 16 jaar die wekelijks samenkomt in huiselijke sfeer, meestal op zondagavond. De jongeren wil zelf graag groeien als discipelen van Jezus en ook proberen als gelovigen zichtbaar te zijn in hun omgeving.
                    Dit doen ze door bijbelstudies die ze zelf voorbereiden, door iemand uit te nodigen over een onderwerp te komen vertellen, door samen te ontspannen en door activiteiten te organiseren voor zichzelf of voor anderen.
                    Samen eten of een film kijken, een potje tafelvoetbal of gezellig kletsen vinden ze ook heerlijk.</p>

                <p>Iedereen vanaf 16 jaar die interesse heeft in wat ze doen is van harte welkom. Als je ouder bent dan 25 kan het zijn dat je meer aansluiting vindt bij een huiskring. Dit gaat meestal in overleg.</p>
            </div>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>