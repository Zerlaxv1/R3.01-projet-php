<header>
  <nav class="uk-navbar-container">
    <div class="uk-container">
      <div class="uk-navbar">
        <div class="uk-navbar-left">
          <ul class="uk-navbar-nav">
            <?php
            $pages = [
              'Accueil' => '/',
              'Joueurs' => '/joueurs/',
              'Équipes' => '/equipes/',
              'Matchs' => '/matches/'
            ];

            $currentPath = $_SERVER['REQUEST_URI'];

            foreach ($pages as $page => $link) {
              $link = str_replace('index.php', '', $link);
              $currentPath = str_replace('index.php', '', $currentPath);

              if ($link === $currentPath) {
                echo "<li class=\"uk-active\"><a href=\"$link\">$page</a></li>";
              } else {
                echo "<li><a href=\"$link\">$page</a></li>";
              }
            }
            ?>
          </ul>
        </div>

        <div class="uk-navbar-right">
          <button class="uk-icon-button uk-icon-button-small uk-icon-button-outline">
            <uk-icon icon="palette" uk-cloak></uk-icon>
          </button>
          <div
            class="uk-card uk-card-body uk-card-default uk-drop uk-width-large"
            uk-drop="mode: click; offset: 8">
            <div class="uk-card-title uk-margin-medium-bottom">Customize</div>
            <uk-theme-switcher></uk-theme-switcher>
          </div>
          <ul class="uk-navbar-nav">
            <li>
              <a href="/loggout.php">
                Déconnexion
              </a>
            </li>
        </div>
      </div>
    </div>
  </nav>
</header>