<form id="form_insc" action="index.php?page=reinitialisation" method="POST">
    <div class="form-group">
        <label for="email">Adresse email du compte existant </label>
        <input type="text" class="form-control" id="email" name="email" placeholder="(gmail,hotmail,outlook)">
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
    <button type="submit" class="btn btn-primary" name="reinit">Modifier</button>
</form>