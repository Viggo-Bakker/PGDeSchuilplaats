<?php

$pageStyles = ['src/css/suppages.css'];
$pageTitle = 'Route';
$pageTemplate = 'static.php';
$pageHeroTitle = 'Route';
$pageHeroText = 'Zo vind je De Schuilplaats in Hekelingen.';
$pageHeroBackground = 'route.jpg';
$pageSections = [
    [
        'title' => 'Maps',
        'body' => '
            <p>Gebruik de navigatie in je telefoon of klik op de kaartknop hieronder om ons te vinden.</p>
            <iframe id="route" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2465.889292935635!2d4.343340776894165!3d51.82645278734534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c449c5344ccc45%3A0x7443e266d0ea1e13!2sPG%20de%20Schuilplaats!5e0!3m2!1snl!2snl!4v1763057559202!5m2!1snl!2snl" 
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        ',
    ],
];
