<?php
session_start();
require_once 'modeles/modele.php';
require_once 'includes/includes.php';
require_once 'includes/bdd.php';
$etatCo;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ultimate LIFKIYA</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="script/scriptapp.js"></script>
</head>

<body>
    <?php include('static/menu.php'); ?>
    <form id="form_insc" action="connexion.php" method="POST">
        <div class="form-group">
            <label for="username">Pseudonyme ou e-mail </label>
            <input type="text" class="form-control" id="username" name="username"
                placeholder="(entre 5 et 15 caractères)">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password"
                placeholder="(Longueur minimal : 10 , au moins une majuscule et un chiffre)">
        </div>
        <button type="submit" class="btn btn-primary" name="connect">Se connecter</button>
        <div>
            <p>Mot de passe oublié ? <a href="reinitialisation.php">Réinitialiser votre mot de passe</a></p>
            <p>Créer un compte ? <a href="inscription.php">inscription</a></p>
        </div>
    </form>
</body>

</html>

<?php


if (isset($_POST['connect'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['username'];
    $connexion = mysqli_connect(SERVEUR, UTILISATEUR, MOTDEPASSE, BDD);

    $requete = "SELECT id_u FROM utilisateurs WHERE mot_de_passe = '$password' OR email='$email' AND pseudo_u = '$username';";
    $nbRes = mysqli_num_rows(executeQuery($connexion, $requete));
    if ($nbRes == 1) {
        $etatCo = true;
        echo '<li id="connex_ok">'.'</li>';
        echo '<script type="text/javascript">
        temps_de_connexion();
        </script>';
    } else {
        $etatCo = false;
        echo '<li>' . "vous n'êtes pas connecté" . '</li>';
    }
}
?>