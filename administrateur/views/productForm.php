<?php require ('partials/header.php'); ?>




<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>



<form action="index.php?controller=products&action=<?= isset($product) ||
(isset($_SESSION['old_inputs']) && $_GET['action'] == 'editProduct') ? 'editProduct&id='.$_GET['id']  : 'addProduct' ?>" method="post" enctype="multipart/form-data">
    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Nom</span></div>
    <input  type="text" class="form-control" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?>
<?= isset($product) ? $product['name'] : '' ?>" />
    </div>
    <br>
    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Description</span></div>
    <textarea name="description" class="form-control" id="description"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?><?= isset($product) ? $product['description'] : '' ?></textarea>
    </div>
    <br>

    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Prix</span></div>
    <input  type="text" name="price" id="price" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : '' ?>
<?= isset($product) ? $product['price'] : '' ?>" />
    </div>
    <br>
    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Quantité</span></div>
    <input  type="text" name="quantity" id="quantity" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['quantity'] : '' ?>
<?= isset($product) ? $product['quantity'] : '' ?>" />
    </div>
        <br>
    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Catégorie</span></div>
    <select name="category_id" id="category_id">
        <?php foreach ($categorys as $category): ?>
            <option value="<?= $category['id']?>"<?php if(isset($product) && $product['category_id'] == $category['id']): ?>selected="selected"<?php endif; ?>><?= $category['name']?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <br>
    <br>

    <!-- RENDRE LES CHAMPS IMAGES ET PUBLIE OBLIGATOIRE! -->
    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Image</span></div>
        <input type="file" name="image" id="image" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['image'] : '' ?>
        <?= isset($product) ? $product['image'] : '' ?>" />
    <br>
    </div>
    <br>
        <img src="../assets/images/product/<?= ($product['image']) ?>" alt="Image du produit" width="300px" height="350px">
    <br>
    <br>
    <label for="published">Publié ?</label>
    <select class="form-control" name="published" id="published">
        <option value="0"<?php if(isset($product) && $product['id']) : ?><?=($product['published']==0) ? ' selected':''; ?><?php endif; ?>>non</option>
        <option value="1"<?php if(isset($product) && $product['id']) : ?><?=($product['published']==1) ? ' selected':''; ?><?php endif; ?>>oui</option>
    </select>
    <br>
    <input class="btn btn-outline-success" type="submit" value="Enregistrer" />

</form>













<br>
<br>
<?php if (isset($product) && ('editProduct')) : ?>
    <h5>Ajouter plusieurs images à ce produit</h5>
    <form action="index.php?controller=images&action=<?= isset($image) ||
    (isset($_SESSION['old_inputs']) && $_GET['action'] == 'editImage') ? 'editImage&id='.$_GET['id'] : 'addImage'?>" method="post" enctype="multipart/form-data">



        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Legende</span></div>
        <input  type="text" name="name" class="form-control" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($image) ? $image['name'] : '' ?>" />
        </div>
        <br>

        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Image</span></div>
            <input type="file" name="image" id="image" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['image'] : '' ?>
            <?= isset($product) ? $product['image'] : '' ?>" />
        </div>
        <br>

        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Produit</span></div>
            <select name="product_id" id="product_id">
                    <option value="<?= $product['id']?>"<?php if(isset($image) && $image['product_id'] == $product['id']): ?><?php endif; ?>><?= $product['name']?></option>
            </select>
        </div>

        <br>
        <br>


        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Activer l'image ?</span></div>
            <select  name="published" id="published">
            <option value="0"<?php if(isset($image) && $image['id']) : ?><?=($image['published']==0) ? ' selected':''; ?><?php endif; ?>>non</option>
            <option value="1"<?php if(isset($image) && $image['id']) : ?><?=($image['published']==1) ? ' selected':''; ?><?php endif; ?>>oui</option>
        </select>
        </div>
     <br>
        <input class="btn btn-outline-success" type="submit" value="Enregistrer" />
    </form>
<br>
<br>

    <h3>Liste des images:</h3><br>
    <ul class="list-group">
    <?php foreach($images as $image):?>
        <img src="../assets/images/img/<?=($image['image'])?>" alt="images" width="200px" height="250px" >
        <br>
        <div>
        <a class="btn btn-outline-danger" href="index.php?controller=images&action=del_Product_Image&id=<?= $image['id'] ?>"> supprimer</a>
    </div>
        <div>
            <br>
        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Activé à la création?</span></div>
            <select name="published" id="published">
                <option value="0"<?php if(isset($image) && $image['id']) : ?><?=($image['published']==0) ? ' selected':''; ?><?php endif; ?>>non</option>
                <option value="1"<?php if(isset($image) && $image['id']) : ?><?=($image['published']==1) ? ' selected':''; ?><?php endif; ?>>oui</option>
            </select>
        </div>
            <br>
        </div>
    <?php endforeach; ?>
<?php endif ;?>



<?php require ('partials/footer.php'); ?>