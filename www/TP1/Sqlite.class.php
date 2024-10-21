<?php
    class Database {
        private $pdo;

        public function __construct() {
            try {
                // Connexion à MariaDB
                $this->pdo = new PDO('mysql:host=mariadb;dbname=esgi', 'esgi', 'esgipwd');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur lors de la connexion à MariaDB : " . $e->getMessage();
            }
        }

        public function getPdo() {
            return $this->pdo;
        }
    }
?>