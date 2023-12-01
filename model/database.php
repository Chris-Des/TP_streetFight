<?php

require_once('config.php');

class Database {
    protected $pdo;

    public function __construct() {
        try {
            // Connexion à la base de données en utilisant l'instance de PDO
            $dsn = 'mysql:host=' . Config::$dbHost . ';dbname=' . Config::$dbName;
            $this->pdo = new PDO($dsn, Config::$dbUser, Config::$dbPassword);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }
}