<?php require ('partials/header.php'); ?>



<ul class="list-group">
    <?php foreach($orders as $order): ?>
        <div class="category">
            <li class="list-group-item">
                <a href=""><?=  htmlspecialchars($order['client_name']) ?></a>
                <!-- prénom link que devra me redigerer vers la page détail commande! || PAS ENCORE FAIT!!!!-->
                <p><?=  htmlspecialchars($order['delivery_adress'])?></p>
            </li>
        </div>
    <?php endforeach; ?>
</ul>

<?php require ('partials/footer.php'); ?>
