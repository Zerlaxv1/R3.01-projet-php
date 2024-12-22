<?php

define("ROOT_DIR", "");
require_once ROOT_DIR . 'includes/database.php';

require_once ROOT_DIR . 'includes/partials/error.php';
require_once ROOT_DIR . 'includes/functions.php';

// Redirige l'utilisateur s'il est déjà connecté
redirect_unlogged();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>

  <link
    rel="stylesheet"
    href="https://unpkg.com/franken-ui@1.1.0/dist/css/core.min.css" />

  <link
    rel="stylesheet"
    href="<?php echo ROOT_DIR . 'assets/css/globals.css' ?>" />

  <link
    rel="stylesheet"
    href="<?php echo ROOT_DIR . 'assets/css/login.styles.css' ?>" />
</head>

<body class="bg-background text-foreground">
  <div class="content">
    <div class="headings">
      <h1>Connexion</h1>
      <p>Entrez vos identifiants pour continuer</p>
    </div>

    <form method="post">

      <?php
      if (isset($_POST['identifiant']) && isset($_POST['password'])) {
        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];

        $query = $db->prepare("SELECT * FROM Entraineur WHERE Identifiant = ?");
        if ($query == false) {
          htmlErrorMessage("Erreur lors de la préparation de la requête");
        } else {
          $res = $query->execute([$identifiant]);
          if ($res == false) {
            htmlErrorMessage("Erreur lors de l'exécution de la requête");
          }
        }

        $user = $query->fetch();
        if ($user == false) {
          htmlErrorMessage("Identifiants incorrects", "L'identifiant ou le mot de passe est incorrect");
        } else {
          if (password_verify($password, $user['motDePasse'])) {
            // On stocke l'identifiant de l'utilisateur dans la session
            $_SESSION['identifiant'] = $user['Identifiant'];

            // On redirige l'utilisateur vers la page d'accueil
            header('Location: ' . ROOT_DIR . 'index.php');
          } else {
            htmlErrorMessage("Identifiants incorrects", "L'identifiant ou le mot de passe est incorrect");
          }
        }
      }
      ?>

      <div>
        <label class="uk-form-label">Identifiant</label>
        <input class="uk-input" name="identifiant" type="text" placeholder="Identifiant" autofocus>
      </div>

      <div>
        <label class="uk-form-label">Mot de passe</label>
        <input class="uk-input" name="password" type="password" placeholder="********">
      </div>

      <button class="uk-button uk-button-primary" type="submit">Se connecter</button>
    </form>
  </div>
</body>

</html>