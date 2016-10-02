<?php

require_once '../include/connexionBDD.php';

try {

    //Préparation de la requête
    $res = $dbh->prepare("UPDATE player ... derby_name, mdp, id, nom, prenom, email, photo FROM player WHERE id = '$_SESSION[id]'");
    $res->execute();

    $res = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
