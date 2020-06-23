<?php
require('models/User.php');
require('models/Product.php');
require('models/Category.php');


if ($_GET['action'] == 'list') {
    $users = getAllUsers();
    require('views/userList.php');
}
elseif($_GET['action'] == 'new'){
    $users=getAllUsers();
    require('views/userForm.php');
}
elseif($_GET['action'] == 'addUser'){

    if(empty($_POST['nom'])
        || empty($_POST['prenom'])
        || empty($_POST['email'])
        || empty($_POST['password'])){


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
        header('Location:index.php?controller=users&action=new');
        exit;
    }
    else{
        $resultAdd = addUser($_POST);

        $_SESSION['messages'][] = $resultAdd ? 'Utilisateur ajouté avec succés!' : "Erreur lors de l'ajout de nouvel utilisateur.. :(";
        header('Location:index.php?controller=users&action=list');
        exit;
    }
}

//function delete
elseif($_GET['action'] == 'delUser'){
    $result = delUser(   $_GET['id']    );
    if($result){
        $_SESSION['messages'][] = 'L\'utilisateur selectionné à été supprimé !';
    }
    else{
        $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
    }
    header('Location:index.php?controller=users&action=list');
    exit;
}


elseif($_GET['action'] == 'editUser'){

    if(!empty($_POST)){
        if(empty($_POST['nom'])
            || empty($_POST['prenom'])
            || empty($_POST['email'])
            || empty($_POST['password'])){

            $result = editUser($_GET['id'], $_POST);

            if(empty($_POST['nom']) ){
                $_SESSION['messages'][] = 'champs Nom obligatoire !';
            }
            if(empty($_POST['prenom']) ){
                $_SESSION['messages'][] = 'champs Prénom obligatoire !';
            }
            if(empty($_POST['email'])){
                $_SESSION['messages'][] = 'Email obligatoire !';
            }
            if(empty($_POST['password'])){
                $_SESSION['messages'][] = 'Password obligatoire !';
            }
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=users&action=editUser&id='.$_GET['id']);

        }

        else{

            $result = editUser($_GET['id'], $_POST);
        if($result){
            $_SESSION['messages'][] = 'User mis à jour !';
        }
        else{
            $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
        }
        header('Location:index.php?controller=users&action=list');
        exit;
    }
    }
    else{
        if (!isset($_SESSION['old_inputs'])){
            $user = getUser($_GET['id']);

        }
        $users = getAllUsers();
        require('views/userForm.php');
    }
}

