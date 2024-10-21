<?php
session_start();
$errors = [];

include 'UserValidator.class.php';
include 'User.class.php';
include 'Sqlite.class.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    // Connexion à la base de données
    $db = new Database();
    $pdo = $db->getPdo();

    // Préparation de la requête pour récupérer l'utilisateur par email
    if ($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification de l'utilisateur
        if ($user && password_verify($pwd, $user['password'])) {
            $_SESSION["user"] = $user["email"];
            header("Location: dashboard.php");
            exit();
        } else {
            $errors[] = "Email ou mot de passe incorrect.";
        }
    } else {
        $errors[] = "Erreur de connexion à la base de données.";
    }
}
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