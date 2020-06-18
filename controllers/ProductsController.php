<?php
require_once 'models/Products.php';
require_once 'models/ShowCategoryModel.php';

$selectedCategory = false;
$categorys = getCategorys();

//si ID de catégorie demandé
if(isset($_GET['category_id'])){
    //si ça n'est pas un entier naturel, redirection vers index.php
    if(!ctype_digit($_GET['category_id'])) {
        header('Location:index.php');
        exit;
    }
    //on cherche la catégorie correspondante
    foreach($categorys as $category){
        if($category['id'] == $_GET['category_id'] ){
            $selectedCategory = $category;
        }
    }
    // si on a reçu un category_id en GET mais que $selectedCategory vaut toujours false => mauvaise catégorie demandée => redirection
    if($selectedCategory == false){
        header('Location:index.php');
        exit;
    }
    //si ce test est passé, alors $selectedCategory est une catégorie existante
    $products = getProductsByCategoryId($_GET['category_id']);
}
else{
    $products = getAllProducts();
}
require('views/Allproducts.php');
