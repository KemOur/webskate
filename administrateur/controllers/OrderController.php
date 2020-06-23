<?php

require('models/User.php');
require('models/Product.php');
require('models/Category.php');
require('models/Image.php');
require('models/Order.php');


if ($_GET['action'] == 'list') {
    $orders = getAllOrders();
    require('views/orderList.php');
}
