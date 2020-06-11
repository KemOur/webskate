<?php require ('partials/header.php'); ?>


<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
    <br>

    <form action="index.php?controller=images&action=<?= isset($image) ||
    (isset($_SESSION['old_inputs']) && $_GET['action'] == 'new') ? 'editImage&id='.$_GET['id'] : 'addImage' ?>" method="post" enctype="multipart/form-data">

        <label for="name">Legende :</label>
        <input  type="text" name="name" id="name"value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($image) ? $image['name'] : '' ?>" />
            <br>
            <br>
        <!-- RENDRE LES CHAMPS IMAGES ET PUBLIE OBLIGATOIRE! -->
        <label for="image">Image :</label>
        <input type="file" name="image" id="image" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['image'] : '' ?>
            <?= isset($product) ? $product['image'] : '' ?>" />
            <br>
            <br>
        <label for="product_id">Produit :</label>
        <select name="product_id" id="product_id">
            <?php foreach ($products as $product): ?>
                <option value="<?= $product['id']?>"<?php if(isset($image) && $image['product_id'] == $product['id']): ?>selected="selected"<?php endif; ?>><?= $product['name']?></option>
            <?php endforeach; ?>
        </select>

        <br>
        <br>
        <label for="published">Activé ?</label>
        <select class="form-control" name="published" id="published">
            <option value="0"<?php if(isset($image) && $image['id']) : ?><?=($image['published']==0) ? ' selected':''; ?><?php endif; ?>>non</option>
            <option value="1"<?php if(isset($image) && $image['id']) : ?><?=($image['published']==1) ? ' selected':''; ?><?php endif; ?>>oui</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Enregistrer" />
    </form>

<!--

0-legend
1-image file
2-product_id
3-published
-->

<?php require ('partials/footer.php'); ?>