<?php require ('partials/header.php'); ?>

<div class="slideshow-container">

    <div class="mySlides"><img class="img" src="assets/images/accueil/couple_.jpg"></div>
    <div class="mySlides"><img class="img" src="assets/images/accueil/yes.jpg"></div>
    <div class="mySlides"><img class="img" src="assets/images/accueil/yo.jpg" ></div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
</div>

<div class="dot-container">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>

<h2 class="recent">Nouveautés</h2>
<hr class="pra">


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

<h2 class="recent">All Black</h2>
<hr class="pra">

<img class="allb" src="assets/images/category/15.jpg" width="78%" height="75%">
<a href="http://localhost/webskate/index.php?page=products&category_id=15">
    <button type="submit" class="btnacheter">ACHETER</button>
</a>


<?php require ('partials/footer.php'); ?>
