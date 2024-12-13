<?php

define("ROOT_DIR", "");
require_once ROOT_DIR . 'includes/database.php';
require_once ROOT_DIR . 'includes/functions.php';

// On redirige l'utilisateur s'il est déjà connecté
redirect_logged();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil</title>

  <link
    rel="stylesheet"
    href="https://unpkg.com/franken-ui@1.1.0/dist/css/core.min.css" />

  <link
    rel="stylesheet"
    href="<?php echo ROOT_DIR . 'assets/css/globals.css' ?>" />

  <link
    rel="stylesheet"
    href="<?php echo ROOT_DIR . 'assets/css/accueil.styles.css' ?>" />

  <link
    rel="stylesheet"
    href="<?php echo ROOT_DIR . 'assets/css/header.css' ?>" />
</head>

<body>
  <?php include ROOT_DIR . 'includes/partials/header.php'; ?>

  <main>
    <div class="headings container">
      <h1>Accueil</h1>
      <p>
        Bienvenue sur votre tableau de bord. Vous pouvez consulter les statistiques
        de vos joueurs, les matches joués, les matches gagnés et les matches perdus.
      </p>
    </div>

    <div class="stats container">
      <div class="stat">
        <div>
          <p class="stat-title text-sm">Joueurs inscrits</p>
        </div>
        <div>
          <p class="stat-value text-2xl">45.2k</p>
          <p class="stat-description">+20.1% depuis le mois dernier</p>
        </div>
      </div>

      <div class="stat">
        <div>
          <p class="stat-title text-sm">Matches joués</p>
        </div>
        <div>
          <p class="stat-value text-2xl">45.2k</p>
          <p class="stat-description">+20.1% depuis le mois dernier</p>
        </div>
      </div>

      <div class="stat">
        <div>
          <p class="stat-title text-sm">Matches gagnés</p>
        </div>
        <div>
          <p class="stat-value text-2xl">45.2k</p>
          <p class="stat-description">+20.1% depuis le mois dernier</p>
        </div>
      </div>

      <div class="stat">
        <div>
          <p class="stat-title text-sm">Matches perdus</p>
        </div>
        <div>
          <p class="stat-value text-2xl">45.2k</p>
          <p class="stat-description">+20.1% depuis le mois dernier</p>
        </div>
      </div>
    </div>

  </main>
</body>

</html>