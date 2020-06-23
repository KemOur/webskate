<?php require ('partials/header.php'); ?>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
    <br>
    <br>

    <form action="index.php?controller=infos&action=<?= isset($info) ||
    (isset($_SESSION['old_inputs']) && $_GET['action'] == 'editInfo')  ? 'editInfo&id='.$_GET['id'] : 'addInfo' ?>" method="post" enctype="multipart/form-data">

        <br>
        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Sujet</span></div>
            <input  type="text" name="sujet" class="form-control" id="sujet" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['sujet'] : '' ?><?= isset($info) ? $info['sujet'] : '' ?>" />
        </div>
        <br>

        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Message</span></div>
            <textarea name="news" class="form-control" id="news"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['news'] : '' ?><?= isset($info) ? $info['news'] : '' ?></textarea><br>
        </div>
        <br>
        <input class="btn btn-outline-info" type="submit" value="Enregistrer" />

    </form>

<?php require ('partials/footer.php'); ?>