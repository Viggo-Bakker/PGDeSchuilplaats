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
    <title>Agenda</title>
    <link rel="stylesheet" href='css/suppages.css'>
</head>
<body>
    <main>
        <section class="header" id="agenda-header">
            <h1>Zie onze Agenda</h1>
        </section>
        <section class="info" id="agenda-info">
            <!-- <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=Europe%2FAmsterdam&showPrint=0&showCalendars=0&mode=MONTH&title=feestdagen%20in%20Nederland&src=bmwuY2hyaXN0aWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=bmwuZHV0Y2gjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%234285f4&color=%230b8043" 
                style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe> -->
            <iframe id="month" src="https://calendar.google.com/calendar/embed?title=PG%20de%20Schuilplaats&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=weekbriefdeschuilplaats%40gmail.com&amp;color=%2329527A&amp;ctz=Europe%2FAmsterdam&mode=MONTH"></iframe>
            <iframe id="planning"src="https://calendar.google.com/calendar/embed?title=PG%20de%20Schuilplaats&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=weekbriefdeschuilplaats%40gmail.com&amp;color=%2329527A&amp;ctz=Europe%2FAmsterdam&mode=AGENDA"></iframe>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>
</html>