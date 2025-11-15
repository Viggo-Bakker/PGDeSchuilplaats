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
    <title>Stuurgroep</title>
    <link rel="stylesheet" href="css/suppages.css">

</head>

<body>
    <main>
        <section class="header" id="our_team-header">
            <h1>Stuurgroep</h1>
        </section>
        <section class="info" id ="our_team-info">
            <table>
                <tr>
                    <th colspan="2" id="description">Elk stuurgroeplid heeft naast het besturen van de Pinkstergemeente de Schuilplaats ook een eigen verantwoording binnen de gemeente. De stuurgroep bestaat uit een voorganger, oudsten, diakenen en andere leden met een speciale functie. 
                        De stuurgroep vergadert één maal in de vier weken, en één maal in de vier weken is er een gebedsavond, hierbij zijn de gemeenteleden ook van harte welkom (zie onze agenda). Tweemaal in de vier weken komen de oudsten bij elkaar om te bidden. 
                        De voorganger, oudsten en diakenen worden bijgestaan in hun bediening door hun partners ieder op haar/zijn unieke manier met de gave die zij van de Heer ontvangen hebben.
                    </th>
                </tr>
                <tr>
                    <td>
                        <span class="name">Jaime Quevedo Klein Haneveld</span>
                        <br><br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ullamcorper massa. Vivamus vel semper urna. Quisque ornare neque lorem, vitae semper nunc finibus eget. Pellentesque sit amet orci a urna semper convallis. 
                        Vivamus vel erat vitae metus luctus blandit. Cras eget mauris diam. Donec quis mi at quam blandit semper ut eget tortor. Vivamus mollis, felis id tincidunt elementum, leo arcu dignissim libero, ac imperdiet nibh ante at velit. 
                        Etiam dolor lacus, cursus euismod viverra vel, interdum sit amet urna. Mauris accumsan elit mauris, quis ullamcorper massa aliquet vel. Phasellus sapien enim, molestie ac mauris at, congue sodales leo. 
                        Morbi quis ex et erat faucibus mattis posuere vel velit. Cras vitae viverra ante, vel sagittis neque. In hac habitasse platea dictumst.
                    </td>
                    <td><img src="images/jaime.jpg" alt="Jaime Quevedo Klein Haneveld"></td>
                </tr>
                <tr>
                    <td>
                        <span class="name">Rienkje Achterberg</span>
                        <br><br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ullamcorper massa. Vivamus vel semper urna. Quisque ornare neque lorem, vitae semper nunc finibus eget. Pellentesque sit amet orci a urna semper convallis. 
                        Vivamus vel erat vitae metus luctus blandit. Cras eget mauris diam. Donec quis mi at quam blandit semper ut eget tortor. Vivamus mollis, felis id tincidunt elementum, leo arcu dignissim libero, ac imperdiet nibh ante at velit. 
                        Etiam dolor lacus, cursus euismod viverra vel, interdum sit amet urna. Mauris accumsan elit mauris, quis ullamcorper massa aliquet vel. Phasellus sapien enim, molestie ac mauris at, congue sodales leo. 
                        Morbi quis ex et erat faucibus mattis posuere vel velit. Cras vitae viverra ante, vel sagittis neque. In hac habitasse platea dictumst.
                    </td>
                    <td><img src="images/#" alt="Rienkje Achterberg"></td>
                </tr>
                <tr>
                    <td>
                        <span class="name">Bert (Financiën) en Tineke van der Leeden (Kinderwerk)</span>
                        <br><br>
                        Bert en Tineke zijn verantwoordelijk voor de financiën van de gemeente. Bert speelt daarbij basgitaar in het aanbiddingsteam en Tineke is verantwoordelijk voor het kinderwerk in de gemeente. 
                        Vanaf haar tienertijd is zij al werkzaam in het kinderwerk en dit werk heeft nog steeds haar hart. Elk kind is bijzonder en is het waard om op eigen niveau en met oog voor eigen karakter over de Heer Jezus te horen.
                        <br><br>
                        Tineke en Bert zijn al meer dan 30 jaar getrouwd en hebben samen vier kinderen en vijf kleinkinderen. Zij gaan graag met hun (klein-)kinderen op stap.
                    </td>
                    <td><img src="images/bert_tineke.jpg" alt="Bert en Tineke van der Leeden"></td>
                </tr>
            </table>
        </section>
    </main>

    <?php include 'footer.html'; ?>

</body>

</html>