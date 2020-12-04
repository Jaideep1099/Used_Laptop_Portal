<?php

require_once "connection.php";
require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else{

    if(isset($_POST['qstn'])) {
        if($_POST['qstn']!="") {
            
            $conn = connect_database();
            
            $qry = "INSERT INTO QUERIES (ID, QSTN, ANS) VALUES ($data,'{$_POST['qstn']}','NA');" ;

            $res = mysqli_query($conn, $qry);

            mysqli_close($conn);
        }
    }

    $conn = connect_database();

    $qry = "SELECT ID, DISP_NAME, BRAND, PROC, RAM, HDD, GFX, DISP, PRICE, SELLER_ID FROM USERVIEW 
            WHERE EMAIL='{$_SESSION['uname']}' AND ID={$data};" ;

    $res = mysqli_query($conn,$qry);
    $prod = mysqli_fetch_assoc($res);

    $qry = "SELECT * FROM QUERIES WHERE ID={$data};" ;
    $qstns = mysqli_query($conn,$qry);

    mysqli_close($conn);

    require "views/product_view.php";
}

?>