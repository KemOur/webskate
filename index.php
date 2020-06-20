<link href="assets/css/styles.css" rel="stylesheet">

<?php

session_start();
//var_dump($_SESSION);
require ('helpers.php');

if(isset($_GET['action'])){
    if($_GET['action'] == 'logout'){
        //session_destroy();
        unset($_SESSION['user']);
        header("Location:index.php?page=products&action=all");
    }
}
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

if(isset($_GET['page'])):
    switch ($_GET['page']):

            case 'login' :
            require 'controllers/LoginController.php';
            break;

            case 'register' :
            require 'controllers/RegisterController.php';
            break;

        case 'order':
        case 'cart' :
            require 'controllers/CartController.php';
            break;

        case 'products' :
            require 'controllers/ProductsController.php';
            break;

            case 'product' :
            require 'controllers/ProductController.php';
            break;
        default :
            require 'controllers/indexController.php';
    endswitch;
else:
    require 'controllers/indexController.php';
endif;


