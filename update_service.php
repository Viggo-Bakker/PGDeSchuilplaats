<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update dienst</title>
    <link rel="stylesheet" href="css/admin.css" />
</head>

<body>
    <?php
    include 'dbconnect.php';

    try {
        if (isset($_POST['send'])) {
            $service_date = $_POST['service_date'] ?? null;
            $special_occasion = $_POST['special_occasion'] ?? null;
            $service_time = $_POST['service_time'] ?? null;
            $speaker_name = $_POST['speaker_name'] ?? null;
            $elder_name = $_POST['elder_name'] ?? null;

            $query = $db->prepare("UPDATE services SET date = :date,
                                                special_occasion = :special_occasion,
                                                time = :time,
                                                speaker = :speaker,
                                                elder = :elder
                             WHERE id = :id");
            $query->bindParam("date", $service_date);
            $query->bindParam("special_occasion", $special_occasion);
            $query->bindParam("time", $service_time);
            $query->bindParam("speaker", $speaker_name);
            $query->bindParam("elder", $elder_name);
            $query->bindParam("id", $_GET['id']);
            if ($query->execute()) {
                header("Location: admin_services.php");
                exit();
            } else {
                echo "Er is een fout opgetreden!";
            }
        } else {
            $query = $db->prepare("SELECT * FROM services 
                                    WHERE id = :id");
            $query->bindParam("id", $_GET['id']);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as &$data) {
                $service_date = $data["date"];
                $special_occasion = $data["special_occasion"];
                $service_time = $data["time"];
                $speaker_name = $data["speaker"];
                $elder_name = $data["elder"];
            }
        }
    } catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }

    include 'menu.html';
    ?>
    <main>
        <section id="upload-form" style="margin-top: 100px;">
            <h2>Update een Dienst</h2>
            <form method="post" action="">
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

                <button type="submit" name="send" value="Upload Dienst">Update</button>
            </form>
        </section>
    </main>
</body>

</html>