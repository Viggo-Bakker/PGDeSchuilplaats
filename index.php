<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>De Schuilplaats</title>
  <link rel="stylesheet" href='css/styles.css'>
</head>

<body>

  <?php
  include 'menu.html';
  include 'dbconnect.php';
  date_default_timezone_set('Europe/Amsterdam');

   // helper: formatteer Y-m-d naar "Zo 19 okt"
  function formatDutchDate(?string $date): string {
    if (empty($date)) return '';
    $dt = DateTime::createFromFormat('Y-m-d', $date) ?: new DateTime($date);
    $weekdays = ['Zo','Ma','Di','Wo','Do','Vr','Za'];
    $months = [1=>'jan','feb','mrt','apr','mei','jun','jul','aug','sep','okt','nov','dec'];
    $weekday = $weekdays[(int)$dt->format('w')];
    $day = $dt->format('j');
    $month = $months[(int)$dt->format('n')];
    return $weekday . ' ' . $day . ' ' . $month;
  }
  ?>

  <header class="hero">
    <div class="overlay">
      <h1>Welkom bij Pinkstergemeente<br>De Schuilplaats</h1>
      <p>"Door liefde gedreven, mensen tot discipelen van Jezus te maken."</p>
    </div>
  </header>

  <main>
    <section id="about-us">
      <h2>Deepen your relationship with God <i>and your family</i></h2>
      <div id="text-background">
        <p>Openbaring 1:7 <br> Zie, Hij komt met de wolken, en elk oog zal Hem zien, ook zij die hem doorstoken hebben. En alle stammen van de aarde zullen rouw over Hem bedrijven. Ja, amen.</p>
      </div>
    </section>

    <section id="services">
      <h3>Aankomende Diensten</h3>
      <div>
        <?php 
        try {
          $query_show_services = "SELECT date, special_occasion, time, speaker, elder FROM services WHERE DATE(date) >= '" . date("Y-m-d") . "' ORDER BY date ASC LIMIT 4";
          $result = $db->query($query_show_services)->fetchAll(PDO::FETCH_ASSOC);
          foreach ($result as $row) {
            echo '<div class="service">';
            echo '<h4>' . htmlspecialchars(formatDutchDate($row['date'])) . '</h4>';
            echo '<p>' . htmlspecialchars($row['special_occasion']) . '</p>';
            echo '<p>' . htmlspecialchars(date("H:i", strtotime($row['time']))) . ' | ' . htmlspecialchars($row['speaker']) . ' | OvD: ' . htmlspecialchars($row['elder']) . '</p>';
            echo '</div>';
          }
        } catch (PDOException $e) {
          echo "Fout bij ophalen diensten: " . $e->getMessage();
        }
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
              echo '<p>' . htmlspecialchars($row['date']) . ' | ' . htmlspecialchars($row['name']) . ' | ' . htmlspecialchars($row['title']) . '</p>';
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
      <div>

        <a href="#">
          <div class="activity">
            <div class="image-container">
              <img src="images/diensten.jpg" alt="Eredienst">
            </div>
            <div class="text-container">
              <h4>Eredienst</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus ultricies facilisis. Vestibulum convallis neque vel consequat vestibulum. Mauris vel mi vitae enim gravida bibendum. Cras egestas est a tortor facilisis interdum. </p>
            </div>
          </div>
        </a>

        <a href="#">
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

        <a href="#">
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
    </section>
  </main>

  <footer>
    <a href="#">Schuilplaats</a>
    <a href="#">06-12345678</a>
    <a href="#">info@deschuilplaats.nl</a>
  </footer>
</body>

</html>