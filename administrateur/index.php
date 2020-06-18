
<?php

session_start();
var_dump($_SESSION);

if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] == 0){
    header('Location: http://localhost/webskate/index.php?page=home&action=home');
    exit;
}

// ne pas oublier de vérifier si l'utilisateur est connecté et qu'il est admin
//sinon le renvoyer vers la page d'accueil du site

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
