<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <title> Webskate</title>
</head>
</html>
<body>
    <nav>
        <div class="logo">
            <a href="index.php"><h1>Webskate</h1></a>
            <p><?php if(isset($_SESSION['user'])): ?>Salut <?= $_SESSION['user']['prenom'] ?>! <?php endif; ?></p>
        </div>

        <div class="menu" >
            <ul class="ul">
                <li><a href="index.php?page=products&action=all">All</a></li>
                <?php foreach($categorys as $category): ?>
                <li><a href="index.php?page=products&category_id=<?= $category['id'] ?>"><?= $category['name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="icone">
            <div class="icone">
                    <div>
                        <?php if(!isset($_SESSION['user'])): ?><a href="index.php?page=register&action=register"> <img src="assets/images/accueil/user_.png" width="30px" height="31px"> </img></a><?php endif; ?>
                        <?php if(isset($_SESSION['user'])): ?><a href="index.php?page=user&action=Eprofil"> <img src="assets/images/accueil/user_.png" width="30px" height="31px"> </img></a><?php endif; ?>

                       <a href="index.php?page=cart&action=cart"><span class="numberofarticle"><?=$num_items_in_cart?></span><img src="assets/images/accueil/ecom.svg" width="30px" height="30px"></img></a>

                        <?php if(isset($_SESSION['user'])): ?><a href="index.php?action=logout" ><img src="assets/images/accueil/deco.png" width="30px" height="30px"></img><?php endif; ?>

                            <a href="administrateur/index.php">
                                <?php if (!isset($_SESSION['user']) ==0) :?>
                                    <img src="assets/images/accueil/admin.png" width="30px" height="30px"></img>
                                <?php endif; ?>
                            </a>
                    </div>
                </div>
        </div>
    </nav>


    <?php foreach($infos as $info): ?>
            <div class="promo"><p class="promo_P"><?=  htmlspecialchars($info['news']) ?></p></div>
    <?php endforeach; ?>










