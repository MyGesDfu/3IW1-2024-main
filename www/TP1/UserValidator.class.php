<?php
class UserValidator{

    private function validateSignUp(User $user, string $confirmPwd) {
        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse email n'est pas valide.");
        }
        if (strlen($user->getPwd()) < 2 || strlen($user->getPwd()) > 32) {
            throw new Exception("Le mot de passe doit contenir entre 2 et 32 caractères.");
        }
        if ($user->getPwd() != $confirmPwd) {
            throw new Exception("Les mots de passe ne se correspondent pas")
        }
    }

}