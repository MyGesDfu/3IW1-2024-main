<?php
class UserValidator{

    public function validateSignUp(User $user, string $confirmPwd) {

        $errors = [];
        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse email n'est pas valide.";
        }
        if (strlen($user->getPwd()) < 2 || strlen($user->getPwd()) > 32) {
            $errors[] = "Le mot de passe doit contenir entre 2 et 32 caractères.";
        }
        if ($user->getPwd() != $confirmPwd) {
            $errors[] = "Les mots de passe ne se correspondent pas";
        }
        return $errors;
    }
}
?>