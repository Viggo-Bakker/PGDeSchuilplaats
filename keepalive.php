<?php
header('Content-Type: application/json; charset=utf-8');

// Optioneel: verhoog session lifetime in centrale bootstrap / php.ini
// ini_set('session.gc_maxlifetime', 7200); // instellen vóór session_start indien gewenst

session_start();

// alleen voor ingelogde gebruikers
if (empty($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['ok' => false, 'msg' => 'not logged in']);
  exit;
}

// regenereer id en update timestamp
session_regenerate_id(true);
$_SESSION['last_regenerated'] = time();

echo json_encode(['ok' => true, 'ts' => $_SESSION['last_regenerated']]);
?>