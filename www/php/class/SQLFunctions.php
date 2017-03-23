<?php

require_once '../include/connexionBDD.php';

class SQLFunctions {

    private $query;

    
    
    /**
     * Insertion avec Duplicate Key => Fait la mise à jour
     * @param type $table : nom de la table en BDD
     * @param type $attr : nom du champ dans la BDD
     * @param type $value : valeur du champ
     * @param type $query : Requête SQL
     */
    public function insert($table, $attr = NULL, $value = NULL, $query = NULL) {
        if ($query == NULL) {
            $this->query = "INSERT INTO :table (:attr) VALUES (:value) ON DUPLICATE KEY UPDATE :attr = :value";
            $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':table' => $table, ':attr' => $attr, ':value' => $value));
        } else if ($query != "") {
            $this->query = $query;
        } else {
            echo "Erreur lors de l'insertion SQL : " + $this->query;
        }
    }

    /**
     * Mise à jour avec Duplicate Key => Fait la mise à jour
     * @param type $table : nom de la table en BDD
     * @param type $attr : nom du champ dans la BDD
     * @param type $value : valeur du champ
     * @param type $query : Requête SQL
     */
    public function update($table, $attr = NULL, $value = NULL, $query = NULL) {
        if ($query == NULL) {
            $this->insert($table, $attr, $value, $query);
        } else if ($query != "") {
            $this->query = $query;
        } else {
            echo "Erreur lors de la mise à jour SQL : " + $this->query;
        }
    }

}
