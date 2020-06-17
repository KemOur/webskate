<?php require ('partials/header.php'); ?>


<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<a class="btn btn-outline-success" href="http://localhost/webskate/administrateur/index.php?controller=categorys&action=new">Ajouter Catégorie</a><br>
<br>
<h4>Liste des Catégories:</h4>
<table class="table">
    <thead class="thead-light">
        <tr>
                <th scope="col">Image</th>
                <th scope="col">Nom de la catégorie</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
        </tr>
    </thead>

    <?php foreach($categorys as $category): ?>
    <tbody>
            <tr>
                <th><img src="../assets/images/category/<?= ($category['image']) ?>" width="100px" height="100px" alt="image_categorie"></th>
                <td><p><?=  htmlspecialchars($category['name']) ?></td>
                <td><p><?=  htmlspecialchars($category['description']) ?></p></td>

                <td>
                    <a class="btn btn-outline-info" href="index.php?controller=categorys&action=editCategory&id=<?= $category['id'] ?>">modifier<br></a>
                    <a class="btn btn-outline-danger" href="index.php?controller=categorys&action=delCategory&id=<?= $category['id'] ?>" >supprimer</a>
                </td>

            </tr>
    </tbody>
    <?php endforeach; ?>

</table>


<?php require ('partials/footer.php'); ?>
