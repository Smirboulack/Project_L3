<?php
echo '<script src="javascript/users.js"></script>';
echo '<link rel="stylesheet" href="css/chat.css">';

if (!isset($_SESSION['logged'])) {
    header('Location: index.php?page=connexion');
}else{
    $_SESSION["acces_chat"] = "ok";
    $_SESSION["userid"] = getUser_ID($_COOKIE['pseudo'], $connexion);
}


?>