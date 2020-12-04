<?php

require_once "connection.php";
require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else{

    $conn = connect_database();

    $qry = "DELETE FROM AD WHERE ID={$dltid};" ;

    $res = mysqli_query($conn,$qry);

    if(!$res) {
        $dlt_err = "Delete ad failed! ";
    }

    unlink($img_dir.$dltid.".jpg");

    mysqli_close($conn);
    
    header("Location: /seller");
}

?>