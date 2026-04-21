<?php 

require_once 'settings.php';
require_once 'classes/System/Databases/Database.php';
require_once 'classes/System/ServicesCollection/Collection.php';
require_once 'classes/System/ServicesCollection/Service.php';
require_once 'classes/System/SermonsCollection/Collection.php';
require_once 'classes/System/SermonsCollection/Service.php';

require_once 'functions.php';

$errors = [];

try {
    //get current filename to switch between logic
    $pathParts = explode('/', $_SERVER['SCRIPT_NAME']);
    $currentFile = dirname(__FILE__) . '/pages/' . $pathParts[count($pathParts) - 1];

    //if the file exists, load logic for this page
    if (file_exists($currentFile)) {
        require_once $currentFile;
    }
} catch (Throwable $e) {
    $errors[] = "Er is een fout opgetreden: " . $e->getMessage();
}