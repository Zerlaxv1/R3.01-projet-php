<?php
/**
 * Démarre une session et redirige l'utilisateur vers la page de connexion si l'identifiant n'est pas présent dans la session.
 *
 * @return void
 */
function redirect_logged() {
    session_start();
    if (!isset($_SESSION['identifiant'])) {
        header('Location: ' . ROOT_DIR . 'login.php');
    }
}

/**
 * Initialise la session et redirige l'utilisateur connecté vers la page principale.
 *
 * @return void
 */
function redirect_unlogged() {
    session_start();
    if (isset($_SESSION['identifiant'])) {
        header('Location: ' . ROOT_DIR . 'index.php');
    }
}