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