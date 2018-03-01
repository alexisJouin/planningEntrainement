<?php

require_once '../include/connexionBDD.php'; // connexion avec la base de données

try {
 
    session_start();
    $req = $dbh->prepare("SELECT id, nom, email, adresse, descriptif, photo FROM groupe");
    $req->execute();
    $listGroup = $req->fetchAll(PDO::FETCH_ASSOC);
//    $listGroup['descriptif'] = utf8_decode($listGroup['descriptif']);

    echo json_encode($listGroup);



    $req = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}