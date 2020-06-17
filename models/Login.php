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

