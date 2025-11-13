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
    <title>Bidstond</title>
    <link rel="stylesheet" href='css/suppages.css'>
</head>
<body>
    <main>
        <section class="header" id="bidstond-header">
        </section>
        <section class="info">
            <h2>Bidstond</h2>
            <p>
            De bidstond is een moment van gebed en aanbidding, waarin we samenkomen om God te zoeken en te aanbidden. Dit kan in verschillende vormen, zoals stil gebed, gezongen aanbidding of het delen van getuigenissen.
            <br><br>
            Iedereen is van harte welkom om deel te nemen aan de bidstond, ongeacht je achtergrond of geloofservaring. Het is een veilige plek om te komen zoals je bent en om samen te bidden voor elkaar en voor de wereld om ons heen.
            <br><br>
            Informatie: [contactgegevens]
            </p>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>
</html>