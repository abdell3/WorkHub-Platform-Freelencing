<?php
class Mission{
    private int $id;
    private string $mission_nom;
    private string $client_demande;
    private string $status;
    private string $progression;
    private $competence_demander = [];
    private int $prix_init;
    private User $freelance;
    private int $prix_proposer;
    private int $prix_final;
    private string $freelance_proposition;

    public function __constroct()
    {
        $this->$id = $id; 
        $this->$mission_nom = $mission_nom;
        $this->$client_demande;
        $this->$status = $status;
        $this->$progression = $progression;
        $this->$competence_demander = $competence_demander;
        $this->prix_init = $prix_init;
        $this->freelance = $freelance;
        $this->$prix_final = $prix_final;
        $this->freelance_proposition = $freelance_proposition;
        $this->prix_proposer = $prix_proposer;
        
    }











}
