<?php
class Database {
    
    private static $instance = null;
    
    
    private $connection;

    private $servername = "localhost";    
    private $dbname = "DB"; 
    private $port = "5432"; 
    private $username = "root";     
    private $password = "Abdoabdell";     

    private function __construct() {
        try {
            
            $this->connection = new PDO(
                "mysql:host=" . $this->servername . 
                ";dbname=" . $this->dbname, 
                ";port="$this->port,
                $this->username, 
                $this->password,
            );
            
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
            exit();
        }
    }

    public static function getInstance() {
        
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance->connection;
    }

    
    public function __clone() {}

    public function __wakeup() {}
}

