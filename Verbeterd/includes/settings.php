<?php 

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'schuilplaats';

//paths
const BASE_PATH = '/DeSchuilplaats/WebsitePGDeSchuilplaats/PGDeSchuilplaats/Verbeterd/';
// const LOG_PATH = __DIR__ . '../logs/';
const INCLUDES_PATH = __DIR__ . '/../';

date_default_timezone_set('Europe/Amsterdam');


set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});