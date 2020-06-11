<?php require ('partials/header.php'); ?>
<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>






<a class="" href="http://localhost/webskate/administrateur/index.php?controller=products&action=new">Ajouter un produit</a><br>
<ul class="list-group">
    <?php foreach($products as $product): ?>
        <img src="../assets/images/product/<?= ($product['image']) ?>" alt="images" width="150px" height="200px">

        <li class="list-group-item"><h4><?=  htmlspecialchars($product['name']) ?></h4>
            Description:<?=  htmlspecialchars($product['description']) ?>
            <!--<br>Prix:<?=  htmlspecialchars($product['price']) ?>€-->
            <br>
                Catégorie:<?php $category = getCategory($product['category_id']);echo $category['name'] ?>
            <br>
            <a class="float-right" href="index.php?controller=products&action=delProduct&id=<?= $product['id'] ?>"> supprimer</a>
            <a class="float-right" href="index.php?controller=products&action=editProduct&id=<?= $product['id'] ?>">modifier</a>
        </li>
    <?php endforeach; ?>
</ul>



<?php require ('partials/footer.php'); ?>
