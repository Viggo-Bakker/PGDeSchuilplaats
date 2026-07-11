<?php

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

function normalize_time_input(?string $time, string $default = '10:00'): string
{
    $time = trim((string) $time);

    if ($time === '') {
        return $default;
    }

    $matches = [];
    if (!preg_match('/^(\d{2}):(\d{2})$/', $time, $matches)) {
        return $default;
    }

    $hours = (int) $matches[1];
    $minutes = (int) $matches[2];

    if ($hours < 0 || $hours > 23 || $minutes < 0 || $minutes > 59) {
        return $default;
    }

    return sprintf('%02d:%02d', $hours, $minutes);
}