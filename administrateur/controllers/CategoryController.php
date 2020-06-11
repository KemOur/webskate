<?php

require('models/Product.php');
require('models/Category.php');
require('models/Image.php');


if ($_GET['action'] == 'list') {
    $categorys = getAllCategorys();
    require('views/categoryList.php');
}
//My function to add a new category
elseif($_GET['action'] == 'new'){
    $categorys=getAllCategorys();
    require('views/categoryForm.php');
}
elseif($_GET['action'] == 'addCategory'){

    if(empty($_POST['name']) || empty($_POST['description'])){

        if(empty($_POST['name']) ){
            $_SESSION['messages'][] = 'Veuillez entrer le nom de la catégorie !';
        }
         if(empty($_POST['description'])){
            $_SESSION['messages'][] = 'Veuillez décrire votre nouvelle catégorie !';
        }
        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=categorys&action=new');
        exit;
    }
    else{
        $resultAdd = addCategory($_POST);

        $_SESSION['messages'][] = $resultAdd ? 'Votre nouvelle catégorie à été crée avec succés !' : "Erreur lors de l'enregistreent de la nouvelle catégorie... :(";
        header('Location:index.php?controller=categorys&action=list');
        exit;
    }
}

//function delete
elseif($_GET['action'] == 'delCategory'){
    $result = delCategory(   $_GET['id']    );
    if($result){
        $_SESSION['messages'][] = 'Votre Catégorie à été supprimé avec succés !';
    }
    else{
        $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
    }
    header('Location:index.php?controller=categorys&action=list');
    exit;
}

//function edition
elseif($_GET['action'] == 'editCategory'){

    //si le formulaire est soumis
    if(!empty($_POST)){
        if(empty($_POST['name']) || empty($_POST['description'])){

            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le nom est obligatoire !';
            }
            if(empty($_POST['description'])){
                $_SESSION['messages'][] = 'Veuillez décrire votre catégorie !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=categorys&action=editCategory&id='.$_GET['id']);
            exit;
        }else

            $result = editCategory($_GET['id'], $_POST);
        if($result){
            $_SESSION['messages'][] = 'Category mis à jour !';
        }
        else{
            $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
        }
        header('Location:index.php?controller=categorys&action=list');
        exit;
    }

    else{
        if (!isset($_SESSION['old_inputs'])){
            $category = getCategory($_GET['id']);

        }
        $categorys = getAllCategorys();
        require('views/categoryForm.php');
    }
}