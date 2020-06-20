<?php require ('partials/header.php'); ?>

    <div class="products_position">
        <div class="row">
            <a href="">
                <div class="product">
                    <?php foreach($products as $product): ?>
                        <div class="column">
                        <div class="col-md-4 mb-4">
                            <a href="index.php?page=product&product_id=<?= $product['id']; ?>">
                                <img src="assets/images/product/<?= ($product['image']) ?>" alt="images" height="300px" width="200px">
                                <h4><?= $product['name']; ?></h4>
                                <h5><?= $product['price']; ?> €</h5>
                                <br><br><br
                            </a>
                        </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </a>
        </div>
    </div>

    </div>
    </a>
    </div>
    </div>
<?php require ('partials/footer.php'); ?>