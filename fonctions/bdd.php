<?php
$host = "mylifkiya.cdkuki8rk3zz.eu-west-3.rds.amazonaws.com";
$user = "lifkiya";
$pass = "Azerty69";
$db = "lifkiyasgbd";

// Connexion à la base de données
$link = mysqli_connect($host, $user, $pass, $db) or die("Impossible de se connecter à la base de données");

/*Cette fonction prend en entrée une connexion vers la base de données du chat ainsi 
qu'une requête SQL SELECT et renvoie les résultats de la requête. Si le résultat est faux, un message d'erreur est affiché*/
function executeQuery($link, $query)
{
	$result = mysqli_query($link, $query);
	if(!$result){
		echo "La requete ".$query." n'a pas pu etre executee a cause d'une erreur de syntaxe";
	}
	return $result;
}

?>

