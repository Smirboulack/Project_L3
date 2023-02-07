<?php

if (!isset($_SESSION['logged'])) {
    header('Location: index.php?page=connexion');
}else{
    
echo '<script src="script/users.js"></script>';
echo '<link rel="stylesheet" href="css/chat.css">';
    $_SESSION["acces_chat"] = "ok";
    $_SESSION["userid"] = getUser_ID($_SESSION['logged'], $connexion);
}


?>