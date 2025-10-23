<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Preken</title>
  <link rel="stylesheet" href="css/sermons.css" />
</head>

<body>
  <?php
  include 'menu.html';
  include 'dbconnect.php';

  $sermon_date = '';
  $speaker_name = '';
  $sermon_title = '';
  $sermon_audio = null;

  // Na include/headers: detecteer wanneer POST leeg is door overschrijding van post_max_size
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Als POST & FILES leeg zijn maar CONTENT_LENGTH aanwezig is, is waarschijnlijk post_max_size overschreden
    if (empty($_POST) && empty($_FILES) && !empty($_SERVER['CONTENT_LENGTH'])) {
      echo '<p style="color:red;">Upload mislukt: bestand is groter dan de serverlimiet. Vergroot upload_max_filesize / post_max_size in php.ini.</p>';
    } else {
      // je bestaande formulierverwerking hier...
      if (isset($_POST['send'])) {
        $sermon_date = $_POST['sermon_date'];
        $speaker_name = $_POST['speaker_name'];
        $sermon_title = $_POST['sermon_title'];
        $sermon_audio = $_FILES['sermon_audio'];

        echo "Het formulier is verzonden!";
      } else {
        $sermon_date = '';
        $speaker_name = '';
        $sermon_title = '';
        $sermon_audio = null;
      }
    }
  }
  ?>

  <header id="sermon">
    <div class="overlay">
      <h1>Preken van Pinkstergemeente De Schuilplaats</h1>
      <p>Luister naar onze recente preken en laat je inspireren.</p>
    </div>
  </header>

  <main>
    <section id="upload-form">
      <h2>Upload een Preek</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="sermon-date">Datum:</label>
          <input type="date" id="sermon-date" name="sermon_date" required value="<?php echo htmlspecialchars($sermon_date, ENT_QUOTES); ?>">
        </div>

        <div class="form-group">
          <label for="speaker-name">Spreker:</label>
          <input type="text" id="speaker-name" name="speaker_name" required value="<?php echo htmlspecialchars($speaker_name, ENT_QUOTES); ?>">
        </div>

        <div class="form-group">
          <label for="sermon-title">Titel:</label>
          <input type="text" id="sermon-title" name="sermon_title" required value="<?php echo htmlspecialchars($sermon_title, ENT_QUOTES); ?>">
        </div>

        <div class="form-group">
          <span class="file-label">Audio bestand:</span>
          <input type="file" id="sermon-audio" name="sermon_audio" accept="audio/*" required>
        </div>

        <button type="submit" name="send" value="Upload Preek">Versturen</button>
      </form>
    </section>
  </main>

  <footer>
    <a href="#">Schuilplaats</a>
    <a href="#">06-12345678</a>
    <a href="#">info@deschuilplaats.nl</a>
  </footer>
</body>

</html>