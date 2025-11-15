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
    <title>Doneren</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="donate-header">
            <h1>Doneren</h1>
        </section>
        <section class="info">
            <h2>Hier komt een titel</h2>
            <p>
                Hier komt wat tekst te staan over doneren. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <div style="width: 400px; height: 400px; border: 1px solid black; display: flex; align-items: center; justify-content: center; background-color: #f0f0f0; margin-top: 20px;">
                <p>hier komt een qr code<p>
            </div>
            <a href="https://www.example.com/donate" class="donate-button">En hier komt een link</a>

        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>