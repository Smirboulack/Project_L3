<?php
echo '<script src="script/script_jeu.js"></script>';

if (isset($_POST["links"])){
    $valeur_jeu = $_POST["links"];
   // echo $valeur_jeu;
    echo '<h2 id="titre_jeu">'. $valeur_jeu.'</h2>' ;
    echo '<script>'. "redirect('$valeur_jeu')".'</script>';
/*
    echo "<script>";
  echo "redirect('$valeur_jeu');";
  echo "</script>"; */

}

?>