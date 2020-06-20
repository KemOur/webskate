<?php require ('partials/header.php'); ?>
<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>






<a class="btn btn-outline-success" href="index.php?controller=products&action=new">Ajouter un produit</a>
<br>
<br>
<h4>Liste des produits:</h4>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Image</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Prix</th>
        <th scope="col">Catégorie</th>
        <th scope="col">Action</th>
    </tr>
    </thead>

    <?php foreach($products as $product): ?>

    <tbody>
            <tr>
            <th><img src="../assets/images/product/<?= ($product['image']) ?>" alt="images" width="100px" height="100px"></th>

                <td> <h4><?=  htmlspecialchars($product['name']) ?></h4></td>
                <td><?=  htmlspecialchars($product['description']) ?></td>
                <td><?=  htmlspecialchars($product['price']) ?>€</td>
                <td><?php $category = getCategory($product['category_id']);echo $category['name'] ?></td>

                <td>
                    <a class="btn btn-outline-info" href="index.php?controller=products&action=editProduct&id=<?= $product['id'] ?>">modifier</a>
                    <a class="btn btn-outline-danger" href="index.php?controller=products&action=delProduct&id=<?= $product['id'] ?>"> supprimer</a>
                </td>
            </tr>
    </tbody>

    <?php endforeach; ?>
</table>
<?php require ('partials/footer.php'); ?>
