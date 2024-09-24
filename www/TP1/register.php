<?php
//Le code pour s'inscrire

?>

<h1>S'inscrire</h1>

<div>
    <ul>
        <li><a href="register.php">Inscription</a></li>
        <li><a href="login.php">Connexion</a></li>
    </ul>

    <ul>
        <li><a href="login.php">Déconnexion</a></li>
    </ul>
</div>

<div style="background-color: red">
    <ul>
        <li>Les erreurs</li>
        <li>Les erreurs</li>
    </ul>
</div>

<form method="POST" action="login.php">
    <input type="text" name="firstname" placeholder="Votre prénom" required><br>
    <input type="text" name="lastname" placeholder="Votre nom" required><br>
    <input type="email" name="email" placeholder="Votre email" required><br>
    <input type="password" name="password" placeholder="Votre mot de passe" required minlength="2" maxlength="32"><br>
    <input type="password" name="passwordConfirm" placeholder="Confirmation" required><br>
    <input type="submit" value="S'inscrire">
</form>