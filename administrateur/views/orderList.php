<?php require ('partials/header.php'); ?>

<br>
<h4>Liste des commandes:</h4>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Adress</th>

    </tr>
    </thead>

    <?php foreach($orders as $order): ?>
    <tbody>
    <tr>

        <th><a href=""><?=  htmlspecialchars($order['client_name']) ?></a></th>
                <td><?=  htmlspecialchars($order['delivery_adress'])?></td>

    <tr>
    </tbody>
    <?php endforeach;?>
</table>

<?php require ('partials/footer.php'); ?>
