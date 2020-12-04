<?php

require_once "connection.php";
require_once "validation.php";

session_start();

$updt_err="";

if(!loggedin_check($_SESSION)) {
    header("Location: /Code/login");
}
else{

    if(isset($_POST['mob']))      //AddItem
    {
        //Input Data Validation
        if(empty_check($_POST)){
            //If not all fields are filled
            $updt_err = "Enter data in all required fields";
        }
        if(empty($updt_err)) {

            $conn = connect_database();

            $qry = "UPDATE USER SET MOB={$_POST['mob']}, ADD1='{$_POST['add1']}',
                ADD2='{$_POST['add2']}', ADD3='{$_POST['add3']}', PIN={$_POST['pin']} 
                WHERE EMAIL = '{$_SESSION['uname']}';";

            $res = mysqli_query($conn, $qry);

            if(!$res){
                $updt_err = "Update Query Failed";
            }
            else{
                
                $qry = "UPDATE LOGIN SET PWD='{$_POST['pwd']}' 
                    WHERE EMAIL = '{$_SESSION['uname']}';";
                
                $res = mysqli_query($conn, $qry);
                
                if(!$res)
                    $updt_err = "Update Query Failed";
                else
                    $updt_err = "Profile Updated";
            }
            mysqli_close($conn);
        }

    }

    $conn = connect_database();

    $qry = "SELECT * FROM AD 
            WHERE ID IN (SELECT ID FROM SOLD WHERE BUYER = '{$_SESSION['uname']}');";

    $orders = mysqli_query($conn, $qry);

    if(mysqli_num_rows($orders)<1)
        $orders=null;

    $qry = "SELECT NAME, MOB, ADD1, ADD2, ADD3, STATE, PIN, EMAIL FROM USER 
        WHERE EMAIL = '{$_SESSION['uname']}';";

    $profile = mysqli_query($conn, $qry);

    if(mysqli_num_rows($profile)<1){
        $profile = null;  
    }
    else
        $profile = mysqli_fetch_assoc($profile);

    mysqli_close($conn);

    

    require 'views/profile_view.php';
}
    

?>