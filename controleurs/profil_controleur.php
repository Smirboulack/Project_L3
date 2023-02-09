
<?php
$pseudo = $_COOKIE['pseudo'];

$reqScore = "SELECT score from utilisateurs3 WHERE pseudo_u = '$pseudo'";
$resScore = executeQuery($connexion, $reqScore);
$Score = mysqli_fetch_assoc($resScore);


$reqImg = "SELECT img from utilisateurs3 WHERE pseudo_u = '$pseudo'";
$resIm = executeQuery($connexion, $reqImg);
$lien = mysqli_fetch_assoc($resIm);


$reqCl = "SELECT pseudo_u, img, score from utilisateurs3 ORDER BY score DESC;";
$resCl = executeQuery($connexion, $reqCl);
$Cl = mysqli_fetch_all($resCl, MYSQLI_ASSOC);
?>