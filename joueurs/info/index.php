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

    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=lock" />
    <script>
        const htmlElement = document.documentElement;

        if (
            localStorage.getItem("mode") === "dark" ||
            (!("mode" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            htmlElement.classList.add("dark");
        } else {
            htmlElement.classList.remove("dark");
        }

        htmlElement.classList.add(localStorage.getItem("theme") || "uk-theme-zinc");
    </script>
</head>

<body class="bg-background text-foreground">
    <header>
        <?php include ROOT_DIR . 'includes/partials/header.php'; ?>
    </header>

    <main class="uk-overflow-auto">
        <div class="container">
            <div class="headings uk-flex uk-flex-between uk-margin">
                <h1 class="uk-heading">Informations sur le joueur</h1>
                <div class="uk-flex uk-flex">
                    <form action="" method="POST">
                        <input type="hidden" name="EDIT" value="true">
                        <button type="submit" class="uk-button uk-button-primary" <?php echo $edit ? 'disabled' : '' ?>>
                            <?php if ($edit): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                    <path d="M240-640h360v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85h-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640Zm0 480h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM240-160v-400 400Z" />
                                </svg>
                            <?php else: ?>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                    <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z" />
                                </svg>
                            <?php endif; ?>
                        </button>
                    </form>
                    <a href="<?php echo ROOT_DIR . 'joueurs' ?>" class="uk-button uk-button-default">Retour</a>
                </div>
            </div>
            <!-- display all the informations abt the joueur, as disabeled editable text, so with a click we can enable editing -->
            <form action="<?php echo ROOT_DIR . 'joueurs/update.php' ?>" method="POST">
                <fieldset class="uk-fieldset">
                    <input type="hidden" name="ID" value="<?php echo $joueur['id'] ?>">
                    <div class="uk-margin uk-flex uk-flex-between">
                        <div class="uk-width-1-2 uk-margin-small-right">
                            <label for="Nom">Nom</label>
                            <input class="uk-input" type="text" name="Nom" id="Nom" value="<?php echo $joueur['Nom'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
                        </div>
                        <div class="uk-width-1-2">
                            <label for="Prenom">Prenom</label>
                            <input class="uk-input" type="text" name="Prenom" id="Prenom" value="<?php echo $joueur['Prenom'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
                        </div>
                    </div>

                    <div class="uk-margin uk-flex uk-flex-between">
                        <div class="uk-width-1-2 uk-margin-small-right">
                            <label for="License">License</label>
                            <input class="uk-input" type="number" name="License" id="License" value="<?php echo $joueur['License'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
                        </div>
                        <div class="uk-width-1-2">
                            <label for="DateNaissance">Date de naissance</label>
                            <input class="uk-input" type="date" name="DateNaissance" id="DateNaissance" value="<?php echo $joueur['DateDeNaissance'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
                        </div>
                    </div>

                    <div class="uk-margin uk-flex uk-flex-between">
                        <div class="uk-width-1-2 uk-margin-small-right">
                            <label for="Taille">Taille</label>
                            <input class="uk-input" type="number" name="Taille" id="Taille" value="<?php echo $joueur['Taille'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
                        </div>
                        <div class="uk-width-1-2">
                            <label for="Poids">Poids</label>
                            <input class="uk-input" type="number" name="Poids" id="Poids" value="<?php echo $joueur['Poids'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
                        </div>
                    </div>

                    <div class="uk-margin uk-flex uk-flex-between">
                        <div class="uk-width-1-2 uk-margin-small-right">
                            <label for="Equipe">Equipe</label>
                            <select class="uk-select" name="Equipe" id="Equipe" <?php echo $edit ? '' : 'disabled' ?>>
                                <option value="1" <?php echo $joueur['EquipeID'] == 1 ? 'selected' : '' ?>>Equipe 1</option>
                                <option value="2" <?php echo $joueur['EquipeID'] == 2 ? 'selected' : '' ?>>Equipe 2</option>
                                <option value="3" <?php echo $joueur['EquipeID'] == 3 ? 'selected' : '' ?>>Equipe 3</option>
                                <option value="4" <?php echo $joueur['EquipeID'] == 4 ? 'selected' : '' ?>>Equipe 4</option>
                            </select>
                        </div>
                        <div class="uk-width-1-2">
                            <label for="Poste">Poste</label>
                            <select class="uk-select" name="Poste" id="Poste" <?php echo $edit ? '' : 'disabled' ?>>
                                <option value="Pillier" <?php echo $joueur['Poste'] == 'Pillier' ? 'selected' : '' ?>>Pillier</option>
                                <option value="Talonneur" <?php echo $joueur['Poste'] == 'Talonneur' ? 'selected' : '' ?>>Talonneur</option>
                                <option value="Demi" <?php echo $joueur['Poste'] == 'Demi' ? 'selected' : '' ?>>Demi</option>
                                <option value="Trois-quart" <?php echo $joueur['Poste'] == 'Trois-quart' ? 'selected' : '' ?>>Trois-quart</option>
                            </select>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label for="Status">Status</label>
                        <select class="uk-select" name="Status" id="Status" <?php echo $edit ? '' : 'disabled' ?>>
                            <option value="Actif" <?php echo $joueur['Status'] == 'Actif' ? 'selected' : '' ?>>Actif</option>
                            <option value="Blessé" <?php echo $joueur['Status'] == 'Blessé' ? 'selected' : '' ?>>Blessé</option>
                            <option value="Suspendu" <?php echo $joueur['Status'] == 'Suspendu' ? 'selected' : '' ?>>Suspendu</option>
                            <option value="Absent" <?php echo $joueur['Status'] == 'Absent' ? 'selected' : '' ?>>Absent</option>
                        </select>
                    </div>

                    <div class="uk-margin">
                        <label for="Note">Note</label>
                        <input class="uk-input" type="text" name="Note" id="Note" value="<?php echo $joueur['Commentaire'] ?>" <?php echo $edit ? '' : 'disabled' ?>>
                    </div>

                    <?php if ($edit): ?>
                        <button type="submit" class="uk-button uk-button-primary">Valider</button>
                    <?php endif; ?>
                </fieldset>
            </form>
        </div>
    </main>

    <footer>
        <?php include ROOT_DIR . 'includes/partials/footer.php'; ?>
    </footer>
</body>

</html>