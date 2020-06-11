<?php

function getAllImages()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM images ORDER BY ID DESC');
    $images = $query->fetchAll();

    return $images;
}






function addImage($informations)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO images (name, product_id, published) VALUES( :name, :product_id, :published)");
    $result = $query->execute([
        'name' => $informations['name'],
        'product_id' => $informations['product_id'],
        'published' => $informations['published'],
    ]);

    if($result && isset($_FILES['image']['tmp_name'])){
        $imageId = $db->lastInsertId();

        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
        $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
        if (in_array($my_file_extension , $allowed_extensions)){
            $new_file_name = $imageId . '.' . $my_file_extension ;
            $destination = '../assets/images/img/' . $new_file_name;
            $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
            $db->query("UPDATE images SET image = '$new_file_name' WHERE id = $imageId");
        }
    }

    return $result;
}






function del_Product_Image($id)
{
    $db = dbConnect();

    //ne pas oublier de supprimer le fichier lié s'il y en un
    //avec la fonction unlink de PHP
    delImg($id);
    $query = $db->prepare('DELETE FROM images WHERE id = ?');
    $result = $query->execute([$id]);

    return $result;
}
function delImg($id)
{
    $db = dbConnect();

    $query = $db->prepare('SELECT image FROM images WHERE id = ?');
    $query->execute([$id]);
    $selectedImage = $query->fetch();

    foreach($selectedImage as $image){
        $my_file_extension = pathinfo($image, PATHINFO_EXTENSION);
        unlink('../assets/images/img/' . $id . '.' . $my_file_extension);
    }
}







function get_products_images($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM images WHERE product_id = ?");
    $query->execute([
        $id
    ]);
    $result = $query->fetchAll();

    return $result;
}


