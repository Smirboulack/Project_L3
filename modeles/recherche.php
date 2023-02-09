<?php
    $outgoing_id = $_SESSION['userid'];
    $searchTerm = mysqli_real_escape_string($connexion, $_POST['searchTerm']);

    $sql = "SELECT * FROM utilisateurs3 WHERE NOT id_u = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($connexion, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>