<?php

if(isset($_SESSION['logged'])) {
    
    echo '<script src="script/users.js"></script>';
    echo '<link rel="stylesheet" href="css/chat.css">';

    $_SESSION["acces_chat"] = "ok";
    $_SESSION["userid"] = getUser_ID($_SESSION['logged'], $connexion);
    $outgoing_id = $_SESSION['userid'];
    $sql = "SELECT * FROM utilisateurs3 WHERE NOT id_u = $outgoing_id ORDER BY id_u DESC";
    $query = executeQuery($connexion, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "modeles/data.php";
        
    }
   
}else {
    header('Location: index.php?page=connexion&acceptchat=no');
    
}





?>