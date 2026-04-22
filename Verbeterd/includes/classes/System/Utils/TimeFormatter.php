<?php namespace System\Utils;

class TimeFormatter
{
    // helper: format Y-m-d to "Zo 19 okt"
    public static function formatDutchDate(?string $date): string
{
    if (empty($date)) return '';
    $dt = \DateTime::createFromFormat('Y-m-d', $date) ?: new \DateTime($date);
    $weekdays = ['Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za'];
    $months = [1 => 'jan', 'feb', 'mrt', 'apr', 'mei', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec'];
    $weekday = $weekdays[(int)$dt->format('w')];
    $day = $dt->format('j');
    $month = $months[(int)$dt->format('n')];
    return $weekday . ' ' . $day . ' ' . $month;
}
}