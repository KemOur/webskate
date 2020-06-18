<?php

//appel des données à exploiter
require_once 'models/ShowCategoryModel.php';
require_once 'models/Products.php';
$categorys = getCategorys();

//mécanique du controller (vérifications)
//postulat de base, on part du principe qu'aucun produit valide n'a été selectionné
$selectedProduct = false;

if(isset($_GET['product_id']) ){

    //si $_GET['product_id'] (ID de produit voulu) n'est pas un entier naturel, on redirige l'utilisateur vers l'index
    if(!ctype_digit($_GET['product_id'])) {
        header('Location:index.php');
        exit;
    }

    //on cherche $_GET['product_id'] (ID de produit voulu) dans le tableau des produits, si on le trouve $selectedProduct = $product
    $selectedProduct = getProduct($_GET['product_id']);
}

//si $selectedProduct vaut toujours false après tous les tests, c'est que le produit n'a pas été trouvé dans le tableau => on redirige vers index
if($selectedProduct == false ){
    header('Location:index.php');
    exit;
}
//si ce test est passé, alors $selectedProduct est un produit du tableau


//appel de la vue correspondante
include 'views/product_detail.php';
