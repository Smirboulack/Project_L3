<form id="form_insc" action="index.php?page=inscription" method="POST">
    <div class="form-group">
        <label for="username">Pseudonyme </label>
        <input type="text" class="form-control" id="username" name="username" placeholder="(entre 5 et 15 caractères)">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password"
            placeholder="(Longueur minimal : 10 , au moins une majuscule et un chiffre)">
    </div>
    <div class="form-group">
        <label for="passwordconfirm">Confirmation du mot de passe</label>
        <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm">
    </div>
    <div class="form-group">
        <label for="email">Adresse email </label>
        <input type="text" class="form-control" id="email" name="email" placeholder="(gmail,hotmail,outlook)">
    </div>
    <div class="form-group">
        <label for="date_naiss">Votre date de naissance</label>
        <input type="date" class="form-control" id="date" name="date">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
    <div>
        <a href="index.php?page=connexion">Déjà inscrit ? Connexion</a>
    </div>
</form>