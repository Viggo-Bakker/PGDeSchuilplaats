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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href='css/suppages.css' rel="stylesheet">
</head>

<body>
    <main>
        <section class="header" id="contact-header">
            <div class="header-content">
                <h1>Neem contact met ons op</h1>
                <p>Heb je vragen of opmerkingen? Vul het onderstaande formulier in en we nemen zo snel mogelijk contact met je op!</p>
            </div>
        </section>
        <section class="info" id="contact-form">
            <div>
                <h1>Contactformulier</h1>
            </div>

            <form action="" method="POST">
                <div class="formfield">
                    <label for="name">Naam*</label>
                    <input type="text" id="name" name="name" placeholder="Voer volledige naam in..." required>
                </div>

                <div class="formfield">
                    <label for="email">E-mail*</label>
                    <input type="email" id="email" name="email" placeholder="Voer e-mailadres in..." required>
                </div>

                <div class="formfield">
                    <label>Categorie*</label>
                    <div id="options">
                        <div>
                            <input type="radio" id="question" name="category" value="vraag" required>
                            <label for="question">Vraag</label>
                        </div>
                        <div>
                            <input type="radio" id="remark" name="category" value="opmerking" required>
                            <label for="remark">Opmerking</label>
                        </div>
                    </div>
                </div>

                <div class="formfield">
                    <label for="message">Bericht*</label>
                    <textarea id="message" name="message" required></textarea>
                </div>

                <div class="formfield">
                    <button type="submit">Verstuur e-mail</button>

                    <?php 
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $name = htmlspecialchars($_POST['name']);
                            $email = htmlspecialchars($_POST['email']);
                            $category = htmlspecialchars($_POST['category']);       //subject
                            $message = htmlspecialchars($_POST['message']);
                            
                            // Always set content-type when sending HTML email
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            // More headers
                            $headers .= "From: " . $email . "\r\n" ;

                            if(mail("joahmqkh@gmail.com", $category, $message, $headers)) {
                                echo "<p class='success'>E-mail succesvol verzonden!</p>";
                            } else {
                                echo "<p class='error'>Er is een fout opgetreden bij het verzenden van de e-mail. Probeer het later opnieuw.</p>";
                            }
                        }
                    ?>

                </div>

                <p>* Verplichte velden</p>
            </form>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>