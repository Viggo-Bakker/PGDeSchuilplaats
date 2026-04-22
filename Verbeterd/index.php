<?php require_once 'includes/initialize.php'; ?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <META NAME="keywords" CONTENT="kerk, pinkster, pinkstergemeente, gemeente, spijkenisse, hekelingen, schuilplaats, nissewaard">
  <META NAME="description" CONTENT="Website van pinkstergemeente De Schuilplaats in Hekelingen (Spijkenisse)">
  <title>PG De Schuilplaats | <?= $pageTitle ?? '' ?></title>
  <link rel="stylesheet" href='src/css/styles.css'>
</head>

<body>
  <?php include 'includes/menu.php'; 
  
  echo $content ?? '';
  
  include 'includes/footer.php'; ?>
</body>

</html>