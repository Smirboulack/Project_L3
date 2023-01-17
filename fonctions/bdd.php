<?php
// Adresse de la base de données
$host = '127.0.0.1'; 
// Utilisateur de la base de données
$user = 'root'; 
// Mot de passe de la base de données
$pass = ''; 
// Nom de la base de données
$db = 'coranfull'; 
// Connexion à la base de données
$conn = new mysqli($host, $user, $pass, $db);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*Cette fonction prend en entrée l'identifiant de la machine hôte de la base de données, les identifiants (login, mot de passe) d'un utilisateur autorisé 
sur la base de données contenant les tables pour le chat et renvoie une connexion active sur cette base de donnée. Sinon, un message d'erreur est affiché.*/
function getConnection($dbHost, $dbUser, $dbPwd, $dbName)
{
	$link = mysqli_connect($dbHost, $dbUser, $dbPwd, $dbName);
	if (!$link) {
		echo "Echec lors de la connexion a la base de donnees : (" . mysqli_connect_errno() . ") " . mysqli_connect_error();
	}
	return $link;
}

?>