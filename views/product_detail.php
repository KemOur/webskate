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
                    <a href="">
                        <div class="product">
                            <div><img class="imgdetail" src="assets/images/product/<?= ($selectedProduct['image']) ?>" alt="images" height="550px"></div>
                                <div class="productdetail">
                                <h1><?= $selectedProduct['name']; ?></h1>
                                <h4>DESCRIPTION DU PRODUIT</h4>
                                <?= $selectedProduct['description']; ?>
                            <h3><?= $selectedProduct['price']; ?> €</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
