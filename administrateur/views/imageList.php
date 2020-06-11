<?php require ('partials/header.php'); ?>


<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<ul class="list-group">
    <?php foreach($images as $image): ?>
        <div class="category">
            <img src="../assets/images/img/<?= ($image['image']) ?>" alt="images" width="150px" height="200px">
            <li class="list-group-item"><p><?=  htmlspecialchars($image['name']) ?></p>
                <p><?=  htmlspecialchars($image['product_id']) ?></p><!--contenu a supprimer -->
                Nom du produit:<?php $product = getProduct($image['product_id']);echo $product['name'] ?><br>
                <a class="float-right" href="index.php?controller=images&action=del_Product_Image&id=<?= $image['id'] ?>"> supprimer</a><br>
            </li>
            <br>
            <br>
        </div>
    <br>
    <br>
    <br>
    <?php endforeach; ?>
</ul>

<?php require ('partials/footer.php'); ?>

