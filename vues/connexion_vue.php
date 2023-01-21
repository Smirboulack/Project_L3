<form id="form_insc" action="index.php?page=connexion" method="POST">
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
            <p>Mot de passe oublié ? <a href="index.php?page=reinitialisation">Réinitialiser votre mot de passe</a></p>
            <p>Créer un compte ? <a href="index.php?page=inscription">inscription</a></p>
        </div>
</form>