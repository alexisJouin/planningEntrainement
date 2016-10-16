<?php

require_once '../include/connexionBDD.php';

try {

    session_start(); // On get les variables sessions

    if ($_SESSION['id_groupe'] == 0 || $_SESSION['id_groupe'] == "" || $_SESSION['id_groupe'] == NULL || $_SESSION['privilege'] == 0) {
        echo "0";
    } else {
        //Préparation de la requête
        $res = $dbh->prepare("SELECT id, nom, email, adresse, descriptif, photo FROM groupe WHERE id = '$_SESSION[id_groupe]'");
        $res->execute();
        $membre = $res->fetch(PDO::FETCH_ASSOC);


        $tabInfoGroupe = array(
            "nom" => $membre["nom"],
            "email" => $membre["email"],
            "adresse" => $membre["adresse"],
            "descriptif" => $membre["descriptif"],
            "photo" => $membre["photo"]
        );


        echo json_encode($tabInfoGroupe);

        $res = null;
    }
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
