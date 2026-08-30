<?php

$pageStyles = ['src/css/suppages.css'];
$pageTitle = 'Zoekpagina';

$searchTerm = trim((string) ($_POST['q'] ?? $_GET['q'] ?? ''));
$results = [];

$searchIndex = [
    [
        'url' => 'home',
        'pagetitle' => 'Home',
        'headings' => ['Welkom bij Pinkstergemeente De Schuilplaats'],
        'keywords' => ['welkom', 'start']
    ],
    [
        'url' => 'agenda',
        'pagetitle' => 'Agenda',
        'headings' => ['Diensten', 'Alpha', 'Kringen', 'Bidstond'],
        'keywords' => ['planning', 'activiteiten']
    ],
    [
        'url' => 'services',
        'pagetitle' => 'Diensten',
        'headings' => ['Planning', 'Uitleg'],
        'keywords' => ['spreker', 'samenkomst']
    ],
    [
        'url' => 'sermons',
        'pagetitle' => 'Preken luisteren',
        'headings' => ['Recente preken', 'Beschikbare preken'],
        'keywords' => ['audio', 'onderwijs, preek']
    ],
    [
        'url' => 'about_us',
        'pagetitle' => 'Over ons',
        'headings' => ['Onze visie', 'Meer lezen'],
        'keywords' => ['gemeente', 'visie']
    ],
    [
        'url' => 'our_team',
        'pagetitle' => 'Stuurgroep',
        'headings' => [],
        'keywords' => ['leiding']
    ],
    [
        'url' => 'history',
        'pagetitle' => 'Geschiedenis',
        'headings' => [],
        'keywords' => ['ontstaan']
    ],
    [
        'url' => 'route',
        'pagetitle' => 'Route',
        'headings' => [],
        'keywords' => ['adres', 'bereikbaarheid']
    ],
    [
        'url' => 'education',
        'pagetitle' => 'Onderwijs',
        'headings' => ['Kinderen', 'Tieners', 'Jeugd'],
        'keywords' => ['bijbel', 'leren']
    ],
    [
        'url' => 'children',
        'pagetitle' => 'Kinderen',
        'headings' => [],
        'keywords' => []
    ],
    [
        'url' => 'teens',
        'pagetitle' => 'Tieners',
        'headings' => [],
        'keywords' => []
    ],
    [
        'url' => 'youth',
        'pagetitle' => 'Jeugd',
        'headings' => [],
        'keywords' => []
    ],
    [
        'url' => 'contact',
        'pagetitle' => 'Contact',
        'headings' => ['Privacy statement', 'Protocollen', 'ANBI'],
        'keywords' => ['mail', 'telefoon']
    ],
    [
        'url' => 'privacy_statement',
        'pagetitle' => 'Privacy statement',
        'headings' => [],
        'keywords' => ['privacy', 'avg']
    ],
    [
        'url' => 'protocols',
        'pagetitle' => 'Protocollen',
        'headings' => [],
        'keywords' => ['veiligheid']
    ],
    [
        'url' => 'anbi',
        'pagetitle' => 'ANBI',
        'headings' => [],
        'keywords' => ['giften', 'belasting']
    ],
    [
        'url' => 'donate',
        'pagetitle' => 'Doneren',
        'headings' => [],
        'keywords' => ['gift', 'geven']
    ],
];

if ($searchTerm !== '') {
    $needle = mb_strtolower($searchTerm);

    foreach ($searchIndex as $item) {
        $score = 0;

        $pagetitle = mb_strtolower($item['pagetitle']);

        // Hoogste prioriteit: menu/title
        if ($pagetitle === $needle) {
            $score += 100;
        } elseif (str_starts_with($pagetitle, $needle)) {
            $score += 80;
        } elseif (str_contains($pagetitle, $needle)) {
            $score += 60;
        }

        // Tweede prioriteit: headings
        foreach ($item['headings'] as $heading) {
            $h = mb_strtolower($heading);
            if ($h === $needle) {
                $score += 40;
            } elseif (str_contains($h, $needle)) {
                $score += 30;
            }
        }

        // Derde prioriteit: keywords
        foreach ($item['keywords'] as $kw) {
            $k = mb_strtolower($kw);
            if ($k === $needle) {
                $score += 25;
            } elseif (str_contains($k, $needle)) {
                $score += 15;
            }
        }

        if ($score > 0) {
            $item['score'] = $score;
            $results[] = $item;
        }
    }

    usort($results, function ($a, $b) {
        return $b['score'] <=> $a['score'];
    });
}

$pageTemplate = 'search.php';