<?php
$etatCo;

if (isset($_POST['connect'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['username'];
    $connexion = mysqli_connect(SERVEUR, UTILISATEUR, MOTDEPASSE, BDD);

    $requete = "SELECT id_u FROM utilisateurs WHERE mot_de_passe = '$password' OR email='$email' AND pseudo_u = '$username';";
    $nbRes = mysqli_num_rows(executeQuery($connexion, $requete));
    if ($nbRes == 1) {
        $etatCo = true;
        $_SESSION['logged'] = $username;
        header('Location: index.php');
    } else {
        $etatCo = false;
        echo '<li>' . "vous n'êtes pas connecté" . '</li>';
    }
}
?>