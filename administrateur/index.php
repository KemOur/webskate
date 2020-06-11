
<?php

session_start();

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
