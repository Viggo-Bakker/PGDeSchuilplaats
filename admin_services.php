<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="css/admin.css" />
</head>

<body>
    <?php
    include 'dbconnect.php';
    include 'menu.html';

    date_default_timezone_set('Europe/Amsterdam');

    // helper: formatteer Y-m-d naar "Zo 19 okt"
    function formatDutchDate(?string $date): string
    {
        if (empty($date)) return '';
        $dt = DateTime::createFromFormat('Y-m-d', $date) ?: new DateTime($date);
        $weekdays = ['Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za'];
        $months = [1 => 'jan', 'feb', 'mrt', 'apr', 'mei', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec'];
        $weekday = $weekdays[(int)$dt->format('w')];
        $day = $dt->format('j');
        $month = $months[(int)$dt->format('n')];
        return $weekday . ' ' . $day . ' ' . $month;
    }

    try {       //DELETE!!!!!!
        if (isset($_GET['id'])) {
            $query_delete = $db->prepare("DELETE FROM services WHERE id = :id");
            $query_delete->bindParam("id", $_GET['id']);
            if ($query_delete->execute()) {
                echo "De dienst is verwijderd!";
            } else {
                echo "Er is een fout opgetreden!";
            }
        }
    } catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }

    $service_date = '';
    $special_occasion = '';
    $service_time = '';
    $speaker_name = '';
    $elder_name = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // je bestaande formulierverwerking hier...
        if (isset($_POST['send'])) {
            $service_date = $_POST['service_date'] ?? null;
            $special_occasion = $_POST['special_occasion'] ?? null;
            $service_time = $_POST['service_time'] ?? null;
            $speaker_name = $_POST['speaker_name'] ?? null;
            $elder_name = $_POST['elder_name'] ?? null;

            $query_upload = $db->prepare("INSERT INTO services(date, special_occasion, time, speaker, elder) VALUES(?, ?, ?, ?, ?)");
            $query_upload->execute([$service_date, $special_occasion, $service_time, $speaker_name, $elder_name]);
            echo "Upload gelukt!";
        } else {
            echo "Fout bij uploaden!";
        }
    }
    ?>
    <main>
        <section id="upload-form" style="margin-top: 100px;">
            <h2>Upload een Dienst</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="service-date">*Datum: </label>
                    <input type="date" id="service-date" name="service_date" required value="<?php echo htmlspecialchars($service_date, ENT_QUOTES); ?>">
                </div>

                <div class="form-group">
                    <label for="special_occasion">Bijzondere gelegenheid:</label>
                    <input type="text" id="special_occasion" name="special_occasion" value="<?php echo htmlspecialchars($special_occasion, ENT_QUOTES); ?>">
                </div>

                <div class="form-group">
                    <label for="service-time">*Tijd:</label>
                    <input type="text" id="service-time" name="service_time" required value="<?php echo htmlspecialchars($service_time, ENT_QUOTES); ?>">
                </div>

                <div class="form-group">
                    <label for="speaker_name">*Spreker:</label>
                    <input type="text" id="speaker_name" name="speaker_name" required value="<?php echo htmlspecialchars($speaker_name, ENT_QUOTES); ?>">
                </div>

                <div class="form-group">
                    <label for="elder_name">*Oudste van Dienst:</label>
                    <input type="text" id="elder_name" name="elder_name" required value="<?php echo htmlspecialchars($elder_name, ENT_QUOTES); ?>">
                </div>

                <button type="submit" name="send" value="Upload Dienst">Versturen</button>
            </form>
        </section>

        <section id="services">
            <h3>Aankomende Diensten</h3>
            <div id="services-list">
                <?php
                try {
                    $query_show_services = "SELECT * FROM services WHERE DATE(date) >= '" . date("Y-m-d") . "' ORDER BY date ASC";
                    $result = $db->query($query_show_services)->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo '<div class="service">';
                        echo '<a href="update_service.php?id=' . $row['id'] . '">Bewerk</a>';           //UPDATE LINK
                        echo ' | ';
                        echo '<a href="admin_services.php?id=' . $row['id'] . '" class="delete-link">Verwijder</a>';        //DELETE LINK
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
    </main>

    <footer>
        <a href="#">Schuilplaats</a>
        <a href="#">06-12345678</a>
        <a href="#">info@deschuilplaats.nl</a>
    </footer>

    <script>    //conform delete
      document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('a.delete-link').forEach(function (link) {
          link.addEventListener('click', function (e) {
            if (!confirm('Weet je zeker dat je deze dienst wilt verwijderen? Deze actie kan niet ongedaan gemaakt worden.')) {
              e.preventDefault();
            }
          });
        });
      });
    </script>
</body>

</html>