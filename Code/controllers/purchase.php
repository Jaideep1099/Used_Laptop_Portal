<?php

require_once "connection.php";
require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else{

    $conn = connect_database();

    $qry = "UPDATE AD SET SOLD=1 WHERE ID={$pur_id};" ;

    $res = mysqli_query($conn,$qry);

    $qry = "INSERT INTO SOLD VALUES ($pur_id, '{$_SESSION['uname']}');" ;

    $res = mysqli_query($conn,$qry);

    $prod = mysqli_fetch_assoc($res);

    mysqli_close($conn);

    header("Location: /profile");
    echo "Purchase Successful";
}

?>