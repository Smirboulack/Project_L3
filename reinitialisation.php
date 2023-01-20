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
    <form id="form_insc" action="reinitialisation.php" method="POST">
        <div class="form-group">
            <label for="email">Adresse email du compte existant </label>
            <input type="text" class="form-control" id="email" name="email" placeholder="(gmail,hotmail,outlook)">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="(Longueur minimal : 10 , au moins une majuscule et un chiffre)">
        </div>
        <div class="form-group">
            <label for="passwordconfirm">Confirmation du mot de passe</label>
            <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm">
        </div>
        <button type="submit" class="btn btn-primary" name="reinit">Modifier</button>
    </form>
</body>

</html>

<?php
require_once 'modeles/modele.php';
require_once 'includes/includes.php';
require_once 'includes/bdd.php';


if (isset($_POST['reinit'])) {
    $connexion = mysqli_connect(SERVEUR, UTILISATEUR, MOTDEPASSE, BDD);
    //Nous verifions d'abord que le compte existe


    $mail = $_POST['email'];
    $verifReq = "SELECT id_u FROM utilisateurs WHERE email = '$mail';";
    echo $verifReq;
    $verifRes = executeQuery($connexion, $verifReq);
    if (mysqli_num_rows($verifRes) == 1) //le compte existe bien
    {
        $id_u = mysqli_fetch_assoc($verifRes);
        $password = md5($_POST['password']);
        $passwordconfirm = md5($_POST['passwordconfirm']);
        if($password == $passwordconfirm) //et les 2 mdp correspondent
        {
            $reinitReq = "UPDATE utilisateurs SET mot_de_passe = '$password' WHERE  id_u = ".$id_u["id_u"].";";
            echo $reinitReq;
            executeQuery($connexion, $reinitReq);
        } else echo "Les mots de passes ne correspondent pas.";
    }else echo "Veuillez vérifier l'adresse mail renseigné.";
}
?>
