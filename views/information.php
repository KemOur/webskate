<?php require ('partials/header.php'); ?>


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

<?php require ('partials/footer.php'); ?>
