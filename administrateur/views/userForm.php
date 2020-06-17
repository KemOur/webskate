<?php require ('partials/header.php'); ?>


<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="index.php?controller=users&action=<?= isset($user) ||
(isset($_SESSION['old_inputs']) && $_GET['action'] == 'editUser') ? 'editUser&id='.$_GET['id']  : 'addUser' ?>" method="post" enctype="multipart/form-data">

    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Nom</span></div>
        <input  type="text" class="form-control" name="nom" id="nom" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['nom'] : '' ?>
<?= isset($user) ? $user['nom'] : '' ?>" />
    </div>
    <br>

    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Prénom</span></div>
        <input  type="text" class="form-control" name="prenom" id="prenom" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['prenom'] : '' ?>
<?= isset($user) ? $user['prenom'] : '' ?>" />
    </div>
    <br>

    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Email</span></div>
        <input type="email" name="email" class="form-control" id="email" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['email'] : '' ?>
<?= isset($user) ? $user['email'] : '' ?>" />
    </div>
    <br>

    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Password</span></div>
        <input  type="password" name="password" id="password" value="" />
    </div>
    <br>

    <label for="is_admin"> Admin ?</label>
    <select class="form-control" name="is_admin" id="is_admin">
        <option value="0"<?php if(isset($user) && $user['id']) : ?><?=($user['is_admin']==0) ? ' selected':''; ?><?php endif; ?>>non</option>
        <option value="1" <?php if(isset($user) && $user['id']) : ?><?=($user['is_admin']==1) ? ' selected':''; ?><?php endif; ?>>oui</option>
    </select>
    <br>
    <br>

    <input class="btn btn-outline-success" type="submit" value="Enregistrer" />

</form>
<?php require ('partials/footer.php'); ?>
