<?php require_once __DIR__ . '/includes/initialize.php'; ?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <META NAME="keywords" CONTENT="kerk, pinkster, pinkstergemeente, gemeente, spijkenisse, hekelingen, schuilplaats, nissewaard">
  <META NAME="description" CONTENT="Website van pinkstergemeente De Schuilplaats in Hekelingen (Spijkenisse)">
  <title>PG De Schuilplaats | <?= $pageTitle ?? '' ?></title>
  <link rel="stylesheet" href='src/css/styles.css'>
  <link rel="stylesheet" href='src/css/menu.css'>
  <link rel="stylesheet" href='src/css/footer.css'>
  <?php if (!empty($pageStyles)): ?>
    <?php foreach ($pageStyles as $style): ?>
      <link rel="stylesheet" href="<?= htmlspecialchars($style, ENT_QUOTES, 'UTF-8') ?>">
    <?php endforeach; ?>
  <?php endif; ?>
</head>

<body>
  <?php include 'includes/menu.php'; 
  
  echo $content ?? '';
  
  include 'includes/footer.php'; ?>
</body>

</html>