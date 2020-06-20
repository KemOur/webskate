<?php require ('partials/header.php'); ?>

<div class="cart content-wrapper">
    <h1 class="pannier">Panier</h1>
    <hr class="hrf">
    <form action="index.php?page=cart&update=" method="post">
        <table class="table">
            <thead>
            <tr>
                <td colspan="2">PRODUCTS</td>
                <td>PRIX</td>
                <td>QUANTITE</td>
                <td>TOTAL</td>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($products)): ?>

                <tr><td colspan="5" class="under">Vous n'avez pas de produit dans le pannier!</td></tr>

            <?php else: ?>
                <?php foreach ($products as $product): ?>
                        <tr>
                                <td class="img">
                                    <a href="index.php?page=product&product_id=<?=$product['id']?>">
                                        <img src="assets/images/product/<?=$product['image']?>"  alt="<?= $product['name']?>" height="130px" width="100px">
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?page=product&product_id=<?=$product['id']?>"><h5><?=$product['name']?></h5></a>

                                    <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove"> <img src="assets/images/autres/p.png"  alt="delete" height="30px" width="40px">
                                    </a>
                                </td>
                                <td class="price"><?=$product['price']?>€</td>
                                <td class="quantity">
                                    <input type="number" class="quan" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="1" required>
                                </td>
                                <td class="price"> <?=$product['price'] * $products_in_cart[$product['id']]?>€</td>
                            </tr>
                <?php endforeach; ?>
            <?php endif; ?>

            </tbody>
        </table>

        <div class="subtotal">
            <span class="text">SUBTOTAL</span>
            <span class="price">:<?=$subtotal?>€</span>
        </div>
        <br>
<br>
        <div class="buttons">
            <input type="submit" value="MODIFIER" class="cartbtn" name="update">
            <input type="submit" value="COMMANDER" class="cartbtn" name="place order">
        </div>
    </form>
</div>
<br><br><br><br>
<br><br><br><br>

<?php require ('partials/footer.php'); ?>
