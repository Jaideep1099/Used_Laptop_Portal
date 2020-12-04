<?php

require_once "connection.php";
require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /Code/login");
}
else{

    $conn = connect_database();

    $qry = "SELECT * FROM AD 
            WHERE SELLER_ID='{$_SESSION['uname']}' AND ID={$it_id};" ;

    $res = mysqli_query($conn,$qry);
    $prod = mysqli_fetch_assoc($res);

    $qry = "SELECT * FROM QUERIES WHERE ID={$it_id} AND ANS='NA';" ;
    $qstns = mysqli_query($conn,$qry);

    mysqli_close($conn);

    require "views/selleritem_view.php";
}

?>