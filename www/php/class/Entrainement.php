<?php

class Entrainement {

    private $table;
    private $id;
    private $id_planning;
    private $id_groupe;
    private $date;
    private $horaire_debut;
    private $horaire_fin;
    private $lieu;
    private $etat;

    public function __construct() {
        $this->table = "entrainement";
    }

    
    /**Setter**/
    public function setIdPlanning($idplanning) {
        $this->id_planning = $idplanning;
    }

    public function setIdGroupe($idGoupe) {
        $this->id_groupe = $idGoupe;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setHoraireDebut($horaire_debut) {
        $this->horaire_debut = $horaire_debut;
    }

    public function setHoraireFin($horaire_fin) {
        $this->horaire_fin = $horaire_fin;
    }

    public function setLieu($lieu) {
        $this->lieu = $lieu;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    /**Getter**/
    public function getId() {
        return $this->id;
    }

    public function getIdPlanning() {
        return $this->id_planning;
    }

    public function getIdGroupe() {
        return $this->id_groupe;
    }

    public function getDate() {
        return $this->date;
    }

    public function getHoraireDebut() {
        return $this->horaire_debut;
    }

    public function getHoraireFin() {
        return $this->horaire_fin;
    }

    public function getLieu() {
        return $this->lieu;
    }

    public function getEtat() {
        return $this->etat;
    }

}
