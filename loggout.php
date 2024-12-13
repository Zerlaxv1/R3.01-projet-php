<?php
define("ROOT_DIR", "");
require_once ROOT_DIR . 'includes/functions.php';

// restaure la session
session_start();

// détruit la session
session_destroy();

//redirige vers la page de login
header('Location: ' . ROOT_DIR . 'login.php');