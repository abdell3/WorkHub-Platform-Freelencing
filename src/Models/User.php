<?php

namespace src\Models;

use src\Models\Role;

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
