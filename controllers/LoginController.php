<?php
require('models/Login.php');
require_once 'models/ShowCategoryModel.php';


if($_GET['action'] == 'login'){
    $categorys = getCategorys();
    require('views/login.php');

}

elseif($_GET['action'] == 'coUser'){

    if( empty($_POST['email']) || empty($_POST['password'])){

        if(empty($_POST['email'])){
            $_SESSION['messages'][] = 'email obligatoire!';
        }
        if(empty($_POST['password'])){
            $_SESSION['messages'][] = 'password obligatoire!';
        }

        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=home&action=home');
        exit;
    }
    else{
        $resultAdd = coUser ($_POST['user']);

        if($resultAdd){
            header('Location:index.php');
            exit;;
        }else{
            $_SESSION['messages'][] = "Mot de passe ou adresse email incorrect! :(";

            header('Location:index.php?page=login&action=login');
            exit;
        }


    }

}
