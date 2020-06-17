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

    <div class="product">
    <div class="column">
        <img  src="assets/images/product/21.jpg" height="300px">
        <P>Product_Name</P>
        <P>Prix</P>
    </div>
    </div>

    <div class="product">
    <div class="column">
        <img src="assets/images/product/16.jpg" height="300px">
        <P>Product_Name</P>
        <P>Prix</P>
    </div>
    </div>

    <div class="product">
        <div class="column">
            <img src="assets/images/product/21.jpg" height="300px">
            <P>Product_Name</P>
            <P>Prix</P>
        </div>
    </div>

    <div class="product">
    <div class="column">
        <img src="assets/images/product/16.jpg" height="300px" >
        <p>Product_Name</p>
        <P>Prix</P>
    </div>
    </div>
</div>
</div>






<div class="sp">
</div>
<?php require ('partials/footer.php'); ?>
