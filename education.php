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
    <title>Onderwijs</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="education-header">
            <h1>Onderwijs</h1>
        </section>
        <section class="info" style="display:flex; flex-direction: column; gap: 1rem;">      <!-- LET OP, HIER STAAT NOG CSS -->
            <div>
                <h2>Kinderen</h2>
                <p>Voor informatie over het onderwijs aan kinderen, klik op <a href="children.php">Kinderen</a>.</p>
            </div>

            <div>
                <h2>Jongerenwerk</h2>
                <p>Het jongerenwerk in de Schuilplaats bestaat uit een jeugd- en een tienergroep. Dit zijn twee aparte groepen met hun eigen programma, maar soms ondernemen zij ook activiteiten gezamenlijk, zoals op kamp gaan, sinterklaas vieren of een thema-avond.</p>
                <p>Voor informatie over het onderwijs aan tieners, klik op <a href="teens.php">Tieners</a>.</p>
                <p>Voor informatie over het jongerenwerk, klik op <a href="youth.php">Jeugd</a>.</p>
            </div>

            <div>
                <h2>Doop, bijbelstudie, enz.?</h2>
                <p>Lorem ipmsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>