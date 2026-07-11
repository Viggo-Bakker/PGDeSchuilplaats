<?php

require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$errors = [];
$user_data = null;

try {
    $sessionDb = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $user_data = check_login($sessionDb->getConnection(), false);
} catch (Throwable $e) {
    $user_data = null;
}

try {
    $currentPage = (!isset($_GET['url']) || $_GET['url'] === '' ? 'home' : $_GET['url']);
    $phpFile = $currentPage . '.php';
    $pageFile = INCLUDES_PATH . 'pages/' . $phpFile;

    if (!file_exists($pageFile)) {
        http_response_code(404);
        $phpFile = '404.php';
        $pageFile = INCLUDES_PATH . 'pages/' . $phpFile;
    }

    require_once $pageFile;

    $templateFile = $pageTemplate ?? $phpFile;
    $templatePath = INCLUDES_PATH . 'pages/templates/' . $templateFile;

    if (!file_exists($templatePath)) {
        http_response_code(404);
        $templatePath = INCLUDES_PATH . 'pages/templates/404.php';
    }

    ob_start();
    require $templatePath;
    $content = ob_get_clean();
} catch (Throwable $e) {
    $errors[] = 'Er is een fout opgetreden: ' . $e->getMessage();
}