<?php use System\Utils\TimeFormatter; ?>
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
              <h4><?= htmlspecialchars(TimeFormatter::formatDutchDate($service['date'])) ?></h4>
              <p><?= htmlspecialchars($service['special_occasion']) ?></p>
              <p><?= htmlspecialchars(date("H:i", strtotime($service['time']))) ?> <span class="vertical-dashes"><?= htmlspecialchars($service['speaker']) ?></span> OvD: <?= htmlspecialchars($service['elder']) ?></p>
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
        if (isset($sermons) && count($sermons) > 0): ?>
          <?php for ($i = 0; $i < 3; $i++): ?>
            <div class="sermon">
              <p><?= htmlspecialchars(TimeFormatter::formatDutchDate($sermons[$i]['date'])) ?> <span class="vertical-dashes"> <?= htmlspecialchars($sermons[$i]['name']) ?></span> <?= htmlspecialchars($sermons[$i]['title']) ?></p>
              <audio controls="" preload="metadata" name="media">
                <source src="src/assets/<?= htmlspecialchars($sermons[$i]['file']) ?>" type="audio/mpeg">
              </audio>
            </div>
        <?php endfor;
        endif;
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
                <img src="src/assets/images/diensten.jpg" alt="Eredienst">
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
                <img src="src/assets/images/prayer.jpg" alt="Bidstond">
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
                <img src="src/assets/images/huiskring.jpg" alt="Huiskring">
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
                <img src="src/assets/images/avondmaal.png" alt="Avondmaal">
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
                <img src="src/assets/images/kinderen.png" alt="Kidspraise">
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
                <img src="src/assets/images/jeugd.jpg" alt="Jeugdgroep">
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
                <img src="src/assets/images/baptism.jpg" alt="Doopdienst">
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
                <img src="src/assets/images/alpha.jpg" alt="Alpha cursus">
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
                <img src="src/assets/images/nogiets.jpg" alt="Nog iets">
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