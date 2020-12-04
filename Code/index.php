<?php

$img_dir = "images/uploads/";

$Routes = [
    '' => 'controllers/home.php',
    'index' => 'controllers/home.php',
    'index.php' => 'controllers/home.php',
    'home' => 'controllers/home.php',
    'login' => 'controllers/login.php',
    'signup' => 'controllers/signup.php',
    'about' => 'controllers/about.php',
    'logout' => 'controllers/logout.php',
    'seller' => 'controllers/seller.php',
    'product' => 'controllers/product.php',
    'delete' => 'controllers/delete.php',
    'profile' => 'controllers/profile.php',
    'purchase' => 'controllers/purchase.php',
    'selleritem' => 'controllers/selleritem.php',
    'addans' => 'controllers/addans.php'
];


$uri = trim($_SERVER["REQUEST_URI"],'/');

if(strstr($uri,"product")){
    $data = ltrim($uri,"product/");
    $uri = rtrim($uri,"/".$data);
}

if(strstr($uri,"delete")){
    $dltid = ltrim($uri,"delete/");
    $uri = rtrim($uri,"/".$dltid);
}

if(strstr($uri,"purchase")){
    $pur_id = ltrim($uri,"purchase/");
    $uri = rtrim($uri,"/".$pur_id);
}

if(strstr($uri,"selleritem")){
    $it_id = ltrim($uri,"selleritem/");
    $uri = rtrim($uri,"/".$it_id);
}

if(strstr($uri,"addans")){
    $q_id = ltrim($uri,"addans/");
    $uri = rtrim($uri,"/".$q_id);
}


require $Routes[$uri];

?>