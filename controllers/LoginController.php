<?php
require('models/Login.php');

//My function to add a new User
if($_GET['action'] == 'login'){
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
       // $_SESSION['user'] = $_POST;  /* Méthode a tester !!!*/
        header('Location:index.php?controller=home&action=home');
        exit;
    }
    else{
        $resultAdd = coUser ($_POST['user']);

        if($resultAdd){
            $_SESSION['messages'][] = ' Connecté !';

            header('Location:index.php?controller=home&action=home');
            exit;;
        }else{
            $_SESSION['messages'][] = "Mot de passe ou adresse email incorrect! :(";

            header('Location:index.php?controller=login&action=login');
            exit;
        }


    }

}
