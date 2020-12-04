<?php

require_once "connection.php";
require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /Code/login");
}
else{

    $conn = connect_database();

    $qry = "SELECT ID, DISP_NAME, RAM, HDD, PRICE FROM USERVIEW 
            WHERE EMAIL='{$_SESSION['uname']}';" ;

    $res = mysqli_query($conn,$qry);

    if(mysqli_num_rows($res)<1)
        $res = null;
    
    //var_dump($res);

    mysqli_close($conn);
    
    require 'views/home_view.php';
}

?>