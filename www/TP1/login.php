<?php
    //Le code pour se connecter
    print_r($_POST);
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    // if($_POST["email"] == )

?>

<h1>Se connecter</h1>

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
    <ul id="errorList">
        <?php
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
            }
        ?>
    </ul>
</div>

<form action="login.php" method="POST">
    <input type="email" name="email" placeholder="Votre email" required><br>
    <input type="password" name="password" placeholder="Votre mot de passe" required><br>
    <input type="submit" value="Se connecter">
</form>