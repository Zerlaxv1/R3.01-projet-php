<?php
define("ROOT_DIR", "../");
require_once ROOT_DIR . 'includes/database.php';


require_once ROOT_DIR . 'includes/functions.php';
require_once ROOT_DIR . 'includes/partials/error.php';

redirect_logged();

if (
    isset($_POST['Nom']) & !empty($_POST['Nom']) & 
    isset($_POST['Prenom']) & !empty($_POST['Prenom']) &
    isset($_POST['DateNaissance']) & !empty($_POST['DateNaissance']) &
    isset($_POST['Poste']) & !empty($_POST['Poste']) &
    isset($_POST['Taille']) & !empty($_POST['Taille']) &
    isset($_POST['Poids']) & !empty($_POST['Poids']) &
    isset($_POST['Equipe']) & !empty($_POST['Equipe']) &
    isset($_POST['Status']) & !empty($_POST['Status'])
) {
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $DateNaissance = $_POST['DateNaissance'];
    $Poste = $_POST['Poste'];
    $Taille = $_POST['Taille'];
    $Poids = $_POST['Poids'];
    $Equipe = $_POST['Equipe'];
    $Status = $_POST['Status'];

    $query = $db->prepare("INSERT INTO Joueur (Nom, Prenom, DateDeNaissance, Poste, Taille, Poids, Equipe, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($query == false) {
        htmlErrorMessage("Erreur lors de la préparation de la requête");
    } else {
        $res = $query->execute([$Nom, $Prenom, $DateNaissance, $Poste, $Numero]);
        if ($res == false) {
            htmlErrorMessage("Erreur lors de l'exécution de la requête");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un joueurs</title>

    <link
        rel="stylesheet"
        href="https://unpkg.com/franken-ui@1.1.0/dist/css/core.min.css" />

    <link
        rel="stylesheet"
        href="<?php echo ROOT_DIR . 'assets/css/globals.css' ?>" />

    <link
        rel="stylesheet"
        href="<?php echo ROOT_DIR . 'assets/css/joueurs.styles.css' ?>" />

    <link
        rel="stylesheet"
        href="<?php echo ROOT_DIR . 'assets/css/header.css' ?>" />
</head>

<body>
    <header>
        <?php include ROOT_DIR . 'includes/partials/header.php'; ?>
    </header>
    <form
        action="<?php echo ROOT_DIR . 'joueurs/add.php' ?>"
        method="POST">
        <label for="Nom">Nom</label>
        <input
            type="text"
            name="Nom"
            id="Nom"
            required>
        <label for="Prenom">Prenom</label>
        <input
            type="text"
            name="Prenom"
            id="Prenom"
            required>
        <label for="DateNaissance">Date de Naissance</label>
        <input
            type="date"
            name="DateNaissance"
            id="DateNaissance"
            required>
        <label for="Taille">Taille</label>
        <input
            type="number"
            name="Taille"
            id="Taille"
            required>
        <label for="Poids">Poids</label>
        <input
            type="number"
            name="Poids"
            id="Poids"
            required>
            <!-- equipe dropdown w sql function to fetch all equipe name, with associated id -->
            <label for="Equipe">Equipe</label>
        <input
            type=""
            name="Equipe"
            id="Equipe"
            required>
            <!-- same for status -->
            <label for="Status">Status</label>
        <input
            type="text"
            name="Status"
            id="Status"
            required>
            <!-- same for poste -->
        <label for="Poste">Poste</label>
        <input
            type="text"
            name="Poste"
            id="Poste"
            required>
        <button type="submit">Ajouter</button>
</body>

</html>