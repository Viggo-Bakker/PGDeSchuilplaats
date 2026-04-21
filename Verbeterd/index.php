<?php require_once 'includes/initialize.php';
/** @var PDO $db */ ?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <META NAME="keywords" CONTENT="kerk, pinkster, pinkstergemeente, gemeente, spijkenisse, hekelingen, schuilplaats, nissewaard">
  <META NAME="description" CONTENT="Website van pinkstergemeente De Schuilplaats in Hekelingen (Spijkenisse)">
  <title>PG De Schuilplaats</title>
  <link rel="stylesheet" href='includes/css/styles.css'>
</head>

<body>
  <header class="hero">
    <div class="overlay">
      <h1>Welkom bij Pinkstergemeente<br>De Schuilplaats</h1>
      <p>"Door liefde gedreven, mensen tot discipelen van Jezus te maken."</p>
    </div>
  </header>

  <main>
    <section id="intro">
      <h2>Deepen your relationship with God <i>and your family</i></h2>
      <div id="text-background">
        <p>Openbaring 1:7 <br> Zie, Hij komt met de wolken, en elk oog zal Hem zien, ook zij die hem doorstoken hebben. En alle stammen van de aarde zullen rouw over Hem bedrijven. Ja, amen.</p>
      </div>
    </section>

    <section id="services">
      <h3>Aankomende Diensten</h3>
      <div>
        <?php
        if (isset($soonServices) && count($soonServices) > 0): ?>
          <?php foreach ($soonServices as $service): ?>
            <div class="service">
              <h4><?= htmlspecialchars(formatDutchDate($service['date'])) ?></h4>
              <p><?= htmlspecialchars($service['special_occasion']) ?></p>
              <p><?= htmlspecialchars(date("H:i", strtotime($service['time']))) ?> <span class="vertical-dash"><?= htmlspecialchars($service['speaker']) ?></span> OvD: <?= htmlspecialchars($service['elder']) ?></p>
            </div>
        <?php endforeach;
        endif;
        ?>
      </div>
    </section>

    <section id="sermons">
      <h3>Recent Preken</h3>
      <div>
        <?php
        try {
          $query_show_sermons = "SELECT date, name, title, file FROM sermons ORDER BY date DESC LIMIT 3";
          $result =  $db->query($query_show_sermons)->fetchAll(PDO::FETCH_ASSOC);
          foreach ($result as $row) {
            echo '<div class="sermon">';
            echo '<p>' . htmlspecialchars($row['date']) . '<br class="break"><span class="vertical-dash"> | </span>' . htmlspecialchars($row['name']) . '<br class="break"><span class="vertical-dash"> | </span>' . htmlspecialchars($row['title']) . '</p>';
            echo '<audio controls="" preload="metadata" name="media"><source src="' . htmlspecialchars($row['file']) . '" type="audio/mpeg"></audio>';
            echo '</div>';
          }
        } catch (PDOException $e) {
          echo "Fout bij ophalen preken: " . $e->getMessage();
        }
        $db = null;
        ?>
      </div>
    </section>

    <section id="activities">
      <h3>Activiteiten</h3>
      <div class="kind-of-activities">
        <h4>Wekelijkse Activiteiten</h4>

        <div class="activities-container">
          <a href="services.php">
            <div class="activity">
              <div class="image-container">
                <img src="images/diensten.jpg" alt="Eredienst">
              </div>
              <div class="text-container">
                <h4>Samenkomst</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus ultricies facilisis. Vestibulum convallis neque vel consequat vestibulum. Mauris vel mi vitae enim gravida bibendum. Cras egestas est a tortor facilisis interdum. </p>
              </div>
            </div>
          </a>

          <a href="bidstond.php">
            <div class="activity">
              <div class="image-container">
                <img src="images/prayer.jpg" alt="Bidstond">
              </div>
              <div class="text-container">
                <h4>Bidstond</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus ultricies facilisis. Vestibulum convallis neque vel consequat vestibulum. Mauris vel mi vitae enim gravida bibendum. Cras egestas est a tortor facilisis interdum. </p>
              </div>
            </div>
          </a>

          <a href="huiskring.php">
            <div class="activity">
              <div class="image-container">
                <img src="images/huiskring.jpg" alt="Huiskring">
              </div>
              <div class="text-container">
                <h4>Huiskring</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus ultricies facilisis. Vestibulum convallis neque vel consequat vestibulum. Mauris vel mi vitae enim gravida bibendum. Cras egestas est a tortor facilisis interdum. </p>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="kind-of-activities">
        <h4>Maandelijkse Activiteiten</h4>

        <div class="activities-container">
          <a href="agenda.php">
            <div class="activity">
              <div class="image-container">
                <img src="images/avondmaal.png" alt="Avondmaal">
              </div>
              <div class="text-container">
                <h4>Avondmaal</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus ultricies facilisis. Vestibulum convallis neque vel consequat vestibulum. Mauris vel mi vitae enim gravida bibendum. Cras egestas est a tortor facilisis interdum. </p>
              </div>
            </div>
          </a>

          <a href="children.php#kidspraise">
            <div class="activity">
              <div class="image-container">
                <img src="images/kinderen.png" alt="Kidspraise">
              </div>
              <div class="text-container">
                <h4>Kidspraise</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus ultricies facilisis. Vestibulum convallis neque vel consequat vestibulum. Mauris vel mi vitae enim gravida bibendum. Cras egestas est a tortor facilisis interdum. </p>
              </div>
            </div>
          </a>

          <a href="youth.php">
            <div class="activity">
              <div class="image-container">
                <img src="images/jeugd.jpg" alt="Jeugdgroep">
              </div>
              <div class="text-container">
                <h4>Jeugdgroep</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus ultricies facilisis. Vestibulum convallis neque vel consequat vestibulum. Mauris vel mi vitae enim gravida bibendum. Cras egestas est a tortor facilisis interdum. </p>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="kind-of-activities">
        <h4>Bijzondere Activiteiten</h4>

        <div class="activities-container">
          <a href="education.php">
            <div class="activity">
              <div class="image-container">
                <img src="images/baptism.jpg" alt="Doopdienst">
              </div>
              <div class="text-container">
                <h4>Doopdienst</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus ultricies facilisis. Vestibulum convallis neque vel consequat vestibulum. Mauris vel mi vitae enim gravida bibendum. Cras egestas est a tortor facilisis interdum. </p>
              </div>
            </div>
          </a>

          <a href="alpha.php">
            <div class="activity">
              <div class="image-container">
                <img src="images/alpha.jpg" alt="Alpha cursus">
              </div>
              <div class="text-container">
                <h4>Alpha cursus</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus ultricies facilisis. Vestibulum convallis neque vel consequat vestibulum. Mauris vel mi vitae enim gravida bibendum. Cras egestas est a tortor facilisis interdum. </p>
              </div>
            </div>
          </a>

          <!-- <a href="#">
            <div class="activity">
              <div class="image-container">
                <img src="#" alt="#">
              </div>
              <div class="text-container">
                <h4>nog iets</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus ultricies facilisis. Vestibulum convallis neque vel consequat vestibulum. Mauris vel mi vitae enim gravida bibendum. Cras egestas est a tortor facilisis interdum. </p>
              </div>
            </div>
          </a> -->
        </div>
      </div>
    </section>
  </main>

  <?php include 'footer.html'; ?>
</body>

</html>