<?php

function getCategorys()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM categorys');
    $categorys = $query->fetchAll();

    return $categorys;
}

