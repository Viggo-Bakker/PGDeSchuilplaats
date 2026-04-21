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
    <title>Protocollen</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="protocols-header">
            <h1>Protocollen</h1>
        </section>
        <section class="info" id="protocols-info">
            <div>
                <h2>Protocol actualisatie persoonsgegevens</h2>
                <p>
                    Om de gegevens van onze leden zo actueel mogelijk te houden, zullen wij elke 5 jaar de gegevens uitprinten en laten controleren/aanpassen door de personen zelf. Tevens krijgen alle kinderen die de leeftijd van 16 jaar bereiken hun eigen gegevens op papier,
                    zodat zij deze kunnen controleren/aanpassen. Ook dienen zij dan wel of geen toestemming te geven voor het gebruik van hun persoonsgegevens. 
                    <br><br>
                    Tevens kan een ieder ten alle tijden, op aanvraag, hun gegevens inzien/controleren/aanpassen/laten verwijderen.
                </p>
            </div>

            <div>
                <h2>Protocol datalekken</h2>
                <p>
                    Om datalekken binnen PG de Schuilplaats te voorkomen is ervoor gekozen, om zo min mogelijk personen toegang te laten hebben tot persoonsgegevens. Al het mailverkeer vanuit PG de Schuilplaats zal via 1 mailaccount geschieden.
                    <br><br>
                    Onze mogelijke datalekken hebben wij om duidelijke reden niet openbaar gemaakt. Deze kunnen opgevraagd worden door de bevoegde instantie's via secretariaatpgdeschuilplaats.nl
                    Mocht een datalek voorkomen, dan zullen wij dit direct bij constatering melden bij de Autoriteit Persoonsgegevens.
                </p>
            </div>

            <div>
                <h2>Personen met toegang tot persoonsgegevens:</h2>
                <table>
                    <tr>
                        <td>N.J. Gerse-Kattestaart</td>
                        <td>
                            <ul>
                                <li>digitale lijsten/database in computer</li>
                                <li>toegang tot cloud met digitale lijsten/database</li>
                                <li>(tbv verwerking van de persoonsgegevens)</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>J. Quevedo Klein Haneveld</td>
                        <td>
                            <ul>
                                <li>digitale lijsten met namen, adressen en telefoonnummers</li>
                                <li>(tbv de huiskringen)</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>R. Achterberg</td>
                        <td>
                            <ul>
                                <li>digitale lijsten met namen, adressen en telefoonnummers</li>
                                <li>(tbv pastorale werkzaamheden)</li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div>
                <h2>Protocol verwijdering persoonsgegevens</h2>
                <p>
                    Iedereen heeft het recht om zijn/haar persoonsgegevens in de zien, te corrigeren of te verwijderen. Daarnaast heeft een ieder het recht om de eventuele toestemming voor de gegevensverwerking in te trekken, 
                    of bezwaar te maken tegen de verwerking van zijn/haar persoonsgegevens.
                    <br><br>
                    Hiertoe dient u een verzoek tot inzage, correctie, verwijdering of een verzoek tot intrekking van uw toestemming of bezwaar op de verwerking van uw persoonsgegevens in bij PG de Schuilplaats via secretariaatpgdeschuilplaats.nl
                    <br><br>
                    Om er zeker van te zijn dat het verzoek tot inzage door u gedaan is, vragen wij een kopie van uw identiteitsbewijs met het verzoek mee te sturen. Maak in deze kopie uw pasfoto, MRZ, kaartnummer en BSN zwart. Dit ter bescherming van uw privacy. 
                    We reageren zo snel mogelijk, maar binnen vier weken, op uw verzoek.
                    <br><br>
                    Bij beëindiging van lidmaatschap/ vaste bezoeker verwijderen wij uw persoonsgegevens automatisch na 1 jaar. Mocht u de persoonsgegeven direct bij beëindiging willen laten verwijderen, dien dan bovenstaand verzoek in.
                </p>
            </div>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>

</html>