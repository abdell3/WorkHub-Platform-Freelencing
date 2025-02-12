<?php

namespace App\Models;

use App\Core\Config\DataBase;
use App\Models\Role;
use Exception;
use PDO;

class User
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;
    private $image;
    private Role $role;
    private $phone;
    private $status;
    private $role_id;
    private $db;
    

    public function __construct($nom,$prenom,$email,$motDePasse,$image,$role,$phone,$status)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->image = $image;
        $this->role = $role;
        $this->phone = $phone;
        $this->status = $status;
        
    }



    public function getId() {
      return $this->id;
    }
    public function setId($value) {
      $this->id = $value;
    }

    public function getNom() {
      return $this->nom;
    }
    public function setNom($value) {
      $this->nom = $value;
    }

    public function getPrenom() {
      return $this->prenom;
    }
    public function setPrenom($value) {
      $this->prenom = $value;
    }

    public function getEmail() {
      return $this->email;
    }
    public function setEmail($value) {
      $this->email = $value;
    }

    public function getMotDePasse() {
      return $this->motDePasse;
    }
    public function setMotDePasse($value) {
      $this->motDePasse = $value;
    }

    public function getImage() {
      return $this->image;
    }
    public function setImage($value) {
      $this->image = $value;
    }

    public function getPhone() {
      return $this->phone;
    }
    public function setPhone($value) {
      $this->phone = $value;
    }

    public function getStatus() {
      return $this->status;
    }
    public function setStatus($value) {
      $this->status = $value;
    }

    public function getRole_id() {
      return $this->role_id;
    }
    public function setRole_id($value) {
      $this->role_id = $value;
    }




    public function createUser (string $nom, string $prenom, string $email, string $password, int $role_id, string $phone, string $image){
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->db = DataBase::getInstance()->getConnection();
            $stmt = $this->db->prepare("
                INSERT INTO users (nom, prenom, email, password, role_id, phone, image) 
                VALUES (:nom, :prenom, :email, :password, :role_id, :phone, :image)
            ");

            return $stmt->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':password' => $hashedPassword,
                ':role_id' => $role_id,
                ':phone' => $phone,
                ':image' => $image
            ]);
        } catch (Exception $e) {
            error_log("Erreur lors de la création de l'utilisateur : " . $e->getMessage());
            return false;
        }
    }


    public function getUsersById(int $id){
        try {
            $this->db = DataBase::getInstance()->getConnection();
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération de l'utilisateur : " . $e->getMessage());
            return null;
        }
    }


    public function getAllUsers(){
        try {
            $stmt = $this->db->query("SELECT * FROM users");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de l'affichage des utilisateurs : " . $e->getMessage());
            return [];
        }
    }


    public function updateUser(int $id, string $nom, string $prenom, string $email, string $phone, ?string $image = null) {
        try {
            $stmt = $this->db->prepare("
                UPDATE users 
                SET nom = :nom, prenom = :prenom, email = :email, phone = :phone, image = :image 
                WHERE id = :id
            ");

            return $stmt->execute([
                ':id' => $id,
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':phone' => $phone,
                ':image' => $image
            ]);
        } catch (Exception $e) {
            error_log("Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage());
            return false;
        }
    }



    public function deleteUser(int $id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
            return $stmt->execute([':id' => $id]);
        } catch (Exception $e) {
            error_log("Erreur lors de la suppression de l'utilisateur : " . $e->getMessage());
            return false;
        }
    }




    public function __toString() {
        return 
         "Id : " . $this->id.  
         " , Nom: " .$this->nom.  
         " , Prenom: " .$this->prenom.     
         " , status : " .$this->status . 
         " , email : " . $this->email  . 
         " , mot de passe : " . $this->motDePasse . 
         " photo : " . $this->image . 
         " , Role : " . $this->role . 
         " , Role_ID : " . $this->role_id . "" ;
    }
}
