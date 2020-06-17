<?php require ('partials/header.php'); ?>


<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div>
<a class="btn btn-outline-success" href="http://localhost/webskate/administrateur/index.php?controller=users&action=new">Ajouter un utilisateur</a>
</div>
<br>
<h4>Liste des utilisateurs:</h4>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <?php foreach($users as $user): ?>
    <tbody>
    <tr>
                <th><?=  htmlspecialchars($user['nom']) ?></th>
                <td><?=  htmlspecialchars($user['prenom']) ?></td>
                <td><?=  htmlspecialchars($user['email']) ?></td>

        <td>
            <a class="btn btn-outline-info" href="index.php?controller=users&action=editUser&id=<?= $user['id'] ?>">modifier <br></a>
            <a class="btn btn-outline-danger" href="index.php?controller=users&action=delUser&id=<?= $user['id'] ?>"> supprimer</a>
        </td>

        <tr>
    </tbody>
    <?php endforeach; ?>
</table>

    <?php require ('partials/footer.php'); ?>
