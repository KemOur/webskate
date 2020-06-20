<?php
require('models/Register.php');
require_once 'models/ShowCategoryModel.php';

if($_GET['action'] == 'register'){
    $users = getAllUsers();
    $categorys = getCategorys();
    require('views/registerForm.php');
}

elseif($_GET['action'] == 'addUser'){

    if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['password'])){

        if(empty($_POST['nom']) ){
            $_SESSION['messages'][] = 'Nom est obligatoire!';
        }
        if(empty($_POST['prenom']) ){
            $_SESSION['messages'][] = 'prenom obligatoire!';
        }
        if(empty($_POST['email'])){
            $_SESSION['messages'][] = 'email obligatoire!';
        }
        if(empty($_POST['password'])){
            $_SESSION['messages'][] = 'password obligatoire!';
        }
        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=register&action=register');
        exit;
    }
    else{
        $resultAdd = addUser ($_POST);

        if ($resultAdd){
            $_SESSION['messages'][] = ' Votre compte a été créé avec succès, veuillez vous connecter!';
            header('Location:index.php?page=login&action=login');
            exit;
        }else{
            $_SESSION['messages'][] = 'Erreur lors de l\'inscription, veuillez réessayer ultérieurement. :(';
            header('Location:index.php?page=register&action=register');
            exit;
        }
    }
}

