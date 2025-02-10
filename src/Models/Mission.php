<?php 

namespace App\Models;


    class Mission
    {
        private int $id;
        private string $mission_nom;
        private string $client_demande;
        private string $status;
        private string $progression;
        private int $prix_init;
        private User $client;
        private User $freelance;
        private int $prix_proposer;
        private int $prix_final;
        private string $freelance_proposition;
    }




















?>