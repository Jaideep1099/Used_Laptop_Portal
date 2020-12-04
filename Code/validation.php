<?php

require_once "connection.php";

function empty_check($post){
    foreach ($post as $key=>$val) {
        if(empty($_POST[$key])){
            return true;
        }
    }
    return false;
}

function loggedin_check($session) {         //Check user is logged in
    if(!isset($session['uname']))
        return false;
    else {

        $conn = connect_database();
        $qry = "SELECT * FROM SESSION_USERS WHERE EMAIL='{$session['uname']}'; ";           
        $res = mysqli_query($conn, $qry);
        mysqli_close($conn);
        
        if(mysqli_num_rows($res)==1)
            return true;
        else
        {                           //Session variable is set and there is no entry in database
            session_unset();        //So destroy session
            session_destroy();
            return false;
        }
            
    }

}

?>