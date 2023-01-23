<header>
    <nav>
        <div class="logo">
            <i class="fas fa-rocket"></i>
        </div>
        <div class="toggle">
            <i class="fas fa-bars ouvrir"></i>
            <i class="fas fa-times fermer"></i>
        </div>
        <ul class="menu">
            <li><a href="index.php?page=accueil">Accueil</a></li>
            <li><a href="index.php?page=legales">About</a></li>
            <li><a href="index.php?page=jeu">Jouer</a></li>
            <li><a href="http://cazabetremy.fr/wiki/doku.php?id=projet:presentation#enseignants" target="_blank">Page
                    web de
                    l'UE</a></li>
            <?php if (!isset($_SESSION["logged"])) {
            echo '<li><button class="btn" style="color: black;"><a href="index.php?page=inscription">Inscription</a></button></li>' .
                '<li><button class="btn btn-secondary"><a href="index.php?page=connexion">Connexion</a></button></li>';
        } else {
            echo '<li><form method="POST"><input style="background-color:red;" type="submit" value="Se déconnecter" name="déconnexion""/></form></li>';
        }
        ?>
        </ul>
    </nav>
</header>
<a href="https://www.univ-lyon1.fr/" target="_blank" style="position:fixed; top:0; right:800px;"><img src="images/lyon1.png" alt="image-lien" width="100%" height="50" /></a>