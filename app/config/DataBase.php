<?php

namespace App\Config;

use PDO;
use PDOException;
use Exception;

class Database {
    
    private static $instance = null;
    
    
    private $connection;

    private string $servername = "localhost";    
    private string $dbname = "DB"; 
    private string $port = "5432"; 
    private string $username = "root";     
    private string $password = "Abdoabdell";     

    private function __construct() {
        try {


            $dsn = "pgsql:host = {$this->servername};
            port = {$this->port};
            dbname = {$this->dbname}";
            $this->connection = new PDO(
                $dsn,
                $this->username, 
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
            exit();
        }
    }

    public static function getInstance() {
        
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connection;
    }

    
    private function __clone() {}

    public function __wakeup() {
        throw new exception ("La redéclaration de cette classe n'est pas autoriser");
    }
}

