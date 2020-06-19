<?php
require('models/Products.php');
require('models/showCategoryModel.php');

if($_GET['action'] == 'cart'){
    $categorys = getCategorys();

    $products=get_all_cart_products();
    $subtotal = 0.00;

    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
    require('views/usercart.php');

}

elseif($_GET['action'] == 'addCart'){
            /// If the user clicked the add to cart button on the product page we can check for the form data
            if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
                // Set the post variables so we easily identify them, also make sure they are integer
                $product_id = (int)$_POST['product_id'];
                $quantity = (int)$_POST['quantity'];

                $product = ifproductexist();

                // Check if the product exists (array is not empty)
                if ($product && $quantity > 0) {
                    // Product exists in database, now we can create/update the session variable for the cart
                    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                        if (array_key_exists($product_id, $_SESSION['cart'])) {
                            // Product exists in cart so just update the quanity
                            $_SESSION['cart'][$product_id] += $quantity;
                            } else {
                            // Product is not in cart so add it
                            $_SESSION['cart'][$product_id] = $quantity;
                        }
                    } else {
                        // There are no products in cart, this will add the first product to cart
                        $_SESSION['cart'] = array($product_id => $quantity);
                    }
                }
                // Prevent form resubmission...
                header('location:index.php?page=cart&action=cart');
                exit;
                }
            }




    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
        // Loop through the post data so we can update the quantities for every product in cart
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                // Always do checks and validation
                if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                    // Update new quantity
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
    header('location:index.php?page=cart&action=cart');
    exit;
}
}


if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
    header("Location:index.php?page=cart&action=cart");

}


//COMMANDER place order (infuctionnel pour l'intant)
// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
    exit;
}

