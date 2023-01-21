<?php

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
        if ($password == $passwordconfirm) //et les 2 mdp correspondent
        {
            $reinitReq = "UPDATE utilisateurs SET mot_de_passe = '$password' WHERE  id_u = " . $id_u["id_u"] . ";";
            echo $reinitReq;
            executeQuery($connexion, $reinitReq);
        } else
            echo "Les mots de passes ne correspondent pas.";
    } else
        echo "Veuillez vérifier l'adresse mail renseigné.";
}
?>