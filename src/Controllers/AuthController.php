<?php

namespace src\Controllers;


use src\Core\Config\Database;
use src\Controller;
use src\Utils\Sessions;
use PDO;
use PDOException;


class AuthController  extends Controller
{
    private $db;

    public function __construct() 
    {
    }

    public function index(){
        $this->render('login', []);
    }
    public function login($email, $password)
    {
        // // var_dump($email);
        // $query = "SELECT u.*, r.title 
        //       AS role 
        //       FROM users u 
        //       JOIN roles r ON u.role_id = r.id 
        //       WHERE u.email = :email AND u.motDePasse = :password";

        //     //   var_dump($query);
        //     //   die();
            try {

                if (empty($email) || empty($password)) {
                    return "Tous les champs sont obligatoires.";
                }

                $pdo = Database::getInstance()->getConnection();
        
                $stmt = $pdo->prepare("SELECT id, role_id, password FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user["password"])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role_id'] = $user['role_id'];
                    
                    return true;
                } 
                return "Email ou mot de passe incorrect.";


            } catch (PDOException $e) {
                error_log("Erreur de connexion : " . $e->getMessage());
                throw new \RuntimeException('Erreur serveur');
            }
    }


    public function register($prenom, $nom, $email, $password, $role_nom){
        try {
            
            $prenom = trim($prenom);
            $nom = trim($nom);
            $email = trim($email);
            $password = trim($password);
    
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new \InvalidArgumentException('Email invalide.');
            }
    
            
            if (strlen($password) < 8) {
                throw new \InvalidArgumentException('Le mot de passe doit contenir au moins 8 caractères.');
            }
    
            
            $stmt = $this->db->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->execute([':email' => $email]);
    
            if ($stmt->fetch()) {
                throw new \InvalidArgumentException('Cet email est déjà utilisé.');
            }
    
            
            $stmt = $this->db->prepare("SELECT id FROM roles WHERE title = :roleName");
            $stmt->execute([':roleName' => $role_nom]);
            $role = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$role) {
                throw new \InvalidArgumentException('Rôle invalide.');
            }
    
           
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            
            $this->db->beginTransaction();
    
            
            $stmt = $this->db->prepare("
                INSERT INTO users (prenom, nom, email, motDePasse, role_id) 
                VALUES (:prenom, :nom, :email, :password, :role_id)
            ");
    
            $success = $stmt->execute([
                ':prenom' => $prenom,
                ':nom' => $nom,
                ':email' => $email,
                ':password' => $hashedPassword,
                ':role_id' => $role['id']
            ]);
    
            if (!$success) {
                throw new \RuntimeException('Erreur lors de la création du compte.');
            }
    
            
            $this->db->commit();
    
            return ['success' => true, 'message' => 'Inscription réussie !'];
        } catch (\InvalidArgumentException $e) {
            $this->db->rollBack();
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log($e->getMessage());
            return ['success' => false, 'message' => 'Erreur serveur. Veuillez réessayer plus tard.'];
        }
        
        
        // $query = "SELECT id FROM users WHERE email = :email";
        // $stmt = $this->db->prepare($query);
        // $stmt->execute([':email' => $email]);

        // if ($stmt->fetch()) {
        //     return "Cet email est déjà utilisé.";
        // }

        // $query = "SELECT id FROM roles WHERE title = :roleName";
        // $stmt = $this->db->prepare($query);
        // $stmt->execute([':roleName' => $role_nom]);
        // $role = $stmt->fetch(PDO::FETCH_ASSOC);

        // if (!$role) {
        //     return "Rôle invalide.";
        // }

        // $role_id = $role['id'];

        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);



        // $query = "INSERT INTO users (prenom, nom, email, motDePasse, role_id) 
        //       VALUES (:prenom, :nom, :email, :password, :role_id)";

        // $stmt = $this->db->prepare($query);
        // $stmt->execute([
        //     ':prenom' => $prenom,
        //     ':nom' => $nom,
        //     ':email' => $email,
        //     ':password' => $hashedPassword,
        //     ':role_id' => $role_id

        // ]);
        // return "Inscription réussie !";
    }

    public function logout()
    {
        Sessions::start();
        Sessions::destroy();
        session_regenerate_id(true);
    }
}
