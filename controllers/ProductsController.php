<?php
require ('models/Products.php');

if($_GET['action'] == 'list'){
$products = getAllProducts();
require('views/Allproducts.php');
}

