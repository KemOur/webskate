<?php
require('models/Products.php');
require('models/CategoryFront.php');
require('models/Information.php');

if($_GET['action'] == 'cart'){
    $categorys = getCategorys();
    $infos = getInformations();

    $products=get_all_cart_products();
    $subtotal = 0.00;

    if (is_array($products) || is_object($products)){
        $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
        //var_dump($products_in_cart);
    }
    }

    require('views/usercart.php');

}

elseif($_GET['action'] == 'addCart'){
            if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
                $product_id = (int)$_POST['product_id'];
                $quantity = (int)$_POST['quantity'];

                $product = ifproductexist();

                if ($product && $quantity > 0) {
                    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                        if (array_key_exists($product_id, $_SESSION['cart'])) {
                            $_SESSION['cart'][$product_id] += $quantity;
                            } else {
                            $_SESSION['cart'][$product_id] = $quantity;
                        }
                    } else {
                        $_SESSION['cart'] = array($product_id => $quantity);
                    }
                }
                header('location:index.php?page=cart&action=cart');
                exit;
                }
            }

    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
    header('location:index.php?page=cart&action=cart');
    exit;
}
}


if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    header("Location:index.php?page=cart&action=cart");

}

if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
    exit;
}

