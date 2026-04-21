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
    <title>Tieners</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="teens-header">
            <h1>Tieners</h1>
        </section>
        <section class="info">
            <h2>Tieners</h2>
            <p>
                De tienergroep is een knusse groep jongens en meiden tussen de 12 en de 15/16 jaar. Omdat het een wat kleinere groep is hebben we samen met de tieners en hun ouders gezocht naar een programma dat bij iedereen past. 
                Voor de Schuilplaats staat vast dat tieners heel belangrijk zijn en dat ze, ieder voor zich maar ook als groep, er mogen zijn, zichzelf mogen zijn en God mogen leren kennen en mogen ontdekken wat Hij in hun leven kan en wil betekenen. 
                Het programma is zo ingedeeld, dat de tieners de kerkdiensten mogen ervaren, kans krijgen om deel te nemen aan het avondmaal als ze dat willen, hun gaven en talenten kunnen ontdekken, onderwijs krijgen en natuurlijk is er ruimte voor ontspanning. 
                Het tienerhok is ingericht voor leren en ontspanning doordat er een beamer, muziekinstallatie en voetbaltafel aanwezig zijn.
            </p>        
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>