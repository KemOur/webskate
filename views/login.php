<?php require ('partials/header.php'); ?>

<form action="index.php?controller=login&action=coUser" method="post">
    <div class="container">
        <h1>Se connecter</h1>
        <hr>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Entrez votre email" name="email" id="email" required>

        <label for="password"><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrez votre mot de passe" name="password" id="password" required>

        <hr>
        <?php if(isset($_SESSION['messages'])): ?>
            <div><?php foreach($_SESSION['messages'] as $message): ?><?= $message ?><br><?php endforeach; ?></div>
        <?php endif; ?>
        <hr>
        <button type="submit" class="registerbtn">Connexion</button>
    </div>

    <div class="container signin">
        <p>Vous avez pas un compte? <a href="http://localhost/webskate/index.php?controller=register&action=register">Inscrivez-vous</a>.</p>
    </div>
</form>

<?php require ('partials/footer.php'); ?>
