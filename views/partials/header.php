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
            <a href="http://localhost/webskate/index.php?controller=home&action=home"><h1 class="">Webskate</h1></a>
            <p><?php if(isset($_SESSION['user'])): ?>Salut <?= $_SESSION['user']['prenom'] ?>! <?php endif; ?></p>
        </div>

        <div class="menu" >
            <ul class="ul">
                <li><a href=" http://localhost/webskate/index.php?controller=products&action=list">All</a></li>
                <li><a>Stakeboards</a></li>
                <li><a>Longboards</a></li>
                <li><a>Electricboards</a></li>
                <li><a>Protections</a></li>
            </ul>
        </div>

        <div class="icone">
            <div class="icone">
                    <div>
                        <?php if(!isset($_SESSION['user'])): ?><a href="http://localhost/webskate/index.php?controller=register&action=register"> <img src="assets/images/accueil/user_.png" width="30px" height="31px"> </img></a><?php endif; ?>
                        <img src="assets/images/accueil/ecom.svg" width="30px" height="30px"></img>

                        <?php if(isset($_SESSION['user'])): ?><a href="index.php?action=logout" ><img src="assets/images/accueil/deco.png" width="30px" height="30px"></img><?php endif; ?>

                            <a href="http://localhost/webskate/administrateur/index.php?controller=categorys&action=list">
                                <?php if (!isset($_SESSION['user']) == 0) :?>
                                    <img src="assets/images/accueil/admin.png" width="30px" height="30px"></img>
                                <?php endif; ?>
                            </a>


                    </div>
                </div>

        </div>


    </nav>
    <div class="promo"><p class="promo_p">En raison de la crise sanitaire, nos magasins se trouve fermé temporairement! jusqu'à nouvel ordre</p></div>










