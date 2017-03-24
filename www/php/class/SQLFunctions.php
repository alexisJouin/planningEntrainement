<?php

class SQLFunctions {

    private $query;
    protected $_db;

    public function __construct() {
        include '../../include/connexionBDD.php';
        $this->_db = $dbh;
    }

    /**
     * Selectionne des éléments d'une table
     * @param type $table
     * @param type $option :
     *      1->ALL
     *      2->Specific attr of all row
     *      3->SELECT ALL OF A SPECIFIC row
     *      4->SELECT secific attr OF A SPECIFIC row
     * @param type $query
     */
    public function select($table, $option, $attr = NULL, $value = NULL, $attrField = NULL, $query = NULL) {
        try {
            if ($query == NULL) {
                if ($option == 1) {
                    $this->query = "SELECT * FROM $table ";
                    $sth = $this->_db->prepare($this->query);
                    $sth->execute();
                    $list = $sth->fetchAll(PDO::FETCH_ASSOC);
                    return json_encode($list);
                } else if ($option == 2 && ($attr != NULL || $attr != "")) {
                    $this->query = "SELECT $attr FROM $table ";
                    $sth = $this->_db->prepare($this->query);
                    $sth->execute();
                    $list = $sth->fetchAll(PDO::FETCH_ASSOC);
                    return json_encode($list);
                } else if ($option == 3 && ($attr != NULL || $attr != "")) {
                    $this->query = "SELECT * FROM $table WHERE $attr = :value ";
                    $sth = $this->_db->prepare($this->query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(":value" => $value));
                    $list = $sth->fetch(PDO::FETCH_ASSOC);
                    return json_encode($list);
                } else if ($option == 4 && ($attr != NULL || $attr != "")) {
                    $this->query = "SELECT $attrField FROM $table WHERE $attr = :value ";
                    $sth = $this->_db->prepare($this->query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(":value" => $value));
                    $list = $sth->fetch(PDO::FETCH_ASSOC);
                    return json_encode($list);
                }
            } else if ($query != "") {
                $this->query = $query;
            } else {
                return "Erreur lors de la sélecion SQL : " + $this->query;
            }
        } catch (PDOException $err) {
            echo $err;
        }
    }

    /**
     * Insertion avec Duplicate Key => Fait la mise à jour
     * @param type $table : nom de la table en BDD
     * @param type $attr : nom du champ dans la BDD
     * @param type $value : valeur du champ
     * @param type $query : Requête SQL
     */
    public function insert($table, $attr = NULL, $value = NULL, $query = NULL) {
        if ($query == NULL) {
            $this->query = "INSERT INTO $table ($attr) VALUES (:value) ON DUPLICATE KEY UPDATE $attr = :value";
            $sth = $this->_db->prepare($this->query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':value' => $value));
            return "Succès lors de l'insertion";
        } else if ($query != "") {
            $this->query = $query;
            $sth = $this->_db->prepare($this->query);
            $sth->execute();
            return "Succès lors de l'insertion";
        } else {
            return "Erreur lors de l'insertion SQL : " + $this->query;
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
            $sth = $this->_db->prepare($this->query);
            $sth->execute();
        } else {
            echo "Erreur lors de la mise à jour SQL : " + $this->query;
        }
    }

}
