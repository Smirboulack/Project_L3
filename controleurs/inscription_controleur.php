<?php

if (isset($_POST["submit"])) {

    $username = $_POST['username'];
    $password = ($_POST['password']);
    $passwordconfirm = ($_POST['passwordconfirm']);
    $email = $_POST['email'];
    $date = $_POST['date'];
    $mail_autoriser = array('outlook.com', 'gmail.com', 'hotmail.com', 'hotmail.fr', 'outlook.fr');
    $domain = strtolower(substr($email, strrpos($email, '@') + 1));
    $connexion = mysqli_connect(SERVEUR, UTILISATEUR, MOTDEPASSE, BDD);
    

    if (empty($username) || empty($password) || empty($passwordconfirm) || empty($email) || empty($date)) {
        $errors[] = 'Tous les champs doivent être remplis';
    }

    if (strlen($username) < 5 || strlen($username) > 15) {
        $errors[] = 'Le pseudonyme doit être compris entre 5 et 15 caractères';
    }

    if (checkAvailability($username, $connexion) == 0) {
        $errors[] = 'Le pseudonyme est déjà utilisee';
    }

    if (checkAvailability_email($email, $connexion) == 0) {
        $errors[] = "L'email est déjà utilisee";
    }

    if (!in_array($domain, $mail_autoriser)) {
        $errors[] = 'L\'adresse email n\'est pas valide';
    }

    if (strlen($password) < 10) {
        $errors[] = 'Le mot de passe doit contenir au moins 10 caractères';
    }

    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = 'Le mot de passe doit contenir au moins une majuscule';
    }

    if (checkUpperCase($password) == 0) {
        $errors[] = 'Le mot de passe doit contenir au moins une majuscule';
    }

    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = 'Le mot de passe doit contenir au moins un chiffre';
    }
    
    if ($password !== $passwordconfirm) {
        $errors[] = 'Les mots de passe ne sont pas identiques';
    }

    if (empty($date)) {
        $errors[] = "La date de naissance n'est pas correcte.";
    }

    if (empty($errors)) {
        // Enregistrement de l'utilisateur
        // open_connection_DB();
        $password = md5($password);
        $requete = "INSERT INTO utilisateurs (pseudo_u, mot_de_passe, email, date_naiss) VALUES ('$username', '$password', '$email', '$date')";
        executeQuery($connexion, $requete);
        echo '<script type="text/javascript">etape_suivconnex();</script>';
    } else {
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    }

}
?>