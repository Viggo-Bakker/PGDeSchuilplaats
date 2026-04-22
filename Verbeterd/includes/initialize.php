<?php 

require_once 'settings.php';
require_once 'vendor/autoload.php';


$errors = [];

try {
    //get current filename to switch between logic
    $pathParts = explode('/', $_SERVER['SCRIPT_NAME']);
    $currentFile = './pages/' . $pathParts[count($pathParts) - 1];

    //if the file exists, load logic for this page
    if (file_exists($currentFile)) {
        require_once $currentFile;
    }
} catch (Throwable $e) {
    $errors[] = "Er is een fout opgetreden: " . $e->getMessage();
}