<?php

function coUser()
{

    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');

    $query->execute([
        'email' => $_POST['email'],
        'password' => md5($_POST['password']),
    ]);


    $user = $query->fetch();

    if($user != false){
        $_SESSION['user'] = [
            'id' => $user['id'],
            'nom' => $user['nom'],
            'prenom' => $user['prenom'],
            'email' => $user['email'],

            'password' => $user['password'],
            'is_admin' => $user['is_admin'],
        ];
    }
    return $user;
}


function getAllUsers()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM users ORDER BY ID DESC');
    $users = $query->fetchAll();

    return $users;
}

function addUser()
{

    $db = dbConnect();

    $query = $db->prepare('SELECT email FROM users WHERE email=?');
    $query->execute([
        $_POST['email']
    ]);
    $emailExist = $query->fetch();
    if (!$emailExist) {
        $query = $db->prepare('INSERT INTO users (nom, prenom, email, password) VALUES (?, ?, ?, ?)');
        $result = $query->execute(
            [
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                hash('md5', $_POST['password']),
            ]);
        $_SESSION['user'] = [
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'is_admin' => 0,
        ];

        return $result;
    }
}


