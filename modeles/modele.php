<?php
////////////////////////////////////////////////////////////////////////
///////    Gestion de la connxeion   ///////////////////////////////////
////////////////////////////////////////////////////////////////////////

use LDAP\Result;

/**
* Initialise la connexion à la base de données courante (spécifiée selon constante globale SERVEUR, UTILISATEUR, MOTDEPASSE, BDD)
*/
function open_connection_DB()
{
	global $connexion;

	$connexion = mysqli_connect(SERVEUR, UTILISATEUR, MOTDEPASSE, BDD);
	if (mysqli_connect_errno()) {
		printf("Échec de la connexion : %s\n", mysqli_connect_error());
		exit();
	}
}

/**
 *  	Ferme la connexion courante
 * */
function close_connection_DB()
{
	global $connexion;
	mysqli_close($connexion);
}

function executeQuery($link, $query)
{
	$result = mysqli_query($link, $query);
	if (!$result) {
		echo "La requete " . $query . " n'a pas pu etre executee a cause d'une erreur de syntaxe";
	}
	return $result;
}

function convertir_type($code)
{
	switch ($code) {
		case 1:
			return 'BOOL/TINYINT';
		case 2:
			return 'SMALLINT';
		case 3:
			return 'INTEGER';
		case 4:
			return 'FLOAT';
		case 5:
			return 'DOUBLE';
		case 7:
			return 'TIMESTAMP';
		case 8:
			return 'BIGINT/SERIAL';
		case 9:
			return 'MEDIUMINT';
		case 10:
			return 'DATE';
		case 11:
			return 'TIME';
		case 12:
			return 'DATETIME';
		case 13:
			return 'YEAR';
		case 16:
			return 'BIT';
		case 246:
			return 'DECIMAL/NUMERIC/FIXED';
		case 252:
			return 'BLOB/TEXT';
		case 253:
			return 'VARCHAR/VARBINARY';
		case 254:
			return 'CHAR/SET/ENUM/BINARY';
		default:
			return '?';
	}

}

function checkAvailability($pseudo, $link)
{
	$query = "SELECT pseudo_u FROM utilisateurs WHERE pseudo_u = '" . $pseudo . "';";
	$result = executeQuery($link, $query);
	return mysqli_num_rows($result) == 0;
}

function checkAvailability_email($email, $link)
{
	$query = "SELECT email FROM utilisateurs WHERE email = '" . $email . "';";
	$result = executeQuery($link, $query);
	return mysqli_num_rows($result) == 0;
}

function getUser_ID($pseudo, $link)
{
	$user_id = null;
	$query = "SELECT id_u FROM utilisateurs3 WHERE pseudo_u = '" . $pseudo . "';";
	$result = executeQuery($link, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$user_id = $row["id_u"];
	}
	return $user_id;
}


function checkUpperCase($str)
{
	for ($i = 0; $i < strlen($str); $i++) {
		if (ctype_upper($str[$i])) {
			return true;
		}
	}
	return false;
}



?>