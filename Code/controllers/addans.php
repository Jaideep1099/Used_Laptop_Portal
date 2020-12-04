<?php

require_once "connection.php";
require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else{

    if(isset($_POST['ans'])){
        $conn = connect_database();

        $qry = "UPDATE QUERIES SET ANS = '{$_POST['ans']}' 
            WHERE QID={$q_id};" ;

        $res = mysqli_query($conn,$qry);

        $qry = "SELECT ID FROM QUERIES WHERE QID={$q_id};" ;

        $res = mysqli_query($conn,$qry);

        $res = mysqli_fetch_assoc($res);

        $it_id = $res['ID'];

        mysqli_close($conn);
    }
    header("Location: /selleritem/{$it_id}");
}

?>