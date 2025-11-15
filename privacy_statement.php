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
    <title>Privacy Statement</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="privacy-header">
            <h1>Privacy Statement</h1>
        </section>
        <section class="info">
            <h2>Privacy Statement</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ullamcorper massa. Vivamus vel semper urna. Quisque ornare neque lorem, vitae semper nunc finibus eget. Pellentesque sit amet orci a urna semper convallis.
                Vivamus vel erat vitae metus luctus blandit. Cras eget mauris diam. Donec quis mi at quam blandit semper ut eget tortor. Vivamus mollis, felis id tincidunt elementum, leo arcu dignissim libero, ac imperdiet nibh ante at velit.
                Etiam dolor lacus, cursus euismod viverra vel, interdum sit amet urna. Mauris accumsan elit mauris, quis ullamcorper massa aliquet vel. Phasellus sapien enim, molestie ac mauris at, congue sodales leo.
                Morbi quis ex et erat faucibus mattis posuere vel velit. Cras vitae viverra ante, vel sagittis neque. In hac habitasse platea dictumst.
            </p>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>