<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>

  <link
    rel="stylesheet"
    href="https://unpkg.com/franken-ui@1.1.0/dist/css/core.min.css" />

  <link
    rel="stylesheet"
    href="./styles.css" />

  <link
    rel="stylesheet"
    href="../globals.css" />
</head>

<body class="bg-background text-foreground">
  <div class="content">
    <div class="headings">
      <h1>Connexion</h1>
      <p>Entrez vos identifiants pour continuer</p>
    </div>

    <form method="post">
      <div>
        <label class="uk-form-label">Identifiant</label>
        <input class="uk-input" name="identifiant" type="text" placeholder="Identifiant">
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