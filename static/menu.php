<header>
    <nav>
        <div class="logo">
            <i class="fas fa-rocket"></i>
        </div>
        <div class="toggle">
            <i class="fas fa-bars ouvrir"></i>
            <i class="fas fa-times fermer"></i>
        </div>
        <div class="toggle_image">
            <a href="https://www.univ-lyon1.fr/" target="_blank"><img style="width:50%;height:20%;"
                    src="images/lyon1.png" alt="image-lien" /></a>
        </div>
        <ul class="menu">
            <li><a href="index.php?page=accueil">Accueil</a></li>
            <li><a href="index.php?page=chat">Chat</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="index.php?page=jeu">Jouer</a></li>

            <?php if (!isset($_SESSION["logged"])) {
                echo '<li><button class="btn" style="color: black;"><a href="index.php?page=inscription">Inscription</a></button></li>' .
                    '<li><button class="btn btn-secondary"><a href="index.php?page=connexion">Connexion</a></button></li>';
                    
            } else {
                echo '<li><button class="btn btn-secondary"><a href="index.php?page=profil">Profil</a></button></li>';
                echo '<li><form method="POST"><button class="btn" style="background-color:red;" type="submit" value="Se déconnecter" name="déconnexion">Deconnexion</button></form></li>';
            }
            ?>
        </ul>
    </nav>
</header>