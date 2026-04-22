<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//get coming services
$servicesCollection = new \System\ServicesCollection\Collection();
$servicesCollection->set(\System\ServicesCollection\Service::getComing($db->getConnection()));

$soonServices = $servicesCollection->get(); 


//get sermons
$sermonsCollection = new \System\SermonsCollection\Collection();
$sermonsCollection->set(\System\SermonsCollection\Sermon::getAll($db->getConnection()));

$sermons = $sermonsCollection->get();
