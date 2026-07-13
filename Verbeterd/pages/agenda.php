<?php

$pageStyles = ['src/css/suppages.css'];
$pageTitle = 'Agenda';
$pageTemplate = 'static.php';
$pageHeroTitle = 'Agenda';
$pageHeroText = 'Diensten, gebed en activiteiten op een rij.';
$pageSections = [
    [
        'title' => 'Weekritme',
        'body' => '<p>Op zondagen is er samenkomst en door de week zijn er onder meer bidstond, kringen en jeugdactiviteiten.</p>',
    ],
    [
        'title' => 'Agenda overzicht',
        'body' => '
            <iframe id="month" src="https://calendar.google.com/calendar/embed?title=PG%20de%20Schuilplaats&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=weekbriefdeschuilplaats%40gmail.com&amp;color=%2329527A&amp;ctz=Europe%2FAmsterdam&mode=MONTH"></iframe>
            <iframe id="planning"src="https://calendar.google.com/calendar/embed?title=PG%20de%20Schuilplaats&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=weekbriefdeschuilplaats%40gmail.com&amp;color=%2329527A&amp;ctz=Europe%2FAmsterdam&mode=AGENDA"></iframe>
        ',
    ],
    [
        'title' => 'Diensten en preken',
        'body' => '<p>De actuele diensten vind je op <a href="services">diensten</a> en de preken op <a href="sermons">preken luisteren</a>.</p>',
    ],
];
