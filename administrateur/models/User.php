<?php

function getAllUsers()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM users ORDER BY ID DESC');
    $users = $query->fetchAll();
    return $users;
}


function addUser($informations)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO users (nom, prenom, email, password,is_admin) VALUES (:nom, :prenom, :email, :password, :is_admin)");
    $result = $query->execute([
        'nom' => $informations['nom'],
        'prenom' => $informations['prenom'],
        'email' => $informations['email'],
        'password' =>hash('md5', $informations['password']),
        'is_admin' => $informations['is_admin'],
    ]);

    return $result;
}

function delUser($id)
{
    $db = dbConnect();

    //ne pas oublier de supprimer le fichier lié s'il y en un
    //avec la fonction unlink de PHP
    $query = $db->prepare('DELETE FROM users WHERE id = ?');
    $result = $query->execute([$id]);

    return $result;
}

function getUser($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result = $query->fetch();

    return $result;
}

function editUser($id, $informations)

{
    $db = dbConnect();

    $query = $db->prepare('UPDATE users SET nom = ?, prenom = ?, email = ?, password = ?, is_admin = ? WHERE id = ?');

    $result = $query->execute(
        [
            $informations['nom'],
            $informations['prenom'],
            $informations['email'],
            hash('md5',$informations['password']),
            $informations['is_admin'],
            $id,
        ]
    );

    return $result;
}
