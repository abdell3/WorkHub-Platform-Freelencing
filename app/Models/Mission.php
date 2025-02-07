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

    }
    
}
