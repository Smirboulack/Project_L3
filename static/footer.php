<footer class="footer_menu">
    <ul class="menu">
        <li><a href="https://www.univ-lyon1.fr/" target="_blank" alt="UCBL">UCB Lyon 1</a></li>
        <li><a href="https://bdw1.univ-lyon1.fr/p1707160/BDW1/Developpement/static/plan.php" target="_blank"
                alt="UCBL">Plan du site</a></li>
        <?php
        if (isset($_SESSION["logged"])) {
            $username = $_SESSION["logged"];
            echo '<li>' . 'Bonjour ' . $username . '</li>';
            echo '<li id="connex_ok"><script>'. 'temps_de_connexion()' .'</script></li>';
        }
        ?>
    </ul>
</footer>