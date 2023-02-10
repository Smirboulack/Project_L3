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

    if (isset($_FILES['image'])) {
        $img_name = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];
        if (in_array($img_ext, $extensions) === true) {
            $types = ["image/jpeg", "image/jpg", "image/png, image/jfif"];
            if (in_array($img_type, $types) === true) {
                $new_img_name = $time . $img_name;
                if (!move_uploaded_file($tmp_name, "images/" . $username)) {
                    $errors[] = "Veuillez charger une image de type - jpeg, png, jpg 1";
                }
            }
        } else {
          //  $errors[] = "Veuillez charger une image de type - jpeg, png, jpg 2";
          //$new_img_name = "Default_user.png";
        }
    }

    if (empty($errors)) {
        // Enregistrement de l'utilisateur
        // open_connection_DB();
        $password = md5($password);
        $time = time();
        $id_u = rand(time(), 100000000);
        $status = "Active now";
        $requete = "INSERT INTO utilisateurs3 (id_u,pseudo_u, mot_de_passe, email, date_naiss,img,status,score) 
        VALUES ('$id_u','$username', '$password', '$email', '$date','$new_img_name','$status',0)";
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