<?php require ('partials/header.php'); ?>



<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<br>
<br>
<br>

    <form action="index.php?controller=categorys&action=<?= isset($category) ||
    (isset($_SESSION['old_inputs']) && $_GET['action'] == 'new') ? 'editCategory&id='.$_GET['id'] : 'addCategory' ?>" method="post" enctype="multipart/form-data">
        <label for="name">Entrez le nom de la nouvelle catégorie :</label>
        <input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($category) ? $category['name'] : '' ?>" />

        <br>
        <br>
        <label for="description">Décrivez votre nouvelle catégorie :</label>
        <textarea name="description" id="description"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?><?= isset($category) ? $category['description'] : '' ?></textarea><br>
        <br>
        <label for="image">Télechargez une image :</label>
        <input type="file" name="image" id="image" /><br>
        <br>
        <input type="submit" value="Enregistrer" />

    </form>

<?php require ('partials/footer.php'); ?>