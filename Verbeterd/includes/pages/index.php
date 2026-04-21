<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$servicesCollection = new \System\ServicesCollection\Collection();
$servicesCollection->set(\System\ServicesCollection\Service::getComing($db->getConnection()));

$soonServices = $servicesCollection->get(); 
