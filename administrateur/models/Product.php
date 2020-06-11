<?php

function getAllProducts()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM products ORDER BY ID DESC');
    $products = $query->fetchAll();

    return $products;
}





function addProduct($informations)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO products (name, description, price, quantity, published, category_id) VALUES( :name, :description, :price, :quantity, :published, :category_id)");
    $result = $query->execute([
        'name' => $informations['name'],
        'description' => $informations['description'],
        'price' => $informations['price'],
        'quantity' => $informations['quantity'],
        'published' => $informations['published'],
        'category_id' => $informations['category_id'],
    ]);

    if($result && isset($_FILES['image']['tmp_name'])){
        $productId = $db->lastInsertId();

        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
        $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
        if (in_array($my_file_extension , $allowed_extensions)){
            $new_file_name = $productId . '.' . $my_file_extension ;
            $destination = '../assets/images/product/' . $new_file_name;
            $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
            $db->query("UPDATE products SET image = '$new_file_name' WHERE id = $productId");
        }
    }

    return $result;
}








function delProduct($id)
{
    $db = dbConnect();

    //ne pas oublier de supprimer le fichier lié s'il y en un
    //avec la fonction unlink de PHP
    deleteproductimage($id);
    $query = $db->prepare('DELETE FROM products WHERE id = ?');
    $result = $query->execute([$id]);

    return $result;
}

function deleteproductimage($id)
{
    $db = dbConnect();

    $query = $db->prepare('SELECT image FROM products WHERE id = ?');
    $query->execute([$id]);
    $selectedImage = $query->fetch();

    foreach($selectedImage as $image){
        $my_file_extension = pathinfo($image, PATHINFO_EXTENSION);
        unlink('../assets/images/product/' . $id . '.' . $my_file_extension);
    }
}






function getProduct($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result = $query->fetch();

    return $result;
}






function getImageP($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT image FROM products WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result = $query->fetchAll();

    return $result;
}







function editProduct($id, $informations)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE products SET name = ?, description = ?, price = ?, quantity = ?, published = ?, category_id = ? WHERE id = ?');

    $result = $query->execute(
        [

            $informations['name'],
            $informations['description'],
            $informations['price'],
            $informations['quantity'],
            $informations['published'],
            $informations['category_id'],
            $id,
        ]
    );

    if($result && isset($_FILES['image']['tmp_name'])){
        delImage($id);
        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
        $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
        if (in_array($my_file_extension , $allowed_extensions)){
            $new_file_name = $id . '.' . $my_file_extension ;
            $destination = '../assets/images/product/' . $new_file_name;
            $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

            $db->query("UPDATE products SET image = '$new_file_name' WHERE id = $id");
        }
    }

    return $result;
}

