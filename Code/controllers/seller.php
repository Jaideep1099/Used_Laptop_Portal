<?php

require_once "connection.php";
require_once "validation.php";

session_start();

$add_err="";

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else{

    if(isset($_POST['disp_name']))      //AddItem
    {
        //Input Data Validation
        if(empty_check($_POST)){
            //If not all fields are filled
            $add_err = "Enter data in all required fields";
        }
        else if(empty($_FILES['image']['name'])){
            //If no image is selected
            $add_err = "Select an image to upload";
        }
        else if(!getimagesize($_FILES['image']['tmp_name'])){
            //If file is not image
            $add_err = "File uploaded is not an image";
        }
        else if($_FILES['image']['size'] > 2000000){
            //If file is not image
            $add_err = "File size is too large";
        } else if(
            strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION)) != "jpg") 
        {
            //If image is not in required format
            $add_err = "Please upload a jpg file";
        }
        if(empty($add_err)){
            //Enter data to database
            $conn = connect_database();

            $qry = "INSERT INTO AD (SELLER_ID, DISP_NAME, BRAND, PROC, RAM, HDD, GFX, DISP, PRICE) 
                VALUES ('{$_SESSION['uname']}','{$_POST['disp_name']}','{$_POST['brand']}','{$_POST['proc']}',
                '{$_POST['ram']}','{$_POST['hdd']}','{$_POST['gfx']}','{$_POST['disp']}',{$_POST['price']} );";
            
            $res = mysqli_query($conn, $qry);
            if(!$res){
                $add_err="Add advertisement query failed!";
            }

            $qry = "SELECT ID FROM AD WHERE 
                SELLER_ID='{$_SESSION['uname']}' AND DISP_NAME='{$_POST['disp_name']}' AND PRICE={$_POST['price']};" ; 
            
            $res = mysqli_query($conn, $qry);
            $res = mysqli_fetch_assoc($res);
            $ad_id = $res['ID'];

            mysqli_close($conn);
        }
        if(empty($add_err)) { //Fileupload handle

            $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));

            $target_file = $img_dir.$ad_id.".".$imageFileType;

            if(!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
                $add_err = "There was an error uploading image";
            }
        }
    }

    $conn = connect_database();

    $qry = "SELECT BRAND FROM BRANDS";

    $brands = mysqli_query($conn, $qry);


    $qry = "SELECT * FROM AD 
            WHERE SELLER_ID = '{$_SESSION['uname']}' AND SOLD=0 ;";

    $ads = mysqli_query($conn, $qry);

    $qry = "SELECT * FROM SALES 
            WHERE SELLER_ID ='{$_SESSION['uname']}' ;";

    $sold = mysqli_query($conn, $qry);

    mysqli_close($conn);

    if(mysqli_num_rows($ads)<1)
        $ads=null;

    if(mysqli_num_rows($sold)<1)
        $sold=null;

    require 'views/seller_view.php';
}
    

?>