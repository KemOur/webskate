<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $selectedProduct['name']; ?></title>
</head>
<body>
<div class="container-fluid">
    <!-- inclusion du fichier header.php (header du site) -->
    <?php require 'partials/header.php'; ?>
    <div class="row my-3">
        <!-- inclusion du fichier nav.php (navigation du site) -->
        <main class="col-9">
            <div class="products_position">
                <div class="row">
                        <div class="product">
                            <div><img class="imgdetail" src="assets/images/product/<?= ($selectedProduct['image']) ?>" alt="images" height="550px"></div>
                                <div class="productdetail">
                                <h1><?= $selectedProduct['name']; ?></h1>
                                    <h3><?= $selectedProduct['price']; ?> €</h3>
                                    <h5>En stock:  <?= $selectedProduct['quantity']; ?></h5>

                                    <form action="" method="post"><!-- action="index.php?page=cart"-->
                                        <input type="number" class="quanty" name="quantity" value="1" min="1" max="<?=$selectedProduct['quantity']?>" placeholder="Quantity" required>
                                        <input type="hidden" name="product_id" value="<?=$selectedProduct['id']?>">
                                        <button type="submit" value="Add to card" class="addcard">AJOUTER AU PANNIER</button>
                                        <!--<input type="submit" value="Add To Cart">-->
                                    </form>

                                    <h4>DESCRIPTION DU PRODUIT</h4>
                                <?= $selectedProduct['description']; ?>
                            </div>
                        </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
