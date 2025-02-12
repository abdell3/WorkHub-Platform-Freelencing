<?php 

namespace App\Models;

    class Role 
    {
        private  $id;
    private  $role_nom;
    private  $role_descritption;

    public function getId() {
      return $this->id;
    }
    public function setId($value) {
      $this->id = $value;
    }

    public function getRole_nom() {
      return $this->role_nom;
    }
    public function setRole_nom($value) {
      $this->role_nom = $value;
    }

    public function getRole_descritption() {
      return $this->role_descritption;
    }
    public function setRole_descritption($value) {
      $this->role_descritption = $value;
    }
}
















?>