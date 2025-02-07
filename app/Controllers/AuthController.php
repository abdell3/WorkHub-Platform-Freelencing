<?php

// require_once dirname(__DIR__) . '/Config/Database.php';

// class Auth
// {
//     private $db;

//     public function __construct()
//     {
//         $this->db = Database::getInstance();
//     }

//     public function login($email, $password)
//     {
//         // var_dump($email);
//         $query = "SELECT u.*, r.title 
//               AS role 
//               FROM users u 
//               JOIN roles r ON u.role_id = r.id 
//               WHERE u.email = :email AND u.motDePasse = :password";

//             //   var_dump($query);
//             //   die();
//         $stmt = $this->db->prepare($query);
//         $stmt->execute([':email' => $email, ":password" => $password]);
//         $user = $stmt->fetch(PDO::FETCH_ASSOC);

        
//         if ($user) {
//             return [
//                 'id' => $user['id'],
//                 'prenom' => $user['prenom'],
//                 'nom' => $user['nom'],
//                 'email' => $user['email'],
//                 'image' => $user['image'],
//                 'status' => $user['status'],
//                 'role_id' => $user['role_id'], 
//                 'role' => $user['role'],      
//             ];
//         }

//         return null;
//     }


//     public function register($prenom, $nom, $email, $password){
//         // $user = 

//     }
// }
