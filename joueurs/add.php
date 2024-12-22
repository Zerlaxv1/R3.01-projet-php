<?php
define("ROOT_DIR", "../");
require_once ROOT_DIR . 'includes/database.php';
require_once ROOT_DIR . 'includes/functions.php';
require_once ROOT_DIR . 'includes/partials/error.php';

redirect_logged();

if (
    isset($_POST['Nom']) && !empty($_POST['Nom']) &&
    isset($_POST['Prenom']) && !empty($_POST['Prenom']) &&
    isset($_POST['DateNaissance']) && !empty($_POST['DateNaissance']) &&
    isset($_POST['Poste']) && !empty($_POST['Poste']) &&
    isset($_POST['Taille']) && !empty($_POST['Taille']) &&
    isset($_POST['Poids']) && !empty($_POST['Poids']) &&
    isset($_POST['Equipe']) && !empty($_POST['Equipe']) &&
    isset($_POST['Status']) && !empty($_POST['Status']) &&
    isset($_POST['License']) && !empty($_POST['License'])
) {
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $DateNaissance = $_POST['DateNaissance'];
    $Poste = $_POST['Poste'];
    $Taille = $_POST['Taille'];
    $Poids = $_POST['Poids'];
    $Equipe = $_POST['Equipe'];
    $Status = $_POST['Status'];
    $License = $_POST['License'];

    $query = $db->prepare("INSERT INTO Joueur (Nom, Prenom, DateDeNaissance, Poste, Taille, Poids, EquipeID, Status, License) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($query == false) {
        htmlErrorMessage("Erreur lors de la préparation de la requête");
    } else {
        $res = $query->execute([$Nom, $Prenom, $DateNaissance, $Poste, $Taille, $Poids, $Equipe, $Status, $License]);
        if ($res == false) {
            htmlErrorMessage("Erreur lors de l'exécution de la requête");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un joueurs</title>

    <link
        rel="stylesheet"
        href="https://unpkg.com/franken-ui@1.1.0/dist/css/core.min.css" />
    <script src="https://unpkg.com/franken-ui@1.1.0/dist/js/core.iife.js" type="module"></script>
    <script src="https://unpkg.com/franken-ui@1.1.0/dist/js/icon.iife.js" type="module"></script>

    <link
        rel="stylesheet"
        href="<?php echo ROOT_DIR . 'assets/css/globals.css' ?>" />

    <link
        rel="stylesheet"
        href="<?php echo ROOT_DIR . 'assets/css/Ajout-joueurs.styles.css' ?>" />

    <link
        rel="stylesheet"
        href="<?php echo ROOT_DIR . 'assets/css/header.css' ?>" />
</head>

<body>
    <header>
        <?php include ROOT_DIR . 'includes/partials/header.php'; ?>
    </header>

    <main class="uk-overflow-auto container uk-margin-top">

        <div class="headings uk-flex uk-flex-between uk-margin">

            <h1 class="uk-heading">Ajouter un joueur</h1>
            <a href="<?php echo ROOT_DIR . 'joueurs' ?>" class="uk-button uk-button-default">Retour</a>
        </div>

        <form
            action="<?php echo ROOT_DIR . 'joueurs/add.php' ?>"
            method="POST">
            <fieldset class="uk-fieldset">
                <div class="uk-margin">
                    <label for="Nom">Nom</label>
                    <input class="uk-input" type="text" name="Nom" id="Nom" required>
                </div>

                <div class="uk-margin">
                    <label for="Prenom">Prenom</label>
                    <input class="uk-input" type="text" name="Prenom" id="Prenom" required>
                </div>

                <div class="uk-margin">
                    <label for="License">License</label>
                    <input class="uk-input" type="number" name="License" id="License" required>
                </div>

                <div class="uk-margin">
                    <label for="DateNaissance">Date de Naissance</label>
                    <input class="uk-input" type="date" name="DateNaissance" id="DateNaissance" required>
                </div>

                <div class="uk-margin">
                    <label for="Taille">Taille</label>
                    <input class="uk-input" type="number" name="Taille" id="Taille" required>
                </div>

                <div class="uk-margin">
                    <label for="Poids">Poids</label>
                    <input class="uk-input" type="number" name="Poids" id="Poids" required>
                </div>

                <div class="uk-margin">
                    <label for="Equipe">Equipe</label>
                    <select class="uk-select" name="Equipe" id="Equipe" required>
                        <option value="1">Equipe 1</option>
                        <option value="2">Equipe 2</option>
                        <option value="3">Equipe 3</option>
                        <option value="4">Equipe 4</option>
                    </select>
                </div>

                <div class="uk-margin">
                    <label for="Status">Status</label>
                    <select class="uk-select" name="Status" id="Status" required>
                        <option value="Actif">Actif</option>
                        <option value="Blessé">Blessé</option>
                        <option value="Suspendu">Suspendu</option>
                        <option value="Absent">Absent</option>
                    </select>
                </div>

                <div class="uk-margin">
                    <label for="Poste">Poste</label>
                    <select class="uk-select" name="Poste" id="Poste" required>
                        <option value="Pillier">Pillier</option>
                        <option value="Talonneur">Talonneur</option>
                        <option value="Demi">Demi</option>
                        <option value="Trois-quart">Trois-quart</option>
                    </select>
                </div>

                <button class="uk-button uk-button-primary" type="submit">Ajouter</button>
            </fieldset>
        </form>
    </main>

    <footer>
        <?php include ROOT_DIR . 'includes/partials/footer.php'; ?>
    </footer>

</body>

</html>