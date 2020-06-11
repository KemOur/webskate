<?php require ('partials/header.php'); ?>


<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<a class="" href="http://localhost/webskate/administrateur/index.php?controller=categorys&action=new">Nouvelle Catégorie</a><br>

<ul class="list-group">
    <?php foreach($categorys as $category): ?>
    <div class="category">
        <img src="../assets/images/category/<?= ($category['image']) ?>" alt="image_categorie">
        <li class="list-group-item"><p><?=  htmlspecialchars($category['name']) ?></p><p><?=  htmlspecialchars($category['description']) ?>
            </p>
                <a class="float-right" href="index.php?controller=categorys&action=delCategory&id=<?= $category['id'] ?>"> supprimer</a>
                <a class="float-right" href="index.php?controller=categorys&action=editCategory&id=<?= $category['id'] ?>">modifier <br></a></p>
        </li>
    </div>
    <?php endforeach; ?>
</ul>

<?php require ('partials/footer.php'); ?>
