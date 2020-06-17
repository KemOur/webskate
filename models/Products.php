<?php
function getAllProducts()
{
$db = dbConnect();

$query = $db->query('SELECT * FROM products ORDER BY ID DESC');
$products = $query->fetchAll();

return $products;
}
