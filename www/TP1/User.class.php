<?php

class User{
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    public function __construct(string $firstname,string $lastname,string $email,string $password) {

        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function setFirstname(string $firstname): void {

        $this->firstname = ucwords(strtolower(trim($firstname)));
    }
        
    public function setLastname(string $lastname): void {

        $this->lastname = ucwords(strtolower(trim($lastname)));
    }

    public function getEmail(): string {

        return $this->email;
    }

    public function setEmail(string $email): void {
        
        $this->email = trim(strtolower($email));
    }


    public function getPwd(): string {

       return $this->password;
    }
    

    public function setPassword(string $password): void {

        $this->password = password_hash($password, PASSWORD_DEFAULT); 
    }

    



    public function save() {

        // Logique pour enregistrer l'utilisateur dans la base de données
    }

}
