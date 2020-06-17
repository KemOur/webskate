<?php require ('partials/header.php'); ?>


    <div class="products_position">
        <div class="row">

            <a href="">
            <div class="product">

                <?php foreach($products as $product): ?>
                <div class="column">
                    <img src="assets/images/product/<?= ($product['image']) ?>" alt="images" height="300px">
                    <p><?=  htmlspecialchars($product['name']) ?></p>
                    <P><?=  htmlspecialchars($product['price']) ?>€</P>
                    <!--<P><?=  htmlspecialchars($product['description']) ?></P>-->
                    <br><br><br><br>
                </div>
                <?php endforeach; ?>

            </div>
            </a>

            </div>
            </div>


<?php require ('partials/footer.php'); ?>