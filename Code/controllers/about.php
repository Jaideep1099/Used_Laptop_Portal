<?php

require_once "validation.php";

session_start();

if(!loggedin_check($_SESSION)) {
    header("Location: /login");
}
else
    require 'views/about_view.php';

?>

