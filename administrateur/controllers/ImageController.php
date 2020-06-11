<?php

require('models/Product.php');
require('models/Category.php');
require('models/Image.php');

if ($_GET['action'] == 'list') {
    $images = getAllImages();
    require('views/imageList.php');
}

    //My function to add a new category
    elseif($_GET['action'] == 'new'){
        $products = getAllProducts();
        require('views/imageForm.php');
    }

    elseif($_GET['action'] == 'addImage'){

        if(empty($_POST['name'])){

            if(empty($_POST['name']) ){
                $_SESSION['messages'][] = 'Votre Image n\'as pas pu être enregistré cars vous avez oublié le champs name !';
            }
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=images&action=list');
            exit;
        }
        else{
            $resultAdd = addImage($_POST);

            $_SESSION['messages'][] = $resultAdd ? 'Votre nouvelle image à été ajouté avec succés !' : "Erreur lors de l'enregistreent de l'image... :(";
            header('Location:index.php?controller=images&action=list');
            exit;
        }
    }

//function delete
elseif($_GET['action'] == 'del_Product_Image'){
    $result = del_Product_Image (   $_GET['id']    );
    if($result){
        $_SESSION['messages'][] = 'Image supprimé !';
    }
    else{
        $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
    }
    header('Location:index.php?controller=images&action=list');
    exit;
}


//function edition
elseif($_GET['action'] == 'edit_Product_Image'){

    //si le formulaire est soumis
    if(!empty($_POST)){
        if(empty($_POST['name'])){

            if(empty($_POST['name']) ){
                $_SESSION['messages'][] = 'Votre Image n\'as pas pu être enregistré cars vous avez oublié le champs name !';
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