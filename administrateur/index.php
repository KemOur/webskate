
<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] == 0){
    header('Location:../index.php');
    exit;
}

require ('../helpers.php');

if(isset($_GET['controller'])){
    switch ($_GET['controller']){
        case 'products' :
            require 'controllers/productController.php';
            break;

            case 'categorys' :
            require 'controllers/categoryController.php';
            break;

            case 'users' :
            require 'controllers/userController.php';
            break;

            case 'infos' :
            require 'controllers/infoController.php';
            break;

            case 'images' :
            require 'controllers/imageController.php';
            break;

            case 'orders' :
            require 'controllers/orderController.php';
            break;

        default :
            require 'controllers/indexController.php';
    }
}
else{
    require 'controllers/indexController.php';
}

if(isset($_SESSION['messages'])){
    unset($_SESSION['messages']);
}
if(isset($_SESSION['old_inputs'])){
    unset($_SESSION['old_inputs']);
}
