<?php
$configFilePath = ROOT_DIR . "conf/config.ini";
$configIni = parse_ini_file($configFilePath, false);

// Si le fichier de configuration n'existe pas
if ($configIni == false) {
  throw new Exception("Erreur lors de la lecture du fichier de configuration");
}

// Verifie si les clés existent
if (
  !array_key_exists('user', $configIni) ||
  !array_key_exists('password', $configIni) ||
  !array_key_exists('host', $configIni) ||
  !array_key_exists('name', $configIni) ||
  !array_key_exists('port', $configIni)
) {
  throw new Exception("Le fichier de configuration est invalide");
}

// Recupere les valeurs
$DB_USER = $configIni['user'];
$DB_PASS = $configIni['password'];
$DB_HOST = $configIni["host"];
$DB_NAME = $configIni['name'];
$DB_PORT = $configIni['port'];


try {
  $db = new PDO("mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME", $DB_USER, $DB_PASS);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  exit;
}
