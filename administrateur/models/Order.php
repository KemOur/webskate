<?php

function getAllOrders()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM orders ORDER BY ID DESC');
    $orders = $query->fetchAll();

    return $orders;
}
