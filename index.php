<?php 
session_start();
require_once 'fonctions/bdd.php';

$query="select VersetFr from coran";
$resultat=executeQuery($link,$query);


/*
if (mysqli_num_rows($resultat) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($resultat)) {
      echo "le verset: " . $row["VersetFr"]. "<br>";
  }
} else {
  echo "0 resultats";
}
*/

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Ultimate LIFKIYA</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="script.js"></script>
  </head>
  <body>
    <h1>Jeu de stratégie en ligne</h1>
    <p>Bienvenue</p>
        <!--Ajout de la barre de navigation -->
        <nav>
            <ul>
              <li><a href="index.php">Accueil</a></li>
              <li><a href="about.php">Qui sommes-nous</a></li>
              <li><a href="regles.php">Comment jouer ?</a></li>
              <li><a href="legal.php">Mentions légales</a></li>
              <li><a href="login.php">Inscription</a></li>
              <li><a href="login.php">Connexion</a></li>
              <li><a href="http://cazabetremy.fr/wiki/doku.php?id=projet:presentation#enseignants">Page web de l'UE</a></li>
            </ul>
          </nav>
          <div class="frame">
            <p>Contenu du cadre</p>
          </div>
  </body>
</html>