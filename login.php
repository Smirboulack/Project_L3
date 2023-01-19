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
    
    <form action="inscription.php" method="post">
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
            <label for="email">Votre date de naissance</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <div><p>Déjà inscrit ? <a href="login.php">Connexion</a></p></div>
    </form>
    


</body>

</html>