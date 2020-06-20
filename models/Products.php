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
$query = $db->query('SELECT * FROM products ORDER BY id DESC LIMIT 4');
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



function ifproductexist()
{
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM products WHERE id = ?');
    $query->execute([$_POST['product_id']]);
    $product = $query->fetch(PDO::FETCH_ASSOC);

    return $product;
}




function get_all_cart_products()
{
    $db = dbConnect();
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array();

    if ($products_in_cart) {
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $stmt = $db->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
        $stmt->execute(array_keys($products_in_cart));
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;

    }
}



