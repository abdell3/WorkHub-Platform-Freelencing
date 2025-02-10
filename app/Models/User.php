<?php

namespace App\Models;

use app\Models\Role;

class User
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $motDePasse;
    private string $image; 
    private Role $role;
    private string $phone;
    private string $status;
    

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


}
