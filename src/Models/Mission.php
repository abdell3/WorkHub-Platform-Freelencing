<?php 

namespace src\Models;


use src\Models\User;


    class Mission
    {
    private $id;
    private $mission_nom;
    private $client_demande;
    private $status;
    private $progression;
    private $prix_init;
    private User $client;
    private User $freelance;
    private $prix_proposer;
    private $prix_final;
    private $freelance_proposition;



        public function __construct($id, $mission_nom, $client_demande, $status, $progression, $prix_init, $prix_proposer, $prix_final, $freelance_proposition){
            $this->id = $id;
            $this->mission_nom = $mission_nom;
            $this->client_demande = $client_demande;
            $this->status = $status;
            $this->progression = $progression;
            $this->prix_init = $prix_init;
            $this->prix_proposer = $prix_proposer;
            $this->prix_final = $prix_final;
            $this->freelance_proposition = $freelance_proposition;
        }





    public function getId() {
      return $this->id;
    }
    public function setId($value) {
      $this->id = $value;
    }

    public function getMission_nom() {
      return $this->mission_nom;
    }
    public function setMission_nom($value) {
      $this->mission_nom = $value;
    }

    public function getClient_demande() {
      return $this->client_demande;
    }
    public function setClient_demande($value) {
      $this->client_demande = $value;
    }

    public function getStatus() {
      return $this->status;
    }
    public function setStatus($value) {
      $this->status = $value;
    }

    public function getProgression() {
      return $this->progression;
    }
    public function setProgression($value) {
      $this->progression = $value;
    }

    public function getPrix_init() {
      return $this->prix_init;
    }
    public function setPrix_init($value) {
      $this->prix_init = $value;
    }

    public function getPrix_proposer() {
      return $this->prix_proposer;
    }
    public function setPrix_proposer($value) {
      $this->prix_proposer = $value;
    }

    public function getPrix_final() {
      return $this->prix_final;
    }
    public function setPrix_final($value) {
      $this->prix_final = $value;
    }

    public function getFreelance_proposition() {
      return $this->freelance_proposition;
    }
    public function setFreelance_proposition($value) {
      $this->freelance_proposition = $value;
    }

    // public function __toString() {
    //     return 
    //      "Id : " . $this->id.  
    //      " , Nom: " .$this->nom.  
    //      " , Prenom: " .$this->prenom.     
    //      " , status : " .$this->status . 
    //      " , email : " . $this->email  . 
    //      " , mot de passe : " . $this->motDePasse . 
    //      " photo : " . $this->image . 
    //      " , Role : " . $this->role . 
    //      " , Role_ID : " . $this->role_id . "" ;
    // }


    }




















?>