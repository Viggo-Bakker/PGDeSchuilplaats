<?php

require_once __DIR__ . '/includes/settings.php';
require_once __DIR__ . '/includes/helpers.php';

session_start();
header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'unauthorized']);
    exit;
}

session_regenerate_id(true);
echo json_encode(['status' => 'ok']);