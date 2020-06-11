<?php require ('partials/header.php'); ?>


<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<a class="" href="http://localhost/webskate/administrateur/index.php?controller=users&action=new">Ajouter un utilisateur</a><br>
<br>
<ul class="list-group">
    <?php foreach($users as $user): ?>
        <div class="">
            <li class="list-group-item">
                <p><?=  htmlspecialchars($user['nom']) ?></p>
                <p><?=  htmlspecialchars($user['prenom']) ?>
                <p><?=  htmlspecialchars($user['email']) ?>
                </p>

                <a class="float-right" href="index.php?controller=users&action=delUser&id=<?= $user['id'] ?>"> supprimer</a>
                <a class="float-right" href="index.php?controller=users&action=editUser&id=<?= $user['id'] ?>">modifier <br></a>
            </li>
        </div>
    <?php endforeach; ?>
</ul>

<?php require ('partials/footer.php'); ?>
