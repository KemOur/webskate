<?php
require('models/Product.php');
require('models/Category.php');
require('models/Image.php');



if($_GET['action'] == 'list'){
    $products = getAllProducts();

    require('views/productList.php');
}





elseif($_GET['action'] == 'new'){
    $categorys=getAllCategorys();
    require('views/productFORM.php');
}





elseif($_GET['action'] == 'addProduct'){

    if(empty($_POST['name'])
        || empty($_POST['description'])
        || empty($_POST['price'])
        || empty($_POST['quantity'])
        || empty($_POST['category_id'])){

        if(empty($_POST['name'])){
            $_SESSION['messages'][] = 'Le nom est obligatoire !';
        }
        if(empty($_POST['description'])){
            $_SESSION['messages'][] = 'Veuillez décrire le produit !';
        }
        if(empty($_POST['price'])){
            $_SESSION['messages'][] = 'Entrez un prix !';
        }
        if(empty($_POST['quantity'])){
            $_SESSION['messages'][] = 'Champs obligatoire !';
        }
        if(empty($_POST['category_id'])){
            $_SESSION['messages']
            [] = 'Selectionnez une catégorie!';
        }
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=products&action=new');
        exit;
    }
    else{
        $resultAdd = addProduct($_POST);

            $_SESSION['messages'][
            ] = $resultAdd ? 'Produit enregistré !' : "Erreur lors de l'enregistreent du produit... :(";

            header('Location:index.php?controller=products&action=list');
        exit;
    }
}







elseif($_GET['action'] == 'editProduct'){
    //si le formulaire est soumis
    if(!empty($_POST)){
        if(empty($_POST['name'])
            || empty($_POST['description'])
            || empty($_POST['price'])
            || empty($_POST['quantity'])
            || empty($_POST['category_id'])){
        //verif champs obligaroires

            $result = editProduct($_GET['id'], $_POST);
            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le nom est obligatoire !';
            }
            if(empty($_POST['description'])){
                $_SESSION['messages'][] = 'Veuillez décrire le produit !';
            }
            if(empty($_POST['price'])){
                $_SESSION['messages'][] = 'Entrez un prix !';
            }
            if(empty($_POST['quantity'])){
                $_SESSION['messages'][] = 'Champs obligatoire !';
            }

            if(empty($_POST['category_id'])){
                $_SESSION['messages'][] = 'Selectionnez une catégorie!';
            }

                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?controller=products&action=editProduct&id='.$_GET['id']);

        }

        else{
            $result=editProduct($_GET['id'], $_POST);
            if ($result){
                $_SESSION['messages'][] = 'produit mis a jour...';
            }else{
                $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
            }

                header('Location:index.php?controller=products&action=list');
            exit;
        }
    }

    else{
        if (!isset($_SESSION['old_inputs'])){
            $product = getProduct($_GET['id']);
            $products = getImageP($_GET['id']);
            $images=get_products_images($_GET['id']);
            //var_dump($images);
        }
            $categorys = getAllCategorys();
            require('views/productForm.php');
    }
}






        elseif($_GET['action'] == 'delProduct'){
            $result = delProduct(   $_GET['id']    );
            if($result){
                $_SESSION['messages'][] = 'Produit supprimé !';
            }
            else{
                $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
            }
            header('Location:index.php?controller=products&action=list');
            exit;

}


