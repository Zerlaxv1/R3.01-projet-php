<?php
$DB_USER = '';
$DB_PASSWORD = '';
$DB_HOST = '';
$DB_PORT = '';
$DB_NAME = '';

try {
  $db = new PDO("mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  exit;
}
