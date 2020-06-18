<?php require ('partials/header.php'); ?>

    <div class="slideshow-container">
        <div class="mySlides"><img class="img" src="assets/images/accueil/yo.jpg" ></div>
        <div class="mySlides"><img class="img" src="assets/images/accueil/yes.jpg"></div>
        <div class="mySlides"><img class="img" src="assets/images/accueil/couple_.jpg"></div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>

    <div class="dot-container">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

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