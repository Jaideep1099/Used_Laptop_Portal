<?php

require_once "connection.php";

//Deleting session information

session_start();
$conn = connect_database();
$qry = "DELETE FROM SESSION_USERS WHERE EMAIL='{$_SESSION['uname']}'; ";           
$res = mysqli_query($conn, $qry);
mysqli_close($conn);

session_unset();

session_destroy();

header("Location: /login");

?>