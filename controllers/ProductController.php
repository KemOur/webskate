<?php

require_once 'models/CategoryFront.php';
require_once 'models/Products.php';
require_once 'models/Information.php';

$categorys = getCategorys();
$infos = getInformations();


$selectedProduct = false;

if(isset($_GET['product_id']) ){

    if(!ctype_digit($_GET['product_id'])) {
        header('Location:index.php');
        exit;
    }

    $selectedProduct = getProduct($_GET['product_id']);
}

if($selectedProduct == false ){
    header('Location:index.php');
    exit;
}
include 'views/product_detail.php';
