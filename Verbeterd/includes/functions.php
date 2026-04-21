<?php
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
