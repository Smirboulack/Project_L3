<footer class="footer_menu">
    <ul class="menu">
        <li><a href="http://cazabetremy.fr/wiki/doku.php?id=projet:presentation#enseignants" target="_blank">Page web de
                l'UE</a></li>
        <li><a href="https://bdw1.univ-lyon1.fr/p1707160/BDW1/Developpement/static/plan.php" target="_blank"
                alt="UCBL">Plan du site</a></li>
        <?php
        if (isset($_SESSION["logged"])) {
            $username = $_SESSION["logged"];
            echo '<li>' . 'Bonjour ' . $username . '</li>';
            echo '<li id="connex_ok"><script>' . 'temps_de_connexion()' . '</script></li>';
        }
        ?>
    </ul>
</footer>