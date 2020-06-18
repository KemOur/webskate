<?php require ('partials/header.php'); ?>

<form action="index.php?page=register&action=addUser" method="post">
    <div class="container">
        <h1>S'inscrire</h1>
        <hr>
        <?php if(isset($_SESSION['messages'])): ?>
            <div><?php foreach($_SESSION['messages'] as $message): ?><?= $message ?><br><?php endforeach; ?></div>
        <?php endif; ?>
        <hr>
        <label for="nom"><b>Nom</b></label>
        <input  type="text" placeholder="Entrez votre nom" class="form-control" name="nom" id="nom" required/>

        <label for="prenom"><b>Prenom</b></label>
        <input  type="text" placeholder="Entrez votre prenom" class="form-control" name="prenom" id="prenom" required/>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Entrez votre email" name="email" id="email" required>

        <label for="password"><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrez votre mot de passe" name="password" id="password" required>
        <hr>
        <button type="submit" class="registerbtn">Inscription</button>
    </div>

    <div class="container signin">
        <p>Vous avez déjà un compte? <a class="lieninscription" href="http://localhost/webskate/index.php?page=login&action=login">Connectez-vous</a>.</p>
    </div>
</form>
<?php require ('partials/footer.php'); ?>
