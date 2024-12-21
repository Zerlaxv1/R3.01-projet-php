<?php
define("ROOT_DIR", "../");
require_once ROOT_DIR . 'includes/database.php';


require_once ROOT_DIR . 'includes/functions.php';
require_once ROOT_DIR . 'includes/partials/error.php';

redirect_logged();

if (isset($_POST['Recherche']) & !empty($_POST['Recherche'])) {
    $recherche = $_POST['Recherche'];
    $query = $db->prepare("SELECT * FROM Joueur WHERE Nom LIKE ? OR Prenom LIKE ?");
    if ($query == false) {
        htmlErrorMessage("Erreur lors de la préparation de la requête");
    } else {
        $res = $query->execute(["%$recherche%", "%$recherche%"]);
        if ($res == false) {
            htmlErrorMessage("Erreur lors de l'exécution de la requête");
        }
    }
} else {
    $query = $db->prepare("SELECT * FROM Joueur");
    if ($query == false) {
        htmlErrorMessage("Erreur lors de la préparation de la requête");
    } else {
        $res = $query->execute();
        if ($res == false) {
            htmlErrorMessage("Erreur lors de l'exécution de la requête");
        }
    }
}
$joueurs = $query->fetchAll();
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
        href="<?php echo ROOT_DIR . 'assets/css/joueurs.styles.css' ?>" />

    <link
        rel="stylesheet"
        href="<?php echo ROOT_DIR . 'assets/css/header.css' ?>" />
</head>

<body>

    <header>
        <?php include ROOT_DIR . 'includes/partials/header.php'; ?>
    </header>

    <main>
        <div class="uk-overflow-auto container">
            <h1 class="headings">Joueurs</h1>
            <div class="uk-flex uk-flex-between uk-margin">
                <div>
                    <form method="POST" action="">
                        <input class="uk-input" type="text" name="Recherche" placeholder="Rechercher" value="<?php echo isset($_POST['Recherche']) ? htmlspecialchars($_POST['Recherche']) : ''; ?>" />
                        <!-- <button type="submit" class="uk-button uk-button-default">Rechercher</button> -->
                    </form>
                </div>
                <div>
                    <a class="uk-button uk-button-primary" href="add.php">Ajouter</a>
                </div>
            </div>
            <form method="POST" action="delete.php">
                <div class="uk-flex uk-flex-between uk-margin-bottom">
                    <table class="uk-table uk-table-middle uk-table-divider uk-table-hover">
                        <thead>
                            <tr>
                                <th class="uk-table-shrink"></th>
                                <th class="uk-table-shrink">Dénomination</th>
                                <th class="uk-table-expand">Note</th>
                                <th class="uk-width-small">Status</th>
                                <th class="uk-table-shrink uk-text-nowrap">Poste</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //for each row in the query result, display a table row
                            foreach ($joueurs as $joueur) {
                            ?>
                                <tr>
                                    <td class="uk-table-shrink">
                                        <input class="uk-checkbox" type="checkbox" name="joueurs[]" value="<?php echo $joueur['id']; ?>" aria-label="Checkbox" />
                                    </td>

                                    <td class="uk-text-nowrap">
                                        <?php echo strtoupper($joueur["Nom"]) . " " . $joueur["Prenom"] ?>
                                    </td>

                                    <td class="uk-text-truncate">
                                        <a class="uk-link-reset" href=""> <?php echo $joueur["Commentaire"] ?></a>
                                    </td>

                                    <td class="uk-text-nowrap">
                                        <?php echo $joueur["Status"] ?>
                                    </td>
                                    <td class="uk-text-nowrap">
                                        <?php echo $joueur["Poste"] ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <button type="submit" class="uk-button uk-button-danger">Supprimer</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <?php include ROOT_DIR . 'includes/partials/footer.php'; ?>
    </footer>
</body>

</html>