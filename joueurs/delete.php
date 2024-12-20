<?php
define("ROOT_DIR", "../");
require_once ROOT_DIR . 'includes/database.php';
require_once ROOT_DIR . 'includes/functions.php';
require_once ROOT_DIR . 'includes/partials/error.php';

// Redirige si l'utilisateur n'est pas connecté
redirect_logged();

// Vérifie si des joueurs ont été sélectionnés pour suppression
if (isset($_POST['joueurs']) && !empty($_POST['joueurs'])) {
    $ids = $_POST['joueurs'];
    echo "ids: ";
    print_r($ids);

    // Crée une chaîne de caractères avec des placeholders pour la requête SQL
    $placeholders = implode(',', array_fill(0, count($ids), '?'));

    // Supprime d'abord les lignes associées dans la table `Participe`
    $deleteParticipes = $db->prepare("DELETE FROM Participe WHERE JoueurID IN ($placeholders)");
    if ($deleteParticipes->execute($ids) === false) {
        htmlErrorMessage("Erreur lors de la suppression des participations");
        exit();
    }

    // Supprime ensuite les joueurs dans la table `Joueur`
    $query = $db->prepare("DELETE FROM Joueur WHERE id IN ($placeholders)");
    if ($query == false) {
        htmlErrorMessage("Erreur lors de la préparation de la requête");
    } else {
        $res = $query->execute($ids);
        if ($res === false) {
            $errorInfo = $query->errorInfo();
            htmlErrorMessage("Unable to delete: " . $errorInfo[2]);
        }        
    }
    // Redirige vers la page des joueurs après suppression
    header("Location: /joueurs");
    exit();
} else {
    // Affiche une erreur si aucun joueur n'a été sélectionné
    echo "error";
    header("Location: /joueurs");
    exit();
}
?>
