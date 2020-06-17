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
    (isset($_SESSION['old_inputs']) && $_GET['action'] == 'editCategory')  ? 'editCategory&id='.$_GET['id'] : 'addCategory' ?>" method="post" enctype="multipart/form-data">

        <br>
        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Catégorie</span></div>
            <input  type="text" name="name" class="form-control" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($category) ? $category['name'] : '' ?>" />
        </div>
        <br>


        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Décrivez votre nouvelle catégorie</span></div>
        <textarea name="description" class="form-control" id="description"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?><?= isset($category) ? $category['description'] : '' ?></textarea><br>
        </div>
        <br>

        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Télechargez une image</span></div>
        <input type="file" name="image" id="image" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['image'] : '' ?><?= isset($category) ? $category['image'] : '' ?>"  />
        </div>
        <br>
        <input class="btn btn-outline-info" type="submit" value="Enregistrer" />

    </form>

<?php require ('partials/footer.php'); ?>