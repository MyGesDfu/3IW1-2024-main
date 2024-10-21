<?php
class UserValidator {
    public function validateSignUp(User $user, string $confirmPwd) {
        $errors = [];

        // Vérifier que l'email est valide
        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse email n'est pas valide.";
        }

        // Vérifier la longueur du mot de passe de confirmation
        if (strlen($confirmPwd) < 2 || strlen($confirmPwd) > 32) {
            $errors[] = "Le mot de passe doit contenir entre 2 et 32 caractères.";
        }

        // Vérifier que les mots de passe correspondent
        if ($confirmPwd !== $user->getPwd()) {
            $errors[] = "Les mots de passe ne se correspondent pas.";
        }

        return $errors;
    }
}
?>