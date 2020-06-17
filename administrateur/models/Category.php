<?php

function getAllCategorys()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM categorys ORDER BY ID DESC');
    $categorys = $query->fetchAll();

    return $categorys;
}

function addCategory($informations)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO categorys (name, description) VALUES( :name, :description)");
    $result = $query->execute([
        'name' => $informations['name'],
        'description' => $informations['description'],
    ]);

    if($result && isset($_FILES['image']['tmp_name'])){
        $categoryId = $db->lastInsertId();

        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
        $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
        if (in_array($my_file_extension , $allowed_extensions)){
            $new_file_name = $categoryId . '.' . $my_file_extension ;
            $destination = '../assets/images/category/' . $new_file_name;
            $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
            $db->query("UPDATE categorys SET image = '$new_file_name' WHERE id = $categoryId");
        }
    }

    return $result;
}

function delCategory($id)
{
    $db = dbConnect();

    delImage($id);
    $query = $db->prepare('DELETE FROM categorys WHERE id = ?');
    $result = $query->execute([$id]);

    return $result;
}

function delImage($id)
{
    $db = dbConnect();

    $query = $db->prepare('SELECT image FROM categorys WHERE id = ?');
    $query->execute([$id]);
    $selectedImage = $query->fetch();

    foreach($selectedImage as $image){
        $my_file_extension = pathinfo($image, PATHINFO_EXTENSION);
        unlink('../assets/images/category/' . $id . '.' . $my_file_extension);
    }
}




function getCategory($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM categorys WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result = $query->fetch();

    return $result;
}


function editCategory($id, $informations)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE categorys SET name = ?, description = ? WHERE id = ?');
    $result = $query->execute(
        [
            $informations['name'],
            $informations['description'],
            $id,
        ]
    );

    if($result && isset($_FILES['image']['tmp_name'])){
        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
        $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
        if (in_array($my_file_extension , $allowed_extensions)){
            $new_file_name = $id . '.' . $my_file_extension ;
            $destination = '../assets/images/category/' . $new_file_name;
            $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

            $db->query("UPDATE categorys SET image = '$new_file_name' WHERE id = $id");
        }
    }

    return $result;
}

