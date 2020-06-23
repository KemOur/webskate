<?php

require_once 'models/Products.php';
require_once 'models/CategoryFront.php';
require_once 'models/Information.php';

$products = getfourLastProducts();
$categorys = getCategorys();
$infos = getInformations();

require ('views/index.php');
