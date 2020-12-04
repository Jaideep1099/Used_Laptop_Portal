<?php

require_once 'connection.php';
require_once 'validation.php';

$err_msg = "";

if(isset($_POST['uname'])) {

    //Input Data Validation

    if(empty_check($_POST)){
        $err_msg = "Enter Email and Password!";
        require 'views/login_view.php';
    }
    else{

        $conn = connect_database();
        $qry = "SELECT EMAIL FROM LOGIN WHERE 
            EMAIL='{$_POST['uname']}' AND PWD='{$_POST['pwd']}';";

        $res = mysqli_query($conn, $qry);

        $res = mysqli_fetch_assoc($res);

        mysqli_close($conn);

        if($res)
        {                           //Login Successful. Setting up session
            session_start();
            $_SESSION['uname'] = $res['EMAIL'];

            $conn = connect_database();
            $qry = "INSERT INTO SESSION_USERS SELECT '{$res['EMAIL']}' 
                    WHERE NOT EXISTS (SELECT * FROM SESSION_USERS WHERE EMAIL='{$res['EMAIL']}'); ";
            
            $res = mysqli_query($conn, $qry);

            mysqli_close($conn);

            header("Location: /Code/home");
        }
        else {
            $err_msg = "Invalid Login!";
            require 'views/login_view.php';
        }

    }
}
else
    require 'views/login_view.php';

?>