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
<html>

<head>
  <title>Ultimate LIFKIYA</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="script/scriptapp.js"></script>
</head>

<body>
  <!--Ajout du menu de navigation -->
  <?php include('static/menu.php'); ?>
  <?php if(isset($_SESSION["logged"])) { 
    $username = $_SESSION["logged"];
    echo 'Vous êtes maintenant connecté en tant que :'. $username . ' depuis : '.'<li id="connex_ok"> '.'<script type="text/javascript">temps_de_connexion();</script>' . '</li>';
  }
  ?>
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
    if(isset($_POST["déconnexion"])){
      unset($_SESSION["logged"]);
      session_unset();
      session_destroy();
      header('Location: index.php');
    }
    /* Inclusion du contrôleur et de la vue courante */
    include('controleurs/' . $controleur);
    include('vues/' . $vue);

    ?>
  </main>
</body>
<script type="text/javascript" src="script/scriptapp.js"></script>

</html>