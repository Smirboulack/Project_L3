<?php
/* Page principale dont le contenu s'adaptera dynamiquement*/
session_start();                      // démarre ou reprend une session
/* Gestion de l'affichage des erreurs */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Inclusion des fichiers contenant : ...  */
require('includes/bdd.php');  /* ... la configuration de connexion à la base de données */
require('includes/includes.php');   /* ... les constantes et variables globales */
require('modeles/modele.php');  /* ... la définition du modèle */

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

  <h2>Jeu de Dames</h2>
  <table id="tab_jeux">
  <tr>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
  </tr>
  <tr>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
    <td class="white"></td>
  </tr>
  <tr>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/rouge.png" /></td>
  </tr>
  <tr>
    <td class="black"></td>
    <td class="white"></td>
    <td class="black"></td>
    <td class="white"></td>
    <td class="black"></td>
    <td class="white"></td>
    <td class="black"></td>
    <td class="white"></td>
  </tr>
  <tr>
    <td class="white"></td>
    <td class="black"></td>
    <td class="white"></td>
    <td class="black"></td>
    <td class="white"></td>
    <td class="black"></td>
    <td class="white"></td>
    <td class="black"></td>
  </tr>
  <tr>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
    <td class="white"></td>
  </tr>
  <tr>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
  </tr>
  <tr>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
    <td class="white"></td>
    <td class="black"><img class="img_dames" src="images/bleu.png" /></td>
    <td class="white"></td>
  </tr>
</table>



</body>

</html>