<?php require ('partials/header.php'); ?>


<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="index.php?controller=users&action=<?= isset($user) ||
(isset($_SESSION['old_inputs']) && $_GET['action'] == 'new') ? 'editUser&id='.$_GET['id']  : 'addUser' ?>" method="post" enctype="multipart/form-data">
    <label for="name">Nom :</label>
    <input  type="text" name="nom" id="nom" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['nom'] : '' ?>
<?= isset($user) ? $user['nom'] : '' ?>" />
    <br>
    <br>
    <label for="prenom"> Prenom :</label>
    <input  type="text" name="prenom" id="prenom" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['prenom'] : '' ?>
<?= isset($user) ? $user['prenom'] : '' ?>" />
    <br>
    <br>

    <label for="email">Email :</label>
    <input type="email" name="email" id="email" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['email'] : '' ?>
<?= isset($user) ? $user['email'] : '' ?>" />
    <br>
    <br>

    <label for="password">Password :</label>
    <input  type="password" name="password" id="password" value="<?= isset($user) ? $user['password'] : '' ?>" />
    <br>
    <br>

    <label for="is_admin"> Admin ?</label>
    <select class="form-control" name="is_admin" id="is_admin">
        <option value="0"<?php if(isset($user) && $user['id']) : ?><?=($user['is_admin']==0) ? ' selected':''; ?><?php endif; ?>>non</option>
        <option value="1" <?php if(isset($user) && $user['id']) : ?><?=($user['is_admin']==1) ? ' selected':''; ?><?php endif; ?>>oui</option>
    </select>
    <br>
    <br>

    <input type="submit" value="Enregistrer" />

</form>
<?php require ('partials/footer.php'); ?>
