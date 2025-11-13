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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Preken</title>
  <link rel="stylesheet" href="css/sermons.css" />
</head>

<body>
  <?php
  try {       //DELETE!!!!!!
    if (isset($_GET['id'])) {
      $query_delete = $db->prepare("DELETE FROM sermons WHERE id = :id");
      $query_delete->bindParam("id", $_GET['id']);
      if ($query_delete->execute()) {
        echo "De preek is verwijderd!";
      } else {
        echo "Er is een fout opgetreden!";
      }
    }
  } catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
  }
  ?>

  <header id="sermon">
    <div class="overlay">
      <h1>Preken van Pinkstergemeente De Schuilplaats</h1>
      <p>Luister naar onze recente preken en laat je inspireren.</p>
    </div>
  </header>

  <main>
    <section id="sermons">
      <div id="sermons-header">
        <h2>Recente Preken</h2>

        <form class="search-bar" method="POST" action="">
          <input type="text" name="search_sermon" placeholder="Zoek...">
          <button type="submit">Zoek</button>
        </form>
      </div>

      <div id="sermon-list">
        <?php
        try {
          if(isset($_POST['search_sermon'])) {    //if search term is set
            $search_term = htmlspecialchars($_POST['search_sermon']);
            $query_show = $db->prepare("SELECT * FROM sermons WHERE name LIKE :search OR title LIKE :search ORDER BY date DESC");
            $like_search = "%" . $search_term . "%";
            $query_show->bindParam("search", $like_search);
          } else {                         //if no search term, show all
            $query_show = $db->prepare("SELECT * FROM sermons ORDER BY date DESC LIMIT 10");
          }
          $query_show->execute();
          $result = $query_show->fetchAll(PDO::FETCH_ASSOC);
          foreach ($result as $row) {
            echo '<div class="sermon">';
            echo '<p>' . htmlspecialchars($row['date']) . ' | ' . htmlspecialchars($row['name']) . ' | ' . htmlspecialchars($row['title']) . '</p>';
            echo '<audio controls="" preload="metadata" name="media"><source src="' . htmlspecialchars($row['file']) . '" type="audio/mpeg"></audio>';
            if (isset($user_data))   //SHOW EDIT/DELETE LINKS IF LOGGED IN
            {
              echo '<div><a href="update_sermon.php?id=' . $row['id'] . '">Bewerk</a>';           //UPDATE LINK
              echo ' | ';
              echo '<a href="sermons.php?id=' . $row['id'] . '" class="delete-link">Verwijder</a></div>';        //DELETE LINK
            }
            echo '</div>';
          }
        } catch (PDOException $e) {
          echo "Fout bij ophalen preken: " . $e->getMessage();
        }
        $db = null;
        ?>
      </div>
    </section>
  </main>

  <?php include 'footer.html'; ?>

  <script>
    //conform delete
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('a.delete-link').forEach(function(link) {
        link.addEventListener('click', function(e) {
          if (!confirm('Weet je zeker dat je deze dienst wilt verwijderen? Deze actie kan niet ongedaan gemaakt worden.')) {
            e.preventDefault();
          }
        });
      });
    });
  </script>
</body>

</html>