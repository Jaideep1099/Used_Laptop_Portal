<?php

$img_dir = "images/uploads/";

$Routes = [
    'Code' => 'controllers/home.php',
    'Code/index' => 'controllers/home.php',
    'Code/index.php' => 'controllers/home.php',
    'Code/home' => 'controllers/home.php',
    'Code/login' => 'controllers/login.php',
    'Code/signup' => 'controllers/signup.php',
    'Code/about' => 'controllers/about.php',
    'Code/logout' => 'controllers/logout.php',
    'Code/seller' => 'controllers/seller.php',
    'Code/product' => 'controllers/product.php',
    'Code/delete' => 'controllers/delete.php',
    'Code/profile' => 'controllers/profile.php',
    'Code/purchase' => 'controllers/purchase.php',
    'Code/selleritem' => 'controllers/selleritem.php',
    'Code/addans' => 'controllers/addans.php'
];


$uri = trim($_SERVER["REQUEST_URI"],'/');

if(strstr($uri,"Code/product")){
    $data = ltrim($uri,"Code/product/");
    $uri = rtrim($uri,"/".$data);
}

if(strstr($uri,"Code/delete")){
    $dltid = ltrim($uri,"Code/delete/");
    $uri = rtrim($uri,"/".$dltid);
}

if(strstr($uri,"Code/purchase")){
    $pur_id = ltrim($uri,"Code/purchase/");
    $uri = rtrim($uri,"/".$pur_id);
}

if(strstr($uri,"Code/selleritem")){
    $it_id = ltrim($uri,"Code/selleritem/");
    $uri = rtrim($uri,"/".$it_id);
}

if(strstr($uri,"Code/addans")){
    $q_id = ltrim($uri,"Code/addans/");
    $uri = rtrim($uri,"/".$q_id);
}


require $Routes[$uri];

?>