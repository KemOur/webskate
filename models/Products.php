<?php
function getAllProducts()
{
$db = dbConnect();
$query = $db->query('SELECT * FROM  products ');
$products = $query->fetchAll();
return $products;
}

function get4Last_Products()
{
$db = dbConnect();
$query = $db->query('SELECT * FROM products ORDER BY id DESC LIMIT 4  ');
$products = $query->fetchAll();
return $products;
}

function getProduct($productId)
{
    $db = dbConnect();
    $query = $db->query('SELECT * FROM products WHERE id = ' . $productId);
    $selectedProduct = $query->fetch();

    return $selectedProduct;
}


function getProductsByCategoryId($categoryId)
{
    $db = dbConnect();
    $query = $db->query('SELECT * FROM products WHERE category_id = ' . $categoryId);
    $products = $query->fetchAll();

    return $products;
}
