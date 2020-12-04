<?php

require_once "connection.php";
require_once "validation.php";

$err_msg = "";

if(isset($_POST['nm']))
{
    //Input Data Validation

    if(empty_check($_POST)){
        $err_msg = "Enter data in all required fields";
        require 'views/signup_view.php';
    }
    else{

        $conn = connect_database();
        $qry = "SELECT COUNT(*) FROM USER WHERE EMAIL='{$_POST['uname']}'";
        $res = mysqli_query($conn,$qry);

        $res = mysqli_fetch_assoc($res);

        
        if(((int)$res['COUNT(*)'])>0){
            mysqli_close($conn);
            $err_msg = "User with given email already exist!";
            require 'views/signup_view.php';
        }
    }   
    
    if(empty($err_msg)){
        //Enter data to database
        
        $qry = "INSERT INTO USER VALUES (
            '{$_POST['nm']}',
            {$_POST['mob']},
            '{$_POST['add1']}',
            '{$_POST['add2']}',
            '{$_POST['add3']}',
            '{$_POST['state']}',
            {$_POST['pin']},
            '{$_POST['uname']}');";

        if(!mysqli_query($conn,$qry)){
            mysqli_close($conn);
            die("Data insertion failed : ".mysqli_error($conn));
        }

        $qry = "INSERT INTO LOGIN VALUES (
            '{$_POST['uname']}',
            '{$_POST['pwd']}');";

        if(!mysqli_query($conn,$qry)){
            mysqli_close($conn);
            die("Data insertion failed : ".mysqli_error($conn));
        }
        
        header("Location: /Code/login");
    }
}
else 
    require 'views/signup_view.php';

    

?>