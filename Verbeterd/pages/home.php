<?php

$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$connection = $db->getConnection();

$soonServices = \System\ServicesCollection\Service::getComing($connection, 4);
$sermons = \System\SermonsCollection\Sermon::getAll($connection, 3);

$pageTitle = 'Home';
