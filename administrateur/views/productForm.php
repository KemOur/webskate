<?php require ('partials/header.php'); ?>




<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>








<form action="index.php?controller=products&action=<?= isset($product) ||
(isset($_SESSION['old_inputs']) && $_GET['action'] == 'new') ? 'editProduct&id='.$_GET['id']  : 'addProduct' ?>" method="post" enctype="multipart/form-data">
    <label for="name">Nom du produit :</label>
    <input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?>
<?= isset($product) ? $product['name'] : '' ?>" />
    <br>
    <br>

    <label for="description">Description du produit :</label>
    <textarea name="description" id="description"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?><?= isset($product) ? $product['description'] : '' ?></textarea>
    <br>
    <br>

    <label for="price">Prix :</label>
    <input  type="text" name="price" id="price" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : '' ?>
<?= isset($product) ? $product['price'] : '' ?>" />
    <br>
    <br>

    <label for="quantity">Quantité :</label>
    <input  type="text" name="quantity" id="quantity" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['quantity'] : '' ?>
<?= isset($product) ? $product['quantity'] : '' ?>" />
    <br>
    <br>

    <label for="category_id">Catégorie :</label>
    <select name="category_id" id="category_id">
        <?php foreach ($categorys as $category): ?>
            <option value="<?= $category['id']?>"<?php if(isset($product) && $product['category_id'] == $category['id']): ?>selected="selected"<?php endif; ?>><?= $category['name']?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <br>

    <!-- RENDRE LES CHAMPS IMAGES ET PUBLIE OBLIGATOIRE! -->
    <label for="image">Image :</label>
    <input type="file" name="image" id="image" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['image'] : '' ?>
<?= isset($product) ? $product['image'] : '' ?>" />
    <br>
    <br>
        <img src="../assets/images/product/<?= ($product['image']) ?>" alt="images" width="150px" height="200px">
        </li>
    <br>
    <br>
    <label for="published">Publié ?</label>
    <select class="form-control" name="published" id="published">
        <option value="0"<?php if(isset($product) && $product['id']) : ?><?=($product['published']==0) ? ' selected':''; ?><?php endif; ?>>non</option>
        <option value="1"<?php if(isset($product) && $product['id']) : ?><?=($product['published']==1) ? ' selected':''; ?><?php endif; ?>>oui</option>
    </select>
    <br>
    <br>

    <input type="submit" value="Enregistrer" />

</form>













<br>
<br>
<?php if (isset($product) && ('editProduct')) : ?>
    <h2>Ajouter une image</h2>
    <form action="index.php?controller=images&action=<?= isset($image) ||
    (isset($_SESSION['old_inputs']) && $_GET['action'] == 'new') ? 'editImage&id='.$_GET['id'] : 'addImage'?>" method="post" enctype="multipart/form-data">

        <label for="name">Legende :</label>
        <input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($image) ? $image['name'] : '' ?>" />
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
                <option value="<?= $product['id']?>"<?php if(isset($image) && $image['product_id'] == $product['id']): ?><?php endif; ?>><?= $product['name']?></option>
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


    <h3>Liste des images:</h3>
    //Affichier les images en lien avec ce produit ici!
    <ul class="list-group">
    <?php foreach($images as $image):?>

                <p><?=  htmlspecialchars($image['product_id']) ?>
                <p><?=  htmlspecialchars($image['name']) ?>
                </p><img src="../assets/images/img/<?=($image['image'])?> " alt="images" width="150px" height="200px" >
               <p><a class="float-right" href="index.php?controller=images&action=del_Product_Image&id=<?= $image['id'] ?>"> supprimer</a>
    <?php endforeach; ?>
<?php endif ;?>










<?php require ('partials/footer.php'); ?>