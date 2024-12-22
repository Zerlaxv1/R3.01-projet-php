<?php
define("ROOT_DIR", "../");
require_once ROOT_DIR . 'includes/database.php';

if (isset($_POST['ID']) && !empty($_POST['ID'])) {
    $id = $_POST['ID'];
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $DateNaissance = $_POST['DateNaissance'];
    $Poste = $_POST['Poste'];
    $Taille = $_POST['Taille'];
    $Poids = $_POST['Poids'];
    $Equipe = $_POST['Equipe'];
    $Status = $_POST['Status'];
    $License = $_POST['License'];
    $Note = $_POST['Note'];

    $query = $db->prepare("UPDATE Joueur SET Nom = ?, Prenom = ?, DateDeNaissance = ?, Poste = ?, Taille = ?, Poids = ?, EquipeID = ?, Status = ?, License = ?, Commentaire= ? WHERE ID = ?");
    if ($query == false) {
        htmlErrorMessage("Erreur lors de la préparation de la requête");
    } else {
        $res = $query->execute([$Nom, $Prenom, $DateNaissance, $Poste, $Taille, $Poids, $Equipe, $Status, $License, $Note, $id]);
        if ($res == false) {
            htmlErrorMessage("Erreur lors de l'exécution de la requête");
        } else {
            header("Location: " . ROOT_DIR . "joueurs");
        }
    }
} else {
    header("Location: " . ROOT_DIR . "joueurs");
}
