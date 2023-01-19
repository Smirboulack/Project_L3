<?php
session_start();
require_once 'modeles/modele.php';
require_once 'includes/includes.php';
require_once 'includes/bdd.php';


if (isset($_POST["submit"])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $passwordconfirm = md5($_POST['passwordconfirm']);
    $email = $_POST['email'];
    $date = $_POST['date'];
    $connexion = mysqli_connect(SERVEUR, UTILISATEUR, MOTDEPASSE, BDD);
    
    $errors = array();

    if (empty($username) || empty($password) || empty($passwordconfirm) || empty($email) || empty($date)) {
        $errors[] = 'Tous les champs doivent être remplis';
    }

    if (strlen($username) < 5 || strlen($username) > 15) {
        $errors[] = 'Le pseudonyme doit être compris entre 5 et 15 caractères';
    }

    if(checkAvailability($username,$connexion)==0){
        $errors[] = 'Le pseudonyme est déjà utilisee';
    }

    if (strlen($password) < 10) {
        $errors[] = 'Le mot de passe doit contenir au moins 10 caractères';
    }
/*
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = 'Le mot de passe doit contenir au moins une majuscule';
    }
*/
    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = 'Le mot de passe doit contenir au moins un chiffre';
    }

    if ($password !== $passwordconfirm) {
        $errors[] = 'Les mots de passe ne sont pas identiques';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'L\'adresse email n\'est pas valide';
    }

    if (empty($date)) {
        $errors[] = "La date de naissance n'est pas correcte.";
    }

    if (empty($errors)) {
        // Enregistrement de l'utilisateur
       // open_connection_DB();
        $requete="INSERT INTO utilisateurs (pseudo_u, mot_de_passe, email, date_naiss) VALUES ('$username', '$password', '$email', '$date')";
        executeQuery($connexion,$requete);
    }
    else {
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Ultimate LIFKIYA</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="script/script.js"></script>
</head>

<body>

    <!--Ajout du menu de navigation -->
    <?php include('static/menu.php'); ?>
    
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Pseudonyme (entre 5 et 15 caractères) </label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe (Longueur minimal : 10 , au moins une majuscule et un chiffre)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="passwordconfirm">Confirmation du mot de passe</label>
            <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm">
        </div>
        <div class="form-group">
            <label for="email">Adresse email (gmail,hotmail,outlook)</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="date_naiss">Votre date de naissance</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
        <div><p>Déjà inscrit ? <a href="login.php">Connexion</a></p></div>
    </form>
    


</body>

</html>