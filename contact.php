<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href='styles.css' rel="stylesheet">
</head>
<body>
    <?php 
    include "menu.html";
    ?>

    <main>
        <div class="center-container">
        <section>
            <div>
                <h1>Contactformulier</h1>
            </div>

            <div id="contact-form">
                <form action="https://docent.cmi.hr.nl/moora/frontend/send-mail.php" method="POST">
                    <div>
                        <label for="name" >Naam*</label>
                        <input type="text" id="name" name="name" placeholder="Voer volledige naam in..." required >
                    </div>

                    <div>
                        <label for="email">E-mail*</label>
                        <input type="email" id="email" name="email" placeholder="Voer e-mailadres in..." required >
                    </div>

                    <div>
                        <label for="city">Woonplaats*</label>
                        <input type="text" id="city" name="city" placeholder="Voer woonplaats in..." required >
                    </div>

                    <div>
                        <label for="birthdate">Geboorte Datum*</label>
                        <input type="date" id="birthdate" name="birthdate" placeholder="" required >
                    </div>

                    <div>
                        <label for="docent">Verstuur naar*</label>
                        <select id="docent" name="send-to" required>
                            <option value="" disabled selected>Kies een Docent</option>
                            <option value="0">Antwan</option>
                            <option value="1">Erik</option>
                            <option value="2">Martijn</option>
                        </select>
                    </div>

                    <div>
                        <label>Categorie*</label>
                        <div id="options">
                            <div class="mobile-left">
                                <input type="radio" id="overall" name="category" value="algemeen" required>
                                <label for="overall">Algemeen</label>
                            </div>
                            <div class="mobile-left">
                                <input type="radio" id="programming" name="category" value="programming" required>
                                <label for="programming">Programmeren</label>
                            </div>
                            <div class="mobile-left">
                                <input type="radio" id="CLE" name="category" value="cle" required>
                                <label for="CLE">CLE</label>
                            </div>
                        </div>
                    </div>

                        <label for="question">Jouw vraag*</label>
                        <textarea id="question" name="question" required></textarea>

                    <div id="terms-and-conditions-div">
                        <input type="checkbox" id="terms-and-conditions" required >
                        <label for="terms-and-conditions">Ik ga akkoord met de algemene voorwaarden*</label>
                    </div>

                    <div>
                        <button type="submit">Verstuur e-mail</button>
                    </div>

                    <p>* Verplichte velden</p>
                </form>                           
            </div>
        </section>
        </div>
    </main>
</body>
</html>