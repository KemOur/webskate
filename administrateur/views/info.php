<?php require ('partials/header.php'); ?>


<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<a class="btn btn-outline-success" href="index.php?controller=infos&action=new">Ajouter Catégorie</a><br>
<br>
<h4>Liste des Catégories:</h4>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Sujet</th>
        <th scope="col">Message</th>
    </tr>
    </thead>

    <?php foreach($infos as $info): ?>
        <tbody>
        <tr>
            <td><p><?=  htmlspecialchars($info['sujet']) ?></td>
            <td><p><?=  htmlspecialchars($info['news']) ?></p></td>

            <td>
                <a class="btn btn-outline-info" href="index.php?controller=infos&action=editInfo&id=<?= $info['id'] ?>">modifier<br></a>
                <a class="btn btn-outline-danger" href="index.php?controller=infos&action=delInfo&id=<?= $info['id'] ?>" >supprimer</a>
            </td>

        </tr>
        </tbody>
    <?php endforeach; ?>

</table>


<?php require ('partials/footer.php'); ?>
