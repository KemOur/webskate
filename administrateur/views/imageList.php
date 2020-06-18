<?php require ('partials/header.php'); ?>


<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<h4>Liste des images:</h4>

<div class="products_position">
    <div class="row">
        <a href="">
            <div class="product">
    <?php foreach($images as $image): ?>
                <div class="column">
                <div class="category">
            <img src="../assets/images/img/<?= ($image['image']) ?>" alt="images" width="150px" height="200px">
                <button class="btn btn-outline-danger"><a class="float-right" href="index.php?controller=images&action=del_Product_Image&id=<?= $image['id'] ?>"> supprimer</a><br></button>
            </li>
            <br>
            <br>
        </div>
        </div>
    <br>
    <br>
    <br>
    <?php endforeach; ?>
            </div>
        </a>
    </div>
</div>
</ul>

<?php require ('partials/footer.php'); ?>

