<link href="assets/css/styles.css" rel="stylesheet">

<?php

session_start();
var_dump($_SESSION);
require ('helpers.php');



if(isset($_GET['controller'])):
    switch ($_GET['controller']):
        case 'home' :
            require 'controllers/HomeController.php';
            break;

        case 'login' :
            require 'controllers/LoginController.php';
            break;

        case 'register' :
            require 'controllers/RegisterController.php';
            break;

            case 'products' :
            require 'controllers/ProductsController.php';
            break;

        default :
            require 'controllers/indexController.php';
    endswitch;
else:
    require 'controllers/indexController.php';
endif;


if(isset($_GET['action'])){
    if($_GET['action'] == 'logout'){
        //destroy the session
        session_destroy();
        //unset($_SESSION['user']);
        //redirect the user to a default web page using header
        header("Location:index.php?controller=home&action=home");
    }
}
