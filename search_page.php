<?php
session_start();

include 'dbconnect.php';
include 'functions.php';

$user_data = check_login($db, false);

include 'menu.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoek pagina</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin-top: 100px;
        }

        /* #___gcse_0 {
            margin-top: 100px;
        } */
    </style>
</head>

<body>
    <?php
        // $files = glob("*.php");
        // foreach ($files as $file) {
        //     $content = file_get_contents($file);
        //     if (stripos($content, $_POST['search']) !== false) {
        //         echo "<p>Resultaat gevonden in <a href='$file'>$file</a></p>";
        //     }
        // }
    ?>
    <!-- <script async src="https://cse.google.com/cse.js?cx=d0640339ea3834a63">
    </script>
    <div class="gcse-searchresults-only"></div> -->
</body>

</html>