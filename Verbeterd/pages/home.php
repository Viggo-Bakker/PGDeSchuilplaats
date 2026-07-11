<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$connection = $db->getConnection();

//get coming services
$servicesCollection = new \System\ServicesCollection\Collection();
$servicesCollection->set(\System\ServicesCollection\Service::getComing($connection));

$soonServices = $servicesCollection->get(); 


//get sermons
$sermonsCollection = new \System\SermonsCollection\Collection();
$sermonsCollection->set(\System\SermonsCollection\Sermon::getAll($connection));

$sermons = $sermonsCollection->get();


$pageTitle = 'Home';
