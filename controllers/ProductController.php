<?php

require_once 'models/ShowCategoryModel.php';
require_once 'models/Products.php';
$categorys = getCategorys();

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
