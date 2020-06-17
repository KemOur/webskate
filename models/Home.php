<?php

function addUser($informations)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM home_slides (slides) VALUES (?, ?, ?, ?)");
    $result = $query->execute([
        'nom' => $informations['nom'],
        'prenom' => $informations['prenom'],
        'email' => $informations['email'],
        'password' =>hash('md5', $informations['password']),
    ]);

    return $result;
}
