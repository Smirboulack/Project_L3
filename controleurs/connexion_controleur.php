<?php
$etatCo;

$pseudo = null;
if (!empty($_COOKIE['pseudo'])) {
    $pseudo = $_COOKIE['pseudo'];
}

if(isset($_GET['acceptchat'])){
    echo 'Vous devez vous connecter pour pouvoir accéder au Chat';
}

if (isset($_POST['connect'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
   // $password = ($_POST['password']);
    $email = $_POST['username'];
    $connexion = mysqli_connect(SERVEUR, UTILISATEUR, MOTDEPASSE, BDD);
    $requete = "SELECT id_u FROM utilisateurs3 WHERE mot_de_passe = '$password' AND pseudo_u = '$username' OR email='$email' ";
    $nbRes = mysqli_num_rows(executeQuery($connexion, $requete));
    if ($nbRes == 1) {
        $etatCo = true;
        $_SESSION['logged'] = $username;
        Update_user_status_connect($_SESSION['logged'], $connexion);
        setcookie('pseudo', $_POST['username']);
        header('Location: index.php');
    } else {
        $etatCo = false;
        echo '<li>' . "vous n'êtes pas connecté ".$password.'</li>';
    }
}
?>