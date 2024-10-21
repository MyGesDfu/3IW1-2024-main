<?php
session_start();
$errors = [];

include 'UserValidator.class.php';
include 'User.class.php';
include 'Sqlite.class.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPwd = $_POST["passwordConfirm"];

    if (class_exists('User') && class_exists('UserValidator')) {
        $user = new User($firstname, $lastname, $email, $password);
        $validator = new UserValidator();

        $errors = $validator->validateSignUp($user, $confirmPwd);

        if (empty($errors)) {
            // Connexion à la base de données
            $db = new Database();
            $pdo = $db->getPdo();

            // Vérifier si l'email existe déjà
            if ($pdo) {
                $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->execute([$email]);
                if ($stmt->fetch()) {
                    $errors[] = "Cet email est déjà utilisé.";
                } else {
                    // Sauvegarder l'utilisateur
                    $user->save($pdo);
                    header("Location: login.php");
                    exit();
                }
            } else {
                $errors[] = "Erreur de connexion à la base de données.";
            }
        }
    } else {
        $errors[] = "Erreur: la classe ou le validateur n'existe pas.";
    }
}
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

<form method="POST" action="register.php">
    <input type="text" name="firstname" placeholder="Votre prénom" required><br>
    <input type="text" name="lastname" placeholder="Votre nom" required><br>
    <input type="email" name="email" placeholder="Votre email" required><br>
    <input type="password" name="password" placeholder="Votre mot de passe" required minlength="2" maxlength="32"><br>
    <input type="password" name="passwordConfirm" placeholder="Confirmation" required><br>
    <input type="submit" value="S'inscrire">
</form>