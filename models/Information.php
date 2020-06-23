<?php

function getInformations()
{
    $db = dbConnect();
    $query = $db->query('SELECT * FROM infos');
    $infos = $query->fetchAll();
    return $infos;
}
