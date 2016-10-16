<?php

require_once '../include/connexionBDD.php'; // connexion avec la base de données
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th id='nomGroupe'>Nom du groupe</th><th>Email</th><th>Adresse</th><th>Descriptif</th><th>Photo</th></tr>";

class TableRows extends RecursiveIteratorIterator {

    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;' id='".parent::current()."'>" . parent::current() . "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }

}

try {
    session_start();
    $req = $dbh->prepare("SELECT id, nom, email, adresse, descriptif, photo FROM groupe WHERE 1 ");
    $req->execute();
    $listGroup = $req->fetchAll(PDO::FETCH_ASSOC);
//    $listGroup['descriptif'] = utf8_decode($listGroup['descriptif']);
//    
//    echo json_encode($listGroup);
//    $tabListGroup = array(
//      "id" => $listGroup[2]
//    );
//    $listGroup = $req->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new TableRows(new RecursiveArrayIterator($listGroup)) as $k => $v) {
        echo $v;
    }

    echo 1;



    $req = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}