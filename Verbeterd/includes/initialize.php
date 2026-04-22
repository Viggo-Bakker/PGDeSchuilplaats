<?php 

require_once 'settings.php';
require_once 'vendor/autoload.php';

//Start session here
//$session = new \System\Session\Session();

$errors = [];

try {
    //get the url from .htaccess rewrite & check existence (if not: 404!)
    $currentPage = (!isset($_GET['url']) || $_GET['url'] === '' ? 'home' : $_GET['url']);
    $phpFile = $currentPage . '.php';
    if (!file_exists(INCLUDES_PATH . 'pages/' . $phpFile)) {
        http_response_code(404);
        $phpFile = '404.php';
    }
    
    require_once INCLUDES_PATH . 'pages/' . $phpFile;

    //use output buffers to capture template data from require statement and tore in $content
    ob_start();
    require_once INCLUDES_PATH . 'pages/templates/' . $phpFile;
    $content = ob_get_clean();

} catch (Throwable $e) {
    $errors[] = "Er is een fout opgetreden: " . $e->getMessage();
}