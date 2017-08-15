<?php

require_once '../include/connexionBDD.php';

try {

    session_start(); // On get les variables sessions
    //Préparation de la requête
    $res = $dbh->prepare("SELECT derby_name, mdp, id, nom, prenom, email FROM player WHERE id = '$_SESSION[id]'");
    $res->execute();
    $membre = $res->fetch(PDO::FETCH_ASSOC);


    $tabInfoMembre = array(
        "derby_name" => $membre["derby_name"],
        "nom" => $membre["nom"],
        "prenom" => $membre["prenom"],
        "mail" => $membre["email"],
        "mdp" => $membre["mdp"]
    );


    echo json_encode($tabInfoMembre);

    $res = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
