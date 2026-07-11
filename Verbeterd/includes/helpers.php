<?php

function formatDutchDate(?string $date): string
{
    if (empty($date)) {
        return '';
    }

    $dt = DateTime::createFromFormat('Y-m-d', $date) ?: new DateTime($date);
    $weekdays = ['Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za'];
    $months = [1 => 'jan', 'feb', 'mrt', 'apr', 'mei', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec'];

    return $weekdays[(int) $dt->format('w')] . ' ' . $dt->format('j') . ' ' . $months[(int) $dt->format('n')];
}

function check_login(PDO $db, bool $redirect): ?array
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = $db->prepare('SELECT * FROM users WHERE user_id = ? LIMIT 1');
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        }
    }

    if ($redirect) {
        header('Location: ' . BASE_PATH . 'login');
        exit;
    }

    return null;
}

function random_num(int $length): string
{
    $length = max(5, $length);
    $text = '';
    $targetLength = rand(4, $length);

    for ($i = 0; $i < $targetLength; $i++) {
        $text .= (string) rand(0, 9);
    }

    return $text;
}

function sermon_audio_url(?string $file): string
{
    if (empty($file)) {
        return '';
    }

    if (preg_match('~^(https?:)?/~', $file) === 1 || str_starts_with($file, 'src/')) {
        return $file;
    }

    if (str_starts_with($file, 'uploads/')) {
        return 'src/assets/' . $file;
    }

    return 'src/assets/uploads/audio/' . ltrim($file, '/');
}