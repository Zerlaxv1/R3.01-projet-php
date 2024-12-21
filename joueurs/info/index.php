<?php
define("ROOT_DIR", "../../");
require_once ROOT_DIR . 'includes/database.php';


require_once ROOT_DIR . 'includes/functions.php';
require_once ROOT_DIR . 'includes/partials/error.php';

redirect_logged();
$edit = false;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $query = $db->prepare("SELECT * FROM Joueur WHERE ID = ?");
    if ($query == false) {
        htmlErrorMessage("Erreur lors de la préparation de la requête");
    } else {
        $res = $query->execute([$id]);
        if ($res == false) {
            htmlErrorMessage("Erreur lors de l'exécution de la requête");
        }
    }
    $joueur = $query->fetch();
    if ($joueur === false) {
        htmlErrorMessage("Aucun joueur trouvé avec l'ID fourni.");
    }
} else {
    header("Location: " . ROOT_DIR . "joueurs");
}
if (isset($_POST["EDIT"]) && $_POST["EDIT"] == "true") {
    $edit = true;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joueurs</title>

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
        href="<?php echo ROOT_DIR . 'assets/css/Infojoueurs.styles.css' ?>" />

    <link
        rel="stylesheet"
        href="<?php echo ROOT_DIR . 'assets/css/header.css' ?>" />
</head>

<body>
    <header>
        <?php include ROOT_DIR . 'includes/partials/header.php'; ?>
    </header>

    <main>
        <!-- display all the informations abt the joueur, as disabeled editable text, so with a click we can enable editing -->
        <form action="<?php echo ROOT_DIR . 'joueurs/update.php' ?>" method="POST">
            <input type="hidden" name="ID" value="<?php echo $joueur['id'] ?>">
            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" name="Nom" id="Nom" value="<?php echo $joueur['Nom'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
            </div>
            <div class="form-group">
                <label for="Prenom">Prenom</label>
                <input type="text" name="Prenom" id="Prenom" value="<?php echo $joueur['Prenom'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
            </div>
            <div class="form-group">
                <label for="DateNaissance">Date de naissance</label>
                <input type="date" name="DateNaissance" id="DateNaissance" value="<?php echo $joueur['DateDeNaissance'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
            </div>
            <div class="form-group">
                <label for="License">License</label>
                <input type="number" name="License" id="License" value="<?php echo $joueur['License'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
            </div>
            <div class="form-group">
                <label for="Equipe">Equipe</label>
                <input type="text" name="Equipe" id="Equipe" value="<?php echo $joueur['EquipeID'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
            </div>
            <div class="form-group">
                <label for="Taille">Taille</label>
                <input type="number" name="Taille" id="Taille" value="<?php echo $joueur['Taille'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
            </div>
            <div class="form-group">
                <label for="Poids">Poids</label>
                <input type="text" name="Poids" id="Poids" value="<?php echo $joueur['Poids'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
            </div>
            <div class="form-group">
                <label for="Poste">Poste</label>
                <input type="text" name="Poste" id="Poste" value="<?php echo $joueur['Poste'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
            </div>
            <div class="form-group">
                <label for="Note">Note</label>
                <input type="text" name="Note" id="Note" value="<?php echo $joueur['Commentaire'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <input type="text" name="Status" id="Status" value="<?php echo $joueur['Status'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
            </div>
        </form>
        <form>
            <input type="hidden" name="EDIT" value="true">
            <button type="submit" class="uk-button uk-button-primary">Modifier</button>
        </form>
    </main>

    <footer>
        <?php include ROOT_DIR . 'includes/partials/footer.php'; ?>
    </footer>
</body>

</html>