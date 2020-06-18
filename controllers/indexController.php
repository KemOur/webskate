<?php

require_once 'models/Products.php';
require_once 'models/ShowCategoryModel.php';

$products = get4Last_Products();
    $categorys = getCategorys();

require ('views/index.php');



