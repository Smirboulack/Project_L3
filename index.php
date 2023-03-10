<?php
/* Page principale dont le contenu s'adaptera dynamiquement*/
session_start(); // démarre ou reprend une session
/* Gestion de l'affichage des erreurs */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Inclusion des fichiers contenant : ...  */
require('includes/bdd.php'); /* ... la configuration de connexion à la base de données */
require('includes/includes.php'); /* ... les constantes et variables globales */
require('modeles/modele.php'); /* ... la définition du modèle */

/* Création de la connexion ( initiatilisation de la variable globale $connexion )*/
open_connection_DB();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/phaser/3.11.0/phaser.js"
    integrity="sha512-1zR767FhanvFF6k1xfgShu/iDacJuy4imuGSgBb6FUsKMWjAnJyxLAO0ixhCMWCDJKtHUqk/ggbJwpBKVwD7IA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script/scriptapp.js"></script>
  <?php 
$current_page = basename($_SERVER['PHP_SELF']);
if ($current_page === 'index.php?page=discussion') {
  echo '<link rel="stylesheet" href="css/chat.css">';
} else {
    echo '<link rel="stylesheet" href="css/style.css" />';
}
  ?>
</head>

<body>

  <!--Ajout du menu de navigation -->
  <?php include('static/menu.php'); ?>
  <main class="main_div">
    <?php
    /* Initialisation du contrôleur et le de vue par défaut */
    $controleur = 'accueil_controleur.php';
    $vue = 'accueil_vue.php';
    /* Affectation du controleur et de la vue souhaités */
    if (isset($_GET['page'])) {
      // récupération du paramètre 'page' dans l'URL
      $nomPage = $_GET['page'];
      // construction des noms de contrôleur et de vue
      $controleur = $nomPage . '_controleur.php';
      $vue = $nomPage . '_vue.php';
    }
    if (isset($_POST["déconnexion"]) || isset($_GET['logout'])) {
      header('Location: index.php');
      Update_user_status_disconnect($_SESSION["logged"], $connexion);
      unset($_COOKIE['pseudo']);
      setcookie('pseudo', '', time() - 10);
      unset($_SESSION["logged"]);
      session_unset();
      session_destroy();
    }
    if(isset($_GET['user_id'])){
      $vue = "discussion_vue.php";
      $controleur = "discussion_controleur.php";
  }
    /* Inclusion du contrôleur et de la vue courante */
    include('controleurs/' . $controleur);
    include('vues/' . $vue);
    ?>

  </main>

  <?php include('static/footer.php'); ?>
  <script src="script/scriptapp.js"></script>
  <script src="script/responsiv_control.js"></script>

</body>

</html>