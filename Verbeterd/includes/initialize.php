<?php 

require_once 'settings.php';
require_once 'classes/System/Databases/Database.php';
require_once 'classes/System/ServicesCollection/Collection.php';
require_once 'classes/System/ServicesCollection/Service.php';

require_once 'functions.php';

try {
    $pathParts = explode('/', $_SERVER['SCRIPT_NAME']);
    $currentFile = dirname(__FILE__) . '/pages/' . $pathParts[count($pathParts) - 1];

    if (file_exists($currentFile)) {
        require_once $currentFile;
    }
} catch (Throwable $e) {
    echo "Er is een fout opgetreden: " . $e->getMessage();
}